<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function myCart()
    {
        if (!session('email')) {
            return Redirect::to('login')->with('message', '您还没有登录')->withInput();
        } else {
            $carts = DB::table('cart')
                ->where('email', session('email'))
                ->join('flower', 'cart.flowerID', '=', 'flower.flowerID')
                ->get();
            $sum = 0;
            foreach ($carts as $cart) {
                $sum += $cart->yourprice * $cart->num;
            }
            return view('mycart', compact('carts', 'sum'));
        }
    }

    public function addgwch($flowerID)
    {
        if (!session('email')) {
            return Redirect::to('login')->with('message', '您还没有登录')->withInput();
        } else {
            $carts = Cart::where('email', session('email'))
                ->where('flowerID', $flowerID)
                ->get();
            if (!sizeof($carts)) {
                $cart = new Cart();
                $cart->email = session('email');
                $cart->flowerID = $flowerID;
                $cart->num = 1;
                $cart->save();
            } else {
                foreach ($carts as $cart) {
                    $cart->num++;
                    $cart->save();
                }
            }
            return Redirect::to('myCart');
        }
    }

    public function cartUpdate(Request $request)
    {
        Cart::where('cartID', $request->cartID)
            ->update(['num' => $request->num]);
        return Redirect::to('myCart')->with('message', '更新成功')->withInput();
    }

    public function cartDelete(Request $request)
    {
        Cart::where('cartID', $request->cartID)->delete();
        return Redirect::to('myCart')->with('message', '删除成功')->withInput();
    }

    public function cartClear()
    {
        Cart::where('email', session('email'))->delete();
        return Redirect::to('myCart')->with('message', '清空成功')->withInput();
    }
}

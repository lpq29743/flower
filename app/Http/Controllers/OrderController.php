<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Customer;
use App\Customer1;
use App\Flower;
use App\Order;
use App\ShopList;
use App\Tbddzt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function order()
    {
        $customers = Customer::where('email', session('email'))
            ->get();
        return view('order', compact('customers'));
    }

    public function orderPost(Request $request)
    {
        DB::transaction(function () use ($request) {
            $customer1 = Customer1::where('custID', $request->custID)
                ->first();
            if ($customer1 == null) {
                // 添加订单收货人到customer1表
                $customer1 = new Customer1();
                $customer = Customer::where('custID', $request->custID)
                    ->first();
                $customer1->custID = $customer->custID;
                $customer1->email = $customer->email;
                $customer1->sname = $customer->sname;
                $customer1->sex = $customer->sex;
                $customer1->mobile = $customer->mobile;
                $customer1->address = $customer->address;
                $customer1->zip = $customer->zip;
                $customer1->save();
            }

            // 添加订单信息到myorder表
            $carts = DB::table('cart')
                ->where('email', session('email'))
                ->join('flower', 'cart.flowerID', '=', 'flower.flowerID')
                ->get();
            $sum = 0;
            foreach ($carts as $cart) {
                $sum += $cart->yourprice * $cart->num;
            }
            $order = new Order();
            $order->email = session('email');
            $order->custID = $request->custID;
            $order->shifu = $sum;
            $order->inputtime = date("Y-m-d H:i:s");
            $order->peisongday = $request->peisongday;
            $order->peisongtime = $request->peisongtime;
            $order->peisong = $request->peisong;
            $order->psyq = $request->psyq;
            $order->liuyan = $request->liuyan;
            $order->shuming = $request->shuming;
            $order->fkfs = $request->fkfs;
            $order->fp = $request->fp;
            $order->fpaddress = $request->fpaddress;
            $order->zip = $request->zip;
            $order->fpsname = $request->fpsname;
            $order->ddzt = "未付款";
            $order->cltime = date("Y-m-d H:i:s");
            $order->kddh = "";
            $order->beizhu = "";
            $order->save();

            // 将购买的商品列表添加到shoplist表中
            $carts = Cart::where('email', session('email'))
                ->get();
            foreach ($carts as $cart) {
                $shoplist = new ShopList();
                $shoplist->orderID = $order->orderID;
                $shoplist->flowerID = $cart->flowerID;
                $shoplist->email = session('email');
                $shoplist->num = $cart->num;
                $shoplist->save();

                // 修改flower表中的selledNum字段。修改鲜花的销售数量
                $flower = Flower::where('flowerID', $cart->flowerID)
                    ->first();
                $flower->SelledNum = $flower->SelledNum + $cart->num;
                $flower->save();
            }

            // 删除购物车表中已购买的商品
            Cart::where('email', session('email'))->delete();

        });
        return Redirect::to('showOrder');
    }

    public function showOrder()
    {
        if (!session('email')) {
            return Redirect::to('login')->with('message', '您还没有登录')->withInput();
        } else {
            $orders = DB::table('myorder')
                ->where('myorder.email', session('email'))
                ->orderBy('orderID', 'desc')
                ->join('customer1', 'myorder.custID', '=', 'customer1.custID')
                ->paginate(2);
            $flowers = DB::table('shoplist')
                ->join('flower', 'shoplist.flowerID', '=', 'flower.flowerID')
                ->get();
            return view('showorder', compact('orders', 'flowers'));
        }
    }

    public function orderDetail()
    {
        $orderID = Input::get('orderID', '0');
        $order = DB::table('myorder')
            ->where('myorder.orderID', $orderID)
            ->join('member', 'member.email', '=', 'myorder.email')
            ->first();
        $orderForCustomer = DB::table('myorder')
            ->where('myorder.orderID', $orderID)
            ->join('customer1', 'myorder.custID', '=', 'customer1.custID')
            ->first();
        $flowers = DB::table('myorder')
            ->where('myorder.orderID', $orderID)
            ->join('shoplist', 'myorder.orderID', '=', 'shoplist.orderID')
            ->join('flower', 'shoplist.flowerID', '=', 'flower.flowerID')
            ->get();
        return view('orderdetail', compact('order', 'orderForCustomer', 'flowers'));
    }

    public function orderUpdate($orderID)
    {
        // 修改订单状态
        $order = Order::where('orderID', $orderID)
            ->first();
        $order->ddzt = "已完成";
        $order->cltime = date("Y-m-d H:i:s");
        $order->save();

        // 添加订单状态修改记录
        $tbddzt = new Tbddzt();
        $tbddzt->orderID = $orderID;
        $tbddzt->ddzt = "已完成";
        $tbddzt->cltime = date("Y-m-d H:i:s");
        $tbddzt->save();

        // 返回结果
        return Redirect::to('showOrder');
    }

    public function pingjia()
    {
        $orderID = Input::get('orderID', '0');
        $shoplists = DB::table('shoplist')
            ->where('shoplist.orderID', $orderID)
            ->where('shoplist.star', '=', NULL)
            ->join('flower', 'flower.flowerID', '=', 'shoplist.flowerID')
            ->get();
        return view('pingjia', compact('shoplists'));
    }

    public function pingjiaPost(Request $request)
    {
        $shoplist = ShopList::where('SLID', $request->SLID)
            ->first();
        $shoplist->star = $request->star;
        $shoplist->evaluate = $request->evaluate;
        $shoplist->save();

        // 修改订单状态
        $order = Order::where('orderID', $shoplist->orderID)
            ->first();
        $order->ddzt = "已评价";
        $order->cltime = date("Y-m-d H:i:s");
        $order->save();

        // 添加订单状态修改记录
        $tbddzt = new Tbddzt();
        $tbddzt->orderID = $shoplist->orderID;
        $tbddzt->ddzt = "已评价";
        $tbddzt->cltime = date("Y-m-d H:i:s");
        $tbddzt->save();

        return Redirect::to('pingjia?orderID=' . $request->orderID)->with('message', '评价成功')->withInput();
    }

    public function cancelOrder($orderID)
    {
        // 修改订单状态
        $order = Order::where('orderID', $orderID)
            ->first();
        $order->ddzt = "取消";
        $order->cltime = date("Y-m-d H:i:s");
        $order->save();

        // 添加订单状态修改记录
        $tbddzt = new Tbddzt();
        $tbddzt->orderID = $orderID;
        $tbddzt->ddzt = "取消";
        $tbddzt->cltime = date("Y-m-d H:i:s");
        $tbddzt->save();

        // 返回结果
        return Redirect::to('showOrder');
    }

    public function payOrder($orderID)
    {
        // 修改订单状态
        $order = Order::where('orderID', $orderID)
            ->first();
        $order->ddzt = "已付款";
        $order->cltime = date("Y-m-d H:i:s");
        $order->save();

        // 添加订单状态修改记录
        $tbddzt = new Tbddzt();
        $tbddzt->orderID = $orderID;
        $tbddzt->ddzt = "已付款";
        $tbddzt->cltime = date("Y-m-d H:i:s");
        $tbddzt->save();

        // 返回结果
        return Redirect::to('showOrder');
    }

}

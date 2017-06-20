<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Flower;
use App\Order;
use App\Tbddzt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function adminLogin()
    {
        return view('adminlogin');
    }

    public function adminLoginPost(Request $request)
    {
        $admin = Admin::where('username', $request->username)
            ->where('password', $request->password)
            ->first();
        if (sizeof($admin)) {
            $request->session()->put('admin', $request->username);
            return Redirect::to('adminOrderList');
        } else {
            return Redirect::to('adminLogin')->with('message', '用户名或密码错误')->withInput();
        }
    }

    public function adminExit()
    {
        return Redirect::to('/');
    }

    public function adminIndex()
    {
        return view("adminindex");
    }

    public function adminOrderList()
    {
        $orders = DB::table('myorder')
            ->where('myorder.ddzt', '!=', '取消')
            ->where('myorder.ddzt', '!=', '已评价')
            ->where('myorder.ddzt', '!=', '未付款')
            ->join('customer1', 'myorder.custID', '=', 'customer1.custID')
            ->get();
        return view('adminOrderList', compact('orders'));
    }

    public function adminUpdateDdzt(Request $request)
    {
        // 修改订单状态
        $order = Order::where('orderID', $request->orderID)
            ->first();
        $order->ddzt = $request->ddzt;
        $order->cltime = date("Y-m-d H:i:s");
        $order->save();

        // 添加订单状态修改记录
        $tbddzt = new Tbddzt();
        $tbddzt->orderID = $request->orderID;
        $tbddzt->ddzt = $request->ddzt;
        $tbddzt->cltime = date("Y-m-d H:i:s");
        $tbddzt->save();

        // 返回结果
        return Redirect::to('adminOrderList')->with('message', '修改成功')->withInput();
    }

    public function adminFlower()
    {
        $flowers = Flower::orderBy('flowerID', 'desc')->paginate(10);
        return view('adminflower', compact('flowers'));
    }
}

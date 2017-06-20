<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    public function customerAdd()
    {
        return view('customeradd');
    }

    public function customerAddPost(Request $request)
    {
        $customer = new Customer();
        $customer->email = session('email');
        $customer->sname = $request->sname;
        $customer->sex = $request->sex;
        $customer->mobile = $request->mobile;
        $customer->address = $request->address;
        $customer->zip = $request->zip;
        $customer->cdefault = 0;
        $customer->save();
        return Redirect::to('order');
    }

    public function customerUpdate($custID)
    {
        Customer::where('cdefault', 1)
            ->update(['cdefault' => 0]);
        Customer::where('custID', $custID)
            ->update(['cdefault' => 1]);
        return Redirect::to('order')->with('message', '修改默认地址成功')->withInput();
    }

    public function customerDelete($custID)
    {
        Customer::destroy($custID);
        return Redirect::to('order')->with('message', '删除收货地址成功')->withInput();
    }
}

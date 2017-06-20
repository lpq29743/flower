<?php

namespace App\Http\Controllers;

use Validator;
use App\Member;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class MemberController extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        // 验证表单
        $validator = Validator::make($request->all(), [
            'captcha' => 'required|captcha'
        ], $this->messages());
        if ($validator->fails()) {
            return redirect('login')
                ->withErrors($validator)
                ->withInput();
        }
        // 登录
        $members = Member::where('email', Input::get('email'))
            ->where('password', md5(Input::get('password')))
            ->get();
        if(sizeof($members)) {
            $request->session()->put('email', Input::get('email'));
            return Redirect::to('/');
        } else {
            return Redirect::to('login')->with('message', '用户名或密码错误')->withInput();
        }

    }

    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request) {
        $members = Member::where('email', Input::get('email'))
            ->get();
        if(!sizeof($members)) {
            $member = new Member();
            $member->email = $request->email;
            $member->password = md5($request->passw1);
            $member->mname = $request->mname;
            $member->sex = $request->sex;
            $member->mobile = $request->mobile;
            $member->address = $request->address;
            $member->jifen = 0;
            $member->ye = 0.00;
            $member->save();
            $request->session()->put('email', Input::get('email'));
            return Redirect::to('/');
        } else {
            return Redirect::to('register')->with('message', '此邮箱已注册过')->withInput();
        }
    }

    public function messages()
    {
        return [
            'captcha.required' => '请填写验证码',
            'captcha.captcha' => '验证码错误',
        ];
    }

    public function logout()
    {
        session()->forget('key');
        session()->flush();
        return Redirect::to('/');
    }
}
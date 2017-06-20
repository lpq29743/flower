@extends('app')
@section('head')
    <title>登录</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
@endsection
@section('content')
    <div style="width:25%; margin:10px auto 10px auto;">
        <form class="form-horizontal" action="login" method="post" enctype="multipart/form-data" data-toggle="validator"
              role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-sm-3 control-label">Email</label>

                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email地址" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">密码</label>

                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password" placeholder="用户密码"
                           required maxlength="50">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">验证码</label>

                <div class="col-sm-6">
                    <input type="text" class="form-control" id="captcha" name="captcha" placeholder="图片验证码" required>
                </div>
                <div class="col-sm-3">
                    <img src="{{captcha_src()}}">
                </div>
            </div>
            @if (count($errors) > 0)
                <div class="form-group alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('message'))
                <div class="form-group alert alert-danger">
                    <ul>
                        <li>{{ Session::get('message') }}</li>
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-10">
                    <button type="submit" class="btn btn-default">登录</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
@endsection
@extends('app')
@section('head')
    <title>注册</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
@endsection
@section('content')
    <div style="width:25%; margin:10px auto 10px auto;">
        <form class="form-horizontal" action="register" method="post" enctype="multipart/form-data"
              data-toggle="validator"
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
                    <input type="password" class="form-control" id="passw1" name="passw1" placeholder="用户密码"
                           required maxlength="50">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">确认密码</label>

                <div class="col-sm-9">
                    <input type="password" class="form-control" id="passw2" name="passw2" placeholder="确认用户密码"
                           data-match="#passw1" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">姓名</label>

                <div class="col-sm-9">
                    <input type="text" class="form-control" id="mname" name="mname" placeholder="请填写您的姓名"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">选择性别</label>

                <div class="col-sm-9">
                    <label class="radio-inline">
                        <input type="radio" name="inlineRadioOptions" id="sex" value="option1" name="sex" value="男"
                               checked="true">男
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="inlineRadioOptions" id="sex" value="option2" name="sex" value="女">女
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">联系电话</label>

                <div class="col-sm-9">
                    <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="请填写您的联系电话"
                           pattern="(^(\d{3,4}-)?\d{7,8})$|(13[0-9]{9})">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">地址</label>

                <div class="col-sm-9">
                    <input type="text" class="form-control" id="address" name="address" placeholder="请填写您的地址">
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
                    <button type="submit" class="btn btn-default">注册</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')

@endsection
@extends('app')
@section('head')
    <title>后台登录</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
@endsection
@section('content')
    <div style="width:25%; margin:10px auto 10px auto;">
        <form class="form-horizontal" action="adminLoginPost" method="post" enctype="multipart/form-data" data-toggle="validator"
              role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-sm-3 control-label">用户名</label>

                <div class="col-sm-9">
                    <input type="username" class="form-control" id="username" name="username" placeholder="用户名" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">密码</label>

                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password" placeholder="用户密码"
                           required maxlength="50">
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
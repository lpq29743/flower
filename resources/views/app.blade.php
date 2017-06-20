<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    @yield('head')
</head>

<body>
<div id="app" style="width:100%;margin:auto;">
    <table width=100%>
        <tr>
            <td rowspan=2><img src="images\\logo.jpg" style="width:216px; height:68px"></td>
            <td style="font-size:x-small;">
                @if(session('email') != null)
                    {{ session('email') }}，
                @endif
                欢迎光临鲜花礼品网
            </td>
            <td style="background-image: url('{{ asset('images/topxmenubg.jpg') }}'); font-size:x-small;text-align:center;">
                <a href="member.php" style="text-decoration:none;">我的帐户</a>|
                <a href="showOrder" style="text-decoration:none;">我的订单</a>|
                <a href="myCart" style="text-decoration:none;">购物车</a>|帮助中心
            </td>
        </tr>
        <tr>
            <td>
                @if(session('email') == null)
                    <a href="login" style="font-size:x-small;text-decoration:none;">登录</a>&nbsp;&nbsp;
                    <a href="register" style="font-size:x-small;text-decoration:none;">注册</a>&nbsp;&nbsp;
                @else
                    <a href="logout" style="font-size:x-small;text-decoration:none;">退出登录</a>&nbsp;&nbsp;
                @endif
                <a href="adminLogin" style="font-size:x-small;text-decoration:none;">后台登录</a>&nbsp;&nbsp;
            </td>
            <td style="text-align:right;"><img src="images\\ttel.jpg"></td>
        </tr>
        <tr>
            <td colspan=3
                style="background-image:url('{{ asset('images/bg-navbox.png') }}'); font-size: small;text-align:center; width:999px;height:40px">
                <span style=" color:White;"> |</span> &nbsp; &nbsp; &nbsp;
                <a href="index.php" style="text-decoration:none;"><span
                            style=" color:White; font-weight:bold; font-size:medium; font-family:宋体"> 主页</span></a>
                &nbsp;&nbsp;&nbsp; <span style=" color:White;"> |</span> &nbsp;&nbsp;&nbsp;
                <a href="showFlower" style=" text-decoration:none;"><span
                            style=" color:White; font-weight:bold; font-size:medium; font-family:宋体">鲜花</span></a>
                &nbsp; &nbsp; &nbsp; <span style=" color:White;"> |</span>&nbsp;&nbsp;&nbsp;
            </td>
        </tr>
        <tr>
            <td colspan=3
                style="background-image:url('{{ asset('images/search_bg.jpg') }}'); font-size: small;text-align:center; width:999px;height:35px">
                <span style="font-weight:bold; font-size:x-small; font-family:宋体"></span>
            </td>
        </tr>
    </table>
</div>

@yield('content')

<div>
    <img src="images\\bottom.jpg" style="width:100%;">
</div>

@yield('script')

</body>

</html>
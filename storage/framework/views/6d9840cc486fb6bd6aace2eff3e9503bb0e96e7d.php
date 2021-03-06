<!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <?php echo $__env->yieldContent('head'); ?>
</head>

<body>
<div id="app" style="width:100%;margin:auto;">
    <table width=100%>
        <tr>
            <td rowspan=2><img src="images\\logo.jpg" style="width:216px; height:68px"></td>
            <td>&nbsp;</td>
            <td style="background-image: url('<?php echo e(asset('images/topxmenubg.jpg')); ?>'); font-size:x-small;text-align:center;">
                <a href="adminLogin" style="text-decoration:none;">后台登录</a>|
                <a href="adminExit" style="text-decoration:none;">退出</a>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td style="text-align:right;"><img src="images\\ttel.jpg"></td>
        </tr>
        <tr>
            <td colspan=3
                style="background-image:url('<?php echo e(asset('images/bg-navbox.png')); ?>'); font-size: small;text-align:center; width:999px;height:40px">
                <span style=" color:White;"> |</span> &nbsp; &nbsp; &nbsp;
                <a href="index.php" style="text-decoration:none;"><span
                            style=" color:White; font-weight:bold; font-size:medium; font-family:宋体">前台主页</span></a>
                &nbsp;&nbsp;&nbsp; <span style=" color:White;"> |</span> &nbsp;&nbsp;&nbsp;
                <a href="index.php" style="text-decoration:none;"><span
                            style=" color:White; font-weight:bold; font-size:medium; font-family:宋体">后台主页</span></a>
                &nbsp;&nbsp;&nbsp; <span style=" color:White;"> |</span> &nbsp;&nbsp;&nbsp;
                <a href="adminFlower" style="text-decoration:none;"><span
                            style=" color:White; font-weight:bold; font-size:medium; font-family:宋体">鲜花管理</span></a>
                &nbsp;&nbsp;&nbsp; <span style=" color:White;"> |</span> &nbsp;&nbsp;&nbsp;
                <a href="adminOrderList" style=" text-decoration:none;"><span
                            style=" color:White; font-weight:bold; font-size:medium; font-family:宋体">订单管理</span></a>
                &nbsp; &nbsp; &nbsp; <span style=" color:White;"> |</span>&nbsp;&nbsp;&nbsp;
                <a href="index.php" style="text-decoration:none;"><span
                            style=" color:White; font-weight:bold; font-size:medium; font-family:宋体">评价管理</span></a>
                &nbsp;&nbsp;&nbsp; <span style=" color:White;"> |</span> &nbsp;&nbsp;&nbsp;
            </td>
        </tr>
        <tr>
            <td colspan=3
                style="background-image:url('<?php echo e(asset('images/search_bg.jpg')); ?>'); font-size: small;text-align:center; width:999px;height:35px">
                <span style="font-weight:bold; font-size:x-small; font-family:宋体"></span>
            </td>
        </tr>
    </table>
</div>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->yieldContent('script'); ?>

</body>

</html>
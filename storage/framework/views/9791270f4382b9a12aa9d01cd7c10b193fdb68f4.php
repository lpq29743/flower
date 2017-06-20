<?php $__env->startSection('head'); ?>
    <title>添加收货人地址</title>
    <style type="text/css">
        form > .form-group {
            border: 1px solid grey;
            padding: 10px
        }

        .heading {
            font-size: medium;
            font-family: KaiTi;
            color: orangered;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div align="center">
        <img src="images/cartbg2.jpg" style="margin:10px auto 10px auto;"/>
    </div>
    <div style="width:60%; margin:10px auto 60px auto;">
        <form class="form-horizontal" action="customerAddPost" method="post" enctype="multipart/form-data" data-toggle="validator"
              role="form">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

            <div class="form-group">
                <label class="heading">添加收货人地址</label>

                <div class="form-inline form-group" style="margin: 5px 5px 10px auto">
                    <label>收货人姓名：</label>
                    <input type="text" class="form-control" id="sname" name="sname" required>
                </div>
                <div class="form-inline" style="margin-bottom: 10px">
                    <label>性别：</label>
                    <select class="form-control" name="sex">
                        <option value="男">男</option>
                        <option value="女">女</option>
                    </select>
                </div>
                <div class="form-inline form-group" style="margin: 5px 5px 10px auto">
                    <label>移动电话：</label>
                    <input type="tel" class="form-control" id="mobile" name="mobile" required
                           pattern="(^(\d{3,4}-)?\d{7,8})$|(13[0-9]{9})">
                </div>
                <div class="form-inline form-group" style="margin: 5px 5px 10px auto">
                    <label>邮政编码：</label>
                    <input type="text" class="form-control" id="zip" name="zip" required>
                </div>
                <div style="margin-bottom: 10px">
                    <label>详细地址：</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
            </div>
            <div>
                <div class="col-sm-offset-5 col-sm-10">
                    <button type="submit" class="btn btn-default">提交</button>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
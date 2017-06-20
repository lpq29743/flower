<?php $__env->startSection('head'); ?>
    <title>提交订单</title>
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
        <form class="form-horizontal" action="orderPost" method="post" enctype="multipart/form-data"
              data-toggle="validator"
              role="form">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

            <div class="form-group">
                <label class="heading" style="margin-right: 5px;">选择收货人地址</label><a href="customerAdd">添加收货人地址</a>
                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="radio">
                        <label>
                            <input type="radio" name="custID" id="custID" value="<?php echo e($customer->custID); ?>"
                                   <?php if($customer->cdefault == 1): ?>
                                   checked
                                    <?php endif; ?>
                            >
                            <?php echo e($customer->sname); ?>，<?php echo e($customer->mobile); ?>，<?php echo e($customer->address); ?>，<?php echo e($customer->zip); ?>

                            <?php if($customer->cdefault == 1): ?>
                                默认地址
                            <?php else: ?>
                                <a href="customerUpdate/<?php echo e($customer->custID); ?>" style="margin-right: 5px;">设为默认地址</a>
                                <a href="customerDelete/<?php echo e($customer->custID); ?>">删除</a>
                            <?php endif; ?>
                        </label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="form-group">
                <label class="heading">配送费用</label>

                <div>
                    <label class="radio-inline">
                        <input type="radio" name="peisong" id="peisong" value="0" checked> 市区送货（免费送货）
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="peisong" id="peisong" value="30"> 郊区送货（+30元）
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="peisong" id="peisong" value="50"> 远郊送货（+50元）
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="heading">配送日期</label>

                <div>
                    <label>送货日期：</label>
                    <input type="date" name="peisongday" id="peisongday" required>
                </div>

                <div>
                    <label>时段：</label>
                    <label class="radio-inline">
                        <input type="radio" name="peisongtime" id="peisongtime" value="不限" checked> 不限
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="peisongtime" id="peisongtime" value="上午（8:30-12:00）"> 上午（8:30-12:00）
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="peisongtime" id="peisongtime" value="下午（12:00-18:00）"> 下午（12:00-18:00）
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="peisongtime" id="peisongtime" value="晚上（18:00-20:30）"> 晚上（18:00-20:30）
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="peisongtime" id="peisongtime" value="定时服务"> 定时服务
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="heading">特殊要求</label>

                <div>
                    <label>如果您对配送服务有特殊要求，请在此说明：</label>
                    <input type="text" class="form-control" name="psyq" id="psyq">
                </div>
            </div>
            <div class="form-group">
                <label class="heading">卡片资料</label>

                <div>
                    <label>给收货人留言：</label>
                    <input type="text" class="form-control" name="liuyan" id="liuyan" maxlength="200">
                </div>
                <div style="margin-top: 10px">
                    <label>购买人署名：</label>
                    <label class="radio-inline form-inline" style="margin-right: 75px">
                        <input type="radio" name="isSigned" id="isSigned" value="1">
                        需要署名，我的署名是：
                        <input type="text" name="shuming" id="shuming" readonly>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="isSigned" id="isSigned" value="0" checked>
                        无需署名
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="heading">付款方式</label>

                <div>
                    <label class="radio-inline" style="margin-right: 30px">
                        <input type="radio" name="fkfs" id="fkfs" value="网上支付" checked>网上支付
                    </label>
                    <label class="radio-inline" style="margin-right: 30px">
                        <input type="radio" name="fkfs" id="fkfs" value="银行转账">银行转账
                    </label>
                    <label class="radio-inline" style="margin-right: 30px">
                        <input type="radio" name="fkfs" id="fkfs" value="邮局汇款">邮局汇款
                    </label>
                    <label class="radio-inline" style="margin-right: 30px">
                        <input type="radio" name="fkfs" id="fkfs" value="上门收款">上门收款
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="heading">我需要寄发票</label>

                <div class="form-inline form-group" style="margin: 5px 5px 10px auto">
                    <label>发票抬头：</label>
                    <input type="text" class="form-control" id="fpsname" name="fpsname" required>
                </div>
                <div style="margin-bottom: 10px">
                    <label>详细地址：</label>
                    <input type="text" class="form-control" id="fpaddress" name="fpaddress">
                </div>
                <div class="form-inline" style="margin-bottom: 10px">
                    <label>邮政编码：</label>
                    <input type="text" class="form-control" id="zip" name="zip">
                    <label style="margin-left: 75px">收信人：</label>
                    <input type="text" class="form-control" id="fp" name="fp">
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
    <script>
        $(document).ready(function () {
            // 设置当前时间
            var now = new Date();
            var month = (now.getMonth() + 1);
            var day = now.getDate();
            if (month < 10)
                month = "0" + month;
            if (day < 10)
                day = "0" + day;
            var today = now.getFullYear() + '-' + month + '-' + day;
            $('#peisongday').val(today);

            // 监听是否需要署名
            $('input[type=radio][name=isSigned]').change(function () {
                if (this.value == '1') {
                    $('#shuming').prop('readonly', false);
                } else {
                    $('#shuming').val("");
                    $('#shuming').prop('readonly', true);
                }
            });
        });

        <?php if(Session::has('message')): ?>
            alert("<?php echo e(Session::get('message')); ?>");
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
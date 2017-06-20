<?php $__env->startSection('head'); ?>
    <title>订单详情</title>
    <style type="text/css">
        .table-order {
            max-width: 700px;
            margin: 15px auto 15px auto;
        }

        .heading {
            text-align: center;
            font-size: medium;
            font-family: SimSun;
            font-weight: bold;
            color: #0f0f0f;
            background: lightsalmon;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <table class="table table-order">
        <tr class="heading">
            <td colspan="4">
                订单处理信息
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <div style="margin-bottom: 10px">
                    订单编号：<span style="color: red"><?php echo e($order->orderID); ?></span>
                </div>
                <div>
                    订单状态：<span style="color: red"><?php echo e($order->ddzt); ?></span>
                    <?php if($order->ddzt == "未付款"): ?>
                        <a href="cancelOrder/<?php echo e($order->orderID); ?>">取消</a>
                        <a href="payOrder/<?php echo e($order->orderID); ?>">付款</a>
                    <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr class="heading">
            <td colspan="4">
                订单基本信息
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <div style="margin-bottom: 10px; font-weight: bold; color: red">
                    订货人信息
                </div>
                <div style="margin-bottom: 10px">
                    姓名：<?php echo e($order->mname); ?>

                </div>
                <div style="margin-bottom: 10px">
                    地址：<?php echo e($order->address); ?>

                </div>
                <div style="margin-bottom: 10px">
                    手机：<?php echo e($order->mobile); ?>

                </div>
                <div>
                    邮箱：<?php echo e($order->email); ?>

                </div>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <div style="margin-bottom: 10px; font-weight: bold; color: red">
                    收货人信息
                </div>
                <div style="margin-bottom: 10px">
                    姓名：<?php echo e($orderForCustomer->sname); ?>

                </div>
                <div style="margin-bottom: 10px">
                    地址：<?php echo e($orderForCustomer->address); ?>

                </div>
                <div style="margin-bottom: 10px">
                    手机：<?php echo e($orderForCustomer->mobile); ?>

                </div>
                <div>
                    邮编：<?php echo e($orderForCustomer->zip); ?>

                </div>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <div style="margin-bottom: 10px; font-weight: bold; color: red">
                    其他信息
                </div>
                <div style="margin-bottom: 10px">
                    配送日期：<?php echo e($order->peisongday); ?>&nbsp;
                    时段：<?php echo e($order->peisongtime); ?>

                </div>
                <div style="margin-bottom: 10px">
                    订购时间：<?php echo e($order->inputtime); ?>

                </div>
                <div style="margin-bottom: 10px">
                    付款方式：<?php echo e($order->fkfs); ?>

                </div>
                <div>
                    <?php if($order->peisong == 0): ?>
                        配送区域：市区送货
                    <?php elseif($order->peisong == 30): ?>
                        配送区域：郊区送货
                    <?php else: ?>
                        配送区域：远郊送货
                    <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr class="heading">
            <td colspan="4">
                商品信息
            </td>
        </tr>
        <tr>
            <th>商品名称</th>
            <th>价格</th>
            <th>数量</th>
            <th>小计</th>
        </tr>
        <?php $__currentLoopData = $flowers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><img src="getFlowerImg/<?php echo e($flower->picturem); ?>" width="50px" height="50px"
                         style="margin: auto 5px auto 5px"><?php echo e($flower->fname); ?></td>
                <td>
                    <?php echo e($flower->yourprice); ?>

                </td>
                <td>
                    <?php echo e($flower->num); ?>

                </td>
                <td>
                    <?php 
                    $sum = $flower->yourprice * $flower->num
                     ?>
                    <?php echo e($sum); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td colspan="4" align="right" style="font-weight: bold">
                订单合计金额：<?php echo e($order->shifu); ?>

            </td>
        </tr>
    </table>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
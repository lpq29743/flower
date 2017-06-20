<?php $__env->startSection('head'); ?>
    <title>我的订单</title>
    <style type="text/css">
        .table-order {
            max-width: 800px;
            text-align: center;
            margin: 15px auto 15px auto;
        }

        .table-order caption {
            text-align: center;
            font-size: large;
            font-family: SimSun;
            font-weight: bold;
            color: #0f0f0f;
            background: lightsalmon;
        }

        .table-order th, td {
            text-align: center;
        }

        .td-order {
            text-align: left;
            font-size: medium;
            font-family: KaiTi;
            font-weight: bold;
            color: #0f0f0f;
            background: yellow;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <table class="table table-bordered table-order">
        <caption>我的订单记录</caption>
        <tr>
            <th>宝贝</th>
            <th>单价</th>
            <th>数量</th>
            <th>实付款</th>
            <th>交易状态</th>
            <th>操作</th>
        </tr>
        <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td class="td-order" colspan="6">
                    订单编号：<?php echo e($order->orderID); ?>&nbsp;
                    配送日期：<?php echo e($order->peisongday); ?>&nbsp;
                    收货人：<?php echo e($order->sname); ?>

                </td>
            </tr>
            <?php  $sum=0; ?>
            <?php $__currentLoopData = $flowers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($flower->orderID == $order->orderID): ?>
                    <?php 
                    $sum++;
                     ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php  $count=0; ?>
            <?php $__currentLoopData = $flowers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($flower->orderID == $order->orderID): ?>
                    <tr>
                        <td><img src="getFlowerImg/<?php echo e($flower->picturem); ?>" width="50px" height="50px"
                                 style="margin: auto 5px auto 5px"><?php echo e($flower->fname); ?></td>
                        <td>
                            <span style="text-decoration: line-through"><?php echo e($flower->price); ?></span><br/>
                            <span style="color: blue;"><?php echo e($flower->yourprice); ?></span>
                        </td>
                        <td><?php echo e($flower->num); ?></td>
                        <?php if($count++ == 0): ?>
                            <td rowspan="<?php echo e($sum); ?>"><?php echo e($order->shifu); ?></td>
                            <td rowspan="<?php echo e($sum); ?>">
                                <?php echo e($order->ddzt); ?>

                                <?php if($order->ddzt == "已发货"): ?>
                                    <a href="orderUpdate/<?php echo e($order->orderID); ?>">确认收货</a>
                                <?php endif; ?>
                            </td>
                            <td rowspan="<?php echo e($sum); ?>">
                                <a href="orderDetail?orderID=<?php echo e($order->orderID); ?>">查看</a>
                                <?php if($order->ddzt == "未付款"): ?>
                                    <a href="cancelOrder/<?php echo e($order->orderID); ?>">取消</a>
                                    <a href="payOrder/<?php echo e($order->orderID); ?>">付款</a>
                                <?php elseif($order->ddzt == "已完成"): ?>
                                    <a href="pingjia?orderID=<?php echo e($order->orderID); ?>">评价</a>
                                <?php endif; ?>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>
    </table>
    <div align=center>
        <?php echo e($orders->links()); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
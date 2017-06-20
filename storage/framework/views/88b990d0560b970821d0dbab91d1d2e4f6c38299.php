<?php $__env->startSection('head'); ?>
    <title>所有订单</title>
    <style type="text/css">
        .table-order {
            max-width: 800px;
            text-align: center;
            margin: 15px auto 15px auto;
        }

        .table-order th, td {
            text-align: center;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div align="center">
        <table class="table table-hover table-bordered table-order" style="max-width: 1000px">
            <tr>
                <th>序号</th>
                <th>订单编号</th>
                <th>订阅人</th>
                <th>收货人</th>
                <th>下单时间</th>
                <th>实付</th>
                <th>订单状态</th>
                <th>处理时间</th>
                <th>功能</th>
            </tr>
            <?php  $id=0; ?>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php 
                $id++;
                 ?>
                <tr>
                    <td><?php echo e($id); ?></td>
                    <td><?php echo e($order->orderID); ?></td>
                    <td><?php echo e($order->email); ?></td>
                    <td><?php echo e($order->sname); ?></td>
                    <td><?php echo e($order->inputtime); ?></td>
                    <td><?php echo e($order->shifu); ?></td>
                    <td>
                        <form class="form-inline" action="adminUpdateDdzt" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <input type="hidden" id="orderID" name="orderID" value="<?php echo e($order->orderID); ?>">
                            <select class="form-control" name="ddzt">
                                <option value="已付款"
                                        <?php if($order->ddzt == "已付款"): ?>
                                        selected="true"
                                        <?php endif; ?>>
                                    已付款
                                </option>
                                <option value="已发货"
                                        <?php if($order->ddzt == "已发货"): ?>
                                        selected="true"
                                        <?php endif; ?>>
                                    已发货
                                </option>
                                <option value="已完成"
                                        <?php if($order->ddzt == "已完成"): ?>
                                        selected="true"
                                        <?php endif; ?>>
                                    已完成
                                </option>
                            </select>
                            <button type="submit" class="btn btn-default">修改</button>
                        </form>
                    </td>
                    <td><?php echo e($order->cltime); ?></td>
                    <td><a href="#">详情</a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        <?php if(Session::has('message')): ?>
        alert("<?php echo e(Session::get('message')); ?>");
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminindex', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
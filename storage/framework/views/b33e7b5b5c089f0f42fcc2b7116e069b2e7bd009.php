<?php $__env->startSection('head'); ?>
    <title>评价订单</title>
    <style type="text/css">
        .table-order {
            max-width: 700px;
            margin: 15px auto 15px auto;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__empty_1 = true; $__currentLoopData = $shoplists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shoplist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <form class="form-horizontal" action="pingjiaPost" method="post" enctype="multipart/form-data"
              data-toggle="validator"
              role="form">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" id="SLID" name="SLID" value="<?php echo e($shoplist->SLID); ?>">
            <input type="hidden" id="orderID" name="orderID" value="<?php echo e($shoplist->orderID); ?>">
            <table class="table table-bordered table-order">
                <tr>
                    <td style="text-align: center">
                        <img src="getFlowerImg/<?php echo e($shoplist->picturem); ?>" style="margin: 5px 5px 5px 5px">

                        <p align="center" style="margin: 5px auto auto auto"><?php echo e($shoplist->fname); ?></p>
                    </td>
                    <td>
                        <div style="margin: auto auto 10px 5px">
                            <label class="radio-inline">
                                <input type="radio" name="star" id="star" value="1" checked> 好评
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="star" id="star" value="2"> 中评
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="star" id="star" value="3"> 差评
                            </label>
                        </div>
                        <div style="margin: auto 5px 10px 5px">
                            <textarea class="form-control" rows="6" id="evaluate" name="evaluate"
                                      placeholder="请用简短的文字进行评价" required></textarea>
                        </div>
                        <div class="col-sm-offset-4 col-sm-10">
                            <button type="submit" class="btn btn-default">提交</button>
                        </div>
                </tr>
            </table>
        </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p align="center" style="margin: 15px auto 15px auto">已没有鲜花需要评价</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        <?php if(Session::has('message')): ?>
        alert("<?php echo e(Session::get('message')); ?>");
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
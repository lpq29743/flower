<?php $__env->startSection('head'); ?>
    <title>鲜花管理</title>
    <style type="text/css">
        th, td {
            text-align: center;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div align="center">
        <div align="left" style="width: 60%; margin:15px auto 15px auto;">
            <button type="button" class="btn btn-default" onclick="{location.href='flowerAdd'}">添加鲜花</button>
        </div>
        <table class="table table-hover table-bordered" style="max-width: 800px">
            <tr>
                <th>编号</th>
                <th>商品名称</th>
                <th>市场价</th>
                <th>现价</th>
                <th>删除</th>
            </tr>
            <?php $__currentLoopData = $flowers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($flower->flowerID); ?></td>
                    <td><img src="getFlowerImg/<?php echo e($flower->picturem); ?>" width="50px" height="50px"
                             style="margin: auto 5px auto 5px"><?php echo e($flower->fname); ?></td>
                    <td><?php echo e($flower->price); ?></td>
                    <td>
                        <form class="form-inline" action="flowerUpdate" method="post" enctype="multipart/form-data"
                              data-toggle="validator"
                              role="form">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <input type="hidden" id="flowerID" name="flowerID" value="<?php echo e($flower->flowerID); ?>">

                            <div class="form-group">
                                <input type="number" class="form-control" id="yourprice" name="yourprice"
                                       value="<?php echo e($flower->yourprice); ?>"
                                       required>
                            </div>
                            <button type="submit" class="btn btn-default">更新</button>
                        </form>
                    </td>
                    <td>
                        <form class="form-inline" action="flowerDelete" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <input type="hidden" id="flowerID" name="flowerID" value="<?php echo e($flower->flowerID); ?>">
                            <button type="submit" class="btn btn-default">删除</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
    <div align=center>
        <?php echo e($flowers->links()); ?>

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
<?php $__env->startSection('head'); ?>
    <title>显示鲜花</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <table cellspacing="20" width="700px"
           style="border: 1px dotted; margin: 5px auto 5px auto"
           align=center>
        <?php $__currentLoopData = $flowers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td rowspan="8">
                    <img src="getFlowerImg/<?php echo e($flower->pictureb); ?>" width="150px" height="150px"
                         style="margin: auto 5px auto 5px">
                </td>
                <td>
                    <div style="font-weight: bold; font-size: medium; height: 40px; line-height: 40px; color: #000066; text-align: center; border: 1px solid red;">
                        <a href="flowerDetail?flowerID=<?php echo e($flower->flowerID); ?>"><?php echo e($flower->fname); ?></a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    材料： <?php echo e($flower->cailiao); ?>

                </td>
            </tr>
            <tr>
                <td>
                    包装：<?php echo e($flower->baozhuang); ?>

                </td>
            </tr>
            <tr>
                <td>
                    花语：<?php echo e($flower->huayu); ?>

                </td>
            </tr>
            <tr>
                <td>
                    说明：<?php echo e($flower->shuoming); ?>

                </td>
            </tr>
            <tr>
                <td style="font-size: medium; color: blue; text-decoration: line-through">
                    原价：￥<?php echo e($flower->price); ?>

                </td>
            </tr>
            <tr>
                <td style="font-size: medium; color: red;">
                    现价：￥<?php echo e($flower->yourprice); ?>

                </td>
            </tr>
            <tr>
                <td>
                    <img src="images/ingwc_ico.jpg" width="150px" height="36px"
                         onclick="location.href='addgwch/<?php echo e($flower->flowerID); ?>'"/>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <div align=center>
        <?php echo e($flowers->links()); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('head'); ?>
    <title>鲜花详情</title>
    <style type="text/css">
        .table-pingjia {
            max-width: 850px;
            margin: 15px auto 15px auto;
        }

        .table-pingjia caption {
            text-align: center;
            font-size: large;
            font-family: SimSun;
            font-weight: bold;
            color: #0f0f0f;
            background: lightsalmon;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <table cellspacing="20" width="850px"
           style="margin: 15px auto 15px auto;"
           align=center>
        <tr>
            <td rowspan="8">
                <img src="getFlowerImg/<?php echo e($flower->pictureb); ?>" style="margin: auto 15px auto 15px">
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
    </table>
    <table class="table table-bordered table-pingjia">
        <caption>用户评价</caption>
        <?php $__empty_1 = true; $__currentLoopData = $shoplists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shoplist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td style="text-align: center">
                    <img src="getFlowerImg/<?php echo e($flower->picturem); ?>" width="50px" height="50px"
                         style="margin: 5px 5px 5px 5px">

                    <p align="center" style="margin: 5px auto auto auto"><?php echo e($shoplist->email); ?></p>
                </td>
                <td>
                    <p>整体评价：
                        <?php if($shoplist->star == 1): ?>
                            好评
                        <?php elseif($shoplist->star == 2): ?>
                            中评
                        <?php else: ?>
                            差评
                        <?php endif; ?>
                    </p>

                    <p>
                        评价内容：
                        <?php echo e($shoplist->evaluate); ?>

                    </p>

                    <p>
                        评价时间：
                        <?php echo e($shoplist->cltime); ?>

                    </p>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td align="center">目前还没有用户评价</td>
            </tr>
        <?php endif; ?>
    </table>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
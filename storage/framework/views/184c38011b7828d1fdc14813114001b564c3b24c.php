<?php $__env->startSection('head'); ?>
    <title>购物车</title>
    <style type="text/css">
        th, td {
            text-align: center;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div align="center">
        <img src="images/cartbg1.jpg" style="margin:10px auto 10px auto;"/>
        <?php $__empty_1 = true; $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if($loop->first): ?>
                <table class="table table-hover table-bordered" style="max-width: 800px">
                    <tr>
                        <th>编号</th>
                        <th>商品名称</th>
                        <th>市场价</th>
                        <th>现价</th>
                        <th>数量</th>
                        <th>删除</th>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <td><?php echo e($cart->flowerID); ?></td>
                        <td><img src="getFlowerImg/<?php echo e($cart->picturem); ?>" width="50px" height="50px"
                                 style="margin: auto 5px auto 5px"><?php echo e($cart->fname); ?></td>
                        <td><?php echo e($cart->price); ?></td>
                        <td><?php echo e($cart->yourprice); ?></td>
                        <td>
                            <form class="form-inline" action="cartUpdate" method="post" enctype="multipart/form-data"
                                  data-toggle="validator"
                                  role="form">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input type="hidden" id="cartID" name="cartID" value="<?php echo e($cart->cartID); ?>">

                                <div class="form-group">
                                    <input type="number" class="form-control" id="num" name="num"
                                           value="<?php echo e($cart->num); ?>"
                                           required>
                                </div>
                                <button type="submit" class="btn btn-default">更新</button>
                            </form>
                        </td>
                        <td>
                            <form class="form-inline" action="cartDelete" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input type="hidden" id="cartID" name="cartID" value="<?php echo e($cart->cartID); ?>">
                                <button type="submit" class="btn btn-default">删除</button>
                            </form>
                        </td>
                    </tr>
                    <?php if($loop->last): ?>
                </table>
                <div align="right" style="width: 75%; margin:10px auto 15px auto;">
                    <label style="margin-right: 10px">合计：<?php echo e($sum); ?></label>
                    <button type="button" class="btn btn-default" onclick="{location.href='showFlower'}"
                            style="margin-right: 10px">继续挑选商品
                    </button>
                    <button type="button" class="btn btn-default" onclick="{location.href='cartClear'}"
                            style="margin-right: 10px">清除购物车
                    </button>
                    <button type="button" class="btn btn-default" onclick="{location.href='order'}">提交我的订单</button>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p style="margin: 10px auto 10px auto">您还没有添加任何鲜花呢！快去<a href="showFlower">鲜花页面</a>添加鲜花吧</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        <?php if(Session::has('message')): ?>
        alert("<?php echo e(Session::get('message')); ?>");
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
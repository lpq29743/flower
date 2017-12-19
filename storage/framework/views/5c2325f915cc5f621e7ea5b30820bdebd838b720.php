<?php $__env->startSection('head'); ?>
    <title>登录</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div style="width:25%; margin:10px auto 10px auto;">
        <form class="form-horizontal" action="login" method="post" enctype="multipart/form-data" data-toggle="validator"
              role="form">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

            <div class="form-group">
                <label class="col-sm-3 control-label">Email</label>

                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email地址" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">密码</label>

                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password" placeholder="用户密码"
                           required maxlength="50">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">验证码</label>

                <div class="col-sm-6">
                    <input type="text" class="form-control" id="captcha" name="captcha" placeholder="图片验证码" required>
                </div>
                <div class="col-sm-3">
                    <img src="<?php echo e(captcha_src()); ?>">
                </div>
            </div>
            <?php if(count($errors) > 0): ?>
                <div class="form-group alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if(Session::has('message')): ?>
                <div class="form-group alert alert-danger">
                    <ul>
                        <li><?php echo e(Session::get('message')); ?></li>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-10">
                    <button type="submit" class="btn btn-default">登录</button>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
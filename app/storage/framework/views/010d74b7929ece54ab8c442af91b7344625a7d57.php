<?php $__env->startSection('title'); ?>
    Register
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('/cus/docs.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

    <header style="background: white; color: #18BC9C;">
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 social-buttons">
                    <a class="btn btn-block btn-socials btn-facebook" style="height: 40px" href="<?php echo e(url('/login/facebook')); ?>">
                        <i class="fa fa-facebook"></i>Register from Facebook
                    </a>
                    <a class="btn btn-block btn-socials btn-twitter" style="height: 40px; margin-bottom: 15px;" href="<?php echo e(url('/login/twitter')); ?>">
                        <i class="fa fa-twitter"></i>Register from Twitter
                    </a>

                </div>
                <div class="col-lg-12">
                    <div class="intro-text">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="color: #18BC9C">Register</div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('register')); ?>" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>


                                    <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                        <label for="name" class="col-md-4 control-label">Name</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                            <?php if($errors->has('name')): ?>
                                                <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                            <?php if($errors->has('email')): ?>
                                                <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>


                                    <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                        <label for="password" class="col-md-4 control-label">Password</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" required>

                                            <?php if($errors->has('password')): ?>
                                                <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                                        <label for="username" class="col-md-4 control-label">User name</label>

                                        <div class="col-md-6">
                                            <input id="username" type="text" class="form-control" name="username" value="<?php echo e(old('username')); ?>" required>

                                            <?php if($errors->has('username')): ?>
                                                <span class="help-block">
                                        <strong><?php echo e($errors->first('username')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group<?php echo e($errors->has('pic') ? ' has-error' : ''); ?>">
                                        <label for="pic" class="col-md-4 control-label">Profile picture :</label>

                                        <div class="col-md-6">
                                            <input id="pic" type="file" class="form-control" name="pic" value="<?php echo e(old('pic')); ?>" required>

                                            <?php if($errors->has('pic')): ?>
                                                <span class="help-block">
                                        <strong><?php echo e($errors->first('pic')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
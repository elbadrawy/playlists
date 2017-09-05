<?php $__env->startSection('title'); ?>
    Edit Profile
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

    <header style="background: white; color: #18BC9C;">
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="color: #18BC9C">Edit profile</div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/profile/edit')); ?>" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>


                                    <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                        <label for="name" class="col-md-4 control-label">Name</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name" value="<?php echo e($pass->name); ?>" required autofocus>

                                            <?php if($errors->has('name')): ?>
                                                <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>



                                    <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                        <label for="password" class="col-md-4 control-label">New Password</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" >

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
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                                        </div>
                                    </div>

                                    <div class="form-group<?php echo e($errors->has('pic') ? ' has-error' : ''); ?>">
                                        <label for="pic" class="col-md-4 control-label">Profile picture :</label>

                                        <div class="col-md-6">
                                            <input id="pic" type="file" class="form-control" name="pic" >

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
                                                Edit
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
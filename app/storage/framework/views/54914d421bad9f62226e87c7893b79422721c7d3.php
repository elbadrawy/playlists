<?php $__env->startSection('title'); ?>
    Complete Your Register
<?php $__env->stopSection(); ?>



<?php $__env->startSection('body'); ?>
    <header style="background: white; color: #18BC9C;">
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="color: #18BC9C">Set Your Username</div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/complete')); ?>">
                                    <?php echo e(csrf_field()); ?>


                                    <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                                        <label for="username" class="col-md-4 control-label">Username</label>

                                        <div class="col-md-6">
                                            <input id="username" type="text" class="form-control" name="username" value="<?php echo e(old('username')); ?>" required autofocus>

                                            <?php if($errors->has('username')): ?>
                                                <span class="help-block">
                                        <strong><?php echo e($errors->first('username')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Complete
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
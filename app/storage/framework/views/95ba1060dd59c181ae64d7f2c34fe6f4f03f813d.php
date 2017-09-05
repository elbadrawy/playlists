<?php $__env->startSection('title'); ?>
    Add Playlist
<?php $__env->stopSection(); ?>



<?php $__env->startSection('body'); ?>

    <header style="background: white; color: #18BC9C;">
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="color: #18BC9C">New Playlist</div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/playlist/create')); ?>" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>


                                    <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                        <label for="email" class="col-md-4 control-label">Playlist Name :</label>

                                        <div class="col-md-6">
                                            <input type="text" name="name" class="form-control" maxlength="250">
                                            <?php if($errors->has('pic')): ?>
                                                <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group<?php echo e($errors->has('cat') ? ' has-error' : ''); ?>">
                                        <label for="email" class="col-md-4 control-label">Playlist Category :</label>

                                        <div class="col-md-6">
                                            <select class="form-control kind" name="cat">
                                                <option value="0">Films</option>
                                                <option value="1">Series</option>
                                                <option value="2">Courses</option>
                                                <option value="3">Programs</option>
                                                <option value="4">Games</option>
                                            </select>
                                            <?php if($errors->has('cat')): ?>
                                                <span class="help-block">
                                        <strong><?php echo e($errors->first('cat')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('pic') ? ' has-error' : ''); ?>">
                                        <label for="email" class="col-md-4 control-label">Playlist Poster :</label>

                                        <div class="col-md-6">
                                            <input type="file" name="pic" class="form-control">
                                            <?php if($errors->has('pic')): ?>
                                                <span class="help-block">
                                        <strong><?php echo e($errors->first('pic')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group<?php echo e($errors->has('desc') ? ' has-error' : ''); ?>">
                                        <label for="email" class="col-md-4 control-label">Playlist Description :</label>

                                        <div class="col-md-6">
                                            <textarea name="desc" rows="4" class="form-control"></textarea>
                                            <?php if($errors->has('desc')): ?>
                                                <span class="help-block">
                                        <strong><?php echo e($errors->first('desc')); ?></strong>
                                    </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Add
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

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
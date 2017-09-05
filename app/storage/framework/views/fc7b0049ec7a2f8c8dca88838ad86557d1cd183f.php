<?php $__env->startSection('title'); ?>
    Add list to <?php echo e($name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <style>
        [data-role="dynamic-fields"] > .turbo + .turbo {
            margin-top: 0.5em;
        }

        [data-role="dynamic-fields"] > .turbo [data-role="add"] {
            display: none;
        }

        [data-role="dynamic-fields"] > .turbo:last-child [data-role="add"] {
            display: inline-block;
        }

        [data-role="dynamic-fields"] > .turbo:last-child [data-role="remove"] {
            display: none;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <header style="background: white; color: #18BC9C;">
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="color: #18BC9C">Add list to <?php echo e($name); ?></div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST">
                                    <?php echo e(csrf_field()); ?>


                                                                                <div>
                                                                                    <!-- dynamic -->
                                                                                    <div data-role="dynamic-fields">
                                                                                        <div class="turbo">

                                                                                        <div class="form-group<?php echo e($errors->has('name[]') ? ' has-error' : ''); ?>">
                                                                                            <label for="name" class="col-md-4 control-label"><?php if($cat == 0): ?>Film <?php elseif($cat == 1): ?>Series <?php elseif($cat == 2): ?>Course <?php elseif($cat == 3): ?>Program <?php elseif($cat == 4): ?>Game <?php endif; ?> Name</label>

                                                                                            <div class="col-md-6">
                                                                                                <input type="text" name="name[]" class="form-control" maxlength="250" required>
                                                                                                <?php if($errors->has('name[]')): ?>
                                                                                                    <span class="help-block">
                                                                                <strong><?php echo e($errors->first('name[]')); ?></strong>
                                                                            </span>
                                                                                                <?php endif; ?>
                                                                                            </div>
                                                                                            </div>



                                                                                        <div class="form-group<?php echo e($errors->has('url[]') ? ' has-error' : ''); ?>">

                                                                                                        <label for="url" class="col-md-4 control-label">URL :</label>
                                                                                                        <div class="col-md-6">
                                                                                                            <input type="url" name="url[]" class="form-control" maxlength="250" required>

                                                                                                            <?php if($errors->has('url[]')): ?>
                                                                                                                <span class="help-block">
                                                                                <strong><?php echo e($errors->first('url[]')); ?></strong>
                                                                            </span>
                                                                                                            <?php endif; ?>
                                                                                                        </div>

                                                                                                </div>


                                                                                                <div class="form-group">
                                                                                                    <div class="col-md-8">
                                                                                                        <button class="btn btn-danger btn-sm" data-role="remove">
                                                                                                            <span>  Remove <a class="fa fa-minus"></a></span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <div class="col-md-8">
                                                                                                        <button class="btn btn-primary btn-sm" data-role="add">
                                                                                                            <span>  Add More <a class="fa fa-plus"></a></span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                </div>
                                                                                        </div>
                                                                                        </div>
                                                                                </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary btn-lg">
                                                Add
                                            </button>
                                        </div>
                                    </div>
                                                                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script type="text/javascript">

        $(function() {
            // Remove button click
            $(document).on(
                'click',
                '[data-role="dynamic-fields"] > .turbo [data-role="remove"]',
                function(e) {
                    e.preventDefault();
                    $(this).closest('.turbo').remove();
                }
            );
            // Add button click
            $(document).on(
                'click',
                '[data-role="dynamic-fields"] > .turbo [data-role="add"]',
                function(e) {
                    e.preventDefault();
                    var container = $(this).closest('[data-role="dynamic-fields"]');
                    new_field_group = container.children().filter('.turbo:first-child').clone();
                    new_field_group.find('input').each(function(){
                        $(this).val('');
                    });
                    container.append(new_field_group);
                }
            );
        });



        $(document).ready(function(){
            //@naresh  action dynamic childs
            var next_exp = 0;
            $("#add-more").click(function(e){
                e.preventDefault();
                var addto = "#fielda" + next_exp;
                var addRemove = "#fielda" + (next_exp);
                next_exp = next_exp + 1;
                var newInp = '<div id="fielda'+ next_exp +'" name="field1'+ next_exp +'';
                var newInput = $(newInp);

                var removeBtn = '<div class="form-group"><button id="remove' + (next_exp - 1) + '" class="btn btn-danger remove-me" >Remove</button></div></div></div><div id="field">';
                var removeButton = $(removeBtn);
                $(addto).after(newInput);
                $(addRemove).after(removeButton);
                $("#fielda" + next_exp).attr('data-source',$(addto).attr('data-source'));
                $("#count").val(next_exp);

                $('.remove-me').click(function(e){
                    e.preventDefault();
                    var fieldNum = this.id.charAt(this.id.length-1);
                    var fieldID = "#fielda" + fieldNum;
                    $(this).remove();
                    $(fieldID).remove();
                });
            });



        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
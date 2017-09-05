<?php $__env->startSection('title'); ?>
    <?php echo e($find->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('css/profile.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <header style="background: white; color: #18BC9C;">
        <div class="container">


            <div class="">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2><?php echo e($find->name); ?></h2>
                            <hr class="star-primary">
                            <img src="<?php echo e(asset($find->pic)); ?>" style=" width: 400px; height: 300px" class="img-thumbnail img-centered" width="300" height="500" alt="">
                            <div class="col-md-8 col-md-offset-2">
                                <ul class="list-inline item-details">
                                    <li>User :
                                        <strong><a href="<?php echo e(url('/user/'.$find->user->username)); ?>"><span> @</span><?php echo e($find->user->username); ?></a>
                                        </strong>
                                    </li>
                                    <li>shares:
                                        <strong><a><?php echo e(count($find->share)); ?></a>
                                        </strong>
                                    </li>
                                    <li>Category :
                                        <strong><a href="#">
                                                <?php if($find->cat == 0): ?>
                                                    Movies
                                                <?php elseif($find->cat == 1): ?>
                                                    Series
                                                <?php elseif($find->cat == 2): ?>
                                                    Courses
                                                <?php elseif($find->cat == 3): ?>
                                                    Programs
                                                <?php elseif($find->cat == 4): ?>
                                                    Games
                                                <?php endif; ?>
                                            </a>
                                        </strong>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-md-offset-4">
                                <div id="<?php echo e($find->id); ?>" class="avg"></div>
                                <div class="rateYo" id="<?php echo e($find->id); ?>"></div>



                                <?php if(Auth::id() != $find->user_id and Auth::check()): ?>
                                    <?php if(count($find->like) > 0): ?>
                                        <?php $__currentLoopData = $find->like; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($like->user_id == Auth::id()): ?>
                                                <div class="like-btn like-h" style="width: 150px" id="<?php echo e($find->id); ?>">Like</div>
                                                <?php break; ?>
                                            <?php elseif($loop->last): ?>
                                                <div class="like-btn" style="width: 150px" id="<?php echo e($find->id); ?>">Like</div>
                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <div class="like-btn" style="width: 150px" id="<?php echo e($find->id); ?>">Like</div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if(Auth::id() != $find->user_id and Auth::check()): ?>
                                    <?php if(count($find->share) > 0): ?>
                                        <?php $__currentLoopData = $find->share; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $share): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($share->user_id == Auth::id()): ?>
                                                <div class="share share-h" style="width: 150px" id="<?php echo e($find->id); ?>">
                                                    <i class="fa fa-share"></i>
                                                    <spans>Share</spans>
                                                </div>
                                                <?php break; ?>
                                            <?php elseif($loop->last): ?>
                                                <div class="share" style="width: 150px" id="<?php echo e($find->id); ?>">
                                                    <i class="fa fa-share"></i>
                                                    <spans>Share</spans>
                                                </div>
                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <div class="share" style="width: 150px" id="<?php echo e($find->id); ?>">
                                            <i class="fa fa-share"></i>
                                            <spans>Share</spans>
                                        </div>
                                    <?php endif; ?>

                                <?php endif; ?>
                            </div>

                            <div class="col-md-12" style="margin-left: -20px">
                                <h3>Description : </h3>
                                <p><?php echo e($find->description); ?></p>
                                <h3>List : </h3>
                                <ul class="sidebarservices">
                                    <?php $__currentLoopData = $find->content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li id="fade<?php echo e($content->id); ?>"><p><a href="<?php echo e($content->url); ?>"><?php echo e($content->name); ?></a>
                                                <?php if($find->user_id == Auth::id()): ?>
                                                    <a class="btn btn-danger pull-right list-delete" id="<?php echo e($content->id); ?>">X</a>
                                                <?php endif; ?>
                                            </p></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>


                            </div>
                            <?php if(Auth::id() == $find->user_id): ?>
                                <div class="col-md-4">
                                    <a class="btn btn-primary" href="<?php echo e(url('/playlist/create/'.$find->id)); ?>">Add more</a>
                                </div>
                                <div class="col-md-4 pull-right">
                                    <a class="btn btn-danger delete-play" href="<?php echo e(url('/playlist/delete/'.$find->id)); ?>">Delete playList</a>
                                </div>

                            <?php endif; ?>
                            <div class="col-md-4">
                            <button class="btn clip" data-clipboard-text="<?php echo e(url('/playlist/show/').'/'.$find->id); ?>">
                                Copy link to clipboard
                            </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script>

        $(function () {

            $(".avg").each(function () {
                var send = { tu: this.id, po:''};

                $.ajax({
                    type:"GET",
                    url:"/rate/"+send.tu,
                    data:"",
                    success:function (result) {
                        send.po= result;
                        turbo(send);
                    }
                });


            });
        });

        function turbo(send) {
            $(".rateYo").each(function () {
                if(send.tu == this.id)
                {
                    $(this).rateYo({
                        rating: send.po,
                        multiColor: {

                            "startColor": "#FF0000", //RED
                            "endColor"  : "#00FF00"  //GREEN
                        },
                        <?php if(Auth::check()): ?>
                        onSet: function (rating, rateYoInstance) {
                            $.ajax({
                                type:"POST",
                                url:"/rate/set/"+send.tu,
                                data:{
                                    _token: "<?php echo e(csrf_token()); ?>",
                                    rating:rating
                                },
                                success: function () {

                                }
                            })
                        },
                        <?php else: ?>
                        readOnly: true
                        <?php endif; ?>
                    });
                }
            })

        }






    </script>

    <script>
        $(document).ready(function() {
            $(".btn-pref .btn").click(function () {
                $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
                // $(".tab").addClass("active"); // instead of this do the below
                $(this).removeClass("btn-default").addClass("btn-primary");
            });
        });
    </script>
    <script>
        $(function(){

            $('.like-btn').click(function(){
                var id = this.id;
                if ($(this).hasClass('like-h'))
                {

                }else
                {
                    $(this).addClass('like-h');
                    $.ajax({
                        type:"GET",
                        url:"/like/"+id,
                        data:'',
                        success: function(){
                        }
                    });
                }
            });
            $('.share-btn').click(function(){
                $('.share-cnt').toggle();
            });
        });
    </script>

    <script>
        $(function () {
            $('.share').click(function () {
                var id = this.id;
                if ($(this).hasClass('share-h'))
                {

                }else {
                    $(this).addClass('share-h');
                    $.ajax({
                        type: "GET",
                        url: "/share/" + id,
                        data: '',
                        success: function () {

                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(function () {
            $('.list-delete').click(function () {
                var id = this.id;
                $.ajax({
                    type:"GET",
                    url: "<?php echo e(url('/list/delete/')); ?>/"+id,
                    data:'',
                    success: function (data)  {
                        if (data == "true"){
                            $('#fade'+id).fadeOut('500');
                        }else{


                        }
                    }
                })
            })

        })
    </script>
    <script>

        $(function(){
            $('.delete-play').click(function() {
                var result = confirm("Want to delete ?");
                if(result)
                {
                    return true;
                }else
                {
                    return false;
                }
            });
        })
    </script>
<script>
    new Clipboard('.clip');
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
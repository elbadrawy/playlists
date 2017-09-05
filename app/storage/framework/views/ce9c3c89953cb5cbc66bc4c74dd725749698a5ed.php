<?php $__env->startSection('title'); ?>
    Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('css/profile.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <header>
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive img-thumbnail img-circle" width="500px" src="img/profile1.png" alt="">
                    <div class="intro-text">
                        <h1 class="name">Search for Playlists :)</h1>
                        <hr class="star-light">
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form method="POST" action="<?php echo e(url('/')); ?>">
                        <?php echo e(csrf_field()); ?>

                    <label for="id_label_single">
                        Searching for
                    </label>
                    <select class="js-example-basic-single js-states form-control" name="cat" id="id_label_single" style="width: 50%">
                        <option value=""></option>
                        <option value="0">Movies</option>
                        <option value="1">Series</option>
                        <option value="2">Courses</option>
                        <option value="3">Programs</option>
                        <option value="4">Games</option>
                    </select>

                    <label for="id_label_single1">
                        By

                    <select class="js-example-basic-single js-states form-control" name="by" id="id_label_single1">
                        <option value=""></option>
                        <option value="0">Rates</option>
                        <option value="1">Likes</option>
                        <option value="2">Shares</option>
                    </select>
                    </label>
                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>

    </header>


    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Playlists</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $get; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $play): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal<?php echo e($play->id); ?>" class="portfolio-link" data-toggle="modal">
                        <div class="caption">

                            <div class="caption-content">
                                <div class="col-md-12">
                                <i class="fa fa-search-plus fa-2x">
                                    <br>
                                    <?php echo e($play->name); ?></i>
                                </div>
                            </div>
                        </div>
                        <img src="<?php echo e(asset($play->pic)); ?>" width="400" height="300" style="height: 300px;" class="img-responsive" alt="Cabin">
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>
        </div>
        <div class="col-md-4 col-md-offset-4">
            <?php echo e($get->links()); ?>

        </div>
    </section>


    <!-- popups -->
    <?php $__currentLoopData = $get; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $play): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="portfolio-modal modal fade" id="portfolioModal<?php echo e($play->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2><?php echo e($play->name); ?></h2>
                                <hr class="star-primary">
                                <img src="<?php echo e(asset($play->pic)); ?>" style=" width: 400px; height: 300px" class="img-thumbnail img-centered" width="300" height="500" alt="">
                                <div class="col-md-8 col-md-offset-2">
                                    <ul class="list-inline item-details">
                                        <li>User :
                                            <strong><a href="<?php echo e(url('/user/'.$play->user->username)); ?>"><span> @</span><?php echo e($play->user->username); ?></a>
                                            </strong>
                                        </li>
                                        <li>shares:
                                            <strong><a><?php echo e(count($play->share)); ?></a>
                                            </strong>
                                        </li>
                                        <li>Category :
                                            <strong><a href="#">
                                                    <?php if($play->cat == 0): ?>
                                                        Movies
                                                    <?php elseif($play->cat == 1): ?>
                                                        Series
                                                    <?php elseif($play->cat == 2): ?>
                                                        Courses
                                                    <?php elseif($play->cat == 3): ?>
                                                        Programs
                                                    <?php elseif($play->cat == 4): ?>
                                                        Games
                                                    <?php endif; ?>
                                                </a>
                                            </strong>
                                        </li>
                                        <li>Link:
                                            <a href="<?php echo e(url('/playlist/show/')."/".$play->id); ?>"><?php echo e($play->name); ?></a>

                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-md-offset-5">
                                    <div id="<?php echo e($play->id); ?>" class="avg"></div>
                                    <div class="rateYo" id="<?php echo e($play->id); ?>"></div>



                                    <?php if(Auth::id() != $play->user_id and Auth::check()): ?>
                                        <?php if(count($play->like) > 0): ?>
                                            <?php $__currentLoopData = $play->like; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($like->user_id == Auth::id()): ?>
                                                    <div class="like-btn like-h" style="width: 150px" id="<?php echo e($play->id); ?>">Like</div>
                                                    <?php break; ?>
                                                <?php elseif($loop->last): ?>
                                                    <div class="like-btn" style="width: 150px" id="<?php echo e($play->id); ?>">Like</div>
                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <div class="like-btn" style="width: 150px" id="<?php echo e($play->id); ?>">Like</div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(Auth::id() != $play->user_id and Auth::check()): ?>
                                        <?php if(count($play->share) > 0): ?>
                                            <?php $__currentLoopData = $play->share; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $share): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($share->user_id == Auth::id()): ?>
                                                    <div class="share share-h" style="width: 150px" id="<?php echo e($play->id); ?>">
                                                        <i class="fa fa-share"></i>
                                                        <spans>Share</spans>
                                                    </div>
                                                    <?php break; ?>
                                                <?php elseif($loop->last): ?>
                                                    <div class="share" style="width: 150px" id="<?php echo e($play->id); ?>">
                                                        <i class="fa fa-share"></i>
                                                        <spans>Share</spans>
                                                    </div>
                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <div class="share" style="width: 150px" id="<?php echo e($play->id); ?>">
                                                <i class="fa fa-share"></i>
                                                <spans>Share</spans>
                                            </div>
                                        <?php endif; ?>

                                    <?php endif; ?>
                                </div>

                                <div class="col-md-12">
                                    <h3>Description : </h3>
                                    <p><?php echo e($play->description); ?></p>
                                    <h3>List : </h3>
                                    <ul class="sidebarservices">
                                        <?php $__currentLoopData = $play->content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li id="fade<?php echo e($content->id); ?>"><p><a href="<?php echo e($content->url); ?>"><?php echo e($content->name); ?></a>
                                                    <?php if($play->user_id == Auth::id()): ?>
                                                        <a class="btn btn-danger pull-right list-delete" id="<?php echo e($content->id); ?>">X</a>
                                                    <?php endif; ?>
                                                </p></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>


                                </div>
                                <?php if(Auth::id() == $play->user_id): ?>
                                    <div class="col-md-4">
                                        <a class="btn btn-primary" href="<?php echo e(url('/playlist/create/'.$play->id)); ?>">Add more</a>
                                    </div>
                                    <div class="col-md-4 pull-right">
                                        <a class="btn btn-danger delete-play" href="<?php echo e(url('/playlist/delete/'.$play->id)); ?>">Delete PlayList</a>
                                    </div>
                                <?php endif; ?>

                                <div class="col-md-12">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script type="text/javascript">
        $('select').select2();
    </script>
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
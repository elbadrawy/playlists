<?php $__env->startSection('title'); ?>
    <?php echo e($find->username); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link href="<?php echo e(asset('css/profile.css')); ?>" rel="stylesheet">

    <?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<header style="background: white; color: #18BC9C;">
    <div class="container">
    <div class="card hovercard">
        <div class="row" style="height: 150px">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="<?php echo e(asset($find->pic)); ?>">
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>

    </div>
        <div class="useravatar">
            <img alt="" src="<?php echo e(asset($find->pic)); ?>">
        </div>
        <div class="col-md-12" style="margin-top: 20px">
        <div class="card-info"> <span class="badge" style="font-size: 18px; font-family: Serif; font-style: italic"><?php echo e($find->name); ?></span></div>
        </div>
        <div class="col-md-12">
            <?php if(Auth::id() == $find->id): ?>
            <div class="pull-right"><a class="btn btn-primary" href="<?php echo e(url('/profile/edit')); ?>">Edit Profile</a></div>
            <?php endif; ?>
        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">Playlists</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <div class="hidden-xs">Likes</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Shares</div>
            </button>
        </div>
    </div>

    <div class="well">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab1">
                <section id="portfolio">
                        <div class="row" style="margin-top: -50px">
                            <?php if(count($find->playlist) > 0): ?>
                            <?php $__currentLoopData = $find->playlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $playlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-4 portfolio-item">
                                <a href="#portfolioModal<?php echo e($playlist->id); ?>" class="portfolio-link" data-toggle="modal">
                                    <div class="caption">
                                        <div class="caption-content">
                                            <i class="fa fa-search-plus fa-3x"></i>
                                        </div>
                                    </div>
                                    <img src="<?php echo e(asset($playlist->pic)); ?>" width="300" height="300" style="height: 300px;" class="img-responsive" alt="Cabin">
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <h3>
                                    <?php if(Auth::id() == $find->id): ?>
                                        You haven't
                                    <?php else: ?>
                                        This user haven't
                                    <?php endif; ?>
                                      any playlists</h3>
                            <?php endif; ?>
                        </div>
                </section>
            </div>
            <div class="tab-pane fade in" id="tab2">
                <section id="portfolio">
                    <div class="row" style="margin-top: -50px">
                        <?php if(count($find->like) > 0): ?>
                        <?php $__currentLoopData = $find->like; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-4 portfolio-item">
                                <a href="#portfolioModal<?php echo e($like->playlist->id); ?>" class="portfolio-link" data-toggle="modal">
                                    <div class="caption">
                                        <div class="caption-content">
                                            <i class="fa fa-search-plus fa-3x"></i>
                                        </div>
                                    </div>
                                    <img src="<?php echo e(asset($like->playlist->pic)); ?>" width="300" height="300" style="height: 300px;" class="img-responsive" alt="Cabin">
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <h3>
                                <?php if(Auth::id() == $find->id): ?>
                                    You Don't
                                <?php else: ?>
                                    This user didn't
                                <?php endif; ?>
                                like any playlists</h3>
                        <?php endif; ?>
                    </div>
                </section>
            </div>
            <div class="tab-pane fade in" id="tab3">
                <section id="portfolio">
                    <div class="row" style="margin-top: -50px">
                        <?php if(count($find->share) > 0): ?>
                        <?php $__currentLoopData = $find->share; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $share): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-4 portfolio-item">
                                <a href="#portfolioModal<?php echo e($share->playlist->id); ?>" class="portfolio-link" data-toggle="modal">
                                    <div class="caption">
                                        <div class="caption-content">
                                            <i class="fa fa-search-plus fa-3x"></i>
                                        </div>
                                    </div>
                                    <img src="<?php echo e(asset($share->playlist->pic)); ?>" width="300" height="300" style="height: 300px;" class="img-responsive" alt="Cabin">
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <h3>
                                <?php if(Auth::id() == $find->id): ?>
                                    You Don't
                                <?php else: ?>
                                    This user didn't
                                <?php endif; ?>
                                 share any playlists</h3>
                        <?php endif; ?>                    </div>
                </section>
            </div>
        </div>
    </div>
        <?php $__currentLoopData = $find->playlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $play): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                            <strong><a href="<?php echo e(url('/playlist/show/')."/".$play->id); ?>"><?php echo e($play->name); ?></a></strong>

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
        <?php $__currentLoopData = $find->like; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $likes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="portfolio-modal modal fade" id="portfolioModal<?php echo e($likes->playlist->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <h2><?php echo e($likes->playlist->name); ?></h2>
                                    <hr class="star-primary">
                                    <img src="<?php echo e(asset($likes->playlist->pic)); ?>" style=" width: 400px; height: 300px" class="img-thumbnail img-centered" width="300" height="500" alt="">
                                    <div class="col-md-8 col-md-offset-2">
                                        <ul class="list-inline item-details">
                                            <li>User :
                                                <strong><a href="<?php echo e(url('/user/'.$likes->playlist->user->username)); ?>"><span> @</span><?php echo e($likes->playlist->user->username); ?></a>
                                                </strong>
                                            </li>
                                            <li>shares:
                                                <strong><a><?php echo e(count($likes->playlist->share)); ?></a>
                                                </strong>
                                            </li>
                                            <li>Category :
                                                <strong><a href="#">
                                                        <?php if($likes->playlist->cat == 0): ?>
                                                            Movies
                                                        <?php elseif($likes->playlist->cat == 1): ?>
                                                            Series
                                                        <?php elseif($likes->playlist->cat == 2): ?>
                                                            Courses
                                                        <?php elseif($likes->playlist->cat == 3): ?>
                                                            Programs
                                                        <?php elseif($likes->playlist->cat == 4): ?>
                                                            Games
                                                        <?php endif; ?>
                                                    </a>
                                                </strong>
                                            </li>
                                            <li>Link:
                                                <strong><a href="<?php echo e(url('/playlist/show/')."/".$likes->playlist->id); ?>"><?php echo e($likes->playlist->name); ?></a></strong>

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3 col-md-offset-5">
                                        <div id="<?php echo e($likes->playlist->id); ?>" class="avg"></div>
                                        <div class="rateYo" id="<?php echo e($likes->playlist->id); ?>"></div>



                                        <?php if(Auth::id() != $likes->playlist->user_id and Auth::check()): ?>
                                            <?php if(count($likes) > 0): ?>
                                                   <?php if($likes->user_id == Auth::id()): ?>
                                                        <div class="like-btn like-h" style="width: 150px" id="<?php echo e($likes->playlist->id); ?>">Like</div>
                                                       <?php else: ?>
                                                    <div class="like-btn" style="width: 150px" id="<?php echo e($likes->playlist->id); ?>">Like </div>
                                                <?php endif; ?>
                                             <?php else: ?>
                                                <div class="like-btn" style="width: 150px" id="<?php echo e($likes->playlist->id); ?>">Like</div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(Auth::id() != $likes->playlist->user_id and Auth::check()): ?>
                                            <?php if(count($likes->playlist->share) > 0): ?>
                                                <?php $__currentLoopData = $likes->playlist->share; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $share): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($share->user_id == Auth::id()): ?>
                                                        <div class="share share-h" style="width: 150px" id="<?php echo e($likes->playlist->id); ?>">
                                                            <i class="fa fa-share"></i>
                                                            <spans>Share</spans>
                                                        </div>
                                                        <?php break; ?>
                                                    <?php elseif($loop->last): ?>
                                                        <div class="share" style="width: 150px" id="<?php echo e($likes->playlist->id); ?>">
                                                            <i class="fa fa-share"></i>
                                                            <spans>Share</spans>
                                                        </div>
                                                    <?php endif; ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <div class="share" style="width: 150px" id="<?php echo e($likes->playlist->id); ?>">
                                                    <i class="fa fa-share"></i>
                                                    <spans>Share</spans>
                                                </div>
                                            <?php endif; ?>

                                        <?php endif; ?>
                                    </div>

                                    <div class="col-md-12">
                                        <h3>Description : </h3>
                                        <p><?php echo e($likes->playlist->description); ?></p>
                                        <h3>List : </h3>
                                        <ul class="sidebarservices">
                                            <?php $__currentLoopData = $likes->playlist->content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><p><a href="<?php echo e($content->url); ?>"><?php echo e($content->name); ?></a>
                                                        <?php if($likes->playlist->user_id == Auth::id()): ?>
                                                            <a class="btn btn-danger pull-right list-delete" id="<?php echo e($content->id); ?>">X</a>
                                                        <?php endif; ?>
                                                    </p></li>


                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>


                                    </div>
                                    <?php if(Auth::id() == $likes->playlist->user_id): ?>
                                        <div class="col-md-4">
                                            <a class="btn btn-primary" href="<?php echo e(url('/playlist/create/'.$likes->playlist->id)); ?>">Add more</a>
                                        </div>
                                        <div class="col-md-4 pull-right">
                                            <a class="btn btn-danger delete-play" href="<?php echo e(url('/playlist/delete/'.$likes->playlist->id)); ?>">Delete PlayList</a>
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
        <?php $__currentLoopData = $find->share; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shares): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="portfolio-modal modal fade" id="portfolioModal<?php echo e($shares->playlist->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <h2><?php echo e($shares->playlist->name); ?></h2>
                                    <hr class="star-primary">
                                    <img src="<?php echo e(asset($shares->playlist->pic)); ?>" style=" width: 400px; height: 300px" class="img-thumbnail img-centered" width="300" height="500" alt="">
                                    <div class="col-md-8 col-md-offset-2">
                                        <ul class="list-inline item-details">
                                            <li>User :
                                                <strong><a href="<?php echo e(url('/user/'.$shares->playlist->user->username)); ?>"><span> @</span><?php echo e($shares->playlist->user->username); ?></a>
                                                </strong>
                                            </li>
                                            <li>shares:
                                                <strong><a><?php echo e(count($shares)); ?></a>
                                                </strong>
                                            </li>
                                            <li>Category :
                                                <strong><a href="#">
                                                        <?php if($share->playlist->cat == 0): ?>
                                                            Movies
                                                        <?php elseif($shares->playlist->cat == 1): ?>
                                                            Series
                                                        <?php elseif($shares->playlist->cat == 2): ?>
                                                            Courses
                                                        <?php elseif($shares->playlist->cat == 3): ?>
                                                            Programs
                                                        <?php elseif($shares->playlist->cat == 4): ?>
                                                            Games
                                                        <?php endif; ?>
                                                    </a>
                                                </strong>
                                            </li>
                                            <li>Link:
                                                <strong><a href="<?php echo e(url('/playlist/show/')."/".$shares->playlist->id); ?>"><?php echo e($shares->playlist->name); ?></a></strong>

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3 col-md-offset-5">
                                        <div id="<?php echo e($shares->playlist->id); ?>" class="avg"></div>
                                        <div class="rateYo" id="<?php echo e($shares->playlist->id); ?>"></div>



                                        <?php if(Auth::id() != $shares->playlist->user_id and Auth::check()): ?>
                                            <?php if(count($shares->playlist->like) > 0): ?>
                                                <?php $__currentLoopData = $shares->playlist->like; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $liket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($liket->user_id == Auth::id()): ?>
                                                        <div class="like-btn like-h" style="width: 150px" id="<?php echo e($shares->playlist->id); ?>">Like</div>
                                                        <?php break; ?>
                                                    <?php elseif($loop->last): ?>
                                                        <div class="like-btn" style="width: 150px" id="<?php echo e($shares->playlist->id); ?>">Like</div>
                                                    <?php endif; ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <div class="like-btn" style="width: 150px" id="<?php echo e($shares->playlist->id); ?>">Like</div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(Auth::id() != $shares->playlist->user_id and Auth::check()): ?>
                                            <?php if(count($shares) > 0): ?>
                                                    <?php if($shares->user_id == Auth::id()): ?>
                                                        <div class="share share-h" style="width: 150px" id="<?php echo e($shares->playlist->id); ?>">
                                                            <i class="fa fa-share"></i>
                                                            <spans>Share</spans>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="share" style="width: 150px" id="<?php echo e($shares->playlist->id); ?>">
                                                            <i class="fa fa-share"></i>
                                                            <spans>Share</spans>
                                                        </div>
                                                    <?php endif; ?>
                                            <?php else: ?>
                                                <div class="share" style="width: 150px" id="<?php echo e($likes->playlist->id); ?>">
                                                    <i class="fa fa-share"></i>
                                                    <spans>Share</spans>
                                                </div>
                                            <?php endif; ?>

                                        <?php endif; ?>
                                    </div>

                                    <div class="col-md-12">
                                        <h3>Description : </h3>
                                        <p><?php echo e($shares->playlist->description); ?></p>
                                        <h3>List : </h3>
                                        <ul class="sidebarservices">
                                            <?php $__currentLoopData = $shares->playlist->content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contentss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><p><a href="<?php echo e($contentss->url); ?>"><?php echo e($contentss->name); ?></a>
                                                        <?php if($shares->playlist->user_id == Auth::id()): ?>
                                                            <a class="btn btn-danger pull-right list-delete" id="<?php echo e($contentss->id); ?>">X</a>
                                                        <?php endif; ?>
                                                    </p></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>


                                    </div>
                                    <?php if(Auth::id() == $shares->playlist->user_id): ?>
                                        <div class="col-md-4">
                                            <a class="btn btn-primary" href="<?php echo e(url('/playlist/create/'.$shares->playlist->id)); ?>">Add more</a>
                                        </div>
                                        <div class="col-md-4 pull-right">
                                            <a class="btn btn-danger delete-play" href="<?php echo e(url('/playlist/delete/'.$shares->playlist->id)); ?>">Delete PlayList</a>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
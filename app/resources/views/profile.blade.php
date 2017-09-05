@extends('layouts.index')
@section('title')
    {{$find->username}}
@endsection
@section('style')
    <link href="{{asset('css/profile.css')}}" rel="stylesheet">

    @endsection

@section('body')
<header style="background: white; color: #18BC9C;">
    <div class="container">
    <div class="card hovercard">
        <div class="row" style="height: 150px">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="{{asset($find->pic)}}">
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>

    </div>
        <div class="useravatar">
            <img alt="" src="{{asset($find->pic)}}">
        </div>
        <div class="col-md-12" style="margin-top: 20px">
        <div class="card-info"> <span class="badge" style="font-size: 18px; font-family: Serif; font-style: italic">{{$find->name}}</span></div>
        </div>
        <div class="col-md-12">
            @if(Auth::id() == $find->id)
            <div class="pull-right"><a class="btn btn-primary" href="{{url('/profile/edit')}}">Edit Profile</a></div>
            @endif
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
                            @if(count($find->playlist) > 0)
                            @foreach($find->playlist as $playlist)
                            <div class="col-sm-4 portfolio-item">
                                <a href="#portfolioModal{{$playlist->id}}" class="portfolio-link" data-toggle="modal">
                                    <div class="caption">
                                        <div class="caption-content">
                                            <i class="fa fa-search-plus fa-3x"></i>
                                        </div>
                                    </div>
                                    <img src="{{asset($playlist->pic)}}" width="300" height="300" style="height: 300px;" class="img-responsive" alt="Cabin">
                                </a>
                            </div>
                            @endforeach
                            @else
                                <h3>
                                    @if(Auth::id() == $find->id)
                                        You haven't
                                    @else
                                        This user haven't
                                    @endif
                                      any playlists</h3>
                            @endif
                        </div>
                </section>
            </div>
            <div class="tab-pane fade in" id="tab2">
                <section id="portfolio">
                    <div class="row" style="margin-top: -50px">
                        @if(count($find->like) > 0)
                        @foreach($find->like as $like)
                            <div class="col-sm-4 portfolio-item">
                                <a href="#portfolioModal{{$like->playlist->id}}" class="portfolio-link" data-toggle="modal">
                                    <div class="caption">
                                        <div class="caption-content">
                                            <i class="fa fa-search-plus fa-3x"></i>
                                        </div>
                                    </div>
                                    <img src="{{asset($like->playlist->pic)}}" width="300" height="300" style="height: 300px;" class="img-responsive" alt="Cabin">
                                </a>
                            </div>
                        @endforeach
                        @else
                            <h3>
                                @if(Auth::id() == $find->id)
                                    You Don't
                                @else
                                    This user didn't
                                @endif
                                like any playlists</h3>
                        @endif
                    </div>
                </section>
            </div>
            <div class="tab-pane fade in" id="tab3">
                <section id="portfolio">
                    <div class="row" style="margin-top: -50px">
                        @if(count($find->share) > 0)
                        @foreach($find->share as $share)
                            <div class="col-sm-4 portfolio-item">
                                <a href="#portfolioModal{{$share->playlist->id}}" class="portfolio-link" data-toggle="modal">
                                    <div class="caption">
                                        <div class="caption-content">
                                            <i class="fa fa-search-plus fa-3x"></i>
                                        </div>
                                    </div>
                                    <img src="{{asset($share->playlist->pic)}}" width="300" height="300" style="height: 300px;" class="img-responsive" alt="Cabin">
                                </a>
                            </div>
                            @endforeach
                        @else
                            <h3>
                                @if(Auth::id() == $find->id)
                                    You Don't
                                @else
                                    This user didn't
                                @endif
                                 share any playlists</h3>
                        @endif                    </div>
                </section>
            </div>
        </div>
    </div>
        @foreach($find->playlist as $play)
            <div class="portfolio-modal modal fade" id="portfolioModal{{$play->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <h2>{{$play->name}}</h2>
                                    <hr class="star-primary">
                                    <img src="{{asset($play->pic)}}" style=" width: 400px; height: 300px" class="img-thumbnail img-centered" width="300" height="500" alt="">
                                    <div class="col-md-8 col-md-offset-2">
                                    <ul class="list-inline item-details">
                                        <li>User :
                                            <strong><a href="{{url('/user/'.$play->user->username)}}"><span> @</span>{{$play->user->username}}</a>
                                            </strong>
                                        </li>
                                        <li>shares:
                                            <strong><a>{{count($play->share)}}</a>
                                            </strong>
                                        </li>
                                        <li>Category :
                                            <strong><a href="#">
                                                    @if($play->cat == 0)
                                                        Movies
                                                    @elseif($play->cat == 1)
                                                        Series
                                                    @elseif($play->cat == 2)
                                                        Courses
                                                    @elseif($play->cat == 3)
                                                        Programs
                                                    @elseif($play->cat == 4)
                                                        Games
                                                    @endif
                                                </a>
                                            </strong>
                                        </li>
                                        <li>Link:
                                            <strong><a href="{{url('/playlist/show/')."/".$play->id}}">{{$play->name}}</a></strong>

                                        </li>
                                    </ul>
                                    </div>
                                    <div class="col-md-3 col-md-offset-5">
                                        <div id="{{$play->id}}" class="avg"></div>
                                        <div class="rateYo" id="{{$play->id}}"></div>



                                    @if(Auth::id() != $play->user_id and Auth::check())
                                    @if(count($play->like) > 0)
                                        @foreach($play->like as $like)
                                            @if($like->user_id == Auth::id())
                                               <div class="like-btn like-h" style="width: 150px" id="{{$play->id}}">Like</div>
                                                    @break
                                            @elseif($loop->last)
                                                <div class="like-btn" style="width: 150px" id="{{$play->id}}">Like</div>
                                            @endif

                                        @endforeach
                                            @else
                                            <div class="like-btn" style="width: 150px" id="{{$play->id}}">Like</div>
                                        @endif
                                        @endif
                                        @if(Auth::id() != $play->user_id and Auth::check())
                                            @if(count($play->share) > 0)
                                                @foreach($play->share as $share)
                                                    @if($share->user_id == Auth::id())
                                                        <div class="share share-h" style="width: 150px" id="{{$play->id}}">
                                                            <i class="fa fa-share"></i>
                                                            <spans>Share</spans>
                                                        </div>
                                                        @break
                                                    @elseif($loop->last)
                                                        <div class="share" style="width: 150px" id="{{$play->id}}">
                                                            <i class="fa fa-share"></i>
                                                            <spans>Share</spans>
                                                        </div>
                                                    @endif

                                                @endforeach
                                            @else
                                                <div class="share" style="width: 150px" id="{{$play->id}}">
                                                    <i class="fa fa-share"></i>
                                                    <spans>Share</spans>
                                                </div>
                                            @endif

                                        @endif
                                    </div>

                                    <div class="col-md-12">
                                    <h3>Description : </h3>
                                    <p>{{$play->description}}</p>
                                    <h3>List : </h3>
                                    <ul class="sidebarservices">
                                        @foreach($play->content as $content)
                                            <li id="fade{{$content->id}}"><p><a href="{{$content->url}}">{{$content->name}}</a>
                                                    @if($play->user_id == Auth::id())
                                                 <a class="btn btn-danger pull-right list-delete" id="{{$content->id}}">X</a>
                                                    @endif
                                                </p></li>
                                        @endforeach

                                    </ul>


                                    </div>
                                    @if(Auth::id() == $play->user_id)
                                        <div class="col-md-4">
                                            <a class="btn btn-primary" href="{{url('/playlist/create/'.$play->id)}}">Add more</a>
                                        </div>
                                        <div class="col-md-4 pull-right">
                                            <a class="btn btn-danger delete-play" href="{{url('/playlist/delete/'.$play->id)}}">Delete PlayList</a>
                                        </div>
                                    @endif
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach($find->like as $likes)
            <div class="portfolio-modal modal fade" id="portfolioModal{{$likes->playlist->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <h2>{{$likes->playlist->name}}</h2>
                                    <hr class="star-primary">
                                    <img src="{{asset($likes->playlist->pic)}}" style=" width: 400px; height: 300px" class="img-thumbnail img-centered" width="300" height="500" alt="">
                                    <div class="col-md-8 col-md-offset-2">
                                        <ul class="list-inline item-details">
                                            <li>User :
                                                <strong><a href="{{url('/user/'.$likes->playlist->user->username)}}"><span> @</span>{{$likes->playlist->user->username}}</a>
                                                </strong>
                                            </li>
                                            <li>shares:
                                                <strong><a>{{count($likes->playlist->share)}}</a>
                                                </strong>
                                            </li>
                                            <li>Category :
                                                <strong><a href="#">
                                                        @if($likes->playlist->cat == 0)
                                                            Movies
                                                        @elseif($likes->playlist->cat == 1)
                                                            Series
                                                        @elseif($likes->playlist->cat == 2)
                                                            Courses
                                                        @elseif($likes->playlist->cat == 3)
                                                            Programs
                                                        @elseif($likes->playlist->cat == 4)
                                                            Games
                                                        @endif
                                                    </a>
                                                </strong>
                                            </li>
                                            <li>Link:
                                                <strong><a href="{{url('/playlist/show/')."/".$likes->playlist->id}}">{{$likes->playlist->name}}</a></strong>

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3 col-md-offset-5">
                                        <div id="{{$likes->playlist->id}}" class="avg"></div>
                                        <div class="rateYo" id="{{$likes->playlist->id}}"></div>



                                        @if(Auth::id() != $likes->playlist->user_id and Auth::check())
                                            @if(count($likes) > 0)
                                                   @if($likes->user_id == Auth::id())
                                                        <div class="like-btn like-h" style="width: 150px" id="{{$likes->playlist->id}}">Like</div>
                                                       @else
                                                    <div class="like-btn" style="width: 150px" id="{{$likes->playlist->id}}">Like </div>
                                                @endif
                                             @else
                                                <div class="like-btn" style="width: 150px" id="{{$likes->playlist->id}}">Like</div>
                                            @endif
                                        @endif
                                        @if(Auth::id() != $likes->playlist->user_id and Auth::check())
                                            @if(count($likes->playlist->share) > 0)
                                                @foreach($likes->playlist->share as $share)
                                                    @if($share->user_id == Auth::id())
                                                        <div class="share share-h" style="width: 150px" id="{{$likes->playlist->id}}">
                                                            <i class="fa fa-share"></i>
                                                            <spans>Share</spans>
                                                        </div>
                                                        @break
                                                    @elseif($loop->last)
                                                        <div class="share" style="width: 150px" id="{{$likes->playlist->id}}">
                                                            <i class="fa fa-share"></i>
                                                            <spans>Share</spans>
                                                        </div>
                                                    @endif

                                                @endforeach
                                            @else
                                                <div class="share" style="width: 150px" id="{{$likes->playlist->id}}">
                                                    <i class="fa fa-share"></i>
                                                    <spans>Share</spans>
                                                </div>
                                            @endif

                                        @endif
                                    </div>

                                    <div class="col-md-12">
                                        <h3>Description : </h3>
                                        <p>{{$likes->playlist->description}}</p>
                                        <h3>List : </h3>
                                        <ul class="sidebarservices">
                                            @foreach($likes->playlist->content as $content)
                                                <li><p><a href="{{$content->url}}">{{$content->name}}</a>
                                                        @if($likes->playlist->user_id == Auth::id())
                                                            <a class="btn btn-danger pull-right list-delete" id="{{$content->id}}">X</a>
                                                        @endif
                                                    </p></li>


                                             @endforeach
                                        </ul>


                                    </div>
                                    @if(Auth::id() == $likes->playlist->user_id)
                                        <div class="col-md-4">
                                            <a class="btn btn-primary" href="{{url('/playlist/create/'.$likes->playlist->id)}}">Add more</a>
                                        </div>
                                        <div class="col-md-4 pull-right">
                                            <a class="btn btn-danger delete-play" href="{{url('/playlist/delete/'.$likes->playlist->id)}}">Delete PlayList</a>
                                        </div>
                                    @endif
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach($find->share as $shares)
            <div class="portfolio-modal modal fade" id="portfolioModal{{$shares->playlist->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <h2>{{$shares->playlist->name}}</h2>
                                    <hr class="star-primary">
                                    <img src="{{asset($shares->playlist->pic)}}" style=" width: 400px; height: 300px" class="img-thumbnail img-centered" width="300" height="500" alt="">
                                    <div class="col-md-8 col-md-offset-2">
                                        <ul class="list-inline item-details">
                                            <li>User :
                                                <strong><a href="{{url('/user/'.$shares->playlist->user->username)}}"><span> @</span>{{$shares->playlist->user->username}}</a>
                                                </strong>
                                            </li>
                                            <li>shares:
                                                <strong><a>{{count($shares)}}</a>
                                                </strong>
                                            </li>
                                            <li>Category :
                                                <strong><a href="#">
                                                        @if($share->playlist->cat == 0)
                                                            Movies
                                                        @elseif($shares->playlist->cat == 1)
                                                            Series
                                                        @elseif($shares->playlist->cat == 2)
                                                            Courses
                                                        @elseif($shares->playlist->cat == 3)
                                                            Programs
                                                        @elseif($shares->playlist->cat == 4)
                                                            Games
                                                        @endif
                                                    </a>
                                                </strong>
                                            </li>
                                            <li>Link:
                                                <strong><a href="{{url('/playlist/show/')."/".$shares->playlist->id}}">{{$shares->playlist->name}}</a></strong>

                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3 col-md-offset-5">
                                        <div id="{{$shares->playlist->id}}" class="avg"></div>
                                        <div class="rateYo" id="{{$shares->playlist->id}}"></div>



                                        @if(Auth::id() != $shares->playlist->user_id and Auth::check())
                                            @if(count($shares->playlist->like) > 0)
                                                @foreach($shares->playlist->like as $liket)
                                                    @if($liket->user_id == Auth::id())
                                                        <div class="like-btn like-h" style="width: 150px" id="{{$shares->playlist->id}}">Like</div>
                                                        @break
                                                    @elseif($loop->last)
                                                        <div class="like-btn" style="width: 150px" id="{{$shares->playlist->id}}">Like</div>
                                                    @endif

                                                @endforeach
                                            @else
                                                <div class="like-btn" style="width: 150px" id="{{$shares->playlist->id}}">Like</div>
                                            @endif
                                        @endif
                                        @if(Auth::id() != $shares->playlist->user_id and Auth::check())
                                            @if(count($shares) > 0)
                                                    @if($shares->user_id == Auth::id())
                                                        <div class="share share-h" style="width: 150px" id="{{$shares->playlist->id}}">
                                                            <i class="fa fa-share"></i>
                                                            <spans>Share</spans>
                                                        </div>
                                                    @else
                                                        <div class="share" style="width: 150px" id="{{$shares->playlist->id}}">
                                                            <i class="fa fa-share"></i>
                                                            <spans>Share</spans>
                                                        </div>
                                                    @endif
                                            @else
                                                <div class="share" style="width: 150px" id="{{$likes->playlist->id}}">
                                                    <i class="fa fa-share"></i>
                                                    <spans>Share</spans>
                                                </div>
                                            @endif

                                        @endif
                                    </div>

                                    <div class="col-md-12">
                                        <h3>Description : </h3>
                                        <p>{{$shares->playlist->description}}</p>
                                        <h3>List : </h3>
                                        <ul class="sidebarservices">
                                            @foreach($shares->playlist->content as $contentss)
                                                <li><p><a href="{{$contentss->url}}">{{$contentss->name}}</a>
                                                        @if($shares->playlist->user_id == Auth::id())
                                                            <a class="btn btn-danger pull-right list-delete" id="{{$contentss->id}}">X</a>
                                                        @endif
                                                    </p></li>
                                            @endforeach
                                        </ul>


                                    </div>
                                    @if(Auth::id() == $shares->playlist->user_id)
                                        <div class="col-md-4">
                                            <a class="btn btn-primary" href="{{url('/playlist/create/'.$shares->playlist->id)}}">Add more</a>
                                        </div>
                                        <div class="col-md-4 pull-right">
                                            <a class="btn btn-danger delete-play" href="{{url('/playlist/delete/'.$shares->playlist->id)}}">Delete PlayList</a>
                                        </div>
                                    @endif
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
</div>

</header>
    @endsection
@section('footer')
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
                       @if(Auth::check())
                       onSet: function (rating, rateYoInstance) {
                            $.ajax({
                                type:"POST",
                                url:"/rate/set/"+send.tu,
                                data:{
                                    _token: "{{ csrf_token() }}",
                                    rating:rating
                                },
                                success: function () {

                                }
                            })
                       },
                       @else
                       readOnly: true
                       @endif
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
               url: "{{url('/list/delete/')}}/"+id,
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

@endsection
@extends('layouts.index')
@section('title')
    Home
@endsection

@section('style')
    <link href="{{asset('css/profile.css')}}" rel="stylesheet">

@endsection

@section('body')
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
                    <form method="POST" action="{{url('/')}}">
                        {{csrf_field()}}
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
                @foreach($get as $play)
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal{{$play->id}}" class="portfolio-link" data-toggle="modal">
                        <div class="caption">

                            <div class="caption-content">
                                <div class="col-md-12">
                                <i class="fa fa-search-plus fa-2x">
                                    <br>
                                    {{$play->name}}</i>
                                </div>
                            </div>
                        </div>
                        <img src="{{asset($play->pic)}}" width="400" height="300" style="height: 300px;" class="img-responsive" alt="Cabin">
                    </a>
                </div>
                @endforeach


            </div>
        </div>
        <div class="col-md-4 col-md-offset-4">
            {{$get->links()}}
        </div>
    </section>


    <!-- popups -->
    @foreach($get as $play)
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
                                            <a href="{{url('/playlist/show/')."/".$play->id}}">{{$play->name}}</a>

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


@endsection

@section('footer')
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
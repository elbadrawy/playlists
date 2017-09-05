@extends('layouts.index')
@section('title')
    {{$find->name}}
@endsection
@section('style')
    <link href="{{asset('css/profile.css')}}" rel="stylesheet">

@endsection

@section('body')
    <header style="background: white; color: #18BC9C;">
        <div class="container">


            <div class="">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>{{$find->name}}</h2>
                            <hr class="star-primary">
                            <img src="{{asset($find->pic)}}" style=" width: 400px; height: 300px" class="img-thumbnail img-centered" width="300" height="500" alt="">
                            <div class="col-md-8 col-md-offset-2">
                                <ul class="list-inline item-details">
                                    <li>User :
                                        <strong><a href="{{url('/user/'.$find->user->username)}}"><span> @</span>{{$find->user->username}}</a>
                                        </strong>
                                    </li>
                                    <li>shares:
                                        <strong><a>{{count($find->share)}}</a>
                                        </strong>
                                    </li>
                                    <li>Category :
                                        <strong><a href="#">
                                                @if($find->cat == 0)
                                                    Movies
                                                @elseif($find->cat == 1)
                                                    Series
                                                @elseif($find->cat == 2)
                                                    Courses
                                                @elseif($find->cat == 3)
                                                    Programs
                                                @elseif($find->cat == 4)
                                                    Games
                                                @endif
                                            </a>
                                        </strong>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-md-offset-4">
                                <div id="{{$find->id}}" class="avg"></div>
                                <div class="rateYo" id="{{$find->id}}"></div>



                                @if(Auth::id() != $find->user_id and Auth::check())
                                    @if(count($find->like) > 0)
                                        @foreach($find->like as $like)
                                            @if($like->user_id == Auth::id())
                                                <div class="like-btn like-h" style="width: 150px" id="{{$find->id}}">Like</div>
                                                @break
                                            @elseif($loop->last)
                                                <div class="like-btn" style="width: 150px" id="{{$find->id}}">Like</div>
                                            @endif

                                        @endforeach
                                    @else
                                        <div class="like-btn" style="width: 150px" id="{{$find->id}}">Like</div>
                                    @endif
                                @endif
                                @if(Auth::id() != $find->user_id and Auth::check())
                                    @if(count($find->share) > 0)
                                        @foreach($find->share as $share)
                                            @if($share->user_id == Auth::id())
                                                <div class="share share-h" style="width: 150px" id="{{$find->id}}">
                                                    <i class="fa fa-share"></i>
                                                    <spans>Share</spans>
                                                </div>
                                                @break
                                            @elseif($loop->last)
                                                <div class="share" style="width: 150px" id="{{$find->id}}">
                                                    <i class="fa fa-share"></i>
                                                    <spans>Share</spans>
                                                </div>
                                            @endif

                                        @endforeach
                                    @else
                                        <div class="share" style="width: 150px" id="{{$find->id}}">
                                            <i class="fa fa-share"></i>
                                            <spans>Share</spans>
                                        </div>
                                    @endif

                                @endif
                            </div>

                            <div class="col-md-12" style="margin-left: -20px">
                                <h3>Description : </h3>
                                <p>{{$find->description}}</p>
                                <h3>List : </h3>
                                <ul class="sidebarservices">
                                    @foreach($find->content as $content)
                                        <li id="fade{{$content->id}}"><p><a href="{{$content->url}}">{{$content->name}}</a>
                                                @if($find->user_id == Auth::id())
                                                    <a class="btn btn-danger pull-right list-delete" id="{{$content->id}}">X</a>
                                                @endif
                                            </p></li>
                                    @endforeach

                                </ul>


                            </div>
                            @if(Auth::id() == $find->user_id)
                                <div class="col-md-4">
                                    <a class="btn btn-primary" href="{{url('/playlist/create/'.$find->id)}}">Add more</a>
                                </div>
                                <div class="col-md-4 pull-right">
                                    <a class="btn btn-danger delete-play" href="{{url('/playlist/delete/'.$find->id)}}">Delete playList</a>
                                </div>

                            @endif
                            <div class="col-md-4">
                            <button class="btn clip" data-clipboard-text="{{url('/playlist/show/').'/'.$find->id}}">
                                Copy link to clipboard
                            </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
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
<script>
    new Clipboard('.clip');
</script>
@endsection
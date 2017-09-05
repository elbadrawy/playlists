@extends('layouts.index')
@section('title')
    Add Playlist
@endsection



@section('body')

    <header style="background: white; color: #18BC9C;">
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="color: #18BC9C">New Playlist</div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/playlist/create') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">Playlist Name :</label>

                                        <div class="col-md-6">
                                            <input type="text" name="name" class="form-control" maxlength="250">
                                            @if ($errors->has('pic'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('cat') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">Playlist Category :</label>

                                        <div class="col-md-6">
                                            <select class="form-control kind" name="cat">
                                                <option value="0">Films</option>
                                                <option value="1">Series</option>
                                                <option value="2">Courses</option>
                                                <option value="3">Programs</option>
                                                <option value="4">Games</option>
                                            </select>
                                            @if ($errors->has('cat'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('cat') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('pic') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">Playlist Poster :</label>

                                        <div class="col-md-6">
                                            <input type="file" name="pic" class="form-control">
                                            @if ($errors->has('pic'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('pic') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">Playlist Description :</label>

                                        <div class="col-md-6">
                                            <textarea name="desc" rows="4" class="form-control"></textarea>
                                            @if ($errors->has('desc'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                            @endif
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
@endsection

@section('footer')
@endsection
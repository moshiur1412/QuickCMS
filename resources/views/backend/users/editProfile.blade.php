
@extends('layouts.backend')
@section('title', trans('static.editprofile'))
@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">{{ trans('user.my_profile') }}</div>
            <div class="panel-body">



               <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ url('users/updateProfile') }}">
                  {!! csrf_field() !!}

                  <div class="form-group">
                      <div class="col-md-4">
                       <img src="{{ URL::to('/') }}/public/upload/avatars/{{ $user->avatar }}" style="width: 150px; height: 150px; float: left; border-radius:50%; margin-right: 25px" >
                   </div>
                   <div class="col-md-6">
                       <h2>{{$user->name}}'s Profile </h2>
                       <label class=" control-label"> Update Profile Image</label>
                       <input type="file" name="avatar">
                   </div>
               </div>

               <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="name" value="{{ $errors->has('name') ? '' : $user->name }}" >

                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif


                </div>


            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Email</label>

                <div class="col-md-6">
                    <input type="email" disabled class="form-control" name="email" value="{{ $user->email }}" >


                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Password</label>
                <div class="col-md-6">
                    <input type="password" class="form-control" name="password">


                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif

                </div>
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Confirm Password</label>
                <div class="col-md-6">
                    <input type="password" class="form-control" name="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif

                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" name="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i>Update
                    </button>
                </div>
            </div>

        </form>

    </div>
</div>
</div>
</div>

@endsection

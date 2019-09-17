@extends('layouts.auth')

@section('content')


<div class="container">
  <div class="row">
    <div class="Absolute-Center is-Responsive">
      <div id="logo-container">
          <img src="{{url('themes/default/assets/images/logo.png')}}" alt="MDB CMS" height="70px" width="200px">
      </div>
      <div class="col-sm-12 col-md-10 col-md-offset-1">
        <form role="form" method="POST" action="{{ url('/login') }}" id="loginForm">
         {{ csrf_field() }}
         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required="required" autofocus placeholder="email address"/> 

        </div>
        @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input class="form-control" type="password" name='password' placeholder="password" required/>  
            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif   
        </div>
        <div class="checkbox">
            <label>
              <input type="checkbox" name="remember" required="required"> I agree to the <a href="#">Terms and Conditions</a>
          </label>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-def btn-block">Login</button>
    </div>
    <div class="form-group text-center">
        <a href="{{ url('/password/reset') }}">Forgot Password</a>&nbsp;|&nbsp;<a href="#">Support</a>
    </div>
</form>        
</div>  
</div>    
</div>
</div>




<!-- 
<script type="text/javascript">

    $(document).on('click','.btn-login',function(){
        $.ajax({
            type: 'post',
            url: 'login/authSucces',
            data: {


            },
            success:function(data){
                alert(data);
            },
            error:function(){
                alert('Errror!!');
            }
        });
    });

</script> -->


@endsection

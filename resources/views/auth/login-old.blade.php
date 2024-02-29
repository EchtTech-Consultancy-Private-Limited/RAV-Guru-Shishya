@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
        <img src="{{asset('/assets/images/guru-shishya-parampara-logo.png')}}" class="login-logo mx-auto d-block" title="rav-logo">
            <div class="card">
                <div class="card-header">Guru Shishya Parampara Login</div>
                <!-- <img class="center" src="{{ asset('images/logo.png') }}" alt="Profile-Image" width="100px;" height="80px;"> -->
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                 <p>{{ $message }}</p>
                </div>

                @endif
                @if ($message = Session::get('Error'))
                <div class="alert alert-danger">
                 <p>{{ $message }}</p>
                </div>

                @endif
                <div class="card-body">
                    <form action="{{ route('login') }}" id="loginForm" method="POST" autocomplete="off">
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}<span class="text-danger">*</span></label>
                            
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="email" maxlength="30" class="required" >
                                <span class="text-danger" id="email-error"></span>
                                <span class="emsg hidden">Please Enter a Valid Email</span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required minlength="3" maxlength="15" required autocomplete="new-password123">
                                <i class="fa fa-eye-slash field-icon1" id="eye"></i>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                       
                            <div class="row mb-3" style="margin-left:150px;">
                                    <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }} ">
                                      <label for="password" class="col-md-4 control-label">Captcha<span class="text-danger">*</span></label>
                                      

                                      <div class="col-md-8">
                                          <div class="captcha">
                                          <span>{!! captcha_img('math') !!}</span>
                                          <button type="button" class="btn btn-secondary btn-refresh"><i class="fa fa-refresh"></i></button>
                                          </div>
                                          <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">


                                          @if ($errors->has('captcha'))
                                              <span class="help-block">
                                                  <strong style="color:red;">{{ $errors->first('captcha') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                    </div>
                                </div>

                            <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <div class="form-group mb-3">
                                          <label for="remember">Remember me</label>
                                          <input type="checkbox" name="remember" value="1">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                            <input type="button" value="{{ __('Login') }}" class="btn btn-secondary" id="user_login" onclick="return encrypt()">
                              
                                <a href="{{ url('user-signup') }}" class="btn btn-secondary" id="user_login">
                                    {{ __('Create New Account') }}
                                </a>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-secondary" href="{{ route('password.request') }}">
                                        {{ __('Reset Password') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/custom/custom.js') }}"></script>

<style>
    .emsg
    {
    color: red;
    }
    .emsgpsw
    {
        color: red;
    }
    .hidden
    {
         visibility:hidden;
    }
</style>




<script type="text/javascript">


$(".btn-refresh").click(function(){
  $.ajax({
     type:'GET',
     url:'{{ url('refresh_captcha') }}',
     success:function(data){
        $(".captcha span").html(data.captcha);
     }
  });
});


</script>
<script type="text/javascript">
function encrypt()
{

  $str=$("#password").val();
  for($i=0; $i<5;$i++) 
  {
    $str=reverseString(btoa($str));
  }
  $("#password").val($str);

  $("#loginForm").submit();

}

function reverseString(str) {
    var splitString = str.split(""); 
    var reverseArray = splitString.reverse(); 
    var joinArray = reverseArray.join(""); 
    return joinArray; 
}
</script>
@endsection

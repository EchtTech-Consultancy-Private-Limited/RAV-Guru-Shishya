<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <link href="{{ asset('assets/plugins/bootstrap.min.css') }} " rel="stylesheet">
  <link href="{{ asset('assets/plugins/all.css') }} " rel="stylesheet">
  <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap.bundle.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/plugins/jquery.min.js') }}"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/font-awesome-4.7.0/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/signin.css') }}">

</head>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6 col-md-8 intro-section">

      <div class="intro-content-wrapper">
        <h1 class="intro-title">Welcome to Guru Shishya Parampara !</h1>
      </div>
    </div>
    <div class="col-sm-6 col-md-4 form-section">

      <div class="login-wrapper">
        <div>
          <a href="javascript:void();"><img src="{{asset('/assets/images/guru-shishya-parampara-logo.png')}}" alt="logo" width="350px;"></a>
        </div>
        <h2 class="login-title mt-4">Sign in</h2>

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


        <form action="{{ route('login') }}" id="loginForm" method="POST" autocomplete="off">
          @csrf
          <div class="form-group position-relative">
            <label for="email" class="sr-only">Email</label>
            <input type="email" name="email" id="email" class="form-control" autocomplete="off" placeholder="Email" required>
            <i class="fa fa-user field-icon1 user-icon"></i>
            <span class="text-danger" id="email-error"></span>
            @if($errors->has('email'))
            <span class="help-block">
              <strong style="color:red;">{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group mb-3 position-relative">
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="password" class="form-control" autocomplete="off" placeholder="Password">
            <i class="fa fa-eye field-icon1 eye-icon" id="eye"></i>
            @if($errors->has('password'))
            <span class="help-block">
              <strong style="color:red;">{{ $errors->first('password') }}</strong>
            </span>
            @endif
          </div>

          <div class="form-group mb-3 row align-items-center">

            <div class="col-md-5">
              <label for="password" class="sr-only">Captcha</label>
              <div class="captcha d-flex justify-content-between">
                <span>{!! captcha_img('math') !!}</span>
                <button type="button" class="btn btn-secondary btn-refresh me-2">
                  <i class="fa fa-refresh"></i>
                </button>
              </div>
            </div>

            <div class="col-md-7 pl-0">
              <input id="captcha" type="text" class="form-control" autocomplete="off" placeholder="Enter Captcha" name="captcha">
              @if ($errors->has('captcha'))
              <span class="help-block">
                <strong style="color:red;">{{ $errors->first('captcha') }}</strong>
              </span>
              @endif
            </div>

          </div>

          <div class="d-flex justify-content-between align-items-center mb-5">
            <input name="login" id="login" class="btn login-btn" type="submit" onclick="return encrypt()" value="Login">
            <a href="{{ route('password.request') }}" class="forgot-password-link">Forgot Password?</a>
          </div>
        </form>
        <p class="login-wrapper-footer-text">Need an account? <a href="{{ url('user-signup') }}" class="text-primary">Create new account</a></p>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(".btn-refresh").click(function() {
    $.ajax({
      type: 'GET',
      url: '{{ url('refresh_captcha') }}',
      success: function(data) {
        $(".captcha span").html(data.captcha);
      }
    });
  });

  function encrypt() {

    $str = $("#password").val();
    for ($i = 0; $i < 5; $i++) {
      $str = reverseString(btoa($str));
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

  $(function() {

    $('#eye').click(function() {

      if ($(this).hasClass('fa-eye-slash')) {

        $(this).removeClass('fa-eye-slash');

        $(this).addClass('fa-eye');

        $('#password').attr('type', 'text');

      } else {

        $(this).removeClass('fa-eye');

        $(this).addClass('fa-eye-slash');

        $('#password').attr('type', 'password');
      }
    });
  });
</script>
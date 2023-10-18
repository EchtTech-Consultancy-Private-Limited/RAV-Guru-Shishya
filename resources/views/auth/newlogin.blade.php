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
  <style>
    body {
      background-color: #fff;
      font-family: 'Karla', sans-serif;
    }

    h1>a {
      text-decoration: none;
      color: #fff !important;
    }

    .intro-section {
      background-image: url(http://localhost/RAV-Guru-Shishya/public/assets/images/login_bg.jpg);
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      padding: 75px 95px;
      min-height: 100vh;
      display: -webkit-box;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      flex-direction: column;
      color: #ffffff;
    }

    @media (max-width: 991px) {
      .intro-section {
        padding-left: 50px;
        padding-rigth: 50px;
      }
    }

    @media (max-width: 767px) {
      .intro-section {
        padding: 28px;
      }
    }

    @media (max-width: 575px) {
      .intro-section {
        min-height: auto;
      }
    }

    .brand-wrapper .logo {
      height: 35px;
    }

    @media (max-width: 767px) {
      .brand-wrapper {
        margin-bottom: 35px;
      }
    }

    .intro-content-wrapper {
      max-width: 100%;
      margin-top: auto;
      margin-bottom: auto;
    }

    .intro-content-wrapper .intro-title {
      font-size: 40px;
      font-weight: bold;
      margin-bottom: 17px;
      color: black;
    }

    .intro-content-wrapper .intro-text {
      font-size: 19px;
      line-height: 1.37;
    }

    .intro-content-wrapper .btn-read-more {
      background-color: #fff;
      padding: 13px 30px;
      border-radius: 0;
      font-size: 16px;
      font-weight: bold;
      color: #000;
    }

    .intro-content-wrapper .btn-read-more:hover {
      background-color: transparent;
      border: 1px solid #fff;
      color: #fff;
    }

    @media (max-width: 767px) {
      .intro-section-footer {
        margin-top: 35px;
      }
    }

    .intro-section-footer .footer-nav a {
      font-size: 20px;
      font-weight: bold;
      color: inherit;
    }

    @media (max-width: 767px) {
      .intro-section-footer .footer-nav a {
        font-size: 14px;
      }
    }

    .intro-section-footer .footer-nav a+a {
      margin-left: 30px;
    }

    .form-section {
      display: -webkit-box;
      display: flex;
      -webkit-box-align: center;
      align-items: center;
      -webkit-box-pack: center;
      justify-content: center;
    }

    @media (max-width: 767px) {
      .form-section {
        padding: 35px;
      }
    }

    .login-wrapper {
      width: 460px;
      max-width: 100%;
      text-align: center;
    }

    @media (max-width: 575px) {
      .login-wrapper {
        width: 100%;
      }
    }

    .login-wrapper .form-control {
      border: 0;
      border-bottom: 1px solid #6c757d;
      border-radius: 0;
      font-size: 16px;
      font-weight: bold;
      padding: 12px 40px 12px 12px;
      margin-bottom: 7px;
      height: 50px;
    }

    .login-wrapper .form-control::-webkit-input-placeholder {
      color: #b0adad;
    }

    .login-wrapper .form-control::-moz-placeholder {
      color: #b0adad;
    }

    .login-wrapper .form-control:-ms-input-placeholder {
      color: #b0adad;
    }

    .login-wrapper .form-control::-ms-input-placeholder {
      color: #b0adad;
    }

    .login-wrapper .form-control::placeholder {
      color: #b0adad;
    }

    .login-title {
      font-size: 30px;
      font-weight: bold;
      margin-bottom: 30px;
    }

    .login-btn {
      padding: 10px 30px;
      background-color: #000;
      border-radius: 10px;
      font-size: 20px;
      font-weight: 500;
      color: #fff;
    }

    .login-btn:hover {
      border: 1px solid #000;
      background-color: transparent;
      color: #000;
    }

    .forgot-password-link {
      font-size: 14px;
      color: #080808;
      text-decoration: underline;
    }

    .social-login-title {
      font-size: 15px;
      color: #919aa3;
      display: -webkit-box;
      display: flex;
      margin-bottom: 23px;
    }

    .social-login-title::before,
    .social-login-title::after {
      content: "";
      background-image: -webkit-gradient(linear, left top, left bottom, from(#f4f4f4), to(#f4f4f4));
      background-image: linear-gradient(#f4f4f4, #f4f4f4);
      -webkit-box-flex: 1;
      flex-grow: 1;
      background-size: calc(100% - 20px) 1px;
      background-repeat: no-repeat;
    }

    .social-login-title::before {
      background-position: center left;
    }

    .social-login-title::after {
      background-position: center right;
    }

    .social-login-links {
      text-align: center;
      margin-bottom: 32px;
    }

    .social-login-link img {
      width: 40px;
      height: 40px;
      -o-object-fit: contain;
      object-fit: contain;
    }

    .social-login-link+.socia-login-link {
      margin-left: 16px;
    }

    .login-wrapper-footer-text {
      font-size: 20px;
      text-align: center;
    }

    i.eye-icon,
    i.user-icon {
      position: absolute;
      right: 3%;
      top: 36%;
    }

    .fa-refresh:before {
      content: "\f021";
    }
  </style>
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
            <input type="email" required="required" name="email" id="email" class="form-control" autocomplete="off" placeholder="Email">

            <i class="fa fa-user field-icon1 user-icon"></i>

            <span class="text-danger" id="email-error"></span>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group mb-3 position-relative">
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="password" class="form-control" autocomplete="off" placeholder="Password">
            <i class="fa fa-eye field-icon1 eye-icon" id="eye"></i>
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group mb-3 row align-items-center">

            <div class="col-md-5">
              <label for="password" class="sr-only">Captcha</label>
              <div class="captcha d-flex">
                <span>{!! captcha_img('math') !!}</span>
                <button type="button" class="btn btn-secondary btn-refresh ml-2">
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
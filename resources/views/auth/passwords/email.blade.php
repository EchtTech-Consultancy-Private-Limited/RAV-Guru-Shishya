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
<div class="container-fluid reset-password">
    <div class="row">
        <div class="col-sm-6 col-md-8 intro-section">

            <div class="intro-content-wrapper">
                <h1 class="intro-title">Welcome to Guru Shishya Parampara !</h1>
            </div>


        </div>
        <div class="col-sm-6 col-md-4 form-section">

            <div class="login-wrapper">
                <div class="logo">
                    <a href="javascript:void();"><img src="{{asset('/assets/images/guru-shishya-parampara-logo.png')}}"
                            alt="logo"></a>
                </div>
                <!-- <h2 class="login-title mt-3">Sign in</h2> -->
                <div class="card-header text-center fs-5 login-title">{{ __('Reset Password') }}</div>
                <p class="text-center p-2">Please Enter Your Email Address to Search Your Account</p>

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif


                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group position-relative">
                        <label for="email" class="sr-only">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <i class="fa fa-user field-icon1 user-icon"></i>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="d-flex justify-content-center align-items-center mt-3">
                        <button type="submit" class="btn btn-primary login-btn">
                            {{ __('Send Password Reset Link') }}
                        </button>

                </form>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(".btn-refresh").click(function() {
    $.ajax({
        type: 'GET',
        url: '{{ url("refresh_captcha") }}',
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
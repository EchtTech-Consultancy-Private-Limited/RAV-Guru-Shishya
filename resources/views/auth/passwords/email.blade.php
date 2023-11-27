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

<div class="login-tab-container">
        <ul class="nav nav-tabs login-tab" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                      type="button" role="tab" aria-controls="home" aria-selected="true">CRAV</button>
              </li>
              <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                      type="button" role="tab" aria-controls="profile" aria-selected="false">MRAV</button>
              </li>

          </ul>

          <div class="tab-content" id="myTabContent">
              <div class="tab-pane  show active" id="home" role="tabpanel" aria-labelledby="home-tab"
                 >
                  <div>
                      <h2> Certificate of Rashtriya Ayurveda Vidyapeeth (CRAV)</h2>
                      <p>
                          <b>Training :</b> This course involves training in the clinical practices of Ayurveda
                          and Ayurvedic Pharmacy under the direct mentoring of eminent practicing / rasa Vaidyas
                          in different parts of the country.
                      </p>

                      <p><b>Eligibility :</b> BAMS (Ayurvedacharya) Degree.</p>

                      <p>
                          <b>Age Limit:</b> Maximum 30 years for graduate and 32 years for postgraduate.
                          Relaxation up to 35 years will be given to in service vaidya duly sponsored by central
                          or state Government.3 year age relaxation is given to SC/ST candidates.
                      </p>

                      <p>
                          <b>Duration of the course :</b> One year.
                      </p>

                      <p>
                          <b>Stipend :</b> A stipend of Rs.15820/-plus DA at the rates applicable from time to
                          time per month is provided to the students of CRAV course.
                      </p>

                      <p><b>General Conditions for both the courses:</b></p>
                      <ol>
                          <li> The qualifications (M.D./BAMS) possessed by the candidates must be included in 2nd
                              schedule of IMCC Act-1970.</li>
                          <li> Students should have the zeal to go for critical study of texts of Ayurveda in MRAV
                              course and Ayurvedic techniques and cure of diseases in CRAV course. Good knowledge
                              of Sanskrit language is required for both courses. </li>
                          <li> Reservation of seats to SC/ST/OBC candidates and Physically Challenged candidates
                              will be implemented as per Central Government policy prevalent from time to time. In
                              case of OBCs, the caste certificate issued by the competent authority applicable for
                              Central Govt. will be accepted.</li>
                          <li> <b>Stipend :</b> Sponsored candidates will not be paid any stipend.</li>

                      </ol>

                     <p>
                     <b>Method of Admission:</b>
                     </p>

                      <p>

                          The Advertisement for admission to both courses appears in leading national newspapers.
                          It is also posted on RAV website. Circular of the intent is widely circulated among
                          teaching institutions of Ayurveda. Eligible candidates may send their applications on
                          the given format along with essential enclosures. The selection will be made through
                          Entrance Examination. Suitable candidates are interviewed after an Entrance Test and
                          selected.</p>

                  </div>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <h2> Certificate of Rashtriya Ayurveda Vidyapeeth (CRAV)</h2>
                  <h4 class="text-black">
                      Coming soon...
                  </h4>
              </div>

          </div>
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
                            name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Please Enter Your Email" autofocus>
                        <i class="fa fa-user field-icon1 user-icon"></i>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="d-flex justify-content-center align-items-center mt-3">

                        <button type="submit" class="btn btn-primary login-btn">
                            {{ __('Reset Password') }}
                        </button>
                        </div>
                        <a href="{{ route('newLogin') }}" class="">Back To Login</a>
                </form>


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
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
          <a href="javascript:void();"><img src="{{asset('/assets/images/guru-shishya-parampara-logo.png')}}" alt="logo" ></a>
        </div>
        <h2 class="login-title mt-3">Sign in</h2>

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


        <form action="{{ url('user-login') }}" id="loginForm" method="POST" autocomplete="off">
          @csrf
          <div class="form-group position-relative">
            <label for="email" class="sr-only">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control" autocomplete="off" placeholder="Email">
            <i class="fa fa-user field-icon1 user-icon"></i>
            <span class="text-danger" id="email-error"></span>
            @if($errors->has('email'))
            <span class="error">
            {{ $errors->first('email') }}
            </span>
            @endif
          </div>
          <div class="form-group mb-3 position-relative">
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control" autocomplete="off" placeholder="Password">
            <i class="fa fa-eye field-icon1 eye-icon" id="eye"></i>
            @if($errors->has('password'))
            <span class="error">
            {{ $errors->first('password') }}
            </span>
            @endif
          </div>

          <div class="form-group mb-3 row align-items-center">

            <div class="col-md-6">
            <input id="captcha" type="text" class="form-control" autocomplete="off" placeholder="Enter Captcha" name="captcha">
              @if ($errors->has('captcha'))
              <span class="error">
              {{ $errors->first('captcha') }}
              </span>
              @endif

            </div>

            <div class="col-md-6 pl-0">
            <label for="password" class="sr-only">Captcha</label>
              <div class="captcha ">
                <span id="captcha-show">{{$CustomCaptch['expression'] }}</span>
                {{-- <button type="button" class="btn btn-secondary btn-refresh me-2">
                  <i class="fa fa-refresh"></i>
                </button> --}}
              </div>
            </div>

            <div class="col-md-12 d-flex justify-content-end">
            <a href="{{ route('password.request') }}" class="forgot-password-link text-primary">Forgot Your Password?</a>
            </div>

          </div>

          <div class="text-center mb-3">
            <input name="login" id="login" class="btn login-btn" type="submit" onclick="return encrypt()" value="Login">

          </div>
          <p class="login-wrapper-footer-text">Need an account? <a href="{{ url('user-signup') }}" class="text-primary">Create new account</a></p>
        </form>

      </div>
    </div>
  </div>
</div>
<script>
  const refreshCaptcha = "{{url("refresh_captcha")}}";
</script>
<script src="{{ asset('assets/js/login.js') }} "></script>
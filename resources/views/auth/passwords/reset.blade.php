@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <div class="form-group">
                              <label for="passwordinput">
                              Password
                              <span class="text-danger">*</span></label>
                              <input id="password" class="form-control @error('password') is-invalid @enderror input-md"
                                 name="password" type="password"
                                 placeholder="Enter your password" onpaste="return false" oncopy="return false">
                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                 <i class="fa fa-eye-slash field-icon1" id="eye"></i>
                              <span class="text-danger" id="password_error"></span>
                              <span class="show-pass" onclick="toggle()">
                              </span>
                              <p style="font-size:10px;">Submit Button will Automatic Active When Your Password is Strong Enough to Processed</p>
                              <div id="popover-password">
                                 <p><span id="result"></span></p>
                                 <div class="progress">
                                    <div id="password-strength"
                                       class="progress-bar"
                                       role="progressbar"
                                       aria-valuenow="40"
                                       aria-valuemin="0"
                                       aria-valuemax="100"
                                       style="width:0%">
                                    </div>
                                 </div>
                                 <ul class="list-unstyled" style="display: none;">
                                    <li class="">
                                       <span class="low-case">
                                       <i class="fas fa-circle" aria-hidden="true"></i>
                                       &nbsp;Lowercase
                                       </span>
                                    </li>
                                    <li class="">
                                       <span class="upper-case">
                                       <i class="fas fa-circle" aria-hidden="true"></i>
                                       &nbsp;Uppercase
                                       </span>
                                    </li>
                                    <li class="">
                                       <span class="one-number">
                                       <i class="fas fa-circle" aria-hidden="true"></i>
                                       &nbsp;Number (0-9)
                                       </span>
                                    </li>
                                    <li class="">
                                       <span class="eight-character">
                                       <i class="fas fa-circle" aria-hidden="true"></i>
                                       &nbsp;Atleast 8 Character
                                       </span>
                                    </li>
                                 </ul>
                              </div>
                           </div>


                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" onpaste="return false" oncopy="return false">
                                <i class="fa fa-eye-slash field-icon1" id="eye1"></i>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){

  $('#eye').click(function(){

        if($(this).hasClass('fa-eye-slash')){

          $(this).removeClass('fa-eye-slash');

          $(this).addClass('fa-eye');

          $('#password').attr('type','text');

        }else{

          $(this).removeClass('fa-eye');

          $(this).addClass('fa-eye-slash');

          $('#password').attr('type','password');
        }
    });
});

$(function(){

  $('#eye1').click(function(){

        if($(this).hasClass('fa-eye-slash')){

          $(this).removeClass('fa-eye-slash');

          $(this).addClass('fa-eye');

          $('#password-confirm').attr('type','text');

        }else{

          $(this).removeClass('fa-eye');

          $(this).addClass('fa-eye-slash');

          $('#password-confirm').attr('type','password');
        }
    });
});
</script>
<script src="{{ asset('assets/js/custom/password-policy.js') }}"></script>
@endsection

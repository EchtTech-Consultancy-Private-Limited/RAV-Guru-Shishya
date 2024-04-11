@extends('layouts.app-signup')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">

<section class="content1 sign-up">
    <div class="container-fluid">
        <div class="col-md-12">
            <img src="{{asset('/assets/images/guru-shishya-parampara-logo.png')}}" class="login-logo mx-auto d-block">
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header px-0">
                        <h2 class="text-center">
                            <strong>Sign Up</strong> User

                        </h2>
                        <hr>
                        <p class="text-left text-danger m-0">Note*- All field is rquired</p>
                        {{-- @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif --}}
                    </div>
                    <form class="validation-form123" action="{{ url('sign-up') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="body p-0">
                            <div class="row clearfix">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Title<span class="text-danger"> *</span></label>
                                            <select name="title" class="form-control" id="title">
                                                <option value="">Select Title</option>

                                                @foreach(__('phr.titlename') as $key=>$value)
                                                <option value="{{$key}}">{{$value}}</option>
                                                @if($key == old('title'))
                                                <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>First Name<span class="text-danger"> *</span></label>
                                            <input type="text" name="firstname"
                                                class="form-control capitalize preventnumeric"
                                                value="{{ old('firstname') }}" placeholder="First Name" maxlength="30"
                                                minlength="2">
                                                @if ($errors->has('firstname'))
                                                <span class="help-block">
                                                    <strong style="color:red;">{{ $errors->first('firstname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Middle Name</label>
                                            <input type="text" name="middlename"
                                                class="form-control capitalize preventnumeric" placeholder="Middle Name"
                                                value="{{ old('middlename') }}" maxlength="30">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Last Name<span class="text-danger"> *</span></label>
                                            <input type="text" name="lastname"
                                                class="form-control capitalize preventnumeric" placeholder="Last Name"
                                                value="{{ old('lastname') }}" maxlength="30">
                                            @if ($errors->has('lastname'))
                                                <span class="help-block">
                                                    <strong style="color:red;">{{ $errors->first('lastname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Email</label><span class="text-danger"> *</span>
                                            <!-- <span style="font-size: 10px;"> (All communication from RAV Accredatitation will sent on this email id)</span> -->
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Email" value="{{ old('email') }}" maxlength="50"
                                                minlength="10">
                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong style="color:red;">{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Mobile No.<span class="text-danger"> *</span></label>
                                            <input type="text" name="mobile_no" id="mobile_no" class="form-control"
                                                placeholder="Mobile No." value="{{ old('mobile_no') }}" maxlength="10">
                                            @if ($errors->has('mobile_no'))
                                            <span class="error">
                                            {{ $errors->first('mobile_no') }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Gender<span class="text-danger"> *</span></label>
                                            <select name="gender" class="form-control" id="gender">
                                                <option value="">Select Gender</option>

                                                @foreach(__('phr.gender') as $key=>$value)
                                                <option value="{{$key}}">{{$value}}</option>
                                                @if($key == old('gender'))
                                                <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-3">
                                    <div class="form-group default-select select2Style">
                                        <label>Country<span class="text-danger"> *</span></label>
                                        <select name="country" class="form-control select2" id="country-dropdown">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $data)
                                            <option value="{{ $data->id }}" {{ ($data->id == old('country')) ? 'selected':'' }}>{{ $data->name }}</option>
                                            
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group default-select select2Style">
                                        <label>State<span class="text-danger"> *</span></label>
                                        <select id="state-dropdown" class="form-control select2" name="state">
                                            <option value=""> Select State </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group default-select select2Style">
                                        <label>City<span class="text-danger"> *</span></label>
                                        <select id="city-dropdown" class="form-control select2" name="city">
                                            <option value=""> Select City </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>User Type<span class="text-danger">*</span></label>
                                            <select name="user_type" class="form-control" id="user_type">
                                                <option value="">Select User Type</option>
                                                <?php
                                                    $uniqueUserTypes = array_unique($user_type);
                                                ?>
                                                @foreach($uniqueUserTypes as $key => $user_type)
                                                    <option value="{{ $key }}" @if($key == old('user_type')) selected @endif>{{ $user_type }}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" id="gurutype">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Select Guru Type<span class="text-danger">*</span></label>
                                            <select name="gurutype" class="form-control">
                                                <option value="">Select User Type</option>
                                                @if(old('gurutype'))
                                                <option value="{{ old('gurutype') }}" selected>{{old('gurutype')}}</option>
                                                @endif
                                                <option value="Individual">Individual</option>
                                                <option value="Institutional">Institutional</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" id="shishyatype">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Select Shishya Type<span class="text-danger">*</span></label>
                                            <select name="shishyatype" class="form-control">
                                                <option value="">Select User Type</option>
                                                @if(old('shishyatype'))
                                                <option value="{{ old('shishyatype') }}" selected>{{old('shishyatype')}}
                                                </option>
                                                @endif
                                                <option value="Pharmacy">Pharmacy</option>
                                                <option value="Non Pharmacy">Non Pharmacy</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">



                                <div class="col-md-3">
                                    <!-- <div class="form-group">
                              <div class="form-line">
                                 <label >Password<span class="text-danger">*</span></label>
                                 <input type="password" class="form-control" name="password" id="password" placeholder="Password" maxlength="15" onkeyup='check()'>
                                 <i class="fas fa-eye-slash field-icon" id="eye"></i>
                                 <span id="password_error" class="text-danger"></span>
                                 <a id="display_123" href="javascript:toggle('123');" style="float:right;font-size:11px;">show password policy</a><br>
                                 <div id="toggle_123" style="display: none;box-shadow:1px 1px 1px 1px #ccc; ">
                                    minimum one numeric value, a-z, A-Z
                                 </div>
                              </div>
                           </div> -->
                                    <div class="form-group">
                                        <label>Password<span class="text-danger">*</span></label>
                                        <input id="password" class="form-control input-md" name="password"
                                            type="password" value="{{old('confirm-password')}}" placeholder="Enter your password"
                                            autocomplete="new-password" onpaste="return false" oncopy="return false">

                                        <i class="fas fa-eye-slash field-icon eye1"></i>
                                        <span id="password_error" class="text-danger"></span>
                                        <!-- <span class="text-danger" id="password_error"></span> -->
                                        <span class="show-pass" onclick="toggle()">
                                        </span>
                                       
                                        <div id="popover-password">
                                            <p><span id="result"></span></p>
                                            <div class="progress">
                                                <div id="password-strength" class="progress-bar" role="progressbar"
                                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
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
                                        <p class="error"></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Confirm Password<span class="text-danger">*</span></label>
                                            <input type="password" value="{{old('confirm-password')}}" class="form-control" name="confirm-password"
                                                id="checkPassword" placeholder="Confirm Password " onkeyup='check()'
                                                onpaste="return false" oncopy="return false">
                                            <i class="fas fa-eye-slash field-icon eye2"></i>
                                            <span id="confirm_password_msg"></span>
                                            <span id="confirm_password_error" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-3 pl-0">
                                    <div class="form-group">
                                        <label>Enter Captcha<span class="text-danger"> *</span></label>
                                        <input id="captcha" type="text" class="form-control" autocomplete="off" placeholder="Enter Captcha" name="captcha">
                                        @if ($errors->has('captcha'))
                                        <span class="text-danger">
                                        {{ $errors->first('captcha') }}
                                        </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="password" class="sr-only">Captcha</label>
                                      <div class="captcha ">
                                        <span>{!! captcha_img('math') !!}</span>
                                        <button type="button" class="btn btn-secondary btn-refresh me-2">
                                          <i class="fa fa-refresh"></i>
                                        </button>
                                      </div>
                                </div>
                            </div>
                            <div class="col-lg-12  text-center">
                                <a href="{{ route('newLogin') }}" class="btn login waves-effect">Back To Login</a>
                                <button type="submit" class="btn submit btn-primary m-r-15" id="submit">Submit</button>
                            </div>
                        </div>



                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/custom/sign-up.js') }}"></script>
<script src="{{ asset('assets/js/custom/password-policy.js') }}"></script>
<script>

$(".btn-refresh").click(function() {
    $.ajax({
      type: 'GET',
      url: '{{ url("refresh_captcha") }}',
      success: function(data) {
        $(".captcha span").html(data.captcha);
      }
    });
  });
  
$(function() {

    $(function() {

        $('.eye1').click(function() {
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

        $('.eye2').click(function() {
            if ($(this).hasClass('fa-eye-slash')) {

                $(this).removeClass('fa-eye-slash');

                $(this).addClass('fa-eye');

                $('#checkPassword').attr('type', 'text');

            } else {

                $(this).removeClass('fa-eye');

                $(this).addClass('fa-eye-slash');

                $('#checkPassword').attr('type', 'password');
            }
        });

    });
});
</script>

<!-- Add User -->

<!-- Edit User -->


<script type="text/javascript">
$(".btn-refresh").click(function() {
    $.ajax({
        type: 'GET',
        url: '{{ url('
        refresh_captcha ') }}',
        success: function(data) {
            $(".captcha span").html(data.captcha);
        }
    });
});
</script>
<script>
$(document).ready(function() {

    /*------------------------------------------
    --------------------------------------------
    Country Dropdown Change Event
    --------------------------------------------
    --------------------------------------------*/
    function populateStates() {
        var idCountry = $('#country-dropdown').val();
        var oldValue = "{{ old('state') }}";
        $("#state-dropdown").html('');
        $.ajax({
            url: "{{url('api/fetch-states')}}",
            type: "POST",
            data: {
                country_id: idCountry,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                $('#state-dropdown').html('<option value="">-- Select State --</option>');
                $.each(result.states, function(key, value) {
                    var selected = (value.id == oldValue) ? 'selected' : '';
                    $("#state-dropdown").append('<option value="' + value.id + '" ' + selected + '>' + value.name + '</option>');
                });
                $('#city-dropdown').html('<option value="">-- Select City --</option>');
                populateCities();
            }
        });
    }

    // Attach the function to the on change event
    $('#country-dropdown').on('change', populateStates);

    // Call the function on page load
    $(document).ready(populateStates);

    /*------------------------------------------
    --------------------------------------------
    State Dropdown Change Event
    --------------------------------------------
    --------------------------------------------*/
    function populateCities() {
        var idState = $('#state-dropdown').val();
        var oldValue = "{{ old('city') }}";
        $("#city-dropdown").html('');
        $.ajax({
            url: "{{url('api/fetch-cities')}}",
            type: "POST",
            data: {
                state_id: idState,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(res) {
                $('#city-dropdown').html('<option value="">-- Select City --</option>');
                $.each(res.cities, function(key, value) {
                    var selected = (value.id == oldValue) ? 'selected' : '';
                    $("#city-dropdown").append('<option value="' + value.id + '" ' + selected + '>' + value.name + '</option>');
                });
            }
        });
    }

    // Attach the function to the on change event
    $('#state-dropdown').on('change', populateCities);

});
</script>

@endsection
@extends('layouts.app-signup')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
@if ($message = Session::get('success'))
<div class="alert alert-success">
   <p>{{ $message }}</p>
</div>
@endif




<section class="content1" style="margin: 50px;">
   <div class="container-fluid">
     <div class="col-md-12">
        <img style="max-width: 300px;" src="{{asset('/assets/images/guru-shishya-parampara-logo.png')}}" class="login-logo mx-auto d-block">
     </div>
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
               <div class="header">
                  <h2 class="text-center">
                     <strong >Sign Up</strong> User

                  </h2><br>
                  <p class="text-center" style="color:red;">( Please Fill All Required Fields )</p><hr>
                  @if (count($errors) > 0)
                  <div class="alert alert-danger">
                     <strong>Whoops!</strong> There were some problems with your input.<br><br>
                     <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                  </div>
                  @endif
               </div>
               <form  class="validation-form123" action="{{ url('sign-up') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                               <div class="form-line">
                                  <label >Title<span class="text-danger"> *</span></label>
                                  <select name="title" class="form-control" id="title">
                                     <option value="">Select Title</option>

                                     @foreach(__('phr.titlename') as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                     @endforeach
                                   </select>
                               </div>
                            </div>
                         </div>
                    </div>
                     <div class="row clearfix">

                        <div class="col-sm-4">
                           <div class="form-group">
                              <div class="form-line">
                                 <label>First Name<span class="text-danger"> *</span></label>
                                 <input type="text"  name="firstname" class="form-control capitalize preventnumeric" value="{{ old('firstname') }}" placeholder="First Name" maxlength="30" minlength="2">
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-4">
                           <div class="form-group">
                              <div class="form-line">
                                 <label>Middle Name</label>
                                 <input type="text" name="middlename" class="form-control capitalize preventnumeric" placeholder="Middle Name"  value="{{ old('middlename') }}" maxlength="30" >
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                               <div class="form-line">
                                  <label>Last Name<span class="text-danger"> *</span></label>
                                  <input type="text" name="lastname" class="form-control capitalize preventnumeric" placeholder="Last Name" value="{{ old('lastname') }}" maxlength="30" >
                               </div>
                            </div>
                         </div>

                     </div>
                     <div class="row clearfix">

                        <div class="col-sm-4">
                           <div class="form-group">
                              <div class="form-line">
                                 <label >Email</label><span class="text-danger"> *</span><!-- <span style="font-size: 10px;"> (All communication from RAV Accredatitation will sent on this email id)</span> -->
                                 <input type="email" name="email" id="email" class="form-control" placeholder="Email"  value="{{ old('email') }}" maxlength="50" minlength="10">
                                 @if ($errors->has('email'))
                                     <span class="help-block">
                                         <strong style="color:red;">{{ $errors->first('email') }}</strong>
                                     </span>
                                 @endif
                                 <span id="email_error" class="text-danger"></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-4">
                           <div class="form-group">
                              <div class="form-line">
                                 <label >Mobile No.<span class="text-danger"> *</span></label>
                                 <input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="Mobile No."  value="{{ old('mobile_no') }}" maxlength="10">
                                 @if ($errors->has('mobile_no'))
                                     <span class="help-block">
                                         <strong style="color:red;">{{ $errors->first('mobile_no') }}</strong>
                                     </span>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-line">
                                   <label >Gender<span class="text-danger"> *</span></label>
                                   <select name="gender" class="form-control" id="gender">
                                      <option value="">Select Gender</option>

                                      @foreach(__('phr.gender') as $key=>$value)
                                         <option value="{{$key}}">{{$value}}</option>
                                      @endforeach
                                    </select>
                                </div>
                             </div>

                        </div>
                     </div>
                     <div class="row clearfix">
                        <div class="col-sm-4">
                           <div class="form-group default-select select2Style">
                              <label >Country<span class="text-danger"> *</span></label>
                              <select name="country" class="form-control select2" id="country-dropdown">
                                      <option value="">Select Country</option>
                                      @foreach ($countries as $data)
                                        <option value="{{$data->id}}">
                                            {{$data->name}}
                                        </option>
                                        @endforeach
                                    </select>
                           </div>
                        </div>
                        <div class="col-sm-4">
                           <div class="form-group default-select select2Style">
                              <label >State<span class="text-danger"> *</span></label>
                              <select id="state-dropdown" class="form-control select2" name="state">
                                 <option value=""> Select State </option>
                              </select>
                          </div>
                        </div>
                        <div class="col-sm-4">
                           <div class="form-group default-select select2Style">
                              <label >City<span class="text-danger"> *</span></label>
                              <select id="city-dropdown" class="form-control select2" name="city">
                                  <option value=""> Select City </option>
                              </select>
                          </div>
                        </div>
                     </div>

                     <div class="row clearfix">
                        <div class="col-sm-4">
                           <div class="form-group">
                              <div class="form-line">
                                 <label >User Type<span class="text-danger">*</span></label>
                                 <select name="user_type" class="form-control" id="user_type">
                                    <option value="">Select User Type</option>
                                    @foreach($user_type as $key=>$user_type)
                                      <option value="{{ $key }}">{{ $user_type }}</option>
                                    @endforeach
                                  </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-4" id="gurutype">
                           <div class="form-group">
                              <div class="form-line">
                                 <label >Select Guru Type<span class="text-danger">*</span></label>
                                 <select name="gurutype" class="form-control">
                                    <option value="">Select User Type</option>
                                    <option value="Individual">Individual</option>
                                    <option value="Institutional">Institutional</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-4" id="shishyatype">
                           <div class="form-group">
                              <div class="form-line">
                                 <label >Select Shishya Type<span class="text-danger">*</span></label>
                                 <select name="shishyatype" class="form-control">
                                    <option value="">Select User Type</option>
                                    <option value="Pharmacy">Pharmacy</option>
                                    <option value="Non Pharmacy">Non Pharmacy</option>
                                  </select>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="row clearfix">
                        <div class="col-sm-6">
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
                              <label for="passwordinput">
                              Password
                              <span class="text-danger">*</span></label>
                              <input id="password" class="form-control input-md"
                                 name="password" type="password"
                                 placeholder="Enter your password" autocomplete="new-password" onpaste="return false" oncopy="return false">

                                 <i class="fas fa-eye-slash field-icon" id="eye"></i>
                              <span class="text-danger" id="password_error"></span>
                              <span class="show-pass" onclick="toggle()">
                              </span>
                              <p style="font-size:13px;">Submit Button will Automatic Active When Your Password is Strong Enough to Processed</p>
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
                        <div class="col-sm-6">
                           <div class="form-group">
                              <div class="form-line">
                                 <label>Confirm Password<span class="text-danger">*</span></label>
                                 <input type="password" class="form-control" name="confirm-password" id="checkPassword" placeholder="Confirm Password checkPassword" onkeyup='check()' onpaste="return false" oncopy="return false">
                                 <i class="fas fa-eye-slash field-icon" id="eye1"></i>
                                 <span id="confirm_password_msg"></span>
                                 <span id="confirm_password_error" class="text-danger"></span>
                              </div>
                           </div>
                        </div>

                        <div class="row clearfix">
                           <div class="col-sm-12">
                              <div class="form-group">
                                    <div class="col-md-12">
                                          <div class="captcha">
                                          <span>{!! captcha_img('math') !!}</span>
                                          <button type="button" class="btn btn-secondary btn-refresh"><i class="fa fa-refresh"></i></button>
                                          </div>
                                          <span class="text-danger">*</span>
                                          <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha" required>
                                          @if ($errors->has('captcha'))
                                              <span class="help-block">
                                                  <strong style="color:red;">{{ $errors->first('captcha') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                              </div>
                           </div>
                        </div>
                     </div>


                     <div class="col-lg-12 p-t-20 text-center">
                        <button type="submit" class="btn btn-primary waves-effect m-r-15">Submit</button>
                        <a href="{{ route('login') }}" class="btn waves-effect" style="line-height:2;background-color:#888;color:#fff;">Back To Login</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<script src="{{ asset('assets/js/custom/sign-up.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom.js') }}"></script>
<script src="{{ asset('assets/js/custom/password-policy.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<!-- Add User -->

<!-- Edit User -->


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
<script>
        $(document).ready(function () {

            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#country-dropdown').on('change', function () {
                var idCountry = this.value;
                $("#state-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dropdown').html('<option value="">-- Select State --</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                    }
                });
            });

            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#state-dropdown').on('change', function () {
                var idState = this.value;
                $("#city-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });

        });
</script>

@endsection
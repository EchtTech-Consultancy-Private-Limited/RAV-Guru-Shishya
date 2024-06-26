@extends('layouts.app-file')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">

<section class="content user">
   <div class="container-fluid">
      <div class="block-header">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <ul class="breadcrumb breadcrumb-style ">
                  <li class="breadcrumb-item">
                     <h4 class="page-title">Add @if($add_user_btn==1) {{__('phr.user_type')[1]}}  @elseif($add_user_btn==2) {{__('phr.user_type')[2]}}  @elseif($add_user_btn==3){{__('phr.user_type')[3]}}  @endif</h4>
                  </li>
                  <li class="breadcrumb-item bcrumb-1">
                     <a href="{{url('/dashboard')}}">
                     <i class="fas fa-home"></i> Home</a>
                  </li>
                  <li class="breadcrumb-item bcrumb-2">
                     <a href="{{ url()->previous() }}" onClick="return true;">User</a>
                  </li>
                  <li class="breadcrumb-item active">Add @if($add_user_btn==1) {{__('phr.user_type')[1]}}  @elseif($add_user_btn==2) {{__('phr.user_type')[2]}}  @elseif($add_user_btn==3){{__('phr.user_type')[3]}}  @endif</li>
               </ul>
            </div>
         </div>
      </div>
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
         <p>{{ $message }}</p>
      </div>
      @endif
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
               <div class="header">

               </div>
               <form  action="{{ route('users.store') }}" class="validation-form123" id="add_user_form" method="post" enctype="multipart/form-data">
                  <input type="hidden" class="form-control" name="user_type" value="{{$add_user_btn}}"  placeholder="User Type">
               @csrf
               <div class="body">
                  <div class="row clearfix">
                     <div class="col-md-4">
                        <div class="form-group">
                           <div class="form-line">
                              <label >Title</label>
                                 <select name="title" class="form-control">
                                    <option value="0">Select Title</option>
                                    @foreach(__('phr.titlename') as $key=>$value)
                                       <option value="{{$key}}">{{$value}}</option>
                                    @endforeach

                                  </select>
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-4">
                        <div class="form-group">
                           <div class="form-line">
                              <label>First Name<span class="text-danger">*</span></label>
                              <input type="text"  name="firstname"  class="form-control capitalize preventnumeric" value="{{ old('firstname') }}" placeholder="First Name" maxlength="32" minlength="2">
                              @if ($errors->has('firstname'))
                                 <span class="help-block">
                                    <strong style="color:red;">{{ $errors->first('firstname') }}</strong>
                                 </span>
                              @endif
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                           <div class="form-line">
                              <label>Middle Name</label>
                              <input type="text" name="middlename" class="form-control capitalize preventnumeric" placeholder="Middle Name"  value="{{ old('middlename') }}" maxlength="32" minlength="2">
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                           <div class="form-line">
                              <label>Last Name<span class="text-danger">*</span></label>
                              <input type="text" name="lastname" class="form-control capitalize preventnumeric" placeholder="Last Name" value="{{ old('lastname') }}" maxlength="32" minlength="2">
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-4">
                        <div class="form-group">
                           <div class="form-line">
                              <label >Email</label><span class="text-danger">*</span><!-- <span style="font-size: 10px;"> (All communication from RAV Accredatitation will sent on this email id)</span> -->
                              <input type="email" name="email" id="email" class="form-control" placeholder="Email"  value="{{ old('email') }}" maxlength="50">
                                 @if ($errors->has('email'))
                                     <span class="help-block">
                                         <strong style="color:red;">{{ $errors->first('email') }}</strong>
                                     </span>
                                 @endif
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                           <div class="form-line">
                              <label >Mobile No.<span class="text-danger">*</span></label>
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
                                          @if($key == old('gender'))
                                             <option value="{{ $key }}" selected>{{ $value }}</option>
                                          @endif
                                       @endforeach
                                    </select>
                                </div>
                             </div>

                        </div>

                      <div class="col-sm-4">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">E-Sign</label>
                           <input type="file" class="form-control" name="e_sign" id="e_sign" accept=".jpg, .jpeg, .png" onchange="validateFile('e_sign')" placeholder="E-Sign">
                           <span id="esign_error" class="text-danger"></span>
                           @if ($errors->has('e_sign'))
                              <span class="help-block">
                                 <strong style="color:red;">{{ $errors->first('e_sign') }}</strong>
                              </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="form-group ">
                           <label >Profile Picture</label>
                             <input type="file" name="profile_image" accept=".jpg, .jpeg, .png" onchange="validateFile('profile_image')" id="profile_image" class="form-control" >
                             @if ($errors->has('profile_image'))
                              <span class="help-block">
                                 <strong style="color:red;">{{ $errors->first('profile_image') }}</strong>
                              </span>
                           @endif
                        </div>
                     </div>
                     @if($add_user_btn==2)
                        <div class="col-md-3">
                           <div class="form-group ">
                              <label >Type<span class="text-danger">*</span></label>
                              <select name="gurutype" class="form-control">
                                 @if(@(old('gurutype')))
                                    <option value="{{ old('gurutype') }}" selected>{{ old('gurutype') }}</option>
                                 @endif
                                 <option value="">Select Guru Type</option>
                                 <option value="Individual">Individual</option>
                                 <option value="Institutional">Institutional</option>
                              </select>
                           </div>
                        </div>
                        @elseif($add_user_btn==3)
                        <div class="col-md-3">
                           <div class="form-group ">
                              <label >Type<span class="text-danger">*</span></label>
                              <select name="shishyatype" class="form-control">
                                 @if(@(old('shishyatype')))
                                    <option value="{{ old('shishyatype') }}" selected>{{ old('shishyatype') }}</option>
                                 @endif
                                 <option value="">Select Shishya Type</option>
                                 <option value="Pharmacy">Pharmacy</option>
                                 <option value="Non Pharmacy">Non Pharmacy</option>
                               </select>
                           </div>
                         </div>
                         @endif


                        <div class="col-md-3">
                           <div class="form-group default-select select2Style">
                              <label >Country<span class="text-danger"> *</span></label>
                              <select name="country" class="form-control select2" id="country-dropdown">
                                      <option value="">Select Country</option>
                                       @foreach ($countries as $data)
                                          <option value="{{$data->id}}" >{{$data->name}}</option>
                                       @endforeach
                                    </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group default-select select2Style">
                              <label >State<span class="text-danger"> *</span></label>
                              <select id="state-dropdown" class="form-control select2" name="state">
                                 <option value=""> Select State </option>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group default-select select2Style">
                              <label >City<span class="text-danger"> *</span></label>
                              <select id="city-dropdown" class="form-control select2" name="city">
                                  <option value=""> Select City </option>
                              </select>
                          </div>
                        </div>
                     </div>
                  <div class="row clearfix">
                     <div class="col-md-3">
                        <div class="form-group">
                              <label for="passwordinput">
                              Password
                              <span class="text-danger">*</span></label>
                              <input id="password" class="form-control input-md"
                                 name="password" type="password"
                                 placeholder="Enter your password" value="{{ old('confirm-password') }}" maxlength="15" autocomplete="new-password" onpaste="return false" oncopy="return false">
                                 <i class="fas fa-eye-slash field-icon" id="eye"></i>

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
                                 <ul class="list-unstyled" style="display:none;">
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
                     <div class="col-md-3">
                        <div class="form-group">
                           <div class="form-line">
                              <label>Confirm Password<span class="text-danger">*</span></label>
                              <input type="password" class="form-control" name="confirm-password" id="checkPassword" placeholder="Confirm Password" value="{{ old('confirm-password') }}" onkeyup='check()' maxlength="15" onpaste="return false" oncopy="return false">
                              <i class="fas fa-eye-slash field-icon" id="eye1"></i>
                              <span id="confirm_password_msg"></span>
                              <span id="confirm_password_error" class="text-danger"></span>
                           </div>
                        </div>
                     </div>

                  </div>

                  <div class="col-lg-12 p-t-20 text-center">
                     <button type="submit" class="btn submit  waves-effect m-r-15" >Submit</button>
                     <button type="reset" onclick="reset_form();" class="btn reset btn-danger waves-effect">Reset Form</button>
                  </div>
               </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<script>
   const fetchStatesUrl = "{{ url('api/fetch-states') }}";
   const fetchCitesUrl = "{{ url('api/fetch-cities') }}";
   const csrfToken = "{{ csrf_token() }}";
</script>
<script src="{{ asset('assets/js/custom/alert.js') }}"></script>
<script src="{{ asset('assets/js/custom/users.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom.js') }}"></script>
<script src="{{ asset('assets/js/custom/password-policy.js') }}"></script>
<script src="{{ asset('assets/js/custom/jquery-3.6.3.min.js') }}"></script>
@endsection
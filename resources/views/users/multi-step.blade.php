@extends('layouts.app-file')
@section('content')
<section class="content">
   <div class="container-fluid">
      <div class="block-header">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <ul class="breadcrumb breadcrumb-style">
                  <li class="breadcrumb-item">
                     <h6 class="page-title"> @if(request()->path()=="profile") Manage Profile  @endif </h6>
                  </li>
                  <li class="breadcrumb-item bcrumb-1">
                     <a href="{{url('/dashboard')}}">
                        <i class="fas fa-home"></i> Home
                     </a>
                  </li>
                  <li class="breadcrumb-item active">  @if(request()->path()=="profile") Manage Profile  @endif   </li>
               </ul>
               @if ($message = Session::get('basic_info'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <p>{{ $message }}</p>
                  <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
               </div>
               @endif
               @if ($message = Session::get('success'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <p>{{ $message }}</p>
                  <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
               </div>
               @endif
               @if ($message = Session::get('danger'))
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <p>{{ $message }}</p>
                  <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
               </div>
               @endif
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
               <div class="body p-5">
                  <div class="wizard">
                     <div class="tab-content wizard">
                        <div class="steps clearfix mb-5">
                           <ul role="tablist">
                              <li role="tab" class="first disabled @if(isset($form_step_type)) @if($form_step_type=='step1' || $form_step_type=='withour-session-step') active @endif @endif" id="wizard_horizontal-t-1">
                                 <a href="javacsript:void();">
                                    <span class="number">1.</span> Basic Details
                                 </a>
                              </li>
                              <li role="tab" class="disabled @if(isset($form_step_type)) @if($form_step_type=='step2') active @endif @endif" role="tabpanel" id="wizard_horizontal-t-2">
                                 <a href="javacsript:void();">
                                    <span class="number">2.</span> Educational Details
                                 </a>
                              </li>
                              <!-- Hide for shishya account -->
                              @if(Auth::user()->user_type != '3')
                              <li role="tab" class="disabled @if(isset($form_step_type)) @if($form_step_type=='step3') active @endif @endif" id="wizard_horizontal-t-3">
                                 <a href="javacsript:void();">
                                    <span class="number">3.</span> Clinical Details
                                 </a>
                              </li>
                              <li role="tab" class="disabled @if(isset($form_step_type)) @if($form_step_type=='step4') active @endif @endif" id="wizard_horizontal-t-4">
                                 <a href="javacsript:void();">
                                    <span class="number">4.</span> Publications Details
                                 </a>
                              </li>
                              <li role="tab" class="disabled last @if(isset($form_step_type)) @if($form_step_type=='step5') active @endif @endif" id="wizard_horizontal-t-5">
                                 <a href="javacsript:void();">
                                    <span class="number">5.</span> Other Specific Details
                                 </a>
                              </li>
                              @endif
                              <!-- end hide for shishya dashboard -->
                           </ul>
                        </div>
                        <div class="tab-pane @if(isset($form_step_type)) @if($form_step_type=='step1' || $form_step_type=='withour-session-step') active @endif @endif" role="tabpanel" id="step1">
                           <form action="{{ url('manage_profile_form') }}" method="POST" enctype="multipart/form-data" id="manage_profile_form">
                              @csrf
                              <input type="hidden"  name="form_step_type"  class="form-control capitalize" value="step1">
                              <input type="hidden"  name="user_id"  class="form-control capitalize" value="{{ Auth::user()->id }}">
                              <input type="hidden"  name="profile_id"  class="form-control capitalize" value="<?php echo get_profile_id(Auth::user()->id); ?>">
                              <div class="row">
                                 <div class="col-xxl-3 col-xl-3  col-md-4 col-6">
                                    <div class="form-group">
                                       <label >Title</label>
                                       <select name="title" class="form-control" >
                                          <option>Select Title </option>
                                          @foreach(__('phr.titlename') as $key=>$value)
                                          <option @if( $key==$profile_record[0]->title) SELECTED @endif value="{{$key}}">{{$value}}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>
                                 <!-- student name -->
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <!-- guru name -->
                                    <div class="form-group">
                                       <label>First Name<span class="text-danger">*</span></label>
                                       <input type="text"  name="firstname" class="form-control capitalize" id="firstname" value="@if(isset($profile_record[0])) {{ $profile_record[0]->firstname }} @else Auth::user()->firstname @endif" placeholder="First Name" maxlength="30">
                                       <p id="firstname_err" class="position-absolute"></p>
                                       @if($errors->has('firstname'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('firstname') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label>Middle Name</label>
                                       <input type="text" name="middlename" class="form-control capitalize" placeholder="Middle Name" minlength="2" maxlength="30" value="@if(isset($profile_record[0])) {{ $profile_record[0]->middlename }} @else Auth::user()->middlename @endif" >
                                    </div>
                                 </div>
                                 <!-- student name -->
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <!-- guru name -->
                                    <div class="form-group">
                                       <label>Last Name</label>
                                       <input type="text" name="lastname" class="form-control capitalize" placeholder="Last Name" minlength="2" maxlength="30" value="@if(isset($profile_record[0]))  {{ $profile_record[0]->lastname }} @else Auth::user()->lastname @endif" >
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label >Father's Name<span class="text-danger">*</span></label>
                                       <input type="text" name="f_name" id="f_name" class="form-control" placeholder="Father's Name" maxlength="30" value="{{ old('f_name', $profile_record[0]->f_name) }}">
                                       <p id="f_name_err" class="position-absolute"></p>
                                       @if($errors->has('f_name'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('f_name') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>

                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label >Mother's Name </label>
                                       <input type="text" name="m_name" id="m_name" class="form-control" placeholder="Mother's Name" maxlength="30" value="{{ old('m_name', @$profile_record[0]->m_name) }}">
                                       @if($errors->has('m_name'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('m_name') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                    <label for="Gender" class="form-control-label">Gender</label>
                                             <select name="gender" id="Gender" class="form-control">
                                                <option value="">Please select
                                                </option>
                                                @foreach(__('phr.gender') as $key=>$value)
                                                <option value="{{$key}}" {{@$profile_record[0]->gender == $key  ? 'selected' : ''}}>{{$value}}</option>
                                                @endforeach
                                             </select>
                                             @if ($errors->has('gender'))
                                             <span class="help-block">
                                                <strong style="color:red;">{{ $errors->first('gender') }}</strong>
                                             </span>
                                             @endif
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Marital Status</label>
                                             <select name="marital_status" id="Marital
                                             Status" class="form-control">
                                                <option value="">Please select</option>
                                                @foreach(__('phr.marital_status') as $key=>$value)
                                                   <option value="{{$key}}" {{@$profile_record[0]->marital_status == $key  ? 'selected' : ''}}>{{$value}}</option>
                                                @endforeach
                                             </select>
                                             @if ($errors->has('marital_status'))
                                             <span class="help-block">
                                                <strong style="color:red;">{{ $errors->first('marital_status') }}</strong>
                                             </span>
                                             @endif
                                    </div>
                                 </div>

                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Category</label>
                                             <select name="category" id="category" class="form-control">
                                                <option value="">Please select</option>
                                                @foreach(__('phr.category') as $key=>$value)
                                                   <option value="{{$key}}" {{@$profile_record[0]->category == $key  ? 'selected' : ''}}>{{$value}}</option>
                                                @endforeach
                                             </select>
                                             @if ($errors->has('category'))
                                             <span class="help-block">
                                                <strong style="color:red;">{{ $errors->first('category') }}</strong>
                                             </span>
                                             @endif
                                    </div>
                                 </div>

                                 <div class="col-xxl-2 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label for="date_of_birth">Date of Birth<span class="text-danger">*</span></label>
                                       <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" placeholder="Date of Birth" value="{{ old('date_of_birth', $profile_record[0]->date_of_birth) }}" max="{{date('Y-m-d',time())}}">
                                       <p id="date_of_birth_err" class="position-absolute"></p>
                                       @if($errors->has('date_of_birth'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('date_of_birth') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>

                                 <div class="col-xxl-2 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label>Age<span class="text-danger">*</span></label>
                                       <input type="text" name="age" id="age" class="form-control" placeholder="Enter your Age"  value="{{ old('age', $profile_record[0]->age) }}">
                                       <p id="age_err" class="position-absolute"></p>
                                       @if($errors->has('age'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('age') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>

                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label >Email</label><span class="text-danger">*</span>
                                       <input type="email" name="email" id="email" class="form-control" placeholder="Email"  value="@if(isset($profile_record[0])) {{ $profile_record[0]->email }} @else Auth::user()->email @endif" maxlength="50" readonly="readonly">
                                    </div>
                                 </div>
                                 <div class="col-xxl-2 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label >Mobile No.<span class="text-danger">*</span></label>
                                       <input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="Please Enter 10 Digit Mobile No." oninput="validateInput(this)" maxlength="10" value="@if(isset($profile_record)){{$profile_record[0]->mobile_no}}@else @endif" >
                                       <p id="mobile_no_err" class="position-absolute"></p>
                                       @if($errors->has('mobile_no'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('mobile_no') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>

                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label >Aadhar Number<span class="text-danger">*</span></label>
                                       <input type="text" name="aadhaar_no" id="aadhaar_no" class="form-control" oninput="validateInput(this)" maxlength="12" placeholder="Please Enter 12 Digit Adhar No."  value="{{ old('aadhaar_no', $profile_record[0]->aadhaar_no) }}">
                                       <p id="aadhaar_no_err" class="position-absolute"></p>
                                       @if($errors->has('aadhaar_no'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('aadhaar_no') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label >Pan Number<span class="text-danger">*</span></label>
                                       <input type="text" name="pan_no" id="Pancard" class="form-control" maxlength="10" placeholder="Please Enter Your Pan Number"  value="{{ old('pan_no', $profile_record[0]->pan_no) }}">
                                       <p id="pan_no_err" class="position-absolute"></p>
                                       @if($errors->has('pan_no'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('pan_no') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>

                                 <div class="header col-md-12 pt-0">
                                    <h2>Present Address </h2>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label >Address Line 1<span class="text-danger">*</span></label>
                                       <input type="textarea" name="address1" id="address1" class="form-control" placeholder="Address Line 1" value="{{ old('address1', $profile_record[0]->address1) }}">
                                       <p id="address1_err" class="position-absolute"></p>
                                       @if($errors->has('address1'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('address1') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label >Address Line 2<span class="text-danger">*</span></label>
                                       <input type="textarea" name="address2" id="address2" class="form-control" placeholder="Address Line 2" value="{{ old('address2', $profile_record[0]->address2) }}">
                                       <p id="address2_err" class="position-absolute"></p>
                                       @if($errors->has('address2'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('address2') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group option-selector">
                                       <label>Country<span class="text-danger">*</span></label>
                                       <select name="country" class="form-control select2" id="country-dropdown" >
                                          <option value="">Select Country</option>
                                          @if(isset($profile_record[0]))
                                          @foreach ($countries as $data)
                                          <option value="{{ $data->id}}" {{$data->id == $profile_record[0]->country  ? 'selected' : ''}}>
                                             {{$data->name}}
                                          </option>
                                          @endforeach
                                          @endif
                                       </select>
                                       <p id="country_err" class="position-absolute"></p>
                                       @if($errors->has('country'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('country') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group option-selector">
                                       <label>State <span class="text-danger">*</span></label>
                                       <select id="state-dropdown" class="form-control state select2" name="state">
                                          @if(isset($profile_record[0]))
                                          <option value="{{$profile_record[0]->state}}">{{ $profile_record[0]->state_name }}</option>
                                          @endif
                                       </select>
                                       <p id="state_err" class="position-absolute"></p>
                                       @if($errors->has('state'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('state') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group option-selector">
                                       <label>City <span class="text-danger">*</span></label>
                                       <select id="city-dropdown" class="form-control select2" name="city" >
                                          <option value="{{$profile_record[0]->city}}">{{ $profile_record[0]->city_name }}</option>
                                       </select>
                                       <p id="city_err" class="position-absolute"></p>
                                       @if($errors->has('city'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('city') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label >Pincode<span class="text-danger">*</span></label>
                                       <input type="text" name="pincode" id="Pincode" class="form-control" oninput="validateInput(this)" maxlength="6" placeholder="Pincode"  value="{{ old('pincode', $profile_record[0]->pincode) }}">
                                       <p id="pincode_err" class="position-absolute"></p>
                                       @if($errors->has('pincode'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('pincode') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-sm-12 col-md-12 mb-3">
                                    <div class="form-check m-l-5 pb-2">
                                       <label class="form-check-label">
                                          <input class="form-check-input" type="checkbox" id="same_as_present" name="same_as_present" value="1" {{ (@$profile_record[0]->is_same_permanent_address == 1) ? 'checked' : '' }}> Same as Present Address
                                          <span class="form-check-sign">
                                             <span class="check"></span>
                                          </span>
                                       </label>
                                    </div>
                                 </div>
                                 <div class="header col-md-12 pt-0">
                                    <h2>Permanent Address </h2>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label >Address Line 1<span class="text-danger">*</span></label>
                                       <input type="textarea" name="per_address1" id="per_address_Line1" class="form-control" placeholder="Permanent Address Line 1"  value="{{ $profile_record[0]->per_address1 }}">
                                       <p id="per_address1_err" class="position-absolute"></p>
                                       @if($errors->has('per_address1'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('per_address1') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label >Address Line 2<span class="text-danger">*</span></label>
                                       <input type="textarea" name="per_address2" id="per_address_Line2" class="form-control" placeholder="Permanent Address Line 2"  value="{{ $profile_record[0]->per_address2 }}">
                                       <p id="per_address2_err" class="position-absolute"></p>
                                       @if($errors->has('per_address2'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('per_address2') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group option-selector">
                                       <label>Country <span class="text-danger">*</span></label>
                                       <select name="per_country" class="form-control select2" id="per-country-dropdown">
                                          <option value="">Select Country</option>
                                          @foreach ($countries as $data)
                                          <option value="{{ $data->id}}" @if(isset($per_profile_record[0])){{$data->id == $per_profile_record[0]->per_country  ? 'selected' : ''}} @endif>
                                             {{$data->name}}
                                          </option>
                                          @endforeach
                                       </select>
                                       <p id="per_country_err" class="position-absolute"></p>
                                       @if($errors->has('per_country'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('per_country') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group option-selector">
                                       <label>State <span class="text-danger">*</span></label>
                                       <select id="per-state-dropdown" class="form-control state select2" name="per_state" >
                                          @if(isset($per_profile_record[0]))
                                          <option value=" {{$per_profile_record[0]->per_state}}">{{ $per_profile_record[0]->per_state_name }}</option>
                                          @else
                                          @endif
                                       </select>
                                       <p id="per_state_err" class="position-absolute"></p>
                                       @if($errors->has('per_state'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('per_state') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group option-selector">
                                       <label>City <span class="text-danger">*</span></label>
                                       <select id="per-city-dropdown" class="form-control select2" name="per_city">
                                          @if(isset($per_profile_record[0]))
                                          <option value="{{$per_profile_record[0]->city}}">{{ $per_profile_record[0]->per_city_name }}</option>
                                          @else
                                          @endif
                                       </select>
                                       <p id="per_city_err" class="position-absolute"></p>
                                       @if($errors->has('per_city'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('per_city') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label >Pincode<span class="text-danger">*</span></label>
                                       <input type="text" name="per_pincode" id="per_pincode" class="form-control" oninput="validateInput(this)" maxlength="6" placeholder="Pincode"  value="{{ $profile_record[0]->per_pincode }}">
                                       <p id="per_pincode_err" class="position-absolute"></p>
                                       @if($errors->has('per_pincode'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('per_pincode') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>

                                 <!-- Bank details  -->
                                 <div class="header col-md-12 pt-0">
                                    <h2>Bank Details </h2>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group option-selector">
                                       <label >Bank Name<span class="text-danger">*</span></label>
                                       <select name="bank_name" id="bank_name" class="form-control select2">
                                          <option value="">Please select</option>
                                          @foreach(__('phr.banks') as $key=>$value)
                                          <option value="{{$key}}" {{@$profile_record[0]->bank_name == $key  ? 'selected' : ''}}>{{$value}}</option>
                                          @endforeach
                                          </select>
                                          <p id="bank_name_err" class="position-absolute"></p>
                                          @if ($errors->has('bank_name'))
                                          <span class="help-block">
                                             <strong style="color:red;">{{ $errors->first('bank_name') }}</strong>
                                          </span>
                                          @endif
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label >IFSC Code<span class="text-danger">*</span></label>
                                       <input type="text" name="ifsc_code" id="ifsc_code" class="form-control" placeholder="IFSC Code" maxlength="15" value="{{ old('ifsc_code', @$profile_record[0]->ifsc_code) }}">
                                       <p id="ifsc_code_err" class="position-absolute"></p>
                                       @if($errors->has('ifsc_code'))
                                          <span class="help-block">
                                             <strong style="color:red;">{{ $errors->first('ifsc_code') }}</strong>
                                          </span>
                                          @endif
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label >Account Number<span class="text-danger">*</span></label>
                                       <input type="text" name="account_no" id="account_no" class="form-control" maxlength="25" placeholder="Account Number" oninput="validateInput(this)" value="{{ old('account_no', @$profile_record[0]->account_no) }}">
                                       <p id="account_no_err" class="position-absolute"></p>
                                       @if($errors->has('account_no'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('account_no') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label >Account Holder Name<span class="text-danger">*</span></label>
                                       <input type="text" name="account_holder_name" id="account_holder_name" class="form-control" placeholder="Account Number"  value="{{ old('account_holder_name', @$profile_record[0]->account_holder_name) }}">
                                       <p id="account_holder_name_err" class="position-absolute"></p>
                                       @if($errors->has('account_holder_name'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('account_holder_name') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-sm-12 col-md-6 mb-3">
                                    <div class="form-group ">
                                       <input type="checkbox"  name="bank_aadhar_link" id="bank_aadhar_link" class="checkbox"  value="{{ old('0',@$profile_record[0]->bank_aadhar_link) }}" @if(@$profile_record[0]->bank_aadhar_link==1) checked @endif>
                                       <label for="central" class="ps-2">Account is linked with (Aadhar & Pan Card No.)</label>
                                    </div>
                                 </div>
                                 <div class="col-sm-12 col-md-6 mb-3">
                                    <div class="form-group">
                                       <input type="checkbox"  name="bank_mobile_link" id="bank_mobile_link" class="checkbox"  value="{{ old('0',@$profile_record[0]->bank_mobile_link) }}" @if(@$profile_record[0]->bank_mobile_link==1) checked @endif>
                                       <label for="central" class="ps-2">Mobile Number ( Linked with Account Number)</label>
                                    </div>
                                 </div>

                                 <!-- End bank details -->

                                 <!-- Languages -->
                                 <div class="header col-md-12 pt-0">
                                    <h2>Add Languages</h2>
                                 </div>
                                 <div class="col-md-12 mb-0">
                                    <div class="row language" id="language_body">
                                       <div class="col-sm-12 col-md-3">
                                          <div class="form-group mb-3">
                                             <label><b>Language</b></label>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-3">
                                          <div class="form-group mb-3">
                                             <label><b>Reading</b></label>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-3">
                                          <div class="form-group mb-3">
                                             <label><b>Writing</b></label>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-2">
                                          <div class="form-group mb-3">
                                             <label><b>Speaking</b></label>
                                          </div>
                                       </div>
                                       @php $check='0'; @endphp
                                       @foreach($language_record as $language_records)
                                       @if($language_records->reading==1)
                                       @php $check='1'; @endphp @break;
                                       @endif
                                       @endforeach
                                       @php $writing='0'; @endphp
                                       @foreach($language_record as $language_records)
                                       @if($language_records->writing==1)
                                       @php $writing='1'; @endphp @break;
                                       @endif
                                       @endforeach
                                       @php $speaking='0'; @endphp
                                       @foreach($language_record as $language_records)
                                       @if($language_records->speaking==1)
                                       @php $speaking='1'; @endphp @break;
                                       @endif
                                       @endforeach
                                       @if(isset($language_record))
                                       @foreach($language_record as $key=>$language_records)
                                       <div class="col-sm-12 col-md-3">
                                          <div class="form-group">
                                             <input type="hidden" class="form-control" placeholder="Add Language" name="lang_id[]" value="{{ $language_records->id }}">
                                             <input type="text" class="form-control" placeholder="Add Language" name="lang_name[]" value="{{ $language_records->lang_name }}">
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-3 mb-3">
                                          <!-- <input type="checkbox"  class="form-check" name="reading[]"  @if($check==1) checked @endif>  -->
                                          <div class="form-group">
                                             <select name="reading[]" class="form-control">
                                                <option value="">Select </option>
                                                <option value="1" {{$language_records->reading == 1 ?'selected':''}}>Yes</option>
                                                <option value="0" {{$language_records->reading == 0 ?'selected':''}}>No</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-3 mb-3">
                                          <div class="form-group">
                                             <select name="writing[]" class="form-control">
                                                <option value="">Select</option>
                                                <option value="1" {{$language_records->writing == 1 ?'selected':''}}>Yes</option>
                                                <option value="0" {{$language_records->writing == 0 ?'selected':''}}>No</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-2 mb-3">
                                          <!-- <input type="checkbox" name="speaking[]" @if($speaking==1) checked @endif/> -->
                                          <div class="form-group d-flex justify-content-between">
                                             <select name="speaking[]" class="form-control">
                                                <option value="">Select</option>
                                                <option value="1" {{$language_records->speaking == 1 ?'selected':''}}>Yes</option>
                                                <option value="0" {{$language_records->speaking == 0 ?'selected':''}}>No</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-1 mb-3">
                                       <a href="{{ url('language-delete/'.$language_records->id) }}" class="btn btn-tbl-delete" onclick="return confirm_option('delete')"><i class="material-icons">delete_forever</i></a>

                                       </div>
                                       @endforeach
                                       @endif
                                    </div>
                                    <div class="add-btn-lang ">
                                       <a href="javascript:void();" class="btn lang bg-success" id="Add_language">
                                          <i class="fa fa-plus"></i>
                                       </a>
                                       <a href="javascript:void();" class="btn lang bg-red d-none" id="delete_language">
                                          <i class="fa fa-minus"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="col-sm-12 col-md-6">
                                    <!-- guru name -->
                                    <div class="form-group">
                                       <label >E-Signature</label>
                                       <input type="file" name="e_sign" id="e_sign" class="form-control" >
                                       @if($errors->has('e_sign'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('e_sign') }}</strong>
                                       </span><br>
                                       @endif
                                       @if($profile_record[0]->e_sign)
                                       <img src="{{ asset('uploads/'.$profile_record[0]->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                       @endif                                      
                                    </div>
                                 </div>
                                 <div class="col-sm-12 col-md-6">
                                    <div class="form-group ">
                                       <label >Profile Picture<span class="text-danger"></span></label>
                                       <input type="file" name="profile_image" id="profile_image" class="form-control" >
                                       @if($errors->has('profile_image'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('profile_image') }}</strong>
                                       </span><br>
                                       @endif
                                       @if($profile_record[0]->user_image)
                                       <img src="{{ getImagePath($profile_record[0]->user_image) }}" alt="Profile-Image" width="100px;" height="80px;">
                                       @else
                                       <img src="{{ asset('assets/images/user.png') }}" alt="Profile-Image" width="100px;" height="80px;">
                                       @endif                                      
                                    </div>
                                 </div>
                              </div>
                              <ul class="list-inline pull-right">
                                 <li>
                                    <button type="submit" class="btn submit bg-indigo">Submit</button>
                                    <button type="button" class="btn next btn-info next-step">Next</button>
                                 </li>
                              </ul>
                           </form>
                        </div>
                        <div class="tab-pane @if(isset($form_step_type)) @if($form_step_type=='step2') active @endif @endif" role="tabpanel" id="step2">
                           <form action="{{ url('manage_profile_form_step2') }}" method="POST" id="step2" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden"  name="form_step_type"  class="form-control capitalize" value="step2">
                              <input type="hidden"  name="user_id"  class="form-control capitalize" value="{{ Auth::user()->id }}">
                              <input type="hidden"  name="profile_id"  class="form-control capitalize" value="<?php echo get_profile_id_step2(Auth::user()->id); ?>">
                              <div class="row">
                                 <div class="col-lg-3 mb-0">
                                    <div class="form-group">
                                       <label for="institute_name">Institute Name</label>
                                       <input type="text" id="institute_name" name="institute_name" placeholder="Institute Name" value="{{ old('institute_name') }}" maxlength="200">
                                       @if ($errors->has('institute_name'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('institute_name') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-lg-3 mb-0">
                                    <div class="form-group">
                                    <label for="NOB">Name of Board</label>
                                    <input type="text" id="NOB" placeholder="Name of Board" class="form-control" name="name_of_board" value="{{ old('name_of_board') }}">
                                    </div>
                                 </div>
                                 <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                       <label>Course<span class="text-danger">*</span></label>
                                       <select name="course_name" class="form-control" required>
                                          <option value="">Select Course</option>
                                          @foreach(__('phr.education_course') as $key=>$value)
                                          <option  value="{{$value}}">{{$value}}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 mb-0">
                                    <div class="form-group">
                                       <label for="year_passing">Year of Passing <span class="text-danger">*</span></label>
                                       <input type="date" id="year_of_passing" name="year_of_passing" max="{{date('Y-m-d',time())}}" required>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 mb-0">
                                    <div class="form-group">
                                    <label for="Registration_Number">Registration Number</label>
                                    <input type="text" id="Registration_Number" placeholder="Registration Number" class="form-control" name="regis_no" value="{{ old('regis_no') }}">
                                    </div>
                                 </div>

                                 <div class="col-lg-3 mb-0">
                                    <div class="form-group">
                                    <label for="Registration_year">Year of Registration <span class="text-danger">*</span></label>
                                    <input type="date" id="Registration_year" placeholder="Year of Registration" class="form-control" name="year_of_regis" value="{{ old('Registration_year') }}" max="{{date('Y-m-d',time())}}" required>
                                    </div>
                                 </div>

                                 <div class="col-lg-3 mb-0">
                                    <div class="form-group ">
                                       <label >Upload Degree</label>
                                       <input type="file" name="upload_degree" class="form-control" accept="application/pdf">
                                       @if ($errors->has('upload_degree'))
                                       <span class="help-block">
                                          <strong style="color:red;">{{ $errors->first('upload_degree') }}</strong>
                                       </span>
                                       @endif
                                    </div>
                                 </div>
                                 <div class="col-md-12 d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn save bg-indigo waves-effect" name="educational" value="educational-form">Save</button>
                                 </div>
                              </div>
                           </form>
                           <div class="row clearfix">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="card">
                                    <div class="body table-responsive p-0">
                                       <table class="table table-bordered">
                                          <thead>
                                             <tr>
                                                <th>S.No.</th>
                                                <th>Institute Name</th>
                                                <th>Name Of Board</th>
                                                <th>Course</th>
                                                <th>Registration Number</th>
                                                <th>Year Of Registration</th>
                                                <th>Year of Passing</th>
                                                <th>Show Degree</th>
                                                <th>Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             @foreach($educational_record as $key=>$educational_records)
                                             <tr>
                                                <td scope="row">{{++$key}}</td>
                                                <td>{{ $educational_records->institute_name }}</td>
                                                <td>{{ $educational_records->name_of_board }}</td>
                                                <td>{{ $educational_records->course_name }} </td>
                                                <td>{{ $educational_records->regis_no }} </td>
                                                <td>{{ date('d-m-Y', strtotime($educational_records->year_of_regis)) }} </td>
                                                <td>{{ date('d-m-Y', strtotime($educational_records->year_of_passing)) }}</td>
                                                <td class="text-center">
                                                   @if($educational_records->upload_degree)
                                                   <!--  <img src="{{ asset('uploads/'.$educational_records->upload_degree) }}" alt="E-Sign" width="100px;" height="80px;"> -->
                                                   <a target="_blank" href="{{ asset('uploads/'.$educational_records->upload_degree) }}" class="btn btn-tbl-edit" title="View Record">
                                                      <i class="material-icons">visibility</i>
                                                   </a>
                                                   @endif
                                                </td>
                                                <td class="d-flex justify-content-start">
                                                   <a class="btn edit btn-tbl-edit  update_education"  data-id="{{$educational_records->id}}"    data-bs-toggle="modal" data-bs-target="#edit_modal" ><i class="material-icons">edit</i></a>
                                                   <form action="{{ url('education-delete') }}" method="post">
                                                      @csrf
                                                      <input type="hidden" name="form_step_type" value="step2">
                                                      <input type="hidden" name="education_dlt_id" value="{{$educational_records->id}}">
                                                      <button type="submit" class="btn delete btn-tbl-edit bg-danger d-flex justify-content-center delete" onclick="return confirm_option('delete')"><i class="material-icons">delete</i></button>
                                                   </form>
                                                </td>
                                             </tr>
                                             @endforeach
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @if(Auth::user()->user_type != '3')
                           <ul class="list-inline pull-right ">
                              <li><button type="button" class="btn previous btn-danger prev-step mr-2">Previous</button></li>
                              <li><button type="button" class="btn next btn-info next-step1">Next</button></li>
                           </ul>
                           @endif
                        </div>
                        <div class="tab-pane @if(isset($form_step_type)) @if($form_step_type=='step3') active @endif @endif" role="tabpanel" id="step3">
                           <form action="{{ url('manage_profile_form_step3') }}" method="POST" id="manage_profile_form_step3" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden"  name="form_step_type"  class="form-control capitalize" value="step4">
                              <input type="hidden"  name="user_id"  class="form-control capitalize" value="{{ Auth::user()->id }}">
                              <input type="hidden"  name="clinical_id"  class="form-control capitalize" value="<?php echo get_clinical_id(Auth::user()->id); ?>">
                              <div class="row">
                                 <div class="col-sm-12 col-md-12 mb-3">
                                    <div class="form-group d-flex">
                                       <input type="checkbox"  name="any_done_services" id="any_done_services" class="checkbox"  value="0" @if(isset($clinic->any_done_services)) @if($clinic->any_done_services==1) checked @endif @endif>
                                       <label for="central"> Any service done under Central/State government</label>
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label for="Name_Clinic">Name of Clinic</label>
                                       <input type="text" id="Name_Clinic" placeholder="Name of Clinic" class="form-control p-0" name="name_of_clinic" value="@if(isset($clinic)){{ $clinic->name_of_clinic }}@endif">
                                    </div>
                                 </div>
                                 <div class=" col-xl-8 col-md-6 col-6">


                                       <div class="form-group default-select select2Style p-0">
                                       <label for="Registration_year">Working days </label>
                                          <select class="form-control select2 width p-0"  multiple="" data-placeholder="Select" name="working_days[]">
                                             @foreach(__('phr.working_days') as $key=>$value)
                                             @if(isset($clinic_working_record))
                                             <option @if(in_array($value, $clinic_working_record))  selected @endif value="{{$value}}">{{$value}}</option>
                                             @else
                                             <option  value="{{$value}}">{{$value}}</option>
                                             @endif
                                             @endforeach
                                          </select>
                                       </div>

                                 </div>
                                 <div class="header col-md-12 pt-0">
                                    <h2>Clinic Timings </h2>
                                 </div>
                                 <div class=" col-xl-5 col-md-6">


                                       <div class="form-group default-select select2Style">
                                       <label for="Registration_year">Morning Shifts Timings</label>
                                          <select class="form-control select2 width" multiple="" data-placeholder="Select" name="clinic_morning_timing[]">
                                             <option value="">Select Morning Timing</option>
                                             @foreach(__('phr.clinic_morning_timing') as $key=>$value)
                                             @if(isset($clinic_morning_timing))
                                             <option @if(in_array($value, $clinic_morning_timing))  selected @endif value="{{$value}}">{{$value}}</option>
                                             @else
                                             <option  value="{{$value}}">{{$value}}</option>
                                             @endif
                                             @endforeach
                                          </select>
                                       </div>

                                 </div>
                                 <div class=" col-xl-5 col-md-6">

                                       <div class="form-group default-select select2Style">
                                       <label for="Registration_year">Evening Shifts Timings</label>
                                          <select class="form-control select2 width" multiple="" data-placeholder="Select" name="clinic_evening_timing[]">
                                             <option value="">Select Morning Timing</option>
                                             @foreach(__('phr.clinic_evening_timing') as $key=>$value)
                                             @if(isset($clinic_evening_timing))
                                             <option @if(in_array($value, $clinic_evening_timing))  selected @endif value="{{$value}}">{{$value}}</option>
                                             @else
                                             <option  value="{{$value}}">{{$value}}</option>
                                             @endif
                                             @endforeach
                                          </select>
                                       </div>

                                 </div>
                                 <div class="col-xxl-2  col-xl-2  col-6">
                                    <div class="form-group">
                                       <label>Weekend Off <span class="text-danger">*</span></label>
                                       <select name="weekend_off" class="form-control" >
                                          <option value="">Select</option>
                                          <option value="1" @if(isset($clinic->weekend_off)) {{$clinic->weekend_off == 1 ?'selected':''}} @endif>Yes</option>
                                          <option value="2" @if(isset($clinic->weekend_off)) {{$clinic->weekend_off == 2 ?'selected':''}} @endif>No</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="header col-md-12 pt-0">
                                    <h2>Address of Practice place </h2>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label >Address Line 1<span class="text-danger">*</span></label>
                                       <input type="textarea" name="address1" id="address1" class="form-control" placeholder="Address Line 1"  value="@if(isset($clinic->address1)){{$clinic->address1}}@endif">
                                       <p id="address1_error" class="position-absolute"></p>
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label >Address Line 2<span class="text-danger">*</span></label>
                                       <input type="textarea" name="address2" id="address2" class="form-control" placeholder="Address Line 2"  value="@if(isset($clinic->address2)){{$clinic->address2}}@endif" required>
                                       <p id="address2_error" class="position-absolute"></p>
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group option-selector">
                                       <label >Country <span class="text-danger">*</span></label>
                                       <select name="country" class="form-control " id="country-dropdown-clinical" required>
                                          <option value="">Select Country</option>
                                          @foreach ($countries as $data)
                                          <option value="{{$data->id}}" @if(isset($clinic_record->country)) {{$data->id == $clinic_record->country  ? 'selected' : ''}} @endif>
                                             {{$data->name}}
                                          </option>
                                          @endforeach
                                       </select>
                                       <p id="country_error" class="position-absolute"></p>
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group option-selector">
                                       <label>State <span class="text-danger">*</span></label>
                                       <select id="state-dropdown-clinical" class="form-control  state " name="state">
                                          <option  @if(isset($clinic_record->state)) value="{{$clinic_record->state}}" @endif>@if(isset($clinic_record->state_name)){{ $clinic_record->state_name }} @endif</option>
                                       </select>
                                       <p id="state_error" class="position-absolute"></p>
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group option-selector">
                                       <label>City</label>
                                       <select id="city-dropdown-clinical" class="form-control state " name="city">
                                          <option value="@if(isset($clinic_record->city)) {{$clinic_record->city}} @endif">@if(isset($clinic_record->city)){{ $clinic_record->city_name }}@endif</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                    <div class="form-group">
                                       <label >Pincode<span class="text-danger">*</span></label>
                                       <input type="text" name="pincode" id="Pincode" class="form-control" oninput="validateInput(this)" maxlength="8" placeholder="Pincode"  value="@if(isset($clinic->pincode)) {{ $clinic->pincode }} @endif">
                                       <p id="pincode_error" class="position-absolute"></p>
                                    </div>
                                 </div>
                                 <div class=" col-xl-6  col-md-6 col-6">
                                    <div class="form-group">
                                       <label>Average number of patients seen daily in OPD<span class="text-danger">*</span></label>
                                       <input type="text" name="average_no_of_patients_in_opd" class="form-control" oninput="validateInput(this)" maxlength="12" placeholder="Average number"  value="@if(isset($clinic->average_no_of_patients_in_opd)) {{ $clinic->average_no_of_patients_in_opd }} @endif">
                                       <p id="average_no_of_patients_in_opd_error" class="position-absolute"></p>
                                    </div>
                                 </div>
                                 <div class=" col-xl-5  col-md-6 col-6">
                                    <div class="form-group">
                                       <label>Average number of occupancy ratio (Annually)</label>
                                       <input type="text" name="average_no_of_occupancy_annually" class="form-control" oninput="validateInput(this)" maxlength="12" placeholder="Average number"  value="@if(isset($clinic->average_no_of_occupancy_annually)) {{ $clinic->average_no_of_occupancy_annually }} @endif">
                                    </div>
                                 </div>
                                 <div class=" col-xl-7  col-md-6 col-6">
                                    <div class="form-group">
                                       <label >Weather maintaining any IPD. If yes, number of beds </label>
                                       <div class="d-flex justify-content-between show-form">
                                          <select name="weather_maintaining" class="form-control" id="mySelect">
                                             <option value="">Select</option>
                                             <option value="1" @if(isset($clinic->weather_maintaining)){{ $clinic->weather_maintaining=='1'?'selected':'' }} @endif>Yes</option>
                                             <option value="2"  @if(isset($clinic->weather_maintaining)) {{ $clinic->weather_maintaining=='2'?'selected':'' }} @endif>No</option>
                                          </select>
                                          <input type="text" name="weather_maintaining_no_of_beds" id="number_beds" oninput="validateInput(this)" maxlength="8" class="form-control ml-2  @if(isset($specific_details_record->weather_maintaining)) @if($specific_details_record->weather_maintaining!=1) d-none @endif @endif" placeholder="Number of Beds"  value="@if(isset($clinic->weather_maintaining_no_of_beds)) {{ $clinic->weather_maintaining_no_of_beds }} @endif">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="header col-md-12 pt-0">
                                    <h2>Other units available in the clinic </h2>
                                 </div>
                                 <div class=" col-xl-4  col-md-4 col-6">
                                    <div class="form-group">
                                       <label>Medicine Manufacturing Section</label>
                                       <select name="medicine_manufacturing_section" class="form-control">
                                          <option value="">Select</option>
                                          <option value="1" @if(isset($clinic->medicine_manufacturing_section)) {{ $clinic->medicine_manufacturing_section=='1'?'selected':'' }} @endif>Yes</option>
                                          <option value="2" @if(isset($clinic->medicine_manufacturing_section)) {{ $clinic->medicine_manufacturing_section=='2'?'selected':'' }} @endif>No</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-xxl-2 col-xl-2  col-md-4 col-6">
                                    <div class="form-group">
                                       <label>Panchakarma</label>
                                       <select name="panchakarma" class="form-control">
                                          <option value="">Select</option>
                                          <option value="1" @if(isset($clinic->panchakarma)) {{ $clinic->panchakarma=='1'?'selected':'' }} @endif>Yes</option>
                                          <option value="2" @if(isset($clinic->panchakarma)) {{ $clinic->panchakarma=='2'?'selected':'' }} @endif>No</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-xxl-2 col-xl-2  col-md-4 col-6">
                                    <div class="form-group">
                                       <label>Ksharsutra</label>
                                       <select name="ksharsutra" class="form-control">
                                          <option value="">Select</option>
                                          <option value="1" @if(isset($clinic->ksharsutra)) {{ $clinic->ksharsutra=='1'?'selected':'' }} @endif>Yes</option>
                                          <option value="2" @if(isset($clinic->ksharsutra)) {{ $clinic->ksharsutra=='2'?'selected':'' }} @endif>No</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-xxl-2 col-xl-4  col-md-4 col-6">
                                    <div class="form-group">
                                       <label>Any other</label>
                                       <input type="textarea" name="any_other" class="form-control" placeholder="Any other"  value="@if(isset($clinic->any_other)) {{ $clinic->any_other }} @endif" maxlength="200">
                                    </div>
                                 </div>
                                 <div class="header col-md-12 pt-0">
                                    <h2>Infrastructural details of the clinic/hospital</h2>
                                 </div>
                                 <div class=" col-xl-2  col-md-4 col-6  ">
                                    <div class="form-group">
                                       <label>Total Area</label>
                                       <input type="text" name="total_area" class="form-control" placeholder="Total Area" oninput="validateInput(this)" maxlength="8" value="@if(isset($clinic->total_area)) {{ $clinic->total_area }} @endif">
                                    </div>
                                 </div>
                                 <div class=" col-xl-3  col-md-4 col-6">
                                    <div class="form-group">
                                       <label>Number of rooms</label>
                                       <input type="text" name="no_of_rooms" id="no_of_rooms" class="form-control" oninput="validateInput(this)" maxlength="10" placeholder="Number of rooms"  value="@if(isset($clinic->no_of_rooms)) {{ $clinic->no_of_rooms }} @endif">
                                    </div>
                                 </div>
                                 <div class=" col-xl-4  col-md-4 col-6">
                                    <div class="form-group">
                                       <label>Number of wards and beds</label>
                                       <input type="text" name="no_of_wards_beds" class="form-control" oninput="validateInput(this)" maxlength="12" placeholder="Number of wards and beds"  value="@if(isset($clinic->no_of_wards_beds)) {{ $clinic->no_of_wards_beds }} @endif">
                                    </div>
                                 </div>
                                 <div class=" col-xl-3  col-md-4 col-6">
                                    <div class="form-group">
                                       <label>Facilities available</label>
                                       <input type="text" name="facilities_available" class="form-control" placeholder="Facilities available"  value="@if(isset($clinic->facilities_available)) {{ $clinic->facilities_available }} @endif">
                                    </div>
                                 </div>
                              </div>
                              <ul class="list-inline pull-right">
                                 <li><button type="button" class="btn previous btn-danger prev-step1 mr-2">Previous</button></li>
                                 <li><button type="submit" class="btn next btn-info btn-info-full">Next</button></li>
                              </ul>
                           </form>
                        </div>
                        <div class="tab-pane @if(isset($form_step_type)) @if($form_step_type=='step4') active @endif @endif" role="tabpanel" id="step4">
                           <form action="{{ url('manage_profile_form_step4') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden"  name="form_step_type"  class="form-control capitalize" value="step4">
                              <input type="hidden"  name="user_id"  class="form-control capitalize" value="{{ Auth::user()->id }}">
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="school_name">No. of case reports</label>
                                       <input type="text"name="no_of_case_reports"  placeholder="No. of case reports" oninput="validateInput(this)" maxlength="10" required>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="school_name">Research Papers</label>
                                       <input type="text"name="research_papers" placeholder="Research Papers" oninput="validateInput(this)" maxlength="10">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="school_name">Books Published</label>
                                       <input type="text"name="books_published"  placeholder="Books Published" oninput="validateInput(this)" maxlength="10">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label for="school_name">Number of Seminars / Conference / Workshops attended</label>
                                       <input type="text"name="no_of_seminars" placeholder="Number of Seminars / Conference / Workshops attended" oninput="validateInput(this)" maxlength="10">
                                    </div>
                                 </div>
                                 <div class="col-md-12 text-center mb-3">
                                    <button type="submit" class="btn save bg-indigo waves-effect">Save</button>
                                 </div>
                              </div>
                           </form>
                           <div class="row clearfix">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="card">
                                    <div class="body table-responsive p-0">
                                       <table class="table table-bordered">
                                          <thead>
                                             <tr>
                                                <th>S.No.</th>
                                                <th>No. of case reports</th>
                                                <th>Research Papers</th>
                                                <th>Books Published</th>
                                                <th>Number of Seminars </th>
                                                <th>Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             @foreach($publication_record as $key=>$publication_record)
                                             <tr>
                                                <td scope="row">{{++$key}}</td>
                                                <td>{{ $publication_record->no_of_case_reports }}</td>
                                                <td>{{ $publication_record->research_papers }} </td>
                                                <td>{{ $publication_record->books_published }}</td>
                                                <td>{{ $publication_record->no_of_seminars }}</td>
                                                <td class="d-flex justify-content-center">
                                                   <a class="btn btn-tbl-edit  update_publication"  data-id="{{$publication_record->id}}"    data-bs-toggle="modal" data-bs-target="#edit_modal_publication" ><i class="material-icons">edit</i></a>
                                                   <form action="{{ url('publication-delete') }}" method="post">
                                                      @csrf
                                                      <input type="hidden" name="form_step_type" value="step4">
                                                      <input type="hidden" name="publication_dlt_id" value="{{$publication_record->id}}">
                                                      <button type="submit" class="btn delete btn-tbl-edit bg-danger d-flex justify-content-center delete" onclick="return confirm_option('delete')"><i class="material-icons">delete</i></button>
                                                   </form>
                                                </td>
                                             </tr>
                                             @endforeach
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <ul class="list-inline pull-right">
                              <li><button type="button" class="btn previous btn-danger prev-step2 mr-2">Previous</button></li>
                              <li><button type="button" class="btn next btn-info btn-info-full next-step3">Next</button></li>
                           </ul>
                        </div>
                        <div class="tab-pane @if(isset($form_step_type)) @if($form_step_type=='step5') active @endif @endif" role="tabpanel" id="step5">
                           <form action="{{ url('manage_profile_form_step5') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden"  name="form_step_type"  class="form-control capitalize" value="step5">
                              <input type="hidden"  name="user_id"  class="form-control capitalize" value="{{ Auth::user()->id }}">
                              <input type="hidden"  name="specific_id"  class="form-control capitalize" value="<?php echo get_specific_detail_id(Auth::user()->id); ?>">
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="school_name">Experience in ayurvedic clinical practice</label>
                                       <select name="exp_ayurvedic_clinical" class="form-control">
                                          <option value="">Select</option>
                                          <option value="1" @if(isset($specific_details_record->honourar_attachment_to_any_colg)) {{ $specific_details_record->honourar_attachment_to_any_colg=='1'?'selected':'' }} @endif>Yes</option>
                                          <option value="2" @if(isset($specific_details_record->honourar_attachment_to_any_colg))  {{ $specific_details_record->honourar_attachment_to_any_colg=='2'?'selected':'' }} @endif>No</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="school_name">Any teaching experience</label>
                                       <div class="d-flex justify-content-between show-form">
                                          <select name="any_teaching_exp" class="form-control" id="teaching_exp">
                                             <option value="">Select</option>
                                             <option value="1" @if(isset($specific_details_record->any_teaching_exp))  {{ $specific_details_record->any_teaching_exp=='1'?'selected':'' }} @endif>Yes</option>
                                             <option value="2" @if(isset($specific_details_record->any_teaching_exp))  {{ $specific_details_record->any_teaching_exp=='2'?'selected':'' }} @endif>No</option>
                                          </select>
                                          <input type="text"name="teaching_exp_input" id="teaching_exp_input" oninput="validateInput(this)" maxlength="5" class="@if(isset($specific_details_record->any_teaching_exp)) @if($specific_details_record->any_teaching_exp!=1) d-none @endif @endif" value="@if(isset($specific_details_record->teaching_exp_input)) {{ $specific_details_record->teaching_exp_input }}@endif">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="school_name">Area of specialization in practice</label>
                                       <select name="area_specialization" class="form-control">
                                          <option value="">Select</option>
                                          <option value="1" @if(isset($specific_details_record->area_specialization))  {{ $specific_details_record->area_specialization=='1'?'selected':'' }} @endif>Yes</option>
                                          <option value="2" @if(isset($specific_details_record->area_specialization)) {{ $specific_details_record->area_specialization=='2'?'selected':'' }} @endif>No</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-5">
                                    <div class="form-group">
                                       <label for="school_name">Honourary attachments to any college/hospital/ on regular/part time basis</label>
                                       <div class="d-flex justify-content-between show-form">
                                          <select name="honourar_attachment_to_any_colg" class="form-control" id="Honourary">
                                             <option value="">Select</option>
                                             <option value="1" @if(isset($specific_details_record->honourar_attachment_to_any_colg)) {{ $specific_details_record->honourar_attachment_to_any_colg=='1'?'selected':'' }} @endif>Yes</option>
                                             <option value="2" @if(isset($specific_details_record->honourar_attachment_to_any_colg)) {{ $specific_details_record->honourar_attachment_to_any_colg=='2'?'selected':'' }} @endif>No</option>
                                          </select>
                                          <input type="text"name="honourar_attackment" id="Honourary_input" oninput="validateInput(this)" maxlength="8" class="
                                          @if(isset($specific_details_record->honourar_attachment_to_any_colg)) @if($specific_details_record->honourar_attachment_to_any_colg!=1) d-none @endif @endif" value="@if(isset($specific_details_record->honourar_attackment)) {{ $specific_details_record->honourar_attackment }}@endif">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-7">
                                    <div class="form-group">
                                       <label>Any recognition/ award / honourary / position offered in recognition of your clinical expertise</label>
                                       <input type="textarea"name="any_recognition_award"  class="form-control" placeholder="Any recognition/ award / honourary / position offered in recognition of your clinical expertise" value="@if(isset($specific_details_record->any_recognition_award)){{ $specific_details_record->any_recognition_award }}@endif">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>Any other speciality that supports you / your empanelment listing</label>
                                       <input type="textarea"name="any_other_speciality" class="form-control" placeholder="Any other speciality that supports you / your empanelment listing (Under 100 to 150 words)" value="@if(isset($specific_details_record->any_other_speciality)){{ $specific_details_record->any_other_speciality}}@endif">
                                    </div>
                                 </div>
                              </div>
                              <ul class="list-inline pull-right">
                                 <li><button type="button" class="btn previous btn-danger prev-step3 mr-2">Previous</button></li>
                                 <li><button type="submit" class="btn submit next btn-info btn-info-full next-step4">Submit</button></li>
                              </ul>
                           </form>
                        </div>
                        <div class="clearfix">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Edit Popup Modal Start-->
<div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog  modal-dialog-centered modal-lg" role="document" >
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="{{ url('manage_profile_form_step2') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <input type="hidden"  name="education_id"  class="form-control capitalize" id="edit_educational_id">
               <input type="hidden"  name="form_step_type" value="step2"  class="form-control capitalize">
               <div class="row">
                  <div class="col-3">
                     <div class="form-group">
                        <label for="institute_name">Institute Name</label>
                        <input type="text" id="edit_institute_name" name="institute_name" placeholder="Institute Name">
                     </div>
                  </div>
                  <div class="col-3">
                     <div class="form-group">
                        <label for="institute_name">Name Of Board</label>
                        <input type="text" id="edit_name_of_board" name="name_of_board" placeholder="Name Of Board">
                     </div>
                  </div>
                  <div class="col-sm-12 col-md-3">
                     <div class="form-group">
                        <label>Course<span class="text-danger">*</span></label>
                        <select name="course_name" class="form-control" id="edit_course_name" required>
                           <option value="">Select Course</option>
                           @foreach(__('phr.education_course') as $key=>$value)
                           <option  value="{{$value}}">{{$value}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-3">
                     <div class="form-group">
                        <label for="year_passing">Year of Passing</label>
                        <input type="date" name="year_of_passing" id="edit_year_of_passing">
                     </div>
                  </div>
                  <div class="col-3">
                     <div class="form-group">
                        <label for="institute_name">Registration Number</label>
                        <input type="text" id="edit_regis_no" name="regis_no" placeholder="Name Of Board">
                     </div>
                  </div>
                  <div class="col-3">
                     <div class="form-group">
                        <label for="year_passing">Year Of Registration</label>
                        <input type="date" name="year_of_regis" id="edit_year_of_regis">
                     </div>
                  </div>
                  <div class="col-3">
                     <div class="form-group ">
                        <label >Upload Degree</label>
                        <input type="file" name="upload_degree" class="form-control"  accept="application/pdf">
                        <div style="width:120px;height:80px;" >
                           <a target="_blank" id="educational_document">Show Degree</a>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12 text-center">
                     <button type="submit" class="btn save bg-indigo waves-effect text-white" name="educational" value="educational-form">Save</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- Edit Popup Modal End-->
<!-- Edit Publications Modal Start-->
<div class="modal fade" id="edit_modal_publication" tabindex="-1" aria-labelledby="exampleModa" aria-hidden="true" role="dialog">
   <div class="modal-dialog  modal-dialog-centered modal-lg" role="document" >
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Publications Details</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="{{ url('manage_profile_form_step4') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <input type="hidden"  name="publication_id"  class="form-control capitalize" id="edit_publication_id">
               <input type="hidden"  name="form_step_type" value="step4"  class="form-control capitalize">
               <div class="row">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="school_name">No. of case reports</label>
                           <input type="text"name="no_of_case_reports" id="edit_no_of_case_reports"  placeholder="No. of case reports">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="school_name">Research Papers</label>
                           <input type="text"name="research_papers" id="edit_research_papers" placeholder="Research Papers">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="school_name">Books Published</label>
                           <input type="text"name="books_published" id="edit_books_published"  placeholder="Books Published">
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="form-group">
                           <label for="school_name">Number of Seminars / Conference / Workshops attended</label>
                           <input type="text"name="no_of_seminars" id="edit_no_of_seminars" placeholder="Number of Seminars / Conference / Workshops attended">
                        </div>
                     </div>
                     <div class="col-md-12 text-center">
                        <button type="submit" class="btn save bg-indigo waves-effect text-white" name="educational" value="educational-form">Save</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
</section>
@if ($message = Session::has('session_for_redirections'))
@php
Session::forget('session_for_redirections');
@endphp
@endif
<script>
    const fetchStatesUrl = "{{ url('api/fetch-states') }}";
    const fetchCitesUrl = "{{ url('api/fetch-cities') }}";
    const csrfToken = "{{ csrf_token() }}";
    const stateId = "{{@$profile_record[0]->state}}";
    const perState = "{{@$per_profile_record[0]->per_state}}";
    const cityId = "{{@$profile_record[0]->city}}";
    const perCities = "{{@$per_profile_record[0]->per_city}}";
    const clinicState = "{{@$clinic_record->state}}";
    const clinicCity = "{{@$clinic_record->city}}";
    const eduEditUrl= "{{url('/education/edit-company')}}";
    const publicationEditUrl = "{{url('/publication/edit-publication')}}";
</script>
<script src="{{ asset('assets/js/custom-script.js') }}"></script>
@endsection
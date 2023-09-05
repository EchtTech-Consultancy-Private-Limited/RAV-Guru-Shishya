@extends('layouts.app-file')
@section('content')

<style>
.card .body .col-sm-12{
  margin-bottom:0px;
  }
  .card .header{
    padding:0px 10px;
  }
</style>

<section class="content">

           <div class="container-fluid">
              <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                       <ul class="breadcrumb breadcrumb-style">
                          <li class="breadcrumb-item">
                             <h6 class="page-title"> @if(request()->path()=="profile") Manage Profile  @endif </h6>
                             <!-- <p style="color:#000;">{{ request()->path() }}</p>   -->
                          </li>
                          <li class="breadcrumb-item bcrumb-1">
                            <a href="{{url('/dashboard')}}">
                             <i class="fas fa-home"></i> Home</a>
                          </li>

                          <li class="breadcrumb-item active">  @if(request()->path()=="profile") Manage Profile  @endif   </li>
                       </ul>

                       @if ($message = Session::get('basic_info'))
                         <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p>{{ $message }}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                      @endif
                      @if ($message = Session::get('success'))
                         <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p>{{ $message }}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                      @endif

                      @if ($message = Session::get('danger'))
                         <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <p>{{ $message }}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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

                 <!-- Step buttons -->

                 <div class="steps clearfix mb-5">
                  <ul role="tablist">
                    <li role="tab" class="first disabled @if(isset($form_step_type)) @if($form_step_type=='step1' || $form_step_type=='withour-session-step') active @endif @endif" id="wizard_horizontal-t-1">
                      <a href="javacsript:void();">
                        <span class="number">1.</span> Basic Details
                      </a>
                    </li>
                    <li role="tab" class="disabled @if(isset($form_step_type)) @if($form_step_type=='step2') active @endif @endif" role="tabpanel" id="wizard_horizontal-t-2">
                      <a href="javacsript:void();">
                        <span class="number">2.</span> Educational Details</a>
                      </li>
                      <li role="tab" class="disabled @if(isset($form_step_type)) @if($form_step_type=='step3') active @endif @endif" id="wizard_horizontal-t-3">
                        <a href="javacsript:void();">
                          <span class="number">3.</span> Clinical Details</a>
                       </li>
                        <li role="tab" class="disabled @if(isset($form_step_type)) @if($form_step_type=='step4') active @endif @endif" id="wizard_horizontal-t-4">
                          <a href="javacsript:void();">
                            <span class="number">4.</span> Publications Details</a>
                        </li>

                        <li role="tab" class="disabled last @if(isset($form_step_type)) @if($form_step_type=='step5') active @endif @endif" id="wizard_horizontal-t-5">
                          <a href="javacsript:void();">
                            <span class="number">5.</span> Other Specific Details</a>
                        </li>
                      </ul>
                     </div>

                 <!-- Step buttons End-->


                    <div class="tab-pane @if(isset($form_step_type)) @if($form_step_type=='step1' || $form_step_type=='withour-session-step') active @endif @endif" role="tabpanel" id="step1">

                        <form action="{{ url('manage_profile_form') }}" method="POST" enctype="multipart/form-data">
                              	@csrf

				                     <input type="hidden"  name="form_step_type"  class="form-control capitalize" value="step1">

				                     <input type="hidden"  name="user_id"  class="form-control capitalize" value="{{ Auth::user()->id }}">

				                     <input type="hidden"  name="profile_id"  class="form-control capitalize" value="<?php echo get_profile_id(Auth::user()->id); ?>">
                          <div class="row">
                              <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label >Title<span class="text-danger">*</span></label>
                                    <select name="title" class="form-control" >
                                      <option>Select Title </option>
                                      @foreach(__('phr.titlename') as $key=>$value)
                                         <option @if( $key==$profile_record[0]->title) SELECTED @endif value="{{$key}}">{{$value}}</option>
                                      @endforeach
                                    </select>
                                </div>
                              </div>
                              <!-- student name -->
                              <div class="col-sm-12 col-md-4">
                                <!-- guru name -->
                                <div class="form-group">
                                    <label>First Name<span class="text-danger">*</span></label>
                                    <input onkeydown="return /[a-z]/i.test(event.key)" type="text"  name="firstname" class="form-control capitalize" id="firstname" value="@if(isset($profile_record[0])) {{ $profile_record[0]->firstname }} @else Auth::user()->firstname @endif" placeholder="First Name" >@error('firstname')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input onkeydown="return /[a-z]/i.test(event.key)" type="text" name="middlename" class="form-control capitalize" placeholder="Middle Name"  value="@if(isset($profile_record[0])) {{ $profile_record[0]->middlename }} @else Auth::user()->middlename @endif" >
                                </div>
                              </div>
                              <!-- student name -->
                              <div class="col-sm-12 col-md-4">
                                <!-- guru name -->
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input onkeydown="return /[a-z]/i.test(event.key)" type="text" name="lastname" class="form-control capitalize" placeholder="Last Name" value="@if(isset($profile_record[0]))  {{ $profile_record[0]->lastname }} @else Auth::user()->lastname @endif" >
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label >Email</label><span class="text-danger">*</span>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email"  value="@if(isset($profile_record[0])) {{ $profile_record[0]->email }} @else Auth::user()->email @endif" maxlength="50" readonly="readonly">
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label >Mobile No.<span class="text-danger">*</span></label>
                                    <input type="number" name="mobile_no" id="mobile_no" class="form-control" placeholder="Mobile No."  value="@if(isset($profile_record)){{$profile_record[0]->mobile_no}}@else @endif" >@error('mobile_no')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-4">

                                <div class="form-group">
                                    <label >Date of Birth<span class="text-danger">*</span></label>
                                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" placeholder="Date of Birth"  value="@if(isset($profile_record[0])){{ $profile_record[0]->date_of_birth }}@endif">@error('date_of_birth')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label>Age<span class="text-danger">*</span></label>
                                    <input type="text" name="age" id="age" class="form-control" placeholder="Enter your Age"  value="@if(isset($profile_record[0])){{ $profile_record[0]->age }}@endif">@error('age')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
                                </div>
                              </div>


                              <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label >Father's Name<span class="text-danger">*</span></label>
                                    <input onkeydown="return /[a-z]/i.test(event.key)" type="text" name="f_name" id="f_name" class="form-control" placeholder="Father's Name"  value="@if(isset($profile_record[0])){{ $profile_record[0]->f_name }}@endif">@error('f_name')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
                                </div>
                              </div>

                               <div class="header col-md-12 pt-0">
                                <h2>Present Address </h2>
                               </div>

                              <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label >Address Line 1<span class="text-danger">*</span></label>
                                    <input type="textarea" name="address1" id="address1" class="form-control" placeholder="Address Line 1" value="@if(isset($profile_record[0])){{$profile_record[0]->address1}}@endif">@error('address1')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label >Address Line 2<span class="text-danger">*</span></label>
                                    <input type="textarea" name="address2" id="address2" class="form-control" placeholder="Address Line 2" value="@if(isset($profile_record[0])){{ $profile_record[0]->address2 }}@endif">@error('address2')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-3">
                                <div class="form-group">
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
                                    </select>@error('country')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label>State <span class="text-danger">*</span></label>
                                    <select id="state-dropdown" class="form-control state select2" name="state">
                                       @if(isset($profile_record[0]))
                                         <option value="{{$profile_record[0]->state}}">{{ $profile_record[0]->state_name }}</option>
                                         @endif
                                      </select>@error('state-dropdown')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label>City <span class="text-danger">*</span></label>
                                    <select id="city-dropdown" class="form-control select2" name="city" >
                                      <option value="{{$profile_record[0]->city}}">{{ $profile_record[0]->city_name }}</option>
                                     </select>@error('city-dropdown')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label >Pincode<span class="text-danger">*</span></label>
                                    <input type="number" name="pincode" id="Pincode" class="form-control" placeholder="Pincode"  value="{{ $profile_record[0]->pincode }}">@error('Pincode')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
                                </div>
                              </div>

                             <div class="col-sm-12 col-md-12 mb-3">
                              <div class="form-check m-l-5 pb-2">
                                  <label class="form-check-label">
                                      <input class="form-check-input" type="checkbox" id="same_as_present" value=""> Same as Present Address
                                      <span class="form-check-sign">
                                          <span class="check"></span>
                                      </span>
                                  </label>
                              </div>
                            </div>

                              <div class="header col-md-12 pt-0">
                                <h2>Permanent Address </h2>
                               </div>

                              <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label >Address Line 1<span class="text-danger">*</span></label>
                                    <input type="textarea" name="per_address1" id="per_address_Line1" class="form-control" placeholder="Permanent Address Line 1"  value="{{ $profile_record[0]->per_address1 }}">@error('per_address_Line1')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label >Address Line 2<span class="text-danger">*</span></label>
                                    <input type="textarea" name="per_address2" id="per_address_Line2" class="form-control" placeholder="Permanent Address Line 2"  value="{{ $profile_record[0]->per_address2 }}">@error('per_address_Line2')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                  <label>Country <span class="text-danger">*</span></label>
                                     <select name="per_country" class="form-control select2" id="per-country-dropdown">
                                      <option value="">Select Country</option>
                                      @foreach ($countries as $data)
                                         <option value="{{ $data->id}}" @if(isset($per_profile_record[0])){{$data->id == $per_profile_record[0]->per_country  ? 'selected' : ''}} @endif>
                                              {{$data->name}}
                                          </option>

                                          @endforeach
                                    </select>@error('per_country')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label>State <span class="text-danger">*</span></label>
                                    <select id="per-state-dropdown" class="form-control state select2" name="per_state" >
                                        @if(isset($per_profile_record[0]))

                                         <option value=" {{$per_profile_record[0]->per_state}}">{{ $per_profile_record[0]->per_state_name }}</option>
                                        @else
                                        @endif
                                      </select>@error('per-state-dropdown')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label>City <span class="text-danger">*</span></label>
                                    <select id="per-city-dropdown" class="form-control select2" name="per_city">
                                      @if(isset($per_profile_record[0]))
                                      <option value="{{$per_profile_record[0]->city}}">{{ $per_profile_record[0]->per_city_name }}</option>
                                      @else
                                        @endif
                                     </select>@error('per-city-dropdown')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label >Pincode<span class="text-danger">*</span></label>
                                    <input type="number" name="per_pincode" id="per_pincode" class="form-control" placeholder="Pincode"  value="{{ $profile_record[0]->per_pincode }}">@error('per_pincode')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
                                </div>
                              </div>


                              <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label >Aadhar Number<span class="text-danger">*</span></label>
                                    <input type="text" name="aadhaar_no" id="aadhaar_no" class="form-control" placeholder="Last 4 digits only"  value="{{ $profile_record[0]->aadhaar_no }}">@error('aadhaar_no')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-6">

                                <div class="form-group">
                                    <label >Pan Number<span class="text-danger">*</span></label>
                                    <input type="text" name="pan_no" id="Pancard" class="form-control" placeholder="Last 4 digits only"  value="{{ $profile_record[0]->pan_no }}">@error('pan_no')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
                                </div>
                              </div>



                                                          <!-- Languages -->

                             <div class="col-md-12">

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

                                <div class="col-sm-12 col-md-3">
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

                                <div class="col-sm-12 col-md-3 mb-3">
                                  <!-- <input type="checkbox" name="speaking[]" @if($speaking==1) checked @endif/> -->
                                   <div class="form-group d-flex justify-content-between">
                                   <select name="speaking[]" class="form-control">
                                      <option value="">Select</option>
                                      <option value="1" {{$language_records->speaking == 1 ?'selected':''}}>Yes</option>
                                      <option value="0" {{$language_records->speaking == 0 ?'selected':''}}>No</option>
                                    </select>
                                   <a href="{{ url('language-delete/'.$language_records->id) }}" class="btn btn-tbl-edit bg-danger" onclick="return confirm_option('delete')"><i class="material-icons">delete</i></a>
                                 </div>

                              </div>


                               @endforeach

                               @endif


                               </div>
                                <div class="add-btn-lang mb-3 mt-3">
                                   <a href="javascript:void();" class="btn lang bg-purple" id="Add_language">
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
                                    <label >E-Signature<span class="text-danger">*</span></label>
                                    <input type="file" name="e_sign" id="e_sign" class="form-control" >
@error('e_sign')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
                                     @if($profile_record[0]->e_sign)
                                     <img src="{{ asset('uploads/'.$profile_record[0]->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                     @endif



                                </div>
                              </div>
                              <div class="col-sm-12 col-md-6">
                                <div class="form-group ">
                                    <label >Profile Picture<span class="text-danger"></span></label>
                                    <input type="file" name="profile_image" id="profile_image" class="form-control" >@error('profile_image')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
                                    @if($profile_record[0]->user_image)
                                     <img src="{{ asset('uploads/'.$profile_record[0]->user_image) }}" alt="Profile-Image" width="100px;" height="80px;">
                                     @else
                                     <img src="{{ asset('assets/images/user.png') }}" alt="Profile-Image" width="100px;" height="80px;">
                                     @endif
                                </div>
                              </div>
                          </div>
                          <ul class="list-inline pull-right">
                              <li>
                                <button type="submit" class="btn bg-indigo">Submit</button>
                                <button type="button" class="btn btn-info next-step">Next</button>
                              </li>
                          </ul>
                        </form>
                    </div>


                    <div class="tab-pane @if(isset($form_step_type)) @if($form_step_type=='step2') active @endif @endif" role="tabpanel" id="step2">


                         <form action="{{ url('manage_profile_form') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                             <input type="hidden"  name="form_step_type"  class="form-control capitalize" value="step2">

                             <input type="hidden"  name="user_id"  class="form-control capitalize" value="{{ Auth::user()->id }}">

                             <input type="hidden"  name="profile_id"  class="form-control capitalize" value="<?php echo get_profile_id_step2(Auth::user()->id); ?>">


                          <div class="row">
                              <div class="col-3">
                                  <div class="form-group">
                                    <label for="institute_name">Institute Name</label>
                                    <input type="text" id="institute_name" name="institute_name" placeholder="Institute Name" maxlength="200">
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

                            <div class="col-3">
                              <div class="form-group">
                                <label for="year_passing">Year of Passing</label>
                                <input type="date" id="year_of_passing" name="year_of_passing">
                              </div>
                            </div>

                            <div class="col-3">
                              <div class="form-group ">
                                 <label >Upload Degree</label>
                                   <input type="file" name="upload_degree" class="form-control" accept="application/pdf">

                              </div>
                           </div>

                            <div class="col-md-12 text-center">
                            <button type="submit" class="btn bg-indigo waves-effect" name="educational" value="educational-form">Save</button>
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
                                                    <th>Course</th>
                                                    <th>Year of Passing</th>
                                                    <th>Show Degree</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($educational_record as $key=>$educational_records)
                                                <tr>
                                                    <th scope="row">{{++$key}}</th>
                                                    <td>{{ $educational_records->institute_name }}</td>
                                                    <td>{{ $educational_records->course_name }} </td>
                                                    <td>{{ $educational_records->year_of_passing }}</td>

                                                    <td class="text-center">
                                                         @if($educational_records->upload_degree)
                                                            <!--  <img src="{{ asset('uploads/'.$educational_records->upload_degree) }}" alt="E-Sign" width="100px;" height="80px;"> -->
                                                      <a target="_blank" href="{{ asset('uploads/'.$educational_records->upload_degree) }}" class="btn btn-tbl-edit" title="View Record">
                                                      <i class="material-icons">visibility</i>
                                                           </a>


                                                         @endif
                                                    </td>
                                                    <td class="d-flex justify-content-center">
                                                       <a class="btn btn-tbl-edit bg-primary update_education"  data-id="{{$educational_records->id}}"    data-bs-toggle="modal" data-bs-target="#edit_modal" ><i class="material-icons">edit</i></a>


                                                         <form action="{{ url('education-delete') }}" method="post">
                                                          @csrf
                                                          <input type="hidden" name="form_step_type" value="step2">
                                                          <input type="hidden" name="education_dlt_id" value="{{$educational_records->id}}">



                                                          <button type="submit" class="btn btn-tbl-edit bg-danger" onclick="return confirm_option('delete')"><i class="material-icons">delete</i></button>
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

                          <ul class="list-inline pull-right mt-5">
                              <li><button type="button" class="btn btn-danger prev-step mr-2">Previous</button></li>
                              <li><button type="button" class="btn btn-info next-step1">Next</button></li>
                          </ul>

                    </div>


                    <div class="tab-pane @if(isset($form_step_type)) @if($form_step_type=='step3') active @endif @endif" role="tabpanel" id="step3">

                         <form action="{{ url('manage_profile_form_step3') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                             <input type="hidden"  name="form_step_type"  class="form-control capitalize" value="step4">

                             <input type="hidden"  name="user_id"  class="form-control capitalize" value="{{ Auth::user()->id }}">

                              <input type="hidden"  name="clinical_id"  class="form-control capitalize" value="<?php echo get_clinical_id(Auth::user()->id); ?>">

                        <div class="row">
                            <div class="col-4">
                            <div class="form-group">
                              <label for="NOB">Name of Board</label>
                              <input type="text" id="NOB" placeholder="Name of Board" class="form-control" name="name_of_board" value="@if(isset($clinic->name_of_board)){{ $clinic->name_of_board }}@endif">
                            </div>
                            </div>
                            <div class="col-4">
                              <div class="form-group">
                                <label for="Registration_Number">Registration Number</label>
                                <input type="text" id="Registration_Number" placeholder="Registration Number" class="form-control" name="regis_no" value="@if(isset($clinic->regis_no)){{ $clinic->regis_no }}@endif">
                              </div>
                            </div>

                            <div class="col-4">
                              <div class="form-group">
                                <label for="Registration_year">Year of Registration</label>
                                <input type="date" id="Registration_year" placeholder="Year of Registration" class="form-control" name="year_of_regis" value="@if(isset($clinic->year_of_regis)){{ $clinic->year_of_regis }}@endif">
                              </div>
                            </div>



                            <div class="col-sm-12 col-md-12 mb-3">
                              <div class="form-group d-flex">
                              <input type="checkbox"  name="any_done_services" id="any_done_services" class="checkbox"  value="0" @if(isset($clinic->any_done_services)) @if($clinic->any_done_services==1) checked @endif @endif>
                                <label for="central"> Any service done under Central/State government</label>
                              </div>
                            </div>


                            <div class="col-4">
                              <div class="form-group">
                                <label for="Name_Clinic">Name of Clinic</label>
                                <input type="text" id="Name_Clinic" placeholder="Name of Clinic" class="form-control" name="name_of_clinic" value="@if(isset($clinic)){{ $clinic->name_of_clinic }}@endif">
                              </div>
                            </div>

                            <div class="col-4">
                              <div class="form-group mt-1">
                                <label for="Registration_year">Working days </label>
                                <div class="form-group default-select select2Style">
                                        <select class="form-control select2 width" multiple="" data-placeholder="Select" name="working_days[]">
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
                            </div>

                            <div class="header col-md-12 pt-0">
                                <h2>Clinic Timings </h2>
                            </div>

                            <div class="col-4">
                              <div class="form-group mt-1">
                                <label for="Registration_year">Morning Shifts Timings</label>
                                <div class="form-group default-select select2Style">
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
                            </div>

                            <div class="col-4">
                              <div class="form-group mt-1">
                                <label for="Registration_year">Evening Shifts Timings</label>
                                <div class="form-group default-select select2Style">
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
                            </div>

                            <div class="col-sm-12 col-md-4">
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

                              <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label >Address Line 1<span class="text-danger">*</span></label>
                                    <input type="textarea" name="address1" id="address1" class="form-control" placeholder="Address Line 1"  value="@if(isset($clinic->address1)){{$clinic->address1}}@endif" required>
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label >Address Line 2<span class="text-danger">*</span></label>
                                    <input type="textarea" name="address2" id="address2" class="form-control" placeholder="Address Line 2"  value="@if(isset($clinic->address2)){{$clinic->address2}}@endif" required>
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-3">
                                <div class="form-group ">
                                    <label >Country <span class="text-danger">*</span></label>
                                    <select name="country" class="form-control " id="country-dropdown-clinical" required>
                                      <option value="">Select Country</option>
                                      @foreach ($countries as $data)
                                        <option value="{{$data->id}}" @if(isset($clinic_record->country)) {{$data->id == $clinic_record->country  ? 'selected' : ''}} @endif>
                                            {{$data->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                              </div>




                              <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label>State <span class="text-danger">*</span></label>
                                    <select id="state-dropdown-clinical" class="form-control  state " name="state"  required>

                                         <option  @if(isset($clinic_record->state)) value="{{$clinic_record->state}}" @endif>@if(isset($clinic_record->state_name)){{ $clinic_record->state_name }} @endif</option>

                                      </select>
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label>City<span class="text-danger">*</span></label>
                                    <select id="city-dropdown-clinical" class="form-control state " name="city"  required>

                                         <option value="@if(isset($clinic_record->city)) {{$clinic_record->city}} @endif">@if(isset($clinic_record->city)){{ $clinic_record->city_name }}@endif</option>

                                      </select>
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label >Pincode<span class="text-danger">*</span></label>
                                    <input type="text" name="pincode" id="Pincode" class="form-control" placeholder="Pincode"  value="@if(isset($clinic->pincode)) {{ $clinic->pincode }} @endif" required>
                                </div>
                              </div>


                              <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label>Average number of patients seen daily in OPD<span class="text-danger">*</span></label>
                                    <input type="text" name="average_no_of_patients_in_opd" class="form-control" placeholder="Average number"  value="@if(isset($clinic->average_no_of_patients_in_opd)) {{ $clinic->average_no_of_patients_in_opd }} @endif" required>
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label>Average number of occupancy ratio (Annually)</label>
                                    <input type="text" name="average_no_of_occupancy_annually" class="form-control" placeholder="Average number"  value="@if(isset($clinic->average_no_of_occupancy_annually)) {{ $clinic->average_no_of_occupancy_annually }} @endif">
                                </div>
                              </div>



                              <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                  <label >Weather maintaining any IPD. If yes, number of beds </label>

                                   <div class="d-flex justify-content-between show-form">
                                      <select name="weather_maintaining" class="form-control" id="mySelect">
                                        <option value="">Select</option>
                                           <option value="1" @if(isset($clinic->weather_maintaining)){{ $clinic->weather_maintaining=='1'?'selected':'' }} @endif>Yes</option>



                                        <option value="2"  @if(isset($clinic->weather_maintaining)) {{ $clinic->weather_maintaining=='2'?'selected':'' }} @endif>No</option>
                                      </select>
                                    <input type="text" name="weather_maintaining_no_of_beds" id="number_beds" class="form-control ml-2  @if(isset($specific_details_record->weather_maintaining)) @if($specific_details_record->weather_maintaining!=1) d-none @endif @endif" placeholder="Number of Beds"  value="@if(isset($clinic->weather_maintaining_no_of_beds)) {{ $clinic->weather_maintaining_no_of_beds }} @endif">




                                    </div>
                                  </div>
                              </div>

                              <div class="header col-md-12 pt-0">
                                <h2>Other units available in the clinic </h2>
                              </div>


                              <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label>Medicine Manufacturing Section</label>
                                    <select name="medicine_manufacturing_section" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1" @if(isset($clinic->medicine_manufacturing_section)) {{ $clinic->medicine_manufacturing_section=='1'?'selected':'' }} @endif>Yes</option>
                                        <option value="2" @if(isset($clinic->medicine_manufacturing_section)) {{ $clinic->medicine_manufacturing_section=='2'?'selected':'' }} @endif>No</option>
                                      </select>
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label>Panchakarma</label>
                                    <select name="panchakarma" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1" @if(isset($clinic->panchakarma)) {{ $clinic->panchakarma=='1'?'selected':'' }} @endif>Yes</option>
                                        <option value="2" @if(isset($clinic->panchakarma)) {{ $clinic->panchakarma=='2'?'selected':'' }} @endif>No</option>
                                      </select>
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label>Ksharsutra</label>
                                    <select name="ksharsutra" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1" @if(isset($clinic->ksharsutra)) {{ $clinic->ksharsutra=='1'?'selected':'' }} @endif>Yes</option>
                                        <option value="2" @if(isset($clinic->ksharsutra)) {{ $clinic->ksharsutra=='2'?'selected':'' }} @endif>No</option>
                                      </select>
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Any other</label>
                                    <input type="textarea" name="any_other" class="form-control" placeholder="Any other"  value="@if(isset($clinic->any_other)) {{ $clinic->any_other }} @endif" maxlength="200">
                                </div>
                              </div>


                              <div class="header col-md-12 pt-0">
                                <h2>Infrastructural details of the clinic/hospital</h2>
                              </div>

                              <div class="col-sm-12 col-md-4  ">
                                <div class="form-group">
                                    <label>Total Area</label>
                                    <input type="text" name="total_area" class="form-control" placeholder="Total Area"  value="@if(isset($clinic->total_area)) {{ $clinic->total_area }} @endif">
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label>Number of rooms</label>
                                    <input type="number" name="no_of_rooms" id="no_of_rooms" class="form-control" placeholder="Number of rooms"  value="@if(isset($clinic->no_of_rooms)) {{ $clinic->no_of_rooms }} @endif">
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label>Number of wards and beds</label>
                                    <input type="text" name="no_of_wards_beds" class="form-control" placeholder="Number of wards and beds"  value="@if(isset($clinic->no_of_wards_beds)) {{ $clinic->no_of_wards_beds }} @endif">
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Facilities available</label>
                                    <input type="text" name="facilities_available" class="form-control" placeholder="Facilities available"  value="@if(isset($clinic->facilities_available)) {{ $clinic->facilities_available }} @endif">
                                </div>
                              </div>


                         </div>
                        <ul class="list-inline pull-right"><li><button type="button" class="btn btn-danger prev-step1 mr-2">Previous</button></li><li><button type="submit" class="btn btn-info btn-info-full">Next</button></li>
                          </ul>
                        </form>
                    </div>

                    <div class="tab-pane @if(isset($form_step_type)) @if($form_step_type=='step4') active @endif @endif" role="tabpanel" id="step4">

                    <form action="{{ url('manage_profile_form_step4') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                             <input type="hidden"  name="form_step_type"  class="form-control capitalize" value="step4">

                             <input type="hidden"  name="user_id"  class="form-control capitalize" value="{{ Auth::user()->id }}">

                         <div class="row">
                             <div class="col-4">
                                 <div class="form-group">
                                   <label for="school_name">No. of case reports</label>
                                   <input type="number"name="no_of_case_reports"  placeholder="No. of case reports" maxlength="200">
                                 </div>
                             </div>

                             <div class="col-4">
                                 <div class="form-group">
                                   <label for="school_name">Research Papers</label>
                                   <input type="number"name="research_papers" placeholder="Research Papers" maxlength="200">
                                 </div>
                             </div>

                             <div class="col-4">
                                 <div class="form-group">
                                   <label for="school_name">Books Published</label>
                                   <input type="number"name="books_published"  placeholder="Books Published" maxlength="200">
                                 </div>
                             </div>

                             <div class="col-12">
                                 <div class="form-group">
                                   <label for="school_name">Number of Seminars / Conference / Workshops attended</label>
                                   <input type="number"name="no_of_seminars" placeholder="Number of Seminars / Conference / Workshops attended" maxlength="200">
                                 </div>
                             </div>


                           <div class="col-md-12 text-center mb-3">
                           <button type="submit" class="btn bg-indigo waves-effect">Save</button>
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
                                                    <th scope="row">{{++$key}}</th>
                                                    <td>{{ $publication_record->no_of_case_reports }}</td>
                                                    <td>{{ $publication_record->research_papers }} </td>
                                                    <td>{{ $publication_record->books_published }}</td>
                                                    <td>{{ $publication_record->no_of_seminars }}</td>


                                                    <td class="d-flex justify-content-center">

                                  <a class="btn btn-tbl-edit bg-primary update_publication"  data-id="{{$publication_record->id}}"    data-bs-toggle="modal" data-bs-target="#edit_modal_publication" ><i class="material-icons">edit</i></a>


                                                         <form action="{{ url('publication-delete') }}" method="post">
                                                          @csrf
                                                          <input type="hidden" name="form_step_type" value="step4">
                                                          <input type="hidden" name="publication_dlt_id" value="{{$publication_record->id}}">



                                                          <button type="submit" class="btn btn-tbl-edit bg-danger" onclick="return confirm_option('delete')"><i class="material-icons">delete</i></button>
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
                              <li><button type="button" class="btn btn-danger prev-step2 mr-2">Previous</button></li>
                              <li><button type="button" class="btn btn-info btn-info-full next-step3">Next</button></li>
                       </ul>

                    </div>

                    <div class="tab-pane @if(isset($form_step_type)) @if($form_step_type=='step5') active @endif @endif" role="tabpanel" id="step5">

                        <form action="{{ url('manage_profile_form_step5') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                             <input type="hidden"  name="form_step_type"  class="form-control capitalize" value="step5">

                             <input type="hidden"  name="user_id"  class="form-control capitalize" value="{{ Auth::user()->id }}">

                              <input type="hidden"  name="specific_id"  class="form-control capitalize" value="<?php echo get_specific_detail_id(Auth::user()->id); ?>">
                        <div class="row">
                             <div class="col-4">
                                 <div class="form-group">
                                   <label for="school_name">Experience in ayurvedic clinical practice</label>
                                   <select name="exp_ayurvedic_clinical" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1" @if(isset($specific_details_record->honourar_attachment_to_any_colg)) {{ $specific_details_record->honourar_attachment_to_any_colg=='1'?'selected':'' }} @endif>Yes</option>
                                        <option value="2" @if(isset($specific_details_record->honourar_attachment_to_any_colg))  {{ $specific_details_record->honourar_attachment_to_any_colg=='2'?'selected':'' }} @endif>No</option>
                                      </select>
                                 </div>
                             </div>

                             <div class="col-4">
                                 <div class="form-group">
                                   <label for="school_name">Any teaching experience</label>

                                   <div class="d-flex justify-content-between show-form">
                                      <select name="any_teaching_exp" class="form-control" id="teaching_exp">
                                        <option value="">Select</option>
                                        <option value="1" @if(isset($specific_details_record->any_teaching_exp))  {{ $specific_details_record->any_teaching_exp=='1'?'selected':'' }} @endif>Yes</option>
                                        <option value="2" @if(isset($specific_details_record->any_teaching_exp))  {{ $specific_details_record->any_teaching_exp=='2'?'selected':'' }} @endif>No</option>
                                      </select>

 <input type="text"name="teaching_exp_input" id="teaching_exp_input" class="@if(isset($specific_details_record->any_teaching_exp)) @if($specific_details_record->any_teaching_exp!=1) d-none @endif @endif" value="@if(isset($specific_details_record->teaching_exp_input)) {{ $specific_details_record->teaching_exp_input }}@endif">
                                   </div>
                                 </div>

                             </div>

                             <div class="col-4">
                                 <div class="form-group">
                                   <label for="school_name">Area of specialization in practice</label>
                                   <select name="area_specialization" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1" @if(isset($specific_details_record->area_specialization))  {{ $specific_details_record->area_specialization=='1'?'selected':'' }} @endif>Yes</option>
                                        <option value="2" @if(isset($specific_details_record->area_specialization)) {{ $specific_details_record->area_specialization=='2'?'selected':'' }} @endif>No</option>
                                      </select>
                                 </div>
                             </div>


                             <div class="col-5">
                                 <div class="form-group">
                                   <label for="school_name">Honourary attachments to any college/hospital/ on regular/part time basis</label>

                                   <div class="d-flex justify-content-between show-form">
                                      <select name="honourar_attachment_to_any_colg" class="form-control" id="Honourary">
                                        <option value="">Select</option>
                                        <option value="1" @if(isset($specific_details_record->honourar_attachment_to_any_colg)) {{ $specific_details_record->honourar_attachment_to_any_colg=='1'?'selected':'' }} @endif>Yes</option>
                                        <option value="2" @if(isset($specific_details_record->honourar_attachment_to_any_colg)) {{ $specific_details_record->honourar_attachment_to_any_colg=='2'?'selected':'' }} @endif>No</option>
                                      </select>


                                          <input type="text"name="honourar_attackment" id="Honourary_input" class="
                                          @if(isset($specific_details_record->honourar_attachment_to_any_colg)) @if($specific_details_record->honourar_attachment_to_any_colg!=1) d-none @endif @endif" value="@if(isset($specific_details_record->honourar_attackment)) {{ $specific_details_record->honourar_attackment }}@endif">
                                   </div>
                                 </div>

                             </div>



                             <div class="col-7">
                                 <div class="form-group">
                                   <label>Any recognition/ award / honourary / position offered in recognition of your clinical expertise</label>
                                   <input type="textarea"name="any_recognition_award"  class="form-control" placeholder="Any recognition/ award / honourary / position offered in recognition of your clinical expertise" value="@if(isset($specific_details_record->any_recognition_award)){{ $specific_details_record->any_recognition_award }}@endif">
                                 </div>
                             </div>

                             <div class="col-12">
                                 <div class="form-group">
                                   <label>Any other speciality that supports you / your empanelment listing</label>
                                   <input type="textarea"name="any_other_speciality" class="form-control" placeholder="Any other speciality that supports you / your empanelment listing (Under 100 to 150 words)" value="@if(isset($specific_details_record->any_other_speciality)){{ $specific_details_record->any_other_speciality}}@endif">
                                 </div>
                             </div>




                        </div>
                          <ul class="list-inline pull-right">
                              <li><button type="button" class="btn btn-danger prev-step3 mr-2">Previous</button></li>
                              <li><button type="submit" class="btn btn-info btn-info-full next-step4">Submit</button></li>
                          </ul>
                        </form>
                    </div>


                    <div class="clearfix"></div>
                  </div>
                  </form>
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


                          <form action="{{ url('manage_profile_form') }}" method="POST" enctype="multipart/form-data">
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

                              <div class="col-sm-12 col-md-3">
                                 <div class="form-group">
                                    <label>Course<span class="text-danger">*</span></label>
                                    <select name="course_name" class="form-control" id="edit_course_name">
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
                              <div class="form-group ">
                                 <label >Upload Degree</label>
                                  <input type="file" name="upload_degree" class="form-control"  accept="application/pdf">

                                    <div style="width:120px;height:80px;" >
                                        <!-- <img id="upload_degree" > -->

                                        <a target="_blank" id="educational_document">Show Degree</a>


                                   </div>
                              </div>
                           </div>

                            <div class="col-md-12 text-center">
                            <button type="submit" class="btn bg-indigo waves-effect text-white" name="educational" value="educational-form">Save</button>
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
                             <div class="col-4">
                                 <div class="form-group">
                                   <label for="school_name">No. of case reports</label>
                                   <input type="text"name="no_of_case_reports" id="edit_no_of_case_reports"  placeholder="No. of case reports">
                                 </div>
                             </div>

                             <div class="col-4">
                                 <div class="form-group">
                                   <label for="school_name">Research Papers</label>
                                   <input type="text"name="research_papers" id="edit_research_papers" placeholder="Research Papers">
                                 </div>
                             </div>

                             <div class="col-4">
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
                            <button type="submit" class="btn bg-indigo waves-effect text-white" name="educational" value="educational-form">Save</button>
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

<!-- step Tabs js -->
     <script>
         $(document).ready(function() {

             $(".next-step").click(function() {
                 $("#step1").removeClass("active");
                 $("#step2").addClass("active");
                 $("#wizard_horizontal-t-2").addClass("active");
                 $("#wizard_horizontal-t-1").addClass("done");
                 $("#wizard_horizontal-t-1").removeClass("active");

             });

             $(".prev-step").click(function() {
                 $("#step2").removeClass("active");
                 $("#step1").addClass("active");
                 $("#wizard_horizontal-t-1").addClass("active");
                 $("#wizard_horizontal-t-2").addClass("done");
                 $("#wizard_horizontal-t-2").removeClass("active");
             });

             $(".next-step1").click(function() {
                 $("#step2").removeClass("active");
                 $("#step3").addClass("active");
                 $("#wizard_horizontal-t-3").addClass("active");
                 $("#wizard_horizontal-t-2").addClass("done");
                 $("#wizard_horizontal-t-2").removeClass("active");

             });

             $(".prev-step1").click(function() {
                 $("#step3").removeClass("active");
                 $("#step2").addClass("active");
                 $("#wizard_horizontal-t-2").addClass("active");
                 $("#wizard_horizontal-t-3").addClass("done");
                 $("#wizard_horizontal-t-3").removeClass("active");
             });

             $(".next-step2").click(function() {
                 $("#step3").removeClass("active");
                 $("#step4").addClass("active");
                 $("#wizard_horizontal-t-4").addClass("active");
                 $("#wizard_horizontal-t-3").addClass("done");
                 $("#wizard_horizontal-t-3").removeClass("active");
             });

             $(".prev-step2").click(function() {
                 $("#step4").removeClass("active");
                 $("#step3").addClass("active");
                 $("#wizard_horizontal-t-3").addClass("active");
                 $("#wizard_horizontal-t-4").addClass("done");
                 $("#wizard_horizontal-t-4").removeClass("active");
             });

             $(".next-step3").click(function() {
                 $("#step4").removeClass("active");
                 $("#step5").addClass("active");

                 $("#wizard_horizontal-t-5").addClass("active");
                 $("#wizard_horizontal-t-4").addClass("done");
                 $("#wizard_horizontal-t-4").removeClass("active");
             });

             $(".prev-step3").click(function() {
                 $("#step5").removeClass("active");
                 $("#step4").addClass("active");
                 $("#wizard_horizontal-t-4").addClass("active");
                 $("#wizard_horizontal-t-5").addClass("done");
                 $("#wizard_horizontal-t-5").removeClass("active");
             });
         });
     </script>



<script type="text/javascript">
    $('#mySelect').change(function(){
    if (this.value=='1')
    {
    // $("#number_beds").style.visibility='visible'

    $("#number_beds").removeClass('d-none');
    }
    else {
      $("#number_beds").addClass('d-none');
    }
  });

  // Language Add Button code

$(document).ready(function(){

  $("#Add_language").click(function(e){
    e.preventDefault();
    $("#language_body").append('<div class="row delete-div"><div class="col-sm-12 col-md-3"><div class="form-group"><input type="hidden" class="form-control" placeholder="Add Language" name="lang_id[]" value="0"><input type="text" class="form-control" placeholder="Add Language" name="lang_name[]"></div></div><div class="col-sm-12 col-md-3 mb-3"><div class="form-group"><select name="reading[]" class="form-control"><option value="">Select</option><option value="1">Yes</option><option value="0">No</option></select></div></div><div class="col-sm-12 col-md-3 mb-3"><div class="form-group"><select name="writing[]" class="form-control"><option value="">Select</option><option value="1">Yes</option><option value="0">No</option></select></div></div><div class="col-sm-12 col-md-3 mb-3"><div class="form-group"><select name="speaking[]" class="form-control"><option value="">Select</option><option value="1">Yes</option><option value="0">No</option></select></div></div></div>');

  $("#delete_language").removeClass('d-none');
  });

  $("#delete_language").click(function(e){
    e.preventDefault();
    $(".delete-div").last('.delete-div').remove();
  });


});

// Teaching Input

    $('#teaching_exp').change(function(){
    if (this.value=='1')
    {

    $("#teaching_exp_input").removeClass('d-none');
    }
    else {
      $("#teaching_exp_input").addClass('d-none');
    }
  });

  // Honourary Input

    $('#Honourary').change(function(){
    if (this.value=='1')
    {

    $("#Honourary_input").removeClass('d-none');
    }
    else {
      $("#Honourary_input").addClass('d-none');
    }
  });

</script>

    <script>

        $(document).ready(function () {

            var idCountry = $('#country-dropdown').val();

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
                                .id + '" '+(value.id=={{$profile_record[0]->state}}?"SELECTED":"")+'>' + value.name + '</option>');
                        });
                        //$('#city-dropdown').html('<option value="">-- Select City --</option>');
                    }
                });



            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#country-dropdown').on('change', function () {
                var idCountry = this.value;
                $("#state-dropdown").html('');
                $("#city-dropdown").html('');
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
                        //$('#city-dropdown').html('<option value="">-- Select City --</option>');
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

    <script>
        /* City dropdown */
                var idState = $('#state-dropdown').val();
                //alert(idState);
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
                            //console.log(value);
                            $("#city-dropdown").append('<option value="' + value
                                .id + '" '+(value.id=={{$profile_record[0]->city}}?"SELECTED":"")+'>' + value.name + '</option>');
                        });
                    }
                });
    </script>
                    <script>
    $(document).ready(function() {
        $('#same_as_present').change(function() {
            if ($(this).is(':checked')) {
                $('#per_address_Line1').val($('#address1').val());
                $('#per_address_Line2').val($('#address2').val());
                $('#per-country-dropdown').val($('#country-dropdown').val());
                $('#per-state-dropdown').val($('#state-dropdown').val());
                $('#per-city-dropdown').val($('#city-dropdown').val());
                $('#per_pincode').val($('#Pincode').val());
            } else {
                $('#per_address_Line1').val('');
                $('#per_address_Line2').val('');
                $('#per-country-dropdown').val('');
                $('#per-state-dropdown').val('');
                $('#per-city-dropdown').val('');
                $('#per_pincode').val('');
            }
        });
    });
</script>

    <!-- Permanent address country state city -->
     @if(isset($per_profile_record[0]))
    <script>

        $(document).ready(function () {

            var idCountry = $('#per-country-dropdown').val();

                $("#per-state-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#per-state-dropdown').html('<option value="">-- Select State --</option>');
                        $.each(result.states, function (key, value) {
                            $("#per-state-dropdown").append('<option value="' + value
                                .id + '" '+(value.id=={{$per_profile_record[0]->per_state}}?"SELECTED":"")+'>' + value.name + '</option>');
                        });
                        //$('#city-dropdown').html('<option value="">-- Select City --</option>');
                    }
                });

        </script>
        @endif
        <script>

            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
          $(document).ready(function () {
            $('#per-country-dropdown').on('change', function () {
                var idCountry = this.value;
                $("#per-state-dropdown").html('');
                $("#per-city-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#per-state-dropdown').html('<option value="">-- Select State --</option>');
                        $.each(result.states, function (key, value) {
                            $("#per-state-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        //$('#city-dropdown').html('<option value="">-- Select City --</option>');
                    }
                });
            });

            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#per-state-dropdown').on('change', function () {
                var idState = this.value;
                $("#per-city-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#per-city-dropdown').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function (key, value) {
                            $("#per-city-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });

        });
    </script>
     @if(isset($per_profile_record[0]))
    <script>
        /* City dropdown */
                var idState = $('#per-state-dropdown').val();
               // alert(idState);
                $("#per-city-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#per-city-dropdown').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function (key, value) {
                            //console.log(value);
                            $("#per-city-dropdown").append('<option value="' + value
                                .id + '" '+(value.id=={{$per_profile_record[0]->per_city}}?"SELECTED":"")+'>' + value.name + '</option>');
                        });
                    }
                });
    </script>
    @endif



    <!-- clinical country state city -->
    @if(isset($clinic_record))

    <script>

        $(document).ready(function () {


               var idCountry = $('#country-dropdown-clinical').val();

               //$("#state-dropdown-clinical").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dropdown-clinical').html('<option value="">-- Select State --</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dropdown-clinical").append('<option value="' + value
                                .id + '" '+(value.id=={{$clinic_record->state}}?"SELECTED":"")+'>' + value.name + '</option>');
                        });
                        //$('#city-dropdown').html('<option value="">-- Select City --</option>');
                    }
                });


             });
     </script>
      @endif
     <script>


            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#country-dropdown-clinical').on('change',function () {
                var idCountry = this.value;
                $("#state-dropdown-clinical").html('');
                $("#city-dropdown-clinical").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {

                        $('#state-dropdown-clinical').html('<option value="">-- Select State --</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dropdown-clinical").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        //$('#city-dropdown').html('<option value="">-- Select City --</option>');
                    }
                });
            });

            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#state-dropdown-clinical').on('change', function () {
                var idState = this.value;
                $("#city-dropdown-clinical").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dropdown-clinical').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dropdown-clinical").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });


    </script>
 @if(isset($clinic_record))
    <script>
        /* City dropdown */
                var idState = $('#state-dropdown-clinical').val();
                //alert(idState);
                $("#city-dropdown-clinical").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dropdown-clinical').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function (key, value) {
                            //console.log(value);
                            $("#city-dropdown-clinical").append('<option value="' + value
                                .id + '" '+(value.id=={{$clinic_record->city}}?"SELECTED":"")+'>' + value.name + '</option>');
                        });
                    }
                });
    </script>
  @endif

    <script>
    	$('#check_reading').on('change', function(){
		   $('#hidden_read_check').val(this.checked ? 1 : 0);
		});

		$('#check_writing').on('change', function(){
		   $('#hidden_write_check').val(this.checked ? 1 : 0);
		});

		$('#check_speaking').on('change', function(){
		   $('#hidden_speak_check').val(this.checked ? 1 : 0);
		});
    </script>

<script>

  $('.update_education').on('click',function(){

        //alert("yes");
        // var data= $(this).data('id');

         var education_id= $(this).data('id');
         //alert(education_id);
         $.ajax({
             url: "{{url('/education/edit-company')}}",
             type: "GET",
             data: {
                 education_id: education_id,
             },

             success: function(response) {
                 $('#successMsg').show();
                 //console.log(response);
                 if (response) {

                     //alert(response.upload_degree);

                     $("#edit_educational_id").val(response.id);
                     $("#edit_institute_name").val(response.institute_name);
                     $("#edit_course_name").val(response.course_name);
                     $("#edit_year_of_passing").val(response.year_of_passing);

                     $('#upload_degree').attr('src', response.upload_degree);

                      $('#educational_document').attr('href', response.upload_degree);



                  }


             },

             error: function(response) {
                 alert(error);
             },

         });


  });

   $('.update_publication').on('click',function(){

        //alert("yes");
        // var data= $(this).data('id');

         var publication_id= $(this).data('id');
         //alert(education_id);
         $.ajax({
             url: "{{url('/publication/edit-publication')}}",
             type: "GET",
             data: {
                 publication_id: publication_id,
             },

             success: function(response) {
                 $('#successMsg').show();
                 //console.log(response);
                 if (response) {

                     //alert(response.upload_degree);

                     $("#edit_no_of_case_reports").val(response.no_of_case_reports);
                     $("#edit_research_papers").val(response.research_papers);
                     $("#edit_books_published").val(response.books_published);
                     $("#edit_no_of_seminars").val(response.no_of_seminars);
                     $("#edit_publication_id").val(response.id);

                    }


             },

             error: function(response) {
                 alert(error);
             },

         });


  });
</script>

<script>
   function confirm_option(action){
      if(!confirm("Are you sure to "+action+", this record!")){
         return false;
      }

      return true;

   }

  $("#any_done_services").change(function() {
    if(this.checked) {
        $('#output').html('Checkbox is checked');
        var data=document.getElementById('any_done_services').value='1';

        //alert(data);
    }else
    {
         var data=document.getElementById('any_done_services').value='0';
        //alert("unchecked");

    }
});
</script>
@endsection

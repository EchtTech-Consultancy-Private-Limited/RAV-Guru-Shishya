@extends('layouts.app-file')
@section('content')
<section class="content">
   <!-- @if (count($errors) > 0)
   <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
   @endif -->
   <div class="container-fluid">
      <div class="block-header">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <ul class="breadcrumb breadcrumb-style ">
                  <li class="breadcrumb-item">
                     <h6 class="page-title"> New Patient History </h6>
                  </li>
                  <li class="breadcrumb-item bcrumb-1">
                     <a href="{{url('/dashboard')}}">
                        <i class="fas fa-home"></i> Home </a>
                  </li>
                  <li class="breadcrumb-item bcrumb-1">
                     <a href="{{url('/new-patient-registration')}}">
                        <i class="breadcrumb-item bcrumb-1"></i> New Patient </a>
                  </li>
                  <li class="breadcrumb-item active"> New Patient History </li>
               </ul>
               @if ($message = Session::get('success'))
               <div class="alert alert-success">
                  <p>{{ $message }}</p>
               </div>
               @endif
            </div>
         </div>
      </div>
      <!-- Basic Example | Horizontal Layout -->
      <div class="row clearfix">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
               <div class="header">
                  <ul class="header-dropdown m-r--5">
                     <li class="dropdown">
                        <a href="#" onClick="return false;" class="dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        </a>
                        <ul class="dropdown-menu float-start">
                           <li>
                              <a href="#" onClick="return
                              false;">Action</a>
                           </li>
                           <li>
                              <a href="#" onClick="return
                              false;">Another action</a>
                           </li>
                           <li>
                              <a href="#" onClick="return
                              false;">Something else here</a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
               <div class="body">
                  <div id="wizard_horizontal">
                     <!--<h2>New History Sheet</h2>-->
                     <section>
                        <div class="col-md-12">
                           <div class="card">
                              <form role="form" method="POST" id="php_form" action="{{ route('register.patients') }}" enctype="multipart/form-data">
                                 @csrf
                                 <input type="hidden" name="guru_id" value="{{ $guru->id }}">
                                 <input type="hidden" name="shishya_id" value="{{ Auth::user()->id }}">
                                 <div class="card-body">
                                    <div class="title">
                                       <p>Basic Information</p>
                                       </div>
                                    <div class="row">

                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Name of the Guru</label><br>
                                            <p>{{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}}</p>

                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Place of the Guru</label><br>
                                            <p>{{$guru->city_name}}</p>

                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Name of the Shishya</label><br>
                                             <p>{{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}}</p>

                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Date of Report</label><br>
                                           <p><?php echo date('d-m-Y'); ?></p>

                                          </div>
                                       </div>
                                    </div>

                                    <hr style="height:2px;">
                                    <div class="title">
                                          <p>Add Patient Details</p>
                                       </div>
                                    <div class="row">

                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Name of the Patient<span class="text-danger">*</span></label>
                                             <input type="text" name="patient_name" id="txt_firstCapital" class="form-control preventnumeric capitalize" placeholder="Enter Patient Name" value="{{ old('patient_name') }}" onfocus="focused(this)" onfocusout="defocused(this)" maxlength="30">
                                             <p id="patient_name_err" class="position-absolute"></p>
                                             @if ($errors->has('patient_name'))
                                             <span class="help-block">
                                                <strong  >{{ $errors->first('patient_name') }}</strong>
                                             </span>
                                             @endif
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Registration No<span class="text-danger">*</span></label>
                                             <input type="text" name="registration_no" class="form-control" placeholder="Registration No" value="{{ old('registration_no') }}" onfocus="focused(this)" onfocusout="defocused(this)" maxlength="15">
                                             <p id="registration_no_err" class="position-absolute"></p>
                                             @if ($errors->has('registration_no'))
                                             <span class="help-block">
                                                <strong  >{{ $errors->first('registration_no') }}</strong>
                                             </span>
                                             @endif
                                          </div>
                                       </div>
                                       <div class="col-md-2">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Age<span class="text-danger">*</span></label>
                                             <input type="text" name="age" class="form-control" placeholder="Age" aria-label="Phone" value="{{ old('age') }}" onfocus="focused(this)" onfocusout="defocused(this)" maxlength="3" id="age">
                                             <p id="age_err" class="position-absolute"></p>
                                             @if ($errors->has('age'))
                                             <span class="help-block">
                                                <strong  >{{ $errors->first('age') }}</strong>
                                             </span>
                                             @endif
                                          </div>
                                       </div>
                                       <div class="col-md-2">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Registration Date</label>
                                             <input type="date" name="registration_date" class="form-control" placeholder="Date" aria-label="Date" value="{{ date('Y-m-d') }}" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                                          </div>
                                       </div>
                                       <div class="col-md-2">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Patients Type<span class="text-danger">*</span></label>
                                             <select class="form-control" name="patient_type">
                                                <option value="">Please Select</option>
                                                @if( old('patient_type'))
                                                <option value="{{ old('patient_type') }}" selected>{{old('patient_type')}} </option>
                                                @endif
                                                <option value="In-Patient">In-Patient</option>
                                                <option value="OPD-Patient">OPD-Patient</option>
                                             </select>
                                             <p id="patient_type_err" class="position-absolute"></p>
                                             @if ($errors->has('patient_type'))
                                             <span class="help-block">
                                                <strong  >{{ $errors->first('patient_type') }}</strong>
                                             </span>
                                             @endif
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">




                                    </div>
                                    <div class="row">
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Gender" class="form-control-label">Gender<span class="text-danger">*</span></label>
                                             <select name="gender" id="Gender" class="form-control">
                                                <option value="">Please select
                                                </option>
                                                @foreach(__('phr.gender') as $key=>$value)
                                                <option value="{{$key}}">{{$value}}</option>
                                                @if($key == old('gender'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                @endforeach
                                             </select>
                                             <p id="gender_err" class="position-absolute"></p>
                                             @if ($errors->has('gender'))
                                             <span class="help-block">
                                                <strong  >{{ $errors->first('gender') }}</strong>
                                             </span>
                                             @endif
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Age Group<span class="text-danger">*</span></label>
                                             <select name="age_group" id="age_group" class="form-control">
                                                <option value="">Please select</option>
                                                @foreach(__('phr.age_group') as $key=>$value)
                                                @if($key == old('age_group'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                             <p id="age_group_err" class="position-absolute"></p>
                                             @if ($errors->has('age_group'))
                                             <span class="help-block">
                                                <strong  >{{ $errors->first('age_group') }}</strong>
                                             </span>
                                             @endif
                                          </div>
                                       </div>
                                       <div class="col-md-2">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Occupation<span class="text-danger">*</span></label>
                                             <select name="occupation" id="occupation" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.occupation') as $key=>$value)
                                                @if($key == old('occupation'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                             <p id="occupation_err" class="position-absolute"></p>
                                             @if ($errors->has('occupation'))
                                             <span class="help-block">
                                                <strong  >{{ $errors->first('occupation') }}</strong>
                                             </span>
                                             @endif
                                          </div>
                                       </div>
                                       <div class="col-md-2">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Marital Status<span class="text-danger">*</span></label>
                                             <select name="marital_status" id="Marital
                                             Status" class="form-control">
                                                <option value="">Please select</option>
                                                @foreach(__('phr.marital_status') as $key=>$value)
                                                   @if($key == old('marital_status'))
                                                      <option value="{{ $key }}" selected>{{ $value }}</option>
                                                   @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                             <p id="marital_status_err" class="position-absolute"></p>
                                             @if ($errors->has('marital_status'))
                                             <span class="help-block">
                                                <strong  >{{ $errors->first('marital_status') }}</strong>
                                             </span>
                                             @endif
                                          </div>
                                       </div>
                                       <div class="col-md-2">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Aasan Sidhi</label>
                                             <textarea name="aasan_sidhi" id=""  rows="1"  value="{{ old('aasan_sidhi') }}" onfocusout="defocused(this)" maxlength="30" class="form-control"></textarea>
                                             <!-- <input type="text" name="aasan_sidhi" value="{{ old('aasan_sidhi') }}" class="form-control" placeholder="Enter Aasan Sidhi" aria-label="Aasan
                                             Sidhi" value="" onfocus="focused(this)" > -->
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Season</label>
                                             <input type="text" name="season" value="{{ old('season') }}" class="form-control" placeholder="Enter Season" aria-label="Aasan
                                             Sidhi" value="" onfocus="focused(this)" onfocusout="defocused(this)" maxlength="30">
                                          </div>
                                       </div>


                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="example-text-in
                                             put" class="form-control-label">Region of patient</label>
                                             <select name="region_of_patient" id="Region
                                             of
                                             patient" class="form-control">
                                                <option value="">Please select</option>
                                                @foreach(__('phr.region_of_patient') as $key=>$value)
                                                @if($key == old('region_of_patient'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>


                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Address<span class="text-danger">*</span></label>
                                             <textarea cols="45" rows="1" name="address" class="form-control" placeholder="Enter  Address" maxlength="200">{{ old('address') }}</textarea>
                                             <p id="address_err" class="position-absolute"></p>
                                             @if ($errors->has('address'))
                                             <span class="help-block">
                                                <strong  >{{ $errors->first('address') }}</strong>
                                             </span>
                                             @endif
                                          </div>
                                       </div>

                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Main Complaint(As said by family member)</label>
                                             <textarea cols="45" rows="1" name="main_complaint_as_said_by_family" class="form-control" placeholder="Main Complaint" maxlength="100">{{ old('main_complaint_as_said_by_family') }}</textarea>
                                          </div>
                                       </div>






                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Duration</label>
                                             <input type="text" name="complaint_as_said_by_family_duration" class="form-control" placeholder="Enter Duration" value="{{ old('complaint_as_said_by_family_duration') }}" onfocus="focused(this)" onfocusout="defocused(this)" maxlength="50">
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Past Illness</label>
                                             <textarea cols="45" rows="1" name="past_illness" class="form-control" value="" placeholder="Enter Past Illness" maxlength="80">{{ old('past_illness') }}</textarea>
                                          </div>
                                       </div>
                                    </div>





                                    <div class="row">
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Main Complaint(As said by patient)</label>
                                             <textarea cols="45" rows="1" name="main_complaintsaid_by_patient" class="form-control" value="{{ old('main_complaintsaid_by_patient') }}" placeholder="Enter Main Complaint" maxlength="100">{{ old('main_complaintsaid_by_patient') }}</textarea>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Duration</label>
                                             <input type="text" name="said_by_patient_duration" value="{{ old('said_by_patient_duration') }}" class="form-control" placeholder="Enter Duration" onfocus="focused(this)" onfocusout="defocused(this)" maxlength="30">
                                          </div>
                                       </div>

                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                                Family
                                                History</label>
                                             <textarea cols="45" rows="1" name="family_history" class="form-control" value="" aria-label="family_history" placeholder="Enter Family History" maxlength="40">{{ old('family_history') }}</textarea>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             {{-- <label for="example-text-input" class="form-control-label">Examination of the patient</label> --}}

                                             <div class="title">

                                                <p>Examination of the patient</p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Skin">
                                                Skin</label>
                                             <select name="skin" id="Skin" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.skin') as $key=>$skinvalue)
                                                @if($key == old('skin'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$skinvalue}}</option>
                                                @endforeach

                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Nadi">
                                                Nadi</label>
                                             <select name="nadi" id="Nadi" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.nadi') as $key=>$value)
                                                @if($key == old('nadi'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Place">Place</label>
                                             <select name="nadi_place" id="Place" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.place') as $key=>$value)
                                                @if($key == old('nadi_place'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Nails">
                                                Nails</label>
                                             <select name="nails" id="Nails" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.nails') as $key=>$value)
                                                @if($key == old('nails'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Nails">
                                                Anguli
                                                Sandhi</label>
                                             <select name="anguli_sandhi" id="Anguli
                                             sandhi" class="form-control">
                                                <option value="">Please select
                                                </option>
                                                @foreach(__('phr.anguli_sandhi') as $key=>$value)
                                                @if($key == old('anguli_sandhi'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Netra">
                                                Netra</label>
                                             <select name="netra" id="Netra" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.netra') as $key=>$value)
                                                @if($key == old('netra'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Adhovartma">
                                                Adhovartma</label>
                                             <select name="adhovartma" id="Adhovartma" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.adhovartma') as $key=>$value)
                                                @if($key == old('adhovartma'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Hastatala">
                                                Hastatala</label>
                                             <select name="hastatala" id="Hastatala" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.hastatala') as $key=>$value)
                                                @if($key == old('hastatala'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Jihwa">
                                                Jihwa</label>
                                             <select name="jihwa" id="Jihwa" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.jihwa') as $key=>$value)
                                                @if($key == old('jihwa'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Aakriti">
                                                Aakriti</label>
                                             <select name="aakriti" id="Aakriti" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.aakriti') as $key=>$value)
                                                @if($key == old('aakriti'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Shabda">
                                                Shabda</label>
                                             <select name="shabda" id="Shabda" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.shabda') as $key=>$value)
                                                @if($key == old('shabda'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Koshtha">
                                                Koshtha</label>
                                             <select name="koshtha" id="Koshtha" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.koshtha') as $key=>$value)
                                                @if($key == old('koshtha'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Agni">
                                                Agni</label>
                                             <select name="agni" id="Agni" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.agni') as $key=>$value)
                                                @if($key == old('agni'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Mala
                                             Pravritti">
                                                Mala
                                                Pravritti</label>
                                             <select name="mala_pravritti" id="Mala
                                             Pravritti" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.mala_pravritti') as $key=>$value)
                                                @if($key == old('mala_pravritti'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Mutra
                                             Pravritti">
                                                Mutra
                                                Pravritti</label>
                                             <select name="mutra_pravritti" id="Mutra
                                             Pravritti" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.mutra_pravritti') as $key=>$value)
                                                @if($key == old('mutra_pravritti'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Vyavay
                                             Pravritti">
                                                Vyavay
                                                Pravritti</label>
                                             <select name="vyavay_pravritti" id="Vyavay
                                             Pravritti" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.vyavay_pravritti') as $key=>$value)
                                                @if($key == old('vyavay_pravritti'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Shukrakshanapravritti"> Shukrakshana
                                                Pravritti</label>
                                             <select name="shukrakshana_pravritti" id="Shukrakshanapravritti" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.shukrakshana_pravritti') as $key=>$value)
                                                @if($key == old('shukrakshana_pravritti'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Aartava
                                             Pravritti
                                             Kala">
                                                Aartava
                                                Pravritti
                                                Kala</label>
                                             <select name="aartava_pravratti_kala" id="Aartava
                                             Pravritti
                                             Kala" class="form-control">
                                                <option value="">Please
                                                   select
                                                   @foreach(__('phr.aartava_pravratti_kala') as $key=>$value)
                                                   @if($key == old('aartava_pravratti_kala'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Dehoshma">
                                                Dehoshma</label>
                                             <select name="dehoshma" id="Dehoshma" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.dehoshma') as $key=>$value)
                                                @if($key == old('dehoshma'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Bhara">
                                                Bhara</label>
                                             <input type="text" name="bhara" id="Bhara" class="form-control" placeholder="Enter Bhara" value="{{ old('bhara') }}" onfocus="focused(this)" onfocusout="defocused(this)" maxlength="30">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Raktachapa">
                                                Raktachapa</label>
                                             <select name="raktachapa" id="Raktachapa" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.raktachapa') as $key=>$value)
                                                @if($key == old('raktachapa'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Hrid
                                             gati">
                                                Hrid
                                                Gati</label>
                                             <select name="hrid_gati" id="Hrid
                                             gati" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.hrid_gati') as $key=>$value)
                                                @if($key == old('hrid_gati'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="Shvasagati">
                                                Shvasagati</label>
                                             <select name="shvasagati" id="shvasagati" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.shvasagati') as $key=>$value)
                                                @if($key == old('shvasagati'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="parkriti_parikshana">
                                                Parkriti
                                                Parikshana</label>
                                             <select name="parkriti_parikshana" id="parkriti_parikshana" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.parkriti_parikshana') as $key=>$value)
                                                @if($key == old('parkriti_parikshana'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                                Examination
                                                by
                                                Physician</label>
                                             <select name="examination_by_physician" id="Skin" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.examination_by_physician') as $key=>$value)
                                                @if($key == old('examination_by_physician'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                                Prayogashaliya
                                                Parikshana</label>
                                             <textarea cols="45" rows="1" name="prayogashaliya_parikshana" class="form-control" placeholder="Enter Prayogashaliya Parikshana" maxlength="200">{{ old('prayogashaliya_parikshana') }}</textarea>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                                Samprapti
                                                Vivarana</label>
                                             <textarea cols="45" rows="1" name="samprapti_vivarana" class="form-control" value="" aria-label="samprapti_vivarana" placeholder="Enter Samprapti Vivarana" maxlength="100">{{ old('samprapti_vivarana') }}</textarea>
                                          </div>
                                       </div>

                                    </div>

                                    <div class="row">
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                                Vibhedaka
                                                Pariksha</label>
                                             <textarea cols="45" rows="1" name="vibhedaka_pariksha" class="form-control" value="" aria-label="vibhedaka_pariksha" placeholder="Enter Vibhedaka Pariksha" maxlength="100">{{ old('vibhedaka_pariksha') }}</textarea>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                                Roga
                                                Vinishchaya-
                                                Pramukh
                                                Nidana</label>
                                             <textarea cols="45" rows="1" name="roga_vinishchaya_pramukh_nidana" class="form-control" value="" aria-label="roga_vinishchaya" placeholder="Enter Roga Vinishchaya- Nidana" maxlength="100">{{ old('roga_vinishchaya_pramukh_nidana') }}</textarea>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                                Chikitsa
                                                Kalpana
                                                Anupana
                                                Sahita</label>
                                             <textarea cols="45" rows="1" name="chikitsa_kalpana_anupana_sahita" class="form-control" value="" aria-label="chikitsa_kalpana_anupana_sahita
                                             " placeholder="Enter Chikitsa Kalpana Anupana Sahita" maxlength="100">{{ old('chikitsa_kalpana_anupana_sahita') }}</textarea>
                                          </div>
                                       </div>

                                    </div>
                                    <div class="row">
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="samshodhana_kriyas" class="form-control-label">Samshodhana
                                                Kriyas</label>
                                             <textarea cols="45" rows="1" name="samshodhana_kriyas" class="form-control" value="" aria-label="samshodhana_kriyas
                                             " placeholder="Enter Samshodhana Kriyas" maxlength="100">{{ old('samshodhana_kriyas') }}</textarea>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="samshamana_kriyas" class="form-control-label">Samshamana
                                                Kriyas</label>
                                             <textarea cols="45" rows="1" name="samshamana_kriyas" class="form-control" value="" aria-label="samshamana_kriyas
                                             " placeholder="Enter Samshamana Kriyas" maxlength="100">{{ old('samshamana_kriyas') }}</textarea>
                                          </div>
                                       </div>

                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                                Pathya-Apathya
                                                (<span class="fs-12
                                             text-info"><a target="_blank" href="{{ asset('annexure-file.pdf') }}">Annexure-1</a></span>)</label>
                                             <!-- <textarea cols="45" rows="1" name="pathya_apathya" class="form-control" value="" aria-label="pathya_apathya
                                             " placeholder="Enter  Pathya-Apathya" maxlength="100">{{ old('pathya_apathya') }}</textarea> -->
                                             <select name="pathya_apathya" class="form-control pathya_apathya">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.pathya_apathya') as $key=>$value)
                                                @if($key == old('pathya_apathya'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                    </div>

                                    
                                         <!-- ******************aAnexteure pdf input field*********************** -->
                                    <div class="row">
                                       <div class="col-md-3 annexure_field" id="soft_drink">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                             Soft drink/Peya Padarth</label>
                                             <select name="soft_drink" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.soft_drink') as $key=>$value)
                                                @if($key == old('soft_drink'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                         <div class="col-md-3 annexure_field" id="madhyahan_bhojana">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                             Madhyahan Bhojana</label>
                                             <select name="madhyahan_bhojana" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.madhyahan_bhojana') as $key=>$value)
                                                @if($key == old('madhyahan_bhojana'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3 annexure_field" id="prataraasha">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                             Prataraasha</label>
                                             <select name="prataraasha" class="form-control">
                                                <option value="">Please
                                                   select
                                                </option>
                                                @foreach(__('phr.prataraasha') as $key=>$value)
                                                @if($key == old('prataraasha'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                         <div class="col-md-3 annexure_field" id="pulses">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                             Pulses </label>
                                             <select name="pulses" class="form-control">
                                                <option value="">Please  select
                                                </option>
                                                @foreach(__('phr.pulses') as $key=>$value)
                                                @if($key == old('pulses'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3 annexure_field" id="pulpy_vegetables">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                             Pulpy vegetables </label>
                                             <select name="pulpy_vegetables" class="form-control">
                                                <option value="">Please  select
                                                </option>
                                                @foreach(__('phr.pulpy_vegetables') as $key=>$value)
                                                @if($key == old('pulpy_vegetables'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                         <div class="col-md-3 annexure_field" id="oil_tail">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                             Oil/Tail </label>
                                             <select name="oil_tail" class="form-control">
                                                <option value="">Please  select
                                                </option>
                                                @foreach(__('phr.oil_tail') as $key=>$value)
                                                @if($key == old('oil_tail'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>

                                       <div class="col-md-3 annexure_field" id="afternoon_fruit">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                             Afternoon Fruit </label>
                                             <select name="afternoon_fruit" class="form-control">
                                                <option value="">Please  select
                                                </option>
                                                @foreach(__('phr.afternoon_fruit') as $key=>$value)
                                                @if($key == old('afternoon_fruit'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3 annexure_field" id="evening_meals">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                             evening_meals </label>
                                             <input type="text" name="evening_meals" maxlength="150" value="{{ old('evening_meals') }}">
                                          </div>
                                       </div>
                                       <div class="col-md-3 annexure_field" id="bed_time">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                             Bed time </label>
                                             <select name="bed_time" class="form-control">
                                                <option value="">Please  select
                                                </option>
                                                @foreach(__('phr.bed_time') as $key=>$value)
                                                @if($key == old('bed_time'))
                                                   <option value="{{ $key }}" selected>{{ $value }}</option>
                                                @endif
                                                <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                       <!-- ******************aAnexteure pdf input field*********************** -->
                                    
                                    <div class="row">

                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Guru's
                                                E-Sign</label><br>@if($guru->e_sign!='')
                                             <img src="{{ asset('uploads/'.$guru->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                             @endif
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Shishya's E-sign's</label><br>
                                             @if(Auth::user()->e_sign!='')
                                             <img src="{{ asset('uploads/'.Auth::user()->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                             @endif
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-12 p-t-20 text-end">
                                    <button type="submit" class="btn submit  waves-effect m-r-15">Submit</button>
                                    <a href="{{ url('new-patient-registration') }}" type="button" class="btn back btn-danger waves-effect">Back</a>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </section>
                  </div>
               </div>
            </div>
         </div>
      </div>
</section>
<script src="{{ asset('assets/js/custom-script.js') }}"></script>
@endsection
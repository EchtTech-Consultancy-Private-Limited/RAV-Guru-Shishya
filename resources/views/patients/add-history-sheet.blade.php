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
                  <i class="fas fa-home"></i> Home  </a>
               </li>
               <li class="breadcrumb-item bcrumb-1">
                  <a href="{{url('/new-patient-registration')}}">
                  <i class="breadcrumb-item bcrumb-1"></i> New Patients</a>
               </li>
               <li class="breadcrumb-item active">  New Patient History  </li>
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
                     <a href="#" onClick="return false;"
                        class="dropdown-toggle"
                        data-bs-toggle="dropdown"
                        role="button" aria-haspopup="true"
                        aria-expanded="false">
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
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Name of the Guru<span
                                             class="text-danger">*</span></label><br>
                                         <label
                                         for="example-text-input"
                                         class="form-control-label"><b>{{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}}</b></label>

                                       </div>
                                    </div>
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Place of the Guru</label><br>
                                          <label
                                             for="example-text-input"
                                             class="form-control-label"><b>{{$guru->city_name}}<b></label>

                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Name of the Shishya<span
                                             class="text-danger">*</span></label><br>
                                         <label
                                         for="example-text-input"
                                         class="form-control-label"><b>{{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}}</b></label>

                                       </div>
                                    </div>
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Date of Report</label><br>
                                          <label
                                             for="example-text-input"
                                             class="form-control-label"><b><?php echo date('Y-m-d'); ?><b></label>

                                       </div>
                                    </div>
                                 </div>
                                 <hr
                                    style="height:2px;">
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Name of the Patient<span
                                             class="text-danger">*</span></label>
                                          <input
                                             type="text"
                                             name="patient_name" id="txt_firstCapital"
                                             class="form-control preventnumeric capitalize"
                                             placeholder="Enter Patient Name"
                                             value="{{ old('patient_name') }}"
                                             onfocus="focused(this)"
                                             onfocusout="defocused(this)" maxlength="30">
                                             @if ($errors->has('patient_name'))
                                                 <span class="help-block">
                                                     <strong style="color:red;">{{ $errors->first('patient_name') }}</strong>
                                                 </span>
                                             @endif
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Registration No<span
                                             class="text-danger">*</span></label>
                                          <input
                                             type="text"
                                             name="registration_no"
                                             class="form-control"
                                             placeholder="Registration No"
                                             value="{{ old('registration_no') }}"
                                             onfocus="focused(this)"
                                             onfocusout="defocused(this)" maxlength="15">
                                             @if ($errors->has('registration_no'))
                                                 <span class="help-block">
                                                     <strong style="color:red;">{{ $errors->first('registration_no') }}</strong>
                                                 </span>
                                             @endif
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Age<span
                                             class="text-danger">*</span></label>
                                          <input
                                             type="text"
                                             name="age"
                                             class="form-control"
                                             placeholder="Age"
                                             aria-label="Phone"
                                             value="{{ old('age') }}"
                                             onfocus="focused(this)"
                                             onfocusout="defocused(this)" maxlength="3" id="age">
                                             @if ($errors->has('age'))
                                                 <span class="help-block">
                                                     <strong style="color:red;">{{ $errors->first('age') }}</strong>
                                                 </span>
                                             @endif
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Registration Date</label>
                                          <input
                                             type="date"
                                             name="registration_date"
                                             class="form-control"
                                             placeholder="Date"
                                             aria-label="Date"
                                             value="<?php echo date('Y-m-d'); ?>" onfocus="focused(this)"
                                             onfocusout="defocused(this)" readonly>
                                       </div>
                                    </div>

                                    <div
                                       class="col-md-12">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Patients Type<span
                                             class="text-danger">*</span></label>
                                             <select class="form-control" name="patient_type" >
                                                <option value="">Please Select</option>
                                                <option value="In-Patient">In-Patient</option>
                                                <option value="OPD-Patient">OPD-Patient</option>
                                             </select>
                                             @if ($errors->has('patient_type'))
                                                 <span class="help-block">
                                                     <strong style="color:red;">{{ $errors->first('patient_type') }}</strong>
                                                 </span>
                                             @endif
                                       </div>
                                    </div>

                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Gender"
                                             class="form-control-label">Gender<span
                                             class="text-danger">*</span></label>
                                          <select
                                             name="gender"
                                             id="Gender"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                             @foreach(__('phr.gender') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                          @if ($errors->has('gender'))
                                                 <span class="help-block">
                                                     <strong style="color:red;">{{ $errors->first('gender') }}</strong>
                                                 </span>
                                             @endif
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Age Group<span
                                             class="text-danger">*</span></label>
                                          <select
                                             name="age_group"
                                             id="age_group"
                                             class="form-control">
                                             <option
                                                value="">Please select</option>
                                             @foreach(__('phr.age_group') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                            @if ($errors->has('age_group'))
                                                 <span class="help-block">
                                                     <strong style="color:red;">{{ $errors->first('age_group') }}</strong>
                                                 </span>
                                             @endif
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Occupation<span
                                             class="text-danger">*</span></label>
                                          <select
                                             name="occupation"
                                             id="occupation"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>

                                            @foreach(__('phr.occupation') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                          @if ($errors->has('occupation'))
                                                 <span class="help-block">
                                                     <strong style="color:red;">{{ $errors->first('occupation') }}</strong>
                                                 </span>
                                             @endif
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Marital Status<span
                                             class="text-danger">*</span></label>
                                          <select
                                             name="marital_status"
                                             id="Marital
                                             Status"
                                             class="form-control">
                                             <option
                                                value="">Please select</option>
                                             @foreach(__('phr.marital_status') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                           @if ($errors->has('marital_status'))
                                                 <span class="help-block">
                                                     <strong style="color:red;">{{ $errors->first('marital_status') }}</strong>
                                                 </span>
                                             @endif
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Aasan Sidhi</label>
                                          <input
                                             type="text"
                                             name="aasan_sidhi"
                                             class="form-control"
                                             placeholder="Enter Aasan Sidhi"
                                             aria-label="Aasan
                                             Sidhi"
                                             value=""
                                             onfocus="focused(this)"
                                             onfocusout="defocused(this)" maxlength="30">
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Season</label>
                                          <input
                                             type="text"
                                             name="season"
                                             class="form-control"
                                             placeholder="Enter Season"
                                             aria-label="Aasan
                                             Sidhi"
                                             value=""
                                             onfocus="focused(this)"
                                             onfocusout="defocused(this)" maxlength="30">
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-in
                                             put"
                                             class="form-control-label">Region of patient</label>
                                          <select
                                             name="region_of_patient"
                                             id="Region
                                             of
                                             patient"
                                             class="form-control">
                                             <option
                                                value="">Please select</option>
                                             @foreach(__('phr.region_of_patient') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Address<span
                                             class="text-danger">*</span></label>
                                          <textarea
                                             cols="45"
                                             rows="2"
                                             name="address"
                                             class="form-control"

                                             placeholder="Enter  Address" maxlength="200"></textarea>
                                             @if ($errors->has('address'))
                                                 <span class="help-block">
                                                     <strong style="color:red;">{{ $errors->first('address') }}</strong>
                                                 </span>
                                             @endif
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">1. Main Complaint(As said by patient)</label>
                                          <textarea
                                             cols="45"
                                             rows="2"
                                             name="main_complaintsaid_by_patient"
                                             class="form-control"
                                             value="{{ old('main_complaintsaid_by_patient') }}"

                                             placeholder="Enter Main Complaint" maxlength="100"></textarea>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Duration</label>
                                          <input
                                             type="text"
                                             name="said_by_patient_duration"
                                             class="form-control"
                                             placeholder="Enter Duration"

                                             value="{{ old('said_by_patient_duration') }}"
                                             onfocus="focused(this)"
                                             onfocusout="defocused(this)" maxlength="30">
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">2. Main Complaint(As said by family member)</label>
                                          <textarea
                                             cols="45"
                                             rows="2"
                                             name="main_complaint_as_said_by_family"
                                             class="form-control"

                                             placeholder="Main Complaint" maxlength="100"></textarea>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Duration</label>
                                          <input
                                             type="text"
                                             name="complaint_as_said_by_family_duration"
                                             class="form-control"
                                             placeholder="Enter Duration"

                                             value="{{ old('complaint_as_said_by_family_duration') }}"
                                             onfocus="focused(this)"
                                             onfocusout="defocused(this)" maxlength="50">
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">3. Past illness</label>
                                          <textarea
                                             cols="45"
                                             rows="2"
                                             name="past_illness"
                                             class="form-control"
                                             value=""

                                             placeholder="Enter Past illness" maxlength="80"></textarea>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">4.
                                          Family
                                          History</label>
                                          <textarea
                                             cols="45"
                                             rows="2"
                                             name="family_history"
                                             class="form-control"
                                             value=""
                                             aria-label="family_history"
                                             placeholder="Enter Family History" maxlength="40"></textarea>
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-12">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">5.
                                          Examination
                                          of
                                          the
                                          patient</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Skin">1)
                                          Skin</label>
                                          <select
                                             name="skin"
                                             id="Skin"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                            @foreach(__('phr.skin') as $key=>$skinvalue)
                                             <option value="{{$key}}">{{$skinvalue}}</option>
                                            @endforeach

                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Nadi">2)
                                          Nadi</label>
                                          <select
                                             name="nadi"
                                             id="Nadi"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                             @foreach(__('phr.nadi') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Place">Place</label>
                                          <select
                                             name="nadi_place"
                                             id="Place"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                             @foreach(__('phr.place') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Nails">3)
                                          Nails</label>
                                          <select
                                             name="nails"
                                             id="Nails"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                             @foreach(__('phr.nails') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Nails">4)
                                          Anguli
                                          sandhi</label>
                                          <select
                                             name="anguli_sandhi"
                                             id="Anguli
                                             sandhi"
                                             class="form-control">
                                             <option
                                                value="">Please select
                                             </option>
                                             @foreach(__('phr.anguli_sandhi') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Netra">5)
                                          Netra</label>
                                          <select
                                             name="netra"
                                             id="Netra"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>

                                             @foreach(__('phr.netra') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Adhovartma">6)
                                          Adhovartma</label>
                                          <select
                                             name="adhovartma"
                                             id="Adhovartma"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                             @foreach(__('phr.adhovartma') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Hastatala">7)
                                          Hastatala</label>
                                          <select
                                             name="hastatala"
                                             id="Hastatala"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                              @foreach(__('phr.hastatala') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Jihwa">8)
                                          Jihwa</label>
                                          <select
                                             name="jihwa"
                                             id="Jihwa"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                            @foreach(__('phr.jihwa') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Aakriti">9)
                                          Aakriti</label>
                                          <select
                                             name="aakriti"
                                             id="Aakriti"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                            @foreach(__('phr.aakriti') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Shabda">10)
                                          Shabda</label>
                                          <select
                                             name="shabda"
                                             id="Shabda"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                             @foreach(__('phr.shabda') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Koshtha">11)
                                          Koshtha</label>
                                          <select
                                             name="koshtha"
                                             id="Koshtha"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                            @foreach(__('phr.koshtha') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Agni">12)
                                          Agni</label>
                                          <select
                                             name="agni"
                                             id="Agni"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                            @foreach(__('phr.agni') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Mala
                                             Pravritti">13)
                                          Mala
                                          Pravritti</label>
                                          <select
                                             name="mala_pravritti"
                                             id="Mala
                                             Pravritti"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                            @foreach(__('phr.mala_pravritti') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Mutra
                                             Pravritti">14)
                                          Mutra
                                          Pravritti</label>
                                          <select
                                             name="mutra_pravritti"
                                             id="Mutra
                                             Pravritti"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                            @foreach(__('phr.mutra_pravritti') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Vyavay
                                             Pravritti">15)
                                          Vyavay
                                          Pravritti</label>
                                          <select
                                             name="vyavay_pravritti"
                                             id="Vyavay
                                             Pravritti"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                            @foreach(__('phr.vyavay_pravritti') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Shukrakshanapravritti">Shukrakshana
                                          pravritti</label>
                                          <select
                                             name="shukrakshana_pravritti"
                                             id="Shukrakshanapravritti"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                            @foreach(__('phr.shukrakshana_pravritti') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Aartava
                                             Pravritti
                                             Kala">16)
                                          Aartava
                                          Pravritti
                                          Kala</label>
                                          <select
                                             name="aartava_pravratti_kala"
                                             id="Aartava
                                             Pravritti
                                             Kala"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                              @foreach(__('phr.aartava_pravratti_kala') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Dehoshma">17)
                                          Dehoshma</label>
                                          <select
                                             name="dehoshma"
                                             id="Dehoshma"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                              @foreach(__('phr.dehoshma') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Bhara">18)
                                          Bhara</label>
                                          <input
                                             type="text"
                                             name="bhara"
                                             id="Bhara"
                                             class="form-control"
                                             placeholder="Enter Bhara"
                                             value="{{ old('bhara') }}"
                                             onfocus="focused(this)"
                                             onfocusout="defocused(this)" maxlength="30">
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Raktachapa">19)
                                          Raktachapa</label>
                                          <select
                                             name="raktachapa"
                                             id="Raktachapa"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                            @foreach(__('phr.raktachapa') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Hrid
                                             gati">20)
                                          Hrid
                                          gati</label>
                                          <select
                                             name="hrid_gati"
                                             id="Hrid
                                             gati"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                            @foreach(__('phr.hrid_gati') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Shvasagati">21)
                                          Shvasagati</label>
                                          <select
                                             name="shvasagati"
                                             id="shvasagati"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                            @foreach(__('phr.shvasagati') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="parkriti_parikshana">22)
                                          Parkriti
                                          Parikshana</label>
                                          <select
                                             name="parkriti_parikshana"
                                             id="parkriti_parikshana"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                             @foreach(__('phr.parkriti_parikshana') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">6.
                                          Examination
                                          by
                                          Physician</label>
                                          <select
                                             name="examination_by_physician"
                                             id="Skin"
                                             class="form-control">
                                             <option
                                                value="">Please
                                                select
                                             </option>
                                            @foreach(__('phr.examination_by_physician') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">7.
                                          Prayogashaliya
                                          Parikshana</label>
                                          <textarea
                                             cols="45"
                                             rows="2"
                                             name="prayogashaliya_parikshana"
                                             class="form-control"

                                             placeholder="Enter PrayogashaliyaParikshana"></textarea>
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">8.
                                          Samprapti
                                          Vivarana</label>
                                          <textarea
                                             cols="45"
                                             rows="2"
                                             name="samprapti_vivarana"
                                             class="form-control"
                                             value=""
                                             aria-label="samprapti_vivarana"
                                             placeholder="Enter Samprapti Vivarana" maxlength="100"></textarea>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">9.
                                          Vibhedaka
                                          Pariksha</label>
                                          <textarea
                                             cols="45"
                                             rows="2"
                                             name="vibhedaka_pariksha"
                                             class="form-control"
                                             value=""
                                             aria-label="vibhedaka_pariksha"
                                             placeholder="Enter Vibhedaka Pariksha" maxlength="100"></textarea>
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">10.
                                          Roga
                                          Vinishchaya-
                                          Pramukh
                                          Nidana</label>
                                          <textarea
                                             cols="45"
                                             rows="2"
                                             name="roga_vinishchaya_pramukh_nidana"
                                             class="form-control"
                                             value=""
                                             aria-label="roga_vinishchaya"
                                             placeholder="Enter Roga Vinishchaya- Nidana" maxlength="100"></textarea>
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-4">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">11.
                                          Chikitsa
                                          Kalpana
                                          Anupana
                                          Sahita</label>
                                          <textarea
                                             cols="45"
                                             rows="2"
                                             name="chikitsa_kalpana_anupana_sahita"
                                             class="form-control"
                                             value=""
                                             aria-label="chikitsa_kalpana_anupana_sahita
                                             "
                                             placeholder="Enter Chikitsa Kalpana Anupana Sahita" maxlength="100"></textarea>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-4">
                                       <div
                                          class="form-group">
                                          <label
                                             for="samshodhana_kriyas"
                                             class="form-control-label">Samshodhana
                                          Kriyas</label>
                                          <textarea
                                             cols="45"
                                             rows="2"
                                             name="samshodhana_kriyas"
                                             class="form-control"
                                             value=""
                                             aria-label="samshodhana_kriyas
                                             "
                                             placeholder="Enter Samshodhana Kriyas" maxlength="100"></textarea>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-4">
                                       <div
                                          class="form-group">
                                          <label
                                             for="samshamana_kriyas"
                                             class="form-control-label">Samshamana
                                          Kriyas</label>
                                          <textarea
                                             cols="45"
                                             rows="2"
                                             name="samshamana_kriyas"
                                             class="form-control"
                                             value=""
                                             aria-label="samshamana_kriyas
                                             "
                                             placeholder="Enter Samshamana Kriyas" maxlength="100"></textarea>
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">12.
                                          Pathya-Apathya
                                          (<span
                                             class="fs-12
                                             text-info">Annexure-1</span>)</label>
                                          <textarea
                                             cols="45"
                                             rows="2"
                                             name="pathya_apathya"
                                             class="form-control"
                                             value=""
                                             aria-label="pathya_apathya
                                             "
                                             placeholder="Enter  Pathya-Apathya" maxlength="100"></textarea>
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Student's
                                          E-Sign</label><br>
                                          @if(Auth::user()->e_sign!='')
                                          <img src="{{ asset('uploads/'.Auth::user()->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                          @endif
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Guru's
                                          E-Sign</label><br>
                                          @if($guru->e_sign!='')
                                          <img src="{{ asset('uploads/'.$guru->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                          @endif
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-12 p-t-20 text-center">
                                 <button type="submit" class="btn btn-primary waves-effect m-r-15" >Submit</button>
                                 <a href="{{ url('new-patient-registration') }}" type="button"  class="btn btn-danger waves-effect">Back</a>
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

<script>
   // disable alphate
     $('#age').keypress(function (e) {
          //alert("yes");
         var regex = new RegExp("^[0-9_]");
         var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
         if (regex.test(str)) {
             return true;
         }
         e.preventDefault();
         return false;
     });
</script>
@endsection

@extends('layouts.app-file')
@section('content')
<section class="content">
   @if (count($errors) > 0)
   <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      </div>
   @endif
   <div class="container-fluid">
   <div class="block-header">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <ul class="breadcrumb breadcrumb-style ">
               <li class="breadcrumb-item">
                  <h6 class="page-title"> Edit Patient Record </h6>
               </li>
               <li class="breadcrumb-item bcrumb-1">
                  <a href="{{url('/dashboard')}}">
                  <i class="fas fa-home"></i> Home  </a>
               </li>
               <li class="breadcrumb-item bcrumb-1">
                  <a href="{{ url()->previous() }}">
                  <i class="breadcrumb-item bcrumb-1"></i>  Patient </a>
               </li>
               <li class="breadcrumb-item active">  Edit Patient Record  </li>
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
                           <form role="form" method="POST" action="{{ route('admin.update.patients') }}" enctype="multipart/form-data">
                              @csrf
                              @if(!empty($guru->id))
                              <input type="hidden" name="guru_id" value="{{ $guru->id }}">
                              @endif
                              <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                              <input type="hidden" name="previous_url" value="{{ url()->previous() }}">
                              <div class="">
                                 <div
                                    class="row">
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Name of the Guru</label><br>
                                          @if(!empty($guru->id))
                                         <label
                                         for="example-text-input"
                                         class="form-control-label"><b>{{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}}</b></label>
                                         @endif
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Place of the Guru</label><br>
                                          @if(!empty($guru->id))
                                          <label
                                             for="example-text-input"
                                             class="form-control-label"><b>{{$guru->city_name}}</b></label>
                                          @endif
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Name of the Shishya</label><br>
                                         <label
                                         for="example-text-input"
                                         class="form-control-label"><b>{{ $shishya->firstname.' '.$shishya->middlename.' '.$shishya->lastname }} </b></label>
                                          
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Date of Report</label><br>
                                          <label
                                             for="example-text-input"
                                             class="form-control-label"><b><?php echo date('m-d-Y'); ?><b></label>
                                          
                                       </div>
                                    </div>
                                    



                                 </div>





                                 
                                 <hr
                                    style="height:2px;">
                                
                                 </div>
                                 <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                       <div   class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Name of the Patient<span
                                             class="text-danger">*</span></label>
                                          <input
                                             type="text"
                                             name="patient_name"
                                             class="form-control"
                                             placeholder="Patient Name"
                                             aria-label="Email"
                                             value="{{ $patient->patient_name }}"
                                             onfocus="focused(this)"
                                             onfocusout="defocused(this)" maxlength="32">
                                         @error('patient_name')
                                          <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                       <div  class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Registration No<span
                                             class="text-danger">*</span></label>
                                          <input
                                             type="text"
                                             name="registration_no"
                                             class="form-control"
                                             placeholder="Registration No"
                                             aria-label=""
                                             value="{{ $patient->registration_no }}"
                                             onfocus="focused(this)"
                                             onfocusout="defocused(this)" maxlength="32">
                                       @error('registration_no')
                                          <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                      </div>
                                       </div>


                                    <div class="col-lg-3 col-md-6">
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
                                             value="{{ $patient->age }}"
                                             onfocus="focused(this)"
                                             onfocusout="defocused(this)">@error('age')
                                       <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                       </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                       <div class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Registration Date</label>
                                          <input
                                             type="text"
                                             name="registration_date"
                                             class="form-control"
                                             placeholder="Date"
                                             aria-label="Date"
                                             value="{{date('d-m-y',strtotime($patient->registration_date))}}" onfocus="focused(this)"
                                             onfocusout="defocused(this)" readonly>
                                       </div>
                                    </div>

                                     <div  class="col-md-12">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label"><b>Patients Type</b> <span
                                             class="text-danger">*</span></label>
                                             <select class="form-control" name="patient_type" >
                                                <option value="">Please Select</option>
                                                
                                                @foreach(__('phr.patients_type') as $key=>$value)
                                                   <option value="{{$value}}" {{$patient->patient_type == $value  ? 'selected' : ''}}>{{$value}}</option>
                                                @endforeach
                                             </select>
                                             @error('patient_type')
                                          <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                 </div>

                           </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-lg-4 col-md-6">
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
                                             <option value="{{$key}}" {{$patient->gender == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>@error('gender')
                                             <div class="text-danger">{{ $message }}</div>
                                          @enderror
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-4 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Age Group<span
                                             class="text-danger">*</span></label>
                                          <select
                                             name="age_group"
                                             id="Age"
                                             class="form-control">
                                             <option
                                                value="">Please select</option>
                                             @foreach(__('phr.age_group') as $key=>$value)
                                             <option value="{{$key}}" {{$patient->age_group == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                                                                 </select>@error('age_group')
                                          <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-4 col-md-6">
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
                                             <option value="{{$key}}" {{$patient->occupation == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>@error('occupation')
                                           <div class="text-danger">{{ $message }}</div>@enderror
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-4 col-md-6">
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
                                             <option value="{{$key}}" {{$patient->marital_status == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>@error('marital_status')
                                          <div class="text-danger">{{ $message }}</div>
                                       @enderror
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-4 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Aasan Sidhi</label>
                                          <input
                                             type="text"
                                             name="aasan_sidhi"
                                             class="form-control"
                                             placeholder="Aasan Sidhi"
                                             aria-label="Aasan Sidhi"
                                             value="{{ $patient->aasan_sidhi }}"
                                             onfocus="focused(this)"
                                             onfocusout="defocused(this)" maxlength="32">
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-4 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Season</label>
                                          <input
                                             type="text"
                                             name="season"
                                             class="form-control"
                                             placeholder="Season"
                                             aria-label="Aasan
                                             Sidhi"
                                             value="{{ $patient->season }}"
                                             onfocus="focused(this)"
                                             onfocusout="defocused(this)" maxlength="32">
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-4 col-md-6">
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
                                             <option value="{{$key}}" {{$patient->region_of_patient == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-4 col-md-6">
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
                                             value="{{ $patient->address }}"
                                             aria-label="Address"
                                             placeholder="Street Address" maxlength="200">{{ $patient->address }}</textarea>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-4 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Main Complaint(As said by patient)</label>
                                          <textarea
                                             cols="45"
                                             rows="2"
                                             name="main_complaintsaid_by_patient"
                                             class="form-control"
                                             value="{{ $patient->main_complaintsaid_by_patient }}"
                                             aria-label="main_complaintsaid_by_patient"
                                             placeholder="Main Complaint" maxlength="100">{{ $patient->main_complaintsaid_by_patient }}</textarea>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-4 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Duration</label>
                                          <input
                                             type="text"
                                             name="said_by_patient_duration"
                                             class="form-control"
                                             placeholder="Duration"
                                             aria-label="Duration"
                                             value="{{ $patient->said_by_patient_duration }}"
                                             onfocus="focused(this)"
                                             onfocusout="defocused(this)" maxlength="32">
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-4 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Main Complaint(As said by family member)</label>
                                          <textarea
                                             cols="45"
                                             rows="2"
                                             name="main_complaint_as_said_by_family"
                                             class="form-control"
                                             value="{{ $patient->main_complaint_as_said_by_family }}"
                                             aria-label="main_complaint_as_said_by_family"
                                             placeholder="Main Complaint" maxlength="100">{{ $patient->main_complaint_as_said_by_family }}</textarea>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-4 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Duration</label>
                                          <input
                                             type="text"
                                             name="complaint_as_said_by_family_duration"
                                             class="form-control"
                                             placeholder="Duration"
                                             aria-label="Duration"
                                             value="{{ $patient->complaint_as_said_by_family_duration }}"
                                             onfocus="focused(this)"
                                             onfocusout="defocused(this)" maxlength="50">
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-4 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Past illness</label>
                                          <textarea
                                             cols="45"
                                             rows="2"
                                             name="past_illness"
                                             class="form-control"
                                             value="{{ $patient->past_illness }}"
                                             aria-label="Address"
                                             placeholder="Past illness" maxlength="80">{{ $patient->past_illness }}</textarea>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-4 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">
                                          Family
                                          History</label>
                                          <textarea
                                             cols="45"
                                             rows="2"
                                             name="family_history"
                                             class="form-control"
                                             value="{{ $patient->family_history }}"
                                             aria-label="family_history"
                                             placeholder="Family History" maxlength="40">{{ $patient->family_history }}</textarea>
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
                                             class="form-control-label">
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
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Skin">
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
                                             <option value="{{$key}}" {{$patient->skin == $key  ? 'selected' : ''}}>{{$skinvalue}}</option>
                                            @endforeach
                                             
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Nadi">
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
                                             <option value="{{$key}}" {{$patient->nadi == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-3 col-md-6">
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
                                             <option value="{{$key}}" {{$patient->nadi_place == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Nails">
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
                                             <option value="{{$key}}" {{$patient->nails == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Nails">
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
                                             <option value="{{$key}}" {{$patient->anguli_sandhi == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Netra">
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
                                             <option value="{{$key}}" {{$patient->netra == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Adhovartma">
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
                                             <option value="{{$key}}" {{$patient->adhovartma == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Hastatala">
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
                                             <option value="{{$key}}" {{$patient->hastatala == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Jihwa">
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
                                             <option value="{{$key}}" {{$patient->jihwa == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Aakriti">
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
                                             <option value="{{$key}}" {{$patient->aakriti == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Shabda">
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
                                             <option value="{{$key}}" {{$patient->shabda == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Koshtha">
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
                                             <option value="{{$key}}" {{$patient->koshtha == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Agni">
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
                                             <option value="{{$key}}" {{$patient->agni == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Mala
                                             Pravritti">
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
                                             <option value="{{$key}}" {{$patient->mala_pravritti == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Mutra
                                             Pravritti">
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
                                             <option value="{{$key}}" {{$patient->mutra_pravritti == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Vyavay
                                             Pravritti">
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
                                             <option value="{{$key}}" {{$patient->vyavay_pravritti == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-lg-3 col-md-6">
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
                                             <option value="{{$key}}" {{$patient->shukrakshana_pravritti == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Aartava
                                             Pravritti
                                             Kala">
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
                                             <option value="{{$key}}" {{$patient->aartava_pravratti_kala == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Dehoshma">
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
                                             <option value="{{$key}}" {{$patient->dehoshma == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Bhara">
                                          Bhara</label>
                                          <input
                                             type="text"
                                             name="bhara"
                                             id="Bhara"
                                             value="{{ $patient->bhara }}"
                                             class="form-control"
                                             placeholder="Bhara"
                                             onfocus="focused(this)"
                                             onfocusout="defocused(this)" maxlength="32">
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Raktachapa">
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
                                             <option value="{{$key}}" {{$patient->raktachapa == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Hrid
                                             gati">
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
                                             <option value="{{$key}}" {{$patient->hrid_gati == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Shvasagati">
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
                                             <option value="{{$key}}" {{$patient->shvasagati == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-3 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="parkriti_parikshana">
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
                                             <option value="{{$key}}" {{$patient->parkriti_parikshana == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-lg-4 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">
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
                                             <option value="{{$key}}" {{$patient->examination_by_physician == $key  ? 'selected' : ''}}>{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-4 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">
                                          Prayogashaliya
                                          Parikshana</label>
                                          <textarea
                                             cols="45"
                                             rows="2"
                                             name="prayogashaliya_parikshana"
                                             class="form-control"
                                             value=""
                                             aria-label="prayogashaliya_parikshana"
                                             placeholder="PrayogashaliyaParikshana">{{ $patient->prayogashaliya_parikshana }}</textarea>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-4 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">
                                          Samprapti
                                          Vivarana</label>
                                          <textarea
                                             cols="45"
                                             rows="2"
                                             name="samprapti_vivarana"
                                             class="form-control"
                                             value=""
                                             aria-label="samprapti_vivarana"
                                             placeholder="Samprapti Vivarana" maxlength="100">{{ $patient->samprapti_vivarana }}</textarea>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-4 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">
                                          Vibhedaka
                                          Pariksha</label>
                                          <textarea
                                             cols="45"
                                             rows="2"
                                             name="vibhedaka_pariksha"
                                             class="form-control"
                                             value=""
                                             aria-label="vibhedaka_pariksha"
                                             placeholder="Vibhedaka Pariksha" maxlength="100">{{ $patient->vibhedaka_pariksha }}</textarea>
                                       </div>
                                    </div>
                                    <div
                                       class="col-lg-4 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">
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
                                             placeholder="Roga Vinishchaya-Pramukh Nidana" maxlength="100">{{ $patient->roga_vinishchaya_pramukh_nidana }}</textarea>
                                       </div>
                                    </div>

                                    <div
                                       class="col-md-4">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">
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
                                             placeholder="Chikitsa Kalpana Anupana Sahita" maxlength="100">{{ $patient->chikitsa_kalpana_anupana_sahita }}</textarea>
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
                                             placeholder="Samshodhana Kriyas" maxlength="100">{{ $patient->samshodhana_kriyas }}</textarea>
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
                                             placeholder="Samshamana Kriyas" maxlength="100">{{ $patient->samshamana_kriyas }}</textarea>
                                       </div>
                                    </div>

                                    <div
                                       class="col-lg-4 col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">
                                          Pathya-Apathya
                                          (<span
                                             class="fs-12
                                             text-info"><a target="_blank" href="{{ asset('annexure-file.pdf') }}">Annexure-1</a></span>)</label>
                                          <textarea
                                             cols="45"
                                             rows="2"
                                             name="pathya_apathya"
                                             class="form-control"
                                             value=""
                                             aria-label="pathya_apathya
                                             "
                                             placeholder=" Pathya-Apathya" maxlength="100">{{ $patient->pathya_apathya }}</textarea>
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
                                          @if($shishya->e_sign!='')
                                          <img src="{{ asset('uploads/'.$shishya->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                          <br>
                                             ( @if($shishya->title>0) {{__('phr.titlename')[$shishya->title]}} @endif {{$shishya->firstname.' '.$shishya->middlename.' '.$shishya->lastname}})
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
                                          @if(!empty($guru->id))
                                          @if($guru->e_sign!='')
                                          <img src="{{ asset('uploads/'.$guru->e_sign) }}" alt="E-Sign" width="100px;" height="80px;"><br>
                                          @endif
                                          ( @if($guru->title>0) {{__('phr.titlename')[$guru->title]}} @endif {{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}})
                                          @endif
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-12 p-t-20 text-center">
                              <a href="{{ url('patients/In-Patient') }}" type="button"  class="btn btn-danger waves-effect">Back</a>
                                 <button type="submit" class="btn btn-primary waves-effect m-r-15" >Update Patient Record</button>
                                 
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
@endsection
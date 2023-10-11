@extends('layouts.app-file')
@section('content')
<section class="content">
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
   <div class="container-fluid">
      <div class="block-header">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <ul class="breadcrumb breadcrumb-style ">
                  <li class="breadcrumb-item">
                     <h6 class="page-title"> View Patient History </h6>
                  </li>
                  <li class="breadcrumb-item bcrumb-1">
                     <a href="{{url('/dashboard')}}">
                        <i class="fas fa-home"></i> Home </a>
                  </li>
                  <li class="breadcrumb-item bcrumb-1">
                     <a href="{{url('/new-patient-registration')}}">
                        <i class="breadcrumb-item bcrumb-1"></i> View Patients</a>
                  </li>
                  <li class="breadcrumb-item active"> View Patient History </li>
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
               <ul class="header-dropdown m-r-5">
                  <li>
                     <a href="{{ route('generateGuruPdf',$patient->id) }}"><button type="button" class="btn btn-danger waves-effect" style="margin-top: -15px;"> &nbsp; Print &nbsp;</button></a>
                  </li>
               </ul>
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
               <div class="body" id="printableArea">
                  <div id="wizard_horizontal">
                     <!--<h2>New History Sheet</h2>-->
                     <section>
                        <div class="col-md-12">
                           <div class="card">
                              <form role="form" method="POST" action="{{ route('update.patients') }}" enctype="multipart/form-data">
                                 @csrf
                                 <input type="hidden" name="guru_id" value="{{ $guru->id }}">
                                 <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                                 <div class="card-body">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Name of the Guru<span class="text-danger"></span></label><br>
                                             <label for="example-text-input" class="form-control-label"><b>{{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}}</b></label>

                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Place of the Guru</label><br>
                                             <label for="example-text-input" class="form-control-label"><b>{{$guru->city_name}}<b></label>

                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Name of the Shishya<span class="text-danger"></span></label><br>
                                             <label for="example-text-input" class="form-control-label"><b>{{$shishya->firstname}} {{$shishya->lastname}}</b></label>

                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Date of Report</label><br>
                                             <label for="example-text-input" class="form-control-label"><b><?php echo date('d-m-Y'); ?><b></label>

                                          </div>
                                       </div>
                                    </div>
                                    <hr style="height:2px;">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Name of the Patient<span class="text-danger"></span></label>
                                             <input type="text" name="patient_name" class="form-control" placeholder="Patient Name" aria-label="Email" value="{{ $patient->patient_name }}" onfocus="focused(this)" onfocusout="defocused(this)" maxlength="32" readonly>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Registration No<span class="text-danger"></span></label>
                                             <input type="text" name="registration_no" class="form-control" placeholder="Registration No" aria-label="" value="{{ $patient->registration_no }}" onfocus="focused(this)" onfocusout="defocused(this)" maxlength="32" readonly>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Age<span class="text-danger"></span></label>
                                             <input type="text" name="age" class="form-control" placeholder="Age" aria-label="Phone" value="{{ $patient->age }}" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Registration Date</label>
                                             <input type="text" name="registration_date" class="form-control" placeholder="Date" aria-label="Date" value="{{date('d-m-y',strtotime($patient->registration_date))}}" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Patients Type</label>
                                             <input type="text" class="form-control" name="patient_type" value="{{ $patient->patient_type }}" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                                          </div>
                                       </div>

                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                          <label for="Gender" class="form-control-label">Gender<span class="text-danger"></span></label>
                                          <br>@foreach(__('phr.gender') as $key=>$value)
                                          {{$patient->gender == $key  ? $value : ''}}</option>
                                          @endforeach
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Age Group<span class="text-danger"></span></label>
                                          <br>@foreach(__('phr.age_group') as $key=>$value)
                                          {{$patient->age_group == $key  ? $value : ''}}
                                          @endforeach
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Occupation<span class="text-danger"></span></label>
                                          <br>@foreach(__('phr.occupation') as $key=>$value)
                                          {{$patient->occupation == $key  ? $value : ''}}</option>
                                          @endforeach
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Marital Status<span class="text-danger"></span></label>
                                          <br>@foreach(__('phr.marital_status') as $key=>$value)
                                          {{$patient->marital_status == $key  ? $value : ''}}</option>
                                          @endforeach
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Aasan Sidhi</label>
                                             <input type="text" name="aasan_sidhi" class="form-control" placeholder="Aasan Sidhi" aria-label="Aasan Sidhi" value="{{ $patient->aasan_sidhi }}" onfocus="focused(this)" onfocusout="defocused(this)" maxlength="32" readonly>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Season</label>
                                             <input type="text" name="season" class="form-control" placeholder="Season" aria-label="Aasan
                                             Sidhi" value="{{ $patient->season }}" onfocus="focused(this)" onfocusout="defocused(this)" maxlength="32" readonly>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                          <label for="example-text-in
                                             put" class="form-control-label">Region of patient</label>
                                          <br>@foreach(__('phr.region_of_patient') as $key=>$value)
                                          {{$patient->region_of_patient == $key  ? $value : ''}}</option>
                                          @endforeach
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Address<span class="text-danger"></span></label>
                                             <textarea cols="45" rows="2" name="address" class="form-control" value="{{ $patient->address }}" aria-label="Address" placeholder="Street Address" maxlength="200" readonly>{{ $patient->address }}</textarea>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Main Complaint(As said by patient)</label>
                                             <textarea cols="45" rows="2" name="main_complaintsaid_by_patient" class="form-control" value="{{ $patient->main_complaintsaid_by_patient }}" aria-label="main_complaintsaid_by_patient" placeholder="Main Complaint" maxlength="100" readonly>{{ $patient->main_complaintsaid_by_patient }}</textarea>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Duration</label>
                                             <input type="text" name="said_by_patient_duration" class="form-control" placeholder="Duration" aria-label="Duration" value="{{ $patient->said_by_patient_duration }}" onfocus="focused(this)" onfocusout="defocused(this)" maxlength="32" readonly>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label"> Main Complaint(As said by family member)</label>
                                             <textarea cols="45" rows="2" name="main_complaint_as_said_by_family" class="form-control" value="{{ $patient->main_complaint_as_said_by_family }}" aria-label="main_complaint_as_said_by_family" placeholder="Main Complaint" maxlength="100" readonly>{{ $patient->main_complaint_as_said_by_family }}</textarea>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Duration</label>
                                             <input type="text" name="complaint_as_said_by_family_duration" class="form-control" placeholder="Duration" aria-label="Duration" value="{{ $patient->complaint_as_said_by_family_duration }}" onfocus="focused(this)" onfocusout="defocused(this)" maxlength="50" readonly>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Past Illness</label>
                                             <textarea cols="45" rows="2" name="past_illness" class="form-control" value="{{ $patient->past_illness }}" aria-label="Address" placeholder="Past illness" maxlength="80" readonly>{{ $patient->past_illness }}</textarea>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                                Family
                                                History</label>
                                             <textarea cols="45" rows="2" name="family_history" class="form-control" value="{{ $patient->family_history }}" aria-label="family_history" placeholder="Family History" maxlength="40" readonly>{{ $patient->family_history }}</textarea>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                                Examination of the patient</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row clearfix">
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Skin">Skin</label>
                                          <br>@foreach(__('phr.skin') as $key=>$value)
                                          {{$patient->skin == $key  ? $value : ''}}
                                          @endforeach

                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Nadi">
                                             Nadi</label>
                                          <br>@foreach(__('phr.nadi') as $key=>$value)
                                          {{$patient->nadi == $key  ? $value : ''}}
                                          @endforeach

                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Place">Place</label>
                                          <br>@foreach(__('phr.place') as $key=>$value)
                                          {{$patient->nadi_place == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Nails">
                                             Nails</label>
                                          <br>@foreach(__('phr.nails') as $key=>$value)
                                          {{$patient->nails == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                 </div>
                                 <div class="row clearfix">
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Nails">
                                             Anguli
                                             sandhi</label>
                                          <br>@foreach(__('phr.anguli_sandhi') as $key=>$value)
                                          {{$patient->anguli_sandhi == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Netra">
                                             Netra</label>
                                          <br>@foreach(__('phr.netra') as $key=>$value)
                                          {{$patient->netra == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Adhovartma">
                                             Adhovartma</label>
                                          <br>@foreach(__('phr.adhovartma') as $key=>$value)
                                          {{$patient->adhovartma == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Hastatala">
                                             Hastatala</label>
                                          <br>
                                          @foreach(__('phr.hastatala') as $key=>$value)
                                          {{$patient->hastatala == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                 </div>
                                 <div class="row clearfix">
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Jihwa">
                                             Jihwa</label>
                                          <br>
                                          @foreach(__('phr.jihwa') as $key=>$value)
                                          {{$patient->jihwa == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Aakriti">
                                             Aakriti</label>
                                          <br>
                                          @foreach(__('phr.aakriti') as $key=>$value)
                                          {{$patient->aakriti == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Shabda">
                                             Shabda</label>
                                          <br>
                                          @foreach(__('phr.shabda') as $key=>$value)
                                          {{$patient->shabda == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Koshtha">
                                             Koshtha</label>
                                          <br>
                                          @foreach(__('phr.koshtha') as $key=>$value)
                                          {{$patient->koshtha == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                 </div>
                                 <div class="row clearfix">
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Agni">
                                             Agni</label>
                                          <br>
                                          @foreach(__('phr.agni') as $key=>$value)
                                          {{$patient->agni == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Mala
                                             Pravritti">
                                             Mala
                                             Pravritti</label>
                                          <br>
                                          @foreach(__('phr.mala_pravritti') as $key=>$value)
                                          {{$patient->mala_pravritti == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Mutra
                                             Pravritti">
                                             Mutra
                                             Pravritti</label>
                                          <br>
                                          @foreach(__('phr.mutra_pravritti') as $key=>$value)
                                          {{$patient->mutra_pravritti == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Vyavay
                                             Pravritti">
                                             Vyavay
                                             Pravritti</label>
                                          <br>
                                          @foreach(__('phr.vyavay_pravritti') as $key=>$value)
                                          {{$patient->vyavay_pravritti == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                 </div>
                                 <div class="row clearfix">
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Shukrakshanapravritti">Shukrakshana
                                             pravritti</label>
                                          <br>
                                          @foreach(__('phr.shukrakshana_pravritti') as $key=>$value)
                                          {{$patient->shukrakshana_pravritti == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Aartava
                                             Pravritti
                                             Kala">
                                             Aartava
                                             Pravritti
                                             Kala</label>
                                          <br>
                                          @foreach(__('phr.aartava_pravratti_kala') as $key=>$value)
                                          {{$patient->aartava_pravratti_kala == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Dehoshma">
                                             Dehoshma</label>
                                          <br>
                                          @foreach(__('phr.dehoshma') as $key=>$value)
                                          {{$patient->dehoshma == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Bhara">
                                             Bhara</label>
                                          <br>{{$patient->bhara}}</label>

                                       </div>
                                    </div>
                                 </div>
                                 <div class="row clearfix">
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Raktachapa">
                                             Raktachapa</label>
                                          <br>
                                          @foreach(__('phr.raktachapa') as $key=>$value)
                                          {{$patient->raktachapa == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Hrid
                                             gati">
                                             Hrid
                                             gati</label>
                                          <br>
                                          @foreach(__('phr.hrid_gati') as $key=>$value)
                                          {{$patient->hrid_gati == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="Shvasagati">
                                             Shvasagati</label>
                                          <br>
                                          @foreach(__('phr.shvasagati') as $key=>$value)
                                          {{$patient->shvasagati == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="form-group">
                                          <label for="parkriti_parikshana">
                                             Parkriti
                                             Parikshana</label>
                                          <br>
                                          @foreach(__('phr.parkriti_parikshana') as $key=>$value)
                                          {{$patient->parkriti_parikshana == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                 </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">
                                             Examination
                                             by
                                             Physician</label>
                                          <br>
                                          @foreach(__('phr.examination_by_physician') as $key=>$value)
                                          {{$patient->examination_by_physician == $key  ? $value : ''}}
                                          @endforeach
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                                Prayogashaliya
                                                Parikshana</label>
                                             <textarea cols="45" rows="2" name="prayogashaliya_parikshana" class="form-control" value="" aria-label="prayogashaliya_parikshana" placeholder="PrayogashaliyaParikshana" readonly>{{ $patient->prayogashaliya_parikshana }}</textarea>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                                Samprapti
                                                Vivarana</label>
                                             <textarea cols="45" rows="2" name="samprapti_vivarana" class="form-control" value="" aria-label="samprapti_vivarana" placeholder="Samprapti Vivarana" maxlength="100" readonly>{{ $patient->samprapti_vivarana }}</textarea>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                                Vibhedaka
                                                Pariksha</label>
                                             <textarea cols="45" rows="2" name="vibhedaka_pariksha" class="form-control" value="" aria-label="vibhedaka_pariksha" placeholder="Vibhedaka Pariksha" maxlength="100" readonly>{{ $patient->vibhedaka_pariksha }}</textarea>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                                Roga
                                                Vinishchaya-
                                                Pramukh
                                                Nidana</label>
                                             <textarea cols="45" rows="2" name="roga_vinishchaya_pramukh_nidana" class="form-control" value="" aria-label="roga_vinishchaya" placeholder="Roga Vinishchaya- Nidana" maxlength="100" readonly>{{ $patient->roga_vinishchaya_pramukh_nidana }}</textarea>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                                Chikitsa
                                                Kalpana
                                                Anupana
                                                Sahita</label>
                                             <textarea cols="45" rows="2" name="chikitsa_kalpana_anupana_sahita" class="form-control" value="" aria-label="chikitsa_kalpana_anupana_sahita
                                             " placeholder="Chikitsa Kalpana Anupana Sahita" maxlength="100" readonly>{{ $patient->chikitsa_kalpana_anupana_sahita }}</textarea>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="samshodhana_kriyas" class="form-control-label">Samshodhana
                                                Kriyas</label>
                                             <textarea cols="45" rows="2" name="samshodhana_kriyas" class="form-control" value="" aria-label="samshodhana_kriyas
                                             " placeholder="Samshodhana Kriyas" maxlength="100" readonly>{{ $patient->samshodhana_kriyas }}</textarea>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="samshamana_kriyas" class="form-control-label">Samshamana
                                                Kriyas</label>
                                             <textarea cols="45" rows="2" name="samshamana_kriyas" class="form-control" value="" aria-label="samshamana_kriyas
                                             " placeholder="Samshamana Kriyas" maxlength="100" readonly>{{ $patient->samshamana_kriyas }}</textarea>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">
                                                Pathya-Apathya
                                                (<span class="fs-12
                                             text-info"><a target="_blank" href="{{ asset('annexure-file.pdf') }}">Annexure-1</a></span>)</label>
                                             <textarea cols="45" rows="2" name="pathya_apathya" class="form-control" value="" aria-label="pathya_apathya
                                             " placeholder=" Pathya-Apathya" maxlength="100" readonly>{{ $patient->pathya_apathya }}</textarea>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Shishya's
                                                E-Sign</label><br>
                                             @if($shishya->e_sign!='')
                                             <img src="{{ asset('uploads/'.$shishya->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                             @endif
                                             <br>
                                             ( @if($shishya->title>0) {{__('phr.titlename')[$shishya->title]}} @endif {{$shishya->firstname.' '.$shishya->middlename.' '.$shishya->lastname}})
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Guru's
                                                E-Sign</label><br>
                                             @if(Auth::user()->e_sign!='')
                                             <img src="{{ asset('uploads/'.Auth::user()->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                             @endif
                                             <br>
                                             ( @if(Auth::user()->title>0) {{__('phr.titlename')[Auth::user()->title]}} @endif
                                             {{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}})
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-12 p-t-20 text-center">
                                    <a href="{{ url('guru-patient-list') }}"><button type="button" class="btn btn-danger waves-effect" style="margin-top: -15px;"> &nbsp; Back To Patient Record &nbsp;</button></a>
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
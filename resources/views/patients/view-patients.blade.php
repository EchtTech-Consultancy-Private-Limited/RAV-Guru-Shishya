@extends('layouts.app-file')
@section('content')
<section class="content">
   @if (count($errors) > 0)
   <div class="alert alert-danger">
      Whoops! There were some problems with your input.<br><br>
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
         <div class="col-lg-12 col-sm-12 col-sm-12 col-xs-12">
            <div class="card">
               <div class="header">
                  <h2>Patient History Sheet</h2>

                  <ul class="header-dropdown m-r--5">
                     <li>
                     <a href="{{ route('generatePdf',$patient->id) }}"><button type="button" class="btn print btn-danger waves-effect"> &nbsp; Print &nbsp;</button></a>
                     </li>
                  </ul>
               </div>
               <div class="body" >
                  <table class="mt-5">
                     <thead>
                        <tr>
                              <th>Name of the Guru </th>
                              <th>Place of the Guru </th>
                              <th>Name of the Shishya </th>
                              <th>Date of Report </th>
                        </tr>
                       
                     </thead>

                     <tbody>
                        <tr>
                           <td> @if(!empty($guru->id))
                                          {{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}}
                                          @endif </td>
                           <td>  @if(!empty($guru->id))
                                          {{$guru->city_name}}
                                          @endif </td>
                           <td>  {{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}}
                              </td>
                           <td>  {{date('d-m-Y',strtotime($patient->registration_date))}} </td>
                        </tr>
                     </tbody>
                  </table>

                  <table class="view-table mt-5">
                     <thead>
                        <tr>
                             <th> Title </th>
                             <th> Value </th>
                        </tr>
                       
                     </thead>

                     <tbody>
                        <tr>
                          <td>Name of the Patient </td>
                          <td>{{$patient->patient_name}} </td>
                        </tr>

                        <tr>
                           <td> Patient Registration No</td>
                           <td> {{ $patient->registration_no }}</td>
                        </tr>
                        <tr>
                           <td>Patients Type </td>
                           <td>{{$patient->patient_type}} </td>
                        </tr>
                        <tr>
                           <td>Gender </td>
                           <td>@foreach(__('phr.gender') as $key=>$value)
                                          {{$patient->gender == $key  ? $value : ''}}</option>
                                          @endforeach </td>
                        </tr>
                        <tr>
                           <td>Age Group </td>
                           <td>@foreach(__('phr.age_group') as $key=>$value)
                                          {{$patient->age_group == $key  ? $value : ''}}
                                          @endforeach </td>
                        </tr>
                        <tr>
                           <td>Occupation </td>
                           <td> @foreach(__('phr.occupation') as $key=>$value)
                                          {{$patient->occupation == $key  ? $value : ''}}</option>
                                          @endforeach</td>
                        </tr>
                        <tr>
                           <td> Marital Status</td>
                           <td> @foreach(__('phr.marital_status') as $key=>$value)
                                          {{$patient->marital_status == $key  ? $value : ''}}</option>
                                          @endforeach</td>
                        </tr>
                        <tr>
                           <td> Aasan Sidhi</td>
                           <td> {{$patient->aasan_sidhi}}</td>
                        </tr>
                        <tr>
                           <td> Season</td>
                           <td>{{$patient->season}} </td>
                        </tr>
                        <tr>
                           <td>Region of patient </td>
                           <td> >@foreach(__('phr.region_of_patient') as $key=>$value)
                                          {{$patient->region_of_patient == $key  ? $value : ''}}</option>
                                          @endforeach
</td>
                        </tr>
                        <tr>
                           <td>Address </td>
                           <td>{{$patient->address}} </td>
                        </tr>
                        <tr>
                           <td> Main Complaint(As said by patient) </td>
                           <td>{{$patient->main_complaintsaid_by_patient}} </td>
                        </tr>
                        <tr>
                           <td>Duration </td>
                           <td> {{$patient->said_by_patient_duration}}</td>
                        </tr>
                        <tr>
                           <td> Main Complaint(As said by family member) </td>
                           <td> {{$patient->main_complaint_as_said_by_family}}</td>
                        </tr>
                        <tr>
                           <td> Duration</td>
                           <td> {{$patient->complaint_as_said_by_family_duration}}</td>
                        </tr>
                        <tr>
                           <td>  Past illness</td>
                           <td>{{$patient->past_illness}} </td>
                        </tr>
                        <tr>
                           <td>  Family History</td>
                           <td>{{$patient->family_history}} </td>
                        </tr>
                        <tr>
                           <td> Examination of the patient</td>
                           <td> </td>
                        </tr>
                        <tr>
                           <td> Skin</td>
                           <td>@foreach(__('phr.skin') as $key=>$value)
                                          {{$patient->skin == $key  ? $value : ''}}
                                          @endforeach </td>
                        </tr>
                        <tr>
                           <td> Nadi</td>
                           <td> @foreach(__('phr.nadi') as $key=>$value)
                                          {{$patient->nadi == $key  ? $value : ''}}
                                          @endforeach</td>
                        </tr>
                        <tr>
                           <td>Place </td>
                           <td> @foreach(__('phr.place') as $key=>$value)
                                          {{$patient->nadi_place == $key  ? $value : ''}}
                                          @endforeach</td>
                        </tr>
                        <tr>
                           <td> Nails</td>
                           <td>@foreach(__('phr.nails') as $key=>$value)
                                          {{$patient->nails == $key  ? $value : ''}}
                                          @endforeach </td>
                        </tr>
                        <tr>
                           <td>Anguli  sandhi </td>
                           <td> @foreach(__('phr.anguli_sandhi') as $key=>$value)
                                          {{$patient->anguli_sandhi == $key  ? $value : ''}}
                                          @endforeach</td>
                        </tr>
                        <tr>
                           <td>Netra </td>
                           <td>@foreach(__('phr.netra') as $key=>$value)
                                          {{$patient->netra == $key  ? $value : ''}}
                                          @endforeach </td>
                        </tr>
                        <tr>
                           <td>Adhovartma </td>
                           <td>@foreach(__('phr.adhovartma') as $key=>$value)
                                          {{$patient->adhovartma == $key  ? $value : ''}}
                                          @endforeach </td>
                        </tr>
                        <tr>
                           <td>Hastatala </td>
                           <td>    @foreach(__('phr.hastatala') as $key=>$value)
                                          {{$patient->hastatala == $key  ? $value : ''}}
                                          @endforeach </td>
                        </tr>
                        <tr>
                           <td>Jihwa </td>
                           <td> @foreach(__('phr.jihwa') as $key=>$value)
                                          {{$patient->jihwa == $key  ? $value : ''}}
                                          @endforeach </td>
                        </tr>
                        <tr>
                           <td>Aakriti </td>
                           <td>   @foreach(__('phr.aakriti') as $key=>$value)
                                          {{$patient->aakriti == $key  ? $value : ''}}
                                          @endforeach </td>
                        </tr>
                        <tr>
                           <td>Shabda </td>
                           <td>   @foreach(__('phr.shabda') as $key=>$value)
                                          {{$patient->shabda == $key  ? $value : ''}}
                                          @endforeach </td>
                        </tr>
                        <tr>
                           <td>Koshtha </td>
                           <td> @foreach(__('phr.koshtha') as $key=>$value)
                                          {{$patient->koshtha == $key  ? $value : ''}}
                                          @endforeach </td>
                        </tr>
                        <tr>
                           <td>  Mala
                                             Pravritti</td>
                           <td>   @foreach(__('phr.mala_pravritti') as $key=>$value)
                                          {{$patient->mala_pravritti == $key  ? $value : ''}}
                                          @endforeach</td>
                        </tr>
                        <tr>
                           <td>Mutra
                                             Pravritti </td>
                           <td>   @foreach(__('phr.mutra_pravritti') as $key=>$value)
                                          {{$patient->mutra_pravritti == $key  ? $value : ''}}
                                          @endforeach </td>
                        </tr>
                        <tr>
                           <td>  Vyavay
                                             Pravritti</td>
                           <td> @foreach(__('phr.vyavay_pravritti') as $key=>$value)
                                          {{$patient->vyavay_pravritti == $key  ? $value : ''}}
                                          @endforeach </td>
                        </tr>
                        <tr>
                           <td> Shukrakshana
                                             pravritti</td>
                           <td>  @foreach(__('phr.shukrakshana_pravritti') as $key=>$value)
                                          {{$patient->shukrakshana_pravritti == $key  ? $value : ''}}
                                          @endforeach</td>
                        </tr>
                        <tr>
                           <td>Raktachapa </td>
                           <td>  @foreach(__('phr.raktachapa') as $key=>$value)
                                          {{$patient->raktachapa == $key  ? $value : ''}}
                                          @endforeach
</td>
                        </tr>
                        <tr>
                           <td>Hrid
                                             gati </td>
                           <td> @foreach(__('phr.hrid_gati') as $key=>$value)
                                          {{$patient->hrid_gati == $key  ? $value : ''}}
                                          @endforeach </td>
                        </tr>
                        <tr>
                           <td>Shvasagati </td>
                           <td>  @foreach(__('phr.shvasagati') as $key=>$value)
                                          {{$patient->shvasagati == $key  ? $value : ''}}
                                          @endforeach </td>
                        </tr>
                        <tr>
                           <td>Parkriti
                                             Parikshana </td>
                           <td>  @foreach(__('phr.parkriti_parikshana') as $key=>$value)
                                          {{$patient->parkriti_parikshana == $key  ? $value : ''}}
                                          @endforeach</td>
                        </tr>
                        <tr>
                           <td>  Examination
                                             by
                                             Physician<</td>
                           <td> @foreach(__('phr.examination_by_physician') as $key=>$value)
                                          {{$patient->examination_by_physician == $key  ? $value : ''}}
                                          @endforeach </td>
                        </tr>
                        <tr>
                           <td> Samprapti
                                             Vivarana </td>
                           <td> {{$patient->samprapti_vivarana}}</td>
                        </tr>
                        <tr>
                           <td>Vibhedaka
                                             Pariksha </td>
                           <td> {{$patient->vibhedaka_pariksha}}</td>
                        </tr>
                        <tr>
                           <td>  Roga   Vinishchaya-  Pramukh    Nidana</td>
                           <td>{{$patient->roga_vinishchaya_pramukh_nidana}} </td>
                        </tr>
                        <tr>
                           <td>   Chikitsa
                                             Kalpana
                                             Anupana
                                             Sahita</td>
                           <td> {{$patient->chikitsa_kalpana_anupana_sahita}}</td>
                        </tr>
                        <tr>
                           <td> Samshamana Kriyas</td>
                           <td>{{$patient->samshamana_kriyas}} </td>
                        </tr>
                        <tr>
                           <td>    Pathya-Apathya</td>
                           <td>{{$patient->pathya_apathya}} </td>
                        </tr>
                       
                     </tbody>
                  </table>
                  <div id="wizard_horizontal">
                     <section>
                        <div class="col-md-12">
                           <div class="card">
                              <div class="card-body">

                                 <div class="row clearfix">
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Name of the Guru<span class="text-danger"></span></label><br>
                                          @if(!empty($guru->id))
                                          {{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}}
                                          @endif
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Place of the Guru</label><br>
                                          @if(!empty($guru->id))
                                          {{$guru->city_name}}
                                          @endif
                                       </div>
                                    </div>

                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Name of the Shishya<span class="text-danger"></span></label><br>
                                          {{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}}

                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Date of Report</label><br>
                                          {{date('d-m-Y',strtotime($patient->registration_date))}}
                                       </div>
                                    </div>
                                 </div>

                                 <hr style="height:2px;">
                                 <div class="row clearfix">
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Name of the Patient<span class="text-danger"></span></label>
                                          <br>{{$patient->patient_name}}</label>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Patient Registration No<span class="text-danger"></span></label>
                                          <br>{{ $patient->registration_no }}</label>

                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Patients Type-<span class="text-danger"></span></label>
                                          <br>{{$patient->patient_type}}</label>

                                       </div>
                                    </div>
                                 </div>
                                 <div class="row clearfix">
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Age<span class="text-danger"></span></label>
                                          <br>{{$patient->age}} Yrs.</label>

                                       </div>
                                    </div>
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Registration Date</label>
                                          <br>{{date('d-m-Y',strtotime($patient->registration_date))}}</label>

                                       </div>
                                    </div>
                                 </div>
                                 <div class="row clearfix">
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="Gender" class="form-control-label">Gender<span class="text-danger"></span></label>
                                          <br>@foreach(__('phr.gender') as $key=>$value)
                                          {{$patient->gender == $key  ? $value : ''}}</option>
                                          @endforeach

                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Age Group<span class="text-danger"></span></label>
                                          <br>@foreach(__('phr.age_group') as $key=>$value)
                                          {{$patient->age_group == $key  ? $value : ''}}
                                          @endforeach


                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Occupation<span class="text-danger"></span></label>
                                          <br>@foreach(__('phr.occupation') as $key=>$value)
                                          {{$patient->occupation == $key  ? $value : ''}}</option>
                                          @endforeach


                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Marital Status<span class="text-danger"></span></label>
                                          <br>@foreach(__('phr.marital_status') as $key=>$value)
                                          {{$patient->marital_status == $key  ? $value : ''}}</option>
                                          @endforeach


                                       </div>
                                    </div>

                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Aasan Sidhi</label>
                                          <br>{{$patient->aasan_sidhi}}</label>

                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Season</label>
                                          <br>{{$patient->season}}</label>

                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="example-text-in
                                             put" class="form-control-label">Region of patient</label>
                                          <br>@foreach(__('phr.region_of_patient') as $key=>$value)
                                          {{$patient->region_of_patient == $key  ? $value : ''}}</option>
                                          @endforeach


                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Address<span class="text-danger"></span></label>
                                          <br>{{$patient->address}}</label>

                                       </div>
                                    </div>

                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label"> Main Complaint(As said by patient)</label>
                                          <br>{{$patient->main_complaintsaid_by_patient}}</label>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Duration</label>
                                          <br>{{$patient->said_by_patient_duration}}</label>

                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label"> Main Complaint(As said by family member)</label>
                                          <br>{{$patient->main_complaint_as_said_by_family}}</label>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Duration</label>
                                          <br>{{$patient->complaint_as_said_by_family_duration}}</label>

                                       </div>
                                    </div>


                                 </div>


                                 <div class="row clearfix">
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label"> Past illness</label>
                                          <br>{{$patient->past_illness}}</label>

                                       </div>
                                    </div>

                                    <div class="col-sm-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">
                                             Family
                                             History</label>
                                          <br>{{$patient->family_history}}</label>

                                       </div>
                                    </div>
                                 </div>
                                 <div class="row clearfix">
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label"> Examination of the patient</label>
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
                                 <div class="row clearfix">
                                    <div class="col-sm-6">
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
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">
                                             Prayogashaliya
                                             Parikshana</label>
                                          <br>{{$patient->prayogashaliya_parikshana}}</label>

                                       </div>
                                    </div>
                                 </div>
                                 <div class="row clearfix">
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">
                                             Samprapti
                                             Vivarana</label>
                                          <br>{{$patient->samprapti_vivarana}}</label>

                                       </div>
                                    </div>
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">
                                             Vibhedaka
                                             Pariksha</label>
                                          <br>{{$patient->vibhedaka_pariksha}}</label>

                                       </div>
                                    </div>
                                 </div>
                                 <div class="row clearfix">
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">
                                             Roga
                                             Vinishchaya-
                                             Pramukh
                                             Nidana</label>
                                          <br>{{$patient->roga_vinishchaya_pramukh_nidana}}</label>

                                       </div>
                                    </div>
                                    <div class="col-sm-4">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">
                                             Chikitsa
                                             Kalpana
                                             Anupana
                                             Sahita</label>
                                          <br>{{$patient->chikitsa_kalpana_anupana_sahita}}</label>

                                       </div>
                                    </div>
                                    <div class="col-sm-4">
                                       <div class="form-group">
                                          <label for="samshodhana_kriyas" class="form-control-label">Samshodhana
                                             Kriyas</label>
                                          <br>{{$patient->samshodhana_kriyas}}</label>

                                       </div>
                                    </div>
                                    <div class="col-sm-4">
                                       <div class="form-group">
                                          <label for="samshamana_kriyas" class="form-control-label">Samshamana
                                             Kriyas</label>
                                          <br>{{$patient->samshamana_kriyas}}</label>

                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">
                                             Pathya-Apathya
                                             (<span class="fs-12
                                             text-info"><a target="_blank" href="{{ asset('annexure-file.pdf') }}">Annexure-1</a></span>)</label>
                                          <br>{{$patient->pathya_apathya}}</label>

                                       </div>
                                    </div>


                                 </div>


                                 <div class="row clearfix">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Shishya's
                                             E-Sign</label><br>
                                          @if(Auth::user()->e_sign!='')
                                          <img src="{{ asset('uploads/'.Auth::user()->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                          @endif
                                          <br>
                                          @if(Auth::user()->title>0 && Auth::user()->title != "Select Title")
                                             {{__('phr.titlename.'.Auth::user()->title)}}
                                          @endif
                                          {{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}}
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label">Guru's
                                             E-Sign</label><br>
                                          @if(!empty($guru->id))
                                          @if($guru->e_sign!='')
                                          <img src="{{ asset('uploads/'.$guru->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                          @endif
                                          <br>
                                          @if($guru->title>0) {{__('phr.titlename')[$guru->title]}} @endif {{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}}

                                          @endif
                                       </div>
                                    </div>
                                 </div>
                                 <div id="non-printable" class="col-sm-12 p-t-20 text-left no-printme">
                                    <a href="{{ url('/new-patient-registration') }}"><button type="button" class="btn back btn-danger waves-effect float-right"> &nbsp; Back &nbsp;</button></a>
                                 </div>
                              </div>
                           </div>
                        </div>
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
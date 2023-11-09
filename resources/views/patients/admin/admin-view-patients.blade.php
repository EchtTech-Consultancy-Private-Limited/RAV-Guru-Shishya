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
                     <a href="{{ route('generateAdminPdf',$patient->id) }}"><button type="button" class="btn print waves-effect"> &nbsp; Print &nbsp;</button></a>
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
                                    <table class="view-table">
                                       <h3>Guru Information</h3>
                                       <thead>
                                          <tr>
                                             <th> Name of the Guru</th>
                                             <th> Place of the Guru</th>
                                             <th> Name of the Shishya</th>
                                             <th> Date of Report</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td> {{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}}</td>
                                             <td>{{$guru->city_name}} </td>
                                             <td>{{ $shishya->firstname }} {{ $shishya->lastname }} </td>
                                             <td><?php echo date('d-m-Y'); ?></td>
                                          </tr>
                                       </tbody>
                                    </table>


                                    <table class="view-table">
                                       <h3>Patient Information</h3>
                                       <thead>
                                          <tr>
                                             <th class = "w-25
                                             "> Title</th>
                                             <th> Value</th>


                                          </tr>
                                       </thead>
                                       <tbody>

                                          <tr>
                                            <td>Name of the Patient </td>
                                            <td> {{ $patient->patient_name }}</td>
                                          </tr>
                                          <tr>
                                            <td>Registration No</td>
                                            <td>{{ $patient->registration_no }}</td>
                                          </tr>
                                          <tr>
                                            <td>Age </td>
                                            <td>{{ $patient->age }} </td>
                                          </tr>
                                          <tr>
                                            <td>Registration Date</td>
                                            <td>{{date('d-m-Y',strtotime($patient->registration_date))}} </td>
                                          </tr>

                                          <tr>
                                            <td> Patients Type </td>
                                             <td> {{ $patient->patient_type }}</td>
                                          </tr>
                                          <tr>
                                             <td> Gender </td>
                                              <td>@foreach(__('phr.gender') as $key=>$value)
                                                {{$patient->gender == $key  ? $value : ''}}</option>
                                                @endforeach</td>
                                           </tr>
                                           <tr>
                                             <td> Age Group</td>
                                              <td>@foreach(__('phr.age_group') as $key=>$value)
                                                {{$patient->age_group == $key  ? $value : ''}}
                                                @endforeach</td>
                                           </tr>
                                           <tr>
                                             <td> Occupation</td>
                                              <td>@foreach(__('phr.occupation') as $key=>$value)
                                                {{$patient->occupation == $key  ? $value : ''}}</option>
                                                @endforeach</td>
                                           </tr>
                                           <tr>
                                             <td>Marital Status</td>
                                             <td>@foreach(__('phr.marital_status') as $key=>$value)
                                                {{$patient->marital_status == $key  ? $value : ''}}</option>
                                                @endforeach</td>
                                           </tr>
                                           <tr>
                                             <td>Asan Sidhi</td>
                                             <td>{{ $patient->aasan_sidhi }}</td>
                                           </tr>
                                           <tr>
                                             <td>Season</td>
                                             <td>{{ $patient->season }}</td>
                                           </tr>
                                           <tr>
                                             <td>Region Of Patient</td>
                                             <td>@foreach(__('phr.region_of_patient') as $key=>$value)
                                                {{$patient->region_of_patient == $key  ? $value : ''}}
                                                @endforeach</td>
                                           </tr>
                                           <tr>
                                             <td>Address</td>
                                             <td>{{ $patient->address }}</td>
                                           </tr>
                                           <tr>
                                             <td>Main Complaint(As said by patient)</td>
                                             <td>{{$patient->main_complaintsaid_by_patient}}</td>
                                           </tr>
                                           <tr>
                                             <td>Duration</td>
                                             <td>{{ $patient->said_by_patient_duration }}</td>
                                           </tr>
                                           <tr>
                                             <td>Main Complaint(As said by family member)</td>
                                             <td>{{ $patient->main_complaint_as_said_by_family }}</td>
                                           </tr>
                                           <tr>
                                             <td>Duration</td>
                                             <td>{{ $patient->complaint_as_said_by_family_duration }}</td>
                                           </tr>
                                           <tr>
                                             <td>Past Illness</td>
                                             <td>{{ $patient->past_illness }}</td>
                                           </tr>
                                           <tr>
                                             <td>Family History</td>
                                             <td>{{ $patient->family_history }}</td>
                                           </tr>
                                           <tr>
                                             <td  colspan="2"><h3>Examination Of Patient </h3> </td>

                                           </tr>
                                           <tr>
                                             <td>Skin</td>
                                            <td>@foreach(__('phr.skin') as $key=>$value)
                                             {{$patient->skin == $key  ? $value : ''}}
                                             @endforeach</td>
                                          </tr>
                                          <tr>
                                             <td>Nadi</td>
                                            <td>@foreach(__('phr.nadi') as $key=>$value)
                                             {{$patient->nadi == $key  ? $value : ''}}
                                             @endforeach</td>
                                          </tr>
                                          <tr>
                                             <td>Place</td>
                                            <td>@foreach(__('phr.place') as $key=>$value)
                                             {{$patient->nadi_place == $key  ? $value : ''}}
                                             @endforeach</td>
                                          </tr>
                                          <tr>
                                             <td>Nails</td>
                                            <td>@foreach(__('phr.nails') as $key=>$value)
                                             {{$patient->nails == $key  ? $value : ''}}
                                             @endforeach</td>
                                          </tr>
                                          <tr>
                                             <td>Anguli Sandhi</td>
                                            <td>@foreach(__('phr.anguli_sandhi') as $key=>$value)
                                             {{$patient->anguli_sandhi == $key  ? $value : ''}}
                                             @endforeach</td>
                                          </tr>
                                          <tr>
                                             <td>Netra</td>
                                            <td>@foreach(__('phr.netra') as $key=>$value)
                                             {{$patient->netra == $key  ? $value : ''}}
                                             @endforeach</td>
                                          </tr>
                                          <tr>
                                             <td>Adhovartma</td>
                                            <td>@foreach(__('phr.adhovartma') as $key=>$value)
                                             {{$patient->adhovartma == $key  ? $value : ''}}
                                             @endforeach</td>
                                          </tr>
                                          <tr>
                                             <td>Hastatla</td>
                                            <td> @foreach(__('phr.hastatala') as $key=>$value)
                                             {{$patient->hastatala == $key  ? $value : ''}}
                                             @endforeach</td>
                                          </tr>
                                          <tr>
                                             <td>Jihwa</td>
                                            <td>@foreach(__('phr.jihwa') as $key=>$value)
                                             {{$patient->jihwa == $key  ? $value : ''}}
                                             @endforeach</td>
                                          </tr>
                                          <tr>
                                             <td> Aakriti</td>
                                            <td>@foreach(__('phr.aakriti') as $key=>$value)
                                             {{$patient->aakriti == $key  ? $value : ''}}
                                             @endforeach</td>
                                          </tr>
                                          <tr>
                                             <td>Shabda</td>
                                            <td>@foreach(__('phr.shabda') as $key=>$value)
                                             {{$patient->shabda == $key  ? $value : ''}}
                                             @endforeach</td>
                                          </tr>
                                          <tr>
                                             <td>Koshtha</td>
                                            <td> @foreach(__('phr.koshtha') as $key=>$value)
                                             {{$patient->koshtha == $key  ? $value : ''}}
                                             @endforeach</td>
                                          </tr>
                                          <tr>
                                             <td>Agni</td>
                                            <td> @foreach(__('phr.agni') as $key=>$value)
                                             {{$patient->agni == $key  ? $value : ''}}
                                             @endforeach</td>
                                          </tr>

                                          <tr>
                                             <td>Mala Pravritti</td>
                                            <td> @foreach(__('phr.mala_pravritti') as $key=>$value)
                                             {{$patient->mala_pravritti == $key  ? $value : ''}}
                                             @endforeach</td>
                                          </tr>
                                          <tr>
                                             <td>Mutra Pravritti</td>
                                            <td>  @foreach(__('phr.mutra_pravritti') as $key=>$value)
                                             {{$patient->mutra_pravritti == $key  ? $value : ''}}
                                             @endforeach</td>
                                          </tr>
                                          <tr>
                                             <td>Vyavay Pravritti</td>
                                            <td>  @foreach(__('phr.vyavay_pravritti') as $key=>$value)
                                             {{$patient->vyavay_pravritti == $key  ? $value : ''}}
                                             @endforeach
                                          </td>
                                          </tr>
                                          <tr>
                                             <td>Shukrakshana Pravritti</td>
                                            <td>  @foreach(__('phr.shukrakshana_pravritti') as $key=>$value)
                                             {{$patient->shukrakshana_pravritti == $key  ? $value : ''}}
                                             @endforeach
                                          </td>
                                          </tr>
                                          <tr>
                                             <td>Aartava Pravritti Kala </td>
                                            <td>   @foreach(__('phr.aartava_pravratti_kala') as $key=>$value)
                                             {{$patient->aartava_pravratti_kala == $key  ? $value : ''}}
                                             @endforeach
                                          </td>
                                          </tr>
                                          <tr>
                                             <td>Dehoshma </td>
                                            <td>   @foreach(__('phr.dehoshma') as $key=>$value)
                                             {{$patient->dehoshma == $key  ? $value : ''}}
                                             @endforeach
                                          </td>
                                          </tr>
                                          <tr>
                                             <td>Raktachapa </td>
                                            <td>@foreach(__('phr.raktachapa') as $key=>$value)
                                             {{$patient->raktachapa == $key  ? $value : ''}}
                                             @endforeach
                                          </td>
                                          </tr>
                                          <tr>
                                             <td>Hrid Gati </td>
                                            <td> @foreach(__('phr.hrid_gati') as $key=>$value)
                                             {{$patient->hrid_gati == $key  ? $value : ''}}
                                             @endforeach
                                          </td>
                                          </tr>
                                          <tr>
                                             <td>Shvasagati </td>
                                            <td>@foreach(__('phr.shvasagati') as $key=>$value)
                                             {{$patient->shvasagati == $key  ? $value : ''}}
                                             @endforeach
                                          </td>
                                          </tr>
                                          <tr>
                                             <td>Parkriti Parikshana </td>
                                            <td>@foreach(__('phr.parkriti_parikshana') as $key=>$value)
                                             {{$patient->parkriti_parikshana == $key  ? $value : ''}}
                                             @endforeach
                                          </td>
                                          </tr>
                                          <tr>
                                             <td>Examination
                                                by
                                                Physician</td>
                                                <td>
                                                   @foreach(__('phr.examination_by_physician') as $key=>$value)
                                                   {{$patient->examination_by_physician == $key  ? $value : ''}}
                                                   @endforeach
                                                </td>
                                          </tr>

                                           <tr>
                                             <td>Prayogashaliya Parikshana
                                             </td>
                                             <td>{{ $patient->prayogashaliya_parikshana }}</td>
                                           </tr>

                                           <tr>
                                             <td>
                                                Samprapti
                                                Vivarana
                                             </td>
                                             <td>
                                                {{ $patient->samprapti_vivarana }}
                                             </td>
                                           </tr>
                                           <tr>
                                             <td>
                                                Vibhedaka Pariksha
                                             </td>
                                             <td>
                                                {{ $patient->vibhedaka_pariksha }}
                                             </td>
                                           </tr>
                                           <tr>
                                             <td>Roga
                                                Vinishchaya-
                                                Pramukh
                                                Nidana</td>
                                             <td>
                                                {{ $patient->roga_vinishchaya_pramukh_nidana }}
                                             </td>
                                           </tr>
                                           <tr>
                                             <td>Chikitsa Kalpana Anupana Sahita</td>
                                             <td>
                                                {{ $patient->chikitsa_kalpana_anupana_sahita }}
                                             </td>
                                           </tr>
                                           <tr>
                                             <td>Samshodhana Kriyas</td>
                                             <td>
                                                {{ $patient->samshodhana_kriyas }}
                                             </td>
                                           </tr>
                                           <tr>
                                             <td>Samshamana Kriyas</td>
                                             <td>
                                                {{ $patient->samshamana_kriyas }}
                                             </td>
                                           </tr>
                                           <tr>
                                             <td>Pathya-Apathya
                                                <a target="_blank" href="{{ asset('annexure-file.pdf') }}">(Annexure-1)</a>
                                             </td>
                                             <td>
                                                {{ $patient->pathya_apathya }}
                                             </td>
                                           </tr>

                                              <!-- ******************addedd new fild **************** -->
                    <tr>
                           <td>  Soft drink/Peya Padarth</td>
                           <td>   @foreach(__('phr.soft_drink') as $key=>$value)
                                    {{@$patient->soft_drink == $key  ? $value : ''}}
                                 @endforeach </td>
                        </tr>

                        <tr>
                           <td>  Madhyahan Bhojana</td>
                           <td>  @foreach(__('phr.madhyahan_bhojana') as $key=>$value)
                                    {{@$patient->madhyahan_bhojana == $key  ? $value : ''}}      
                                 @endforeach </td>
                        </tr>
                        <tr>
                           <td> Prataraasha</td>
                        <td>  @foreach(__('phr.prataraasha') as $key=>$value)
                                 {{@$patient->prataraasha == $key  ? $value : ''}} 
                              @endforeach</td>
                        </tr>
                        <tr>
                           <td> Pulses</td>
                           <td>    @foreach(__('phr.pulses') as $key=>$value)
                                       {{@$patient->pulses == $key  ? $value : ''}}
                                    @endforeach</td>
                        </tr>
                        <tr>
                           <td> Pulpy vegetables</td>
                           <td>   @foreach(__('phr.pulpy_vegetables') as $key=>$value)
                           {{@$patient->pulpy_vegetables == $key  ? $value : ''}}
                                 @endforeach</td>
                        </tr>
                        <tr>
                           <td>Oil/Tail</td>
                           <td> @foreach(__('phr.oil_tail') as $key=>$value)
                                    {{@$patient->oil_tail == $key  ? $value : ''}}
                                 @endforeach </td>
                        </tr>
                        <tr>
                           <td> Afternoon Fruit</td>
                           <td>  @foreach(__('phr.afternoon_fruit') as $key=>$value)
                                     {{@$patient->afternoon_fruit == $key  ? $value : ''}}
                                 @endforeach</td>
                        </tr>
                        <tr>
                        <td>Evening Meals</td>
                           <td>{{ @$patient->evening_meals }} </td>
                        </tr>
                        <tr>
                           <td>  Bed time </td>
                           <td>  @foreach(__('phr.bed_time') as $key=>$value)
                                    {{@$patient->bed_time == $key  ? $value : ''}}
                                 @endforeach</td>
                        </tr>

                        <!-- ******************addedd new fild **************** -->

                                       </tbody>
                                    </table>

                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Shishya's
                                                E-Sign</label><br>
                                             @if($shishya->e_sign!='')
                                             <img src="{{ asset('uploads/'.$shishya->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                             @endif
                                             <br>
                                             @if($shishya->title>0 && $shishya->title != "Select Title")
                                                   {{__('phr.titlename')[$shishya->title]}}
                                             @endif
                                             {{$shishya->firstname.' '.$shishya->middlename.' '.$shishya->lastname}}
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="example-text-input" class="form-control-label">Guru's
                                                E-Sign</label><br>
                                             @if($guru->e_sign!='')
                                             <img src="{{ asset('uploads/'.$guru->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                             @endif
                                             <br>
                                             @if($guru->title>0) {{__('phr.titlename')[$guru->title]}} @endif {{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}}
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-12  text-center">

                                    <a href="{{ url('admin-patient-list') }}" type="button" class="btn back  waves-effect submit float-right">Back To Patient Record</a>
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
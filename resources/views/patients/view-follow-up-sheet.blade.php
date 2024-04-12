@extends('layouts.app-file')
@section('content')
<section class="content view-follow-up-sheet">
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
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h6 class="page-title"> View Follow Up </h6>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{url('/dashboard')}}">
                                <i class="fas fa-home"></i> Home </a>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{url('/follow-up-patients')}}">
                                <i class="breadcrumb-item bcrumb-1"></i> Follow up Patient</a>
                        </li>
                        <li class="breadcrumb-item active"> View Follow Up </li>
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

                    <div class="body p-0 ">
                        <div id="wizard_horizontal " class="card-body">
                            <section>

                                <div class="col-sm-12 pb-0">
                                    <div class="row view-follow-sheet">
                                        <div class="col-md-6">
                                        <div class="header p-0">
                                        <h2 class=''>View Follow Up </h2>

                                    </div>
                                        </div>
                                        <div class="col-md-6">
                                        <a href="{{ url('/follow-up-patients') }}"><button type="button"
                                            class="btn back btn-danger waves-effect float-right"> &nbsp; Back &nbsp;</button></a>
                                        </div>
                                    </div>

                                <table class="view-table">
                                    <h3>Basic Information</h3>
                                    <thead>
                                       <tr>
                                          <th class="w-25"> Title</th>
                                          <th> Value</th>

                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>Patient Registration No. </td>
                                          <td>{{$patient->registration_no}} </td>

                                       </tr>

                                       <tr>
                                        <td> Patient Name</td>
                                        <td>{{$patient->patient_name}} </td>
                                       </tr>
                                       <tr>
                                        <td> Date of Follow up</td>
                                        <td> @if(!empty($data->follow_up_date)){{date('d-m-Y',strtotime($data->follow_up_date))}}@endif</td>
                                       </tr>
                                       <tr>
                                        <td> Progress Duration</td>
                                        <td>@if(!empty($data->report_type)){{$data->report_type}}@endif </td>
                                       </tr>
                                       <tr>
                                        <td>Progress </td>
                                        <td> @if(!empty($data->progress)){{$data->progress}}@endif</td>
                                       </tr>
                                       <tr>
                                        <td>Treatment/Therapies </td>
                                        <td>@if(!empty($data->treatment)){{$data->treatment}}@endif </td>
                                       </tr>

                                    </tbody>
                                 </table>



                                </div>
                        </div>

                        <div class="col-sm-12">

                            <div class="card mb-0 view-follow-up-sheet">

                                <form role="form" method="POST" action="{{ url('/save-follow-up-remark') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if(!empty($data->id))
                                    <input type="hidden" name="followup_id" value="{{ $data->id }}">
                                    @endif
                                    @if(!empty($guru->id))
                                    <input type="hidden" name="guru_id" value="{{ $guru->id }}">
                                    @endif
                                    <input type="hidden" name="patient_id" value="{{$patient->id }}">
                                    <input type="hidden" name="shishya_id" value="{{$shishya->id }}">
                                    <input type="hidden" name="registration_no" value="{{$patient->registration_no }}">

                                    <div class="card-body">
                                    <div class="header p-0">
                                <h2 class=''>Add Remark </h2>
                            </div>
                                        <div class="row clearfix">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="remark" class="form-control-label">Remark<span
                                                                class="text-danger"></span></label>
                                                        <textarea cols="45" rows="1" name="remark" class="form-control"
                                                            value="" aria-label="remark"
                                                            placeholder="Please enter remark" maxlength="200"
                                                            required>{{ old('remark') }}</textarea>
                                                        @error('remark')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            @if(Auth::user()->user_type==1 || Auth::user()->user_type==4)

                                              <div class="col-lg-3 col-xxl-2 col-xl-3  col-md-4 col-6">
                                                  <div class="form-group">
                                                      <div class="form-line">
                                                          <label for="remark" class="form-control-label">Remark
                                                              Type<span class="text-danger"></span></label>
                                                          <select name="remark_type" id="remark_type"
                                                              class="form-control" required>
                                                              <option value="1" @if(old('remark_type') &&
                                                                  old('remark_type')=='1' ) SELECTED @endif>To
                                                                  change report</option>
                                                              <option value="2" @if(old('remark_type') &&
                                                                  old('remark_type')=='2' ) SELECTED @endif>For
                                                                  reference only</option>
                                                          </select>

                                                          @error('remark_type')
                                                          <span class="invalid-feedback" role="alert">
                                                              <strong>{{ $message }}</strong>
                                                          </span>
                                                          @enderror
                                                      </div>
                                                  </div>
                                              </div>
                                              @endif
                                            @if(Auth::user()->user_type==1 || Auth::user()->user_type==3 || Auth::user()->user_type==4)
                                            <input type="hidden" name="send_to" id="send_to" value="2">

                                            @else

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label for="remark" class="form-control-label">Send To<span
                                                                    class="text-danger"></span></label>
                                                            <select name="send_to" id="send_to" class="form-control"
                                                                required>
                                                                <option value="3" @if(old('send_to') &&
                                                                    old('send_to')=='3' ) SELECTED @endif>Shishya
                                                                </option>
                                                                <option value="1" @if(old('send_to') &&
                                                                    old('send_to')=='1' ) SELECTED @endif>Admin</option>
                                                            </select>

                                                            @error('send_to')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                    <div class="row clearfix">
                                                        <div class="col-sm-12 text-left">

                                                            <button type="submit"
                                                                class="btn send  waves-effect m-r-15"
                                                                @if((Auth::user()->user_type==3 &&
                                                                $data->send_to_shishya=='0') ||
                                                                (Auth::user()->user_type==2 &&
                                                                $data->send_to_guru=='0')) disabled @else
                                                                onclick="return confirm_remark_send()" @endif >
                                                                @if((Auth::user()->user_type==3) ||
                                                                (Auth::user()->user_type==1 || Auth::user()->user_type==4))Send to Guru
                                                                @elseif(Auth::user()->user_type==2)Send @endif</button>

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>




                        <div class="card-body">

                            <div calss="row">
                                <div class="col-sm-12 remarks">
                                    <span>Remarks </span>
                                    <i class="fa fa-plus fa-x" style="float:right;clear:none;"></i>
                                </div>
                            </div>
                            <div class="card-body3" style="display:none;">

                                <div class="row clearfix">

                                    <div class="col-sm-12">


                                        <div class="card mb-0">

                                            <div class="body p-0">
                                                <div class="table-responsive">
                                                    <table class="table table-hover js-basic-example" id="data_table">
                                                        <thead>
                                                            <tr>
                                                                <th class="center">S.No<i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                                                <th class="center"> Send By <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                                                <th class="center"> Send To <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                                                <th class="center"> Remarks <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                                                <th class="center"> Date <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($remarks as $k=>$remark)
                                                            <tr class="odd gradeX">
                                                                <td class="center">{{($k+1)}}</td>

                                                                <td class="center">@if($remark->send_by=='2')Guru
                                                                    @elseif($remark->send_by=='3')Shishya
                                                                    @elseif($remark->send_by=='1')Admin @endif</td>
                                                                <td class="center">@if($remark->send_to=='2')Guru
                                                                    @elseif($remark->send_to=='3')Shishya
                                                                    @elseif($remark->send_to=='1')Admin @endif</td>
                                                                <td class="center">{{$remark->remarks}}</td>
                                                                <td class="center">
                                                                    {{date('d-m-Y',strtotime($remark->created_at))}}
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>

                                                    </table>


                                                </div>




                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <br>




                            <div>
                            <div calss="row">
                                <div class="col-sm-12 follow_up">
                                    <span>Patient History Sheet </span>
                                    <i class="fa fa-plus fa-x" style="float:right;clear:none;"></i>
                                </div>
                            </div>
                            <div class="card-body2" style="display:none;">
                            <h3>Guru Information</h3>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name of the Guru</th>
                                        <th>Place of the Guru</th>
                                        <th>Name of the
                                                Shishya</th>
                                        <th>
                                        Date of
                                                Report
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>  @if(!empty($guru->id))
                                           {{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}}
                                            @endif
                                        </td>
                                            <td>
                                            @if(!empty($guru->id))
                                            <label for="example-text-input"
                                                class="form-control-label"><b>{{$guru->city_name}}</b></label>
                                            @endif
                                            </td>
                                            <td>
                                            {{$shishya->firstname.' '.$shishya->lastname}}
                                            </td>
                                            <td>
                                            <?php echo date('d-m-Y'); ?>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>

                            <h3>Patient Information</h3>

                            <table class="view-table" >

                                <!-- <thead>
                                <tr>
                                    <td colspan="2" class="tabel-heading"> <h3>Patient Information</h3></td>
                                </tr> -->
                                    <tr>
                                     <th class= "w-25">Title</th>
                                     <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                          <td class= "title"> Name of the
                                                Patient</td>
                                          <td> {{$patient->patient_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class= "title"> Patient Registration
                                                No</td>
                                            <td> {{$patient->registration_no}}</td>
                                        </tr>
                                        <tr>
                                            <td class= "title"> Age</td>
                                            <td>{{$patient->age}} </td>
                                        </tr>
                                        <tr>
                                            <td class= "title">Registration Date</td>
                                            <td>{{date('d-m-Y',strtotime($patient->registration_date))}} </td>
                                        </tr>
                                        <tr>
                                            <td>Patients Type </td>
                                            <td>{{@$patient->patient_type}} </td>
                                        </tr>
                                        <tr>
                                            <td class= "title">Gender </td>
                                            <td>  @foreach(__('phr.gender') as $key=>$value)
                                                    {{$patient->gender == $key  ? $value : ''}}</option>
                                                    @endforeach</td>
                                        </tr>
                                        <tr>
                                            <td class= "title"> Age Group</td>
                                            <td>  @foreach(__('phr.age_group') as $key=>$value)
                                                    {{$patient->age_group == $key  ? $value : ''}}
                                                    @endforeach </td>
                                        </tr>
                                        <tr>
                                            <td class= "title"> Occupation</td>
                                            <td>  @foreach(__('phr.occupation') as $key=>$value)
                                                    {{$patient->occupation == $key  ? $value : ''}}</option>
                                                    @endforeach</td>
                                        </tr>
                                        <tr>
                                            <td class= "title">Marital
                                                Status </td>
                                            <td>     @foreach(__('phr.marital_status') as $key=>$value)
                                                    {{$patient->marital_status == $key  ? $value : ''}}</option>
                                                    @endforeach </td>
                                        </tr>
                                        <tr>
                                            <td class= "title">Aasan
                                                Sidhi </td>
                                            <td> {{$patient->aasan_sidhi}}</td>
                                        </tr>
                                        <tr>
                                            <td class= "title">Season </td>
                                            <td> {{$patient->season}}</td>
                                        </tr>
                                        <tr>
                                            <td class= "title">Region of patient </td>
                                            <td>   @foreach(__('phr.region_of_patient') as $key=>$value)
                                                    {{$patient->region_of_patient == $key  ? $value : ''}}</option>
                                                    @endforeach</td>
                                        </tr>
                                        <tr>
                                            <td>Address </td>
                                            <td> {{$patient->address}}</td>
                                        </tr>
                                        <tr>
                                            <td> Main
                                                Complaint(As said by family member)</td>
                                            <td>{{$patient->main_complaint_as_said_by_family}} </td>
                                        </tr>
                                        <tr>
                                            <td>Duration </td>
                                            <td>{{$patient->complaint_as_said_by_family_duration}} </td>
                                        </tr>
                                        <tr>
                                            <td>Past
                                                illness </td>
                                            <td> {{$patient->past_illness}}</td>
                                        </tr>
                                        <tr>
                                            <td>Main
                                                Complaint(As said by patient) </td>
                                            <td>{{$patient->main_complaintsaid_by_patient}} </td>
                                        </tr>
                                        <tr>
                                            <td>Duration </td>
                                            <td> {{$patient->said_by_patient_duration}}</td>
                                        </tr>
                                       
                                        <tr>
                                            <td>   Family
                                                History </td>
                                            <td>{{$patient->family_history}} </td>
                                        </tr>
                                        <tr>
                                            <td colspan= "2"> Examination
                                                of
                                                the
                                                patient </td>

                                        </tr>
                                        <tr>
                                        <td> Skin</td>
                                        <td>@foreach(__('phr.skin') as $key=>$value)
                                            {{@$patient->skin == $key  ? $value : ''}}
                                            @endforeach </td>
                                    </tr>
                                    <tr>
                                        <td> Nadi</td>
                                        <td> @foreach(__('phr.nadi') as $key=>$value)
                                            {{@$patient->nadi == $key  ? $value : ''}}
                                            @endforeach</td>
                                    </tr>
                                    <tr>
                                        <td>Place </td>
                                        <td> @foreach(__('phr.place') as $key=>$value)
                                            {{@$patient->nadi_place == $key  ? $value : ''}}
                                            @endforeach</td>
                                    </tr>
                                    <tr>
                                        <td> Nails</td>
                                        <td>@foreach(__('phr.nails') as $key=>$value)
                                            {{@$patient->nails == $key  ? $value : ''}}
                                            @endforeach </td>
                                    </tr>
                                    <tr>
                                        <td>Anguli sandhi </td>
                                        <td> @foreach(__('phr.anguli_sandhi') as $key=>$value)
                                            {{@$patient->anguli_sandhi == $key  ? $value : ''}}
                                            @endforeach</td>
                                    </tr>
                                    <tr>
                                        <td>Netra </td>
                                        <td>@foreach(__('phr.netra') as $key=>$value)
                                            {{@$patient->netra == $key  ? $value : ''}}
                                            @endforeach </td>
                                    </tr>
                                    <tr>
                                        <td>Adhovartma </td>
                                        <td>@foreach(__('phr.adhovartma') as $key=>$value)
                                            {{@$patient->adhovartma == $key  ? $value : ''}}
                                            @endforeach </td>
                                    </tr>
                                    <tr>
                                        <td>Hastatala </td>
                                        <td> @foreach(__('phr.hastatala') as $key=>$value)
                                            {{@$patient->hastatala == $key  ? $value : ''}}
                                            @endforeach </td>
                                    </tr>
                                    <tr>
                                        <td>Jihwa </td>
                                        <td> @foreach(__('phr.jihwa') as $key=>$value)
                                            {{@$patient->jihwa == $key  ? $value : ''}}
                                            @endforeach </td>
                                    </tr>
                                    <tr>
                                        <td>Aakriti </td>
                                        <td> @foreach(__('phr.aakriti') as $key=>$value)
                                            {{@$patient->aakriti == $key  ? $value : ''}}
                                            @endforeach </td>
                                    </tr>
                                    <tr>
                                        <td>Shabda </td>
                                        <td> @foreach(__('phr.shabda') as $key=>$value)
                                            {{@$patient->shabda == $key  ? $value : ''}}
                                            @endforeach </td>
                                    </tr>

                                    <tr>
                                        <td>Koshtha </td>
                                        <td> @foreach(__('phr.koshtha') as $key=>$value)
                                            {{@$patient->koshtha == $key  ? $value : ''}}
                                            @endforeach </td>
                                    </tr>
                                    <!-- ******************************* -->
                                    <tr>
                                        <td>Agni </td>
                                        <td> @foreach(__('phr.agni') as $key=>$value)
                                            {{@$patient->agni == $key  ? $value : ''}}
                                            @endforeach </td>
                                    </tr>
                                    <tr>
                                        <td> Mala
                                            Pravritti</td>
                                        <td> @foreach(__('phr.mala_pravritti') as $key=>$value)
                                            {{@$patient->mala_pravritti == $key  ? $value : ''}}
                                            @endforeach</td>
                                    </tr>
                                    <tr>
                                        <td>Mutra
                                            Pravritti </td>
                                        <td> @foreach(__('phr.mutra_pravritti') as $key=>$value)
                                            {{@$patient->mutra_pravritti == $key  ? $value : ''}}
                                            @endforeach </td>
                                    </tr>
                                    <tr>
                                        <td> Vyavay
                                            Pravritti</td>
                                        <td> @foreach(__('phr.vyavay_pravritti') as $key=>$value)
                                            {{@$patient->vyavay_pravritti == $key  ? $value : ''}}
                                            @endforeach </td>
                                    </tr>
                                    <tr>
                                        <td> Shukrakshana
                                            pravritti</td>
                                        <td> @foreach(__('phr.shukrakshana_pravritti') as $key=>$value)
                                            {{@$patient->shukrakshana_pravritti == $key  ? $value : ''}}
                                            @endforeach</td>
                                    </tr>
                                    <tr>
                                        <td>Artava Pravritti Kala </td>
                                        <td> @foreach(__('phr.aartava_pravratti_kala') as $key=>$value)
                                            {{@$patient->aartava_pravratti_kala == $key  ? $value : ''}}
                                            @endforeach </td>
                                    </tr>
                                    <tr>
                                        <td>Dehoshma </td>
                                        <td> @foreach(__('phr.dehoshma') as $key=>$value)
                                            {{@$patient->dehoshma == $key  ? $value : ''}}
                                            @endforeach </td>
                                    </tr>
                                    <tr>
                                        <td>Bhara</td>
                                        <td> {{@$patient->bhara }} </td>
                                    </tr>
                                    <tr>
                                        <td>Raktachapa </td>
                                        <td> @foreach(__('phr.raktachapa') as $key=>$value)
                                            {{@$patient->raktachapa == $key  ? $value : ''}}
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Hrid
                                            gati </td>
                                        <td> @foreach(__('phr.hrid_gati') as $key=>$value)
                                            {{@$patient->hrid_gati == $key  ? $value : ''}}
                                            @endforeach </td>
                                    </tr>
                                    <tr>
                                        <td>Shvasagati </td>
                                        <td> @foreach(__('phr.shvasagati') as $key=>$value)
                                            {{@$patient->shvasagati == $key  ? $value : ''}}
                                            @endforeach </td>
                                    </tr>
                                    <tr>
                                        <td>Parkriti
                                            Parikshana </td>
                                        <td> @foreach(__('phr.parkriti_parikshana') as $key=>$value)
                                            {{@$patient->parkriti_parikshana == $key  ? $value : ''}}
                                            @endforeach</td>
                                    </tr>
                                    <tr>
                                        <td> Examination by Physician</td>
                                        <td> @foreach(__('phr.examination_by_physician') as $key=>$value)
                                            {{@$patient->examination_by_physician == $key  ? $value : ''}}
                                            @endforeach </td>
                                    </tr>
                                    <tr>
                                        <td>Prayogshaliya Parikshana </td>
                                        <td>{{@$patient->prayogashaliya_parikshana }}</td>
                                    </tr>
                                    <tr>
                                        <td> Samprapti
                                            Vivarana </td>
                                        <td> {{@$patient->samprapti_vivarana}}</td>
                                    </tr>
                                    <tr>
                                        <td>Vibhedaka
                                            Pariksha </td>
                                        <td> {{@$patient->vibhedaka_pariksha}}</td>
                                    </tr>
                                    <tr>
                                        <td>Roga Vinishchaya Pramukh Nidana </td>
                                        <td> {{@$patient->roga_vinishchaya_pramukh_nidana }}</td>
                                    </tr>
                                    <tr>
                                        <td> Chikitsa
                                            Kalpana
                                            Anupana
                                            Sahita</td>
                                        <td> {{@$patient->chikitsa_kalpana_anupana_sahita}}</td>
                                    </tr>

                                    <tr>
                                        <td>Samshodhana Kriyas </td>
                                        <td> {{@$patient->samshodhana_kriyas }} </td>
                                    </tr>
                                    <tr>
                                        <td>Samshamana Kriyas </td>
                                        <td> {{@$patient->samshamana_kriyas }} </td>
                                    </tr>
                                    <tr>
                                        <td> Pathya-Apathya <span class="fs-12
                                             text-info"><a target="_blank"
                                                    href="{{ asset('annexure-file.pdf') }}">Annexure-1</a></span></td>
                                        <td>{{@$patient->pathya_apathya}} </td>
                                    </tr>

                                    <!-- ******************************* -->
                                 
                                   
                                    <!-- ******************addedd new fild **************** -->
                                    <tr>
                                        <td> Soft drink/Peya Padarth</td>
                                        <td> @foreach(__('phr.soft_drink') as $key=>$value)
                                            {{@$patient->soft_drink == $key  ? $value : ''}}
                                            @endforeach </td>
                                    </tr>

                                    <tr>
                                        <td> Madhyahan Bhojana</td>
                                        <td> @foreach(__('phr.madhyahan_bhojana') as $key=>$value)
                                            {{@$patient->madhyahan_bhojana == $key  ? $value : ''}}
                                            @endforeach </td>
                                    </tr>
                                    <tr>
                                        <td> Prataraasha</td>
                                        <td> @foreach(__('phr.prataraasha') as $key=>$value)
                                            {{@$patient->prataraasha == $key  ? $value : ''}}
                                            @endforeach</td>
                                    </tr>
                                    <tr>
                                        <td> Pulses</td>
                                        <td> @foreach(__('phr.pulses') as $key=>$value)
                                            {{@$patient->pulses == $key  ? $value : ''}}
                                            @endforeach</td>
                                    </tr>
                                    <tr>
                                        <td> Pulpy vegetables</td>
                                        <td> @foreach(__('phr.pulpy_vegetables') as $key=>$value)
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
                                        <td> @foreach(__('phr.afternoon_fruit') as $key=>$value)
                                            {{@$patient->afternoon_fruit == $key  ? $value : ''}}
                                            @endforeach</td>
                                    </tr>
                                    <tr>
                                        <td>Evening Meals</td>
                                        <td>{{ @$patient->evening_meals }} </td>
                                    </tr>
                                    <tr>
                                        <td> Bed time </td>
                                        <td> @foreach(__('phr.bed_time') as $key=>$value)
                                            {{@$patient->bed_time == $key  ? $value : ''}}
                                            @endforeach</td>
                                    </tr>
                        <!-- ******************addedd new fild **************** -->
                                        <!-- <tr>
                                            <td>Shishya's
                                                E-Sig </td>
                                            <td>  @if(!empty($shishya->id))
                                            @if($shishya->e_sign!='')
                                            <img src="{{ asset('uploads/'.$shishya->e_sign) }}" alt="E-Sign"
                                                width="100px;" height="80px;">
                                            @endif
                                            <br>
                                            (@if($shishya->title>0) {{__('phr.titlename')[$shishya->title]}} @endif
                                            {{$shishya->firstname.' '.$shishya->middelname.' '.$shishya->lastname}})
                                            @endif </td>
                                        </tr>
                                        <tr>
                                            <td>Guru's
                                                E-Sign </td>
                                            <td>@if(!empty($guru->id))
                                            @if($guru->e_sign!='')
                                            <img src="{{ asset('uploads/'.$guru->e_sign) }}" alt="E-Sign" width="100px;"
                                                height="80px;">
                                            @endif
                                            <br>
                                            (@if($guru->title>0) {{__('phr.titlename')[$guru->title]}} @endif
                                            {{$guru->firstname.' '.$guru->lastname}})
                                            @endif </td>
                                        </tr> -->

                                </tbody>
                            </table>
                            <div class="row clearfix">
                                    <div class="col-sm-6 sign">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Shishya's
                                                E-Sign</label><br>
                                            @if(!empty($shishya->id))
                                            @if($shishya->e_sign!='')
                                            <img src="{{ asset('uploads/'.$shishya->e_sign) }}" alt="E-Sign"
                                                width="100px;" height="80px;">
                                            @endif
                                            <br>
                                            (@if($shishya->title>0) {{__('phr.titlename')[$shishya->title]}} @endif
                                            {{$shishya->firstname.' '.$shishya->middelname.' '.$shishya->lastname}})
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6 sign">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Guru's
                                                E-Sign</label><br>
                                            @if(!empty($guru->id))
                                            @if($guru->e_sign!='')
                                            <img src="{{ asset('uploads/'.$guru->e_sign) }}" alt="E-Sign" width="100px;"
                                                height="80px;">
                                            @endif
                                            <br>
                                            (@if($guru->title>0) {{__('phr.titlename')[$guru->title]}} @endif
                                            {{$guru->firstname.' '.$guru->lastname}})
                                            @endif
                                        </div>
                                    </div>
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
<script>
$(document).ready(function() {
    $(".follow_up").click(function() {
        $(".card-body2").slideToggle();
    });
    $(".remarks").click(function() {
        $(".card-body3").slideToggle();
    });
});

function confirm_remark_send(action) {  
    var msg = '';
    if ($("#send_to").val() == 3) msg =
        "Are you sure to send record to Shishya? Please note that once you send this to your Shishya, he/she can modify this record!";
    else if ($("#send_to").val() == 1) msg =
        "Are you sure to send record to Admin? Please note that once you send this to Admin, you can not modify this record!";
    else if ($("#send_to").val() == 2) {
        @if(Auth::user()->user_type == 1)
        if ($("#remark_type").val() == 1)
        msg = "Are you sure to send record to Guru? Please note that once you send this to Guru, he/she can modify this record!";
        else msg = "Are you sure to send record to Guru? Please note that remark is for reference only!";
        @else
        msg =
            "Are you sure to send record to Guru? Please note that once you send this to your Guru, you can not modify this record!";
        @endif
    }

    if (!confirm(msg)) {
        return false;
    }
    return true;
}
</script>
@endsection
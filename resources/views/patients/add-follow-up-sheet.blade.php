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
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h6 class="page-title"> Add Follow Up </h6>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ url('/dashboard') }}">
                                <i class="fas fa-home"></i> Home </a>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ url('/follow-up-patients') }}">
                                <i class="breadcrumb-item bcrumb-1"></i> Follow up Patient</a>
                        </li>
                        <li class="breadcrumb-item active"> Add Follow Up </li>
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
                   
                    <div class="body">
                        <div id="wizard_horizontal">
                            <section>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <form role="form" method="POST" action="{{ url('/add-follow-up-sheet') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @if (!empty($data->id))
                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                            @endif
                                            @if (!empty($guru->id))
                                            <input type="hidden" name="guru_id" value="{{ $guru->id }}">
                                            @endif
                                            <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                                            <input type="hidden" name="shishya_id" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="registration_no"
                                                value="{{ $patient->registration_no }}">

                                            <div class="card-body">
                                            <div class="header p-0">
                                                <h2>Add Follow Up </h2>
                                            
                                            </div>
                                                <div class="row clearfix">
                                                    
                                                    <div class="col-md-3 col-6">
                                                        <div class="form-group focused">
                                                            <div class="form-line">
                                                                <label class="form-control-label">Registration  No.</label>
                                                                <br>
                                                                <label for="follow_up_date"
                                                                    class="form-control-label">{{ $patient->registration_no }}</label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-6">
                                                        <div class="form-group focused">
                                                            <div class="form-line">
                                                                <label class="form-control-label">Patient Name</label>
                                                                <br>
                                                                <label for="follow_up_date"
                                                                    class="form-control-label">{{ $patient->patient_name }}</label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-6">
                                                        <div class="form-group focused">
                                                            <div class="form-line">
                                                                <label for="follow_up_date"
                                                                    class="form-control-label">Date of Follow up<span
                                                                        class="text-danger"></span></label>
                                                                <input type="text" name="follow_up_date"
                                                                    value="{{ date('d-m-Y') }}"
                                                                    class="form-control datetimepicker flatpickr-input active"
                                                                    placeholder="follow_up_date" aria-label="Name"
                                                                    value="@if (!empty($data->follow_up_date)) {{ date('Y-m-d', strtotime($data->follow_up_date)) }}@else{{ date('d-m-Y') }} @endif"
                                                                    readonly required>
                                                                @if ($errors->has('follow_up_date'))
                                                                <span class="help-block">
                                                                    <strong
                                                                        style="color:red;">{{ $errors->first('follow_up_date') }}
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 col-6">
                                                        <div class="form-group">
                                                            <div class="form-line">

                                                                <label for="report_type"
                                                                    class="form-control-label">Progress Duration<span
                                                                        class="text-danger"></span></label>
                                                                <select name="report_type" id="report_type"
                                                                    class="form-control" required>
                                                                    <option value="Daily" @if (!empty($data->
                                                                        report_type) && $data->report_type == 'Daily')
                                                                        SELECTED @elseif(old('report_type') &&
                                                                        old('report_type') == 'Daily') SELECTED @endif>
                                                                        Daily Progress </option>
                                                                    <option value="Weekly" @if (!empty($data->
                                                                        report_type) && $data->report_type == 'Weekly')
                                                                        SELECTED @elseif(old('report_type') &&
                                                                        old('report_type') == 'Weekly') SELECTED @endif>
                                                                        Weekly Progress</option>
                                                                    <option value="Monthly" @if (!empty($data->
                                                                        report_type) && $data->report_type == 'Monthly')
                                                                        SELECTED @elseif(old('report_type') &&
                                                                        old('report_type') == 'Monthly') SELECTED
                                                                        @endif>
                                                                        Monthly Progress</option>

                                                                </select>
                                                                @if ($errors->has('report_type'))
                                                                <span class="help-block">
                                                                    <strong
                                                                        style="color:red;">{{ $errors->first('report_type') }}
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <label for="progress" class="form-control-label">Progress <span class="text-danger"></span></label>
                                                                <textarea cols="45" rows="1" name="progress" class="form-control" value="" aria-label="progress" placeholder="Please enter progress" required>{{ (@$data->progress)?$data->progress:old('progress') }}</textarea>
                                                            @if($errors->has('progress'))
                                                            <span class="help-block">
                                                                <strong style="color:red;">{{ $errors->first('progress') }}</strong>
                                                            </span>
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <label for="treatment" class="form-control-label">Treatment/Therapies<span class="text-danger"></span></label>
                                                                <textarea cols="45" rows="1" name="treatment" class="form-control" value="" aria-label="treatment" placeholder="Please enter treatment/therapies" required>{{ (@$data->treatment)?$data->treatment:old('treatment') }}</textarea>
                                                                @if ($errors->has('treatment'))
                                                                <span class="help-block">
                                                                    <strong
                                                                        style="color:red;">{{ $errors->first('treatment') }}
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>

                                                <div class="row clearfix">
                                                    <div class="col-sm-12  text-left">
                                                        <div class="d-flex justify-content-end">
                                                        <button type="submit" class="btn save  waves-effect m-r-15"> &nbsp;Save
                                                            &nbsp; </button>
                                                        <a href="{{ url('/follow-up-patients') }}"><button type="button"   class="btn back btn-danger waves-effect"> &nbsp; Back
                                                                &nbsp;</button></a>
                                                      
                                                        </div>
                                                       

                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="card-body add-follow-up-patient-history-sheet">
                                    <div calss="row">
                                        <div class="col-sm-12 follow_up">
                                            <span>Patient History Sheet </span>
                                            <i class="fa fa-plus fa-x" style="float:right;clear:none;"></i>
                                        </div>
                                    </div>
                                    <div class="card-body2 " >
                                    <table class="">
                                            <h3>Basic Information</h3>
                                            <thead>
                                            <tr>
                                                <th> Name of  the Guru</th>
                                                <th> Name of   the Shishya</th>
                                                <th>Place of the Guru </th>
                                                <th>Date of   Report </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr> 
                                                <td> @if (!empty($guru->id))
                                                {{ $guru->firstname . ' ' . $guru->lastname }}
                                                    @endif </td>
                                                <td> {{$shishya->firstname}}</td>
                                                <td>{{@$guru->city_name}}</td>
                                                <td> <?php echo date('d-m-Y'); ?></td>
                                              
                                            </tr>
                                            </tbody>
                                    </table>

                                    <table class="view-table">
                                        <h3>Patient Information</h3>
                                        <thead>
                                        <tr>
                                            <th class="w-25"> Title </th>
                                            <th> Value</th>
                                           
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr> 
                                            <td> Name of  the Patient</td>
                                            <td>{{ $patient->patient_name  }} </td>
                                          
                                        </tr>

                                        <tr>
                                            <td> Registration No</td>
                                            <td>  {{ $patient->registration_no  }}</td>
                                        </tr>

                                        <tr>
                                            <td>Age </td>
                                            <td> {{ $patient->age }}
                                                        Yrs.</td>
                                        </tr>

                                        <tr>
                                            <td> Registration Date</td>
                                            <td> {{ date('Y-m-d', strtotime($patient->registration_date))  }}</td>
                                        </tr>

                                        <tr>
                                            <td>Gender </td>
                                            <td>   @foreach (__('phr.gender') as $key => $value)
                                                        {{ $patient->gender == $key ? $value : '' }}
                                                        @endforeach</td>
                                        </tr>

                                        <tr>
                                            <td> Age  Group</td>
                                            <td>@foreach (__('phr.age_group') as $key => $value)
                                                        {{ $patient->age_group == $key ? $value : '' }}
                                                        @endforeach </td>
                                        </tr>

                                        <tr>
                                            <td>Occupation </td>
                                            <td> @foreach (__('phr.occupation') as $key => $value)
                                                        {{ $patient->occupation == $key ? $value : '' }}
                                                        </option>
                                                        @endforeach </td>
                                        </tr>

                                        <tr>
                                            <td> Marital   Status</td>
                                            <td> @foreach (__('phr.marital_status') as $key => $value)
                                                        {{ $patient->marital_status == $key ? $value : '' }}
                                                        </option>
                                                        @endforeach </td>
                                        </tr>

                                        <tr>
                                            <td>Aasan   Sidhi </td>
                                            <td>{{ $patient->aasan_sidhi  }} </td>
                                        </tr>

                                        <tr>
                                            <td> Season</td>
                                            <td>{{ $patient->season  }} </td>
                                        </tr>

                                        <tr>
                                            <td> Region of patient</td>
                                            <td>  @foreach (__('phr.region_of_patient') as $key => $value)
                                                        {{ $patient->region_of_patient == $key ? $value : '' }}
                                                        </option>
                                                        @endforeach</td>
                                        </tr>

                                        <tr>
                                            <td>Address </td>
                                            <td>{{ $patient->address  }} </td>
                                        </tr>

                                        <tr>
                                            <td>1. Main
                                                        Complaint(As said by patient) </td>
                                            <td> {{ $patient->main_complaintsaid_by_patient  }}</td>
                                        </tr>

                                        <tr>
                                            <td>Duration </td>
                                            <td> {{ $patient->complaint_as_said_by_family_duration  }}</td>
                                        </tr>

                                        <tr>
                                            <td> 3. Past  illness</td>
                                            <td> {{ $patient->past_illness  }}</td>
                                        </tr>

                                        <tr>
                                            <td>4. Family  History </td>
                                            <td> {{ $patient->family_history  }}</td>
                                        </tr>

                                        <tr>
                                            <td colspan="2"> <h3>5. Examination  of the  patient</h3> </td>
                                           
                                        </tr>

                                        <tr>
                                            <td>Skin </td>
                                            <td>  @foreach (__('phr.skin') as $key => $value)
                                                        {{ $patient->skin == $key ? $value : '' }}
                                                        @endforeach</td>
                                        </tr>

                                        <tr>
                                            <td>Nadi </td>
                                            <td>@foreach (__('phr.nadi') as $key => $value)
                                                        {{ $patient->nadi == $key ? $value : '' }}
                                                        @endforeach </td>
                                        </tr>

                                        <tr>
                                            <td> Place</td>
                                            <td>   @foreach (__('phr.place') as $key => $value)
                                                        {{ $patient->nadi_place == $key ? $value : '' }}
                                                        @endforeach</td>
                                        </tr>

                                        <tr>
                                            <td> Nails</td>
                                            <td> @foreach (__('phr.nails') as $key => $value)
                                                        {{ $patient->nails == $key ? $value : '' }}
                                                        @endforeach </td>
                                        </tr>

                                        <tr>
                                            <td> Anguli sandhi</td>
                                            <td> @foreach (__('phr.anguli_sandhi') as $key => $value)
                                                        {{ $patient->anguli_sandhi == $key ? $value : '' }}
                                                        @endforeach </td>
                                        </tr>

                                        <tr>
                                            <td>Netra </td>
                                            <td>   @foreach (__('phr.netra') as $key => $value)
                                                        {{ $patient->netra == $key ? $value : '' }}
                                                        @endforeach</td>
                                        </tr>

                                        <tr>
                                            <td>Adhovartma </td>
                                            <td>  @foreach (__('phr.adhovartma') as $key => $value)
                                                        {{ $patient->adhovartma == $key ? $value : '' }}
                                                        @endforeach</td>
                                        </tr>

                                        <tr>
                                            <td> Hastatala</td>
                                            <td>  @foreach (__('phr.adhovartma') as $key => $value)
                                                        {{ $patient->hastatala == $key ? $value : '' }}
                                                        @endforeach</td>
                                        </tr>

                                        <tr>
                                            <td> Jihwa</td>
                                            <td>   @foreach (__('phr.jihwa') as $key => $value)
                                                        {{ $patient->jihwa == $key ? $value : '' }}
                                                        @endforeach</td>
                                        </tr>

                                        <tr>
                                            <td>Aakriti </td>
                                            <td>  @foreach (__('phr.aakriti') as $key => $value)
                                                        {{ $patient->aakriti == $key ? $value : '' }}
                                                        @endforeach</td>
                                        </tr>

                                        <tr>
                                            <td> Shabda</td>
                                            <td>    @foreach (__('phr.shabda') as $key => $value)
                                                        {{ $patient->shabda == $key ? $value : '' }}
                                                        @endforeach</td>
                                        </tr>

                                        <tr>
                                            <td>Koshtha </td>
                                            <td>   @foreach (__('phr.koshtha') as $key => $value)
                                                        {{ $patient->koshtha == $key ? $value : '' }}
                                                        @endforeach </td>
                                        </tr>

                                        <tr>
                                            <td> Agni</td>
                                            <td>  @foreach (__('phr.agni') as $key => $value)
                                                        {{ $patient->agni == $key ? $value : '' }}
                                                        @endforeach</td>
                                        </tr>

                                        <tr>
                                            <td> Shukrakshana</td>
                                            <td> @foreach (__('phr.shukrakshana_pravritti') as $key =>
                                                        $value)
                                                        {{ $patient->shukrakshana_pravritti == $key ? $value : '' }}
                                                        @endforeach</td>
                                        </tr>

                                        <tr>
                                            <td>  Aartava Pravritti   Kala</td>
                                            <td>   @foreach (__('phr.aartava_pravratti_kala') as $key =>
                                                        $value)
                                                        {{ $patient->aartava_pravratti_kala == $key ? $value : '' }}
                                                        @endforeach</td>
                                        </tr>

                                        <tr>
                                            <td>Dehoshma </td>
                                            <td>  @foreach (__('phr.dehoshma') as $key => $value)
                                                        {{ $patient->dehoshma == $key ? $value : '' }}
                                                        @endforeach</td>
                                        </tr>

                                        <tr>
                                            <td> Bhara</td>
                                            <td>  {{ $patient->bhara  }}</td>
                                        </tr>

                                        <tr>
                                            <td> Raktachapa</td>
                                            <td>  @foreach (__('phr.raktachapa') as $key => $value)
                                                        {{ $patient->raktachapa == $key ? $value : '' }}
                                                        @endforeach</td>
                                        </tr>

                                        <tr>
                                            <td> Hrid  gati</td>
                                            <td>  @foreach (__('phr.hrid_gati') as $key => $value)
                                                        {{ $patient->hrid_gati == $key ? $value : '' }}
                                                        @endforeach </td>
                                        </tr>

                                        <tr>
                                            <td> Shvasagati</td>
                                            <td>   @foreach (__('phr.shvasagati') as $key => $value)
                                                        {{ $patient->shvasagati == $key ? $value : '' }}
                                                        @endforeach </td>
                                        </tr>

                                        <tr>
                                            <td>  Parkriti  Parikshana</td>
                                            <td>  @foreach (__('phr.parkriti_parikshana') as $key => $value)
                                                        {{ $patient->parkriti_parikshana == $key ? $value : '' }}
                                                        @endforeach</td>
                                        </tr>

                                        <tr>
                                            <td>6. Examination   by       Physician </td>
                                            <td>@foreach (__('phr.examination_by_physician') as $key =>
                                                        $value)
                                                        {{ $patient->examination_by_physician == $key ? $value : '' }}
                                                        @endforeach </td>
                                        </tr>

                                        <tr>
                                            <td>7.  Prayogashaliya   Parikshana</td>
                                            <td> {{ $patient->prayogashaliya_parikshana  }}</td>
                                        </tr>

                                        <tr>
                                            <td>8.  Samprapti Vivarana</td>
                                            <td> {{ $patient->samprapti_vivarana  }}</td>
                                        </tr>

                                        <tr>
                                            <td>9. Vibhedaka  Pariksha </td>
                                            <td> {{ $patient->vibhedaka_pariksha  }} </td>
                                        </tr>

                                        <tr>
                                            <td> 10.  Roga Vinishchaya-  Pramukh Nidana</td>
                                            <td>{{ $patient->roga_vinishchaya_pramukh_nidana  }} </td>
                                        </tr>

                                        <tr>
                                            <td> 11.  Chikitsa  Kalpana   Anupana     Sahita</td>
                                            <td> {{ $patient->chikitsa_kalpana_anupana_sahita  }}</td>
                                        </tr>

                                        <tr>
                                            <td> Samshodhana   Kriyas </td>
                                            <td> {{ $patient->samshodhana_kriyas  }}</td>
                                        </tr>

                                        <tr>
                                            <td>Samshamana  Kriyas </td>
                                            <td> {{ $patient->samshamana_kriyas  }}</td>
                                        </tr>

                                        <tr>
                                            <td>12.  Pathya-Apathya  (<a href="{{ url('/annexure-file.pdf') }}" target="_blank"><span
                                                                class="fs-12 text-info">Annexure-1</span></a>) </td>
                                            <td>  {{ $patient->pathya_apathya  }}</td>
                                        </tr>

                                        </tbody>
                                    </table>

                                      




                                      

                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Student's
                                                        E-Sign</label><br>
                                                    @if (!empty($shishya->id))
                                                    @if ($shishya->e_sign != '')
                                                    <img src="{{ asset('uploads/' . $shishya->e_sign) }}" alt="E-Sign"
                                                        width="100px;" height="80px;">
                                                    @endif
                                                    <br>
                                                    (@if ($shishya->title > 0)
                                                    {{ __('phr.titlename')[$shishya->title] }}
                                                    @endif
                                                    {{ $shishya->firstname . ' ' . $shishya->middelname . ' ' . $shishya->lastname }})
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Guru's
                                                        E-Sign</label><br>
                                                    @if (!empty($guru->id))
                                                    @if ($guru->e_sign != '')
                                                    <img src="{{ asset('uploads/' . $guru->e_sign) }}" alt="E-Sign"
                                                        width="100px;" height="80px;">
                                                    @endif
                                                    <br>
                                                    (@if ($guru->title > 0)
                                                    {{ __('phr.titlename')[$guru->title] }}
                                                    @endif
                                                    {{ $guru->firstname . ' ' . $guru->lastname }})
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ url('/follow-up-patients') }}"><button type="button"
                                                    class="btn back btn-danger waves-effect"> &nbsp; Back
                                                    &nbsp;</button></a>
                                        <div class="col-sm-12 p-t-20 text-left">
                                          
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
});
</script>
@endsection
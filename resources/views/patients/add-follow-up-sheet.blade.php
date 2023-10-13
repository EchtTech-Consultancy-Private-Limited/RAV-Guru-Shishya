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
                    <div class="header">
                        <h2> Add Follow Up </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle" data-bs-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu float-start">
                                    <li>
                                        <a href="#" onClick="window.print();">Print</a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </div>
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

                                                <div class="row clearfix">
                                                    <div class="col-md-4">
                                                        <div class="form-group focused">
                                                            <div class="form-line">
                                                                <label class="form-control-label">Registration
                                                                    No.</label>
                                                                <br>
                                                                <label for="follow_up_date"
                                                                    class="form-control-label">{{ $patient->registration_no }}</label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group focused">
                                                            <div class="form-line">
                                                                <label class="form-control-label">Patient Name</label>
                                                                <br>
                                                                <label for="follow_up_date"
                                                                    class="form-control-label">{{ $patient->patient_name }}</label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
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

                                                    <div class="col-md-4">
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
                                                                <label for="progress"
                                                                    class="form-control-label">Progress<span
                                                                        class="text-danger"></span></label>
                                                                <textarea cols="45" rows="2" name="progress"
                                                                    class="form-control" value="" aria-label="progress"
                                                                    placeholder="Please enter progress"
                                                                    required>{{ old('progress') }}</textarea>
                                                                @if($errors->has('progress'))
                                                                <span class="help-block">
                                                                    <strong
                                                                        style="color:red;">{{ $errors->first('progress') }}
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <label for="treatment"
                                                                    class="form-control-label">Treatment/Therapies<span
                                                                        class="text-danger"></span></label>
                                                                <textarea cols="45" rows="2" name="treatment"
                                                                    class="form-control" value="" aria-label="treatment"
                                                                    placeholder="Please enter treatment/therapies"
                                                                    required>{{ old('treatment') }}</textarea>
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
                                                        <a href="{{ url('/follow-up-patients') }}"><button type="button"
                                                                class="btn btn-danger waves-effect"> &nbsp; Back
                                                                &nbsp;</button></a>
                                                        <button type="submit"
                                                            class="btn btn-primary waves-effect m-r-15"> &nbsp;Save
                                                            &nbsp; </button>

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
                                    <div class="card-body2 " style="display:none;">

                                        <div class="row clearfix pt-5 p-1">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Name of
                                                        the Guru<span class="text-danger"></span></label><br>
                                                    @if (!empty($guru->id))
                                                    <label for="example-text-input"
                                                        class="form-control-label"><b>{{ $guru->firstname . ' ' . $guru->middlename . ' ' . $guru->lastname }}</b></label>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Place
                                                        of the Guru</label><br>
                                                    @if (!empty($guru->id))
                                                    <label for="example-text-input"
                                                        class="form-control-label"><b>{{$guru->city_name}}</b></label>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Name of
                                                        the Shishya<span class="text-danger"></span></label><br>
                                                    <label for="example-text-input"
                                                        class="form-control-label"><b>{{$shishya->firstname}}</b></label>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Date of
                                                        Report</label><br>
                                                    <label for="example-text-input"
                                                        class="form-control-label"><b><?php echo date('Y-m-d'); ?><b></label>

                                                </div>
                                            </div>



                                        </div>

                                        <hr style="height:2px;">
                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Name of
                                                        the Patient<span class="text-danger"></span></label>
                                                    <p> {{ $patient->patient_name  }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Registration No<span
                                                            class="text-danger"></span></label>
                                                    <p> {{ $patient->registration_no  }}</p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Age<span
                                                            class="text-danger"></span></label>
                                                    <p> {{ $patient->age }}
                                                        Yrs. </label>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Registration Date</label>
                                                    <p> {{ date('Y-m-d', strtotime($patient->registration_date))  }}</p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="Gender" class="form-control-label">Gender<span
                                                            class="text-danger"></span></label>
                                                    <p>
                                                        @foreach (__('phr.gender') as $key => $value)
                                                        {{ $patient->gender == $key ? $value : '' }}</option>
                                                        @endforeach
                                                        </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Age
                                                        Group<span class="text-danger"></span></label>
                                                    <p>
                                                        @foreach (__('phr.age_group') as $key => $value)
                                                        {{ $patient->age_group == $key ? $value : '' }}
                                                        @endforeach
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Occupation<span
                                                            class="text-danger"></span></label>
                                                    <p>
                                                        @foreach (__('phr.occupation') as $key => $value)
                                                        {{ $patient->occupation == $key ? $value : '' }}
                                                        </option>
                                                        @endforeach
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Marital
                                                        Status<span class="text-danger"></span></label>
                                                    <p>
                                                        @foreach (__('phr.marital_status') as $key => $value)
                                                        {{ $patient->marital_status == $key ? $value : '' }}
                                                        </option>
                                                        @endforeach
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Aasan
                                                        Sidhi</label>
                                                    <p> {{ $patient->aasan_sidhi  }}</p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Season</label>
                                                    <p> {{ $patient->season  }}</p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-in
                                             put" class="form-control-label">Region of patient</label>
                                                    <p>
                                                        @foreach (__('phr.region_of_patient') as $key => $value)
                                                        {{ $patient->region_of_patient == $key ? $value : '' }}
                                                        </option>
                                                        @endforeach
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Address<span
                                                            class="text-danger"></span></label>
                                                    <p> {{ $patient->address  }}</p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">1. Main
                                                        Complaint(As said by patient)</label>
                                                    <p> {{ $patient->main_complaintsaid_by_patient  }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Duration</label>
                                                    <p> {{ $patient->said_by_patient_duration  }}</p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">2. Main
                                                        Complaint(As said by family member)</label>
                                                    <p> {{ $patient->main_complaint_as_said_by_family  }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input"
                                                        class="form-control-label">Duration</label>
                                                    <p> {{ $patient->complaint_as_said_by_family_duration  }}</p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">3. Past
                                                        illness</label>
                                                    <p> {{ $patient->past_illness  }}</p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">4.
                                                        Family
                                                        History</label>
                                                    <p> {{ $patient->family_history  }}</p>

                                                </div>
                                            </div>



                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">5.
                                                        Examination
                                                        of
                                                        the
                                                        patient</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Skin">i) Skin</label>
                                                    <p>
                                                        @foreach (__('phr.skin') as $key => $value)
                                                        {{ $patient->skin == $key ? $value : '' }}
                                                        @endforeach
                                                        </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Nadi">ii)
                                                        Nadi</label>
                                                    <p>
                                                        @foreach (__('phr.nadi') as $key => $value)
                                                        {{ $patient->nadi == $key ? $value : '' }}
                                                        @endforeach
                                                        </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Place">iii)Place</label>
                                                    <p>
                                                        @foreach (__('phr.place') as $key => $value)
                                                        {{ $patient->nadi_place == $key ? $value : '' }}
                                                        @endforeach
                                                        </label>

                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Nails">iv)
                                                        Nails</label>
                                                    <p>
                                                        @foreach (__('phr.nails') as $key => $value)
                                                        {{ $patient->nails == $key ? $value : '' }}
                                                        @endforeach
                                                        </label>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Nails">v)
                                                        Anguli
                                                        sandhi</label>
                                                    <p>
                                                        @foreach (__('phr.anguli_sandhi') as $key => $value)
                                                        {{ $patient->anguli_sandhi == $key ? $value : '' }}
                                                        @endforeach
                                                        </label>

                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Netra">vi)
                                                        Netra</label>
                                                    <p>
                                                        @foreach (__('phr.netra') as $key => $value)
                                                        {{ $patient->netra == $key ? $value : '' }}
                                                        @endforeach
                                                        </label>

                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Adhovartma">vii)
                                                        Adhovartma</label>
                                                    <p>
                                                        @foreach (__('phr.adhovartma') as $key => $value)
                                                        {{ $patient->adhovartma == $key ? $value : '' }}
                                                        @endforeach
                                                        </label>

                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Hastatala">viii)
                                                        Hastatala</label>
                                                    <br>
                                                    <p>
                                                        @foreach (__('phr.adhovartma') as $key => $value)
                                                        {{ $patient->hastatala == $key ? $value : '' }}
                                                        @endforeach
                                                    </p>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Jihwa">ix)
                                                        Jihwa</label>
                                                    <br>
                                                    <p>
                                                        @foreach (__('phr.jihwa') as $key => $value)
                                                        {{ $patient->jihwa == $key ? $value : '' }}
                                                        @endforeach
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Aakriti">x)
                                                        Aakriti</label>
                                                    <br>
                                                    <p>
                                                        @foreach (__('phr.aakriti') as $key => $value)
                                                        {{ $patient->aakriti == $key ? $value : '' }}
                                                        @endforeach
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Shabda">xi)
                                                        Shabda</label>
                                                    <br>
                                                    <p>
                                                        @foreach (__('phr.shabda') as $key => $value)
                                                        {{ $patient->shabda == $key ? $value : '' }}
                                                        @endforeach
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Koshtha">xii)
                                                        Koshtha</label>
                                                    <br>
                                                    <p>
                                                        @foreach (__('phr.koshtha') as $key => $value)
                                                        {{ $patient->koshtha == $key ? $value : '' }}
                                                        @endforeach
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Agni">xii)
                                                        Agni</label>
                                                    <br>
                                                    <p>
                                                        @foreach (__('phr.agni') as $key => $value)
                                                        {{ $patient->agni == $key ? $value : '' }}
                                                        @endforeach
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Mala
                                             Pravritti">xiv)
                                                        Mala
                                                        Pravritti</label>
                                                    <br>
                                                    <p>
                                                        @foreach (__('phr.mala_pravritti') as $key => $value)
                                                        {{ $patient->mala_pravritti == $key ? $value : '' }}
                                                        @endforeach
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Mutra
                                             Pravritti">xv)
                                                        Mutra
                                                        Pravritti</label>
                                                    <br>
                                                    <p>
                                                        @foreach (__('phr.mutra_pravritti') as $key => $value)
                                                        {{ $patient->mutra_pravritti == $key ? $value : '' }}
                                                        @endforeach
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Vyavay
                                             Pravritti">xvi)
                                                        Vyavay
                                                        Pravritti</label>
                                                    <br>
                                                    <p>
                                                        @foreach (__('phr.vyavay_pravritti') as $key => $value)
                                                        {{ $patient->vyavay_pravritti == $key ? $value : '' }}
                                                        @endforeach
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Shukrakshanapravritti">xvii)Shukrakshana
                                                        pravritti</label>
                                                    <br>
                                                    <p>
                                                        @foreach (__('phr.shukrakshana_pravritti') as $key =>
                                                        $value)
                                                        {{ $patient->shukrakshana_pravritti == $key ? $value : '' }}
                                                        @endforeach
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Aartava
                                             Pravritti
                                             Kala">xviii)
                                                        Aartava
                                                        Pravritti
                                                        Kala</label>
                                                    <br>
                                                    <p>
                                                        @foreach (__('phr.aartava_pravratti_kala') as $key =>
                                                        $value)
                                                        {{ $patient->aartava_pravratti_kala == $key ? $value : '' }}
                                                        @endforeach
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Dehoshma">xix)
                                                        Dehoshma</label>
                                                    <br>
                                                    <p>
                                                        @foreach (__('phr.dehoshma') as $key => $value)
                                                        {{ $patient->dehoshma == $key ? $value : '' }}
                                                        @endforeach
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Bhara">xx)
                                                        Bhara</label>
                                                    <p> {{ $patient->bhara  }}</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Raktachapa">xxi)
                                                        Raktachapa</label>
                                                    <br>
                                                    <p>
                                                        @foreach (__('phr.raktachapa') as $key => $value)
                                                        {{ $patient->raktachapa == $key ? $value : '' }}
                                                        @endforeach
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Hrid
                                             gati">xxii)
                                                        Hrid
                                                        gati</label>
                                                    <br>
                                                    <p>
                                                        @foreach (__('phr.hrid_gati') as $key => $value)
                                                        {{ $patient->hrid_gati == $key ? $value : '' }}
                                                        @endforeach
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="Shvasagati">xxiii)
                                                        Shvasagati</label>
                                                    <br>
                                                    <p>
                                                        @foreach (__('phr.shvasagati') as $key => $value)
                                                        {{ $patient->shvasagati == $key ? $value : '' }}
                                                        @endforeach
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="parkriti_parikshana">xxiv)
                                                        Parkriti
                                                        Parikshana</label>
                                                    <br>
                                                    <p>
                                                        @foreach (__('phr.parkriti_parikshana') as $key => $value)
                                                        {{ $patient->parkriti_parikshana == $key ? $value : '' }}
                                                        @endforeach
                                                    </p>

                                                </div>
                                            </div>
                                        </div>




                                        <div class="row clearfix">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">6.
                                                        Examination
                                                        by
                                                        Physician</label>
                                                    <br>
                                                    <p>
                                                        @foreach (__('phr.examination_by_physician') as $key =>
                                                        $value)
                                                        {{ $patient->examination_by_physician == $key ? $value : '' }}
                                                        @endforeach
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">7.
                                                        Prayogashaliya
                                                        Parikshana</label>
                                                    <p> {{ $patient->prayogashaliya_parikshana  }}</p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">8.
                                                        Samprapti
                                                        Vivarana</label>
                                                    <p> {{ $patient->samprapti_vivarana  }}</p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">9.
                                                        Vibhedaka
                                                        Pariksha</label>
                                                    <p> {{ $patient->vibhedaka_pariksha  }}</p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">10.
                                                        Roga
                                                        Vinishchaya-
                                                        Pramukh
                                                        Nidana</label>
                                                    <p> {{ $patient->roga_vinishchaya_pramukh_nidana  }}</p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">11.
                                                        Chikitsa
                                                        Kalpana
                                                        Anupana
                                                        Sahita</label>
                                                    <p> {{ $patient->chikitsa_kalpana_anupana_sahita  }}</p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="samshodhana_kriyas"
                                                        class="form-control-label">Samshodhana
                                                        Kriyas</label>
                                                    <p> {{ $patient->samshodhana_kriyas  }}</p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="samshamana_kriyas" class="form-control-label">Samshamana
                                                        Kriyas</label>
                                                    <p> {{ $patient->samshamana_kriyas  }}</p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">12.
                                                        Pathya-Apathya
                                                        (<a href="{{ url('/annexure-file.pdf') }}" target="_blank"><span
                                                                class="fs-12 text-info">Annexure-1</span></a>)
                                                    </label>
                                                    <p> {{ $patient->pathya_apathya  }}</p>

                                                </div>
                                            </div>



                                        </div>

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
                                                    {{ $guru->firstname . ' ' . $guru->middelname . ' ' . $guru->lastname }})
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 p-t-20 text-left">
                                            <a href="{{ url('/follow-up-patients') }}"><button type="button"
                                                    class="btn btn-danger waves-effect"> &nbsp; Back
                                                    &nbsp;</button></a>
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
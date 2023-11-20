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
                            <h6 class="page-title"> Attendance </h6>

                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{url('/dashboard')}}">
                                <i class="fas fa-home"></i> Home</a>
                        </li>

                        <li class="breadcrumb-item active"> Add Attendance </li>
                    </ul>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <form role="form" method="POST" action="{{ url('/add-attendance') }}">
            @csrf
            <input type="hidden" name="guru_id" value="{{Auth::user()->id}}">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">

                        <div class="body">
                            <div class="row">
                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
                                    <div class="form-group">
                                        <label class="active">From:<span class="text-danger"></span></label>
                                        <input type="date" name="from_date" class="form-control datetimepicker flatpickr-input active" value="{{date('Y-m-d',time())}}" max="{{date('Y-m-d',time())}}" required>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
                                    <div class="form-group">
                                        <label class="active">To:<span class="text-danger"></span></label>
                                        <input type="date" name="to_date" class="form-control datetimepicker flatpickr-input active" value="{{date('Y-m-d',time())}}" max="{{date('Y-m-d',time())}}" required>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-3 width-50">
                                    <div class="form-group">
                                        <label class="active"> In Time :<span class="text-danger"></span></label>
                                        <input type="time" name="in_time" value="{{ old('in_time') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-3 width-50">
                                    <div class="form-group">
                                        <label class="active">Out Time :<span class="text-danger"></span></label>
                                        <input type="time" name="out_time" value="{{ old('out_time') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-5 col-lg-3 col-md-6">
                                    <div class="form-group default-select select2Style">
                                        <div class="form-group">
                                            <label class="active">Morning Shifts Timings :<span class="text-danger"></span></label>
                                            <select class="form-control select2 width" multiple="" data-placeholder="Select" name="attendance_morning_timing[]">
                                                <option value="">Select Morning Timing</option>
                                                @foreach(__('phr.attendance_morning_timing') as $key=>$value)
                                                @if(old('attendance_morning_timing'))
                                                <option @if(in_array($value, old('attendance_morning_timing'))) selected @endif value="{{$value}}">{{$value}}</option>
                                                @else
                                                <option value="{{$value}}">{{$value}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-5 col-lg-3 col-md-6">
                                    <div class="form-group">
                                        <label class="active">Evening Shifts Timings :<span class="text-danger"></span></label>
                                        <select class="form-control select2 width" multiple="" data-placeholder="Select" name="attendance_evening_timing[]">
                                            <option value="">Select Morning Timing</option>
                                            @foreach(__('phr.attendance_evening_timing') as $key=>$value)
                                            @if(old('attendance_evening_timing'))
                                            <option @if(in_array($value, old('attendance_evening_timing'))) selected @endif value="{{$value}}">{{$value}}</option>
                                            @else
                                            <option value="{{$value}}">{{$value}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-2 col-lg-3 col-md-6">
                                    <div class="form-group">
                                        <label class="active">Select Attendance<span class="text-danger"></span></label>
                                        <select name="attendance" class="form-control active" required>
                                            <option value="">Select Attendance</option>
                                            @if(old('attendance'))
                                            <option value="{{ old('attendance') }}" selected>{{ old('attendance') }}</option>
                                            @endif
                                            <option>Present</option>
                                            <option>Absent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-12  col-md-6  d-flex justify-content-end">
                                    <div class="new-patient-input d-flex justify-content-end  ">

                                        <button type="submit" class="btn add waves-effect" style="line-height:2;" onclick="return confirm_option('update attendance for this date range');">Update
                                            Attendance </button>
                                        <a href="{{ url('/attendance-list') }}"><button type="button" class="btn back waves-effect"> &nbsp; Back &nbsp;</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example contact_list add-attendance">
                                    <thead>
                                        <th class="center text-white"> <label class="form-check-label  text-white"><input type="checkbox" class="m-0" name="checkall" id="checkall" value="1"> Select All </label> </th>
                                        <th class="center"> Registration No. </th>
                                        <th class="center"> Shishya Name </th>
                                        <!-- <th class="center"> Guru Name </th> -->
                                        <th class="center"> Contact No. </th>
                                        <th class="center"> Created Date </th>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $k=>$user)
                                        <tr class="odd gradeX ">
                                            <td class="center"><label class="form-check-label form-check-input1"><input name="shishya_ids[]" type="checkbox" class="form-check-input ms-4" value="{{$user->id}}"> </label></td>
                                            <td class="center">RAVSH-{{ $user->id }}-{{date('Y')}}</td>
                                            <td class="center">{{$user->firstname.' '.$user->lastname}}</td>
                                            <!-- <td class="center">{{$user->guru_firstname.' '.$user->guru_lastname}}</td> -->
                                            <td class="center">{{$user->mobile_no}}</td>
                                            <td class="center">{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
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
    </form>

    </div>
    </div>
    </div>
</section>
<script src="{{ asset('assets/js/custom-script.js') }} "></script>
@endsection

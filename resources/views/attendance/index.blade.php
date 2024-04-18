@extends('layouts.app-file')
@section('content')

<section class="content">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
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
                <div class=" col-md-6 ">

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
                <div class="col-md-6 justify-content-end">

                    <a type="button" href="{{url('/export-attendance')}}" class="btn download waves-effect"> Download
                    </a>

                    @if(Auth::user()->user_type==2)
                    @if(permissionCheck()->add == 1 || Auth::user()->user_type == 4)
                    <a type="button" href="{{url('/add-attendance')}}" class="btn add waves-effect float-right">Add
                        Attendance </a>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body">
                <form role="form" method="POST" action="{{ url('/attendance-list') }}" id="frmattendances">
                    @csrf
                    <div class="header">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <h4 class="py-2">Attendances</h4>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 mb-3">
                                <div class="form-group d-inline-block ">
                                    <label class="active">Select Shishya:<span class="text-danger"></span></label>
                                    <select class="form-control" name="shishya_id">
                                        <option value="">Select Shishya</option>
                                        @foreach($shishyas as $shishya)
                                        <option value="{{$shishya->id}}" @if(request()->
                                            shishya_id==$shishya->id) SELECTED
                                            @endif>{{$shishya->firstname.' '.$shishya->middlename.' '.$shishya->lastname}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @if(Auth::user()->user_type==1 || Auth::user()->user_type==4)
                            <div class="col-xl-2 col-lg-2 col-md-2 mb-3">
                                <div class="form-group ">


                                    <label class="active">Select Guru:<span class="text-danger"></span></label>

                                    <div class="pe-2 ">

                                        <select class="form-control" name="guru_id">
                                            <option value="">Select Guru</option>
                                            @foreach($gurus as $guru)
                                            <option value="{{$guru->id}}" @if(request()->guru_id==$guru->id)
                                                SELECTED
                                                @endif>{{$guru->firstname.' '.$guru->middlename.' '.$guru->lasttname}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            @else
                            <input type="hidden" name="guru_id" value="{{Auth::user()->id}}">
                            @endif



                            <div class="col-xl-3 col-xxl-2 col-lg-3 col-md-4 width-50">
                                <div class="form-group">
                                    <label class="active">From Date:</label>
                                    <input type="date" name="from_date"
                                        class="form-control datetimepicker flatpickr-input active"
                                        value="@if(request()->from_date){{date('Y-m-d',strtotime(request()->from_date))}}@endif"
                                        max="{{date('Y-m-d',time())}}">
                                </div>

                            </div>
                            <div class="col-xl-3 col-xxl-2 col-lg-3 col-md-4 width-50">
                                <div class="form-group">
                                    <label class="active"> To Date:</label>
                                    <input type="date" name="to_date"
                                        class="form-control datetimepicker flatpickr-input active"
                                        value="@if(request()->to_date){{date('Y-m-d',strtotime(request()->to_date))}}@endif"
                                        max="{{date('Y-m-d',time())}}">
                                </div>

                            </div>
                            <div class="col-xl-2 col-xxl-2 col-lg-2 col-md-4 width-50">
                                <div class="form-group">
                                    <label class="active">Select Attendance<span class="text-danger"></span></label>
                                    <select name="attendance" class="form-control active">
                                        <option value="">Select Attendance</option>
                                        <option @if(request()->attendance=='Present') SELECTED @endif>Present
                                        </option>
                                        <option @if(request()->attendance=='Absent') SELECTED @endif>Absent
                                        </option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-xl-12  col-md-12  d-flex justify-content-end">
                                <button type="submit" class="btn filter  waves-effect">
                                    Filter </button>
                                <a href="{{ url('attendance-list') }}"><button type="button"
                                        class="btn reset waves-effect">Reset</button></a>



                            </div>
                        </div>
                    </div>


                </form>
                    <div class="table-responsive">
                        <table class="table table-hover" id="attendance_list">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Registration No.</th>
                                    <th>Shishya Name</th>
                                    <th>Guru Name</th>
                                    <th>Attendance</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $k=>$attendance)
                                <tr class="odd gradeX">
                                    <td>
                                        @if(request()->page){{(((request()->page-1)*10)+$k+1)}}@else{{($k+1)}}@endif
                                    </td>
                                    <td>RAVSH-{{ $attendance->shishya_id }}-{{date('Y')}}</td>
                                    <td>{{$attendance->shishya_firstname.' '.$attendance->shishya_lastname}}</td>
                                    <td>{{$attendance->guru_firstname.' '.$attendance->guru_lastname}}</td>
                                    <td>{{$attendance->attendance}}</td>
                                    <td>{{date('d-m-Y',strtotime($attendance->attendance_date))}}</td>
                                    @if(permissionCheck()->view == 3 || Auth::user()->user_type == 4)
                                    <td class="d-flex justify-content-start">                                       
                                        <a class="btn btn-tbl-edit view_attendance" title="View Record"
                                            data-id="{{$attendance->id}}" data-bs-toggle="modal"
                                            data-bs-target="#attendance_modal"><i class="material-icons">visibility</i></a>                                        
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
            <!-- view attendance model -->
            <div class="modal fade" id="attendance_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Attendance Details</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="view-table">
                                <thead>
                                    <tr>
                                        <th> Title</th>
                                        <th> Value</th>
                                    </tr>
                                </thead>
                                <tbody id="viewAttendanceData">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end attendance model -->
        </div>
    </div>
    </div>
    </div>
    </div>
</section>
<script>
$(document).ready(function() {
    $('#attendance_list').DataTable();
});
// Attendance Popup details
$('.view_attendance').on('click', function() {
    var attendance_id = $(this).data('id');
    $.ajax({
        url: '{{url("view-attendance")}}',
        type: "GET",
        data: {
            attendance_id: attendance_id,
        },
        success: function(response) {
            $('#successMsg').show();
            const date = new Date(response.attendance_date);
            const dd = date.getDate();
            const mm = date.getMonth() + 1;
            const year = date.getFullYear();
            var tabledata =
                `<tr><td>Date</td><td>${dd}-${mm}-${year}</td></tr><tr><td>In-Time</td><td>${response.in_time}</td></tr><tr><td>Out-Time</td><td>${response.out_time}</td></tr><tr><td>Morning Shifts Timings</td><td>${response.attendance_morning_timing}</td></tr><tr><td>Evening Shifts Timings</td><td>${response.attendance_evening_timing}</td></tr><tr><td>Attendance</td><td>${response.attendance}</td></tr>`;

            $("#viewAttendanceData").html(tabledata);
        },
        error: function(response) {
            alert(error);
        },
    });
});
</script>
@endsection
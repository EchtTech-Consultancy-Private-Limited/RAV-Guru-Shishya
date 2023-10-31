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
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <form role="form" method="POST" action="{{ url('/attendance-list') }}" id="frmattendances">
                        @csrf
                        <div class="header">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                 <div class="row pb-3">
                                 <div class="col-md-6 col-6">
                                 <h4 class="py-2">Attendances</h4>
                                 </div>
                                 <div class="col-md-6" >
                                    
                                 <a type="button" href="{{url('/export-attendance')}}"
                                        class="btn download waves-effect" > Download </a>

                                  
                                 </div>
                                 </div>
                                 
                                
                                    
                                </div>
                                <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-3">
                                 <div>
                                       <div class="new-patient-input d-inline-block">
                                                <div class="pe-2">
                                                    <select class="form-control" name="shishya_id">
                                                        <option value="">Select Shishya</option>
                                                        @foreach($shishyas as $shishya)
                                                        <option value="{{$shishya->id}}" @if(request()->
                                                            shishya_id==$shishya->id) SELECTED
                                                            @endif>{{$shishya->firstname.' '.$shishya->middlename.' '.$shishya->lasttname}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                           <div class="new-patient-input d-inline-block">
                                                @if(Auth::user()->user_type==1 || Auth::user()->user_type==4)
                                                <span class="pe-2 d-inline-block">Guru:</span>
                                                <div class="pe-2 d-inline-block">
                                               
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
                                                @else
                                                <input type="hidden" name="guru_id" value="{{Auth::user()->id}}">
                                                @endif
                                            </div>

                                            
                                 </div>
                                    
                                </div>



                                <div class="col-xl-3 col-xxl-2 col-lg-3 col-md-4 width-50">
                                    <div class="new-patient-input">
                                        <div class="new-patient-ragistration">
                                            From:
                                        </div>
                                        <div>
                                            <input type="date" name="from_date"
                                                class="form-control datetimepicker flatpickr-input active"
                                                value="@if(request()->from_date){{date('Y-m-d',strtotime(request()->from_date))}}@endif"
                                                max="{{date('Y-m-d',time())}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-xxl-2 col-lg-3 col-md-4 width-50">
                                    <div class="new-patient-input">
                                        <div class="new-patient-ragistration">
                                            To:
                                        </div>
                                        <div>
                                            <input type="date" name="to_date"
                                                class="form-control datetimepicker flatpickr-input active"
                                                value="@if(request()->to_date){{date('Y-m-d',strtotime(request()->to_date))}}@endif"
                                                max="{{date('Y-m-d',time())}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-xxl-2 col-lg-2 col-md-4 width-50">
                                    <div class="new-patient-input">
                                       
                                        <div>
                                            <select name="attendance" class="form-control active">
                                                <option value="">Select Attendance</option>
                                                <option @if(request()->attendance=='Present') SELECTED @endif>Present
                                                </option>
                                                <option @if(request()->attendance=='Absent') SELECTED @endif>Absent
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-5 col-xxl-3 col-lg-5 col-md-3">
                                    <button type="submit" class="btn filter  waves-effect" >
                                        Filter </button>
                                    <a href="{{ url('attendance-list') }}"><button type="button"
                                            class="btn reset waves-effect">Reset</button></a>


                                            @if(Auth::user()->user_type==2)

                                       <a type="button" href="{{url('/add-attendance')}}"
                                          class="btn add waves-effect" >Add Attendance </a>

                                       @endif
                                </div>
                            </div>
                        </div>


                    </form>

                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example contact_list" id="data_table">
                                <thead>
                                    <tr>
                                        <th class="center">S.No.<i class="fa fa-long-arrow-up" aria-hidden="true"></i>
                                            <i class="fa fa-long-arrow-down" aria-hidden="true"></i> </th>
                                        <th class="center"> Date <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
                                            <i class="fa fa-long-arrow-down" aria-hidden="true"></i> </th>
                                        <th class="center"> Registration No. <i class="fa fa-long-arrow-up"
                                                aria-hidden="true"></i> <i class="fa fa-long-arrow-down"
                                                aria-hidden="true"></i> </th>
                                        <th class="center"> Shishya Name <i class="fa fa-long-arrow-up"
                                                aria-hidden="true"></i> <i class="fa fa-long-arrow-down"
                                                aria-hidden="true"></i> </th>
                                        <th class="center"> Guru Name <i class="fa fa-long-arrow-up"
                                                aria-hidden="true"></i> <i class="fa fa-long-arrow-down"
                                                aria-hidden="true"></i> </th>
                                        <th class="center"> Attendance <i class="fa fa-long-arrow-up"
                                                aria-hidden="true"></i> <i class="fa fa-long-arrow-down"
                                                aria-hidden="true"></i> </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $k=>$attendance)
                                    <tr class="odd gradeX">
                                        <td class="center">
                                            @if(request()->page){{(((request()->page-1)*10)+$k+1)}}@else{{($k+1)}}@endif
                                        </td>
                                        <td class="center">{{date('d-m-Y',strtotime($attendance->attendance_date))}}
                                        </td>
                                        <td class="center">RAVSH-{{ $attendance->shishya_id }}-{{date('Y')}}</td>
                                        <td class="center">
                                            {{$attendance->shishya_firstname.' '.$attendance->shishya_lastname}}</td>
                                        <td class="center">
                                            {{$attendance->guru_firstname.' '.$attendance->guru_lastname}}</td>
                                        <td class="center">{{$attendance->attendance}}</td>

                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>
                        {{ $data->links('pagination::bootstrap-5') }}
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
    </div>



</section>
@endsection
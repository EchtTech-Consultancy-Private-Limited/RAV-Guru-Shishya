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
                     <h6 class="page-title"> Attendances </h6>

                  </li>
                  <li class="breadcrumb-item bcrumb-1">
                     <a href="{{url('/dashboard')}}">
                        <i class="fas fa-home"></i> Home</a>
                  </li>

                  <li class="breadcrumb-item active"> Attendances </li>
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
                     <h2>
                        Attendances
                        <ul style="float:right; overflow:hidden;">
                           @if(Auth::user()->user_type==1 || Auth::user()->user_type==4)
                           <li style="float:left;clear:none; margin:10px;">Guru:
                           </li>
                           <li style="float:left;clear:none; margin:10px;">
                              <select class="form-control" name="guru_id">
                                 <option value="">Select Guru</option>
                                 @foreach($gurus as $guru)
                                 <option value="{{$guru->id}}" @if(request()->guru_id==$guru->id) SELECTED @endif>{{$guru->firstname.' '.$guru->middlename.' '.$guru->lasttname}}</option>
                                 @endforeach
                              </select>
                           </li>
                           @else
                           <input type="hidden" name="guru_id" value="{{Auth::user()->id}}">
                           @endif
                           <li style="float:left;clear:none; margin:10px;">
                              <select class="form-control" name="shishya_id">
                                 <option value="">Select Shishya</option>
                                 @foreach($shishyas as $shishya)
                                 <option value="{{$shishya->id}}" @if(request()->shishya_id==$shishya->id) SELECTED @endif>{{$shishya->firstname.' '.$shishya->middlename.' '.$shishya->lasttname}}</option>
                                 @endforeach
                              </select>
                           </li>
                           <li style="float:left;clear:none; margin:10px;">From:
                           </li>
                           <li style="float:left;clear:none; margin:10px;">
                              <input type="date" name="from_date" class="form-control datetimepicker flatpickr-input active" value="@if(request()->from_date){{date('Y-m-d',strtotime(request()->from_date))}}@endif" max="{{date('Y-m-d',time())}}">
                           </li>
                           <li style="float:left;clear:none; margin:10px;">
                              TO:
                           </li>
                           <li style="float:left;clear:none; margin:10px;">
                              <input type="date" name="to_date" class="form-control datetimepicker flatpickr-input active" value="@if(request()->to_date){{date('Y-m-d',strtotime(request()->to_date))}}@endif" max="{{date('Y-m-d',time())}}">
                           </li>
                           <li style="float:left;clear:none; margin:10px;">
                              <select name="attendance" class="form-control active">
                                 <option value="">Select Attendance</option>
                                 <option @if(request()->attendance=='Present') SELECTED @endif>Present</option>
                                 <option @if(request()->attendance=='Absent') SELECTED @endif>Absent</option>
                              </select>
                           </li>
                           <li style="float:left;clear:none; margin:10px;">
                              <button type="submit" class="btn btn-primary waves-effect" style="line-height:2;"> Filter </button>
                              <button type="reset" onclick="refreshPage();" class="btn btn-danger waves-effect">Reset</button>
                           </li>
               </form>
               <li style="float:left;clear:none; margin:10px;">
                  <a type="button" href="{{url('/export-attendance')}}" class="btn btn-danger waves-effect" style="line-height:2;"> Download </a>
               </li>
               @if(Auth::user()->user_type==2)
               <li style="float:left;clear:none; margin:10px;">
                  <a type="button" href="{{url('/add-attendance')}}" class="btn btn-danger waves-effect" style="line-height:2;">Add Attendance </a>
               </li>
               @endif
               </ul>


               </h2>

            </div>

            <div class="body">
               <div class="table-responsive">
                  <table class="table table-hover js-basic-example contact_list" id="data_table">
                     <thead>
                        <tr>
                           <th class="center">S.No#</th>
                           <th class="center"> Date </th>
                           <th class="center"> Registration No. </th>
                           <th class="center"> Shishya Name </th>
                           <th class="center"> Guru Name </th>
                           <th class="center"> Attendance </th>

                        </tr>
                     </thead>
                     <tbody>
                        @foreach($data as $k=>$attendance)
                        <tr class="odd gradeX">
                           <td class="center">@if(request()->page){{(((request()->page-1)*10)+$k+1)}}@else{{($k+1)}}@endif</td>
                           <td class="center">{{date('d-m-Y',strtotime($attendance->attendance_date))}}</td>
                           <td class="center">RAVSH-{{ $attendance->shishya_id }}-{{date('Y')}}</td>
                           <td class="center">{{$attendance->shishya_firstname.' '.$attendance->shishya_lastname}}</td>
                           <td class="center">{{$attendance->guru_firstname.' '.$attendance->guru_lastname}}</td>
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
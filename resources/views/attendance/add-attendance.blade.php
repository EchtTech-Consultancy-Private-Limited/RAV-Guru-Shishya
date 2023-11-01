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

                  <div class="header">
                     <h2>

                        <ul style="float:right;">
                           <li style="float:left;clear:none; margin:10px;">From:
                           </li>
                           <li style="float:left;clear:none; margin:10px;">
                              <input type="date" name="from_date" class="form-control datetimepicker flatpickr-input active" value="{{date('Y-m-d',time())}}" max="{{date('Y-m-d',time())}}" required>
                           </li>
                           <li style="float:left;clear:none; margin:10px;">
                              TO:
                           </li>
                           <li style="float:left;clear:none; margin:10px;">
                              <input type="date" name="to_date" class="form-control datetimepicker flatpickr-input active" value="{{date('Y-m-d',time())}}" max="{{date('Y-m-d',time())}}" required>
                           </li>
                           <li style="float:left;clear:none; margin:10px;">
                              <select name="attendance" class="form-control active" required>
                                 <option value="">Select Attendance</option>
                                 <option>Present</option>
                                 <option>Absent</option>
                              </select>
                           </li>
                           <li style="float:left;clear:none; margin:10px;">
                              <button type="submit" class="btn btn-primary waves-effect" style="line-height:2;" onclick="return confirm_option('update attendance for this date range');">Update Attendance </button>

                           </li>
                           <li style="float:left;clear:none; margin:10px;">
                              <a href="{{ url('/attendance-list') }}"><button type="button" class="btn btn-danger waves-effect"> &nbsp; Back &nbsp;</button></a>

                           </li>
                        </ul>


                     </h2>

                  </div>
                  <div class="body">
                     <div class="table-responsive">
                        <table class="table table-hover js-basic-example contact_list">
                           <thead>
                              <th class="center"> <label class="form-check-label form-check-input1"><input type="checkbox" class="form-check-input1" name="checkall" id="checkall" value="1"> Select All </label> </th>
                              <th class="center"> Registration No. </th>
                              <th class="center"> Shishya Name </th>
                              <th class="center"> Guru Name </th>
                              <th class="center"> Contact No. </th>
                              <th class="center"> Created Date </th>

                           </thead>
                           <tbody>
                              @foreach($data as $k=>$user)
                              <tr class="odd gradeX">
                                 <td class="center"><label class="form-check-label form-check-input1"><input name="shishya_ids[]" type="checkbox" class="form-check-input" value="{{$user->id}}"> </label< /td>
                                 <td class="center">RAVSH-{{ $user->id }}-{{date('Y')}}</td>
                                 <td class="center">{{$user->firstname.' '.$user->lastname}}</td>
                                 <td class="center">{{$user->guru_firstname.' '.$user->guru_lastname}}</td>
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

      </form>

   </div>
   </div>
   </div>
</section>
<script src="{{ asset('assets/js/custom-script.js') }} "></script>
@endsection

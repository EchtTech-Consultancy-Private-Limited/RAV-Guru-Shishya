@extends('layouts.app-file')
@section('content')


<section class="content">
   <div class="container-fluid">
      <div class="block-header">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <ul class="breadcrumb breadcrumb-style ">
                  <li class="breadcrumb-item">
                     <h4 class="page-title">Patients history remarks</h4>
                  </li>
                  <li class="breadcrumb-item bcrumb-1">
                     <a>
                     <i class="fas fa-home"></i> Home</a>
                  </li>
                  <li class="breadcrumb-item bcrumb-2">
                     <a href="#" onClick="return false;">PHR Form</a>
                  </li>

               </ul>
            </div>
         </div>
      </div>
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
         <p>{{ $message }}</p>
      </div>
      @endif
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
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
            <!-- <div id="non-printable" class="col-sm-12 p-t-20 text-left no-printme">
                     @if(Auth::user()->user_type == 1)
                     <a href="{{ url('/patients/In-Patient') }}"><button type="button" class="btn back waves-effect float-right me-3"> &nbsp; Back &nbsp;</button></a>
                     @endif
                     @if(Auth::user()->user_type == 2)
                     <a href="{{ url('/guru-patient-list') }}"><button type="button" class="btn back waves-effect float-right me-3"> &nbsp; Back &nbsp;</button></a>
                     @endif
                     @if(Auth::user()->user_type == 3)
                     <a href="{{ url('/new-patient-registration') }}"><button type="button" class="btn back waves-effect float-right me-3"> &nbsp; Back &nbsp;</button></a>
                     @endif

                  </div> -->
               <div class="header">

               </div>
               <form  action="{{ url('guru-remarks') }}" method="post" enctype="multipart/form-data" id="remark-from-guru">

                  <input type="hidden" name="guru_id" value="{{$patient->guru_id}}">
                  <input type="hidden" name="shishya_id" value="{{$patient->shishya_id}}">
                  <input type="hidden" name="patient_id" value="{{$patient->id}}">
                  <input type="hidden" name="patient_type" value="{{$patient->patient_type ?? ''}}">
               @csrf
               <div class="body">
                     <div class="col-sm-12">
                  <div class="row clearfix">
                     <div class="col-md-12">
                        @if(Auth::user()->user_type == 1)
                           @if($patient->patient_type == 'In-Patient')
                              <a href="{{ url('/patients/In-Patient') }}"><button type="button" class="btn back waves-effect float-right me-3"> &nbsp; Back &nbsp;</button></a>
                           @else
                              <a href="{{ url('/patients/OPD-Patient') }}"><button type="button" class="btn back waves-effect float-right me-3"> &nbsp; Back &nbsp;</button></a>
                           @endif
                        @endif
                        @if(Auth::user()->user_type == 2)
                        <a href="{{ url('/guru-patient-list') }}"><button type="button" class="btn back waves-effect float-right me-3"> &nbsp; Back &nbsp;</button></a>
                        @endif
                        @if(Auth::user()->user_type == 3)
                        <a href="{{ url('/new-patient-registration') }}"><button type="button" class="btn back waves-effect float-right me-3"> &nbsp; Back &nbsp;</button></a>
                        @endif
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <div class="">
                              <label >Select User<span class="text-danger">*</span></label>
                                 <select class="form-control" name="user_type" required>
                                    <option value="">Select User</option>
                                    @if(Auth::user()->user_type == 1)
                                       <option value="2">Guru</option>
                                    @endif
                                    @if(Auth::user()->user_type == 2)
                                       <option value="1">Admin</option>
                                       <option value="3">Shishya</option>
                                    @endif
                                    @if(Auth::user()->user_type == 3)
                                       <option value="2">Guru</option>
                                    @endif
                                 </select>
                                 <span class="error"></span>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                            <div class="">
                               <label
                                     for="examp
                                     le-text-input"
                                     class="form-control-label">Remarks/Feedback<span
                                     class="text-danger">*</span></label>
                                  <textarea
                                     cols="45"
                                     rows="1"
                                     name="remarks"
                                     class="form-control"
                                     value=""

                                     placeholder="Remarks" maxlength="200" required></textarea>
                            </div>
                         </div>
                      </div>
                  </div>

                  <div class="col-sm-12 p-t-20 text-center">
                     <button type="reset" onclick="refreshPage();" class="btn reset waves-effect">Reset</button>
                     <button type="submit" class="btn submit waves-effect m-r-15 submit" >Submit</button>
                  </div>

                     </div>


               </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>

@endsection

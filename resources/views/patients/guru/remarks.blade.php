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
               <div class="header">

               </div>
               <form  action="{{ url('guru-remarks') }}" method="post" enctype="multipart/form-data">

                  <input type="hidden" name="guru_id" value="{{ Auth::user()->id }}">
                  <input type="hidden" name="shishya_id" value="{{$patient->shishya_id}}">
                  <input type="hidden" name="patient_id" value="{{$patient->id}}">
               @csrf
               <div class="body">
                     <div class="col-sm-12">
                  <div class="row clearfix">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <div class="form-line">
                              <label >Select User<span class="text-danger">*</span></label>
                                 <select class="form-control" name="user_type" required>
                                    <option value="">Select User</option>
                                    <option value="1">Admin</option>
                                    <option value="3">Shishya</option>
                                 </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                            <div class="form-line">
                               <label
                                     for="examp
                                     le-text-input"
                                     class="form-control-label">Remarks/Feedback<span
                                     class="text-danger">*</span></label>
                                  <textarea
                                     cols="45"
                                     rows="2"
                                     name="remarks"
                                     class="form-control"
                                     value=""

                                     placeholder="Remarks" maxlength="200" required></textarea>
                            </div>
                         </div>
                      </div>
                  </div>

                  <div class="col-sm-12 p-t-20 text-center">
                    <button type="submit" class="btn btn-primary waves-effect m-r-15" >Submit</button>
                    <button type="button" onclick="reset_form();" class="btn btn-danger waves-effect">Reset</button>
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

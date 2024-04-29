@extends('layouts.app-file')
@section('content')

<section class="content">
   <!-- @if (count($errors) > 0)
   <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
   @endif -->
   <div class="container-fluid">
      <div class="block-header">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <ul class="breadcrumb breadcrumb-style ">
                  <li class="breadcrumb-item">
                     <h6 class="page-title"> Today's PHR Reporting </h6>
                  </li>
                  <li class="breadcrumb-item bcrumb-1">
                     <a href="{{url('/dashboard')}}">
                        <i class="fas fa-home"></i> Home </a>
                  </li>
                 
                  <li class="breadcrumb-item active"> Today's PHR Reporting Details </li>
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
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
               <div class="header">
                  <ul class="header-dropdown m-r--5">
                     <li class="dropdown">
                        <a href="#" onClick="return false;" class="dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        </a>
                        <ul class="dropdown-menu float-start">
                           <li>
                              <a href="#" onClick="return
                              false;">Action</a>
                           </li>
                           <li>
                              <a href="#" onClick="return
                              false;">Another action</a>
                           </li>
                           <li>
                              <a href="#" onClick="return
                              false;">Something else here</a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
               <div class="body">
                  <div id="wizard_horizontal">
                     <!--<h2>New History Sheet</h2>-->
                     <section>
                        <div class="col-md-12">
                           <div class="card">
                               <div class="card-body">
                                 <form name="report_search_form" id="report_search_form" method="POST" action="{{url('guru-report-data-search')}}">
                                  @csrf 
                                  <input type="hidden" name="shishya_id" id="shishya_id" value="{{$id}}"/>
                                  <div class="row">
                                          <div class="col-md-2">
                                            <div class="form-group focused">
                                               <label for="example-text-input" class="form-control-label">Report Filter<span class="text-danger">*</span></label>
                                               <input type="date" name="from_date" id="from_date" class="form-control datetimepicker flatpickr-input active" max="{{date('Y-m-d',time())}}" required>
                                            </div>
                                          </div>   
                                          <div class="col-md-2">
                                            <div class="form-group">
                                                <button type="submit" class="btn submit waves-effect m-r-15" id="report_filter_btn">Filter</button>
                                            </div>
                                          </div>  
                                  </div>
                                  </form>  
                                 <h3>Today's PHR Report Details of {{get_user_name($id)}}</h3>
                                 <div id="report-data">
                                    <table class="table table-hover  contact_list no-footer" id="addphrtable" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                    <tr role="row">
                                       <th class="text-left">S.No </th>
                                       <th center sorting>Registration No. </th>
                                       <th>Name of Patient </th>
                                       <th>Date </th>
                                       <th>Diagnosis </th>
                                    </tr>   
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach($phrData as $value) 
                                        <tr>    
                                            <td>{{ $i; }}</td>
                                            <td>{{ $value->registration_no }}</td>
                                            <td>{{ $value->patient_name }}</td>
                                            <td>{{ $value->date }}</td>
                                            <td>{{ $value->diagnosis }}</td>
                                        </tr>
                                        <?php $i++; ?>
                                        @endforeach    
                                    </tbody>
                                 </table>
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

@endsection
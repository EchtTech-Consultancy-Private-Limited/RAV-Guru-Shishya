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
                     <h6 class="page-title"> PHR Reporting </h6>
                  </li>
                  <li class="breadcrumb-item bcrumb-1">
                     <a href="{{url('/dashboard')}}">
                        <i class="fas fa-home"></i> Home </a>
                  </li>
                 
                  <li class="breadcrumb-item active"> PHR Reporting Details </li>
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
                                 <h3>Today's PHR Report Details</h3>
                                 <div id="report-data">
                                    <table>
                                    <thead>
                                       <th>S.No </th>
                                       <th>Name of Shishya</th>
                                       <th>Today's PHR Report Submitted</th>
                                       <th>View Today's Report</th>
                                       <th>Comment</th>
                                       
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach ($data as $key => $user)
                                        
                                        <tr>    
                                            <td>{{ $i; }}</td>
                                            <td>{{ $user->firstname }}</td>
                                            <td><?php echo checkReportStatus($user->id, date('Y-m-d')); ?></td>
                                            <td><a href="{{url('guru-view-today-report')}}/{{$user->id}}">View Report</a></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal_{{$user->id}}">
                                                    Comment
                                                </button>
                                            </td>
                                            
                                        </tr>
                                        <?php $i++; ?>
                                        
                                        <div class="modal" id="myModal_{{$user->id}}">
                                            <div class="modal-dialog">
                                              <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                  <h4 class="modal-title">Please enter your remarks</h4>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <div class="col-md-12">
                                                        <form name="save_comment_form" id="save_comment_form" method="POST" action="{{url('save-comment-from-guru')}}">
                                                        @csrf
                                                        <div class="form-group">
                                                           <label for="example-text-input" class="form-control-label">Remarks<span class="text-danger">*</span></label>
                                                           <input type="text" name="remarks" class="form-control" placeholder="Enter your remarks" aria-label="" value="" maxlength="250" id="remarks">
                                                           <input type="hidden" name="shishya_id" value="{{$user->id}}">
                                                        </div>
                                                        <div class="col-lg-12 p-t-20 text-end">
                                                            <button type="submit" class="btn submit  waves-effect m-r-15">Submit</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                    
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>

                                              </div>
                                            </div>
                                        </div>
                                        
                                        
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
<script src="{{ asset('assets/js/custom-script.js') }}"></script>
@endsection
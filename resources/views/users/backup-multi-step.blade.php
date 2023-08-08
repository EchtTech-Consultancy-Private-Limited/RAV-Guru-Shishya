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
                          
                       <ul class="breadcrumb breadcrumb-style">
                          <li class="breadcrumb-item">
                             <h6 class="page-title"> @if(request()->path()=="patients/In-Patient") In Patients @elseif(request()->path()=="patients/OPD-Patient") OPD Patients @elseif(request()->path()=="admin-patient-list") Patients @endif </h6>
                             <!-- <p style="color:#000;">{{ request()->path() }}</p>   -->
                          </li>
                          <li class="breadcrumb-item bcrumb-1">
                            <a href="{{url('/dashboard')}}">
                             <i class="fas fa-home"></i> Home</a>
                          </li>
                          
                          <li class="breadcrumb-item active"> @if(request()->path()=="patients/In-Patient") In Patients @elseif(request()->path()=="patients/OPD-Patient") OPD Patients @elseif(request()->path()=="admin-patient-list") Patients @endif  </li>
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
        
       <h1>  @if(isset($step2))  {{$step2}}  @endif</h1>
        <div class="col-lg-12 col-md-12 col-sm-12">
				   <div class="card">
				      <div class="body p-5">
				         <div class="wizard">
				           
				             <div class="tab-content">
				                <div class="tab-pane @if(isset($form_step_type)) @if($form_step_type=='step1')  active @elseif($form_step_type=='')  @endif @endif" role="tabpanel"  id="step1">

 							   	<form action="{{ url('manage_profile_form') }}" method="POST" enctype="multipart/form-data">
                              	@csrf
  
				                     <input type="hidden"  name="form_step_type"  class="form-control capitalize" value="step2">
                
				                     <input type="hidden"  name="user_id"  class="form-control capitalize" value="{{ $userdata->id }}">
				                     <input type="hidden"  name="profile_id"  class="form-control capitalize" value="@if(isset($user_profile_data->id)) {{ $user_profile_data->id }} @endif">
				                     <div class="row">
				                        <div class="col-sm-12 col-md-6">
				                           <div class="form-group">
				                              <label >Title<span class="text-danger">*</span></label>
				                              <select name="title" class="form-control">
                                                <option>Select Title </option>
                                                @foreach(__('phr.titlename') as $key=>$value)
                                                   <option @if( $key==$userdata->title) SELECTED @endif value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                               
                                          </select>
				                           </div>
				                        </div>
				                        <!-- student name -->
				                        <div class="col-sm-12 col-md-6">
				                           <!-- guru name -->
				                           <div class="form-group">
				                              <label>First Name<span class="text-danger">*</span></label>
		                                      <input type="text"  name="firstname"  class="form-control capitalize" value="{{ $userdata->firstname }}" placeholder="First Name" >
				                           </div>
				                        </div>
				                     </div>
				                     <div class="row">
				                        <div class="col-sm-12 col-md-6">
				                           <div class="form-group">
				                              <label>Middle Name</label>
                                              <input type="text" name="middlename" class="form-control capitalize" placeholder="Middle Name"  value="{{ $userdata->middlename }}" >
				                           </div>
				                        </div>
				                        <!-- student name -->
				                        <div class="col-sm-12 col-md-6">
				                           <!-- guru name -->
				                           <div class="form-group">
				                              <label>Last Name</label>
                                              <input type="text" name="lastname" class="form-control capitalize" placeholder="Last Name" value="{{ $userdata->lastname }}" >
				                           </div>
				                        </div>
				                     </div>
				                     <div class="row">
				                        <div class="col-sm-12 col-md-6">
				                           <div class="form-group">
				                              <label >Email</label><span class="text-danger">*</span>
				                              <input type="email" name="email" id="email" class="form-control" placeholder="Email"  value="guru@yopmail.com" maxlength="50">
				                           </div>
				                        </div>
				                        <!-- student name -->
				                        <div class="col-sm-12 col-md-6">
				                           <!-- guru name -->
				                           <div class="form-group">
				                              <label >Mobile No.<span class="text-danger">*</span></label>
				                              <input type="number" name="mobile_no" id="mobile_no" class="form-control" placeholder="Mobile No."  value="" maxlength="15">
				                           </div>
				                        </div>
				                     </div>
				                     <div class="row">
				                        <div class="col-sm-12 col-md-12">
				                           <div class="form-group">
				                              <label >User Type<span class="text-danger">*</span></label>
				                              <select name="user_type" class="form-control">
				                                 <option value="">Select User Type</option>
				                                 <option  value="1">Admin</option>
				                                 <option  SELECTED  value="2">Guru</option>
				                                 <option  value="3">Shishya</option>
				                              </select>
				                           </div>
				                        </div>
				                        <!-- student name -->
				                     </div>
				                     <div class="row">
				                        <div class="col-sm-12 col-md-6">
				                           <!-- guru name -->
				                           <div class="form-group">
				                              <label >E-Signature<span class="text-danger">*</span></label>
				                              <input type="file" name="e_sign" id="e_sign" class="form-control" >
				                           </div>
				                        </div>
				                        <div class="col-sm-12 col-md-6">
				                           <div class="form-group ">
				                              <label >Profile Picture<span class="text-danger">*</span></label>
				                              <input type="file" name="profile_image" id="profile_image" class="form-control" >
				                           </div>
				                        </div>
				                     </div>
				                     <ul class="list-inline pull-right">
				                        <li>
				                           <button type="submit" class="btn btn-info next-step">Next</button>
				                        </li>
				                     </ul>

				                    </form>
				                </div>


				                  <div class="tab-pane @if(isset($form_step_type)) @if($form_step_type=='step2') active @endif @endif" role="tabpanel" id="step2" >

				                   <form role="form">
				                   	<input type="hidden"  name="form_step_type"  class="form-control capitalize" value="step3">
				                     <div class="row">
				                        <div class="col-2 education_heading">
				                           High School Details
				                        </div>
				                     </div>
				                     <div class="row">
				                        <div class="col-6">
				                           <label for="school_name">School Name</label>
				                           <input type="text" id="school_name">
				                        </div>
				                        <div class="col-6">
				                           <label for="school_board">Board of School</label>
				                           <input type="text" id="school_board">
				                        </div>
				                     </div>
				                     <div class="row">
				                        <div class="col-6">
				                           <label for="year_passing">Year of Passing</label>
				                           <input type="text" id="year_passing">
				                        </div>
				                        <div class="col-6">
				                           <label for="percentage_marks">Percentage of Marks</label>
				                           <input type="text" id="percentage_marks">
				                        </div>
				                     </div>
				                     <div class="row">
				                        <div class="col-6">
				                           <label for="upload_marksheet">Upload Marks Sheet</label>
				                           <input type="file" id="upload_marksheet">
				                        </div>
				                        <div class="col-6">
				                           <label for="upload_certificate">Upload Certificate</label>
				                           <input type="file" id="upload_certificate">
				                        </div>
				                     </div>
				                     <div class="row">
				                        &nbsp;
				                     </div>
				                     <div class="row">
				                        <div class="col-2 education_heading">
				                           Intermediate Details
				                        </div>
				                     </div>
				                     <div class="row">
				                        <div class="col-6">
				                           <label for="school_name">School Name</label>
				                           <input type="text" id="school_name">
				                        </div>
				                        <div class="col-6">
				                           <label for="school_board">Board of School</label>
				                           <input type="text" id="school_board">
				                        </div>
				                     </div>
				                     <div class="row">
				                        <div class="col-6">
				                           <label for="year_passing">Year of Passing</label>
				                           <input type="text" id="year_passing">
				                        </div>
				                        <div class="col-6">
				                           <label for="percentage_marks">Percentage of Marks</label>
				                           <input type="text" id="percentage_marks">
				                        </div>
				                     </div>
				                     <div class="row">
				                        <div class="col-6">
				                           <label for="upload_marksheet">Upload Marks Sheet</label>
				                           <input type="file" id="upload_marksheet">
				                        </div>
				                        <div class="col-6">
				                           <label for="upload_certificate">Upload Certificate</label>
				                           <input type="file" id="upload_certificate">
				                        </div>
				                     </div>
				                     <div class="row">
				                        &nbsp;
				                     </div>
				                     <div class="row">
				                        <div class="col-2 education_heading">
				                           BMS Details
				                        </div>
				                     </div>
				                     <div class="row">
				                        <div class="col-6">
				                           <label for="school_name">College Name</label>
				                           <input type="text" id="school_name">
				                        </div>
				                        <div class="col-6">
				                           <label for="school_board">University Name</label>
				                           <input type="text" id="school_board">
				                        </div>
				                     </div>
				                     <div class="row">
				                        <div class="col-6">
				                           <label for="year_passing">Courses Name</label>
				                           <input type="text" id="year_passing">
				                        </div>
				                        <div class="col-6">
				                           <label for="percentage_marks">Duration</label>
				                           <input type="text" id="percentage_marks">
				                        </div>
				                     </div>
				                     <div class="row">
				                        <div class="col-6">
				                           <label for="year_passing">Year of Passing</label>
				                           <input type="text" id="year_passing">
				                        </div>
				                        <div class="col-6">
				                           <label for="percentage_marks">Percentage of Marks</label>
				                           <input type="text" id="percentage_marks">
				                        </div>
				                     </div>
				                     <div class="row">
				                        <div class="col-6">
				                           <label for="upload_marksheet">Upload Marks Sheet</label>
				                           <input type="file" id="upload_marksheet">
				                        </div>
				                        <div class="col-6">
				                           <label for="upload_certificate">Upload Certificate</label>
				                           <input type="file" id="upload_certificate">
				                        </div>
				                     </div>
				                     <div class="row">
				                        <div class="col-2 education_heading">
				                           MB/MS Details
				                        </div>
				                     </div>
				                     <div class="row">
				                        <div class="col-6">
				                           <label for="school_name">College Name</label>
				                           <input type="text" id="school_name">
				                        </div>
				                        <div class="col-6">
				                           <label for="school_board">University Name</label>
				                           <input type="text" id="school_board">
				                        </div>
				                     </div>
				                     <div class="row">
				                        <div class="col-6">
				                           <label for="year_passing">Courses Name</label>
				                           <input type="text" id="year_passing">
				                        </div>
				                        <div class="col-6">
				                           <label for="percentage_marks">Duration</label>
				                           <input type="text" id="percentage_marks">
				                        </div>
				                     </div>
				                     <div class="row">
				                        <div class="col-6">
				                           <label for="year_passing">Year of Passing</label>
				                           <input type="text" id="year_passing">
				                        </div>
				                        <div class="col-6">
				                           <label for="percentage_marks">Percentage of Marks</label>
				                           <input type="text" id="percentage_marks">
				                        </div>
				                     </div>
				                     <div class="row">
				                        <div class="col-6">
				                           <label for="upload_marksheet">Upload Marks Sheet</label>
				                           <input type="file" id="upload_marksheet">
				                        </div>
				                        <div class="col-6">
				                           <label for="upload_certificate">Upload Certificate</label>
				                           <input type="file" id="upload_certificate">
				                        </div>
				                     </div>
				                     <ul class="list-inline pull-right">
				                        <li><button type="button" class="btn btn-danger prev-step mr-2">Previous</button></li>
				                        <li><button type="button" class="btn btn-info next-step1">Next</button></li>
				                     </ul>

				                   </form>
				                 </div>



				                  <div class="tab-pane" role="tabpanel" id="step3">
				                  	<form role="form">
				                     <input type="hidden"
				                        name="_token"
				                        value="qEBZKXBwudobGEeMoF6ejMmjkdjX0G7ybzeMRwlU">
				                     <div class="card-body">
				                        <div>
				                           <label for="registration_no">Document Type</label>
				                           <input type="text" id="registration_no">
				                        </div>
				                        <label for="patient_name">Upload Document</label>
				                        <input type="file" id="patient_name">
				                     </div>
				                     <ul class="list-inline pull-right">
				                        <li><button type="button" class="btn btn-danger prev-step1 mr-2">Previous</button></li>
				                        <li><button type="button" class="btn btn-info btn-info-full next-step2">Submit</button></li>
				                     </ul>
				                   </form>
				                  </div>
				                  <div class="clearfix"></div>
				               </div>
				            </form>
				         </div>
				      </div>
				   </div>
				</div>
			</div>
		</div>
	</div>
</section>
 
<!-- step Tabs js -->
     <script>
         $(document).ready(function() {

             $(".next-step").click(function() {
                 $("#step1").removeClass("active");
                 $("#step2").addClass("active");
             });

             $(".prev-step").click(function() {
                 $("#step2").removeClass("active");
                 $("#step1").addClass("active");
             });

             $(".next-step1").click(function() {
                 $("#step2").removeClass("active");
                 $("#step3").addClass("active");
             });

             $(".prev-step1").click(function() {
                 $("#step3").removeClass("active");
                 $("#step2").addClass("active");
             });

         });
     </script>
@endsection
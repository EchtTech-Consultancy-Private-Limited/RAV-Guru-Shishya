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
         <!-- Basic Example | Horizontal Layout -->
         <div class="row clearfix">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
               <div class="header">
                  <ul class="header-dropdown m-r--5">
                     <li class="dropdown">
                        <a href="#" onClick="return false;"
                           class="dropdown-toggle"
                           data-bs-toggle="dropdown"
                           role="button" aria-haspopup="true"
                           aria-expanded="false">
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
               <div class="body">
                  <div id="wizard_horizontal">
                     <h2>Basic/Personal Details</h2>
                     <section>
                        <div class="container d-flex
                           justify-content-center
                           align-items-center w-100">
                           <div class="form w-100">
                              <form action="{{ url('manage_profile_form') }}" method="POST" enctype="multipart/form-data">
                              	@csrf
                              	<input type="hidden"  name="user_id"  class="form-control capitalize" value="{{ $userdata->id }}" placeholder="First Name">
                                 <div class="row">
                                 	<div class="col-sm-12 col-md-6">
                                 		<div class="form-group">
		                                    <label >Title</label>
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
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email"  value="{{ $userdata->email }}" maxlength="50">
		                                 </div>
                                 	</div>
	                                 <!-- student name -->
	                                 <div class="col-sm-12 col-md-6">
	                                 <!-- guru name -->
		                                 <div class="form-group">
		                                    <label >Mobile No.<span class="text-danger">*</span></label>
                                            <input type="number" name="mobile_no" id="mobile_no" class="form-control" placeholder="Mobile No."  value="{{ $userdata->mobile_no }}" maxlength="15">
		                                 </div>
		                             </div>
                                 </div>
                                 <div class="row">
                                 	<div class="col-sm-12 col-md-12">
                                 		<div class="form-group">

                                           <label >User Type<span class="text-danger">*</span></label>
                                            <select name="user_type" class="form-control">
                                               <option value="">Select User Type</option>
                                               @foreach(__('phr.user_type') as $key=>$value)
                                                   <option @if( $key==$userdata->user_type) SELECTED @endif value="{{$key}}">{{$value}}</option>
                                                @endforeach
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

                                             @if($userdata->e_sign!='')
                                             <img src="{{ asset('uploads/'.$userdata->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                             @else
                                             @endif

                                       </div>


                                   </div>
                                 	<div class="col-sm-12 col-md-6">
	                                    <div class="form-group ">
		                                    <label >Profile Picture<span class="text-danger">*</span></label>
                                            <input type="file" name="profile_image" id="profile_image" class="form-control" >
                                            @if($userdata->user_image!='')
                                             <img src="{{ asset('uploads/'.$userdata->user_image) }}" alt="Profile-Image" width="100px;" height="80px;">
                                             @else
                                             @endif
		                                 </div>
		                             </div>
                                   </div>
		                             <!-- <button type="submit" class="btn btn-primary"> Submit </button> -->

                               </form>
                           </div>
                        </div>
                     </section>
                     <h2>Educational Details</h2>
                     <section>
                        <div class="">
                           <form action="" class="form2 " >
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
                           </form>
                     </section>
                     <h2>Documents Details</h2>
                     <section>
                     <div class="card">
                     <form
                        class="javavoid(0)">
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
                     </form>
                     </div>
                     </section>
                     <h2>Account Details</h2>
                     <section>
                     <div class="card">
                     <form
                        class="javavoid(0)">
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
                    </form>
                     </div>
                     </section>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
<script>
     jQuery.noConflict();
     // Use jQuery via jQuery() instead of via $()
     jQuery(document).ready(function(){
      jQuery('#btn').on("click",function(){ alert();});
     });
</script>
<script>
//href="#next"




</script>


@endsection

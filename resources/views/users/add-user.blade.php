@extends('layouts.app-file')
@section('content')

<!-- [ Main Content ] start -->
<div class="pcoded-main-container-fluid">
	<div class="pcoded-content">
		<!-- [ breadcrumb ] start -->
		<!-- <div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-6">
						<div class="page-header-title">
							<h5>User List</h5>
						</div>
						
					</div>
					<div class="col-md-6 text-end">
                        <button class="btn btn-success btn-sm btn-round has-ripple" data-bs-toggle="modal" data-bs-target="#modal-report"><i class="feather icon-plus"></i> Product</button>
                    </div>
				</div>
			</div>
		</div> -->
		<!-- [ breadcrumb ] end -->
		<!-- [ Main Content ] start -->
		<section class="pcoded-main-container1">
		   <div class="pcoded-content-dashboard">
		      <div class="row">
		         <!-- Zero config table start -->
		         <div class="col-sm-12">
		            <div class="card">
		               <div class="card-header">
		                  <div class="row">
		                     <div class="col-sm-12 col-md-6">
		                        <h5>List All Users</h5>
		                     </div>
		                     <div class="col-sm-6 text-end">
                                <button class="btn btn-success btn-sm btn-round has-ripple" data-bs-toggle="modal" data-bs-target="#modal-report"><i class="feather icon-plus"></i> Add User</button>
                            </div>
		                  </div>
		               </div>
		               <div class="card-body">
		                  <div class="dt-responsive table-responsive">
		                     <table id="simpletable updateTable" class="table table-striped table-bordered nowrap yajra-datatable" >
		                        <thead>
		                           <tr>
		                              <th>No</th>
		                              <th>Name</th>
		                              <th>Email</th>
		                              
		                              <th>Action</th>
		                           </tr>
		                        </thead>
		                        <tbody id="tablebodya"></tbody>
		                     </table>
		                  </div>
		               </div>
		            </div>
		         </div>
		      </div>
		      <!-- [ Main Content ] end -->
		   </div>
		</section>
		<!-- [ Main Content ] end -->
		<!--start edit circulars model form -->
		<div class="modal fade bd-example-modal-editlocation" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" >
		   <div class="modal-dialog modal-xl">
		      <div class="modal-content">
		         <div class="modal-header">
		            <h5 class="modal-title" id="exampleModalLabel">Edit Circular </h5>
		            <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">&times;</span>
		            </button>
		         </div>
		         <div class="row m-b-1" style="padding:30px;">
		            <div class="col-md-12">
		               <form class="m-b-1 add" method="post" name="edit_circular" id="edit_circular">
		                  <input type="hidden" name="added_by" value="1">
		                  <input type="hidden" name="id" id="edit_circulars_id">
		                  <div class="bg-white">
		                     <div class="box-block">
		                        <div class="row">
		                           <div class="col-sm-6">
		                              <div class="form-group">
		                                 <label for="Title">Title</label>
		                                 <input class="form-control" placeholder="Title" name="title" type="text" id="title-edit">
		                                 <span class="text-danger" id="title-error"></span>
		                              </div>
		                              <div class="form-group">
		                                 <label for="company_name">Company</label>
		                                 <select class="form-control slct-field-sizing" name="company" id="company-list-edit">
		                                    <option value="">Select Company</option>
		                                 </select>
		                                 <span class="text-danger" id="company-error"></span>
		                              </div>
		                              <div class="form-group">
		                                 <label for="Department">Department</label>
		                                 <select class="form-control slct-field-sizing" name="department" id="dept-list-edit">
		                                    <option value="">Select Department</option>
		                                 </select>
		                                 <span class="text-danger" id="department-error"></span>
		                              </div>
		                           </div>
		                           <div class="col-sm-6">
		                              <div class="form-group">
		                                 <div class="row">
		                                    <div class="col-md-6">
		                                       <div class="form-group">
		                                          <label for="Issue Date">Issue Date</label>
		                                          <input class="form-control" placeholder="Issue Date" name="start_date" id="start_date_edit" type="date">
		                                          <span class="text-danger" id="issue-error"></span>
		                                       </div>
		                                    </div>
		                                    <div class="col-md-6">
		                                       <div class="form-group">
		                                          <label for="Ending Date">Ending Date</label>
		                                          <input class="form-control" placeholder="Ending Date" name="end_date" id="end_date_edit" type="date">
		                                          <span class="text-danger" id="ending-error"></span>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </div>
		                              <div class="form-group">
		                                 <div class="form-group">
		                                    <label for="location">Location</label>
		                                    <select class="form-control slct-field-sizing" name="location" id="location-list-edit">
		                                       <option value="">Select Location</option>
		                                    </select>
		                                    <span class="text-danger" id="company-error"></span>
		                                 </div>
		                              </div>
		                           </div>
		                           <div class="form-group">
		                              <div class="row">
		                                 <div class="col-sm-12">
		                                     
		                                    <div class="card">
		                                       <div class="card-header" id="editor-edit1-append">
		                                          <h5>Description </h5>
		                                          
		                                       </div>
		                                      
		                                    </div>
		                                 </div>
		                              </div>
		                              <div class="row">
		                                 <div class="col-md-6">
		                                    <label for="Summary">Summary</label>
		                                    <input class="form-control" placeholder="Summary" name="summary" id="summary-edit" type="text">
		                                    <span class="text-danger" id="summary-error"></span><br>
		                                 </div>
		                                 <div class="col-md-6">
		                                    <label for="Document">Document</label>
		                                    <div class="form-group">
		                                       <input type="file" class="form-control" name="document" id="Icon" placeholder="logo">
		                                       <img id="document-edit" style="float:right;">
		                                    </div>
		                                 </div>
		                              </div>
		                           </div>
		                        </div>
		                        <div class="text-right">
		                           <button type="button" id="update_circular_btn" class="btn btn-primary save">Save
		                           </button>
		                           <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">
		                           Close
		                           </button>
		                        </div>
		                     </div>
		                  </div>
		               </form>
		            </div>
		         </div>
		      </div>
		   </div>
		</div>
		<!--start add user model form -->
            <div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
			    <div class="modal-dialog modal-xl">
			        <div class="modal-content">
			            <div class="modal-header">
			                <!-- <h5 class="modal-title">User</h5> -->
			                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
			                </button>
			            </div>
			            <div class="modal-body">
			                <form action="{{ route('users.store') }}" method="POST">
			                    <div class="row">
			                        <!-- <div class="col-12">
			                            <h5>Personal Information</h5>
			                        </div> -->
			                        <div class="col-sm-6">
			                            <div class="form-group">
			                                <label class="floating-label" for="Name">Name</label>
			                                <input type="text" class="form-control" id="Name" name="Name" placeholder="">
			                            </div>
			                        </div>
			                        <div class="col-sm-6">
			                            <div class="form-group fill">
			                                <label class="floating-label" for="Email">Email</label>
			                                <input type="email" name="email" class="form-control" id="Email" placeholder=""><br><br>
			                            </div>
			                        </div>
			                        <div class="col-sm-6">
			                            <div class="form-group fill">
			                                <label class="floating-label" for="Password">Password</label>
			                                <input type="password" class="form-control" name="password" id="Password" placeholder="">
			                            </div>
			                        </div>
			                        <div class="col-sm-6">
			                            <div class="form-group fill">
			                                <label class="floating-label" for="Password">Confirm Password</label>
			                                <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="">
			                            </div>
			                        </div>

			                        <div class="col-sm-6">
			                            <div class="form-group fill">
			                                <strong>Role:</strong>
                                           
			                            </div>
			                        </div>
			                        
			                        
			                        
			                      
			                        <div class="col-sm-12">
			                            <button type="submit" class="btn btn-primary">Submit</button>
			                            <button class="btn btn-danger">Clear</button>
			                        </div>
			                    </div>
			                </form>
			            </div>
			        </div>
			    </div>
			</div>
        <!--end add user model form -->
	</div>
</div>
<script src="{{ asset('assets/js/custom/users.js') }}"></script> 

@endsection
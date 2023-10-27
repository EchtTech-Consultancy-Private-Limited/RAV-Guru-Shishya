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
               <div class="body">
                  <div id="wizard_horizontal">
                     <h2>History Sheet List</h2>
                     <section>
                        <div class="container d-flex
                           justify-content-center
                           align-items-center w-100">
                          
                           <div class="body">
                  <div class="table-responsive">
                     <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row"><div class="col-sm-12"><table class="table table-hover js-basic-example contact_list dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                           <tr role="row"><th class="center sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" No : activate to sort column descending" style="width: 61.975px;"> S.No. </th><th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Name : activate to sort column ascending" style="width: 131.9px;"> Patient Name </th><th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Email : activate to sort column ascending" style="width: 200.55px;"> Guru Name </th><th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" User Type : activate to sort column ascending" style="width: 141.25px;"> Student Name </th><th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending" style="width: 174.837px;">Created Date </th><th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Status : activate to sort column ascending" style="width: 102.2px;"> Status </th><th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Action : activate to sort column ascending" style="width: 102.787px;"> Action </th></tr>
                        </thead>
                        <tbody>
                                                                                       
                                                            
                                                            
                                                            
                                                                                    
                        <tr class="gradeX odd">
                                 <td class="center sorting_1">1</td>
                                 <td class="center">Sumit</td>
                                 <td class="center">Satish Kumar Singh</td>
                                 <td class="center">
                                    
                                    <!--                                                                                 -->
               Rohit
                                                                     </td> 
                                 <td class="text-center">
                                    14-04-2023
                                 </td>
                                 <td class="text-center">
                                                                  <a href="void(0)" class=" btn-tbl-edit " title="Verify Users">
                                       <i class="fas fa-ban"></i>
                                    </a>
                                                                     

                           
                                 </td>
                                 <td class="center">
                                   
                                    <a href="void(0)" class="btn btn-tbl-edit" title="Edit">
                                       <i class="material-icons">edit</i>
                                    </a>
                                                                                                            <a href="void(0)" class="btn btn-tbl-delete" onclick="delete_user()">
                                       <i class="material-icons">delete_forever</i>
                                    </a>
                                      
                                                                     
                                 </td>
                                 
                              </tr><tr class="gradeX even">
                                 <td class="center sorting_1">2</td>
                                 <td class="center">Satish</td>
                                 <td class="center">Satish Kumar Singh</td>
                                 <td class="center">
                                    
                                    <!--                                                                                 -->
               Rohit
                                                                     </td> 
                                 <td class="text-center">
                                    14-04-2023
                                 </td>
                                 <td class="text-center">
                                                                  <a href="void(0)" class=" btn-tbl-edit " title="Verify Users">
                                       <i class="fas fa-ban"></i>
                                    </a>
                                                                     

                           
                                 </td>
                                 <td class="center">
                                   
                                    <a href="void(0)" class="btn btn-tbl-edit" title="Edit">
                                       <i class="material-icons">edit</i>
                                    </a>
                                                                                                            <a href="void(0)" class="btn btn-tbl-delete" onclick="delete_user()">
                                       <i class="material-icons">delete_forever</i>
                                    </a>
                                      
                                                                     
                                 </td>
                                 
                              </tr><tr class="gradeX odd">
                                 <td class="center sorting_1">3</td>
                                 <td class="center">Neeraj</td>
                                 <td class="center">Satish Kumar Singh</td>
                                 <td class="center">
                                    
                                    <!--                                                                                 -->
               Rohit
                                                                     </td> 
                                 <td class="text-center">
                                    14-04-2023
                                 </td>
                                 <td class="text-center">
                                                                  <a href="void(0)" class=" btn-tbl-edit " title="Verify Users">
                                       <i class="fas fa-ban"></i>
                                    </a>
                                                                     

                           
                                 </td>
                                 <td class="center">
                                  
                                    <a href="void(0)" class="btn btn-tbl-edit" title="Edit">
                                       <i class="material-icons">edit</i>
                                    </a>
                                                                                                            <a href="void(0)" class="btn btn-tbl-delete" onclick="delete_user()">
                                       <i class="material-icons">delete_forever</i>
                                    </a>
                                             
                                                                     
                                 </td>
                                 
                              </tr><tr class="gradeX even">
                                 <td class="center sorting_1">4</td>
                                 <td class="center">Sumit Yadav</td>
                                 <td class="center">Satish Kumar Singh</td>
                                 <td class="center">
                                    
                                    <!--                                                                                 -->
               Rohit
                                                                     </td> 
                                 <td class="text-center">
                                    13-04-2023
                                 </td>
                                 <td class="text-center">
                                                                  <a href="void(0)" class=" btn-tbl-edit " title="Verify Users">
                                       <i class="fas fa-ban"></i>
                                    </a>
                                                                     

                           
                                 </td>
                                 <td class="center">
                                  
                                    <a href="void(0)" class="btn btn-tbl-edit" title="Edit">
                                       <i class="material-icons">edit</i>
                                    </a>
                                                                                                            <a href="void(0)" class="btn btn-tbl-delete" onclick="delete_user()">
                                       <i class="material-icons">delete_forever</i>
                                    </a>
                                        
                                                                     
                                 </td>
                                 
                              </tr></tbody>
                     </table></div></div>
                     
                  </div>
               </div>

                           
                        </div>
                     </section>
                     <h2>Patient History Report</h2>
                     <section>
                     
                        <div class="card">
                    <form role="form" method="POST" action='' enctype="multipart/form-data">
                        @csrf
                        
                        <div class="card-body">
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Name of the Student</label>
                                        <input type="text" name="student_name" class="form-control" placeholder="Name of the Student" aria-label="Name" value="{{ old('student_name') }}" >@error('firstname') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Name of the Guru</label>
                                        <input type="text" name="guru_name" class="form-control" placeholder="Name of the Guru" aria-label="Name" value="{{ old('guru_name') }}" >
                                        @error('lastname') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Patient History Report (PHR) (with month name)</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">From:</label>
                                        <input type="date" name="student_name" class="form-control" placeholder="Date" aria-label="Name" value="{{ old('student_name') }}" >@error('firstname') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror

                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">To:</label>
                                        <input type="date" name="student_name" class="form-control" placeholder="Date" aria-label="Name" value="{{ old('student_name') }}" >@error('firstname') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                </div>
                        </div>
                       
                     
                                

                        <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Student's
                                                                            E-Sign</label>
                                                                            @if(Auth::user()->e_sign!='')
                                                                              <img src="{{ asset('uploads/'.Auth::user()->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                                                             @endif
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Guru's
                                                                            E-Sign</label>
                                                                            @if($guru->e_sign!='')
                                                                              <img src="{{ asset('uploads/'.$guru->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                                                             @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                    <button class="btn filter btn-primary btn-sm ms-auto nextBtn" type="button" >Filter</button>
                        </div>   
                             
                    </form>
                </div>

                <div class="card">
                    <form role="form" method="POST" action='' enctype="multipart/form-data">
                        @csrf
                       
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">INDEX</label>
                                    </div>
                                </div>
                               
                            <br>
                            <div class="row" style="overflow-x:auto;">
                            <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" style="border:
                                                                        1px solid
                                                                        grey">SN.</th>
                                                                    <th scope="col" style="border:
                                                                        1px solid
                                                                        grey">Registration No</th>
                                                                    <th scope="col" style="border:
                                                                        1px solid
                                                                        grey">Date</th>
                                                                    <th scope="col" style="border:
                                                                        1px solid
                                                                        grey">Name of Patient</th>
                                                                    <th scope="col" style="border:
                                                                        1px solid
                                                                        grey">Diagnosis</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row" style="border:
                                                                        1px solid
                                                                        grey">1</th>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" style="border:
                                                                        1px solid
                                                                        grey">2</th>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" style="border:
                                                                        1px solid
                                                                        grey">3</th>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        </div>

                                                       
                        </div>

                        
                    </form>
                </div>
                    
                     </section>
                     <h2>Quarterly Follow-up Report </h2>
                     <section>
                     
                        <div class="card">
                    <form role="form" method="POST" action='' enctype="multipart/form-data">
                        @csrf
                        
                        <div class="card-body">
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Name of the Student</label>
                                        <input type="text" name="student_name" class="form-control" placeholder="Name of the Student" aria-label="Name" value="{{ old('student_name') }}" >@error('firstname') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Name of the Guru</label>
                                        <input type="text" name="guru_name" class="form-control" placeholder="Name of the Guru" aria-label="Name" value="{{ old('guru_name') }}" >
                                        @error('lastname') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                </div>
                        </div>
                        
                       
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Quartely  Follow-up Report  (with  month name)</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">From:</label>
                                        <input type="date" name="student_name" class="form-control" placeholder="Date" aria-label="Name" value="{{ old('student_name') }}" >@error('firstname') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">To:</label>
                                        <input type="date" name="student_name" class="form-control" placeholder="Date" aria-label="Name" value="{{ old('student_name') }}" >@error('firstname') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                </div>
                        </div>
                                

                        <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Shishya's E-sign's</label>
                                                                            @if(Auth::user()->e_sign!='')
                                                                              <img src="{{ asset('uploads/'.Auth::user()->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                                                             @endif
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Guru's
                                                                            E-Sign</label>
                                                                            @if($guru->e_sign!='')
                                                                              <img src="{{ asset('uploads/'.$guru->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                                                             @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                    <button class="btn filter btn-primary btn-sm ms-auto nextBtn" type="button" >Filter</button>
                        </div>   
                             
                        <br>
                            <div class="row" style="overflow-x:auto;">
                            <table class="table" >
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" style="border:
                                                                        1px solid
                                                                        grey">Date</th>
                                                                    <th scope="col" style="border:
                                                                        1px solid
                                                                        grey">Daily Progress
                                                                        No.</th>
                                                                    <th scope="col" style="border:
                                                                        1px solid
                                                                        grey">Treatment/Theerapies</th>
                                                                    <th scope="col" style="border:
                                                                        1px solid
                                                                        grey">Weekly Progress</th>
                                                                    <th scope="col" style="border:
                                                                        1px solid
                                                                        grey">Montyly Progress</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row" style="border:
                                                                        1px solid
                                                                        grey">1</th>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" style="border:
                                                                        1px solid
                                                                        grey">2</th>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" style="border:
                                                                        1px solid
                                                                        grey">3</th>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                    </form>
                </div>
                    
                     
                     </section>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>      
@endsection
@extends('layouts.app-file')

@section('content')


<section class="content">
    <div class="container-fluid">
       <div class="block-header">
          <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style ">
                   <li class="breadcrumb-item">
                      <h4 class="page-title">System Setting</h4>
                   </li>
                   <li class="breadcrumb-item bcrumb-1">
                      <a href="http://localhost/Guru_shishya_parampara/rav-guru-shishya-parampara/public/dashboard">
                      <i class="fas fa-home"></i> Home</a>
                   </li>
                   <li class="breadcrumb-item bcrumb-2">
                      <a href="http://localhost/Guru_shishya_parampara/rav-guru-shishya-parampara/public/shishya-list" onclick="return true;">User</a>
                   </li>
                   <li class="breadcrumb-item active">System Setting</li>
                </ul>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
             <div class="card">
              
                <form method="POST" action="#">
                   <div class="body">
                      
                      <div class="row clearfix">
                         <div class="col-sm-6">
                            <div class="form-group">
                               <div class="form-line">
                                  <strong>Project Name</strong>
                                  <input placeholder="Project Name" class="form-control" name="project_name" type="text" value="">
                               </div>
                            </div>
                         </div>
                         <div class="col-sm-6">
                            <div class="form-group">
                               <div class="form-line">
                                  <strong>Sort Description</strong>
                                  <textarea class="form-control" placeholder="Write here..."></textarea>
                               </div>
                            </div>
                         </div>
                         <div class="col-sm-6">
                            <div class="form-group">
                               <div class="form-line">
                                  <strong>Long Description</strong>
                                  <textarea class="form-control" placeholder="Write here..."></textarea>
                               </div>
                            </div>
                         </div>

                         <div class="col-sm-6">
                            <div class="form-group">
                               <div class="form-line">
                                  <strong>Address</strong>
                                  <textarea class="form-control" placeholder="Write here..."></textarea>
                               </div>
                            </div>
                         </div>

                         <div class="col-sm-6">
                            <div class="form-group">
                               <div class="form-line">
                                  <strong>Logo</strong>
                                  <input  type="file" class="form-control" placeholder="Logo">
                               </div>
                            </div>
                         </div>

                         <div class="col-sm-6">
                            <div class="form-group">
                               <div class="form-line">
                                  <strong>Favicon</strong>
                                  <input  type="file" class="form-control" placeholder="Favicon">
                               </div>
                            </div>
                         </div>
                     
                         <div class="col-sm-6">
                            <div class="form-group">
                               <div class="form-line">
                                  <strong>Copyright</strong>
                                  <input placeholder="Copyright" class="form-control" type="text" value="">
                               </div>
                            </div>
                         </div>


                         <div class="col-sm-6">
                            <div class="form-group">
                               <div class="form-line">
                                  <strong>User Name</strong>
                                  <input placeholder="User Name" class="form-control" name="user_name" type="text" value="">
                               </div>
                            </div>
                         </div>

                         <div class="col-sm-6">
                            <div class="form-group">
                               <div class="form-line">
                                  <strong>Email</strong>
                                  <input placeholder="Email" class="form-control" name="email" type="text" value="">
                               </div>
                            </div>
                         </div>

                         <div class="col-sm-6">
                            <div class="form-group">
                               <div class="form-line">
                                  <strong>Contact No</strong>
                                  <input type="text" name="contact_no" class="form-control" placeholder="Contact No" maxlength="10">
                               </div>
                            </div>
                         </div>

                         <div class="col-sm-6">
                            <div class="form-group">
                               <div class="form-line">
                                  <strong>Meta Tag Title</strong>
                                  <textarea class="form-control" placeholder="Write here..."></textarea>
                               </div>
                            </div>
                         </div>
                         
                         <div class="col-sm-6">
                            <div class="form-group">
                               <div class="form-line">
                                  <strong>Meta Tag Keywords</strong>
                                  <textarea class="form-control" placeholder="Write here..."></textarea>
                               </div>
                            </div>
                         </div>

                         <div class="col-sm-12">
                            <div class="form-group">
                               <div class="form-line">
                                  <strong>Meta Tag Desc</strong>
                                  <textarea class="form-control" placeholder="Write here..."></textarea>
                               </div>
                            </div>
                         </div>                        

                         <div class="col-sm-6">
                            <div class="form-group">
                               <div class="form-line">
                                  <strong>Facebook Link</strong>
                                  <input placeholder="Facebook Link " class="form-control" type="text" value="">
                               </div>
                            </div>
                         </div>

                         <div class="col-sm-6">
                            <div class="form-group">
                               <div class="form-line">
                                  <strong> Instagram Link </strong>
                                  <input placeholder="Instagram Link" class="form-control" type="text" value="">
                               </div>
                            </div>
                         </div>

                         <div class="col-sm-6">
                            <div class="form-group">
                               <div class="form-line">
                                  <strong>Linkedin Link </strong>
                                  <input placeholder="Linkedin Link" class="form-control" type="text" value="">
                               </div>
                            </div>
                         </div>

                         <div class="col-sm-6">
                            <div class="form-group">
                               <div class="form-line">
                                  <strong> Twitter Link </strong>
                                  <input placeholder="Twitter Link" class="form-control" type="text" value="">
                               </div>
                            </div>
                         </div>
                    
                     
                         <div class="col-sm-12">
                            <button type="submit" class="btn btn-info waves-effect" style="line-height:2;"> Submit </button>
                            <button type="reset" class="btn btn-danger waves-effect" style="line-height:2;"> Reset </button>
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
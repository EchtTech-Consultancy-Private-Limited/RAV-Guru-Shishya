@extends('layouts.app-file')
@section('content')

<section class="content">
   <div class="container-fluid">
      <div class="block-header">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <p>{{ $message }}</p>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
               <ul class="breadcrumb breadcrumb-style ">
                  <li class="breadcrumb-item">
                     <h4 class="page-title">Add System Settings</h4>
                  </li>
                  <li class="breadcrumb-item bcrumb-1">
                     <a href="{{url('/dashboard')}}">
                     <i class="fas fa-home"></i> Home</a>
                  </li>
                  
                  <li class="breadcrumb-item active">Add System Settings</li>
               </ul>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
               <div class="header">
                  <h2>
                     <strong>Add</strong> System Settings
                  </h2>

               </div>
               <form action="{{ route('system-configrations') }}" method="post" enctype="multipart/form-data">
               	<input type="hidden"  name="id" value="@if(isset($system->id)){{ $system->id }}@endif">
               @csrf
                  <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-4">
                           <div class="form-group">
                              <div class="form-line">
                                 <label>Project Name</label>
                                 <input type="text" class="form-control" name="project_name" placeholder="Project Name" value="@if(isset($system->project_name)){{ $system->project_name }}@endif">
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-4">
                           <div class="form-group">
                              <div class="form-line">
                                 <label >Admin Name</label>
                                 <input type="text" class="form-control" name="user_name" placeholder="Admin Name" value="@if(isset($system->user_name)){{ $system->user_name }}@endif">
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-4">
                           <div class="form-group">
                              <div class="form-line">
                                 <label >Email</label>
                                 <input type="text" class="form-control" name="email" placeholder="Email" value="@if(isset($system->email)){{ $system->email }}@endif">
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <div class="form-line">
                                 <label >Contact No.</label>
                                 <input type="text" class="form-control" name="contact_no" placeholder="Contact No." value="@if(isset($system->contact_no)){{ $system->contact_no }}@endif">
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <div class="form-line">
                                 <label >Address</label>
                                 <input type="text" class="form-control" name="address" placeholder="Address" value="@if(isset($system->address)){{ $system->address }}@endif">
                              </div>
                           </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                           <div class="form-group">
                              <div class="form-line">
                                 <label>Logo</label>
                                 <input type="file" class="form-control" name="logo" >
                                 @if(isset($system->logo))
                                 <img src="{{ asset('uploads/'.$system->logo) }}" width="200px;" height="100px;">
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <div class="form-line">
                                 <label >Favicon Icon</label>
                                 <input type="file" class="form-control" name="favicon" >
                                 @if(isset($system->favicon))
                                 <img src="{{ asset('uploads/'.$system->favicon) }}" width="200px;" height="100px;">
                                 @endif
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <div class="form-line">
                                 <label >Long Description</label>
                                 <textarea name="long_descp" class="form-control" cols="40" rows="3">@if(isset($system->long_description)){{ $system->long_description }}@endif</textarea>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <div class="form-line">
                                 <label >Short Description</label>
                                 <textarea name="short_descp" class="form-control" cols="40" rows="3">@if(isset($system->short_description)){{ $system->short_description }}@endif
                                 </textarea>
                              </div>
                           </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-sm-6">
                           <div class="form-group">
                              <div class="form-line">
                                 <label>Copyright</label>
                                 <input type="text" class="form-control" name="copyright" placeholder="Copyright" value="@if(isset($system->copyright)){{ $system->copyright }}@endif">
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <div class="form-line">
                                  <label>Meta Tag Title</label>
                                 <input type="text" class="form-control" name="meta_tag_title" placeholder="Meta Tag Title" value="@if(isset($system->meta_tag_title)){{ $system->meta_tag_title }}@endif">
                              </div>
                           </div>
                        </div>
                       <div class="col-sm-6">
                           <div class="form-group">
                              <div class="form-line">
                                  <label>Meta Tag Keywords</label>
                                 <input type="text" class="form-control" name="meta_tag_keywords" placeholder="Meta Tag Keywords" value="@if(isset($system->meta_tag_keywords)){{ $system->meta_tag_keywords }}@endif">
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <div class="form-line">
                                 <label >Meta Tag Descriptions</label>
                                 <textarea name="meta_tag_desc" class="form-control" cols="40" rows="3">@if(isset($system->meta_tag_desc)){{ $system->meta_tag_desc }}@endif</textarea>
                              </div>
                           </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                           <div class="form-group">
                              <div class="form-line">
                                 <label>Facebook</label>
                                 <input type="text" class="form-control" name="facebook" placeholder="Facebook" name="facebook" value="@if(isset($system->facebook)){{ $system->facebook }}@endif">
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <div class="form-line">
                                  <label>Inatagram</label>
                                 <input type="text" class="form-control" placeholder="Instagram" name="instagram" value="@if(isset($system->instagram)){{ $system->instagram }}@endif">
                              </div>
                           </div>
                        </div>
                       <div class="col-sm-6">
                           <div class="form-group">
                              <div class="form-line">
                                  <label>Linkedin</label>
                                 <input type="text" class="form-control" name="linkedin" placeholder="Linkedin" name="linkedin" value="@if(isset($system->linkedin)){{ $system->linkedin }}@endif">
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <div class="form-line">
                                  <label>Twitter</label>
                                 <input type="text" class="form-control" name="twitter" placeholder="Twitter" name="twitter" value="@if(isset($system->twitter)){{ $system->twitter }}@endif">
                              </div>
                           </div>
                        </div>
                    </div>
                     
                    
                     <div class="col-lg-12 p-t-20 text-center">
                        <button type="submit" class="btn btn-primary waves-effect m-r-15" >@if(isset($system->id)) Update @else Add @endif System Settings</button>
                        
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>

@endsection
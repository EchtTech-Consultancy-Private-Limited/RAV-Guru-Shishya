@extends('layouts.app-file')
@section('content')


<section class="content">
   <div class="container-fluid">
      <div class="block-header">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                     <p>{{ $message }}</p>
                  </div>
                
                  @endif
               <ul class="breadcrumb breadcrumb-style ">
                  <li class="breadcrumb-item">
                     <h4 class="page-title">Add Menu</h4>
                  </li>
                  <li class="breadcrumb-item bcrumb-1">
                     <a>
                     <i class="fas fa-home"></i> Home</a>
                  </li>
                  <li class="breadcrumb-item bcrumb-2">
                     <a href="#" onClick="return false;">Menu</a>
                  </li>
                  <li class="breadcrumb-item active">Add Menu</li>
               </ul>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
               <div class="header">
                  <h2>
                     <strong>Add</strong> Menu
                  </h2>
               </div>
               <form action="{{ url('add-new-menu') }}" method="post">
               @csrf
               <div class="body">
                  <div class="row clearfix">
                     <div class="col-sm-4">
                        <div class="form-group">
                           <div class="form-line">
                              <label class="form-label">Menu Name</label>
                              <input type="text" class="form-control" name="name" placeholder="Menu Name">
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                           <div class="form-line">
                              <label class="form-label">URL</label>
                              <input type="text" class="form-control" name="url" placeholder="Url">
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                           <div class="form-line">
                               <label class="form-label">Select Parent</label>
                                <select class="form-control" name="parent_id">
                                    <option value>Select Parent Menu...</option>
                                    @foreach($menu as $menus)
                                         <option value="{{ $menus->id}}">{{ $menus->name}}</option>
                                    @endforeach
                                </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                 
                  <div class="col-lg-12 p-t-20 text-center">
                     <button type="submit" class="btn submit btn-primary waves-effect m-r-15">Submit</button>
                     <button type="button" class="btn delete btn-danger waves-effect">Cancel</button>
                  </div>
               </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>






<!-- <table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Menu Name</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($allmenu as $key => $menuslist)
  <tr>
  	<td>{{ $key+1 }}</td>
    <td>{{ $menuslist->name }}</td>
    <td>
    	<a href="{{ url('edit-menu/'.$menuslist->id) }}" class="btn btn-secondary  btn-sm"  data-toggle="modal" data-target=".bd-example-modal-viewcircular"><i class="feather icon-edit" aria-hidden="true"></i></a>

    	<a onclick="return delete_menu();"  href="{{ url('menu-dlt/'.$menuslist->id) }}" class="btn btn-danger  btn-sm"  data-toggle="modal" data-target=".bd-example-modal-viewcircular"><i class="feather icon-delete" aria-hidden="true"></i></a>
    </td>
   
  </tr>
 @endforeach
</table> -->

<section class="content">
   <div class="container-fluid">
      <div class="block-header">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                 
               
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
               
               <div class="body">
                  <div class="table-responsive">
                     <table class="table table-hover js-basic-example contact_list">
                        <thead>
                           <tr>
                              
                              <th class="center"> No </th>
                              <th class="center"> Menu Name </th>
                              <th class="center"> Action </th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($allmenu as $key => $menuslist)
                           <tr class="odd gradeX">
                              <td class="center">{{ $key+1 }}</td>
                              <td class="center">{{ $menuslist->name }}</td>
                              
                               <td class="center">
                                    <a href="{{ url('edit-menu/'.$menuslist->id) }}" class="btn btn-secondary  btn-sm"  data-toggle="modal" data-target=".bd-example-modal-viewcircular"><i style="line-height:1.5 !important;" class="fa fa-edit" aria-hidden="true"></i></a>

                                    <a onclick="return delete_menu();"  href="{{ url('menu-dlt/'.$menuslist->id) }}" class="btn btn-danger  btn-sm"  data-toggle="modal" data-target=".bd-example-modal-viewcircular"><i class="fa fa-trash" aria-hidden="true" style="line-height:1.5 !important;"></i></a>
                                </td>
                              
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
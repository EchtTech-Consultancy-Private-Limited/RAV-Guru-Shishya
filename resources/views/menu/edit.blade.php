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
                     <h4 class="page-title">Edit Menu</h4>
                  </li>
                  <li class="breadcrumb-item bcrumb-1">
                     <a>
                     <i class="fas fa-home"></i> Home</a>
                  </li>
                  <li class="breadcrumb-item bcrumb-2">
                     <a href="#" onClick="return false;">Menu</a>
                  </li>
                  <li class="breadcrumb-item active">Edit Menu</li>
               </ul>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
               <div class="header">
                  <h2>
                     <strong>Edit</strong> Menu
                  </h2>
               </div>
               <form action="{{ url('update-menu/'.$menu->id) }}" method="post">
               @csrf
               <div class="body">
                  <div class="row clearfix">
                     <div class="col-sm-4">
                        <div class="form-group">
                           <div class="form-line">
                            <label class="form-label">Menu Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Menu Name" value="{{ $menu->name }}">
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                           <div class="form-line">
                            <label class="form-label">URL</label>
                            <input type="text" class="form-control" name="url" placeholder="Url" value="{{ $menu->url }}">
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                           <div class="form-line">
                               <label class="form-label">Select Parent</label>
                                <select class="form-control" name="parent_id">
                                    <option value>Select Parent Menu...</option>
                                    @foreach($menulist as $menus)
                                            <option value="{{ $menus->id}}" {{$menus->id == $menu->parent_id  ? 'selected' : ''}}>{{ $menus->name}}</option>
                                    @endforeach
                                </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                 
                  <div class="col-lg-12 p-t-20 text-center">
                     <button type="submit" class="btn btn-primary waves-effect m-r-15">Update</button>
                     <a href="{{ url('add-menu') }}" type="button" class="btn btn-danger waves-effect">Back To Menu</a>
                  </div>
               </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>

@endsection
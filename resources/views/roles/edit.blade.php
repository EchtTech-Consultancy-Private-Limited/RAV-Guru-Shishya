@extends('layouts.app-file')


@section('content')

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
                     <h4 class="page-title">Edit Roles</h4>
                  </li>
                  <li class="breadcrumb-item bcrumb-1">
                     <a>
                     <i class="fas fa-home"></i> Home</a>
                  </li>
                  <li class="breadcrumb-item bcrumb-2">
                     <a href="#" onClick="return false;">Roles</a>
                  </li>
                  <li class="breadcrumb-item active">Edit Roles</li>
               </ul>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
               <div class="header">
                 
               </div>
               {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
               @csrf
               <div class="body">
                  <div class="row clearfix">
                     <div class="col-sm-4">
                        <div class="form-group">
                           <div class="form-line">
                            <strong>Name:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                           </div>
                        </div>
                     </div>
                   </div>
                  <div class="row clearfix">
                    <div class="col-sm-4">
                        <div class="form-group">
                           <div class="form-line">
                               <strong>Permission:</strong>
                                <br/>
                                @foreach($permission as $value)
                                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                    {{ $value->name }}</label>
                                <br/>
                                @endforeach
                           </div>
                        </div>
                     </div>
                  </div>
                  
                 
                  <div class="col-lg-12 p-t-20 text-center">
                     <button type="submit" class="btn btn-primary waves-effect m-r-15">Update</button>
                     <a href="{{ url('roles') }}" type="button" class="btn btn-danger waves-effect">Back To Roles</a>
                  </div>
               </div>
               {!! Form::close() !!}
            </div>
         </div>
      </div>
   </div>
</section>
@endsection

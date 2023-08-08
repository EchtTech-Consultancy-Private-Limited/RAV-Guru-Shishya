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
                     <h4 class="page-title">Role Management</h4>
                     
                  </li>
                  <li class="breadcrumb-item bcrumb-1">
                     <a>
                     <i class="fas fa-home"></i> Home</a>
                  </li>
                  <li class="breadcrumb-item bcrumb-2">
                     <a href="#" onClick="return false;">Role</a>
                  </li>
                  <li class="breadcrumb-item active">All Roles</li>
               </ul>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
               <div class="header">
                  <h2>
                    
                     <span style="float:right;" >
                        <div class="pull-right">
                        @can('role-create')
                            <a class="btn btn-primary" href="{{ route('roles.create') }}" style="float:right;"> Create New Role</a>
                            @endcan
                        </div>
                     </span>
                  </h2>
                  
               </div>
               <div class="body">
                  <div class="table-responsive">
                        <table class="table table-hover js-basic-example contact_list">
                            <thead>
                              <tr>
                                 <th class="center">No</th>
                                 <th class="center">Name</th>
                                 <th class="center" width="280px">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key => $role)
                                <tr>
                                    <td class="center" >{{ ++$i }}</td>
                                    <td class="center">{{ $role->name }}</td>
                                    <td class="center">
                                        <!-- <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">View</a> -->
                                        @can('role-edit')
                                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                        @endcan
                                        @can('role-delete')
                                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endcan
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

<!-- {!! $roles->render() !!} -->

@endsection
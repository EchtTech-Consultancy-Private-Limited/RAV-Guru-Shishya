@extends('layouts.app-file')


@section('content')
<div class="row">
   <div class="col-sm-12">
      <div class="card">
         <div class="card-header">
            <h2>Show Role</h2>
         </div>
         <div id="alert-box" style="display:none;">
            <div class="card-body">
               <div id="" class=" alert alert-danger mb-0" role="alert" >
                  <a href="#" class="close" data-dismiss="alert" aria-label="close" style="float: right;font-size:20px;">&times;</a>
                  <p class="mb-0" id="circular-error"></p>
               </div>
            </div>
         </div>
         <div id="success-box" style="display:none;">
            <div class="card-body">
               <div id="" class=" alert alert-success mb-0" role="alert" >
                  <a href="#" class="close" data-dismiss="alert" aria-label="close" style="float: right;font-size:20px;">&times;</a>
                  <p class="mb-0" id="added_circular"></p>
               </div>
            </div>
         </div>
         <!-- <div class="card-body">
            <p>In Collapse Sidebar Layout - Sidebar is getting minimal and all menu item is collapsed by default.</p>
            <div class="alert alert-info mb-0" role="alert">
               <p class="mb-0">It is best suited for those applications where you want more focus on page content &amp; having less sidebar menu items.</p>
            </div>
         </div> -->
      </div>
   </div>
</div>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <!-- <h2> Show Role</h2> -->
        </div>
        <div class="pull-right" style="float:right;">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permissions:</strong>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <label class="label label-success">{{ $v->name }},</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
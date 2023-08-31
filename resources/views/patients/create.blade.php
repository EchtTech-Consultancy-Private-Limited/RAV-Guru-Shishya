@extends('layouts.app-file')


@section('content')
<div class="row">
   <div class="col-sm-12">
      <div class="card">
         <div class="card-header">
           <h2>Add </h2>
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
         <div class="card-body">
            <p>In Collapse Sidebar Layout - Sidebar is getting minimal and all menu item is collapsed by default.</p>
            <div class="alert alert-info mb-0" role="alert">
               <p class="mb-0">It is best suited for those applications where you want more focus on page content &amp; having less sidebar menu items.</p>
            </div>
         </div>
      </div>
   </div>
</div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <!-- <h2>Add New Patient</h2> -->
            </div>
            <div class="pull-right" style="float:right;">
                <a class="btn btn-primary" href="{{ route('patients.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('patients.store') }}" method="POST">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" class="form-control" placeholder="Name">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


<p class="text-center text-primary"><small></small></p>
@endsection
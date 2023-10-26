@extends('layouts.app-file')


@section('content')
<div class="row">
   <div class="col-sm-12">
      <div class="card">
         <div class="card-header">
            <h3>Show All Patients</h3>
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
                <!-- <h2>Patients</h2> -->
            </div>
            <div class="pull-right" style="float:right;">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('patients.create') }}"> Add New Patient</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($products as $product)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $product->name }}</td>
	        <td>{{ $product->detail }}</td>
	        <td>
                <form action="{{ route('patients.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('patients.show',$product->id) }}">Show</a>
                    @can('product-edit')
                    <a class="btn btn-primary" href="{{ route('patients.edit',$product->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('product-delete')
                    <button type="submit" class="btn delete btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $products->links() !!}


<p class="text-center text-primary"><small></small></p>
@endsection
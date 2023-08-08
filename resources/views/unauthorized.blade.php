@extends('layouts.app-file')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/js/bundles/multiselect/css/multi-select.css') }}">

 
<h1>Rav Guru Parampara</h1>

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
                     <h4 class="page-title">Add Routes</h4>
                  </li>
                  <li class="breadcrumb-item bcrumb-1">
                     <a>
                     <i class="fas fa-home"></i> Home</a>
                  </li>
                  <li class="breadcrumb-item bcrumb-2">
                     <a href="#" onClick="return false;">Route</a>
                  </li>
                  <li class="breadcrumb-item active">Add Routes</li>
               </ul>
            </div>
         </div>
      </div>
      <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Select2 Select Item</h2>
                            <ul class="header-dropdown">
                                <li class="dropdown">
                                    <a href="#" onClick="return false;" class="dropdown-toggle"
                                        data-bs-toggle="dropdown" role="button" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu float-end">
                                        <li>
                                            <a href="#" onClick="return false;">Add</a>
                                        </li>
                                        <li>
                                            <a href="#" onClick="return false;">Edit</a>
                                        </li>
                                        <li>
                                            <a href="#" onClick="return false;">Delete</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-3">
                                    <p>
                                        <b>Basic</b>
                                    </p>
                                    <div class="form-group default-select select2Style">
                                        <select class="form-control select2" data-placeholder="Select">
                                            <option></option>
                                            <option>India</option>
                                            <option>Australia</option>
                                            <option>USA</option>
                                            <option>Poland</option>
                                            <option>Afghanistan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
   </div>
</section>
<script src="{{ asset('assets/js/form.min.js') }}"></script>
<script src="{{ asset('assets/js/bundles/multiselect/js/jquery.multi-select.js') }}"></script>
<script>
    $(function () {
            //Multi-select
            $("#optgroup").multiSelect({ selectableOptgroup: true });

            //Select2
            $(".select2").select2();

            $("#select2-search-hide").select2({
            minimumResultsForSearch: Infinity,
            });

            $("#select2-rtl-multiple").select2({
            placeholder: "RTL Select",
            dir: "rtl",
            });

            $("#select2-max-length").select2({
            maximumSelectionLength: 2,
            placeholder: "Select only maximum 2 items",
            });
});
</script>



@endsection
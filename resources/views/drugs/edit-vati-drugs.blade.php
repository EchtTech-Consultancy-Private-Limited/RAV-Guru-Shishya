@extends('layouts.app-file')
@section('content')


<section class="content">
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

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>

    @endif
    @if ($message = Session::get('Error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>

    @endif
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mb-2 col-lg-12">

                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h6 class="page-title">Edit Drug Details </h6>

                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{url('/dashboard')}}">
                                <i class="fas fa-home"></i> Home</a>
                        </li>

                        <li class="breadcrumb-item active">Edit Drug Details </li>
                    </ul>

                </div>
            </div>
        </div>
        <!-- Basic Example | Horizontal Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 mb-2 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle" data-bs-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                </a>
                                <ul class="dropdown-menu float-start">
                                    <li>
                                        <a href="#" onClick="return
                              false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return
                              false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return
                              false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                    <div class="row">
                                <div class="col-md-6 col-6">
                                    <h2>New Drug Report</h2>
                                </div>
                                <div class="col-md-6 col-6">
                                    <a href="{{url('drug-report-history')}}"><button type="button"
                                            class="btn back btn-danger waves-effect float-right"> &nbsp; Back
                                            &nbsp;</button></a>
                                </div>
                            </div>



                        <section>
                            <div class="col-md-12 mb-2">
                                <div class="card">
                                    <!-- <form role="form" method="POST" action='' enctype="multipart/form-data"> -->
                                    <!-- @csrf -->
                                    <div class="card-body p-0">
                                        <table>
                                            <thead>
                                                <th>Name of the Guru</th>
                                                <th>Name of the Shishya </th>
                                                <th>Date of Report </th>
                                            </thead>
                                            <tbody>
                                                <td>
                                                    @if(Auth::user()->guru_id || Auth::user()->user_type==1)
                                                    {{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}}
                                                    @endif
                                                    @if(Auth::user()->user_type==2)
                                                    {{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(Auth::user()->user_type==1 || Auth::user()->user_type==2)
                                                    {{$shishyarecord->firstname.' '.$shishyarecord->middlename.' '.$shishyarecord->lastname}}
                                                    @else
                                                    {{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}}
                                                    @endif
                                                </td>
                                                <td><?php echo date('d-m-Y'); ?> </td>
                                            </tbody>
                                        </table>

                                        <div id="yogas_type">
                                        </div>

                                    </div>
                                    <!-- </form> -->
                                </div>
                            </div>
                            <div style="display:;">
                                <div id="churna_yogas" style="display:;">
                                    <?php
               if(isset($drugHistoryLog)){
                  $data = json_decode($drugHistoryLog->data);
               }
            ?>
                                    <form method="POST" action="{{ url('update-vatiyoga-details') }}">
                                        @csrf
                                        <input type="hidden" name="drug_id" value="{{ $drug->id }}">
                                        <div class="row px-2">
                                            <div class="form-group  ">
                                                <h5 class="text-center d-flex justify-content-center"> Vati YOGAS
                                                </h5>
                                                <h5 class="d-block text-left">Name of the Drug</h5>
                                                <h5 class="d-block text-left">
                                                    Reference
                                                    <p class=' text-xs pt-1'>Text, Chapter, Sloka – to – (Published by
                                                        Edition, Writer/Translator)</p>
                                                </h5>
                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div class="h-100">
                                                <h5 class="mb-1">
                                                    Composition
                                                </h5>
                                            </div>

                                            <div class="page-content page-container" id="page-content">
                                                <div class="padding">
                                                    <div class="row  d-flex justify-content-center">
                                                        <div class="col-lg-12 grid-margin stretch-card">
                                                            <div class="card">
                                                                <div class="card-body p-0">
                                                                    <div class="table-responsive">
                                                                        <table id="faqs" class="table table-hover composition-form">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Name of the ingredients mineral
                                                                                        metal</th>
                                                                                    <th>Part used </th>
                                                                                    <th>Quantity</th>
                                                                                    <th>Action</th>

                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach($vatitype as $vatitypes)
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="hidden"
                                                                                            name="drug_part_id[]"
                                                                                            value="{{ $vatitypes->id }}"
                                                                                            maxlength="200">

                                                                                        <input type="text"
                                                                                            name="name_of_the_ingredients[]"
                                                                                            class="form-control"
                                                                                            placeholder="Enter Name of the ingredients"
                                                                                            value="{{ $vatitypes->name_of_the_ingredients }}"
                                                                                            maxlength="100">
                                                                                        @error('name_of_the_ingredients')
                                                                                        <p
                                                                                            class='text-danger text-xs pt-1'>
                                                                                            {{ $message }} </p>
                                                                                        @enderror
                                                                                    </td>

                                                                                    <td>
                                                                                        <input type="text"
                                                                                            name="part_used[]"
                                                                                            class="form-control"
                                                                                            placeholder="Enter part used"
                                                                                            value="{{ $vatitypes->part_used }}"
                                                                                            maxlength="100">
                                                                                        @error('rasa_part_used')
                                                                                        <p
                                                                                            class='text-danger text-xs pt-1'>
                                                                                            {{ $message }} </p>
                                                                                        @enderror
                                                                                    </td>
                                                                                    <td class="text-warning mt-10">
                                                                                        <input type="text"
                                                                                            name="quantity[]"
                                                                                            class="form-control"
                                                                                            placeholder="Enter quantity"
                                                                                            value="{{ $vatitypes->quantity }}"
                                                                                            maxlength="10">
                                                                                        @error('quantity')
                                                                                        <p
                                                                                            class='text-danger text-xs pt-1'>
                                                                                            {{ $message }} </p>
                                                                                        @enderror
                                                                                    </td>
                                                                                    <td class="mt-10">
                                                                                        <a href="{{ url('delete-vatiyoga-type/'.$vatitypes->id) }}"
                                                                                            class="btn btn-tbl-delete"
                                                                                            onclick="return confirm_option('delete')">
                                                                                            <i
                                                                                                class="material-icons">delete_forever</i>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <div style="float:right;"><button
                                                                            onclick="addfaqs();" type="button"
                                                                            class="btn add btn-success"><i
                                                                                class="fa fa-plus"></i> ADD NEW</button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="title">
                                                <p class="text-capatilize text-sm">Method of Preparation (SOP)</p>
                                            </div>

                                            <div class="row">
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label
                                                            class="form-control-label @if(isset($data->vati_yoga_type_individual)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Enter
                                                            Yogas Name</label>
                                                        <input type="text" name="vati_yoga_type_individual"
                                                            class="form-control" placeholder="Vati Yoga Type Individual"
                                                            value="{{ $drug->vati_yoga_type_individual }}"
                                                            maxlength="50">@error('vati_yoga_type_individual')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label
                                                            class="form-control-label @if(isset($data->step_first)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step
                                                            1<span class="text-danger">*</span></label>
                                                        <input type="text" name="step_first" class="form-control"
                                                            placeholder="Step 1" aria-label="Step 1"
                                                            value="{{ $drug->step_first }}" maxlength="50">
                                                        @error('Step 1')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->packing)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Packing<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="packing" class="form-control"
                                                            placeholder="Packing" aria-label="Packing"
                                                            value="{{ $drug->packing }}" maxlength="50">
                                                        @error('packing')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->storage)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Storage<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="storage" class="form-control"
                                                            placeholder="Storage" value="{{ $drug->storage }}"
                                                            maxlength="50">
                                                        @error('storage')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->method_of_administration)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Method
                                                            of Administration<span class="text-danger">*</span></label>
                                                        <input type="text" name="method_of_administration"
                                                            class="form-control" placeholder="Method of Administration"
                                                            value="{{ $drug->method_of_administration }}"
                                                            maxlength="50">
                                                        @error('method_of_administration')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->dose)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Dose<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="dose" class="form-control"
                                                            placeholder="Dose" aria-label="Dose"
                                                            value="{{ $drug->dose }}" maxlength="50">
                                                        @error('dose')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->time_of_administration)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Time
                                                            of administration<span class="text-danger">*</span></label>
                                                        <input type="text" name="time_of_administration"
                                                            class="form-control" placeholder="Time of administration"
                                                            value="{{ $drug->time_of_administration }}" maxlength="50">
                                                        @error('time_of_administration')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->duration_of_therapy)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Duration
                                                            of Therapy<span class="text-danger">*</span></label>
                                                        <input type="text" name="duration_of_therapy"
                                                            class="form-control" placeholder="Duration of Therapy"
                                                            value="{{ $drug->duration_of_therapy }}" maxlength="50">
                                                        @error('duration_of_therapy')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->vati_yoga_type_individual)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Vehicle<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="vehicle" class="form-control"
                                                            placeholder="Vehicle" aria-label="Vehicle"
                                                            value="{{ $drug->vehicle }}" maxlength="50">
                                                        @error('vehicle')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->indicationsduration_of_therapy)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Indications<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="indicationsduration_of_therapy"
                                                            class="form-control" placeholder="Indications"
                                                            aria-label="Duration of Therapy"
                                                            value="{{ $drug->indicationsduration_of_therapy }}"
                                                            maxlength="50">
                                                        @error('indicationsduration_of_therapy')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->contraindicationsduration_of_therapy)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Contra
                                                            indications<span class="text-danger">*</span></label>
                                                        <input type="text" name="contraindicationsduration_of_therapy"
                                                            class="form-control" placeholder="Contra indications"
                                                            value="{{ $drug->contraindicationsduration_of_therapy }}"
                                                            maxlength="50">
                                                        @error('contraindicationsduration_of_therapy')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->wholesome_diet)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Wholesome
                                                            diet<span class="text-danger">*</span></label>
                                                        <input type="text" name="wholesome_diet" class="form-control"
                                                            placeholder="Wholesome diet"
                                                            value="{{ $drug->wholesome_diet }}" maxlength="50">
                                                        @error('wholesome_diet')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->wholesome_activities)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Whole
                                                            some activities<span class="text-danger">*</span></label>
                                                        <input type="text" name="wholesome_activities"
                                                            class="form-control" placeholder="Whole some activities"
                                                            value="{{ $drug->wholesome_activities }}">
                                                        @error('wholesome_activities')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->wholesome_behavior)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Wholesome
                                                            behavior<span class="text-danger">*</span></label>
                                                        <input type="text" name="wholesome_behavior"
                                                            class="form-control" placeholder="Wholesome behavior"
                                                            aria-label="Wholesome behavior"
                                                            value="{{ $drug->wholesome_behavior }}">
                                                        @error('wholesome_behavior')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="title">
                                                <p class="text-capatilize text-sm">Observations</p>
                                            </div>

                                            <div class="row">
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->quantity_of_raw_material)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Quantity
                                                            of Raw Material<span class="text-danger">*</span></label>
                                                        <input type="text" name="quantity_of_raw_material"
                                                            class="form-control" placeholder="Quantity of Raw Material"
                                                            value="{{ $drug->quantity_of_raw_material }}">
                                                        @error('quantity_of_raw_material')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->quantity_of_finished_product)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Quantity
                                                            of finished product<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="quantity_of_finished_product"
                                                            class="form-control"
                                                            placeholder="Quantity of finished product"
                                                            value="{{ $drug->quantity_of_finished_product }}">
                                                        @error('quantity_of_finished_product')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->loss)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Loss<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="loss" class="form-control"
                                                            placeholder="Loss" aria-label="Loss"
                                                            value="{{ $drug->loss }}">
                                                        @error('loss')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->reasons_for_loss)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Reasons
                                                            for Loss<span class="text-danger">*</span></label>
                                                        <input type="text" name="reasons_for_loss" class="form-control"
                                                            placeholder="Reasons for Loss" aria-label="Name"
                                                            value="{{ $drug->reasons_for_loss }}">
                                                        @error('reasons_for_loss')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->reasons_for_loss_first)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">(i)<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="reasons_for_loss_first"
                                                            class="form-control" placeholder="" aria-label="(I)"
                                                            value="{{ $drug->reasons_for_loss_first }}">@error('reasons_for_loss_first')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->reasons_for_loss_second)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">(II)<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="reasons_for_loss_second"
                                                            class="form-control" placeholder="" aria-label="Name"
                                                            value="{{ $drug->reasons_for_loss_second }}" maxlength="50">
                                                        @error('reasons_for_loss_second')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->organoleptic_properties_of_raw_materials)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Organoleptic
                                                            properties of raw materials<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text"
                                                            name="organoleptic_properties_of_raw_materials"
                                                            class="form-control"
                                                            placeholder="Organoleptic properties of raw materials"
                                                            value="{{ $drug->organoleptic_properties_of_raw_materials }}">
                                                        @error('organoleptic_properties_of_raw_materials')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->organoleptic_properties_of_finished_product)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Organoleptic
                                                            properties of finished product<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text"
                                                            name="organoleptic_properties_of_finished_product"
                                                            class="form-control"
                                                            placeholder="Organoleptic properties of finished product"
                                                            value="{{ $drug->organoleptic_properties_of_finished_product }}"
                                                            maxlength="50">
                                                        @error('organoleptic_properties_of_finished_product')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="title">
                                                <p class="text-capatilize text-sm">Time taken for the practical</p>
                                            </div>

                                            <div class="row">
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group ">
                                                        <label
                                                            class="control-label requiredField  @if(isset($data->starting_date)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif"
                                                            for="date">(i) Starting Date<span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                        </div>
                                                        <input class="form-control" id="date" name="starting_date"
                                                            placeholder="MM/DD/YYYY" type="date"
                                                            aria-label="(i)  Starting Date"
                                                            value="{{ $drug->starting_date }}">@error('starting_date')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group ">
                                                        <label
                                                            class="control-label requiredField  @if(isset($data->ending_date)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif"
                                                            for="date">(ii) Ending Date<span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                        </div>
                                                        <input class="form-control" id="date" name="ending_date"
                                                            placeholder="MM/DD/YYYY" type="date"
                                                            aria-label="(i)  Ending Date"
                                                            value="{{ $drug->ending_date }}">@error('ending_date')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn add btn-secondary">Update Vati Yogas</button>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
function yogas_select_change() {


    if ($('#yogas_select').val() == 1) {
        $("#yogas_type").html($("#churna_yogas").html());
    } else if ($('#yogas_select').val() == 2) {
        $("#yogas_type").html($("#rasa_yogas").html());
    } else if ($('#yogas_select').val() == 3) {
        $("#yogas_type").html($("#vati_yogas").html());
    } else if ($('#yogas_select').val() == 4) {
        $("#yogas_type").html($("#talia_yogas").html());
    } else if ($('#yogas_select').val() == 5) {
        $("#yogas_type").html($("#asva_yogas").html());
    }

}
</script>

<script>
var faqs_row = 0;

function addfaqs() {
    html = '<tr id="faqs-row' + faqs_row + '">';
    html += '<input type="hidden" name="drug_part_id[]" value="0" >';

    html +=
        '<td><input type="text" name="name_of_the_ingredients[]" class="form-control" value="" maxlength="200"></td>';
    html +=
        '<td><input type="text" name="part_used[]" class="form-control" placeholder="Enter part used" value="" maxlength="100"></td>';
    html +=
        '<td class="text-danger mt-10"> <input type="text" name="quantity[]" class="form-control" placeholder="Enter quantity" maxlength="10"></td>';
    html += '<td class="mt-10"><button class="btn btn-tbl-delete" onclick="$(\'#faqs-row' + faqs_row +
        '\').remove();"><i class="material-icons">delete_forever</i></button></td>';

    html += '</tr>';

    $('#faqs tbody').append(html);

    faqs_row++;
}
</script>
<script>
function confirm_option(action) {
    if (!confirm("Are you sure to " + action + ", this record!")) {
        return false;
    }

    return true;

}
</script>
@endsection

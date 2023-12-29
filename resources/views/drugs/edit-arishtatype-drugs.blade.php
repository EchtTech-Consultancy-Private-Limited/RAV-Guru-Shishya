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
                <div class="col-xs-12 col-sm-12 col-md-12 mb-2 mb-2 col-lg-12">

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
            <div class="col-lg-12 col-md-12 mb-2 mb-2 col-sm-12 col-xs-12">
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
                            @if(Auth::user()->user_type==2 || Auth::user()->user_type==1 || Auth::user()->user_type==4)
                                <div class="col-md-6 col-6">
                                    <a href="{{url('admin-drug-report-history')}}"><button type="button" class="btn back btn-danger waves-effect float-right"> &nbsp; Back &nbsp;</button></a>
                                </div>
                                @else
                                <div class="col-md-6 col-6">
                                    <a href="{{url('drug-report-history')}}"><button type="button" class="btn back btn-danger waves-effect float-right"> &nbsp; Back &nbsp;</button></a>
                                </div>
                                @endif
                        </div>

                        <div id="wizard_horizontal">

                            <section>
                                <div class="col-md-12 mb-2 mb-2">
                                    <div class="card">
                                        <!-- <form role="form" method="POST" action='' enctype="multipart/form-data"> -->
                                        <!-- @csrf -->
                                        <div class="card-body p-0">
                                            <table>
                                                <thead>
                                                    <th> Name of the Guru</th>
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

                                            <!--  <div class="row" >

                                    <div
                                       class="col-md-4 mb-2 mb-2">
                                       <div class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Select Yogas<span
                                             class="text-danger">*</span></label>
                                          <select class="form-control" id="yogas_select" onclick="yogas_select_change();">
                                             <option value="0">SELECT YOGAS</option>
                                             <option value="1">1 – CHURNA YOGAS</option>
                                             <option value="2">2 – RASA YOGAS</option>
                                             <option value="3">3 – VATI YOGAS</option>
                                             <option value="4">4 – TAILA – GHRITA YOGAS</option>
                                             <option value="5">5 – ASAVA/ARISHTA YOGAS</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-8 mb-2 mb-2"></div>
                                 </div> -->
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
                                        <form method="POST" action="{{ url('update-arishtayogas-details') }}">
                                            @csrf
                                            <input type="hidden" name="drug_id" value="{{ $drug->id }}">
                                            <div class="row">
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group  ">
                                                        <h5 class="text-center d-flex justify-content-center">ARISHTA
                                                            – GHRITA YOGAS</h5>
                                                        <h5 class="d-block text-left">Name of the Drug</h5>
                                                        <h5 class="d-block text-left">
                                                            Reference
                                                            <p class=' text-xs pt-1'>Text, Chapter, Sloka – to –
                                                                (Published by Edition, Writer/Translator)</p>
                                                        </h5>
                                                    </div>
                                                </div>

                                              </div>

                                            <div class="h-100">
                                                <h5 class="mb-1 p-0">
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
                                                                                @foreach($arishtatype as $arishtatypes)
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="hidden"
                                                                                            name="drug_part_id[]"
                                                                                            value="{{ $arishtatypes->id }}">

                                                                                        <input type="text"
                                                                                            name="name_of_the_ingredients[]"
                                                                                            class="form-control"
                                                                                            placeholder="Enter Name of the ingredients"
                                                                                            value="{{ $arishtatypes->name_of_the_ingredients }}"
                                                                                            maxlength="200">
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
                                                                                            value="{{ $arishtatypes->part_used }}"
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
                                                                                            value="{{ $arishtatypes->quantity }}"
                                                                                            maxlength="10">
                                                                                        @error('quantity')
                                                                                        <p
                                                                                            class='text-danger text-xs pt-1'>
                                                                                            {{ $message }} </p>
                                                                                        @enderror
                                                                                    </td>
                                                                                    <td class="mt-10">
                                                                                        <a href="{{ url('delete-arishtayoga-type/'.$arishtatypes->id) }}"
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

                                                <p class="text-capatilize text-sm">I Main ingredients</p>
                                            </div>
                                            <div class="row">
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label
                                                            class="form-control-label @if(isset($data->arishtayoga_type_individual)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Arishta Yogas Name</label>
                                                        <input type="text" name="arishtayoga_type_individual"
                                                            class="form-control"
                                                            placeholder="Arishta Yoga Type Individual"
                                                            value="{{ $drug->arishtayoga_type_individual }}"
                                                            maxlength="50">@error('churna_yoga_type_individual')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->main_ingredients_step_one)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step
                                                            I</label>
                                                        <input type="text" name="main_ingredients_step_one"
                                                            class="form-control" placeholder=" " aria-label="1"
                                                            value="{{ $drug->main_ingredients_step_one }}">@error('1')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->main_ingredients_step_two)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step
                                                            II</label>
                                                        <input type="text" name="main_ingredients_step_two"
                                                            class="form-control" placeholder=" " aria-label="Step 2"
                                                            value="{{ $drug->main_ingredients_step_two }}">
                                                        @error('2')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->main_ingredients_step_three)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step
                                                            III</label>
                                                        <input type="text" name="main_ingredients_step_three"
                                                            class="form-control" placeholder=" " aria-label="Step 1"
                                                            value="{{ $drug->main_ingredients_step_three }}">@error('1')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="title">

                                                <p class="text-capatilize text-sm">II Sandhana dravyas</p>
                                            </div>
                                            <div class="row">
                                                <div class="col-xxl-4 col-xl-4 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->prakshepa_dravyas_step_one)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step
                                                            I</label>
                                                        <input type="text" name="prakshepa_dravyas_step_one"
                                                            class="form-control" placeholder=" " aria-label="Step 1"
                                                            value="{{ $drug->prakshepa_dravyas_step_one }}">@error('1')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->prakshepa_dravyas_step_two)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step
                                                            II</label>
                                                        <input type="text" name="prakshepa_dravyas_step_two"
                                                            class="form-control" placeholder=" " aria-label="Step 2"
                                                            value="{{ $drug->prakshepa_dravyas_step_two }}">
                                                        @error('2')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->prakshepa_dravyas_step_three)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step
                                                            III</label>
                                                        <input type="text" name="prakshepa_dravyas_step_three"
                                                            class="form-control" placeholder=" " aria-label="Step 1"
                                                            value="{{ $drug->prakshepa_dravyas_step_three }}">@error('1')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="title">

                                                <p class="text-capatilize text-sm">III Prakshepa dravyas</p>
                                            </div>
                                            <div class="row">
                                                <div class="col-xxl-4 col-xl-4 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->method_of_preparation)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step
                                                            I</label>
                                                        <input type="text" name="method_of_preparation"
                                                            class="form-control" placeholder=" " aria-label="Step 1"
                                                            value="{{ $drug->method_of_preparation }}">@error('1')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->packing)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step
                                                            II</label>
                                                        <input type="text" name="packing" class="form-control"
                                                            placeholder=" " aria-label="Step 2"
                                                            value="{{ $drug->packing }}">
                                                        @error('2')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->storage)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step III</label>
                                                        <input type="text" name="storage" class="form-control"
                                                            placeholder=" " aria-label="Step 1"
                                                            value="{{ $drug->storage }}">@error('1')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="title">

                                                <p class="text-capatilize text-sm">Method of Preparation (SOP)</p>
                                            </div>
                                            <div class="row">
                                                <div class="col-xxl-2 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->method_of_administration)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step
                                                            1</label>
                                                        <input type="text" name="method_of_administration"
                                                            class="form-control" placeholder="Step 1"
                                                            aria-label="Step 1"
                                                            value="{{ $drug->method_of_administration }}">@error('Step
                                                        1')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->packing)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Packing</label>
                                                        <input type="text" name="packing" class="form-control"
                                                            placeholder="Packing" aria-label="Packing"
                                                            value="{{ $drug->packing }}">@error('Packing')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-xxl-2 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->storage)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Storage</label>
                                                        <input type="text" name="storage" class="form-control"
                                                            placeholder="Storage" aria-label="Storage"
                                                            value="{{ $drug->storage }}">
                                                        @error('Storage')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->method_of_administration)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Method
                                                            of Administration</label>
                                                        <input type="text" name="method_of_administration"
                                                            class="form-control" placeholder="Method of Administration"
                                                            value="{{ $drug->method_of_administration }}">
                                                        @error('Method of Administration')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-xxl-2 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->time_of_administration)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Time
                                                            of administration</label>
                                                        <input type="text" name="time_of_administration"
                                                            class="form-control" placeholder="Time of administration"
                                                            value="{{ $drug->time_of_administration }}">
                                                        @error('Time of administration')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->dose)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Dose</label>
                                                        <input type="text" name="dose" class="form-control"
                                                            placeholder="Dose" aria-label="Dose"
                                                            value="{{ $drug->dose }}">@error('Dose')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-xxl-2 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->vehicle)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Vehicle
                                                            (Anupana)</label>
                                                        <input type="text" name="vehicle" class="form-control"
                                                            placeholder="Vehicle (Anupana)"
                                                            value="{{ $drug->vehicle }}">
                                                        @error('Vehicle')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->indications)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Indications</label>
                                                        <input type="text" name="indications" class="form-control"
                                                            placeholder="Indications" value="{{ $drug->indications }}">
                                                        @error('Indications')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-xxl-2 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->contra_indications)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Contra
                                                            indications</label>
                                                        <input type="text" name="contra_indications"
                                                            class="form-control" placeholder="Contra indications"
                                                            value="{{ $drug->contra_indications }}">
                                                        @error('Contra indications')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->duration_of_therapy)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Duration
                                                            of Therapy</label>
                                                        <input type="text" name="duration_of_therapy"
                                                            class="form-control" placeholder="Duration of Therapy"
                                                            value="{{ $drug->duration_of_therapy }}">
                                                        @error('Duration of Therapy')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-xxl-2 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->wholesome_diet)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Wholesome
                                                            diet</label>
                                                        <input type="text" name="wholesome_diet" class="form-control"
                                                            placeholder="Wholesome diet" aria-label="Wholesome diet"
                                                            value="{{ $drug->wholesome_diet }}">
                                                        @error('Wholesome diet')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->wholesome_activities)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Wholesome
                                                            activities</label>
                                                        <input type="text" name="wholesome_activities"
                                                            class="form-control" placeholder="Wholesome activities"
                                                            value="{{ $drug->wholesome_activities }}">@error('Wholesome
                                                        activities')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->wholesome_behavior)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Wholesome
                                                            behavior</label>
                                                        <input type="text" name="wholesome_behavior"
                                                            class="form-control" placeholder="Wholesome behavior"
                                                            value="{{ $drug->wholesome_behavior }}">
                                                        @error('Wholesome behavior')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="title">

                                                <p class="text-capatilize text-sm">Observations</p>
                                            </div>
                                            <div class="row">
                                                <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->quantity_of_raw_material)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Quantity
                                                            of Raw Material</label>
                                                        <input type="text" name="quantity_of_raw_material"
                                                            class="form-control" placeholder="Quantity of Raw Material"
                                                            value="{{ $drug->quantity_of_raw_material }}">@error('Quantity
                                                        of Raw Material')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->quantity_of_finished_product)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Quantity
                                                            of finished product</label>
                                                        <input type="text" name="quantity_of_finished_product"
                                                            class="form-control"
                                                            placeholder="Quantity of finished product"
                                                            value="{{ $drug->quantity_of_finished_product }}">
                                                        @error('Quantity of finished product')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->loss)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Loss</label>
                                                        <input type="text" name="loss" class="form-control"
                                                            placeholder="Loss" value="{{ $drug->loss }}">
                                                        @error('Loss')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->reasons_for_loss)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Reasons
                                                            for Loss</label>
                                                        <input type="text" name="reasons_for_loss" class="form-control"
                                                            placeholder="Reasons for Loss"
                                                            value="{{ $drug->reasons_for_loss }}">
                                                        @error('Reasons for Loss')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class=" col-xl-4 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->organoleptic_properties_of_raw_materials)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Organoleptic
                                                            properties of raw materials</label>
                                                        <input type="text"
                                                            name="organoleptic_properties_of_raw_materials"
                                                            class="form-control"
                                                            placeholder="Organoleptic properties of raw materials"
                                                            value="{{ $drug->organoleptic_properties_of_raw_materials }}">
                                                        @error('Organoleptic properties of raw materials')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->organoleptic_properties_of_finished_product)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Organoleptic
                                                            properties of finished product</label>
                                                        <input type="text"
                                                            name="organoleptic_properties_of_finished_product"
                                                            class="form-control" placeholder="Date"
                                                            value="{{ $drug->organoleptic_properties_of_finished_product }}">
                                                        @error('Organoleptic properties of finished product ')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->time_taken_sandhana)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Time
                                                            taken for the sandhana process</label>
                                                        <input type="text" name="time_taken_sandhana"
                                                            class="form-control"
                                                            placeholder="Time taken for the sandhana process"
                                                            value="{{ $drug->time_taken_sandhana }}">
                                                        @error('Organoleptic properties of raw materials')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->duration_for_entire_experiment)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Duration
                                                            required for the entire experiment</label>
                                                        <input type="text" name="duration_for_entire_experiment"
                                                            class="form-control"
                                                            placeholder="Duration required for the entire experiment"
                                                            value="{{ $drug->duration_for_entire_experiment }}">
                                                        @error('Organoleptic properties of finished product ')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input"
                                                            class="form-control-label @if(isset($data->tests_performed_during_experiment)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Tests
                                                            performed during experiment</label>
                                                        <input type="text" name="tests_performed_during_experiment"
                                                            class="form-control"
                                                            placeholder="Tests performed during experiment"
                                                            value="{{ $drug->tests_performed_during_experiment }}">
                                                        @error('Organoleptic properties of finished product ')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="title">
                                                <p class="text-capatilize text-sm">Time taken for the experiment</p>
                                            </div>

                                            <div class="row">
                                                <div class="col-xxl-2 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group ">
                                                        <label
                                                            class="control-label requiredField @if(isset($data->starting_date)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif"
                                                            for="date">Starting Date
                                                        </label>
                                                       
                                                        <input class="form-control" id="date" name="starting_date"
                                                             type="date"
                                                            value="{{ $drug->starting_date }}">@error('(i) Starting
                                                        Date')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-3 col-md-6 col-6">
                                                    <div class="form-group ">
                                                        <label
                                                            class="control-label requiredField @if(isset($data->ending_date)) patient-highlight @endif"
                                                            title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif"
                                                            for="date">Ending Date
                                                        </label>
                                                       
                                                        <input class="form-control" id="date" name="ending_date"
                                                             type="date"
                                                            value="{{ $drug->ending_date }}">@error('(i) Ending Date')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn add btn-secondary">Update Arishta
                                                Yogas</button>
                                    </div>

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

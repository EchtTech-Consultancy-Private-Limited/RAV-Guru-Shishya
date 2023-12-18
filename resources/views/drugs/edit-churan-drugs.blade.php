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
   <div class="container-fluid">
   <div class="block-header">
                <div class="row">
                    <div class=" col-md-12 mb-2 ">

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
                       @if ($message = Session::get('success'))
                         <div class="alert alert-success">
                            <p>{{ $message }}</p>
                         </div>
                      @endif
                    </div>


                </div>

              </div>
   <!-- Basic Example | Horizontal Layout -->
   <div class="row clearfix">
      <div class="col-lg-12 mb-2 col-md-12 mb-2 mb-3 col-sm-12 mb-2 col-xs-12 mb-2">
         <div class="card">

            <div class="body">
               <div class="row">
                  <div class="col-md-6 col-6">
                  <h3>Edit Drug Report</h3>
                  </div>
                  <div class="col-md-6 col-6">
                <a href="{{url('drug-report-history')}}"><button type="button" class="btn back btn-danger waves-effect float-right"> &nbsp; Back &nbsp;</button></a>
                </div>
               </div>

               <div id="wizard_horizontal">
                  <section>
                     <div class="col-md-12 mb-2 mb-3">
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
                                       class="col-md-4 mb-2 mb-3">
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
                                    <div class="col-md-8 mb-2 mb-3"></div>
                                 </div> -->
                                 <div id="yogas_type">
                                 </div>

                              </div>
                           <!-- </form> -->
                        </div>
                     </div>
                     <div style="display:;">
       <div id="churna_yogas" class="">
            <?php
               if(isset($drugHistoryLog)){
                  $data = json_decode($drugHistoryLog->data);
               }
            ?>
            <form method="POST" action="{{ url('update-drug-details') }}" >
                @csrf
                <input type="hidden" name="drug_id" value="{{ $churandrug->id }}">
                <div class="row">
                  <div class="col-md-12 mb-2">

                     <div class="form-group  ">
                            <h5 class="text-center d-flex justify-content-center">CHURNA YOGAS</h5>
                            <h5 class="d-block text-left">Name of the Drug</h5>
                            <h5 class="d-block text-left">
                               Reference
                               <p class=' text-xs pt-1'>Text, Chapter, Sloka – to – (Published by Edition, Writer/Translator)</p>
                            </h5>
                         </div>
                  </div>

                </div>
                <div class="h-100">
                        <h5 class="mb-1">
                           Composition
                        </h5>
                     </div>
                 <!-- <p class="text-capatilize text-sm m-2">Composition</p> -->

                 <div class="page-content page-container" id="page-content">
                    <div class="padding">
                        <div class="row  d-flex justify-content-center">
                            <div class="col-lg-12 mb-2 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                          <input type="hidden" name="comosition_update" id="comosition_update" value="0">
                                            <table id="faqs" class="table table-hover composition-form">
                                                <thead>
                                                    <tr>
                                                        <th>Name of the ingredients </th>
                                                        <th>Part used   </th>
                                                        <th>Quantity</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   @foreach($churandrugpart as $churandrugpartdata)
                                                   <tr>
                                                        <td>
                                                         <input type="hidden" name="drug_part_id[]" value="{{ $churandrugpartdata->id }}" maxlength="200">

                                                         <input type="text" name="name_of_the_ingredients[]" class="form-control" placeholder="Enter Name of the ingredients" aria-label="Name of the ingredients" value="{{ $churandrugpartdata->name_of_the_ingredients }}" maxlength="200">
                                                         @error('name_of_the_ingredients')
                                                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                         @enderror
                                                         </td>

                                                        <td>
                                                         <input type="text" name="part_used[]" class="form-control" placeholder="Enter part used" aria-label="Part used" value="{{ $churandrugpartdata->part_used }}" maxlength="100">
                                                         @error('part_used')
                                                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                         @enderror
                                                        </td>
                                                        <td class="text-warning mt-10">
                                                         <input type="text" name="quantity[]" class="form-control" placeholder="Enter quantity" aria-label="quantity" value="{{ $churandrugpartdata->quantity }}" maxlength="10">
                                                        @error('quantity')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                        </td>
                                                        <td class="mt-10">
                                                         <a  href="{{ url('delete-churan-yoga-part/'.$churandrugpartdata->id) }}" class="btn btn-tbl-delete">
                                                              <i class="material-icons">delete_forever</i>
                                                         </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div style="float:right;"><button  onclick="addfaqs();" type="button" class="btn add btn-success"><i class="fa fa-plus"></i> ADD MORE</button></div>
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
                          <label  class="form-control-label @if(isset($data->churna_yoga_type_individual)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Churan Yogas Name</label>
                          <input type="text" name="churna_yoga_type_individual" class="form-control"  value="{{ $churandrug->churna_yoga_type_individual }}" >@error('rasa_yoga_type_individual')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->step_first)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step 1</label>
                          <input type="text" name="step_first" class="form-control" placeholder="Step 1" aria-label="Step 1" value="{{ $churandrug->step_first }}" >@error('step_first')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->step_second)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step 2</label>
                          <input type="text" name="step_second" class="form-control" placeholder="Step 2" aria-label="Step 2" value="{{ $churandrug->step_second }}" >
                          @error('step_second')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->step_three)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step 3</label>
                          <input type="text" name="step_three" class="form-control" placeholder="Step 3" aria-label="Name" value="{{ $churandrug->step_three }}" >
                          @error('step_three')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->step_four)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step 4,  etc.</label>
                          <input type="text" name="step_four" class="form-control" placeholder="Step 4" aria-label="Step 4" value="{{ $churandrug->step_four }}" >
                          @error('step_four')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->packing)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Packing</label>
                          <input type="text" name="packing" class="form-control" placeholder="Packing" aria-label="Packing" value="{{ $churandrug->packing }}" >@error('Packing')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->storage)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Storage</label>
                          <input type="text" name="storage" class="form-control" placeholder="Storage" aria-label="Storage" value="{{ $churandrug->storage }}" >
                          @error('storage')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->method_of_administration)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Method of Administration</label>
                          <input type="text" name="method_of_administration" class="form-control" placeholder="Method of Administration"  value="{{ $churandrug->method_of_administration }}" >
                          @error('method_of_administration')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->time_of_administration)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Time of administration</label>
                          <input type="text" name="time_of_administration" class="form-control" placeholder="Time of administration" aria-label="Time of administration" value="{{ $churandrug->time_of_administration }}" >
                          @error('time_of_administration')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->dose)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Dose</label>
                          <input type="text" name="dose" class="form-control" placeholder="Dose" aria-label="Dose" value="{{ $churandrug->dose }}" >@error('dose')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->vehicle)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Vehicle</label>
                          <input type="text" name="vehicle" class="form-control" placeholder="Vehicle" aria-label="Vehicle" value="{{ $churandrug->vehicle }}" >
                          @error('vehicle')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->duration_of_therapy)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Duration of Therapy</label>
                          <input type="text" name="duration_of_therapy" class="form-control" placeholder="Duration of Therapy" aria-label="Duration of Therapy" value="{{ $churandrug->duration_of_therapy }}" >
                          @error('Duration of Therapy')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->wholesome_diet)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Wholesome diet</label>
                          <input type="text" name="wholesome_diet" class="form-control" placeholder="Wholesome diet" aria-label="Wholesome diet" value="{{ $churandrug->wholesome_diet }}" >
                          @error('Wholesome diet')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->wholesome_activities)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Wholesome activities</label>
                          <input type="text" name="wholesome_activities" class="form-control" placeholder="Wholesome activities" aria-label="Wholesome activities" value="{{ $churandrug->wholesome_activities }}" >@error('Wholesome activities')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->wholesome_behavior)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Wholesome behavior</label>
                          <input type="text" name="wholesome_behavior" class="form-control" placeholder="Wholesome behavior" aria-label="Wholesome behavior" value="{{ $churandrug->wholesome_behavior }}" >
                          @error('Wholesome behavior')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->indications)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Indications</label>
                          <input type="text" name="indications" class="form-control" placeholder="Indications" aria-label="Indications" value="{{ $churandrug->indications }}" >
                          @error('Indications')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->contra_indications)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Contra indications</label>
                          <input type="text" name="contra_indications" class="form-control" placeholder="Contra indications" aria-label="Contra indications" value="{{ $churandrug->contra_indications }}" >
                          @error('Contra indications')
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
                          <label for="example-text-input" class="form-control-label @if(isset($data->quantity_of_raw_material)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Quantity of Raw Material</label>
                          <input type="text" name="quantity_of_raw_material" class="form-control" placeholder="Quantity of Raw Material" aria-label="Quantity of Raw Material" value="{{ $churandrug->quantity_of_raw_material }}" >@error('Quantity of Raw Material')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->quantity_of_finished_product)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Quantity of finished product</label>
                          <input type="text" name="quantity_of_finished_product" class="form-control" placeholder="Quantity of finished product" value="{{ $churandrug->quantity_of_finished_product }}" >
                          @error('Quantity of finished product')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->loss)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Loss</label>
                          <input type="text" name="loss" class="form-control" placeholder="Loss" aria-label="Loss" value="{{ $churandrug->loss }}" >
                          @error('Loss')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->reasons_for_loss)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Reasons for Loss</label>
                          <input type="text" name="reasons_for_loss" class="form-control" placeholder="Reasons for Loss" aria-label="Name" value="{{ $churandrug->reasons_for_loss }}" >
                          @error('Reasons for Loss')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->reasons_for_loss_first)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step 1</label>
                          <input type="text" name="reasons_for_loss_first" class="form-control" placeholder="(i)" aria-label="(i)" value="{{ $churandrug->reasons_for_loss_first }}" >@error('(i)')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->reasons_for_loss_second)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step 2</label>
                          <input type="text" name="reasons_for_loss_second" class="form-control" placeholder="(ii)" aria-label="Name" value="{{ $churandrug->reasons_for_loss_second }}" >
                          @error('(ii)')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->organoleptic_properties_of_raw_materials)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Organoleptic properties of raw materials</label>
                          <input type="text" name="organoleptic_properties_of_raw_materials" class="form-control" placeholder="Organoleptic properties of raw materials" aria-label="Name" value="{{ $churandrug->organoleptic_properties_of_raw_materials }}" >
                          @error('Organoleptic properties of raw materials')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label @if(isset($data->organoleptic_properties_of_finished_product)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Organoleptic properties of finished product</label>
                          <input type="text" name="organoleptic_properties_of_finished_product" class="form-control" placeholder="Organoleptic"  value="{{ $churandrug->organoleptic_properties_of_finished_product }}" >
                          @error('Organoleptic properties of finished product ')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                </div>
                <div class="title">

                   <p class="text-capatilize text-sm">Duration required for the experiment</p>
                </div>
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group ">
                          <label class="control-label mb-2 requiredField  @if(isset($data->starting_date)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif" for="date"> Starting Date
                          </label>
                          <div class="input-group">
                          </div>
                          <input class="form-control" id="date" name="starting_date" placeholder="MM/DD/YYYY" type="date" aria-label="(i)  Starting Date" value="{{ $churandrug->starting_date }}" >@error('(i) Starting Date')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                       <div class="form-group ">
                          <label class="control-label mb-2 requiredField @if(isset($data->ending_date)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif" for="date">  Ending Date
                          </label>
                          <div class="input-group">
                          </div>
                          <input class="form-control" id="date" name="ending_date" placeholder="MM/DD/YYYY" type="date" aria-label="(i)  Ending Date" value="{{ $churandrug->ending_date }}" >@error('(i) Ending Date')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                </div>
                 <button type="submit" class="btn add btn-secondary">Update Churna Yogas</button>
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
<script src="{{ asset('assets/js/drug-custom-script.js') }}"></script>
@endsection

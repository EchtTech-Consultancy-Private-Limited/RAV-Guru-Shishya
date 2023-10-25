@extends('layouts.app-file')
@section('content')


<section class="content">
   
   <div class="container-fluid">
   <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mb-2 col-lg-12">

                       <ul class="breadcrumb breadcrumb-style ">
                          <li class="breadcrumb-item">
                             <h6 class="page-title">View Drug Details </h6>

                          </li>
                          <li class="breadcrumb-item bcrumb-1">
                            <a href="{{url('/dashboard')}}">
                             <i class="fas fa-home"></i> Home</a>
                          </li>

                          <li class="breadcrumb-item active">View Drug Details </li>
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
      <div class="col-lg-12 col-md-12 mb-2 col-sm-12 col-xs-12">
         <div class="card">
            <div class="header">
               <ul class="header-dropdown m-r--5">
                  <li class="dropdown">
                     <a href="#" onClick="return false;"
                        class="dropdown-toggle"
                        data-bs-toggle="dropdown"
                        role="button" aria-haspopup="true"
                        aria-expanded="false">
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
               <div id="wizard_horizontal">
                  <section>
                     <div class="col-md-12 mb-2">
                        <div class="card">
                           <!-- <form role="form" method="POST" action='' enctype="multipart/form-data"> -->
                              <!-- @csrf -->
                              <div class="card-body">
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-4 mb-2">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Name of the Guru<span
                                             class="text-danger">*</span></label>
                                             @if(Auth::user()->guru_id || Auth::user()->user_type==1)
                                             <input readonly
                                             type="text"
                                             name="name_of_the_guru"
                                             class="form-control"
                                             placeholder="Name of the Guru"
                                             aria-label="Name"
                                             value="{{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}}" readonly
                                             >
                                             @endif
                                             @if(Auth::user()->user_type==2)
                                             <input
                                             type="text"
                                             name="name_of_the_guru"
                                             class="form-control"
                                             placeholder="Name of the Guru"
                                             aria-label="Name"
                                             value="{{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}}" readonly
                                             >
                                             @endif
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-4 mb-2">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Name of the Shishya<span
                                             class="text-danger">*</span></label>
                                             <input
                                             type="text"
                                             name="name_of_the_shishya"
                                             class="form-control"
                                             placeholder="Name of the Shishya"
                                             aria-label="Name"
                                             value=
                                             "@if(Auth::user()->user_type==1 || Auth::user()->user_type==2) {{$shishyarecord->firstname.' '.$shishyarecord->middlename.' '.$shishyarecord->lastname}} @else {{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}}
                                             @endif" readonly
                                             >
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-4 mb-2">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Date of Report<span
                                             class="text-danger">*</span></label>
                                          <input readonly
                                             type="date"
                                             name="date"
                                             class="form-control"
                                             placeholder="Date"
                                             aria-label="Name"
                                             value="<?php echo date('Y-m-d'); ?>" readonly
                                             >
                                       </div>
                                    </div>

                                 </div>
                                <!--  <div class="row" >

                                    <div
                                       class="col-md-4 mb-2">
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
                                    <div class="col-md-8 mb-2"></div>
                                 </div> -->
                                 <div id="yogas_type">
                                 </div>

                              </div>
                           <!-- </form> -->
                        </div>
                     </div>
                  </section>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div style="display:;">
       <div id="churna_yogas" style="display:;">
            <form method="POST" action="{{ url('update-arishtayogas-details') }}" >
                @csrf
               <input readonly type="hidden" name="drug_id" value="{{ $drug->id }}">
              <div class="row">
               <div class="col-md-12 mb-2">
               <div class="form-group  ">
                       <h5 class="text-center d-flex justify-content-center">3- ARISHTA – GHRITA YOGAS</h5>
                       <h5 class="d-block text-left">Name of the Drug</h5>
                       <h5 class="d-block text-left">
                          Reference
                          <p class=' text-xs pt-1'>Text, Chapter, Sloka – to – (Published by Edition, Writer/Translator)</p>
                       </h5>
                    </div>
               </div>
                   
                
               </div>
              
               
                
                  <div class="col-auto my-auto">
                     <div class="h-100">
                        <h5 class="mb-1">
                           Composition
                        </h5>
                     </div>
                  </div>

                  <div class="page-content page-container" id="page-content">
                    <div class="padding">
                        <div class="row container d-flex justify-content-center">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="faqs" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Name of the ingredients mineral metal</th>
                                                        <th>Part used   </th>
                                                        <th>Quantity</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($arishtatype as $arishtatypes)
                                                   <tr>
                                                        <td>
                                                         <input readonly type="hidden" name="drug_part_id[]" value="{{ $arishtatypes->id }}" >

                                                         <input readonly type="text" name="name_of_the_ingredients[]" class="form-control" placeholder="Name of the ingredients" value="{{ $arishtatypes->name_of_the_ingredients }}" >
                                                         @error('name_of_the_ingredients')
                                                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                         @enderror
                                                         </td>

                                                        <td>
                                                         <input readonly type="text" name="part_used[]" class="form-control" placeholder="Part used"  value="{{ $arishtatypes->part_used }}" >
                                                         @error('rasa_part_used')
                                                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                         @enderror
                                                        </td>
                                                        <td class="text-warning mt-10">
                                                         <input readonly type="text" name="quantity[]" class="form-control" placeholder="quantity" value="{{ $arishtatypes->quantity }}" >
                                                        @error('quantity')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
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
                </div>
                <p class="text-capatilize text-sm">I Main ingredients</p>
                <div class="row">
                   <div class="col-md-12 mb-2">
                       <div class="form-group">
                          <label  class="form-control-label">Enter Yogas Name</label>
                          <input readonly type="text" name="arishtayoga_type_individual" class="form-control" placeholder="Churna Yoga Type Individual"  value="{{ $drug->arishtayoga_type_individual }}" maxlength="50">@error('churna_yoga_type_individual')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Step I</label>
                         <input readonly type="text" name="main_ingredients_step_one" class="form-control" placeholder="1" aria-label="1" value="{{ $drug->main_ingredients_step_one }}" >@error('1')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Step II</label>
                         <input readonly type="text" name="main_ingredients_step_two" class="form-control" placeholder="2" aria-label="Step 2" value="{{ $drug->main_ingredients_step_two }}" >
                         @error('2')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Step III</label>
                         <input readonly type="text" name="main_ingredients_step_three" class="form-control" placeholder="3" aria-label="Step 1" value="{{ $drug->main_ingredients_step_three }}" >@error('1')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                </div>
                <p class="text-capatilize text-sm">II    Sandhana dravyas</p>
                <div class="row">
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Step I</label>
                         <input readonly type="text" name="prakshepa_dravyas_step_one" class="form-control" placeholder="1" aria-label="Step 1" value="{{ $drug->prakshepa_dravyas_step_one }}" >@error('1')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Step II</label>
                         <input readonly type="text" name="prakshepa_dravyas_step_two" class="form-control" placeholder="2" aria-label="Step 2" value="{{ $drug->prakshepa_dravyas_step_two }}" >
                         @error('2')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Step III</label>
                         <input readonly type="text" name="prakshepa_dravyas_step_three" class="form-control" placeholder="3" aria-label="Step 1" value="{{ $drug->prakshepa_dravyas_step_three }}" >@error('1')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                </div>
                <p class="text-capatilize text-sm">III Prakshepa dravyas</p>
                <div class="row">
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Step I</label>
                         <input readonly type="text" name="method_of_preparation" class="form-control" placeholder="1" aria-label="Step 1" value="{{ $drug->method_of_preparation }}" >@error('1')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Step II</label>
                         <input readonly type="text" name="packing" class="form-control" placeholder="2" aria-label="Step 2" value="{{ $drug->packing }}" >
                         @error('2')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">3</label>
                         <input readonly type="text" name="storage" class="form-control" placeholder="3" aria-label="Step 1" value="{{ $drug->storage }}" >@error('1')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                </div>
                <p class="text-capatilize text-sm">Method of Preparation (SOP)</p>
                <div class="row">
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Step 1</label>
                         <input readonly type="text" name="method_of_administration" class="form-control" placeholder="Step 1" aria-label="Step 1" value="{{ $drug->method_of_administration }}" >@error('Step 1')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Packing</label>
                         <input readonly type="text" name="packing" class="form-control" placeholder="Packing" aria-label="Packing" value="{{ $drug->packing }}" >@error('Packing')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Storage</label>
                         <input readonly type="text" name="storage" class="form-control" placeholder="Storage" aria-label="Storage" value="{{ $drug->storage }}" >
                         @error('Storage')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Method of Administration</label>
                         <input readonly type="text" name="method_of_administration" class="form-control" placeholder="Method of Administration" value="{{ $drug->method_of_administration }}" >
                         @error('Method of Administration')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Time of administration</label>
                         <input readonly type="text" name="time_of_administration" class="form-control" placeholder="Time of administration"  value="{{ $drug->time_of_administration }}" >
                         @error('Time of administration')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Dose</label>
                         <input readonly type="text" name="dose" class="form-control" placeholder="Dose" aria-label="Dose" value="{{ $drug->dose }}" >@error('Dose')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Vehicle (Anupana)</label>
                         <input readonly type="text" name="vehicle" class="form-control" placeholder="Vehicle (Anupana)" value="{{ $drug->vehicle }}" >
                         @error('Vehicle')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Indications</label>
                         <input readonly type="text" name="indications" class="form-control" placeholder="Indications" value="{{ $drug->indications }}" >
                         @error('Indications')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Contra indications</label>
                         <input readonly type="text" name="contra_indications" class="form-control" placeholder="Contra indications"  value="{{ $drug->contra_indications }}" >
                         @error('Contra indications')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Duration of Therapy</label>
                         <input readonly type="text" name="duration_of_therapy" class="form-control" placeholder="Duration of Therapy"  value="{{ $drug->duration_of_therapy }}" >
                         @error('Duration of Therapy')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Wholesome diet</label>
                         <input readonly type="text" name="wholesome_diet" class="form-control" placeholder="Wholesome diet" aria-label="Wholesome diet" value="{{ $drug->wholesome_diet }}" >
                         @error('Wholesome diet')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Wholesome activities</label>
                         <input readonly type="text" name="wholesome_activities" class="form-control" placeholder="Wholesome activities"  value="{{ $drug->wholesome_activities }}" >@error('Wholesome activities')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Wholesome behavior</label>
                         <input readonly type="text" name="wholesome_behavior" class="form-control" placeholder="Wholesome behavior"  value="{{ $drug->wholesome_behavior }}" >
                         @error('Wholesome behavior')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                </div>
                <p class="text-capatilize text-sm">Observations</p>
                <div class="row">
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Quantity of Raw Material</label>
                         <input readonly type="text" name="quantity_of_raw_material" class="form-control" placeholder="Quantity of Raw Material"  value="{{ $drug->quantity_of_raw_material }}" >@error('Quantity of Raw Material')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Quantity of finished product</label>
                         <input readonly type="text" name="quantity_of_finished_product" class="form-control" placeholder="Quantity of finished product"  value="{{ $drug->quantity_of_finished_product }}" >
                         @error('Quantity of finished product')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Loss</label>
                         <input readonly type="text" name="loss" class="form-control" placeholder="Loss"  value="{{ $drug->loss }}" >
                         @error('Loss')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Reasons for Loss</label>
                         <input readonly type="text" name="reasons_for_loss" class="form-control" placeholder="Reasons for Loss"  value="{{ $drug->reasons_for_loss }}" >
                         @error('Reasons for Loss')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Organoleptic properties of raw materials</label>
                         <input readonly type="text" name="organoleptic_properties_of_raw_materials" class="form-control" placeholder="Organoleptic properties of raw materials"  value="{{ $drug->organoleptic_properties_of_raw_materials }}" >
                         @error('Organoleptic properties of raw materials')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Organoleptic properties of finished product</label>
                         <input readonly type="text" name="organoleptic_properties_of_finished_product" class="form-control" placeholder="Date"  value="{{ $drug->organoleptic_properties_of_finished_product }}" >
                         @error('Organoleptic properties of finished product ')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Time taken for the sandhana process</label>
                         <input readonly type="text" name="time_taken_sandhana" class="form-control" placeholder="Time taken for the sandhana process"  value="{{ $drug->time_taken_sandhana }}" >
                         @error('Organoleptic properties of raw materials')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Duration required for the entire experiment</label>
                         <input readonly type="text" name="duration_for_entire_experiment" class="form-control" placeholder="Duration required for the entire experiment"  value="{{ $drug->duration_for_entire_experiment }}" >
                         @error('Organoleptic properties of finished product ')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-6 mb-2">
                      <div class="form-group">
                         <label for="example-text-input" class="form-control-label">Tests performed during experiment</label>
                         <input readonly type="text" name="tests_performed_during_experiment" class="form-control" placeholder="Tests performed during experiment"  value="{{ $drug->tests_performed_during_experiment }}" >
                         @error('Organoleptic properties of finished product ')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                </div>
                <p class="text-capatilize text-sm">Time taken for the experiment</p>
                <div class="row">
                   <div class="col-md-6 mb-2">
                      <div class="form-group ">
                         <label class="control-label   requiredField" for="date">(i) Starting Date
                         </label>
                         <div class="input-group">
                         </div>
                         <input readonly class="form-control" id="date" name="starting_date" placeholder="MM/DD/YYYY" type="date"  value="{{ $drug->starting_date }}" >@error('(i) Starting Date')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                   <div class="col-md-6 mb-2">
                      <div class="form-group ">
                         <label class="control-label   requiredField" for="date">(ii)  Ending Date
                         </label>
                         <div class="input-group">
                         </div>
                         <input readonly class="form-control" id="date" name="ending_date" placeholder="MM/DD/YYYY" type="date"  value="{{ $drug->ending_date }}" >@error('(i) Ending Date')
                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                         @enderror
                      </div>
                   </div>
                </div>

         </div>
         </form>
        </div>
   </div>
</section>

@endsection

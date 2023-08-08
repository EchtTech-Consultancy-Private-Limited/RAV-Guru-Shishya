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
   <!-- Basic Example | Horizontal Layout -->
   <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                  <h2>New Drug Report</h2>

                  <section>
                     <div class="col-md-12">
                        <div class="card">
                           <!-- <form role="form" method="POST" action='' enctype="multipart/form-data"> -->
                              <!-- @csrf -->
                              <div class="card-body">
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-4">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Name of the Guru<span
                                             class="text-danger">*</span></label>
                                          @if(Auth::user()->guru_id)
                                          <input
                                             type="text"
                                             name="name_of_the_guru"
                                             class="form-control"
                                             placeholder="Name of the Guru"
                                             aria-label="Name"
                                             value="@if($guru->firstname){{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}} @endif"
                                             readonly>
                                              @endif
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-4">
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
                                             value="{{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}}"
                                             readonly>
                                       </div>
                                    </div>
                                    <div
                                       class="col-md-4">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Date of Report<span
                                             class="text-danger">*</span></label>
                                          <input
                                             type="date"
                                             name="date"
                                             class="form-control"
                                             placeholder="Date"
                                             aria-label="Name"
                                             value="<?php echo date('Y-m-d'); ?>"
                                             >
                                       </div>
                                    </div>

                                 </div>

                                 <hr style="height:2px;">
                                 <div class="row" >

                                    <div
                                       class="col-md-4">
                                       <div class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Select Yogas<span
                                             class="text-danger">*</span></label>
                                          <select class="form-control" id="yogas_select" onclick="yogas_select_change();">


                                             <option value="">Please Select </option>
                                             @foreach(__('phr.yogas') as $key=>$value)
                                             <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-8"></div>
                                 </div>
                                 <div id="yogas_type">
                                 </div>
                                 <div
                                    class="row">
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Student's
                                          E-Sign</label>

                                          @if(Auth::user()->e_sign)
                                          <img src="{{ asset('uploads/'.Auth::user()->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                          @endif

                                       </div>
                                    </div>
                                    <div
                                       class="col-md-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Guru's
                                          E-Sign</label>
                                          @if(Auth::user()->guru_id)
                                          @if($guru->e_sign!='')
                                          <img src="{{ asset('uploads/'.$guru->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                          @endif
                                          @endif
                                       </div>
                                    </div>
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
  
   <div style="display:none;">
       <div id="churna_yogas" style="display:none;">
            <form method="POST" action="{{ url('add-drug-details') }}">
                @csrf
                <input type="hidden" name="yoga_type" value="1">
                <input type="hidden" name="date_of_yogas" value="<?php echo date('Y-m-d'); ?>">
                <input type="hidden" name="shishya_id" value="{{ Auth::user()->id }}">


                <div class="row">
                    <div class="form-group">
                       <h5 class="text-center">1 – CHURNA YOGAS</h5>
                    </div>
                    <div class="form-group">
                       <h5 class="text-center">Name of the Drug</h5>
                    </div>
                    <div class="form-group">
                       <h5 class="text">
                          Reference
                          <p class='text-danger text-xs pt-1'>Text, Chapter, Sloka – to – (Published by Edition, Writer/Translator)</p>
                       </h5>
                    </div>
                </div>
                 <p class="text-uppercase text-sm">Composition</p>

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
                                                        <th>Name of the ingredients </th>
                                                        <th>Part used   </th>
                                                        <th>Quantity</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>

                                                         <input type="text" name="name_of_the_ingredients[]" class="form-control" placeholder="Name of the ingredients" aria-label="Name of the ingredients" value="{{ old('name_of_the_ingredients') }}" >
                                                        
                                                         </td>

                                                        <td>
                                                         <input type="text" name="part_used[]" class="form-control" placeholder="Part used" aria-label="Part used" value="{{ old('part_used') }}" >
                                                        
                                                        </td>
                                                        <td class="text-warning mt-10">
                                                         <input type="text" name="quantity[]" class="form-control" placeholder="quantity" aria-label="quantity" value="{{ old('quantity') }}" >
                                                       
                                                        </td>
                                                        <!-- <td class="mt-10"><button class="badge badge-danger"><i class="fa fa-trash"></i> Delete</button></td> -->
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div style="float:right;"><button  onclick="addfaqs();" type="button" class="btn btn-success"><i class="fa fa-plus"></i> ADD NEW</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <p class="text-uppercase text-sm">Method of Preparation (SOP)</p>
                <div class="row">
                     <div class="col-md-12">
                       <div class="form-group">
                          <label  class="form-control-label">Enter Yogas Name</label>
                          <input type="text" name="churna_yoga_type_individual" class="form-control"  placeholder="Enter Churna Yoga  Name"  value="{{ old('churna_yoga_type_individual') }}" maxlength="50"  required minlength="3">@if ($errors->has('churna_yoga_type_individual'))
                            <span class="help-block">
                                <strong style="color:red;">{{ $errors->first('churna_yoga_type_individual') }}</strong>
                            </span>
                          @endif
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Step 1</label>
                          <input type="text" name="step_first" class="form-control" placeholder="Enter Step 1" value="{{ old('step_first') }}" maxlength="50" required>@error('step_first')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Step 2</label>
                          <input type="text" name="step_second" class="form-control" placeholder="Enter Step 2" aria-label="Step 2" value="{{ old('step_second') }}" maxlength="50" required>
                          @error('step_second')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Step 3</label>
                          <input type="text" name="step_three" class="form-control" placeholder="Enter Step 3" aria-label="Name" value="{{ old('step_three') }}" maxlength="50" >
                          @error('step_three')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Step 4,  etc.</label>
                          <input type="text" name="step_four" class="form-control" placeholder="Enter Step 4" aria-label="Step 4" value="{{ old('step_four') }}" maxlength="50">
                          @error('step_four')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Packing</label>
                          <input type="text" name="packing" class="form-control" placeholder="Enter Packing" aria-label="Packing" value="{{ old('packing') }}" maxlength="50">@error('Packing')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Storage</label>
                          <input type="text" name="storage" class="form-control" placeholder="Enter Storage" aria-label="Storage" value="{{ old('storage') }}" maxlength="50">
                          @error('storage')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Method of Administration</label>
                          <input type="text" name="method_of_administration" class="form-control" placeholder="Enter Method of Administration"  value="{{ old('method_of_administration') }}" maxlength="50">
                          @error('method_of_administration')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Time of administration</label>
                          <input type="text" name="time_of_administration" class="form-control" placeholder="Enter Time of administration"  value="{{ old('time_of_administration') }}" maxlength="50">
                          @error('time_of_administration')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Dose</label>
                          <input type="text" name="dose" class="form-control" placeholder="Enter Dose" value="{{ old('dose') }}" maxlength="50">@error('dose')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Vehicle</label>
                          <input type="text" name="vehicle" class="form-control" placeholder="Enter Vehicle" value="{{ old('vehicle') }}" maxlength="50">
                          @error('vehicle')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Duration of Therapy</label>
                          <input type="text" name="duration_of_therapy" class="form-control" placeholder="Enter Duration of Therapy"  value="{{ old('Duration of Therapy') }}" maxlength="50">
                          @error('Duration of Therapy')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Wholesome diet</label>
                          <input type="text" name="wholesome_diet" class="form-control" placeholder="Enter Wholesome Diet"  value="{{ old('Wholesome diet') }}" maxlength="50">
                          @error('Wholesome diet')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Wholesome activities</label>
                          <input type="text" name="wholesome_activities" class="form-control" placeholder="Enter Wholesome Activities" aria-label="Wholesome activities" value="{{ old('Wholesome activities') }}" maxlength="50">@error('Wholesome activities')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Wholesome behavior</label>
                          <input type="text" name="wholesome_behavior" class="form-control" placeholder="Enter Wholesome Behavior" aria-label="Wholesome behavior" value="{{ old('Wholesome behavior') }}" maxlength="50">
                          @error('Wholesome behavior')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Indications</label>
                          <input type="text" name="indications" class="form-control" placeholder="Enter Indications"  value="{{ old('Indications') }}" maxlength="50">
                          @error('Indications')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Contra indications</label>
                          <input type="text" name="contra_indications" class="form-control" placeholder="Enter Contra indications" aria-label="Contra indications" value="{{ old('Contra indications') }}" maxlength="50">
                          @error('Contra indications')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                </div>
                 <p class="text-uppercase text-sm">Observations</p>
                <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Quantity of Raw Material</label>
                          <input type="text" name="quantity_of_raw_material" class="form-control" placeholder="Enter Quantity of Raw Material" aria-label="Quantity of Raw Material" value="{{ old('Quantity of Raw Material') }}" maxlength="50">@error('Quantity of Raw Material')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Quantity of finished product</label>
                          <input type="text" name="quantity_of_finished_product" class="form-control" placeholder="Enter Quantity of Finished Product" value="{{ old('Quantity of finished product') }}" maxlength="50">
                          @error('quantity_of_finished_product')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Loss<span class="text-danger">*</span></label>
                          <input type="text" name="loss" class="form-control" placeholder="Enter Loss" value="{{ old('Loss') }}" maxlength="50">
                          @error('loss')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Reasons for Loss<span class="text-danger">*</span></label>
                          <input type="text" name="reasons_for_loss" class="form-control" placeholder="Enter Reasons for Loss" value="{{ old('Reasons for Loss') }}" maxlength="50">
                          @error('Reasons for Loss')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Step 1<span class="text-danger">*</span></label>
                          <input type="text" name="reasons_for_loss_first" class="form-control" placeholder="Enter Reasons for Loss First Step"  value="{{ old('reasons_for_loss_first') }}" maxlength="50">@error('(i)')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Step 2<span class="text-danger">*</span></label>
                          <input type="text" name="reasons_for_loss_second" class="form-control" placeholder="Enter Reasons for Loss Second Step"  value="{{ old('reasons_for_loss_second') }}" maxlength="50">
                          @error('(ii)')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Organoleptic properties of raw materials<span class="text-danger">*</span></label>
                          <input type="text" name="organoleptic_properties_of_raw_materials" class="form-control" placeholder="Enter Organoleptic properties of raw materials" aria-label="Name" value="{{ old('Organoleptic properties of raw materials') }}" maxlength="50">
                          @error('Organoleptic properties of raw materials')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Organoleptic properties of finished product<span class="text-danger">*</span></label>
                          <input type="text" name="organoleptic_properties_of_finished_product" class="form-control" placeholder="Enter Organoleptic properties of finished product"  value="{{ old('organoleptic_properties_of_finished_product') }}" maxlength="50">
                          @error('organoleptic_properties_of_finished_product')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                </div>
                 <p class="text-uppercase text-sm">Duration required for the experiment</p>
                <div class="row">
                    <div class="col-md-6">
                       <div class="form-group ">
                          <label class="control-label col-sm-2 requiredField" for="date">(i) Starting Date<span class="text-danger">*</span>
                          </label>
                          <div class="input-group">
                          </div>
                          <input class="form-control" id="date" name="starting_date" placeholder="MM/DD/YYYY" type="date"  value="{{ old('(i)   Starting Date') }}" >@error('(i) Starting Date')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group ">
                          <label class="control-label col-sm-2 requiredField" for="date">(ii)  Ending Date<span class="text-danger">*</span>
                          </label>
                          <div class="input-group">
                          </div>
                          <input class="form-control" id="date" name="ending_date" placeholder="MM/DD/YYYY" type="date" aria-label="(i)  Ending Date" value="{{ old('(i)   Starting Date') }}" >@error('(i) Ending Date')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                </div>
                 <button type="submit" class="btn btn-secondary">Add Churna Yogas</button>
            </form>
        </div>


      <!-- churna_yogas end -->
      <div id="rasa_yogas" style="display:none;">
         <form method="POST" action="{{ url('add-rasayoga-details') }}" >
                @csrf
                <input type="hidden" name="yoga_type" value="2">
                <input type="hidden" name="date_of_yogas" value="<?php echo date('Y-m-d'); ?>">
                <input type="hidden" name="shishya_id" value="{{ Auth::user()->id }}">
              <div class="row">
                  <div class="h-100">
                     <h5 class="text text-center">
                        2- RASA YOGAS
                     </h5>
                  </div>
               </div>
               <div class="row">
                  <div class="h-100">
                     <h5 class="text text-center">Name of the Drug</h5>
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-auto my-auto">
                     <div class="h-100">
                        <h5 class="mb-1">
                           Reference
                           <p class='text-danger text-xs pt-1'>Text, Chapter, Sloka – to -  (Published by, Edition, Writers/Translator)</p>
                        </h5>
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
                                                        <th>Name of the ingredients </th>
                                                        <th>Part used   </th>
                                                        <th>Quantity</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                          <input type="text" name="name_of_the_ingredients_mineral_metal[]" class="form-control" placeholder="Name of the ingredients Mineral" aria-label="name_of_the_ingredients_mineral_metal" value="{{ old('name_of_the_ingredients_mineral_metal') }}" >
                                                            @error('name_of_the_ingredients_mineral_metal')
                                                            <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                            @enderror
                                                         </td>

                                                        <td>
                                                         <input type="text" name="part_used[]" class="form-control" placeholder="Part used"  value="{{ old('part_used') }}" >@error('part_used')
                                                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                         @enderror
                                                        </td>
                                                        <td class="text-warning mt-10">
                                                         <input type="text" name="quantity[]" class="form-control" placeholder="quantity" aria-label="quantity" value="{{ old('quantity') }}" >
                                                         @error('quantity')
                                                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                         @enderror
                                                        </td>
                                                        <!-- <td class="mt-10"><button class="badge badge-danger"><i class="fa fa-trash"></i> Delete</button></td> -->
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div style="float:right;"><button  onclick="addfaqs();" type="button" class="btn btn-success"><i class="fa fa-plus"></i> ADD NEW</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                  <p class="text-uppercase text-sm">I Herbal</p>
                  <div class="row">
                     <div class="col-md-12">
                       <div class="form-group">
                          <label  class="form-control-label">Enter Yogas Name</label>
                          <input type="text" name="rasa_yoga_type_individual" class="form-control" placeholder="Rasa Yoga Type Individual"  value="{{ old('rasa_yoga_type_individual') }}" maxlength="30" required>@error('step_first')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 1<span class="text-danger">*</span></label>
                           <input type="text" name="herbal_first" class="form-control" placeholder="1" aria-label="Step 1" value="{{ old('herbal_first') }}" maxlength="50" required>@error('herbal_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 2<span class="text-danger">*</span></label>
                           <input type="text" name="herbal_second" class="form-control" placeholder="2" aria-label="Step 2" value="{{ old('herbal_second') }}" maxlength="50" required>
                           @error('herbal_second')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <p class="text-uppercase text-sm">II Mineral</p>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 1<span class="text-danger">*</span></label>
                           <input type="text" name="mineral_first" class="form-control" placeholder="1" aria-label="Step 1" value="{{ old('mineral_first') }}" maxlength="50">@error('mineral_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 2</label>
                           <input type="text" name="mineral_second" class="form-control" placeholder="2" aria-label="Step 2" value="{{ old('mineral_second') }}" maxlength="50">
                           @error('mineral_second')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <p class="text-uppercase text-sm">III Metal</p>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 1<span class="text-danger">*</span></label>
                           <input type="text" name="metal_first" class="form-control" placeholder="1" aria-label="Step 1" value="{{ old('metal_first') }}" maxlength="50">@error('metal_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 2<span class="text-danger">*</span></label>
                           <input type="text" name="metal_second" class="form-control" placeholder="2" aria-label="Step 2" value="{{ old('metal_second') }}" maxlength="50">
                           @error('metal_second')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <p class="text-uppercase text-sm">IV Animal</p>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 1<span class="text-danger">*</span></label>
                           <input type="text" name="animal_first" class="form-control" placeholder="1" aria-label="Step 1" value="{{ old('animal_first') }}" maxlength="50">@error('animal_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 2<span class="text-danger">*</span></label>
                           <input type="text" name="animal_second" class="form-control" placeholder="2" aria-label="Step 2" value="{{ old('animal_second') }}" maxlength="50">
                           @error('animal_second')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <p class="text-uppercase text-sm">V Bhavana Dravyas</p>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 1<span class="text-danger">*</span></label>
                           <input type="text" name="bhavana_dravayas_first" class="form-control" placeholder="1" aria-label="Step 1" value="{{ old('bhavana_dravayas_first') }}" maxlength="50">@error('bhavana_dravayas_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 2<span class="text-danger">*</span></label>
                           <input type="text" name="bhavana_dravayas_second" class="form-control" placeholder="2" aria-label="Step 2" value="{{ old('bhavana_dravayas_second') }}" maxlength="50">
                           @error('bhavana_dravayas_second')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">VI Changes seen during bhavana therapy<span class="text-danger">*</span></label>
                           <input type="text" name="changes_seen_during_bhavana_therapy" class="form-control" placeholder="VI Changes seen during bhavana therapy" aria-label="Dose" value="{{ old('changes_seen_during_bhavana_therapy') }}" maxlength="50">@error('changes_seen_during_bhavana_therapy')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">VII Organoleptic properties of raw material<span class="text-danger">*</span></label>
                           <input type="text" name="organoleptic_properties_of_raw_material" class="form-control" placeholder="VII Organoleptic properties of raw material" aria-label="VII" value="{{ old('organoleptic_properties_of_raw_material') }}" maxlength="50">
                           @error('VII Organoleptic properties of raw material')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">VIII organoleptic_properties_of_raw_material<span class="text-danger">*</span></label>
                           <input type="text" name="organoleptic_properties_of_finished_product" class="form-control" placeholder="VIII" aria-label="Duration of Therapy" value="{{ old('organoleptic_properties_of_finished_product') }}" maxlength="50">
                           @error('organoleptic_properties_of_finished_product')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">IX Time taken for the experiment<span class="text-danger">*</span></label>
                           <input type="text" name="time_taken_for_the_experiment" class="form-control" placeholder="Wholesome diet" aria-label="Wholesome diet" value="{{ old('time_taken_for_the_experiment') }}" maxlength="50">
                           @error('time_taken_for_the_experiment')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">X Starting date of experiment<span class="text-danger">*</span></label>
                           <input type="text" name="starting_date_of_experiment" class="form-control" placeholder="Wholesome activities" aria-label="Wholesome activities" value="{{ old('starting_date_of_experiment') }}" maxlength="50">@error('starting_date_of_experiment')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">XI Ending date of experiment<span class="text-danger">*</span></label>
                           <input type="text" name="ending_date_of_experiment" class="form-control" placeholder="XI Ending date of experiment" aria-label="Wholesome behavior" value="{{ old('ending_date_of_experiment') }}" maxlength="50">
                           @error('ending_date_of_experiment')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
               </div>
               <button type="submit" class="btn btn-secondary">Add Rasa Yogas</button>
         </form>
      </div>
      <!-- rasa_yogas end -->
      <div id="vati_yogas" style="display:none;">
         <form method="POST" action="{{ url('vati-yoga-details') }}" >
               @csrf
               <input type="hidden" name="yoga_type" value="3">
               <input type="hidden" name="date_of_yogas" value="<?php echo date('Y-m-d'); ?>">
               <input type="hidden" name="shishya_id" value="{{ Auth::user()->id }}">
              <div class="row">
                  <div class="form-group">
                     <h5 class="text-center">3 – VATI YOGAS</h5>
                  </div>
                  <div class="form-group">
                     <h5 class="text-center">Name of the Drug</h5>
                  </div>
                  <div class="form-group">
                     <h5 class="text">
                        Reference
                        <p class='text-danger text-xs pt-1'>Text, Chapter, Sloka – to – (Published by Edition, Writer/Translator)</p>
                     </h5>
                  </div>
                  <div class="form-group">
                     <h5 class="text">Composition</h5>
                  </div>
                  <p class="text-uppercase text-sm">Information</p>
                  <div class="row">
                     <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="faqs" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name of the Ingredients </th>
                                            <th>Part used   </th>
                                            <th>Quantity</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                              <input type="text" name="name_of_the_ingredients[]" class="form-control" placeholder="Name of the ingredients Mineral" aria-label="name_of_the_ingredients_mineral_metal" value="{{ old('name_of_the_ingredients_mineral_metal') }}" >
                                                @error('name_of_the_ingredients_mineral_metal')
                                                <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                @enderror
                                             </td>

                                            <td>
                                             <input type="text" name="part_used[]" class="form-control" placeholder="Part used"  value="{{ old('part_used') }}" >@error('part_used')
                                             <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                             @enderror
                                            </td>
                                            <td class="text-warning mt-10">
                                             <input type="text" name="quantity[]" class="form-control" placeholder="quantity" aria-label="quantity" value="{{ old('quantity') }}" >
                                             @error('quantity')
                                             <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                             @enderror
                                            </td>
                                            <!-- <td class="mt-10"><button class="badge badge-danger"><i class="fa fa-trash"></i> Delete</button></td> -->
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div style="float:right;"><button  onclick="addfaqs();" type="button" class="btn btn-success"><i class="fa fa-plus"></i> ADD NEW</button></div>
                        </div>
                    </div>
                  </div>
                  <p class="text-uppercase text-sm">Method of Preparation (SOP)</p>
                  <div class="row">
                     <div class="col-md-12">
                          <div class="form-group">
                             <label  class="form-control-label">Enter Yogas Name</label>
                             <input type="text" name="vati_yoga_type_individual" class="form-control" placeholder="Vati Yoga Type Individual"  value="{{ old('vati_yoga_type_individual') }}" maxlength="50" required>@error('vati_yoga_type_individual')
                             <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                             @enderror
                          </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 1<span class="text-danger">*</span></label>
                           <input type="text" name="step_first" class="form-control" placeholder="Step 1" aria-label="Step 1" value="{{ old('step_first') }}" required >@error('Step 1')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Packing<span class="text-danger">*</span></label>
                           <input type="text" name="packing" class="form-control" placeholder="Packing" aria-label="Packing" value="{{ old('packing') }}" required>@error('packing')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Storage<span class="text-danger">*</span></label>
                           <input type="text" name="storage" class="form-control" placeholder="Storage" aria-label="Storage" value="{{ old('storage') }}" >
                           @error('storage')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Method of Administration<span class="text-danger">*</span></label>
                           <input type="text" name="method_of_administration" class="form-control" placeholder="Method of Administration" aria-label="Method of Administration" value="{{ old('method_of_administration') }}" >
                           @error('method_of_administration')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Dose<span class="text-danger">*</span></label>
                           <input type="text" name="dose" class="form-control" placeholder="Dose" aria-label="Dose" value="{{ old('dose') }}" >@error('dose')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Time of administration<span class="text-danger">*</span></label>
                           <input type="text" name="time_of_administration" class="form-control" placeholder="Time of administration" aria-label="Time of administration" value="{{ old('time_of_administration') }}" >
                           @error('time_of_administration')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Duration of Therapy<span class="text-danger">*</span></label>
                           <input type="text" name="duration_of_therapy" class="form-control" placeholder="Duration of Therapy" aria-label="Duration of Therapy" value="{{ old('duration_of_therapy') }}" >
                           @error('duration_of_therapy')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Vehicle<span class="text-danger">*</span></label>
                           <input type="text" name="vehicle" class="form-control" placeholder="Vehicle" aria-label="Vehicle" value="{{ old('vehicle') }}" >
                           @error('vehicle')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Indications<span class="text-danger">*</span></label>
                           <input type="text" name="indicationsduration_of_therapy" class="form-control" placeholder="Indications" aria-label="Duration of Therapy" value="{{ old('indicationsduration_of_therapy') }}" >
                           @error('indicationsduration_of_therapy')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Contra indications<span class="text-danger">*</span></label>
                           <input type="text" name="contraindicationsduration_of_therapy" class="form-control" placeholder="Contra indications" aria-label="Duration of Therapy" value="{{ old('contraindicationsduration_of_therapy') }}" >
                           @error('contraindicationsduration_of_therapy')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Wholesome diet<span class="text-danger">*</span></label>
                           <input type="text" name="wholesome_diet" class="form-control" placeholder="Wholesome diet" aria-label="Wholesome diet" value="{{ old('wholesome_diet') }}" >
                           @error('wholesome_diet')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Whole some activities<span class="text-danger">*</span></label>
                           <input type="text" name="wholesome_activities" class="form-control" placeholder="Whole some activities" aria-label="Wholesome activities" value="{{ old('wholesome_activities') }}" >@error('wholesome_activities')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Wholesome behavior<span class="text-danger">*</span></label>
                           <input type="text" name="wholesome_behavior" class="form-control" placeholder="Wholesome behavior" aria-label="Wholesome behavior" value="{{ old('wholesome_behavior') }}" >
                           @error('wholesome_behavior')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <p class="text-uppercase text-sm">Observations</p>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Quantity of Raw Material<span class="text-danger">*</span></label>
                           <input type="text" name="quantity_of_raw_material" class="form-control" placeholder="Quantity of Raw Material" aria-label="Quantity of Raw Material" value="{{ old('quantity_of_raw_material') }}" >@error('quantity_of_raw_material')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Quantity of finished product<span class="text-danger">*</span></label>
                           <input type="text" name="quantity_of_finished_product" class="form-control" placeholder="Quantity of finished product" aria-label="Quantity of finished product" value="{{ old('quantity_of_finished_product') }}" >
                           @error('quantity_of_finished_product')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Loss<span class="text-danger">*</span></label>
                           <input type="text" name="loss" class="form-control" placeholder="Loss" aria-label="Loss" value="{{ old('loss') }}" >
                           @error('loss')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Reasons for Loss<span class="text-danger">*</span></label>
                           <input type="text" name="reasons_for_loss" class="form-control" placeholder="Reasons for Loss" aria-label="Name" value="{{ old('reasons_for_loss') }}" >
                           @error('reasons_for_loss')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">(i)<span class="text-danger">*</span></label>
                           <input type="text" name="reasons_for_loss_first" class="form-control" placeholder="(i)" aria-label="(i)" value="{{ old('reasons_for_loss_first') }}" >@error('reasons_for_loss_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">(ii)<span class="text-danger">*</span></label>
                           <input type="text" name="reasons_for_loss_second" class="form-control" placeholder="(ii)" aria-label="Name" value="{{ old('reasons_for_loss_second') }}" >
                           @error('reasons_for_loss_second')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Organoleptic properties of raw materials<span class="text-danger">*</span></label>
                           <input type="text" name="organoleptic_properties_of_raw_materials" class="form-control" placeholder="Organoleptic properties of raw materials" aria-label="Name" value="{{ old('organoleptic_properties_of_raw_materials') }}" >
                           @error('organoleptic_properties_of_raw_materials')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Organoleptic properties of finished product<span class="text-danger">*</span></label>
                           <input type="text" name="organoleptic_properties_of_finished_product" class="form-control" placeholder="Organoleptic properties of finished product" aria-label="Organoleptic properties of finished product " value="{{ old('organoleptic_properties_of_finished_product') }}" >
                           @error('organoleptic_properties_of_finished_product')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <p class="text-uppercase text-sm">Time taken for the practical</p>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group ">
                           <label class="control-label col-sm-2 requiredField" for="date">(i) Starting Date<span class="text-danger">*</span>
                           </label>
                           <div class="input-group">
                           </div>
                           <input class="form-control" id="date" name="starting_date" placeholder="MM/DD/YYYY" type="date" aria-label="(i)  Starting Date" value="{{ old('starting_date') }}" >@error('starting_date')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group ">
                           <label class="control-label col-sm-2 requiredField" for="date">(ii)  Ending Date<span class="text-danger">*</span>
                           </label>
                           <div class="input-group">
                           </div>
                           <input class="form-control" id="date" name="ending_date" placeholder="MM/DD/YYYY" type="date" aria-label="(i)  Ending Date" value="{{ old('ending_date') }}" >@error('ending_date')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
              </div>
              <button type="submit" class="btn btn-secondary">Add Vati Yogas</button>
         </form>
      </div>
         <!-- vati_yogas end -->
        <div id="talia_yogas" style="display:none;">
         <form method="POST" action="{{ url('talia-yogas-details') }}" >
               @csrf
               <input type="hidden" name="yoga_type" value="4">
               <input type="hidden" name="date_of_yogas" value="<?php echo date('Y-m-d'); ?>">
               <input type="hidden" name="shishya_id" value="{{ Auth::user()->id }}">
            <div class="row">
               <div class="form-group">
                  <h5 class="text text-center">
                     4 – TALIA YOGAS
                  </h5>
               </div>
               <div class="form-group">
                  <h5 class="text-center">Name of the Drug</h5>
               </div>
               <div class="form-group">
                  <h5 class="text">
                     Reference
                     <p class='text-danger text-xs pt-1'>Text, Chapter, Sloka – to -  (Published by, Edition, Writers/Translator)</p>
                  </h5>
               </div>
               <div class="form-group">
                  <h5 class="mb-1">Composition</h5>
               </div>
            </div>
            <div class="row">

               <div class="row">
                     <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="faqs" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name of the Ingredients </th>
                                            <th>Part used   </th>
                                            <th>Quantity</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                              <input type="text" name="name_of_the_ingredients[]" class="form-control" placeholder="Name of the ingredients Mineral" aria-label="name_of_the_ingredients_mineral_metal" value="{{ old('name_of_the_ingredients_mineral_metal') }}" >
                                                @error('name_of_the_ingredients_mineral_metal')
                                                <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                @enderror
                                             </td>

                                            <td>
                                             <input type="text" name="part_used[]" class="form-control" placeholder="Part used"  value="{{ old('part_used') }}" >@error('part_used')
                                             <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                             @enderror
                                            </td>
                                            <td class="text-warning mt-10">
                                             <input type="text" name="quantity[]" class="form-control" placeholder="quantity" aria-label="quantity" value="{{ old('quantity') }}" >
                                             @error('quantity')
                                             <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                             @enderror
                                            </td>
                                            <!-- <td class="mt-10"><button class="badge badge-danger"><i class="fa fa-trash"></i> Delete</button></td> -->
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div style="float:right;"><button  onclick="addfaqs();" type="button" class="btn btn-success"><i class="fa fa-plus"></i> ADD NEW</button></div>
                        </div>
                    </div>
                  </div>
            </div>
            <p class="text-uppercase text-sm">I Kalka dravyas</p>
            <div class="row">
               <div class="col-md-12">
                    <div class="form-group">
                       <label  class="form-control-label">Enter Yogas Name</label>
                       <input type="text" name="talia_yoga_type_individual" class="form-control" placeholder="Talia Yoga Type Individual"  value="{{ old('talia_yoga_type_individual') }}" maxlength="50" required>
                       @error('talia_yoga_type_individual')
                       <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                       @enderror
                    </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Step 1</label>
                     <input type="text" name="kalka_dravyas_step_first" class="form-control" placeholder="1"  maxlength="50" required>@error('kalka_dravyas_step_first')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Step 2</label>
                     <input type="text" name="kalka_dravyas_step_second" class="form-control" placeholder="2" maxlength="50" required>
                     @error('kalka_dravyas_step_second')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Step 3</label>
                     <input type="text" name="kalka_dravyas_step_three" class="form-control" placeholder="3" maxlength="50" >
                     @error('kalka_dravyas_step_three')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
            </div>
            <p class="text-uppercase text-sm">II Taila/ghrita dravys</p>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Step 1</label>
                     <input type="text" name="taila_dravys_step_first" class="form-control" placeholder="1"  maxlength="50">
                     @error('taila_dravys_step_first')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Step 2</label>
                     <input type="text" name="taila_dravys_step_second" class="form-control" placeholder="2" aria-label="Step 2" value="{{ old('taila_dravys_step_second') }}" maxlength="50">
                     @error('taila_dravys_step_second')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Step 3</label>
                     <input type="text" name="taila_dravys_step_three" class="form-control" placeholder="3" aria-label="Step 1" maxlength="50">@error('taila_dravys_step_second')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
            </div>
            <p class="text-uppercase text-sm">III Kvatha/drava dravyas</p>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Step 1</label>
                     <input type="text" name="kvatha_dravyas_step_first" class="form-control" placeholder="1" aria-label="Step 1" value="{{ old('kvatha_dravyas_step_first') }}" maxlength="50">@error('kvatha_dravyas_step_first')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Step 2</label>
                     <input type="text" name="kvatha_dravyas_step_second" class="form-control" placeholder="2" aria-label="Step 2" value="{{ old('kvatha_dravyas_step_second') }}" maxlength="50">
                     @error('kvatha_dravyas_step_second')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Step 3</label>
                     <input type="text" name="kvatha_dravyas_step_three" class="form-control" placeholder="3" aria-label="Step 1" value="{{ old('kvatha_dravyas_step_three') }}" maxlength="50">@error('kvatha_dravyas_step_three')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
            </div>
            <p class="text-uppercase text-sm">Method of Preparation (SOP)</p>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">(i) Taila/ghrita murchana</label>
                     <input type="text" name="kvatha_dravyas_step_murchana" class="form-control" placeholder="(i) Taila/ghrita murchana" aria-label="Step 1" value="{{ old('kvatha_dravyas_step_murchana') }}" maxlength="50">@error('kvatha_dravyas_step_murchana')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">(ii) Preparation of Kalka</label>
                     <input type="text" name="preparation_of_kalka" class="form-control" placeholder="(ii) Preparation of Kalka" aria-label="Step 2" value="{{ old('preparation_of_kalka') }}" maxlength="50">
                     @error('preparation_of_kalka')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">(iii) Preparation of kvatha/drava dravyas</label>
                     <input type="text" name="preparation_of_kavatha_dravyas" class="form-control" placeholder="(iii) Preparation of kvatha/drava dravyas" aria-label="Name" value="{{ old('preparation_of_kavatha_dravyas') }}" maxlength="50">
                     @error('preparation_of_kavatha_dravyas')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">(iv) Order of mixing</label>
                     <input type="text" name="order_of_mixing" class="form-control" placeholder="(iv) Order of mixing" aria-label="Name" value="{{ old('order_of_mixing') }}" maxlength="50">
                     @error('order_of_mixing')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">(v) Paka procedure</label>
                     <input type="text" name="paka_procedure" class="form-control" placeholder="(v) Paka procedure" aria-label="Name" value="{{ old('paka_procedure') }}" maxlength="50">
                     @error('paka_procedure')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Packing</label>
                     <input type="text" name="packing" class="form-control" placeholder="Packing" aria-label="Packing" value="{{ old('packing') }}" maxlength="50">@error('packing')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Storage</label>
                     <input type="text" name="storage" class="form-control" placeholder="Storage" aria-label="Storage" value="{{ old('storage') }}" maxlength="50">
                     @error('storage')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Method of Administration</label>
                     <input type="text" name="method_of_administration" class="form-control" placeholder="Method of Administration" aria-label="Method of Administration" value="{{ old('method_of_administration') }}" maxlength="50">
                     @error('method_of_administration')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Time of administration</label>
                     <input type="text" name="time_of_administration" class="form-control" placeholder="Time of administration" aria-label="Time of administration" value="{{ old('time_of_administration') }}" maxlength="50">
                     @error('time_of_administration')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Dose</label>
                     <input type="text" name="dose" class="form-control" placeholder="Dose" value="{{ old('dose') }}" maxlength="50">
                     @error('dose')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Vehicle</label>
                     <input type="text" name="vehicle" class="form-control" placeholder="Vehicle" value="{{ old('vehicle') }}" maxlength="50">
                     @error('vehicle')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Duration of Therapy</label>
                     <input type="text" name="duration_of_therapy" class="form-control" placeholder="Duration of Therapy" value="{{ old('duration_of_therapy') }}" maxlength="50">
                     @error('duration_of_therapy')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Wholesome diet</label>
                     <input type="text" name="wholesome_diet" class="form-control" placeholder="wholesome diet" value="{{ old('wholesome_diet') }}" maxlength="50">
                     @error('Wholesome diet')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Wholesome activities</label>
                     <input type="text" name="wholesome_activities" class="form-control" placeholder="Wholesome activities" value="{{ old('wholesome_activities') }}" maxlength="50">
                     @error('wholesome_activities')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Wholesome behavior</label>
                     <input type="text" name="wholesome_behaviour" class="form-control" placeholder="Wholesome behavior" value="{{ old('wholesome_behaviour') }}" maxlength="50">
                     @error('Wholesome behavior')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Indications</label>
                     <input type="text" name="indications" class="form-control" placeholder="Indications" value="{{ old('indications') }}" maxlength="50">
                     @error('indications')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Contra indications</label>
                     <input type="text" name="contra_indications" class="form-control" placeholder="Contra indications" aria-label="Contra indications" value="{{ old('contra_indications') }}" maxlength="50">
                     @error('contra_indications')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
            </div>
            <p class="text-uppercase text-sm">Observations</p>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Quantity of Raw Material</label>
                     <input type="text" name="quantity_of_raw_material" class="form-control" placeholder="Quantity of Raw Material"  value="{{ old('quantity_of_raw_material') }}" maxlength="50">
                     @error('quantity_of_raw_material')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Quantity of finished product</label>
                     <input type="text" name="quantity_of_finished_product" class="form-control" placeholder="Quantity of finished product"  value="{{ old('quantity_of_finished_product') }}" maxlength="50">
                     @error('quantity_of_finished_product')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Loss</label>
                     <input type="text" name="loss" class="form-control" placeholder="Loss" value="{{ old('Loss') }}" >
                     @error('loss')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Reasons for Loss</label>
                     <input type="text" name="reasons_for_loss" class="form-control" placeholder="Reasons for Loss"  value="{{ old('reasons_for_loss') }}" >
                     @error('Reasons for Loss')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Signs of mridu – madhyama – khara paka</label>
                     <input type="text" name="mridu" class="form-control" placeholder="Signs of mridu – madhyama – khara paka" value="{{ old('mridu') }}" >@error('(i)')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label  class="form-control-label">Organoleptic properties of raw materials</label>
                     <input type="text" name="organoleptic_properties_of_raw_materials" class="form-control" placeholder="Organoleptic properties of raw materials"  value="{{ old('organoleptic_properties_of_raw_materials') }}" maxlength="50">
                     @error('Organoleptic properties of raw materials')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label  class="form-control-label">Organoleptic properties of finished product</label>
                     <input type="text" name="organoleptic_properties_of_finished_product" class="form-control" placeholder="Organoleptic properties of finished product" value="{{ old('organoleptic_properties_of_finished_product') }}" maxlength="50">
                     @error('Organoleptic properties of finished product ')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
            </div>
            <p class="text-uppercase text-sm">Time taken for the experiment</p>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group ">
                     <label class="control-label col-sm-2 requiredField" for="date">(i) Starting Date
                     </label>
                     <div class="input-group">
                     </div>
                     <input class="form-control" id="date" name="starting_date" placeholder="MM/DD/YYYY" type="date" value="{{ old('starting_date') }}" >
                     @error('starting_date')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group ">
                     <label class="control-label col-sm-2 requiredField" for="date">(ii)  Ending Date
                     </label>
                     <div class="input-group">
                     </div>
                     <input class="form-control" id="date" name="ending_date" placeholder="MM/DD/YYYY" type="date" >
                     @error('(i) Ending Date')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
            </div>
            <button type="submit" class="btn btn-secondary">Add Talia Yogas</button>
         </form>
        </div>

      <!-- talia_yogas end -->
      <div id="asva_yogas" style="display:none;">
        <form method="POST" action="{{ url('add-arishtayoga-details') }}" >
            @csrf
            <input type="hidden" name="yoga_type" value="5">
            <input type="hidden" name="date_of_yogas" value="<?php echo date('Y-m-d'); ?>">
            <input type="hidden" name="shishya_id" value="{{ Auth::user()->id }}">
         <div class="row">
            <div class="form-group">
               <h5 class="text-center">5 – ASAVA/ARISHTA YOGAS</h5>
            </div>
            <div class="form-group">
               <h5 class="text-center">Name of the Drug</h5>
            </div>
            <div class="form-group">
               <h5 class="text">
                  Reference
                  <p class='text-danger text-xs pt-1'>Text, Chapter, Sloka – to -  (Published by, Edition, Writers/Translator)</p>
               </h5>
            </div>
         </div>
         <p class="text-uppercase text-sm">Composition</p>
         <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="faqs" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name of the ingredients </th>
                                        <th>Part used   </th>
                                        <th>Quantity</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                          <input type="text" name="name_of_the_ingredients[]" class="form-control" placeholder="Name of the ingredients Mineral" aria-label="name_of_the_ingredients_mineral_metal" value="{{ old('name_of_the_ingredients_mineral_metal') }}" >
                                            @error('name_of_the_ingredients_mineral_metal')
                                            <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                            @enderror
                                         </td>

                                        <td>
                                         <input type="text" name="part_used[]" class="form-control" placeholder="Part used"  value="{{ old('part_used') }}" >@error('part_used')
                                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                         @enderror
                                        </td>
                                        <td class="text-warning mt-10">
                                         <input type="text" name="quantity[]" class="form-control" placeholder="quantity" aria-label="quantity" value="{{ old('quantity') }}" >
                                         @error('quantity')
                                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                         @enderror
                                        </td>
                                        <!-- <td class="mt-10"><button class="badge badge-danger"><i class="fa fa-trash"></i> Delete</button></td> -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="float:right;"><button  onclick="addfaqs();" type="button" class="btn btn-success"><i class="fa fa-plus"></i> ADD NEW</button></div>
                    </div>
                </div>
            </div>
         </div>
         <p class="text-uppercase text-sm">I Main ingredients</p>
         <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                   <label  class="form-control-label">Enter Yogas Name</label>
                   <input type="text" name="arishtayoga_type_individual" class="form-control" placeholder="Churna Yoga Type Individual"  value="{{ old('churna_yoga_type_individual') }}" maxlength="50" required>

                  @if ($errors->has('churna_yoga_type_individual'))
                      <span class="help-block">
                          <strong style="color:red;">{{ $errors->first('churna_yoga_type_individual') }}</strong>
                      </span>
                  @endif
                </div>
             </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Step I</label>
                  <input type="text" name="main_ingredients_step_one" class="form-control" placeholder="1" aria-label="1" value="{{ old('1') }}" required>@error('1')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Step II</label>
                  <input type="text" name="main_ingredients_step_two" class="form-control" placeholder="2" aria-label="Step 2" value="{{ old('2') }}" required>
                  @error('2')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Step III</label>
                  <input type="text" name="main_ingredients_step_three" class="form-control" placeholder="3" aria-label="Step 1" value="{{ old('1') }}" >@error('1')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
         </div>
         <p class="text-uppercase text-sm">II    Sandhana dravyas</p>
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Step I</label>
                  <input type="text" name="prakshepa_dravyas_step_one" class="form-control" placeholder="1" aria-label="Step 1" value="{{ old('1') }}" >@error('1')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Step II</label>
                  <input type="text" name="prakshepa_dravyas_step_two" class="form-control" placeholder="2" aria-label="Step 2" value="{{ old('2') }}" >
                  @error('2')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Step III</label>
                  <input type="text" name="prakshepa_dravyas_step_three" class="form-control" placeholder="3" aria-label="Step 1" value="{{ old('1') }}" >@error('1')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
         </div>
         <p class="text-uppercase text-sm">III Prakshepa dravyas</p>
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Step I</label>
                  <input type="text" name="method_of_preparation" class="form-control" placeholder="1" aria-label="Step 1" value="{{ old('1') }}" >@error('1')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Step II</label>
                  <input type="text" name="packing" class="form-control" placeholder="2" aria-label="Step 2" value="{{ old('2') }}" >
                  @error('2')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">3</label>
                  <input type="text" name="storage" class="form-control" placeholder="3" aria-label="Step 1" value="{{ old('1') }}" >@error('1')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
         </div>
         <p class="text-uppercase text-sm">Method of Preparation (SOP)</p>
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Step 1</label>
                  <input type="text" name="method_of_administration" class="form-control" placeholder="Step 1" aria-label="Step 1" value="{{ old('Step 1') }}" >@error('Step 1')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Packing</label>
                  <input type="text" name="packing" class="form-control" placeholder="Packing" aria-label="Packing" value="{{ old('Packing') }}" >@error('Packing')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Storage</label>
                  <input type="text" name="storage" class="form-control" placeholder="Storage" aria-label="Storage" value="{{ old('Storage') }}" >
                  @error('Storage')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Method of Administration</label>
                  <input type="text" name="method_of_administration" class="form-control" placeholder="Method of Administration" aria-label="Method of Administration" value="{{ old('Method of Administration') }}" >
                  @error('Method of Administration')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Time of administration</label>
                  <input type="text" name="time_of_administration" class="form-control" placeholder="Time of administration" aria-label="Time of administration" value="{{ old('Time of administration') }}" >
                  @error('Time of administration')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Dose</label>
                  <input type="text" name="dose" class="form-control" placeholder="Dose" aria-label="Dose" value="{{ old('Dose') }}" >@error('Dose')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Vehicle (Anupana)</label>
                  <input type="text" name="vehicle" class="form-control" placeholder="Vehicle (Anupana)" aria-label="Vehicle" value="{{ old('Vehicle') }}" >
                  @error('Vehicle')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Indications</label>
                  <input type="text" name="indications" class="form-control" placeholder="Indications" aria-label="Indications" value="{{ old('Indications') }}" >
                  @error('Indications')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Contra indications</label>
                  <input type="text" name="contra_indications" class="form-control" placeholder="Contra indications" aria-label="Contra indications" value="{{ old('Contra indications') }}" >
                  @error('Contra indications')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Duration of Therapy</label>
                  <input type="text" name="duration_of_therapy" class="form-control" placeholder="Duration of Therapy" aria-label="Duration of Therapy" value="{{ old('Duration of Therapy') }}" >
                  @error('Duration of Therapy')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Wholesome diet</label>
                  <input type="text" name="wholesome_diet" class="form-control" placeholder="Wholesome diet" aria-label="Wholesome diet" value="{{ old('Wholesome diet') }}" >
                  @error('Wholesome diet')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Wholesome activities</label>
                  <input type="text" name="wholesome_activities" class="form-control" placeholder="Wholesome activities" aria-label="Wholesome activities" value="{{ old('Wholesome activities') }}" >@error('Wholesome activities')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Wholesome behavior</label>
                  <input type="text" name="wholesome_behavior" class="form-control" placeholder="Wholesome behavior" aria-label="Wholesome behavior" value="{{ old('Wholesome behavior') }}" >
                  @error('Wholesome behavior')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
         </div>
         <p class="text-uppercase text-sm">Observations</p>
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Quantity of Raw Material</label>
                  <input type="text" name="quantity_of_raw_material" class="form-control" placeholder="Quantity of Raw Material" aria-label="Quantity of Raw Material" value="{{ old('Quantity of Raw Material') }}" >@error('Quantity of Raw Material')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Quantity of finished product</label>
                  <input type="text" name="quantity_of_finished_product" class="form-control" placeholder="Quantity of finished product" aria-label="Quantity of finished product" value="{{ old('Quantity of finished product') }}" >
                  @error('Quantity of finished product')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Loss</label>
                  <input type="text" name="loss" class="form-control" placeholder="Loss" aria-label="Loss" value="{{ old('Loss') }}" >
                  @error('Loss')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Reasons for Loss</label>
                  <input type="text" name="reasons_for_loss" class="form-control" placeholder="Reasons for Loss" aria-label="Name" value="{{ old('Reasons for Loss') }}" >
                  @error('Reasons for Loss')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Organoleptic properties of raw materials</label>
                  <input type="text" name="organoleptic_properties_of_raw_materials" class="form-control" placeholder="Organoleptic properties of raw materials" aria-label="Name" value="{{ old('Organoleptic properties of raw materials') }}" >
                  @error('Organoleptic properties of raw materials')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Organoleptic properties of finished product</label>
                  <input type="text" name="organoleptic_properties_of_finished_product" class="form-control" placeholder="Date" aria-label="Organoleptic properties of finished product " value="{{ old('Organoleptic properties of finished product ') }}" >
                  @error('Organoleptic properties of finished product ')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Time taken for the sandhana process</label>
                  <input type="text" name="time_taken_sandhana" class="form-control" placeholder="Time taken for the sandhana process" aria-label="Name" value="{{ old('Organoleptic properties of raw materials') }}" >
                  @error('Organoleptic properties of raw materials')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Duration required for the entire experiment</label>
                  <input type="text" name="duration_for_entire_experiment" class="form-control" placeholder="Duration required for the entire experiment" aria-label="Organoleptic properties of finished product " value="{{ old('Organoleptic properties of finished product ') }}" >
                  @error('Organoleptic properties of finished product ')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Tests performed during experiment</label>
                  <input type="text" name="tests_performed_during_experiment" class="form-control" placeholder="Tests performed during experiment" aria-label="Organoleptic properties of finished product " value="{{ old('Organoleptic properties of finished product ') }}" >
                  @error('Organoleptic properties of finished product ')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
         </div>
         <p class="text-uppercase text-sm">Time taken for the experiment</p>
         <div class="row">
            <div class="col-md-6">
               <div class="form-group ">
                  <label class="control-label col-sm-2 requiredField" for="date">(i) Starting Date
                  </label>
                  <div class="input-group">
                  </div>
                  <input class="form-control" id="date" name="starting_date" placeholder="MM/DD/YYYY" type="date" aria-label="(i)  Starting Date" value="{{ old('(i)   Starting Date') }}" >@error('(i) Starting Date')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group ">
                  <label class="control-label col-sm-2 requiredField" for="date">(ii)  Ending Date
                  </label>
                  <div class="input-group">
                  </div>
                  <input class="form-control" id="date" name="ending_date" placeholder="MM/DD/YYYY" type="date" aria-label="(i)  Ending Date" value="{{ old('(i)   Starting Date') }}" >@error('(i) Ending Date')
                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                  @enderror
               </div>
            </div>
         </div>
         <button type="submit" class="btn btn-secondary">Add ASAVA/ARISHTA Yogas</button>
        </form>
      </div>
      <!-- asva_yogas end -->
   </div>

  
</section>

<script>
   function yogas_select_change(){


    if($('#yogas_select').val()==1){
        $("#yogas_type").html($("#churna_yogas").html());
    } else if($('#yogas_select').val()==2){
        $("#yogas_type").html($("#rasa_yogas").html());
    } else if($('#yogas_select').val()==3){
        $("#yogas_type").html($("#vati_yogas").html());
    } else if($('#yogas_select').val()==4){
        $("#yogas_type").html($("#talia_yogas").html());
    } else if($('#yogas_select').val()==5){
        $("#yogas_type").html($("#asva_yogas").html());
    }

   }
</script>

<script>
var faqs_row = 0;
function addfaqs() {
html = '<tr id="faqs-row' + faqs_row + '">';
    html += '<td><input type="text" name="name_of_the_ingredients[]" class="form-control" placeholder="quantity" aria-label="quantity" value=""></td>';
    html += '<td><input type="text" name="part_used[]" class="form-control" placeholder="Part used" aria-label="Part used" value=""></td>';
    html += '<td class="text-danger mt-10"> <input type="text" name="quantity[]" class="form-control" placeholder="quantity" aria-label="quantity" value=""></td>';
    html += '<td class="mt-10"><button class="btn btn-danger" onclick="$(\'#faqs-row' + faqs_row + '\').remove();"><i class="fa fa-trash"></i> Delete</button></td>';

    html += '</tr>';

$('#faqs tbody').append(html);

faqs_row++;
}
</script>

<script>
   
   $(document).ready(function() {
$("#basic-form").validate({
 
rules: {
name : {
required: true,
minlength: 3
},
age: {
required: true,
number: true,
min: 18
},
email: {
required: true,
email: true
},
weight: {
required: {
depends: function(elem) {
return $("#age").val() > 50
}
},
number: true,
min: 0
}
}
});
});
   
</script>
@endsection
@extends('layouts.app-file')
@section('content')


<section class="content">
  
   <div class="container-fluid">
   <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                       <ul class="breadcrumb breadcrumb-style ">
                          <li class="breadcrumb-item">
                             <h6 class="page-title">Drug Details </h6>

                          </li>
                          <li class="breadcrumb-item bcrumb-1">
                            <a href="{{url('/dashboard')}}">
                             <i class="fas fa-home"></i> Home</a>
                          </li>

                          <li class="breadcrumb-item active">Drug Details </li>
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
                                             @if(Auth::user()->guru_id || Auth::user()->user_type==1)
                                             <input
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
                                             value=
                                             "@if(Auth::user()->user_type==1 || Auth::user()->user_type==2) {{$shishyarecord->firstname.' '.$shishyarecord->middlename.' '.$shishyarecord->lastname}} @else {{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}}
                                             @endif" readonly
                                             >
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
                                             value="<?php echo date('Y-m-d'); ?>" readonly
                                             >
                                       </div>
                                    </div>

                                 </div>

                                 <hr style="height:2px;">
                                <!--  <div class="row "readonly >

                                    <div
                                       class="col-md-4">
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
                                    <div class="col-md-8"></div>
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
            <form method="POST" action="{{ url('update-drug-details') }} "readonly >
                @csrf
                <input type="hidden" name="drug_id" value="{{ $churandrug->id }}">
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
                                                   @foreach($churandrugpart as $churandrugpartdata)
                                                   <tr>
                                                        <td>
                                                         <input type="hidden" name="drug_part_id[]" value="{{ $churandrugpartdata->id }} "readonly >

                                                         <input type="text" name="name_of_the_ingredients[]" class="form-control" placeholder="Name of the ingredients" aria-label="Name of the ingredients" value="{{ $churandrugpartdata->name_of_the_ingredients }} "readonly >
                                                         @error('name_of_the_ingredients')
                                                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                         @enderror
                                                         </td>

                                                        <td>
                                                         <input type="text" name="part_used[]" class="form-control" placeholder="Part used" aria-label="Part used" value="{{ $churandrugpartdata->part_used }} "readonly >
                                                         @error('part_used')
                                                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                         @enderror
                                                        </td>
                                                        <td class="text-warning mt-10">
                                                         <input type="text" name="quantity[]" class="form-control" placeholder="quantity" aria-label="quantity" value="{{ $churandrugpartdata->quantity }} "readonly >
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
                 <p class="text-uppercase text-sm">Method of Preparation (SOP)</p>
                <div class="row">
                     <div class="col-md-12">
                       <div class="form-group">
                          <label  class="form-control-label">Enter Yogas Name</label>
                          <input type="text" name="churna_yoga_type_individual" class="form-control"  value="{{ $churandrug->churna_yoga_type_individual }} "readonly >@error('rasa_yoga_type_individual')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Step 1</label>
                          <input type="text" name="step_first" class="form-control" placeholder="Step 1" aria-label="Step 1" value="{{ $churandrug->step_first }} "readonly >@error('step_first')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Step 2</label>
                          <input type="text" name="step_second" class="form-control" placeholder="Step 2" aria-label="Step 2" value="{{ $churandrug->step_second }} "readonly >
                          @error('step_second')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Step 3</label>
                          <input type="text" name="step_three" class="form-control" placeholder="Step 3" aria-label="Name" value="{{ $churandrug->step_three }} "readonly >
                          @error('step_three')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Step 4,  etc.</label>
                          <input type="text" name="step_four" class="form-control" placeholder="Step 4" aria-label="Step 4" value="{{ $churandrug->step_four }} "readonly >
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
                          <input type="text" name="packing" class="form-control" placeholder="Packing" aria-label="Packing" value="{{ $churandrug->packing }} "readonly >@error('Packing')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Storage</label>
                          <input type="text" name="storage" class="form-control" placeholder="Storage" aria-label="Storage" value="{{ $churandrug->storage }} "readonly >
                          @error('storage')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Method of Administration</label>
                          <input type="text" name="method_of_administration" class="form-control" placeholder="Method of Administration"  value="{{ $churandrug->method_of_administration }} "readonly >
                          @error('method_of_administration')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Time of administration</label>
                          <input type="text" name="time_of_administration" class="form-control" placeholder="Time of administration" aria-label="Time of administration" value="{{ $churandrug->time_of_administration }} "readonly >
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
                          <input type="text" name="dose" class="form-control" placeholder="Dose" aria-label="Dose" value="{{ $churandrug->dose }} "readonly >@error('dose')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Vehicle</label>
                          <input type="text" name="vehicle" class="form-control" placeholder="Vehicle" aria-label="Vehicle" value="{{ $churandrug->vehicle }} "readonly >
                          @error('vehicle')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Duration of Therapy</label>
                          <input type="text" name="duration_of_therapy" class="form-control" placeholder="Duration of Therapy" aria-label="Duration of Therapy" value="{{ $churandrug->duration_of_therapy }} "readonly >
                          @error('Duration of Therapy')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Wholesome diet</label>
                          <input type="text" name="wholesome_diet" class="form-control" placeholder="Wholesome diet" aria-label="Wholesome diet" value="{{ $churandrug->wholesome_diet }} "readonly >
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
                          <input type="text" name="wholesome_activities" class="form-control" placeholder="Wholesome activities" aria-label="Wholesome activities" value="{{ $churandrug->wholesome_activities }} "readonly >@error('Wholesome activities')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Wholesome behavior</label>
                          <input type="text" name="wholesome_behavior" class="form-control" placeholder="Wholesome behavior" aria-label="Wholesome behavior" value="{{ $churandrug->wholesome_behavior }} "readonly >
                          @error('Wholesome behavior')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Indications</label>
                          <input type="text" name="indications" class="form-control" placeholder="Indications" aria-label="Indications" value="{{ $churandrug->indications }} "readonly >
                          @error('Indications')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Contra indications</label>
                          <input type="text" name="contra_indications" class="form-control" placeholder="Contra indications" aria-label="Contra indications" value="{{ $churandrug->contra_indications }} "readonly >
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
                          <input type="text" name="quantity_of_raw_material" class="form-control" placeholder="Quantity of Raw Material" aria-label="Quantity of Raw Material" value="{{ $churandrug->quantity_of_raw_material }} "readonly >@error('Quantity of Raw Material')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Quantity of finished product</label>
                          <input type="text" name="quantity_of_finished_product" class="form-control" placeholder="Quantity of finished product" value="{{ $churandrug->quantity_of_finished_product }} "readonly >
                          @error('Quantity of finished product')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Loss<span class="text-danger">*</span></label>
                          <input type="text" name="loss" class="form-control" placeholder="Loss" aria-label="Loss" value="{{ $churandrug->loss }} "readonly >
                          @error('Loss')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Reasons for Loss<span class="text-danger">*</span></label>
                          <input type="text" name="reasons_for_loss" class="form-control" placeholder="Reasons for Loss" aria-label="Name" value="{{ $churandrug->reasons_for_loss }} "readonly >
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
                          <input type="text" name="reasons_for_loss_first" class="form-control" placeholder="(i)" aria-label="(i)" value="{{ $churandrug->reasons_for_loss_first }} "readonly >@error('(i)')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Step 2<span class="text-danger">*</span></label>
                          <input type="text" name="reasons_for_loss_second" class="form-control" placeholder="(ii)" aria-label="Name" value="{{ $churandrug->reasons_for_loss_second }} "readonly >
                          @error('(ii)')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Organoleptic properties of raw materials<span class="text-danger">*</span></label>
                          <input type="text" name="organoleptic_properties_of_raw_materials" class="form-control" placeholder="Organoleptic properties of raw materials" aria-label="Name" value="{{ $churandrug->organoleptic_properties_of_raw_materials }} "readonly >
                          @error('Organoleptic properties of raw materials')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Organoleptic properties of finished product<span class="text-danger">*</span></label>
                          <input type="text" name="organoleptic_properties_of_finished_product" class="form-control" placeholder="Organoleptic"  value="{{ $churandrug->organoleptic_properties_of_finished_product }} "readonly >
                          @error('Organoleptic properties of finished product ')
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
                          <input class="form-control" id="date" name="starting_date" placeholder="MM/DD/YYYY" type="date" aria-label="(i)  Starting Date" value="{{ $churandrug->starting_date }} "readonly >@error('(i) Starting Date')
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
                          <input class="form-control" id="date" name="ending_date" placeholder="MM/DD/YYYY" type="date" aria-label="(i)  Ending Date" value="{{ $churandrug->ending_date }} "readonly >@error('(i) Ending Date')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                </div>
            </form>
        </div>
   </div>
</section>


@endsection

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
                  <h2>New Drug Report</h2>

                  <section>
                     <div class="col-md-12 mb-2">
                        <div class="card">
                           <!-- <form role="form" method="POST" action='' enctype="multipart/form-data"> -->
                              <!-- @csrf -->
                              <div class="card-body p-0">
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

                              
                                 <div id="yogas_type">
                                 </div>

                              </div>
                           <!-- </form> -->
                        </div>
                     </div>
                     <div style="display:;">
       <div id="churna_yogas" style="display:;">
            <form method="POST" action="{{ url('update-taliayoga-details') }}" >
                @csrf
               <input type="hidden" name="drug_id" value="{{ $drug->id }}">
              <div class="row px-2">
                 <div class="form-group  ">
                       <h5 class="text-center d-flex justify-content-center">3- TAILA – GHRITA YOGAS</h5>
                       <h5 class="d-block text-left">Name of the Drug</h5>
                       <h5 class="d-block text-left">
                          Reference
                          <p class=' text-xs pt-1'>Text, Chapter, Sloka – to – (Published by Edition, Writer/Translator)</p>
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
                            <div class="col-lg-12 ">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table id="faqs" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Name of the ingredients mineral metal</th>
                                                        <th>Part used   </th>
                                                        <th>Quantity</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($taliatype as $taliatypes)
                                                   <tr>
                                                        <td>
                                                         <input type="hidden" name="drug_part_id[]" value="{{ $taliatypes->id }}" >

                                                         <input type="text" name="name_of_the_ingredients[]" class="form-control" placeholder="Name of the ingredients" value="{{ $taliatypes->name_of_the_ingredients }}" >
                                                         @error('name_of_the_ingredients')
                                                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                         @enderror
                                                         </td>

                                                        <td>
                                                         <input type="text" name="part_used[]" class="form-control" placeholder="Part used"  value="{{ $taliatypes->part_used }}" >
                                                         @error('rasa_part_used')
                                                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                         @enderror
                                                        </td>
                                                        <td class="text-warning mt-10">
                                                         <input type="text" name="quantity[]" class="form-control" placeholder="quantity" value="{{ $taliatypes->quantity }}" >
                                                        @error('quantity')
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                        </td>
                                                        <td class="mt-10">
                                                         <a  href="{{ url('delete-taliyayoga-type/'.$taliatypes->id) }}" class="btn btn-tbl-delete" onclick="return confirm_option('delete')">
                                                              <i class="material-icons">delete_forever</i>
                                                         </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div style="float:right;"><button  onclick="addfaqs();" type="button" class="btn add btn-success"><i class="fa fa-plus"></i> ADD NEW</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="title">
                
                   <p class="text-capatilize text-sm">I Kalka dravyas</p>
                </div>
            <div class="row">
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                    <div class="form-group">
                       <label  class="form-control-label">Enter Yogas Name</label>
                       <input type="text" name="talia_yoga_type_individual" class="form-control" placeholder="Talia Yoga Type Individual"  value="{{ $drug->talia_yoga_type_individual }}" maxlength="50">
                       @error('talia_yoga_type_individual')
                       <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                       @enderror
                    </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Step 1</label>
                     <input type="text" name="kalka_dravyas_step_first" value="{{ $drug->kalka_dravyas_step_first }}" class="form-control" placeholder="1"  maxlength="50" >
                     @error('kalka_dravyas_step_first')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Step 2</label>
                     <input type="text" name="kalka_dravyas_step_second" value="{{ $drug->kalka_dravyas_step_second }}" class="form-control" placeholder="2" maxlength="50" >
                     @error('kalka_dravyas_step_second')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Step 3</label>
                     <input type="text" name="kalka_dravyas_step_three" value="{{ $drug->kalka_dravyas_step_three }}" class="form-control" placeholder="3" maxlength="50" >
                     @error('kalka_dravyas_step_three')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="title">
                
               <p class="text-capatilize text-sm">II Taila/ghrita dravys</p>
                </div>
            <div class="row">
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Step 1</label>
                     <input type="text" name="taila_dravys_step_first" value="{{ $drug->taila_dravys_step_first }}" class="form-control" placeholder="1"  maxlength="50">
                     @error('taila_dravys_step_first')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Step 2</label>
                     <input type="text" name="taila_dravys_step_second" class="form-control" placeholder="2" aria-label="Step 2" value="{{ $drug->taila_dravys_step_second }}" maxlength="50">
                     @error('taila_dravys_step_second')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Step 3</label>
                     <input type="text" name="taila_dravys_step_three" class="form-control" value="{{ $drug->taila_dravys_step_three }}" placeholder="3" aria-label="Step 1" maxlength="50">
                     @error('taila_dravys_step_second')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="title">
                
               <p class="text-capatilize text-sm">III Kvatha/drava dravyas</p>
                </div>
            <div class="row">
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Step 1</label>
                     <input type="text" name="kvatha_dravyas_step_first" class="form-control" placeholder="1" aria-label="Step 1" value="{{ $drug->kvatha_dravyas_step_first }}" maxlength="50">@error('kvatha_dravyas_step_first')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Step 2</label>
                     <input type="text" name="kvatha_dravyas_step_second" class="form-control" placeholder="2" aria-label="Step 2" value="{{ $drug->kvatha_dravyas_step_second }}" maxlength="50">
                     @error('kvatha_dravyas_step_second')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Step 3</label>
                     <input type="text" name="kvatha_dravyas_step_three" class="form-control" placeholder="3" aria-label="Step 1" value="{{ $drug->kvatha_dravyas_step_three }}" maxlength="50">@error('kvatha_dravyas_step_three')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="title">
                
               <p class="text-capatilize text-sm">Method of Preparation (SOP)</p>
                </div>
            <div class="row">
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">(i) Taila/ghrita murchana</label>
                     <input type="text" name="kvatha_dravyas_step_murchana" class="form-control" placeholder="(i) Taila/ghrita murchana" value="{{ $drug->kvatha_dravyas_step_murchana }}" maxlength="50">@error('kvatha_dravyas_step_murchana')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">(ii) Preparation of Kalka</label>
                     <input type="text" name="preparation_of_kalka" class="form-control" placeholder="(ii) Preparation of Kalka" aria-label="Step 2" value="{{ $drug->preparation_of_kalka }}" maxlength="50">
                     @error('preparation_of_kalka')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
           
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">(iii) Preparation of kvatha/drava dravyas</label>
                     <input type="text" name="preparation_of_kavatha_dravyas" class="form-control" placeholder="(iii) Preparation of kvatha/drava dravyas"  value="{{ $drug->preparation_of_kavatha_dravyas }}" maxlength="50">
                     @error('preparation_of_kavatha_dravyas')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">(iv) Order of mixing</label>
                     <input type="text" name="order_of_mixing" class="form-control" placeholder="(iv) Order of mixing" aria-label="Name" value="{{ $drug->order_of_mixing }}" maxlength="50">
                     @error('order_of_mixing')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">(v) Paka procedure</label>
                     <input type="text" name="paka_procedure" class="form-control" placeholder="(v) Paka procedure" aria-label="Name" value="{{ $drug->paka_procedure }}" maxlength="50">
                     @error('paka_procedure')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
           
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Packing</label>
                     <input type="text" name="packing" class="form-control" placeholder="Packing" aria-label="Packing" value="{{ $drug->packing }}" maxlength="50">@error('packing')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Storage</label>
                     <input type="text" name="storage" class="form-control" placeholder="Storage" aria-label="Storage" value="{{ $drug->storage }}" maxlength="50">
                     @error('storage')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Method of Administration</label>
                     <input type="text" name="method_of_administration" class="form-control" placeholder="Method of Administration"  value="{{ $drug->method_of_administration }}" maxlength="50">
                     @error('method_of_administration')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Time of administration</label>
                     <input type="text" name="time_of_administration" class="form-control" placeholder="Time of administration"  value="{{ $drug->time_of_administration }}" maxlength="50">
                     @error('time_of_administration')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
          
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Dose</label>
                     <input type="text" name="dose" class="form-control" placeholder="Dose" value="{{ $drug->dose }}" maxlength="50">
                     @error('dose')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Vehicle</label>
                     <input type="text" name="vehicle" class="form-control" placeholder="Vehicle" value="{{ $drug->vehicle }}" maxlength="50">
                     @error('vehicle')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Duration of Therapy</label>
                     <input type="text" name="duration_of_therapy" class="form-control" placeholder="Duration of Therapy" value="{{ $drug->duration_of_therapy }}" maxlength="50">
                     @error('duration_of_therapy')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Wholesome diet</label>
                     <input type="text" name="wholesome_diet" class="form-control" placeholder="wholesome diet" value="{{ $drug->wholesome_diet }}" maxlength="50">
                     @error('Wholesome diet')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
           
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Wholesome activities</label>
                     <input type="text" name="wholesome_activities" class="form-control" placeholder="Wholesome activities" value="{{ $drug->wholesome_activities }}" maxlength="50">
                     @error('wholesome_activities')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Wholesome behavior</label>
                     <input type="text" name="wholesome_behaviour" class="form-control" placeholder="Wholesome behavior" value="{{ $drug->wholesome_behaviour }}" maxlength="50">
                     @error('Wholesome behavior')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Indications</label>
                     <input type="text" name="indications" class="form-control" placeholder="Indications" value="{{ $drug->indications }}" maxlength="50">
                     @error('indications')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Contra indications</label>
                     <input type="text" name="contra_indications" class="form-control" placeholder="Contra indications" value="{{ $drug->contra_indications }}" maxlength="50">
                     @error('contra_indications')
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
                     <label for="example-text-input" class="form-control-label">Quantity of Raw Material</label>
                     <input type="text" name="quantity_of_raw_material" class="form-control" placeholder="Quantity of Raw Material"  value="{{ $drug->quantity_of_raw_material }}" maxlength="50">
                     @error('quantity_of_raw_material')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Quantity of finished product</label>
                     <input type="text" name="quantity_of_finished_product" class="form-control" placeholder="Quantity of finished product"  value="{{ $drug->quantity_of_finished_product }}" maxlength="50">
                     @error('quantity_of_finished_product')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Loss</label>
                     <input type="text" name="loss" class="form-control" placeholder="Loss" value="{{ $drug->loss }}" >
                     @error('loss')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Reasons for Loss</label>
                     <input type="text" name="reasons_for_loss" class="form-control" placeholder="Reasons for Loss"  value="{{ $drug->reasons_for_loss }}" >
                     @error('Reasons for Loss')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Signs of mridu – madhyama – khara paka</label>
                     <input type="text" name="mridu" class="form-control" placeholder="Signs of mridu – madhyama – khara paka" value="{{ $drug->mridu }}" >
                     @error('mridu')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label  class="form-control-label">Organoleptic properties of raw materials</label>
                     <input type="text" name="organoleptic_properties_of_raw_materials" class="form-control" placeholder="Organoleptic properties of raw materials"  value="{{ $drug->organoleptic_properties_of_raw_materials }}" maxlength="50">
                     @error('organoleptic_properties_of_raw_materials')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group">
                     <label  class="form-control-label">Organoleptic properties of finished product</label>
                     <input type="text" name="organoleptic_properties_of_finished_product" class="form-control" placeholder="Organoleptic properties of finished product" value="{{ $drug->organoleptic_properties_of_finished_product }}" maxlength="50">
                     @error('organoleptic_properties_of_finished_product')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="title">
                
               <p class="text-capatilize text-sm">Time taken for the experiment</p>
                </div>
            <div class="row">
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group ">
                     <label class="control-label   requiredField" for="date">(i) Starting Date
                     </label>
                     <div class="input-group">
                     </div>
                     <input class="form-control" id="date" name="starting_date" placeholder="MM/DD/YYYY" type="date" value="{{ $drug->starting_date }}" >
                     @error('starting_date')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
               <div class="col-xxl-3 col-xl-3 col-md-6 col-6">
                  <div class="form-group ">
                     <label class="control-label   requiredField" for="date">(ii)  Ending Date
                     </label>
                     <div class="input-group">
                     </div>
                     <input class="form-control" id="date" name="ending_date" placeholder="MM/DD/YYYY" type="date" value="{{ $drug->ending_date }}">
                     @error('(i) Ending Date')
                     <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                     @enderror
                  </div>
               </div>
            </div>

         </div>
               <button type="submit" class="btn add btn-secondary">Update Talia Yogas</button>
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
    html += '<input type="hidden" name="drug_part_id[]" value="0" >';

    html += '<td><input type="text" name="name_of_the_ingredients[]" class="form-control" value=""></td>';
    html += '<td><input type="text" name="part_used[]" class="form-control" placeholder="Part used" value=""></td>';
    html += '<td class="text-danger mt-10"> <input type="text" name="quantity[]" class="form-control" placeholder="quantity" ></td>';
    html += '<td class="mt-10"><button class="btn btn-tbl-delete" onclick="$(\'#faqs-row' + faqs_row + '\').remove();"><i class="material-icons">delete_forever</i></button></td>';

    html += '</tr>';

$('#faqs tbody').append(html);

faqs_row++;
}
</script>
<script>
   function confirm_option(action){
      if(!confirm("Are you sure to "+action+", this record!")){
         return false;
      }

      return true;

   }
</script>
@endsection

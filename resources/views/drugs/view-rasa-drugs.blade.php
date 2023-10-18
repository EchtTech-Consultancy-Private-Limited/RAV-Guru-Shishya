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
                                <!--  <div class="row" readonly>

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
            <form method="POST" action="{{ url('update-rasayoga-details') }}" readonly>
                @csrf
               <input type="hidden" name="drug_id" value="{{ $rasadrug->id }}">
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
                                                        <th>Name of the ingredients mineral metal</th>
                                                        <th>Part used   </th>
                                                        <th>Quantity</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($drugrasapart as $drugrasaparts)
                                                   <tr>
                                                        <td>
                                                         <input type="hidden" name="drug_part_id[]" value="{{ $drugrasaparts->id }}" readonly>

                                                         <input type="text" name="name_of_the_ingredients_mineral_metal[]" class="form-control" placeholder="Name of the ingredients" value="{{ $drugrasaparts->name_of_the_ingredients_mineral_metal }}" readonly>
                                                         @error('name_of_the_ingredients_mineral_metal')
                                                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                         @enderror
                                                         </td>

                                                        <td>
                                                         <input type="text" name="part_used[]" class="form-control" placeholder="Part used"  value="{{ $drugrasaparts->rasa_part_used }}" readonly>
                                                         @error('rasa_part_used')
                                                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                         @enderror
                                                        </td>
                                                        <td class="text-warning mt-10">
                                                         <input type="text" name="quantity[]" class="form-control" placeholder="quantity" value="{{ $drugrasaparts->rasa_quantity }}" readonly>
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
                  <p class="text-uppercase text-sm">I Herbal</p>
                  <div class="row">
                     <div class="col-md-12">
                       <div class="form-group">
                          <label  class="form-control-label">Enter Yogas Name</label>
                          <input type="text" name="rasa_yoga_type_individual" class="form-control"  value="{{ $rasadrug->rasa_yoga_type_individual }}" readonly>@error('rasa_yoga_type_individual')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 1<span class="text-danger">*</span></label>
                           <input type="text" name="herbal_first" class="form-control" placeholder="Herbal First" value="{{ $rasadrug->herbal_first }}" readonly>@error('herbal_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label  class="form-control-label">Step 2<span class="text-danger">*</span></label>
                           <input type="text" name="herbal_second" class="form-control" placeholder="2" value="{{ $rasadrug->herbal_second }}" readonly>
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
                           <input type="text" name="mineral_first" class="form-control" placeholder="1"  value="{{ $rasadrug->mineral_first }}" readonly>@error('mineral_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="form-control-label">Step 2</label>
                           <input type="text" name="mineral_second" class="form-control" placeholder="2" value="{{ $rasadrug->mineral_second }}" readonly>
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
                           <input type="text" name="metal_first" class="form-control" placeholder="1" aria-label="Step 1" value="{{ $rasadrug->metal_first }}" readonly>@error('metal_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 2<span class="text-danger">*</span></label>
                           <input type="text" name="metal_second" class="form-control" placeholder="2" aria-label="Step 2" value="{{ $rasadrug->metal_second }}" readonly>
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
                           <input type="text" name="animal_first" class="form-control" placeholder="1" aria-label="Step 1" value="{{ $rasadrug->animal_first }}" readonly>@error('animal_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 2<span class="text-danger">*</span></label>
                           <input type="text" name="animal_second" class="form-control" placeholder="2" aria-label="Step 2" value="{{ $rasadrug->animal_second }}" readonly>
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
                           <input type="text" name="bhavana_dravayas_first" class="form-control" placeholder="1" aria-label="Step 1" value="{{ $rasadrug->bhavana_dravayas_first }}" readonly>@error('bhavana_dravayas_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 2<span class="text-danger">*</span></label>
                           <input type="text" name="bhavana_dravayas_second" class="form-control" placeholder="2" aria-label="Step 2" value="{{ $rasadrug->bhavana_dravayas_second }}" readonly>
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
                           <input type="text" name="changes_seen_during_bhavana_therapy" class="form-control" placeholder="VI Changes seen during bhavana therapy" value="{{ $rasadrug->changes_seen_during_bhavana_therapy }}" readonly>@error('changes_seen_during_bhavana_therapy')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">VII Organoleptic properties of raw material<span class="text-danger">*</span></label>
                           <input type="text" name="organoleptic_properties_of_raw_material" class="form-control" placeholder="VII Organoleptic properties of raw material" value="{{ $rasadrug->organoleptic_properties_of_raw_material }}" readonly>
                           @error('VII Organoleptic properties of raw material')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">VIII organoleptic_properties_of_raw_material<span class="text-danger">*</span></label>
                           <input type="text" name="organoleptic_properties_of_finished_product" class="form-control" placeholder="VIII" value="{{ $rasadrug->organoleptic_properties_of_finished_product }}" readonly>
                           @error('organoleptic_properties_of_finished_product')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">IX Time taken for the experiment<span class="text-danger">*</span></label>
                           <input type="text" name="time_taken_for_the_experiment" class="form-control" placeholder="Wholesome diet" value="{{ $rasadrug->time_taken_for_the_experiment }}" readonly>
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
                           <input type="text" name="starting_date_of_experiment" class="form-control" placeholder="Wholesome activities" value="{{ $rasadrug->starting_date_of_experiment }}"  >@error('starting_date_of_experiment')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">XI Ending date of experiment<span class="text-danger">*</span></label>
                           <input type="text" name="ending_date_of_experiment" class="form-control" placeholder="XI Ending date of experiment" value="{{ $rasadrug->ending_date_of_experiment }}"  >
                           @error('ending_date_of_experiment')
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

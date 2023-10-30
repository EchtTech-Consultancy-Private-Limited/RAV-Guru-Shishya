@extends('layouts.app-file')
@section('content')


<section class="content">
      <div class="container-fluid">
      <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mb-2 col-lg-12">

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
                                 
                                 <table class="view-table">
                                    <h3>Basic Information</h3>
                                    <thead>
                                       <tr>
                                          <th> Name of the Guru</th>
                                          <th> Name of the Shishya</th>
                                          <th>Date of Report </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr> 
                                          <td> 
                                          @if(Auth::user()->guru_id || Auth::user()->user_type==1) {{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}}   @endif
                                          @if(Auth::user()->user_type==2){{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}} @endif
                                          </td>
                                          <td> @if(Auth::user()->user_type==1 || Auth::user()->user_type==2) {{$shishyarecord->firstname.' '.$shishyarecord->middlename.' '.$shishyarecord->lastname}} @else {{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}}
                                             @endif</td>
                                          <td> <?php echo date('Y-m-d'); ?></td>
                                       </tr>
                                    </tbody>
                                 </table>
                               
                                <!--  <div class="row" readonly>

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
            <form method="POST" action="{{ url('update-rasayoga-details') }}" readonly>
                @csrf
               <input type="hidden" name="drug_id" value="{{ $rasadrug->id }}">
              <div class="row">
                 <div class="col-md-12 mb-2">
                 <div class="form-group  ">
                       <h5 class="text-center d-flex justify-content-center"> 2- RASA YOGAS</h5>
                       <h5 class="d-block text-left">Name of the Drug</h5>
                       <h5 class="d-block text-left">
                          Reference
                          <p class=' text-xs pt-1'>Text, Chapter, Sloka – to – (Published by Edition, Writer/Translator)</p>
                       </h5>
                    </div>
                 </div>
                 
               </div>
              
               <div class="">
                 
                
                  <div class="page-content page-container" id="page-content">
                    <div class="padding">
                        <div class="row container d-flex justify-content-center">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                        <table id="faqs" class="view-table table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Title </th>
                                                        <th>Value </th>
                                                       

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   <tr>
                                                      <td colspan="3">
                                                         <h3> Composition</h3>
                                                      </td>
                                                   </tr>
                                                   
                                                    @foreach($drugrasapart as $drugrasaparts)
                                                    <tr>
                                                        <td>Name of the ingredients mineral metal</td>
                                                        <td>
                                                        {{ $drugrasaparts->name_of_the_ingredients_mineral_metal }}
                                                         </td>
                                                         </tr>
                                                         <tr>
                                                        <td>Part used   </td>
                                                        <td>
                                                        {{ $drugrasaparts->rasa_part_used }}
                                                        
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                        <td>Quantity</td>
                                                        <td class="">
                                                        {{ $drugrasaparts->rasa_quantity }}
                                                        </td>
                                                        </tr>
                                                    </tr>
                                                   <tr>
                                                        <td>
                                                        {{ $drugrasaparts->name_of_the_ingredients_mineral_metal }}
                                                         </td>

                                                        <td>
                                                        {{ $drugrasaparts->rasa_part_used }}
                                                        
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
                  <p class="text-capatilize text-sm">I Herbal</p>
                  <div class="row">
                     <div class="col-md-12 mb-2">
                       <div class="form-group">
                          <label  class="form-control-label">Enter Yogas Name</label>
                          <input type="text" name="rasa_yoga_type_individual" class="form-control"  value="{{ $rasadrug->rasa_yoga_type_individual }}" readonly>@error('rasa_yoga_type_individual')
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 1<span class="text-danger">*</span></label>
                           <input type="text" name="herbal_first" class="form-control" placeholder="Herbal First" value="{{ $rasadrug->herbal_first }}" readonly>@error('herbal_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label  class="form-control-label">Step 2<span class="text-danger">*</span></label>
                           <input type="text" name="herbal_second" class="form-control" placeholder="2" value="{{ $rasadrug->herbal_second }}" readonly>
                           @error('herbal_second')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <p class="text-capatilize text-sm">II Mineral</p>
                  <div class="row">
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 1<span class="text-danger">*</span></label>
                           <input type="text" name="mineral_first" class="form-control" placeholder="1"  value="{{ $rasadrug->mineral_first }}" readonly>@error('mineral_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label class="form-control-label">Step 2</label>
                           <input type="text" name="mineral_second" class="form-control" placeholder="2" value="{{ $rasadrug->mineral_second }}" readonly>
                           @error('mineral_second')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <p class="text-capatilize text-sm">III Metal</p>
                  <div class="row">
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 1<span class="text-danger">*</span></label>
                           <input type="text" name="metal_first" class="form-control" placeholder="1" aria-label="Step 1" value="{{ $rasadrug->metal_first }}" readonly>@error('metal_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 2<span class="text-danger">*</span></label>
                           <input type="text" name="metal_second" class="form-control" placeholder="2" aria-label="Step 2" value="{{ $rasadrug->metal_second }}" readonly>
                           @error('metal_second')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <p class="text-capatilize text-sm">IV Animal</p>
                  <div class="row">
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 1<span class="text-danger">*</span></label>
                           <input type="text" name="animal_first" class="form-control" placeholder="1" aria-label="Step 1" value="{{ $rasadrug->animal_first }}" readonly>@error('animal_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 2<span class="text-danger">*</span></label>
                           <input type="text" name="animal_second" class="form-control" placeholder="2" aria-label="Step 2" value="{{ $rasadrug->animal_second }}" readonly>
                           @error('animal_second')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <p class="text-capatilize text-sm">V Bhavana Dravyas</p>
                  <div class="row">
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 1<span class="text-danger">*</span></label>
                           <input type="text" name="bhavana_dravayas_first" class="form-control" placeholder="1" aria-label="Step 1" value="{{ $rasadrug->bhavana_dravayas_first }}" readonly>@error('bhavana_dravayas_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 mb-2">
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
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">VI Changes seen during bhavana therapy<span class="text-danger">*</span></label>
                           <input type="text" name="changes_seen_during_bhavana_therapy" class="form-control" placeholder="VI Changes seen during bhavana therapy" value="{{ $rasadrug->changes_seen_during_bhavana_therapy }}" readonly>@error('changes_seen_during_bhavana_therapy')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">VII Organoleptic properties of raw material<span class="text-danger">*</span></label>
                           <input type="text" name="organoleptic_properties_of_raw_material" class="form-control" placeholder="VII Organoleptic properties of raw material" value="{{ $rasadrug->organoleptic_properties_of_raw_material }}" readonly>
                           @error('VII Organoleptic properties of raw material')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">VIII organoleptic_properties_of_raw_material<span class="text-danger">*</span></label>
                           <input type="text" name="organoleptic_properties_of_finished_product" class="form-control" placeholder="VIII" value="{{ $rasadrug->organoleptic_properties_of_finished_product }}" readonly>
                           @error('organoleptic_properties_of_finished_product')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 mb-2">
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
                     <div class="col-md-6 mb-2">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">X Starting date of experiment<span class="text-danger">*</span></label>
                           <input type="text" name="starting_date_of_experiment" class="form-control" placeholder="Wholesome activities" value="{{ $rasadrug->starting_date_of_experiment }}"  >@error('starting_date_of_experiment')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6 mb-2">
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

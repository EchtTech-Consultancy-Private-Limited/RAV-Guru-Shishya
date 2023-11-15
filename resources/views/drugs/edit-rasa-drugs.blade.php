@extends('layouts.app-file')
@section('content')


<section class="content">

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
                        <a href="#" onClick="return false;" class="dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
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



                              </div>
                           </div>
                        </div>
                        <div style="display:;">
                           <div id="churna_yogas" style="display:;">
                              <?php
                              if (isset($drugHistoryLog)) {
                                 $data = json_decode($drugHistoryLog->data);
                              }
                              ?>
                              <form method="POST" action="{{ url('update-rasayoga-details') }}">
                                 @csrf
                                 <input type="hidden" name="drug_id" value="{{ $rasadrug->id }}">
                                 <div class="row">
                                    <div class="col-md-12 mb-2">

                                       <div class="form-group  ">
                                          <h5 class="text-center d-flex justify-content-center">2- RASA YOGAS</h5>
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
                                                               <th>Part used </th>
                                                               <th>Quantity</th>
                                                               <th>Action</th>

                                                            </tr>
                                                         </thead>
                                                         <tbody>
                                                            @foreach($drugrasapart as $drugrasaparts)
                                                            <tr>
                                                               <td>
                                                                  <input type="hidden" name="drug_part_id[]" value="{{ $drugrasaparts->id }}">

                                                                  <input type="text" name="name_of_the_ingredients_mineral_metal[]" class="form-control" placeholder="Name of the ingredients" value="{{ $drugrasaparts->name_of_the_ingredients_mineral_metal }}">
                                                                  @error('name_of_the_ingredients_mineral_metal')
                                                                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                                  @enderror
                                                               </td>

                                                               <td>
                                                                  <input type="text" name="part_used[]" class="form-control" placeholder="Part used" value="{{ $drugrasaparts->rasa_part_used }}">
                                                                  @error('rasa_part_used')
                                                                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                                  @enderror
                                                               </td>
                                                               <td class="text-warning mt-10">
                                                                  <input type="text" name="quantity[]" class="form-control" placeholder="quantity" value="{{ $drugrasaparts->rasa_quantity }}">
                                                                  @error('quantity')
                                                                  <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                                  @enderror
                                                               </td>
                                                               <td class="mt-10">
                                                                  <a href="{{ url('delete-rasayoga-part/'.$drugrasaparts->id) }}" class="btn btn-tbl-delete">
                                                                     <i class="material-icons">delete_forever</i>
                                                                  </a>
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
                                 <div class="title">

                                    <p class="text-capatilize text-sm">I Herbal</p>
                                 </div>
                                 <div class="row">
                                    <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                       <div class="form-group">
                                          <label class="form-control-label @if(isset($data->rasa_yoga_type_individual)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Enter Yogas Name</label>
                                          <input type="text" name="rasa_yoga_type_individual" class="form-control" value="{{ $rasadrug->rasa_yoga_type_individual }}">@error('rasa_yoga_type_individual')
                                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                          @enderror
                                       </div>
                                    </div>
                                    <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label @if(isset($data->herbal_first)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step 1<span class="text-danger">*</span></label>
                                          <input type="text" name="herbal_first" class="form-control" placeholder="Herbal First" value="{{ $rasadrug->herbal_first }}">@error('herbal_first')
                                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                          @enderror
                                       </div>
                                    </div>
                                    <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                       <div class="form-group">
                                          <label class="form-control-label @if(isset($data->herbal_second)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step 2<span class="text-danger">*</span></label>
                                          <input type="text" name="herbal_second" class="form-control" placeholder="2" value="{{ $rasadrug->herbal_second }}">
                                          @error('herbal_second')
                                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                          @enderror
                                       </div>
                                    </div>
                                 </div>
                                 <div class="title">

                                    <p class="text-capatilize text-sm">II Mineral</p>
                                 </div>
                                 <div class="row">
                                    <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label @if(isset($data->mineral_first)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step 1<span class="text-danger">*</span></label>
                                          <input type="text" name="mineral_first" class="form-control" placeholder="1" value="{{ $rasadrug->mineral_first }}">@error('mineral_first')
                                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                          @enderror
                                       </div>
                                    </div>
                                    <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                       <div class="form-group">
                                          <label class="form-control-label @if(isset($data->mineral_second)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step 2</label>
                                          <input type="text" name="mineral_second" class="form-control" placeholder="2" value="{{ $rasadrug->mineral_second }}">
                                          @error('mineral_second')
                                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                          @enderror
                                       </div>
                                    </div>
                                 </div>
                                 <div class="title">

                                    <p class="text-capatilize text-sm">III Metal</p>
                                 </div>
                                 <div class="row">
                                    <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label @if(isset($data->metal_first)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step 1<span class="text-danger">*</span></label>
                                          <input type="text" name="metal_first" class="form-control" placeholder="1" aria-label="Step 1" value="{{ $rasadrug->metal_first }}">@error('metal_first')
                                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                          @enderror
                                       </div>
                                    </div>
                                    <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label @if(isset($data->rasa_yoga_type_individual)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step 2<span class="text-danger">*</span></label>
                                          <input type="text" name="metal_second" class="form-control" placeholder="2" aria-label="Step 2" value="{{ $rasadrug->metal_second }}">
                                          @error('metal_second')
                                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                          @enderror
                                       </div>
                                    </div>
                                 </div>
                                 <div class="title">

                                    <p class="text-capatilize text-sm">IV Animal</p>
                                 </div>
                                 <div class="row">
                                    <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label @if(isset($data->animal_first)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step 1<span class="text-danger">*</span></label>
                                          <input type="text" name="animal_first" class="form-control" placeholder="1" aria-label="Step 1" value="{{ $rasadrug->animal_first }}">@error('animal_first')
                                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                          @enderror
                                       </div>
                                    </div>
                                    <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label @if(isset($data->animal_second)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step 2<span class="text-danger">*</span></label>
                                          <input type="text" name="animal_second" class="form-control" placeholder="2" aria-label="Step 2" value="{{ $rasadrug->animal_second }}">
                                          @error('animal_second')
                                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                          @enderror
                                       </div>
                                    </div>
                                 </div>
                                 <div class="title">

                                    <p class="text-capatilize text-sm">V Bhavana Dravyas</p>
                                 </div>
                                 <div class="row">
                                    <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label @if(isset($data->bhavana_dravayas_first)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step 1<span class="text-danger">*</span></label>
                                          <input type="text" name="bhavana_dravayas_first" class="form-control" placeholder="1" aria-label="Step 1" value="{{ $rasadrug->bhavana_dravayas_first }}">@error('bhavana_dravayas_first')
                                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                          @enderror
                                       </div>
                                    </div>
                                    <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label @if(isset($data->bhavana_dravayas_second)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">Step 2<span class="text-danger">*</span></label>
                                          <input type="text" name="bhavana_dravayas_second" class="form-control" placeholder="2" aria-label="Step 2" value="{{ $rasadrug->bhavana_dravayas_second }}">
                                          @error('bhavana_dravayas_second')
                                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                          @enderror
                                       </div>
                                    </div>

                                    <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label @if(isset($data->changes_seen_during_bhavana_therapy)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">VI Changes seen during bhavana therapy<span class="text-danger">*</span></label>
                                          <input type="text" name="changes_seen_during_bhavana_therapy" class="form-control" placeholder="VI Changes seen during bhavana therapy" value="{{ $rasadrug->changes_seen_during_bhavana_therapy }}">@error('changes_seen_during_bhavana_therapy')
                                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                          @enderror
                                       </div>
                                    </div>
                                    <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label @if(isset($data->organoleptic_properties_of_raw_material)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">VII Organoleptic properties of raw material<span class="text-danger">*</span></label>
                                          <input type="text" name="organoleptic_properties_of_raw_material" class="form-control" placeholder="VII Organoleptic properties of raw material" value="{{ $rasadrug->organoleptic_properties_of_raw_material }}">
                                          @error('VII Organoleptic properties of raw material')
                                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                          @enderror
                                       </div>
                                    </div>
                                    <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label @if(isset($data->organoleptic_properties_of_finished_product)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">VIII organoleptic_properties_of_raw_material<span class="text-danger">*</span></label>
                                          <input type="text" name="organoleptic_properties_of_finished_product" class="form-control" placeholder="VIII" value="{{ $rasadrug->organoleptic_properties_of_finished_product }}">
                                          @error('organoleptic_properties_of_finished_product')
                                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                          @enderror
                                       </div>
                                    </div>
                                    <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label @if(isset($data->time_taken_for_the_experiment)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">IX Time taken for the experiment<span class="text-danger">*</span></label>
                                          <input type="text" name="time_taken_for_the_experiment" class="form-control" placeholder="Wholesome diet" value="{{ $rasadrug->time_taken_for_the_experiment }}">
                                          @error('time_taken_for_the_experiment')
                                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                          @enderror
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label @if(isset($data->starting_date_of_experiment)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">X Starting date of experiment<span class="text-danger">*</span></label>
                                          <input type="text" name="starting_date_of_experiment" class="form-control" placeholder="Wholesome activities" value="{{ $rasadrug->starting_date_of_experiment }}">@error('starting_date_of_experiment')
                                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                          @enderror
                                       </div>
                                    </div>
                                    <div class="col-xxl-3 col-xl-4 col-md-6 col-6">
                                       <div class="form-group">
                                          <label for="example-text-input" class="form-control-label @if(isset($data->ending_date_of_experiment)) patient-highlight @endif" title="Updated by @if(@$drugHistoryLog->user_type == '1')Admin @elseif(@$drugHistoryLog->user_type == '2')Guru @else (@$drugHistoryLog->user_type == '3')Shishya @endif">XI Ending date of experiment<span class="text-danger">*</span></label>
                                          <input type="text" name="ending_date_of_experiment" class="form-control" placeholder="XI Ending date of experiment" value="{{ $rasadrug->ending_date_of_experiment }}">
                                          @error('ending_date_of_experiment')
                                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                          @enderror
                                       </div>
                                    </div>
                                 </div>
                                 <button type="submit" class="btn add btn-secondary">Update Rasa Yogas</button>
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

      html += '<td><input type="text" name="name_of_the_ingredients_mineral_metal[]" class="form-control" placeholder="quantity" aria-label="quantity" value=""></td>';
      html += '<td><input type="text" name="part_used[]" class="form-control" placeholder="Part used" aria-label="Part used" value=""></td>';
      html += '<td class="text-danger mt-10"> <input type="text" name="quantity[]" class="form-control" placeholder="quantity" aria-label="quantity" value=""></td>';
      html += '<td class="mt-10"><button class="btn btn-tbl-delete" onclick="$(\'#faqs-row' + faqs_row + '\').remove();"><i class="material-icons">delete_forever</i></button></td>';

      html += '</tr>';

      $('#faqs tbody').append(html);

      faqs_row++;
   }
</script>
@endsection
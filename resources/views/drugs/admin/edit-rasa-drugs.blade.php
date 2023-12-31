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
                                             value="{{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}}" readonly
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
                                             value="{{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}}" readonly
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
                                <!--  <div class="row" >
                                    
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
            <form method="POST" action="{{ url('update-rasayoga-details') }}" >
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
                                                         <input type="hidden" name="drug_part_id[]" value="{{ $drugrasaparts->id }}" >

                                                         <input type="text" name="name_of_the_ingredients_mineral_metal[]" class="form-control" placeholder="Name of the ingredients" value="{{ $drugrasaparts->name_of_the_ingredients_mineral_metal }}" >
                                                         @error('name_of_the_ingredients_mineral_metal') 
                                                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                         @enderror
                                                         </td>
                                                        
                                                        <td>
                                                         <input type="text" name="part_used[]" class="form-control" placeholder="Part used"  value="{{ $drugrasaparts->rasa_part_used }}" >
                                                         @error('rasa_part_used') 
                                                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                         @enderror    
                                                        </td>
                                                        <td class="text-warning mt-10">
                                                         <input type="text" name="quantity[]" class="form-control" placeholder="quantity" value="{{ $drugrasaparts->rasa_quantity }}" >
                                                        @error('quantity') 
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                        </td>
                                                        <td class="mt-10">
                                                         <a  href="{{ url('delete-rasayoga-part/'.$drugrasaparts->id) }}" class="btn btn-tbl-delete">
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
                  <p class="text-uppercase text-sm">I Herbal</p>
                  <div class="row">
                     <div class="col-md-12">
                       <div class="form-group">
                          <label  class="form-control-label">Enter Yogas Name</label>
                          <input type="text" name="rasa_yoga_type_individual" class="form-control"  value="{{ $rasadrug->rasa_yoga_type_individual }}" >@error('rasa_yoga_type_individual') 
                          <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                          @enderror
                       </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 1<span class="text-danger">*</span></label>
                           <input type="text" name="herbal_first" class="form-control" placeholder="Herbal First" value="{{ $rasadrug->herbal_first }}" >@error('herbal_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label  class="form-control-label">Step 2<span class="text-danger">*</span></label>
                           <input type="text" name="herbal_second" class="form-control" placeholder="2" value="{{ $rasadrug->herbal_second }}" >
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
                           <input type="text" name="mineral_first" class="form-control" placeholder="1"  value="{{ $rasadrug->mineral_first }}" >@error('mineral_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="form-control-label">Step 2</label>
                           <input type="text" name="mineral_second" class="form-control" placeholder="2" value="{{ $rasadrug->mineral_second }}" >
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
                           <input type="text" name="metal_first" class="form-control" placeholder="1" aria-label="Step 1" value="{{ $rasadrug->metal_first }}" >@error('metal_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 2<span class="text-danger">*</span></label>
                           <input type="text" name="metal_second" class="form-control" placeholder="2" aria-label="Step 2" value="{{ $rasadrug->metal_second }}" >
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
                           <input type="text" name="animal_first" class="form-control" placeholder="1" aria-label="Step 1" value="{{ $rasadrug->animal_first }}" >@error('animal_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 2<span class="text-danger">*</span></label>
                           <input type="text" name="animal_second" class="form-control" placeholder="2" aria-label="Step 2" value="{{ $rasadrug->animal_second }}" >
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
                           <input type="text" name="bhavana_dravayas_first" class="form-control" placeholder="1" aria-label="Step 1" value="{{ $rasadrug->bhavana_dravayas_first }}" >@error('bhavana_dravayas_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Step 2<span class="text-danger">*</span></label>
                           <input type="text" name="bhavana_dravayas_second" class="form-control" placeholder="2" aria-label="Step 2" value="{{ $rasadrug->bhavana_dravayas_second }}" >
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
                           <input type="text" name="changes_seen_during_bhavana_therapy" class="form-control" placeholder="VI Changes seen during bhavana therapy" value="{{ $rasadrug->changes_seen_during_bhavana_therapy }}" >@error('changes_seen_during_bhavana_therapy')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">VII Organoleptic properties of raw material<span class="text-danger">*</span></label>
                           <input type="text" name="organoleptic_properties_of_raw_material" class="form-control" placeholder="VII Organoleptic properties of raw material" value="{{ $rasadrug->organoleptic_properties_of_raw_material }}" >
                           @error('VII Organoleptic properties of raw material')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">VIII organoleptic_properties_of_raw_material<span class="text-danger">*</span></label>
                           <input type="text" name="organoleptic_properties_of_finished_product" class="form-control" placeholder="VIII" value="{{ $rasadrug->organoleptic_properties_of_finished_product }}" >
                           @error('organoleptic_properties_of_finished_product')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">IX Time taken for the experiment<span class="text-danger">*</span></label>
                           <input type="text" name="time_taken_for_the_experiment" class="form-control" placeholder="Wholesome diet" value="{{ $rasadrug->time_taken_for_the_experiment }}" >
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
               <button type="submit" class="btn add btn-secondary">Update Rasa Yogas</button>
         </form>
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

    html += '<td><input type="text" name="name_of_the_ingredients_mineral_metal[]" class="form-control" placeholder="quantity" aria-label="quantity" value=""></td>';
    html += '<td><input type="text" name="part_used[]" class="form-control" placeholder="Part used" aria-label="Part used" value=""></td>';
    html += '<td class="text-danger mt-10"> <input type="text" name="quantity[]" class="form-control" placeholder="quantity" aria-label="quantity" value=""></td>';
    html += '<td class="mt-10"><button class="btn btn-delete" onclick="$(\'#faqs-row' + faqs_row + '\').remove();"><i class="material-icons">delete_forever</i>Delete ff</button></td>';

    html += '</tr>';

$('#faqs tbody').append(html);

faqs_row++;
}
</script>
@endsection
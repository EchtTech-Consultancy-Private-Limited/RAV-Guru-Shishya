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
            <form method="POST" action="{{ url('update-vatiyoga-details') }}" >
                @csrf
               <input type="hidden" name="drug_id" value="{{ $drug->id }}">
              <div class="row">
                  <div class="h-100">
                     <h5 class="text text-center">
                        3- Vati YOGAS
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
                                                    @foreach($vatitype as $vatitypes)
                                                   <tr>
                                                        <td>
                                                         <input type="hidden" name="drug_part_id[]" value="{{ $vatitypes->id }}" >

                                                         <input type="text" name="name_of_the_ingredients[]" class="form-control" placeholder="Name of the ingredients" value="{{ $vatitypes->name_of_the_ingredients }}" >
                                                         @error('name_of_the_ingredients') 
                                                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                         @enderror
                                                         </td>
                                                        
                                                        <td>
                                                         <input type="text" name="part_used[]" class="form-control" placeholder="Part used"  value="{{ $vatitypes->part_used }}" >
                                                         @error('rasa_part_used') 
                                                         <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                         @enderror    
                                                        </td>
                                                        <td class="text-warning mt-10">
                                                         <input type="text" name="quantity[]" class="form-control" placeholder="quantity" value="{{ $vatitypes->quantity }}" >
                                                        @error('quantity') 
                                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                                        @enderror
                                                        </td>
                                                        <td class="mt-10">
                                                         <a  href="{{ url('delete-vatiyoga-type/'.$vatitypes->id) }}" class="btn btn-tbl-delete" onclick="return confirm_option('delete')">
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
                <p class="text-uppercase text-sm">Method of Preparation (SOP)</p>
                  <div class="row">
                     <div class="col-md-12">
                          <div class="form-group">
                             <label  class="form-control-label">Enter Yogas Name</label>
                             <input type="text" name="vati_yoga_type_individual" class="form-control" placeholder="Vati Yoga Type Individual"  value="{{ $drug->vati_yoga_type_individual }}" maxlength="50">@error('vati_yoga_type_individual')
                             <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                             @enderror
                          </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label  class="form-control-label">Step 1<span class="text-danger">*</span></label>
                           <input type="text" name="step_first" class="form-control" placeholder="Step 1" aria-label="Step 1" value="{{ $drug->step_first }}" maxlength="50">
                           @error('Step 1')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Packing<span class="text-danger">*</span></label>
                           <input type="text" name="packing" class="form-control" placeholder="Packing" aria-label="Packing" value="{{ $drug->packing }}" maxlength="50">
                           @error('packing')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Storage<span class="text-danger">*</span></label>
                           <input type="text" name="storage" class="form-control" placeholder="Storage" value="{{ $drug->storage }}" maxlength="50">
                           @error('storage')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Method of Administration<span class="text-danger">*</span></label>
                           <input type="text" name="method_of_administration" class="form-control" placeholder="Method of Administration"  value="{{ $drug->method_of_administration }}" maxlength="50">
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
                           <input type="text" name="dose" class="form-control" placeholder="Dose" aria-label="Dose" value="{{ $drug->dose }}" maxlength="50">
                           @error('dose')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Time of administration<span class="text-danger">*</span></label>
                           <input type="text" name="time_of_administration" class="form-control" placeholder="Time of administration" value="{{ $drug->time_of_administration }}" maxlength="50">
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
                           <input type="text" name="duration_of_therapy" class="form-control" placeholder="Duration of Therapy"  value="{{ $drug->duration_of_therapy }}" maxlength="50">
                           @error('duration_of_therapy')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Vehicle<span class="text-danger">*</span></label>
                           <input type="text" name="vehicle" class="form-control" placeholder="Vehicle" aria-label="Vehicle" value="{{ $drug->vehicle }}" maxlength="50">
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
                           <input type="text" name="indicationsduration_of_therapy" class="form-control" placeholder="Indications" aria-label="Duration of Therapy" value="{{ $drug->indicationsduration_of_therapy }}" maxlength="50">
                           @error('indicationsduration_of_therapy')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Contra indications<span class="text-danger">*</span></label>
                           <input type="text" name="contraindicationsduration_of_therapy" class="form-control" placeholder="Contra indications"  value="{{ $drug->contraindicationsduration_of_therapy }}" maxlength="50">
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
                           <input type="text" name="wholesome_diet" class="form-control" placeholder="Wholesome diet" value="{{ $drug->wholesome_diet }}" maxlength="50">
                           @error('wholesome_diet')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Whole some activities<span class="text-danger">*</span></label>
                           <input type="text" name="wholesome_activities" class="form-control" placeholder="Whole some activities"  value="{{ $drug->wholesome_activities }}" >
                           @error('wholesome_activities')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Wholesome behavior<span class="text-danger">*</span></label>
                           <input type="text" name="wholesome_behavior" class="form-control" placeholder="Wholesome behavior" aria-label="Wholesome behavior" value="{{ $drug->wholesome_behavior }}" >
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
                           <input type="text" name="quantity_of_raw_material" class="form-control" placeholder="Quantity of Raw Material"  value="{{ $drug->quantity_of_raw_material }}" >
                           @error('quantity_of_raw_material')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Quantity of finished product<span class="text-danger">*</span></label>
                           <input type="text" name="quantity_of_finished_product" class="form-control" placeholder="Quantity of finished product"  value="{{ $drug->quantity_of_finished_product }}" >
                           @error('quantity_of_finished_product')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Loss<span class="text-danger">*</span></label>
                           <input type="text" name="loss" class="form-control" placeholder="Loss" aria-label="Loss" value="{{ $drug->loss }}" >
                           @error('loss')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Reasons for Loss<span class="text-danger">*</span></label>
                           <input type="text" name="reasons_for_loss" class="form-control" placeholder="Reasons for Loss" aria-label="Name" value="{{ $drug->reasons_for_loss }}" >
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
                           <input type="text" name="reasons_for_loss_first" class="form-control" placeholder="(i)" aria-label="(i)" value="{{ $drug->reasons_for_loss_first }}" >@error('reasons_for_loss_first')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">(ii)<span class="text-danger">*</span></label>
                           <input type="text" name="reasons_for_loss_second" class="form-control" placeholder="(ii)" aria-label="Name" value="{{ $drug->reasons_for_loss_second }}" maxlength="50">
                           @error('reasons_for_loss_second')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Organoleptic properties of raw materials<span class="text-danger">*</span></label>
                           <input type="text" name="organoleptic_properties_of_raw_materials" class="form-control" placeholder="Organoleptic properties of raw materials" value="{{ $drug->organoleptic_properties_of_raw_materials }}" >
                           @error('organoleptic_properties_of_raw_materials')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="example-text-input" class="form-control-label">Organoleptic properties of finished product<span class="text-danger">*</span></label>
                           <input type="text" name="organoleptic_properties_of_finished_product" class="form-control" placeholder="Organoleptic properties of finished product" value="{{ $drug->organoleptic_properties_of_finished_product }}" maxlength="50">
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
                           <input class="form-control" id="date" name="starting_date" placeholder="MM/DD/YYYY" type="date" aria-label="(i)  Starting Date" value="{{ $drug->starting_date }}" >@error('starting_date')
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
                           <input class="form-control" id="date" name="ending_date" placeholder="MM/DD/YYYY" type="date" aria-label="(i)  Ending Date" value="{{ $drug->ending_date }}" >@error('ending_date')
                           <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                           @enderror
                        </div>
                     </div>
                  </div>
               </div>
               <button type="submit" class="btn add btn-secondary">Update Vati Yogas</button>
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

    html += '<td><input type="text" name="name_of_the_ingredients[]" class="form-control" value=""></td>';
    html += '<td><input type="text" name="part_used[]" class="form-control" placeholder="Part used" value=""></td>';
    html += '<td class="text-danger mt-10"> <input type="text" name="quantity[]" class="form-control" placeholder="quantity" ></td>';
    html += '<td class="mt-10"><button class="btn btn-delete" onclick="$(\'#faqs-row' + faqs_row + '\').remove();"><i class="material-icons">delete_forever</i>Delete</button></td>';

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
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
                                <a href="#" onClick="return false;" class="dropdown-toggle" data-bs-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">
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
                    <div class="body p-0">
                        <div id="wizard_horizontal">
                            <section>
                                <div class="col-md-12 mb-2">
                                    <div class="card">
                                        <!-- <form role="form" method="POST" action='' enctype="multipart/form-data"> -->
                                        <!-- @csrf -->
                                        <div class="card-body py-0">
                                            <div class="row">
                                                <div class="col-md-6 col-6">
                                                    <h3>Basic Information</h3>
                                                </div>
                                                <div class="col-md-6 col-6">
                                                    <a href="{{url('drug-report-history')}}"><button type="button"
                                                            class="btn back btn-danger waves-effect float-right"> &nbsp;
                                                            Back
                                                            &nbsp;</button></a>
                                                </div>
                                            </div>

                                            <table class="view-table">

                                                <thead>
                                                    <tr>
                                                        <th> Name of the Guru</th>
                                                        <th>Name of the Shishya </th>
                                                        <th> Date of Report</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td> @if(Auth::user()->guru_id || Auth::user()->user_type==1)
                                                            {{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}}
                                                            @endif
                                                            @if(Auth::user()->user_type==2)
                                                            {{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if(Auth::user()->user_type==1 ||
                                                            Auth::user()->user_type==2)
                                                            {{$shishyarecord->firstname.' '.$shishyarecord->middlename.' '.$shishyarecord->lastname}}
                                                            @else
                                                            {{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}}
                                                            @endif
                                                        </td>
                                                        <td> <?php echo date('d-m-Y'); ?></td>

                                                    </tr>
                                                </tbody>
                                            </table>



                                            <!--  <div class="row "readonly >

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
                <form method="POST" action="{{ url('update-drug-details') }} " readonly>
                    @csrf
                    <input type="hidden" name="drug_id" value="{{ $churandrug->id }}">



                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row  d-flex justify-content-center">
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group  ">
                                                        <h5 class="text-center d-flex justify-content-center">1 – CHURNA
                                                            YOGAS</h5>
                                                        <h5 class="d-block text-left">Name of the Drug</h5>
                                                        <h5 class="d-block text-left">
                                                            Reference
                                                            <p class=' text-xs pt-1'>Text, Chapter, Sloka – to –
                                                                (Published by Edition, Writer/Translator)</p>
                                                        </h5>
                                                    </div>
                                                </div>



                                            </div>
                                            <div class="">

                                            <h3>Composition</h3>
                                                <table id="faqs" class=" table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th> Name of the ingredients </th>
                                                            <th> Part used</th>
                                                            <th> Quantity</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                    <tbody>
                                                        @foreach($churandrugpart as $churandrugpartdata)
                                                        <tr>

                                                            <td class="fw-normal"> {{$churandrugpartdata->name_of_the_ingredients}}</td>
                                                            <td> {{$churandrugpartdata->part_used}}</td>
                                                            <td> {{$churandrugpartdata->quantity}}</td>
                                                        </tr>




                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <table id="faqs" class="view-table table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="w-25">Title</th>
                                                            <th>Value </th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        <!-- ******** -->
                                                        <tr>
                                                            <td colspan="2">
                                                                <h3>Method of Preparation (SOP)</h3>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Enter Yogas Name </td>
                                                            <td>{{ $churandrug->churna_yoga_type_individual }} </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Step 1 </td>
                                                            <td>{{ $churandrug->step_first }} </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Step 2 </td>
                                                            <td> {{ $churandrug->step_second }} </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Step 3 </td>
                                                            <td> {{ $churandrug->step_three }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td>Step 4, etc. </td>
                                                            <td> {{ $churandrug->step_four }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Packing </td>
                                                            <td> {{ $churandrug->packing }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Storage </td>
                                                            <td>{{ $churandrug->storage }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Method of Administration </td>
                                                            <td> {{ $churandrug->method_of_administration }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Time of administration </td>
                                                            <td>{{ $churandrug->time_of_administration }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Dose </td>
                                                            <td> {{ $churandrug->dose }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td> Vehicle</td>
                                                            <td>{{ $churandrug->vehicle }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Duration of Therapy </td>
                                                            <td> {{ $churandrug->duration_of_therapy }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Wholesome diet </td>
                                                            <td>{{ $churandrug->wholesome_diet }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td> Wholesome activities</td>
                                                            <td> {{ $churandrug->wholesome_activities }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td> Wholesome behavior</td>
                                                            <td> {{ $churandrug->wholesome_behavior }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Indications </td>
                                                            <td> {{ $churandrug->indications }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Contra indications </td>
                                                            <td> {{ $churandrug->contra_indications }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <h3> Observations</h3>
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <td>Quantity of Raw Material</td>
                                                            <td> {{ $churandrug->quantity_of_raw_material }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Quantity of finished product </td>
                                                            <td>{{ $churandrug->quantity_of_finished_product }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td> Loss</td>
                                                            <td>{{ $churandrug->loss }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Reasons for Loss </td>
                                                            <td>{{ $churandrug->reasons_for_loss }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Step 1 </td>
                                                            <td> {{ $churandrug->reasons_for_loss_first }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Step 2 </td>
                                                            <td>{{ $churandrug->reasons_for_loss_second }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Organoleptic properties of raw materials </td>
                                                            <td>{{ $churandrug->organoleptic_properties_of_raw_materials }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Organoleptic properties of finished product </td>
                                                            <td>{{ $churandrug->organoleptic_properties_of_finished_product }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <h3>Duration required for the experiment</h3>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td> (i) Starting Date</td>
                                                            <td>{{ $churandrug->starting_date }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>(ii) Ending Date </td>
                                                            <td> {{ $churandrug->ending_date }} </td>
                                                        </tr>

                                                    </tbody>


                                                    <!-- <tbody>
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
                                                </tbody> -->



                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
</section>


@endsection
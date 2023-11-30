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

                    <div class="body p-0">
                        <div id="wizard_horizontal">
                            <section>
                                <div class="col-md-12 mb-2">
                                    <div class="card m-0">
                                        <!-- <form role="form" method="POST" action='' enctype="multipart/form-data"> -->
                                        <!-- @csrf -->
                                        <div class="card-body pt-0">
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
                                            <table class="">

                                                <thead>
                                                    <tr>
                                                        <th>Name of the Guru</th>
                                                        <th>Name of the Shishya</th>
                                                        <th>Date of Report </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>
                                                            @if(Auth::user()->guru_id || Auth::user()->user_type==1)
                                                            {{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}}
                                                            @endif
                                                            @if(Auth::user()->user_type==2)
                                                            {{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}}
                                                            @endif
                                                        </td>
                                                        <td> @if(Auth::user()->user_type==1 ||
                                                            Auth::user()->user_type==2)
                                                            {{$shishyarecord->firstname.' '.$shishyarecord->middlename.' '.$shishyarecord->lastname}}
                                                            @else
                                                            {{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}}
                                                            @endif</td>
                                                        <td> <?php echo date('d-m-Y'); ?></td>
                                                    </tr>


                                                </tbody>
                                            </table>




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
                <form method="POST" action="{{ url('update-arishtayogas-details') }}">
                    @csrf
                    <input readonly type="hidden" name="drug_id" value="{{ $drug->id }}">






                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row  d-flex justify-content-center">
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group  ">
                                                        <h5 class="text-center d-flex justify-content-center">3- ARISHTA
                                                            – GHRITA YOGAS</h5>
                                                        <h5 class="d-block text-left">Name of the Drug</h5>
                                                        <h5 class="d-block text-left">
                                                            Reference
                                                            <p class=' text-xs pt-1'>Text, Chapter, Sloka – to –
                                                                (Published by Edition, Writer/Translator)</p>
                                                        </h5>
                                                    </div>
                                                </div>


                                            </div>

                                            <table class="">
                                                <h3>Composition</h3>
                                                <thead>
                                                    <tr>
                                                        <th> Name of the ingredients mineral metal</th>
                                                        <th>Part used </th>
                                                        <th> Quantity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($arishtatype as $arishtatypes)
                                                    <tr>

                                                        <td>{{$arishtatypes->name_of_the_ingredients }} </td>
                                                        <td>{{$arishtatypes->part_used }} </td>
                                                        <td>{{$arishtatypes->quantity }} </td>
                                                    </tr>


                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <h3> Main ingredients</h3>

                                            <table class="view-table">

                                                <thead>
                                                    <tr>
                                                        <th class="w-25"> Title </th>
                                                        <th> Value </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="" colspan="2">
                                                            <h3>I Main ingredients</h3>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td> Enter Yogas Name</td>
                                                        <td> {{ $drug->arishtayoga_type_individual }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Step I </td>
                                                        <td>{{ $drug->main_ingredients_step_one }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Step II</td>
                                                        <td> {{ $drug->main_ingredients_step_two }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td> Step III</td>
                                                        <td> {{ $drug->main_ingredients_step_three }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2">
                                                            <h3>II Sandhana dravyas</h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Step I </td>
                                                        <td> {{ $drug->prakshepa_dravyas_step_one }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td> Step II</td>
                                                        <td> {{ $drug->prakshepa_dravyas_step_two }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td> Step III</td>
                                                        <td> {{ $drug->prakshepa_dravyas_step_three }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2">
                                                            <h3> III Prakshepa dravyas</h3>
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td> Step I</td>
                                                        <td> {{ $drug->method_of_preparation }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td> Step II</td>
                                                        <td> {{ $drug->packing }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td> Step III</td>
                                                        <td>{{ $drug->storage }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <h3>Method of Preparation (SOP)</h3>
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td> Step 1</td>
                                                        <td> {{ $drug->method_of_administration }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Packing </td>
                                                        <td> {{ $drug->packing }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Storage</td>
                                                        <td>{{ $drug->storage }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Method of Administration</td>
                                                        <td>{{ $drug->method_of_administration }} </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Time of administration </td>
                                                        <td>{{ $drug->time_of_administration }} </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Dose </td>
                                                        <td> {{ $drug->dose }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td> Vehicle</td>
                                                        <td> {{ $drug->vehicle }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td> Duration of Therapy</td>
                                                        <td> {{ $drug->duration_of_therapy }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td> Wholesome diet</td>
                                                        <td>{{ $drug->wholesome_diet }} </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Wholesome activities </td>
                                                        <td>{{ $drug->wholesome_activities }} </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Wholesome behavior </td>
                                                        <td>{{ $drug->wholesome_behaviour }} </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Indications </td>
                                                        <td> {{ $drug->indications }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td> Contra indications</td>
                                                        <td>{{ $drug->contra_indications }} </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2">
                                                            <h3> Observations</h3>
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td> Quantity of Raw Material</td>
                                                        <td> {{ $drug->quantity_of_raw_material }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td> Quantity of finished product</td>
                                                        <td> {{ $drug->quantity_of_finished_product }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Loss </td>
                                                        <td>{{ $drug->loss }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Reasons for Loss</td>
                                                        <td>{{ $drug->reasons_for_loss }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Organoleptic properties of raw materials </td>
                                                        <td>{{ $drug->organoleptic_properties_of_raw_materials }} </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Organoleptic properties of finished product </td>
                                                        <td>{{ $drug->organoleptic_properties_of_finished_product }}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Time taken for the sandhana process</td>
                                                        <td> {{ $drug->time_taken_sandhana }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td> Duration required for the entire experiment</td>
                                                        <td>{{ $drug->duration_for_entire_experiment }} </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Tests performed during experiment</td>
                                                        <td> {{ $drug->tests_performed_during_experiment }}</td>
                                                    </tr>


                                                    <tr>
                                                        <td colspan="2">
                                                            <h3> Time taken for the practical</h3>
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>(i) Starting Date </td>
                                                        <td>{{ $drug->starting_date }} </td>
                                                    </tr>

                                                    <tr>
                                                        <td> (ii) Ending Date</td>
                                                        <td>{{ $drug->ending_date }} </td>
                                                    </tr>



                                                </tbody>
                                            </table>

                                        </div>
                                        <!-- <a href="{{ url('drug-report-history') }}"> <button type="button" class="btn back btn-primary btn-sm ms-auto nextBtn">Back</button></a> -->
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
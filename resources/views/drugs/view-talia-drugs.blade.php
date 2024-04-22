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
                                    <div class="card mb-0">
                                        <!-- <form role="form" method="POST" action='' enctype="multipart/form-data"> -->
                                        <!-- @csrf -->
                                        <div class="card-body py-0">
                                            <div class="row">
                                                <div class="col-md-6 col-6">
                                                    <h3>Basic Information</h3>
                                                </div>
                                                @if(Auth::user()->user_type==2 || Auth::user()->user_type==1 || Auth::user()->user_type==4)
                                                <div class="col-md-6 col-6">
                                                    <a href="{{url('admin-drug-report-history')}}"><button type="button" class="btn back btn-danger waves-effect float-right"> &nbsp; Back &nbsp;</button></a>
                                                </div>
                                                @else
                                                <div class="col-md-6 col-6">
                                                    <a href="{{url('drug-report-history')}}"><button type="button" class="btn back btn-danger waves-effect float-right"> &nbsp; Back &nbsp;</button></a>
                                                </div>
                                                @endif
                                            </div>
                                            <table class="">

                                                <thead>
                                                    <tr>
                                                        <th>Name of the Guru </th>
                                                        <th>Name of the Shishya </th>
                                                        <th> Date of Report</th>
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
                <form method="POST" action="{{ url('update-taliayoga-details') }}">
                    @csrf
                    <input readonly type="hidden" name="drug_id" value="{{ $drug->id }}">

                    <div class="">



                        <div class="page-content page-container" id="page-content">
                            <div class="padding">
                                <div class="row  d-flex justify-content-center">
                                    <div class="col-lg-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 mb-2">
                                                        <div class="form-group  ">
                                                            <h5 class="text-center d-flex justify-content-center">
                                                                TAILA – GHRITA YOGAS</h5>
                                                            <h5 class="d-block text-left">Name of the Drug</h5>
                                                            <h5 class="d-block text-left">
                                                                Reference
                                                                <p class=' text-xs pt-1'>Text, Chapter, Sloka – to –
                                                                    (Published by Edition,
                                                                    Writer/Translator)</p>
                                                            </h5>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- **************** -->
                                                <h3>Composition</h3>
                                                <table  class=" table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th> Name of the ingredients </th>
                                                        <th> Part used</th>
                                                        <th> Quantity</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                <tbody>
                                                    @foreach($taliatype as $taliatypes)
                                                        <tr>
                                                            <td> {{ $taliatypes->name_of_the_ingredients }}</td>
                                                            <td> {{ $taliatypes->part_used }}</td>
                                                            <td>{{ $taliatypes->quantity }} </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- ******************* -->
                                                <table class="view-table">

                                                    <thead>
                                                        <tr>
                                                            <th class="w-25">Title </th>
                                                            <th> Value </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="2">
                                                                <h3> I Kalka dravyas</h3>
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td> Yogas Name</td>
                                                            <td> {{ $drug->talia_yoga_type_individual }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td>Step 1 </td>
                                                            <td>{{ $drug->kalka_dravyas_step_first }} </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Step 2 </td>
                                                            <td>{{ $drug->kalka_dravyas_step_second }} </td>
                                                        </tr>

                                                        <tr>
                                                            <td> Step 3</td>
                                                            <td> {{ $drug->kalka_dravyas_step_three }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="2">
                                                                <h3> II Taila/ghrita dravys</h3>
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td>Step 1 </td>
                                                            <td> {{ $drug->taila_dravys_step_first }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td> Step 2</td>
                                                            <td> {{ $drug->taila_dravys_step_second }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="2">
                                                                <h3>III Kvatha/drava dravyas</h3>
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td>Step 1 </td>
                                                            <td> {{ $drug->kvatha_dravyas_step_first }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td>Step 2</td>
                                                            <td>{{ $drug->kvatha_dravyas_step_second }} </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Step 3 </td>
                                                            <td> {{ $drug->kvatha_dravyas_step_three }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="2">
                                                                <h3>Method of Preparation (SOP)</h3>
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td>Taila/ghrita murchana </td>
                                                            <td> {{ $drug->kvatha_dravyas_step_murchana }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td>Preparation of Kalka </td>
                                                            <td>{{ $drug->preparation_of_kalka }} </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Preparation of kvatha/drava dravyas </td>
                                                            <td> {{ $drug->preparation_of_kavatha_dravyas }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td>Order of mixing</td>
                                                            <td>{{ $drug->order_of_mixing }} </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Paka procedure</td>
                                                            <td>{{ $drug->paka_procedure }} </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Packing </td>
                                                            <td>{{ $drug->packing }} </td>
                                                        </tr>

                                                        <tr>
                                                            <td> Storage</td>
                                                            <td> {{ $drug->storage }}</td>
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
                                                            <td>Signs of mridu – madhyama – khara paka </td>
                                                            <td> {{ $drug->mridu }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td> Organoleptic properties of raw materials</td>
                                                            <td> {{ $drug->organoleptic_properties_of_raw_materials }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Organoleptic properties of finished product </td>
                                                            <td>{{ $drug->organoleptic_properties_of_finished_product }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <h3> Time taken for the experiment</h3>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>Starting Date </td>
                                                            @if(@$drug->starting_date)
                                                            <td> {{date('d-m-Y',strtotime(@$drug->starting_date))}}  </td>
                                                            @endif
                                                        </tr>
    
                                                        <tr>
                                                            <td>Ending Date</td>
                                                            @if(@$drug->ending_date)
                                                            <td> {{date('d-m-Y',strtotime(@$drug->ending_date))}}  </td>
                                                            @endif
                                                        </tr>

                                                    </tbody>
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
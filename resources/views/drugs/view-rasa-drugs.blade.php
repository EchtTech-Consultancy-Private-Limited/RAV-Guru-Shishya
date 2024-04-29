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

                    <div class="body">
                        <div id="wizard_horizontal">
                            <section>
                                <div class="col-md-12 mb-2">
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
                                                <th> Name of the Guru</th>
                                                <th> Name of the Shishya</th>
                                                <th>Date of Report </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    @if(Auth::user()->guru_id || Auth::user()->user_type==1)
                                                    {{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}}
                                                    @endif
                                                    @if(Auth::user()->user_type==2){{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}}
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

                    <div class="">


                        <div class="page-content page-container" id="page-content">
                            <div class="card-body card">
                                <div class="padding">
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <div class="form-group  ">
                                                <h5 class="text-center d-flex justify-content-center"> RASA YOGAS
                                                </h5>
                                                <h5 class="d-block text-left">Name of the Drug</h5>
                                                <h5 class="d-block text-left">
                                                    Reference
                                                    <p class=' text-xs pt-1'>Text, Chapter, Sloka – to – (Published by
                                                        Edition,
                                                        Writer/Translator)</p>
                                                </h5>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row  d-flex justify-content-center">


                                        <div class="col-lg-12 grid-margin stretch-card">
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
                                                    @foreach($drugrasapart as $drugrasaparts)
                                                    <tr>

                                                        <td>
                                                            {{ $drugrasaparts->name_of_the_ingredients_mineral_metal }}
                                                        </td>

                                                        <td>
                                                            {{ $drugrasaparts->rasa_part_used }}

                                                        </td>

                                                        <td class="">
                                                            {{ $drugrasaparts->rasa_quantity }}
                                                        </td>
                                                    </tr>
                                                    </tr>

                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <table id="faqs" class="view-table table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="w-25">Title </th>
                                                        <th>Value </th>


                                                    </tr>
                                                </thead>
                                                <tbody>



                                                    <tr>
                                                        <td colspan="2">
                                                            <h3>I Herbal</h3>
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>Rasa Yogas Name </td>
                                                        <td>{{ $rasadrug->rasa_yoga_type_individual }} </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Step 1 </td>
                                                        <td>{{ $rasadrug->herbal_first }} </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Step 2</td>
                                                        <td> {{ $rasadrug->herbal_second }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2">
                                                            <h3>II Mineral</h3>
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>Step 1 </td>
                                                        <td>{{ $rasadrug->mineral_first }} </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Step 2 </td>
                                                        <td> {{ $rasadrug->mineral_second }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2">
                                                            <h3> III Metal</h3>
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td> Step 1</td>
                                                        <td>{{ $rasadrug->metal_first }} </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Step 2</td>
                                                        <td> {{ $rasadrug->metal_second }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2">
                                                            <h3>IV Animal</h3>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td> Step 1</td>
                                                        <td>{{ $rasadrug->animal_first }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td> Step 2</td>
                                                        <td> {{ $rasadrug->animal_second }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2">
                                                            <h3> V Bhavana Dravyas</h3>
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>Step 1 </td>
                                                        <td>{{ $rasadrug->bhavana_dravayas_first }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Step 2</td>
                                                        <td> {{ $rasadrug->bhavana_dravayas_second }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Changes seen during bhavana therapy</td>
                                                        <td> {{ $rasadrug->changes_seen_during_bhavana_therapy }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Organoleptic properties of raw material</td>
                                                        <td> {{ $rasadrug->organoleptic_properties_of_raw_material }}
                                                        </td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <td>organoleptic_properties_of_raw_material </td>
                                                        <td> {{ $rasadrug->organoleptic_properties_of_finished_product }}
                                                        </td>
                                                    </tr> -->
                                                    <tr>
                                                        <td>Time taken for the experiment </td>
                                                        <td> {{ $rasadrug->time_taken_for_the_experiment }}</td>
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
                </form>
            </div>
        </div>
</section>

@endsection
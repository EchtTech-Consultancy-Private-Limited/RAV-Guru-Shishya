@extends('layouts.app-file')
@section('content')
<section class="content view-follow-up-sheet">
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
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h6 class="page-title"> View Follow Up </h6>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{url('/dashboard')}}">
                                <i class="fas fa-home"></i> Home </a>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{url('/follow-up-patients')}}">
                                <i class="breadcrumb-item bcrumb-1"></i> Follow up Patient</a>
                        </li>
                        <li class="breadcrumb-item active"> View Follow Up </li>
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
            <div class="col-lg-12 col-sm-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>View</strong> Follow Up </h2>
                        <!-- <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle" data-bs-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu float-start">
                                    <li>
                                        <a href="#" onClick="window.print();">Print</a>
                                    </li>

                                </ul>
                            </li>
                        </ul> -->
                    </div>
                    <div class="body">
                        <div id="wizard_horizontal">
                            <section>

                                <div class="col-sm-12 pb-0">
                                    <div class="card mb-0">

                                        <div class="card-body pb-0">



                                            <div class="row clearfix">
                                                <div class="col-xxl-2 col-xl-3  col-md-4 col-6">
                                                    <div class="form-group focused">
                                                        <div class="form-line">
                                                            <label class="form-control-label">Patient Registration No.</label>
                                                          
                                                            <p>{{$patient->registration_no}}</p>
                                                           

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-3  col-md-4 col-6">
                                                    <div class="form-group focused">
                                                        <div class="form-line">
                                                            <label class="form-control-label">Patient Name</label>
                                                            <br>
                                                            <label for="follow_up_date"
                                                                class="form-control-label">{{$patient->patient_name}}</label>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-2 col-xl-3  col-md-4 col-6">
                                                    <div class="form-group focused">
                                                        <div class="form-line">
                                                            <label class="form-control-label">Date of Follow up</label>
                                                            <br>
                                                            <label for="follow_up_date"
                                                                class="form-control-label">@if(!empty($data->follow_up_date)){{date('d-m-Y',strtotime($data->follow_up_date))}}@endif</label>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-3  col-md-4 col-6">
                                                    <div class="form-group focused">
                                                        <div class="form-line">
                                                            <label class="form-control-label">Progress Duration</label>
                                                            <br>
                                                            <label for="follow_up_date"
                                                                class="form-control-label">@if(!empty($data->report_type)){{$data->report_type}}@endif</label>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-3  col-md-4 col-6">
                                                    <div class="form-group focused">
                                                        <div class="form-line">
                                                            <label class="form-control-label">Progress</label>
                                                            <br>
                                                            <label for="follow_up_date"
                                                                class="form-control-label">@if(!empty($data->progress)){{$data->progress}}@endif</label>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-xl-3  col-md-4 col-6">
                                                    <div class="form-group focused">
                                                        <div class="form-line">
                                                            <label
                                                                class="form-control-label">Treatment/Therapies</label>
                                                            <br>
                                                            <label for="follow_up_date"
                                                                class="form-control-label">@if(!empty($data->treatment)){{$data->treatment}}@endif</label>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>





                                        </div>
                                    </div>


                                </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="header pt-0">
                                <h2><strong>Add</strong> Remark </h2>
                            </div>
                            <div class="card mb-0 view-follow-up-sheet">
                                <form role="form" method="POST" action="{{ url('/save-follow-up-remark') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if(!empty($data->id))
                                    <input type="hidden" name="followup_id" value="{{ $data->id }}">
                                    @endif
                                    @if(!empty($guru->id))
                                    <input type="hidden" name="guru_id" value="{{ $guru->id }}">
                                    @endif
                                    <input type="hidden" name="patient_id" value="{{$patient->id }}">
                                    <input type="hidden" name="shishya_id" value="{{$shishya->id }}">
                                    <input type="hidden" name="registration_no" value="{{$patient->registration_no }}">

                                    <div class="card-body">

                                        <div class="row clearfix">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <label for="remark" class="form-control-label">Remark<span
                                                                class="text-danger"></span></label>
                                                        <textarea cols="45" rows="2" name="remark" class="form-control"
                                                            value="" aria-label="remark"
                                                            placeholder="Please enter remark" maxlength="200"
                                                            required>{{ old('remark') }}</textarea>
                                                        @error('remark')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            @if(Auth::user()->user_type==1 || Auth::user()->user_type==3)
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="hidden" name="send_to" id="send_to" value="2">
                                                </div>
                                            </div>

                                            @else
                                             
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label for="remark" class="form-control-label">Send To<span
                                                                    class="text-danger"></span></label>
                                                            <select name="send_to" id="send_to" class="form-control"
                                                                required>
                                                                <option value="3" @if(old('send_to') &&
                                                                    old('send_to')=='3' ) SELECTED @endif>Shishya
                                                                </option>
                                                                <option value="1" @if(old('send_to') &&
                                                                    old('send_to')=='1' ) SELECTED @endif>Admin</option>
                                                            </select>

                                                            @error('send_to')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(Auth::user()->user_type==1)
                                                <div class="row clearfix">
                                                    <div class="col-lg-3 col-xxl-2 col-xl-3  col-md-4 col-6">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <label for="remark" class="form-control-label">Remark
                                                                    Type<span class="text-danger"></span></label>
                                                                <select name="remark_type" id="remark_type"
                                                                    class="form-control" required>
                                                                    <option value="1" @if(old('remark_type') &&
                                                                        old('remark_type')=='1' ) SELECTED @endif>To
                                                                        change report</option>
                                                                    <option value="2" @if(old('remark_type') &&
                                                                        old('remark_type')=='2' ) SELECTED @endif>For
                                                                        reference only</option>
                                                                </select>

                                                                @error('remark_type')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif

                                                    <div class="row clearfix">
                                                        <div class="col-sm-12 p-t-20 text-left">
                                                        <a href="{{ url('/follow-up-patients') }}">
                                                                <button
                                                                    type="button" class="btn back btn-danger waves-effect">
                                                                    &nbsp; Back &nbsp;</button></a>
                                                            <button type="submit"
                                                                class="btn send  waves-effect m-r-15"
                                                                @if((Auth::user()->user_type==3 &&
                                                                $data->send_to_shishya=='0') ||
                                                                (Auth::user()->user_type==2 &&
                                                                $data->send_to_guru=='0')) disabled @else
                                                                onclick="javascript: confirm_option()" @endif >
                                                                @if((Auth::user()->user_type==3) ||
                                                                (Auth::user()->user_type==1))Send to Guru
                                                                @elseif(Auth::user()->user_type==2)Send @endif</button>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                </form>
                            </div>
                        </div>




                        <div class="card-body">

                            <div calss="row">
                                <div class="col-sm-12 remarks">
                                    <span>Remarks </span>
                                    <i class="fa fa-plus fa-x" style="float:right;clear:none;"></i>
                                </div>
                            </div>
                            <div class="card-body3" style="display:none;">

                                <div class="row clearfix">
                                    <div class="col-sm-12">


                                        <div class="card mb-0">

                                            <div class="body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover js-basic-example" id="data_table">
                                                        <thead>
                                                            <tr>
                                                                <th class="center">S.No<i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                                                <th class="center"> Date <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                                                <th class="center"> Send By <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                                                <th class="center"> Send To <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                                                <th class="center"> Remarks <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($remarks as $k=>$remark)
                                                            <tr class="odd gradeX">
                                                                <td class="center">{{($k+1)}}</td>
                                                                <td class="center">
                                                                    {{date('d-m-Y',strtotime($remark->created_at))}}
                                                                </td>
                                                                <td class="center">@if($remark->send_by=='2')Guru
                                                                    @elseif($remark->send_by=='3')Shishya
                                                                    @elseif($remark->send_by=='1')Admin @endif</td>
                                                                <td class="center">@if($remark->send_to=='2')Guru
                                                                    @elseif($remark->send_to=='3')Shishya
                                                                    @elseif($remark->send_to=='1')Admin @endif</td>
                                                                <td class="center">{{$remark->remarks}}</td>

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
                            <br>




                            <div>
                            <div calss="row">
                                <div class="col-sm-12 follow_up">
                                    <span>Patient History Sheet </span>
                                    <i class="fa fa-plus fa-x" style="float:right;clear:none;"></i>
                                </div>
                            </div>
                            <div class="card-body2" style="display:none;">
                            <h3>Guru Information</h3>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name of the
                                                Guru</th>
                                        <th>Place of the
                                                Guru</th>
                                        <th>Name of the
                                                Shishya</th>
                                        <th>
                                        Date of
                                                Repor
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>  @if(!empty($guru->id))
                                           {{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}}
                                            @endif
                                        </td>
                                            <td>
                                            @if(!empty($guru->id))
                                            <label for="example-text-input"
                                                class="form-control-label"><b>{{$guru->city_name}}</b></label>
                                            @endif
                                            </td>
                                            <td>
                                            {{$shishya->firstname.' '.$shishya->lastname}}
                                            </td>
                                            <td>
                                            <?php echo date('d-m-Y'); ?>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>

                            <h3>Patient Information</h3>

                            <table class="view-table" >
                               
                                <!-- <thead>
                                <tr>
                                    <td colspan="2" class="tabel-heading"> <h3>Patient Information</h3></td>
                                </tr> -->
                                    <tr>
                                     <th class= "w-25">Title</th>
                                     <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                          <td class= "title"> Name of the
                                                Patient</td>
                                          <td> {{$patient->patient_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class= "title"> Patient Registration
                                                No</td>
                                            <td> {{$patient->registration_no}}</td>
                                        </tr>
                                        <tr>
                                            <td class= "title"> Age</td>
                                            <td>{{$patient->age}} </td>
                                        </tr>
                                        <tr>
                                            <td class= "title">Registration </td>
                                            <td>{{date('d-m-Y',strtotime($patient->registration_date))}} </td>
                                        </tr>
                                        <tr>
                                            <td class= "title">Gender </td>
                                            <td>  @foreach(__('phr.gender') as $key=>$value)
                                                    {{$patient->gender == $key  ? $value : ''}}</option>
                                                    @endforeach</td>
                                        </tr>
                                        <tr>
                                            <td class= "title"> Age Group</td>
                                            <td>  @foreach(__('phr.age_group') as $key=>$value)
                                                    {{$patient->age_group == $key  ? $value : ''}}
                                                    @endforeach </td>
                                        </tr>
                                        <tr>
                                            <td class= "title"> Occupation</td>
                                            <td>  @foreach(__('phr.occupation') as $key=>$value)
                                                    {{$patient->occupation == $key  ? $value : ''}}</option>
                                                    @endforeach</td>
                                        </tr>
                                        <tr>
                                            <td class= "title">Marital
                                                Status </td>
                                            <td>     @foreach(__('phr.marital_status') as $key=>$value)
                                                    {{$patient->marital_status == $key  ? $value : ''}}</option>
                                                    @endforeach </td>
                                        </tr>
                                        <tr>
                                            <td class= "title">Aasan
                                                Sidhi </td>
                                            <td> {{$patient->aasan_sidhi}}</td>
                                        </tr>
                                        <tr>
                                            <td class= "title">Season </td>
                                            <td> {{$patient->season}}</td>
                                        </tr>
                                        <tr>
                                            <td class= "title">Region of patient </td>
                                            <td>   @foreach(__('phr.region_of_patient') as $key=>$value)
                                                    {{$patient->region_of_patient == $key  ? $value : ''}}</option>
                                                    @endforeach</td>
                                        </tr>
                                        <tr>
                                            <td>Address </td>
                                            <td> {{$patient->address}}</td>
                                        </tr>
                                        <tr>
                                            <td>Main
                                                Complaint(As said by patient) </td>
                                            <td>{{$patient->main_complaintsaid_by_patient}} </td>
                                        </tr>
                                        <tr>
                                            <td>Duration </td>
                                            <td> {{$patient->said_by_patient_duration}}</td>
                                        </tr>
                                        <tr>
                                            <td> Main
                                                Complaint(As said by family member)</td>
                                            <td>{{$patient->main_complaint_as_said_by_family}} </td>
                                        </tr>
                                        <tr>
                                            <td>Duration </td>
                                            <td>{{$patient->complaint_as_said_by_family_duration}} </td>
                                        </tr>
                                        <tr>
                                            <td>Past
                                                illness </td>
                                            <td> {{$patient->past_illness}}</td>
                                        </tr>
                                        <tr>
                                            <td>   Family
                                                History </td>
                                            <td>{{$patient->family_history}} </td>
                                        </tr>
                                        <tr>
                                            <td colspan= "2"> Examination
                                                of
                                                the
                                                patient </td>
                                           
                                        </tr>
                                        <tr>
                                            <td>Skin </td>
                                            <td>  @foreach(__('phr.skin') as $key=>$value)
                                                    {{$patient->skin == $key  ? $value : ''}}
                                                    @endforeach </td>
                                        </tr>
                                        <tr>
                                            <td> Anguli
                                                sandhi </td>
                                            <td>    @foreach(__('phr.anguli_sandhi') as $key=>$value)
                                                    {{$patient->anguli_sandhi == $key  ? $value : ''}}
                                                    @endforeach</td>
                                        </tr>
                                        <tr>
                                            <td> Jihwa</td>
                                            <td> @foreach(__('phr.jihwa') as $key=>$value)
                                                    {{$patient->jihwa == $key  ? $value : ''}}
                                                    @endforeach </td>
                                        </tr>
                                        <tr>
                                            <td> Agni</td>
                                            <td>   @foreach(__('phr.agni') as $key=>$value)
                                                    {{$patient->agni == $key  ? $value : ''}}
                                                    @endforeach </td>
                                        </tr>
                                        <tr>
                                            <td> Shukrakshana
                                                pravritti</td>
                                            <td>   @foreach(__('phr.shukrakshana_pravritti') as $key=>$value)
                                                    {{$patient->shukrakshana_pravritti == $key  ? $value : ''}}
                                                    @endforeach </td>
                                        </tr>
                                        <tr>
                                            <td> Raktachapa</td>
                                            <td> @foreach(__('phr.raktachapa') as $key=>$value)
                                                    {{$patient->raktachapa == $key  ? $value : ''}}
                                                    @endforeach </td>
                                        </tr>
                                        <tr>
                                            <td>  Examination
                                                by
                                                Physician </td>
                                            <td> @foreach(__('phr.examination_by_physician') as $key=>$value)
                                                    {{$patient->examination_by_physician == $key  ? $value : ''}}
                                                    @endforeach </td>
                                        </tr>
                                        <!-- <tr>
                                            <td>Shishya's
                                                E-Sig </td>
                                            <td>  @if(!empty($shishya->id))
                                            @if($shishya->e_sign!='')
                                            <img src="{{ asset('uploads/'.$shishya->e_sign) }}" alt="E-Sign"
                                                width="100px;" height="80px;">
                                            @endif
                                            <br>
                                            (@if($shishya->title>0) {{__('phr.titlename')[$shishya->title]}} @endif
                                            {{$shishya->firstname.' '.$shishya->middelname.' '.$shishya->lastname}})
                                            @endif </td>
                                        </tr>
                                        <tr>
                                            <td>Guru's
                                                E-Sign </td>
                                            <td>@if(!empty($guru->id))
                                            @if($guru->e_sign!='')
                                            <img src="{{ asset('uploads/'.$guru->e_sign) }}" alt="E-Sign" width="100px;"
                                                height="80px;">
                                            @endif
                                            <br>
                                            (@if($guru->title>0) {{__('phr.titlename')[$guru->title]}} @endif
                                            {{$guru->firstname.' '.$guru->lastname}})
                                            @endif </td>
                                        </tr> -->
                                       
                                </tbody>
                            </table>
                            <div class="row clearfix">
                                    <div class="col-sm-6 sign">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Shishya's
                                                E-Sign</label><br>
                                            @if(!empty($shishya->id))
                                            @if($shishya->e_sign!='')
                                            <img src="{{ asset('uploads/'.$shishya->e_sign) }}" alt="E-Sign"
                                                width="100px;" height="80px;">
                                            @endif
                                            <br>
                                            (@if($shishya->title>0) {{__('phr.titlename')[$shishya->title]}} @endif
                                            {{$shishya->firstname.' '.$shishya->middelname.' '.$shishya->lastname}})
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6 sign">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Guru's
                                                E-Sign</label><br>
                                            @if(!empty($guru->id))
                                            @if($guru->e_sign!='')
                                            <img src="{{ asset('uploads/'.$guru->e_sign) }}" alt="E-Sign" width="100px;"
                                                height="80px;">
                                            @endif
                                            <br>
                                            (@if($guru->title>0) {{__('phr.titlename')[$guru->title]}} @endif
                                            {{$guru->firstname.' '.$guru->lastname}})
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                           

                          


                               
                              
                                <div class="col-sm-12 p-t-20 text-left">
                                    <a href="{{ url('/follow-up-patients') }}"><button type="button"
                                            class="btn back btn-danger waves-effect"> &nbsp; Back &nbsp;</button></a>
                                </div>
                            </div>

                        </div>
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
$(document).ready(function() {
    $(".follow_up").click(function() {
        $(".card-body2").slideToggle();
    });
    $(".remarks").click(function() {
        $(".card-body3").slideToggle();
    });
});

function confirm_option(action) {
    var msg = '';
    if ($("#send_to").val() == 3) msg =
        "Are you sure to send record to Shishya? Please note that once you send this to your Shishya, he/she can modify this record!";
    else if ($("#send_to").val() == 1) msg =
        "Are you sure to send record to Admin? Please note that once you send this to Admin, you can not modify this record!";
    else if ($("#send_to").val() == 2) {
        @if(Auth::user()->user_type == 1)
        if ($("#remark_type").val() == 1) 
        msg = "Are you sure to send record to Guru? Please note that once you send this to Guru, he/she can modify this record!";
        else msg = "Are you sure to send record to Guru? Please note that remark is for reference only!";
        @else
        msg =
            "Are you sure to send record to Guru? Please note that once you send this to your Guru, you can not modify this record!";
        @endif
    }

    if (!confirm(msg)) {
        return false;
    }
    return true;
}
</script>
@endsection
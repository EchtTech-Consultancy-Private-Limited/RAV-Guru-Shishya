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
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h6 class="page-title"> Follow Up Patients </h6>

                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{ url('/dashboard') }}">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>

                            <li class="breadcrumb-item active"> Follow Up Patients </li>
                        </ul>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <form role="form" method="POST" action="{{ url('/follow-up-patients') }}">
                            @csrf
                            <div class="header">
                                <div class="row">
                                    <div class="col-xxl-3 col-xl-6 col-lg-3 col-md-4">
                                        <div class="new-patient-input">
                                            <div class="new-patient-ragistration">Registartion No.:
                                            </div>
                                            <div>
                                                <input type="text" name="prno" class="form-control"
                                                    value="@if (request()->prno) {{ request()->prno }} @endif"
                                                    maxlength="20">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-xxl-2 col-lg-2 col-md-4 width-50">
                                        <div class="new-patient-input">
                                            <div class="new-patient-ragistration">From:
                                            </div>
                                            <div>
                                                <input type="date" name="from_date" class="form-control datetimepicker flatpickr-input active" value="@if(request()->from_date){{date('Y-m-d',strtotime(request()->from_date))}}@endif" max="{{date('Y-m-d',time())}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-xxl-2 col-lg-2 col-md-4 width-50">
                                        <div class="new-patient-input">
                                            <div class="new-patient-ragistration">
                                                To:
                                            </div>
                                            <div>
                                                    <input type="date" name="to_date" class="form-control datetimepicker flatpickr-input active" value="@if(request()->to_date){{date('Y-m-d',strtotime(request()->to_date))}}@endif" max="{{date('Y-m-d',time())}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-xxl-5 col-lg-5 col-md-12">
                                        <div class="new-patient-input ">
                                            <div class="pe-2">
                                                <select name="report_type" class="form-control active">
                                                    <option value="">Select Duration</option>
                                                    <option @if (request()->report_type == 'Daily') SELECTED @endif value="Daily">
                                                        Daily Progress</option>
                                                    <option @if (request()->report_type == 'Weekly') SELECTED @endif value="Weekly">
                                                        Weekly Progress</option>
                                                    <option @if (request()->report_type == 'Monthly') SELECTED @endif value="Monthly">
                                                        Monthly Progress</option>
                                                </select>
                                            </div>

                                            @if (Auth::user()->user_type == 1)
                                                <div>
                                                    <select class="form-control" name="guru_id">
                                                        <option value="">Select Guru</option>
                                                        @foreach ($gurus as $guru1)
                                                            <option value="{{ $guru1->id }}"
                                                                @if (request()->guru_id == $guru1->id) SELECTED @endif>
                                                                {{ $guru1->firstname . ' ' . $guru1->middlename . ' ' . $guru1->lasttname }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect"
                                                    style="line-height:2;"> Filter </button>
                                                    <button type="reset" onclick="refreshPage();" class="btn btn-danger waves-effect">Reset</button>
                                            </div>
                                            @if (Auth::user()->user_type == 3)
                                                <div>
                                                    <a type="button" href="javascript:void(0);" data-bs-toggle="modal"
                                                        data-bs-target="#add-follow-up-sheet-model"
                                                        class="btn btn-danger waves-effect" style="line-height:2;">+ Add Follow
                                                        Up </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>                   </div>


                            </div>
                        </form>
                        <form role="form" method="POST" action="{{ url('/send-follow-up-sheet') }}">
                            @csrf
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-hover js-basic-example contact_list" id="data_table1">
                                        <thead>
                                            <tr>
                                                <th class="center sorting sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label=" No : activate to sort column descending">
                                                        <input type="checkbox" name="checkall"
                                                            id="checkall" type="checkbox" value="1">
                                                    <label for='selectAll'>
                                                    </label>
                                                </th>
                                                <th class="center sorting sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label=" No : activate to sort column descending"> S.No. </th>
                                                <th class="center"> Patient Registration No. </th>
                                                <th class="center"> Date </th>
                                                <th class="center"> Patient Name </th>  
                                                @if(Auth::user()->user_type == 1)
                                                <th class="center"> Guru Name </th>
                                                <th class="center"> Shishya Name </th>
                                                @endif
                                                @if(Auth::user()->user_type == 2)
                                                <th class="center"> Shishya Name </th>
                                                @endif
                                                @if(Auth::user()->user_type == 3)
                                                <th class="center"> Guru Name </th>
                                                @endif
                                                <th class="center"> Progress Duration </th>
                                                <th class="center"> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $k => $followup)
                                                <tr
                                                    class="odd gradeX @if (
                                                        (Auth::user()->user_type == 2 && $followup->read_by_guru == '0') ||
                                                            (Auth::user()->user_type == 3 && $followup->read_by_shishya == '0') ||
                                                            (Auth::user()->user_type == 1 && $followup->read_by_admin == '0')) active-row @endif">

                                                    <td class="center sorting_1 text-end p-0">
                                                            @if (Auth::user()->user_type == 2 || Auth::user()->user_type == 3)
                                                                <input name="followup_ids[]" type="checkbox" value="{{ $followup->id }}" class="input-checkbox">
                                                            @endif
                                                        </td>
                                                    <td class="center sorting_1">{{ $k + 1 }}</td>

                                                    <td class="center"><a
                                                            href="{{ url('follow-up-sheet/' . encrypt($followup->patient_id)) }}@php if(request()->to_date){ echo '/'.date('Y-m-d',strtotime(request()->from_date));} else echo '/0'; if(request()->from_date){ echo '/'.date('Y-m-d',strtotime(request()->to_date));} else echo '/0'; if(request()->report_type){ echo '/'.request()->report_type;} else echo '/0'; @endphp">{{ $followup->registration_no }}</a>
                                                    </td>
                                                    <td class="center">
                                                        {{ date('d-m-Y', strtotime($followup->follow_up_date)) }}</td>
                                                    <td class="center">{{ $followup->patient_name }}</td>
                                                    @if(Auth::user()->user_type == 1)
                                                    <td class="center">
                                                        {{ $followup->guru_firstname . ' ' . $followup->guru_lastname }}
                                                    </td>
                                                    <td class="center">
                                                        {{ $followup->shishya_firstname . ' ' . $followup->shishya_lastname }}
                                                    </td>
                                                    @endif
                                                    @if(Auth::user()->user_type == 2)
                                                    <td class="center">
                                                        {{ $followup->shishya_firstname . ' ' . $followup->shishya_lastname }}
                                                    </td>
                                                    @endif
                                                    @if(Auth::user()->user_type == 3)
                                                    <td class="center">
                                                        {{ $followup->shishya_firstname . ' ' . $followup->shishya_lastname }}
                                                    </td>
                                                    @endif
                                                   
                                                    <td class="center">{{ $followup->report_type }}</td>
                                                    <td >
                                                        <a href="{{ url('view-follow-up-sheet/' . encrypt($followup->id)) }}"
                                                            class="btn btn-tbl-edit" title="View Record">
                                                            <i class="material-icons">visibility</i>
                                                        </a>
                                                        <a href="{{ url('follow-up-remark-history/' . encrypt($followup->id)) }}" class="btn btn-tbl-edit" title="Check Remarks"><i class="fa fa-comment" aria-hidden="true"></i>
                                                        @if (
                                                            (Auth::user()->user_type == 3 && $followup->send_to_shishya == '1') ||
                                                                (Auth::user()->user_type == 2 && $followup->send_to_guru == '1') ||
                                                                (Auth::user()->user_type == 1 && $followup->send_to_admin == '1'))
                                                            <a href="{{ url('/add-follow-up-sheet/' . encrypt($followup->patient_id) . '/' . encrypt($followup->id)) }}"
                                                                class="btn btn-tbl-edit" title="Edit Record"
                                                                onclick="return confirm_option(' edit ')">
                                                                <i class="material-icons">edit</i>
                                                            </a>
                                                        @endif
                                                        @if (
                                                            (Auth::user()->user_type == 3 &&
                                                                $followup->send_to_shishya == '1' &&
                                                                $followup->send_to_guru != '1' &&
                                                                $followup->send_to_admin != '1') ||
                                                                (Auth::user()->user_type == 2 && $followup->send_to_guru == '1' && $followup->send_to_admin != '1') ||
                                                                (Auth::user()->user_type == 1 && $followup->send_to_admin == '1'))
                                                            <a href="{{ url('/delete-follow-up/' . encrypt($followup->id)) }}"
                                                                class="btn btn-tbl-delete" title="Delete Record"
                                                                onclick="return confirm_option(' delete ')">
                                                                <i class="material-icons">delete_forever</i>
                                                            </a>
                                                        @endif


                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>

                                    {{ $data->links('pagination::bootstrap-5') }}

                                </div>



                                <div class="col-sm-12 p-t-20 text-left">

                                    <input type="hidden"
                                        value="@if (request()->patientid) {{ request()->patientid }} @endif"
                                        name="patientid">
                                    <input type="hidden"
                                        value="@if (request()->fdate) {{ request()->fdate }} @endif"
                                        name="fdate">
                                    <input type="hidden"
                                        value="@if (request()->tdate) {{ request()->tdate }} @endif"
                                        name="tdate">
                                    <input type="hidden"
                                        value="@if (request()->rtype) {{ request()->rtype }} @endif"
                                        name="rtype">
                                    @if (Auth::user()->user_type == 3)
                                        <button type="submit" class="btn btn-primary waves-effect"
                                            onclick="return confirm_option('Send selected followup list to Guru');"> &nbsp;
                                            Send To Guru &nbsp;</button>
                                    @elseif(Auth::user()->user_type == 2)
                                        <button type="submit" class="btn btn-primary waves-effect"
                                            onclick="return confirm_option('Send selected followup list to Admin');">
                                            &nbsp; Send To Admin &nbsp;</button>
                                    @endif

                                </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>
        </div>
        </div>
        </div>

        <div class="modal fade" id="add-follow-up-sheet-model" tabindex="-1" aria-labelledby="exampleModalLabel"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Follow Up Sheet</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <label for="registration_no">Patient Registration No.</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="registration_no" class="form-control"
                                    placeholder="Enter patient registration no." minlength="4" maxlength="20">
                                <span class="text-danger" id="registration_no-error"></span>
                            </div>
                        </div>


                        <br>
                        <button type="button" class="btn btn-primary m-t-15 waves-effect find-registration">Find</button>


                    </div>
                    <div class="modal-footer">
                        <div id="follow-up-btn">

                        </div>
                        <button type="button" class="btn btn-danger waves-effect"
                            data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>

    </section>

    <script type="text/javascript">
        $("#checkall").click(function() {
            $(".input-checkbox").prop("checked", $(this).prop("checked"));
        });

        $(".input-checkbox").click(function() {
            if (!$(this).prop("checked")) {
                $("#checkall").prop("checked", false);
            }
        });


        $(".find-registration").click(function() {
            if ($("#registration_no").val() == '') {
                $("#registration_no-error").html('Enter patient registration no.');
                return false;
            } else $("#registration_no-error").html('');

            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: '{{ url('/find-phr-registration') }}',
                data: {
                    'registration_no': $("#registration_no").val()
                },
                success: function(data) {
                    if (data.id === undefined) {
                        $("#registration_no-error").html(data.message);
                        $("#follow-up-btn").html('');
                    } else {
                        $("#follow-up-btn").html('<a href="{{ url('/add-follow-up-sheet') }}/' + data
                            .id +
                            '"><button type="button" class="btn btn-info waves-effect">Add Follow Up</button></a>'
                            );
                    }
                }
            });
        });

        function confirm_option(action) {
            if (!confirm("Are you sure to " + action + ", this record!")) {
                return false;
            }

            return true;

        }
    </script>

@endsection

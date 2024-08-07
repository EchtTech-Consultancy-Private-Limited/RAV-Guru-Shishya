@extends('layouts.app-file')
@section('content')

    <link href='{{ asset('assets/plugins/fullcalendar/fullcalendar.css') }}' rel='stylesheet' />

    <style>
        .cal1 .clndr .clndr-controls .clndr-control-button .clndr-next-button,
        .cal1 .clndr .clndr-controls .clndr-control-button .clndr-previous-button {
            background: #00a1aa;
        }

        .cal1 .clndr .clndr-controls .clndr-control-button .clndr-next-button:hover,
        .cal1 .clndr .clndr-controls .clndr-control-button .clndr-previous-button:hover {
            background: #00838b;
        }


        .leave_card_body {
            height: 612px;
            overflow-x: auto;
        }

        .card_body_250 {
            height: 250px;
            overflow-x: auto;
        }

        .fc .fc-daygrid-day-top {
            flex-direction: row;
        }

        .fc-h-event {
            display: inline-block;
        }

        .fc-daygrid-day-events {
            text-align: right;
        }

        .fc-event-title.fc-sticky {
            font-size: 13px;
            font-weight: 500;
        }

        .holiday_card_header {
            padding: 6px 24px;
        }

        .color_box {
            position: relative;
        }

        .fc-direction-ltr .fc-button-group>.fc-button:not(:last-child) {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            display: none;
        }

        .fc-direction-ltr .fc-button-group>.fc-button:not(:first-child) {
            margin-left: -1px;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            display: none;
        }

        .color_box div.color_circle::after {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translate(-116%, -50%);
            width: 20px;
            height: 20px;
            display: block;
            border-radius: 50%;
        }

        .color_box div.color_present::after {
            background-color: green;
        }

        .color_box div.color_absent::after {
            background-color: red;
        }

        .color_box div.color_weekoff::after {
            background-color: grey;
        }

        .color_box div.color_holiday::after {
            background-color: grey;
        }

        .row-disabled {
            background-color: rgba(236, 240, 241, 0.5);
            pointer-events: none;
            width: 100%;
        }
    </style>
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

                        <ul class="breadcrumb breadcrumb-style">
                            <li class="breadcrumb-item">
                                <h6 class="page-title">
                                    @if (request()->path() == 'patients/In-Patient')
                                        In Patients
                                    @elseif(request()->path() == 'patients/OPD-Patient')
                                        OPD Patients
                                    @elseif(request()->path() == 'admin-patient-list')
                                        Patients
                                    @endif
                                </h6>
                                <!-- <p style="color:#000;">{{ request()->path() }}</p>   -->
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{ url('/dashboard') }}">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>

                            <li class="breadcrumb-item active">
                                @if (request()->path() == 'patients/In-Patient')
                                    In Patients
                                @elseif(request()->path() == 'patients/OPD-Patient')
                                    OPD Patients
                                @elseif(request()->path() == 'admin-patient-list')
                                    Patients
                                @endif
                            </li>
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
                        <div class="body">

                            <div class="row">
                                <form action="{{ route('patient-list', encrypt(@$shishyaId)) }}" method="get">
                                    <div class="col-md-12">
                                        <div class="row align-items-center">
                                            <div class="col-md-5">
                                                <div class="form-group mb-0">
                                                    <label class="active">Select Month:<span
                                                            class="text-danger"></span></label>
                                                    <input type="date" name="check_date"
                                                        value="{{ Request::get('check_date') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-0">
                                                    <button type="submit" class="btn filter  waves-effect">
                                                        Search
                                                    </button>
                                                    <a href="{{ route('patient-list', encrypt(@$shishyaId)) }}" class="btn reset  waves-effect">
                                                        Reset
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- Calendar starts here -->
                                <div id="calendar_box">
                                    <div id='calendar'></div>
                                </div>
                                <!-- Calendar ends here -->
                            </div>

                            <div class="table-responsive">
                                <div class="col-md-6">
                                    <div class="d-flex color-box-parent">
                                        <div class="color-box box1">
                                            <div>

                                            </div>
                                            <p>Not Read</p>
                                        </div>
                                        <div class="color-box box2">
                                            <div>

                                            </div>
                                            <p>Read</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table
                                                class="table table-hover js-basic-example contact_list dataTable no-footer"
                                                id="DataTables_Table_0" role="grid"
                                                aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="center sorting sorting_asc" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label=" No : activate to sort column descending"> S.No. <i
                                                                class="fa fa-long-arrow-up" aria-hidden="true"></i> <i
                                                                class="fa fa-long-arrow-down" aria-hidden="true"></i> </th>
                                                        <!-- <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Name : activate to sort column ascending">System Reg. No <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i> </th> -->
                                                        <th class="center sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            aria-label=" Email : activate to sort column ascending">Patient
                                                            Reg. No <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
                                                            <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                                                        </th>


                                                        <th class="center sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            aria-label="Created Date : activate to sort column ascending">
                                                            Guru Name <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
                                                            <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                                                        </th>
                                                        <th class="center sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            aria-label="Created Date : activate to sort column ascending">
                                                            Shishya Name <i class="fa fa-long-arrow-up"
                                                                aria-hidden="true"></i> <i class="fa fa-long-arrow-down"
                                                                aria-hidden="true"></i> </th>

                                                        <th class="center sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Created Date : activate to sort column ascending">
                                                            Patient Name<i class="fa fa-long-arrow-up"
                                                                aria-hidden="true"></i> <i class="fa fa-long-arrow-down"
                                                                aria-hidden="true"></i> </th>

                                                        <th class="center sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Created Date : activate to sort column ascending">
                                                            Patients Type <i class="fa fa-long-arrow-up"
                                                                aria-hidden="true"></i> <i class="fa fa-long-arrow-down"
                                                                aria-hidden="true"></i> </th>
                                                        <th class="center sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Created Date : activate to sort column ascending">
                                                            Gender <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
                                                            <i class="fa fa-long-arrow-down" aria-hidden="true"></i> </th>

                                                        <th class="center sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1"
                                                            colspan="1"
                                                            aria-label=" User Type : activate to sort column ascending">
                                                            Reg. Date <i class="fa fa-long-arrow-up"
                                                                aria-hidden="true"></i>
                                                            <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                                                        </th>



                                                        <th class="center sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Created Date : activate to sort column ascending">
                                                            Action <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
                                                            <i class="fa fa-long-arrow-down" aria-hidden="true"></i> </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($patientlist as $key => $patientlist)
                                                        <tr
                                                            class="gradeX odd {{ $patientlist->read_by_admin == '0' ? 'active-row' : 'not-active-row' }}">
                                                            <td class="center sorting_1">{{ ++$key }}</td>
                                                            <!-- <td class="center"><a href="{{ url('view-patient/' . encrypt($patientlist->id)) }}">{{ @format_patient_id($patientlist->id) }}</a></td> -->
                                                            <td class="text-center">{{ $patientlist->registration_no }}
                                                            </td>
                                                            <td class="center sorting_1 text-nowrap">
                                                                <?php echo get_user_name($patientlist->guru_id); ?></td>
                                                            <td class="center sorting_1">
                                                                <?php echo get_user_name($patientlist->shishya_id); ?></td>
                                                            <td class="center text-nowrap">
                                                                {{ $patientlist->patient_name }} </td>
                                                            <td class="center"> {{ $patientlist->patient_type }} </td>
                                                            <td class="center">
                                                                @if ($patientlist->gender == 1)
                                                                    Male
                                                                @elseif($patientlist->gender == 2)
                                                                    Female
                                                                @elseif($patientlist->gender == 3)
                                                                    Others
                                                                @endif
                                                            </td>

                                                            <td class="center">
                                                                {{ date('d-m-Y', strtotime($patientlist->registration_date)) }}
                                                            </td>

                                                            <td class="center">
                                                                @if (permissionCheck()->view == 3 || Auth::user()->user_type == 4)
                                                                    <a href="{{ url('admin-view-patient/' . $patientlist->id) }}"
                                                                        class="btn view btn-tbl-edit" title="View Record">
                                                                        <i class="material-icons">visibility</i>
                                                                    </a>
                                                                @endif
                                                                @if (permissionCheck()->edit == 2 || Auth::user()->user_type == 4)
                                                                    <a href="{{ url('patients/admin-edit-patient/' . $patientlist->id) }}"
                                                                        class="btn edit btn-tbl-edit"
                                                                        title="Edit Patient">
                                                                        <i class="material-icons">edit
                                                                            @if (isset($patientlist->patientHistory->patient_id))
                                                                                <span
                                                                                    class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle"
                                                                                    title="Some changes"></span>
                                                                            @endif
                                                                        </i>
                                                                    </a>
                                                                @endif
                                                                <!-- <a href="{{ url('delete-phr/' . $patientlist->id) }}" class="btn delete btn-tbl-delete" onclick="return confirm_option('delete')" title="Patient Delete">
                                           <i class="material-icons">delete_forever</i>
                                        </a> -->
                                                                @if (permissionCheck()->delete == 4 || Auth::user()->user_type == 4)
                                                                    <a class="btn delete btn-tbl-delete delete_patient"
                                                                        data-id="{{ $patientlist->id }}"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#delete_modal"
                                                                        title="Patient Delete">
                                                                        <i class="material-icons">delete_forever</i>
                                                                    </a>
                                                                @endif
                                                                <a target="_self"
                                                                    href="{{ url('admin-remark-history/' . $patientlist->id) }}"
                                                                    class="btn comment btn-tbl-edit" title="Check Remark">
                                                                    <i class="fa fa-history" aria-hidden="true"></i>
                                                                </a>
                                                                @if ($patientlist->phr_a_status == 1)
                                                                    <a target="_self"
                                                                        href=" {{ url('remarks-from-guru/' . encrypt($patientlist->id)) }}"
                                                                        class="btn remark" title="Remarks">
                                                                        Remarks
                                                                    </a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <!-- Patient Delete Popup Modal Start-->
                                <div class="modal fade" id="delete_modal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center" id="exampleModalLabel">Patient Delete
                                                </h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('delete-patient-remark') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="patient_id"
                                                        class="form-control capitalize" id="patient_id">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="remark">Write A Proper Remark<span
                                                                        class="text-danger">*</span></label>
                                                                <textarea id="delete_remark" name="delete_remark" rows="6" cols="25" maxlength="250" required></textarea>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 text-center">
                                                            <button type="submit"
                                                                class="btn save bg-indigo text-white">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Patient Delete Popup Modal End-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script src="{{ asset('assets/plugins/fullcalendar/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
    <script>
        $('.delete_patient').on('click', function() {
            const patientId = $(this).attr('data-id');
            $("#patient_id").val(patientId);
        });

        //List FullCalendar
        document.addEventListener("DOMContentLoaded", function() {
            var calendarEl = document.getElementById("calendar");
            var calendar = new FullCalendar.Calendar(calendarEl, {
                height: "auto",
                headerToolbar: {
                    left: "prev,next",
                    center: "title",
                    right: "today",
                },

                // customize the button names,
                // otherwise they'd all just say "list"
                views: {
                    listDay: {
                        buttonText: "list day"
                    },
                    listWeek: {
                        buttonText: "list week"
                    },
                },
                initialDate: <?php echo '"' . @$startDate . '"'; ?>,
                navLinks: false, // can click day/week names to navigate views
                editable: true,
                eventDurationEditable: false,
                eventStartEditable: false,
                eventLimit: true, // allow "more" link when too many events
                dayMaxEvents: true, // allow "more" link when too many events
                events: <?php echo json_encode(@$attendances); ?>
            });
            calendar.render();
        });
    </script>
@endsection

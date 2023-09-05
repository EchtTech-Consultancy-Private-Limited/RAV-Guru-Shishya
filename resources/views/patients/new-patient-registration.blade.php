@extends('layouts.app-file')
@section('content')

    <style>
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

                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h6 class="page-title"> New Patients </h6>

                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{ url('/dashboard') }}">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>

                            <li class="breadcrumb-item active"> New Patients </li>
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
                    <div class="card new-patient">
                        <form role="form" method="POST" action="{{ url('/new-patient-registration') }}">
                            @csrf
                            <div class="header">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        <div class="new-patient-input">
                                            <div class="new-patient-ragistration">Registration No.:
                                            </div>
                                            <div>
                                                <input type="text" name="prno" class="form-control"
                                                    value="@if (request()->prno) {{ request()->prno }} @endif"
                                                    maxlength="20">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <div class="new-patient-input">
                                            <div class="new-patient-ragistration">From:
                                            </div>
                                            <div>
                                                <input type="date" name="from_date"
                                                    class="form-control datetimepicker flatpickr-input active"
                                                    value="@if (request()->from_date) {{ date('Y-m-d', strtotime(request()->from_date)) }} @endif"
                                                    max="{{ date('Y-m-d', time()) }}">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <div class="new-patient-input">
                                            <div class="new-patient-ragistration">
                                                To:
                                            </div>
                                            <div>
                                                <input type="date" name="to_date"
                                                    class="form-control datetimepicker flatpickr-input active"
                                                    value="@if (request()->to_date) {{ date('Y-m-d', strtotime(request()->to_date)) }} @endif"
                                                    max="{{ date('Y-m-d', time()) }}">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <div class="new-patient-input d-flex align-items-center h-100">
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect"
                                                    style="line-height:2;"> Filter </button>
                                            </div>

                                            <div>
                                                @if (Auth::user()->guru_id)
                                                    <a type="button" href="{{ url('/add-history-sheet') }}"
                                                        class="btn btn-danger waves-effect" style="line-height:2;">+ Add PHR
                                                    </a>
                                                @else
                                                    <a type="button" onclick="add_phr_func()"
                                                        class="btn btn-danger waves-effect" style="line-height:2;">+ Add
                                                        PHR</a>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>



                            </div>
                        </form>
                        <div class="body">
                            <div class="table-responsive">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row pb-3">
                                        <div class="col-sm-12">
                                            <form role="form" method="POST" action="{{ url('/send-php-to-guru') }}">
                                                @csrf
                                                <table
                                                    class="table table-hover js-basic-example contact_list dataTable no-footer"
                                                    id="DataTables_Table_0" role="grid"
                                                    aria-describedby="DataTables_Table_0_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="center sorting sorting_asc" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" aria-sort="ascending"
                                                                aria-label=" No : activate to sort column descending">
                                                                <input id="addall" type="checkbox"><label
                                                                    for='selectAll'> </label>
                                                            </th>

                                                            <th class="center sorting sorting_asc" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" aria-sort="ascending"
                                                                aria-label=" No : activate to sort column descending"> S.No.
                                                            </th>
                                                            <th class="center sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1"
                                                                aria-label=" Name : activate to sort column ascending">
                                                                System Reg. No </th>
                                                            <th class="center sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1"
                                                                aria-label=" Email : activate to sort column ascending">
                                                                Patient Reg. No </th>
                                                            <th class="center sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1"
                                                                aria-label=" User Type : activate to sort column ascending">
                                                                Reg. Date </th>
                                                            <th class="center sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Created Date : activate to sort column ascending">
                                                                Patients Name </th>
                                                            <th class="center sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Created Date : activate to sort column ascending">
                                                                Gender </th>

                                                            <th class="center sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Created Date : activate to sort column ascending">
                                                                Patients Type </th>

                                                            <th class="center sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Created Date : activate to sort column ascending">
                                                                Age </th>
                                                            <th class="center sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Created Date : activate to sort column ascending">
                                                                Action </th>
                                                            <th class="center sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1"
                                                                colspan="1" aria-label=""> Remarks </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>




                                                        @foreach ($patientlist as $key => $patientlist)
                                                            <tr
                                                                class="gradeX odd @if ($patientlist->read_by_shishya == '0') active-row @endif">

                                                                <td class="center sorting_1 text-end p-0"><input
                                                                        name="send_phr_to_guru[]"
                                                                        value="{{ $patientlist->id }}" type="checkbox"
                                                                        class="add new-patient-checkbox"></td>
                                                                <td class="center sorting_1">{{ ++$key }}</td>
                                                                <td class="center"><a
                                                                        href="{{ url('view-patient/' . encrypt($patientlist->id)) }}">{{ @format_patient_id($patientlist->id) }}</a>
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $patientlist->registration_no }}</td>
                                                                <td class="center"> {{ $patientlist->registration_date }}
                                                                </td>
                                                                <td class="center"> {{ $patientlist->patient_name }} </td>
                                                                <td class="center">
                                                                    @if ($patientlist->gender == 1)
                                                                        Male
                                                                    @elseif($patientlist->gender == 2)
                                                                        Female
                                                                    @elseif($patientlist->gender == 3)
                                                                        Others
                                                                    @endif
                                                                </td>
                                                                <td class="center"> {{ $patientlist->patient_type }} </td>
                                                                <td class="center"> {{ $patientlist->age }} </td>
                                                                <td class="left">

                                                                    <a href="{{ url('view-patient/' . encrypt($patientlist->id)) }}"
                                                                        class="btn btn-tbl-edit" title="View Patient">
                                                                        <i class="material-icons">visibility</i>
                                                                    </a>


                                                                    <!-- <a href="{{ url('edit-patient/' . $patientlist->id) }}" class="btn btn btn-tbl-edit" >
                                                                 <i class="fa fa-edit " aria-hidden="true" style="line-height:0 !important"></i>
                                                              </a> -->

                                                                    @if ($patientlist->phr_s_status == 1)
                                                                        <a href="{{ url('edit-patient/' . encrypt($patientlist->id)) }}"
                                                                            class="btn btn-tbl-edit" title="Edit Patient">
                                                                            <i class="material-icons">edit</i>
                                                                        </a>

                                                                        <a href="{{ url('send-patient-toguru/' . encrypt($patientlist->id) . '/' . encrypt(Auth::user()->guru_id)) }}"
                                                                            onclick="send_to_guru()"
                                                                            class="btn btn-tbl-edit"
                                                                            title="Send to Guru Patient">
                                                                            <i class="material-icons">send</i>
                                                                        </a>
                                                                        @if ($patientlist->phr_g_status != 1)
                                                                            <a href="{{ url('delete-phr/' . $patientlist->id) }}"
                                                                                class="btn btn-tbl-delete"
                                                                                onclick="return confirm_option('delete')">
                                                                                <i
                                                                                    class="material-icons">delete_forever</i>
                                                                            </a>
                                                                        @endif
                                                                    @else
                                                                        <!-- <a href="javascript:void(0);" class="btn btn-tbl-edit" title="Edit Patient">
                                                                    <i class="material-icons">edit</i>
                                                                 </a>
                                                               <a href="javascript:void(0);" class="btn btn-tbl-edit" title="Send to Guru Patient">
                                                                    <i class="material-icons">send</i>
                                                                 </a> -->
                                                                    @endif


                                                                </td>
                                                                <td class="center">
                                                                    <a href="{{ url('remark-history/' . encrypt($patientlist->id)) }}"
                                                                        class="btn btn-tbl-edit" title="View Remarks">
                                                                        <i class="material-icons">visibility</i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                                <button type="submit" class="btn btn-primary waves-effect"
                                                    onclick="send_to_guru()" class="pt-2"> &nbsp; Send To Guru
                                                    &nbsp;</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>

    <script>
        $("#addall").click(function() {
            $("input[class=add]").prop("checked", $(this).prop("checked"));
        });

        $("input[class=add]").click(function() {
            if (!$(this).prop("checked")) {
                $("#addall").prop("checked", false);
            }
        });
    </script>
@endsection

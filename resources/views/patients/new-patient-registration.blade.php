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
                <div class="col-md-6 col-lg-6">

                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h6 class="page-title"> New Patients </h6>

                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ url('/dashboard') }}">
                                <i class="fas fa-home"></i> Dashboard</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ url('/dashboard') }}">
                                 Manage Patients  </a>
                        </li>
                        <li class="breadcrumb-item active"> New Patient Registration </li>
                    </ul>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                </div>
                <div class="col-md-6 pt-2">
                    <div class=" d-flex align-items-center justify-content-end h-100">
                        <div>
                            @if (Auth::user()->guru_id)
                            @if(permissionCheck()->add == 1 || Auth::user()->user_type == 4)
                            <a type="button" href="{{ url('/add-history-sheet') }}" class="btn add  waves-effect " >+ Add PHR
                            </a>
                            @endif
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
            @if (Auth::user()->guru_id)
                <div class="card new-patient">
                    <form role="form" method="POST" action="{{ url('/new-patient-registration') }}">
                        @csrf
                        <div class="header">
                            <div class="row">
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
                              
                            </div>
                        </div>
                    </form>
                    <div class="body pt-0">
                        <div class="">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row pb-3">
                                    <div class="col-sm-12">
                                        <form role="form" method="POST" action="{{ url('/send-php-to-guru') }}">
                                            @csrf
                                            <table class="table table-striped table-bordered" id="patient_table" role="grid" aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="center sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" No : activate to sort column descending">
                                                            <input id="addall" type="checkbox"><label for='selectAll'> </label>
                                                        </th>

                                                        <th class="center sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" No : activate to sort column descending"> S.No. <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
                                                        <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                                                        </th>
                                                        <!-- <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Name : activate to sort column ascending">
                                                            System Reg. No </th> -->
                                                        <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Email : activate to sort column ascending">
                                                            Patient Reg. No <i class="fa fa-long-arrow-up" aria-hidden="true"></i><i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>

                                                            <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending">
                                                            Patients Name <i class="fa fa-long-arrow-up" aria-hidden="true"></i><i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>

                                                            <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending">
                                                            Patients Type <i class="fa fa-long-arrow-up" aria-hidden="true"></i><i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>

                                                            <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending">
                                                            Gender <i class="fa fa-long-arrow-up" aria-hidden="true"></i><i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>

                                                        <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" User Type : activate to sort column ascending">
                                                            Reg. Date <i class="fa fa-long-arrow-up" aria-hidden="true"></i><i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>




                                                        <th class="center sorting text-nowrap" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending">
                                                            Action <i class="fa fa-long-arrow-up" aria-hidden="true"></i><i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                                        <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=""> Remarks <i class="fa fa-long-arrow-up" aria-hidden="true"></i><i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($patientlist as $key => $patientlist)
                                                    <tr class="gradeX odd {{($patientlist->read_by_shishya == '0') ? 'active-row' : 'not-active-row' }}">

                                                        <td class="center sorting_1  p-0"><input name="send_phr_to_guru[]" value="{{ $patientlist->id }}" id="find-table" type="checkbox" class="add"></td>
                                                        <td class="center sorting_1">{{ ++$key }}</td>
                                                        <!-- <td class="center"><a href="{{ url('view-patient/' . encrypt($patientlist->id)) }}">{{ @format_patient_id($patientlist->id) }}</a>
                                                        </td> -->
                                                        <td class="text-center">
                                                            {{ $patientlist->registration_no }}
                                                        </td>
                                                        <td class="center"> {{ $patientlist->patient_name }} </td>
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
                                                        <td class="center date" > {{ date('d-m-Y', strtotime($patientlist->registration_date)) }}</td>

                                                        <td class="text-nowrap">
                                                            @if(permissionCheck()->view == 3 || Auth::user()->user_type == 4)
                                                            <a href="{{ url('view-patient/' . encrypt($patientlist->id)) }}" class="btn view btn-tbl-edit" title="View Patient">
                                                                <i class="material-icons">visibility</i>
                                                            </a>
                                                            @endif
                                                            @if ($patientlist->phr_s_status == 1)
                                                                @if(permissionCheck()->edit == 2 || Auth::user()->user_type == 4)
                                                                <a href="{{ url('edit-patient/' . encrypt($patientlist->id)) }}" onclick="return confirm_option('edit')" class="btn edit btn-tbl-edit" title="Edit Patient">
                                                                    <i class="material-icons">edit
                                                                    @if(isset($patientlist->patientHistory->patient_id))
                                                                    <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle" title="Some changes"></span>
                                                                    @endif
                                                                    </i></a>
                                                                @endif
                                                                <!-- <a href="{{ url('send-patient-toguru/' . encrypt($patientlist->id) . '/' . encrypt(Auth::user()->guru_id)) }}" onclick="send_to_guru()" class="btn btn-tbl-edit" title="Send to Guru">
                                                                    <i class="material-icons">send</i>
                                                                </a> -->
                                                             @if ($patientlist->phr_g_status != 1)
                                                                @if(permissionCheck()->delete == 4 || Auth::user()->user_type == 4)
                                                                <a href="{{ url('delete-phr/' . $patientlist->id) }}" class="btn btn-tbl-delete" onclick="return confirm_option('delete')" title="Patient Delete">
                                                                    <i class="material-icons">delete_forever</i>
                                                                </a>
                                                                @endif
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
                                                        <a href="{{ url('remark-history/' . encrypt($patientlist->id)) }}" class="btn comment btn-tbl-edit" title="Check Remarks"><i class="fa fa-history" aria-hidden="true"></i></a>
                                                        @if($patientlist->phr_s_status== 1)
                                                            <a target="_self" href=" {{ url('remarks-from-guru/'.encrypt($patientlist->id)) }}" class="btn btn-secondary remark" title="Remarks">
                                                                Remarks
                                                            </a>
                                                        @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <button type="submit" class="btn send  waves-effect " onclick="send_to_guru()" class="pt-2"> &nbsp; Send To Guru
                                                &nbsp;</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            <div class="card new-patient">
                    <div class="body">
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row pb-3">
                                    <div class="col-sm-12">
                                        <form role="form" method="POST" action="{{ url('/send-php-to-guru') }}">
                                            @csrf
                                            <table class="table table-hover js-basic-example contact_list dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                    <tr role="row">


                                                        <th class="center sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" No : activate to sort column descending"> S.No. <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
                                                        <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                                                        </th>
                                                        <!-- <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Name : activate to sort column ascending">
                                                            System Reg. No </th> -->
                                                        <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Email : activate to sort column ascending">
                                                            Patient Reg. No <i class="fa fa-long-arrow-up" aria-hidden="true"></i><i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                                        <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" User Type : activate to sort column ascending">
                                                            Reg. Date <i class="fa fa-long-arrow-up" aria-hidden="true"></i><i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                                        <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending">
                                                            Patients Name <i class="fa fa-long-arrow-up" aria-hidden="true"></i><i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                                        <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending">
                                                            Gender <i class="fa fa-long-arrow-up" aria-hidden="true"></i><i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>

                                                        <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending">
                                                            Patients Type <i class="fa fa-long-arrow-up" aria-hidden="true"></i><i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>




                                                    @foreach ($patientlist as $key => $patientlist)
                                                    <tr class="gradeX odd @if ($patientlist->read_by_shishya == '0') active-row @endif">


                                                        <td class="center sorting_1">{{ ++$key }}</td>
                                                        <!-- <td class="center"><a href="{{ url('view-patient/' . encrypt($patientlist->id)) }}">{{ @format_patient_id($patientlist->id) }}</a>
                                                        </td> -->
                                                        <td class="text-center">
                                                            {{ $patientlist->registration_no }}
                                                        </td>
                                                        <td class="center"> {{ date('d-m-Y', strtotime($patientlist->registration_date)) }}</td>
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
            @endif
            </div>
</section>

<script>
    $(document).ready(function() {
        var table = $('#patient_table').DataTable({
            "columnDefs": [{
                "targets": 0,
                "orderable": false,
                "className": 'select-checkbox',
            }],
            "select": {
                "style": 'multi',
                "selector": 'td:first-child',
            },
            "order": [[1, 'asc']], // Order by the second column by default
        });

        // Handle the "Select All" checkbox
        $('#addall').on('click', function() {
            var rows = table.rows({ 'search': 'applied' }).nodes();
            $('input[type="checkbox"]', rows).prop('checked', this.checked);
        });
    });
</script>
@endsection
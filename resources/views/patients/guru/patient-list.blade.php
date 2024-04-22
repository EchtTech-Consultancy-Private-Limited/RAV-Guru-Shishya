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
                             <h6 class="page-title"> Patients lists</h6>

                          </li>
                          <li class="breadcrumb-item bcrumb-1">
                          <a href="{{ url('/dashboard') }}"> <i class="fas fa-home"></i> Dashboard</a>
                          </li>
                          <li class="breadcrumb-item bcrumb-1">
                           <a > Manage Patients</a>
                          </li>

                          <li class="breadcrumb-item active"> <a > Patient List</a></li>
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
               <div class="table-responsive">
                     <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row"><div class="col-sm-12">
                            <table class="table table-hover js-basic-example contact_list dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                           <tr role="row">
                                <th class="center sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" No : activate to sort column descending"> S.No. <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Email : activate to sort column ascending">Patients Reg. No <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                <th class="center sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" No : activate to sort column descending"> Shishya Name <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending">Patient Name<i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending"> Patients Type <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>   
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending"> Gender <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" User Type : activate to sort column ascending"> Reg. Date <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>                         
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending"> Action <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending"> Remark <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($patientlist as $key=>$patientlist)

                        <tr class="gradeX odd {{($patientlist->read_by_guru == '0') ? 'active-row' : 'not-active-row' }}">
                                 <td class="center sorting_1">{{ ++$key }}</td>
                                 <td class="text-center">{{$patientlist->registration_no}}</td>
                                 <td class="center sorting_1"><?php echo get_user_name($patientlist->shishya_id); ?></td>
                                 <td class="center"> {{$patientlist->patient_name}} </td>
                                 <td class="center"> {{$patientlist->patient_type}} </td>
                                 <!-- <td class="center"><a href="{{ url('view-patient/'.encrypt($patientlist->id)) }}">{{@format_patient_id($patientlist->id)}}</a></td> -->
                                 <td class="center">@if($patientlist->gender==1) Male @elseif($patientlist->gender==2) Female @elseif($patientlist->gender==3)Others @endif</td>
                                 <td class="center"> {{ date('d-m-Y', strtotime($patientlist->registration_date)) }} </td>

                                 <td class=" patient-list-action">
                                    @if(permissionCheck()->view == 3 || Auth::user()->user_type == 4)
                                    <a href="{{ url('guru-view-patient/'.encrypt($patientlist->id)) }}" class="btn view btn-tbl-edit" title ="View Record"><i class="material-icons">visibility</i></a>                                   
                                    @endif
                                 @if($patientlist->phr_a_status== 1 OR $patientlist->phr_s_status== 1)
                                    <!-- <a href="javascript:void(0);" class="btn btn-secondary" title="Edit Patient">
                                        Remarks
                                    </a> -->
                                    <!-- <a target="_blank" href=" {{ url('remarks-from-guru/'.encrypt($patientlist->id)) }}" class="btn btn-secondary" title="Remarks">
                                        Remarks
                                    </a> -->

                                 @else
                                    @if(permissionCheck()->edit == 2 || Auth::user()->user_type == 4)
                                    <a href="{{ url('edit-patient/' . encrypt($patientlist->id)) }}" onclick="return confirm_option('edit')" class="btn edit btn-tbl-edit" title="Edit Patient"><i class="material-icons">edit
                                    @endif
                                       @if(isset($patientlist->patientHistory->patient_id))
                                       <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle" title="Some changes"></span>
                                    @endif
                                    </i></a>
                                    <!-- <a href="{{ url('delete-phr/'.$patientlist->id) }}" class="btn delete btn-tbl-delete" onclick="return confirm_option('delete')" title="Patient Delete"><i class="material-icons">delete_forever</i>
                                    </a> -->
                                 @endif
                                 </td>
                                 <td class="center">
                                 <a  href="{{ url('guru-remark-history/'.encrypt($patientlist->id)) }}" class="btn comment btn-tbl-edit" title="Check Remark"><i class="fa fa-history" aria-hidden="true"></i></a> 
                                 @if($patientlist->phr_a_status == 1 OR $patientlist->phr_s_status == 1)
                                 @else
                                    <a target="_self" href=" {{ url('remarks-from-guru/'.encrypt($patientlist->id)) }}" class="btn remark btn-secondary" title="Remarks">
                                        Remarks
                                    </a>
                                 @endif
                                 </td>
                           </tr>
                        @endforeach

                    </tbody>
                     </table>
                    </div></div>
                    <!--<div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 4 of 4 entries</div>
                        </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                    <ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul>
                                </div>
                            </div>
                        </div>
                    </div>-->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection

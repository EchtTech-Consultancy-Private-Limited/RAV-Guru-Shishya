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
                             <h6 class="page-title">Patients History Sheets</h6>
                             
                          </li>
                          <li class="breadcrumb-item bcrumb-1">
                            <a href="{{url('/dashboard')}}">
                             <i class="fas fa-home"></i> Home</a>
                          </li>
                          
                          <li class="breadcrumb-item active">   Patients History Sheets </li>
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
               <div class="table-responsive">
                     <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row"><div class="col-sm-12">
                            <table class="table table-hover js-basic-example contact_list dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                           <tr role="row">
                                <th class="center sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" No : activate to sort column descending"> S.No. </th>
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Name : activate to sort column ascending">System Reg. No </th>
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Email : activate to sort column ascending">Patient Reg. No </th>
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" User Type : activate to sort column ascending"> Reg. Date </th>
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending">Patient Name</th>
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending"> Gender </th>
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending"> Age </th>
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                                                                                       
                                                            
                                                            
                                                            
                        @foreach($patientlist as $key=>$patientlist) 
                                                                                 
                        <tr class="gradeX odd ">
                                 <td class="center sorting_1">{{ ++$key }}</td>
                                 <td class="center"><a href="{{ url('view-patient/'.$patientlist->id) }}">{{@format_patient_id($patientlist->id)}}</a></td>
                                 <td class="text-center">{{$patientlist->registration_no}}</td>
                                 <td class="center"> {{$patientlist->registration_date}} </td>
                                 <td class="center"> {{$patientlist->patient_name}} </td> 
                                 <td class="center">@if($patientlist->gender==1) Male @elseif($patientlist->gender==2) Female @elseif($patientlist->gender==3)Others @endif</td>
                                 <td class="center"> {{$patientlist->age}} </td> 
                                 <td class="center">

                                    <a href="{{ url('guru-view-patient/'.$patientlist->id) }}" class="btn btn-tbl-edit" title ="View Record">
                                                    <i class="material-icons">visibility</i>
                                    </a>
                                    
                                    @if($patientlist->phr_a_status== 1 OR $patientlist->phr_s_status== 1)
                                    <a href="javascript:void(0);" class="btn btn-secondary" title="Edit Patient">
                                        Remarks  
                                    </a>

                                    @else
                                    <a href=" {{ url('remarks-from-guru/'.$patientlist->id) }}" class="btn btn-secondary" title="Edit Patient">
                                        Remarks  
                                    </a>
                                    @endif
                                    <a href="{{ url('remark-history/'.$patientlist->id.'/'.$patientlist->shishya_id) }}" class="btn btn-secondary" title="Edit Patient">
                                        History  
                                    </a>

                                    
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
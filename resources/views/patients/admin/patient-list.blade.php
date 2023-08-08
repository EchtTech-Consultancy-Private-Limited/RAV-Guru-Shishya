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
                          
                       <ul class="breadcrumb breadcrumb-style">
                          <li class="breadcrumb-item">
                             <h6 class="page-title"> @if(request()->path()=="patients/In-Patient") In Patients @elseif(request()->path()=="patients/OPD-Patient") OPD Patients @elseif(request()->path()=="admin-patient-list") Patients @endif </h6>
                             <!-- <p style="color:#000;">{{ request()->path() }}</p>   -->
                          </li>
                          <li class="breadcrumb-item bcrumb-1">
                            <a href="{{url('/dashboard')}}">
                             <i class="fas fa-home"></i> Home</a>
                          </li>
                          
                          <li class="breadcrumb-item active"> @if(request()->path()=="patients/In-Patient") In Patients @elseif(request()->path()=="patients/OPD-Patient") OPD Patients @elseif(request()->path()=="admin-patient-list") Patients @endif  </li>
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
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending">Patient </th>
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending"> Gender </th>

                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending"> Patients Type </th>

                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending"> Age </th>

                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending"> Guru Name </th>
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending"> Shishya Name </th>

                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                                                                                       
                                                            
                                                            
                                                            
                        @foreach($patientlist as $key=>$patientlist) 
                                                                                 
                        <tr class="gradeX odd @if($patientlist->read_by_admin=='0') active-row @endif">
                                 <td class="center sorting_1">{{ ++$key }}</td>
                                 <td class="center"><a href="{{ url('view-patient/'.encrypt($patientlist->id)) }}">{{@format_patient_id($patientlist->id)}}</a></td>
                                 <td class="text-center">{{$patientlist->registration_no}}</td>
                                 <td class="center"> {{$patientlist->registration_date}} </td>
                                 <td class="center"> {{$patientlist->patient_name}} </td> 
                                 <td class="center">@if($patientlist->gender==1) Male @elseif($patientlist->gender==2) Female @elseif($patientlist->gender==3)Others @endif</td>
                                 <td class="center"> {{$patientlist->patient_type}} </td>
                                 
                                 <td class="center"> {{$patientlist->age}} </td> 

                                 <td class="center sorting_1"> <?php echo get_user_name($patientlist->guru_id); ?></td>
                                 <td class="center sorting_1"><?php echo get_user_name($patientlist->shishya_id); ?></td>

                                 <td class="center">

                                    <a href="{{ url('admin-view-patient/'.$patientlist->id) }}" class="btn btn-tbl-edit" title ="View Record">
                                                    <i class="material-icons">visibility</i>
                                    </a>

                                    <a href="{{ url('patients/admin-edit-patient/'.$patientlist->id) }}" class="btn btn-tbl-edit" title="Edit Patient">
                                          <i class="material-icons">edit</i>
                                    </a>

                                    
                                    <a target="_blank" href="{{ url('admin-remark-history/'.$patientlist->id) }}" class="btn btn-tbl-edit" title="Remark History of Patient">
                                    <i class="icons-history">&nbsp&nbsp&nbsp&nbsp</i>
                                    </a>

                                    <a  href="{{ url('delete-phr/'.$patientlist->id) }}" class="btn btn-tbl-delete" onclick="return confirm_option('delete')">
                                       <i class="material-icons">delete_forever</i>
                                    </a>



                                    

                                    
                                 </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                     </table>
                    </div></div>
                    
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
      </section>  
  <script>
   function confirm_option(action){
      if(!confirm("Are you sure to "+action+", this record!")){
         return false;
      }

      return true;
 
   }
</script>   
@endsection
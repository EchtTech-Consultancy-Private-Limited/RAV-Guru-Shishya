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
                             <h6 class="page-title"> Patient History (Remarks) </h6>
                             
                          </li>
                          <li class="breadcrumb-item bcrumb-1">
                            <a href="{{url('/dashboard')}}">
                             <i class="fas fa-home"></i> Home</a>
                          </li>
                          
                          <li class="breadcrumb-item active">Patients History </li>
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
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Name : activate to sort column ascending">Date </th>
                                <th class="center sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" No : activate to sort column descending"> Guru Name </th>
                                <th class="center sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" No : activate to sort column descending">  Shishya Name  </th>
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Name : activate to sort column ascending">Remark </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                                                                                       
                                                            
                                                            
                                                            
                        @foreach($remark_history as $key=>$remark_history) 
                                                                                 
                        <tr class="gradeX odd ">
                                 <td class="center sorting_1">{{ ++$key }}</td>
                                 <td class="center"><a >{{$remark_history->created_at}}</a></td>
                                 <td class="center sorting_1"> <?php echo get_user_name($remark_history->guru_id); ?>
                                    @if($remark_history->send_to==1) <b style="color:green;">(Send to Admin) </b>@endif
                                 </td>
                                 <td class="center sorting_1"><?php echo get_user_name($remark_history->shishya_id); ?></td>
                                 <td class="center"><a ><b>{{$remark_history->remarks}}</b></a></td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                     </table>
                    </div></div>
                    
                  </div>
               </div>
            </div>
         </div>
         <a style="line-height:2;" type="button" class="btn btn-secondary" href="{{ url('admin-patient-list') }}">Back To PHR Records</a>
      </div>
   </div>
</section>      
@endsection
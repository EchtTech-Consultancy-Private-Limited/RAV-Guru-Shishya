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
                             <h6 class="page-title"> Notifications List</h6>

                          </li>
                          <li class="breadcrumb-item bcrumb-1">
                          <a href="{{ url('/dashboard') }}"> <i class="fas fa-home"></i> Dashboard</a>
                          </li>
                          <li class="breadcrumb-item active"> <a > PHR Notifications</a></li>
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
                                <th class="center sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" No : activate to sort column descending"> S.No. <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending"> Date <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending"> Remark by Guru <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Created Date : activate to sort column ascending"> Reply <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($phrNotificationData as $key=>$phrNotificationDatalist)

                        <tr class="gradeX odd {{($phrNotificationDatalist->shishya_read_status == '0') ? 'active-row' : 'not-active-row' }}">
                           <td class="center sorting_1">{{ ++$key }}</td>
                           <td class="text-center">{{$phrNotificationDatalist->date}}</td>
                           <td class="center sorting_1">{{$phrNotificationDatalist->comment_by_guru}}</td>
                           <td class="center sorting_1">
                                 <?php if($phrNotificationDatalist->comment_by_shishya == null) { ?>
                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal_{{$phrNotificationDatalist->id}}">
                                                Reply
                                 </button>
                                 <?php } else { ?>
                                 {{$phrNotificationDatalist->comment_by_shishya}}
                                 <?php } ?>
                           </td>
                        </tr>
                        
                        <div class="modal" id="myModal_{{$phrNotificationDatalist->id}}">
                                            <div class="modal-dialog">
                                              <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                  <h4 class="modal-title">Please enter your remarks</h4>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <div class="col-md-12">
                                                        <form name="save_comment_form" id="save_comment_form" method="POST" action="{{url('save-comment-from-shishya')}}">
                                                        @csrf
                                                        <div class="form-group">
                                                           <label for="example-text-input" class="form-control-label">Remarks<span class="text-danger">*</span></label>
                                                           <input type="text" name="remarks" class="form-control" placeholder="Enter your remarks" aria-label="" value="" maxlength="250" id="remarks">
                                                           <input type="hidden" name="notification_id" id="notification_id" value="{{$phrNotificationDatalist->id}}"/>
                                                        </div>
                                                        <div class="col-lg-12 p-t-20 text-end">
                                                            <button type="submit" class="btn submit  waves-effect m-r-15">Submit</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                    
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>

                                              </div>
                                            </div>
                                        </div>
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
@endsection

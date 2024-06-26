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
                             <h6 class="page-title">List of Drug Details </h6>

                          </li>
                          <li class="breadcrumb-item bcrumb-1">
                            <a href="{{url('/dashboard')}}">
                             <i class="fas fa-home"></i> Home</a>
                          </li>

                          <li class="breadcrumb-item active">List of Drug Details </li>
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
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
               <div class="header">
                  <ul class="header-dropdown m-r--5">
                     <li class="dropdown">
                        <a href="#" onClick="return false;"
                           class="dropdown-toggle"
                           data-bs-toggle="dropdown"
                           role="button" aria-haspopup="true"
                           aria-expanded="false">
                        </a>
                        <ul class="dropdown-menu float-start">
                           <li>
                              <a href="#" onClick="return
                                 false;">Action</a>
                           </li>
                           <li>
                              <a href="#" onClick="return
                                 false;">Another action</a>
                           </li>
                           <li>
                              <a href="#" onClick="return
                                 false;">Something else here</a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
               <div class="body p-0">
                   <div id="wizard_horizontal1">

                        <div class="card mb-0">
                            <form role="form" method="get" action="{{ url('filter-drug-report') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body pb-0">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th> Shishya Name</th>
                                                <th> Guru Name</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td> {{Auth::user()->firstname}} {{Auth::user()->lastname}}</td>
                                                <td> @if(Auth::user()->guru_id) {{$guru->firstname}} {{$guru->lastname}} @endif</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row">

                                            <!-- <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Name of the Shishya</label>
                                                    <input type="text" name="student_name" class="form-control"  value="{{Auth::user()->firstname .' '.Auth::user()->lastname}}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label   class="form-control-label">Name of the Guru</label>
                                                    <input type="text" name="guru_name" class="form-control"  value="@if(Auth::user()->guru_id) {{$guru->firstname .' '.$guru->lastname}} @endif" readonly>

                                                </div>
                                            </div> -->

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 m-0">
                                                <h3>Search</h3>
                                            </div>
                                            <div class="col-md-3">
                                               <div class="form-group">
                                                  <label
                                                     for="example-text-input"
                                                     class="form-control-label">Select Yogas</label>
                                                  <select class="form-control" id="yogas_type" name="yogas_type" required>
                                                     <option value="">Please Select </option>
                                                     @foreach(__('phr.yogas') as $key=>$value)
                                                     <option value="{{$key}}" {{ ($key == request()->yogas_type) ? 'selected' : '' }}>{{$value}}</option>
                                                    @endforeach
                                                  </select>
                                               </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="form-control-label">From Date:</label>
                                                    <input type="date" name="from_date" class="form-control datetimepicker flatpickr-input active" value="@if(request()->from_date){{date('Y-m-d',strtotime(request()->from_date))}}@endif" max="{{date('Y-m-d',time())}}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="form-control-label">To Date:</label>
                                                    <input type="date" name="to_date" class="form-control datetimepicker flatpickr-input active" value="@if(request()->to_date){{date('Y-m-d',strtotime(request()->to_date))}}@endif" max="{{date('Y-m-d',time())}}" required>

                                                </div>
                                            </div>

                                            <div class="col-md-4 d-flex align-items-center">
                                                <div>
                                                <button  class="btn filter btn-primary btn-sm ms-auto nextBtn" type="submit" >Filter Drug Report</button>
                                                <a href="{{url('drug-report-history')}}"> <button type="button" class="btn reset btn-primary btn-sm ms-auto nextBtn">Reset</button></a>
                                                </div>


                                            </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</section>

    <section class="content filter-drug">
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

            <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
               <div class="body">
               <div class="table-responsive">
                     <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12">

                                @isset($drugslist)
                                @if(strlen($drugslist)>3)
                                @if($drugslist[0]->yoga_type==1)
                                <a style="float:right;">Total Records: {{ count($drugslist) }}</a><br>
                                <table class="table table-hover js-basic-example contact_list dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                       <tr role="row">
                                            <th class="center sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" No : activate to sort column descending"> S.No. <i class="fa fa-long-arrow-up" aria-hidden="true"></i><i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                            <th class="center sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" No : activate to sort column descending"> Yoga Type <i class="fa fa-long-arrow-up" aria-hidden="true"></i><i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>

                                            <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Name : activate to sort column ascending">Yogas Name <i class="fa fa-long-arrow-up" aria-hidden="true"></i><i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>

                                            <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Name : activate to sort column ascending">Reg. Date<i class="fa fa-long-arrow-up" aria-hidden="true"></i><i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>

                                            <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Name : activate to sort column ascending">Action <i class="fa fa-long-arrow-up" aria-hidden="true"></i><i class="fa fa-long-arrow-down" aria-hidden="true"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($drugslist as $key=>$drug)
                                            <tr class="gradeX odd ">
                                                 <td class="center sorting_1">{{ ++$key }}</td>

                                                 <td class="text-center">@if($drug->yoga_type==1) {{__('phr.yogas')[1]}} @endif</td>
                                                 <td class="center"> {{$drug->churna_yoga_type_individual}}  </td>
                                                 <td class="center text-nowrap">{{ date('d-m-Y', strtotime($drug->date_of_yogas)) }}</td>
                                                 <td class="text-center">
                                                    <a href="{{ url('edit-drugs/'.encrypt($drug->id) ) }}" target="_blanck" target="_blanck" onclick="return confirm_option('edit')" class="btn edit btn-tbl-edit"> <i class="material-icons">edit
                                                    @if(isset($drug->drugHistory->drug_id))
                                                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle" title="Some changes"></span>
                                                    @endif
                                                    </i>
                                                    </a>
                                                    <a href="{{ url('view-drugs/'.encrypt($drug->id) ) }}" target="_blanck" target="_blanck" class="btn view btn-tbl-edit"><i class="material-icons">visibility</i>
                                                    </a>
                                                    <a  href="{{ url('delete-churnayogas/'.encrypt($drug->id)) }}" onclick="return confirm_option('delete')" class="btn btn-tbl-delete">
                                                     <i class="material-icons">delete_forever</i>
                                                     </a>
                                                 </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                @endif
                                @endif
                                @endisset


                                <!-- Rasa Yogas -->
                                @isset($drugslist)
                                @if(strlen($drugslist)>3)
                                @if($drugslist[0]->yoga_type==2)
                                <a style="float:right;">Total Records: {{ count($drugslist) }}</a><br>
                                <table class="table table-hover js-basic-example contact_list dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                       <tr role="row">
                                            <th class="center sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" No : activate to sort column descending"> S.No. </th>
                                            <th class="center sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" No : activate to sort column descending"> Yoga Type </th>

                                            <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Name : activate to sort column ascending">Yogas Name </th>

                                            <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Name : activate to sort column ascending">Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($drugslist as $key=>$drug)
                                            <tr class="gradeX odd ">
                                                 <td class="center sorting_1">{{ ++$key }}</td>

                                                 <td class="text-center">@if($drug->yoga_type==2) {{__('phr.yogas')[2]}} @endif</td>
                                                 <td class="center"> {{$drug->rasa_yoga_type_individual}}  </td>
                                                 <td class="text-center">
                                                    <a href="{{ url('edit-rasa-drugs/'.encrypt($drug->id) ) }}" target="_blanck" onclick="return confirm_option('edit')" class="btn edit btn-tbl-edit"> <i class="material-icons">edit
                                                        @if(isset($drug->drugHistory->rasa_id))
                                                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle" title="Some changes"></span>
                                                    @endif
                                                    </i>
                                                    </a>
                                                    <a href="{{ url('view-rasa-drugs/'.encrypt($drug->id) ) }}" target="_blanck" class="btn view btn-tbl-edit"><i class="material-icons">visibility</i>
                                                    </a>
                                                    <a  href="{{ url('delete-rasayogas/'.encrypt($drug->id)) }}" onclick="return confirm_option('delete')" class="btn btn-tbl-delete" onclick="return confirm_option('delete')">
                                                        <i class="material-icons">delete_forever</i>
                                                    </a>
                                                 </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                @endif
                                @endif
                                @endisset

                                <!-- vati yoga -->
                                @isset($drugslist)
                                @if(strlen($drugslist)>3)
                                @if($drugslist[0]->yoga_type==3)
                                <a style="float:right;">Total Records: {{ count($drugslist) }}</a><br>
                                <table class="table table-hover js-basic-example contact_list dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                       <tr role="row">
                                            <th class="center sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" No : activate to sort column descending"> S.No. </th>
                                            <th class="center sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" No : activate to sort column descending"> Yoga Type </th>

                                            <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Name : activate to sort column ascending">Yogas Name </th>

                                            <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Name : activate to sort column ascending">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($drugslist as $key=>$drug)
                                            <tr class="gradeX odd ">
                                                 <td class="center sorting_1">{{ ++$key }}</td>

                                                 <td class="text-center">@if($drug->yoga_type==3) {{__('phr.yogas')[3]}} @endif</td>
                                                 <td class="center"> {{$drug->vati_yoga_type_individual}}  </td>
                                                 <td class="text-center">
                                                    <a href="{{ url('edit-vati-drugs/'.encrypt($drug->id)) }}" 
                                                        target="_blanck" onclick="return confirm_option('edit')" class="btn edit btn-tbl-edit"> <i class="material-icons">edit
                                                        @if(isset($drug->drugHistory->vati_id))
                                                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle" title="Some changes"></span>
                                                    @endif
                                                    </i>
                                                    </a>

                                                    <a href="{{ url('view-vati-drugs/'.encrypt($drug->id) ) }}" target="_blanck" class="btn view btn-tbl-edit"><i class="material-icons">visibility</i>
                                                    </a>

                                                    <a  href="{{ url('delete-vatiyogas/'.encrypt($drug->id)) }}" onclick="return confirm_option('delete')" class="btn btn-tbl-delete" onclick="return confirm_option('delete')">
                                                        <i class="material-icons">delete_forever</i>
                                                    </a>

                                                 </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                @endif
                                @endif
                                @endisset



                                <!-- talia yoga -->
                                @isset($drugslist)
                                @if(strlen($drugslist)>3)
                                @if($drugslist[0]->yoga_type==4)
                                <a style="float:right;">Total Records: {{ count($drugslist) }}</a><br>
                                <table class="table table-hover js-basic-example contact_list dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                       <tr role="row">
                                            <th class="center sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" No : activate to sort column descending"> S.No. </th>
                                            <th class="center sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" No : activate to sort column descending"> Yoga Type </th>

                                            <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Name : activate to sort column ascending">Yogas Name </th>

                                            <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Name : activate to sort column ascending">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($drugslist as $key=>$drug)
                                            <tr class="gradeX odd ">
                                                 <td class="center sorting_1">{{ ++$key }}</td>

                                                 <td class="text-center">@if($drug->yoga_type==4) {{__('phr.yogas')[4]}} @endif</td>
                                                 <td class="center"> {{$drug->talia_yoga_type_individual}}  </td>
                                                 <td class="text-center">
                                                    <a href="{{ url('edit-talia-drugs/'.encrypt($drug->id)) }}" target="_blanck" onclick="return confirm_option('edit')" class="btn edit btn-tbl-edit"> <i class="material-icons">edit
                                                        @if(isset($drug->drugHistory->taila_id))
                                                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle" title="Some changes"></span>
                                                    @endif
                                                    </i>
                                                    </a>

                                                    <a href="{{ url('view-talia-drugs/'.encrypt($drug->id) ) }}" target="_blanck" class="btn view btn-tbl-edit"><i class="material-icons">visibility</i>
                                                    </a>

                                                    <a  href="{{ url('delete-taliayogas/'.encrypt($drug->id)) }}" onclick="return confirm_option('delete')" class="btn btn-tbl-delete" onclick="return confirm_option('delete')">
                                                        <i class="material-icons">delete_forever</i>
                                                    </a>

                                                 </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                @endif
                                @endif
                                @endisset



                                <!-- arishta yoga -->
                                @isset($drugslist)
                                @if(strlen($drugslist)>3)
                                @if($drugslist[0]->yoga_type==5)
                                <a style="float:right;">Total Records: {{ count($drugslist) }}</a><br>
                                <table class="table table-hover js-basic-example contact_list dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                       <tr role="row">
                                            <th class="center sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" No : activate to sort column descending"> S.No. </th>
                                            <th class="center sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" No : activate to sort column descending"> Yoga Type </th>

                                            <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Name : activate to sort column ascending">Yogas Name </th>

                                            <th class="center sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Name : activate to sort column ascending">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($drugslist as $key=>$drug)
                                            <tr class="gradeX odd ">
                                                 <td class="center sorting_1">{{ ++$key }}</td>

                                                 <td class="text-center">@if($drug->yoga_type==5) {{__('phr.yogas')[5]}} @endif</td>
                                                 <td class="center"> {{$drug->arishtayoga_type_individual}}  </td>
                                                 <td class="text-center">
                                                    <a href="{{ url('edit-arishta-drugs/'.encrypt($drug->id)) }}" target="_blanck" onclick="return confirm_option('edit')" class="btn edit btn-tbl-edit"> <i class="material-icons">edit
                                                        @if(isset($drug->drugHistory->aswa_id))
                                                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle" title="Some changes"></span>
                                                    @endif
                                                    </i>
                                                    </a>

                                                    <a href="{{ url('view-arishta-drugs/'.encrypt($drug->id) ) }}" target="_blanck" class="btn view btn-tbl-edit"><i class="material-icons">visibility</i>
                                                    </a>

                                                    <a  href="{{ url('delete-arishtayogas/'.encrypt($drug->id)) }}" onclick="return confirm_option('delete')" class="btn btn-tbl-delete" onclick="return confirm_option('delete')">
                                                        <i class="material-icons">delete_forever</i>
                                                    </a>

                                                 </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                @endif
                                @endif
                                @endisset

                                @isset($drugslist)
                                @if(strlen($drugslist)<3)
                                    <p class="text-center">No Records Found</p>
                                @endif
                                @endisset


                            </div>
                        </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
      </section>
@endsection

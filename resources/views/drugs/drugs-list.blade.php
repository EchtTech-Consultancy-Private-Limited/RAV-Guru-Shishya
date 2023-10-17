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
                             <h6 class="page-title"> Drug Details </h6>

                          </li>
                          <li class="breadcrumb-item bcrumb-1">
                            <a href="{{url('/dashboard')}}">
                             <i class="fas fa-home"></i> Home</a>
                          </li>

                          <li class="breadcrumb-item active">Drug Details </li>
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
               <div class="body">
                   <div id="wizard_horizontal1">

                        <div class="card">
                            <form role="form" method="get" action="{{ url('filter-drug-report') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Name of the Student</label>
                                                    <input type="text" name="student_name" class="form-control"  value="{{Auth::user()->firstname}}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label   class="form-control-label">Name of the Guru</label>
                                                    <input type="text" name="guru_name" class="form-control"  value="@if(Auth::user()->guru_id) {{$guru->firstname}} @endif" readonly>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-control-label">From:</label>
                                                    <input type="date" name="from_date" class="form-control datetimepicker flatpickr-input active" value="@if(request()->from_date){{date('Y-m-d',strtotime(request()->from_date))}}@endif" max="{{date('d-m-Y',time())}}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-control-label">To:</label>
                                                    <input type="date" name="to_date" class="form-control datetimepicker flatpickr-input active" value="@if(request()->to_date){{date('Y-m-d',strtotime(request()->to_date))}}@endif" max="{{date('d-m-Y',time())}}" required>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                               <div class="form-group">
                                                  <label
                                                     for="example-text-input"
                                                     class="form-control-label">Select Yogas<span
                                                     class="text-danger">*</span></label>
                                                  <select class="form-control" id="yogas_type" name="yogas_type" required>
                                                     <option value="">Please Select </option>
                                                     @foreach(__('phr.yogas') as $key=>$value)
                                                        @if($key == request()->yogas_type)
                                                            <option value="{{ $key }}" selected>{{ $value }}</option>
                                                        @endif
                                                     <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                  </select>
                                               </div>
                                            </div>
                                            <div class="col-md-6">
                                                <button  class="btn btn-primary btn-sm ms-auto nextBtn" type="submit" >Filter Drug Report</button>
                                                <a href="{{url('drug-report-history')}}"> <button type="button" class="btn btn-primary btn-sm ms-auto nextBtn">Reset</button></a>
                                                
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

                                                 <td class="text-center">@if($drug->yoga_type==1) {{__('phr.yogas')[1]}} @endif</td>
                                                 <td class="center"> {{$drug->churna_yoga_type_individual}}  </td>
                                                 <td class="text-center">
                                                    <a href="{{ url('edit-drugs/'.encrypt($drug->id) ) }}" class="btn btn-tbl-edit"> <i class="material-icons">edit</i>
                                                    </a>
                                                    <a href="{{ url('view-drugs/'.encrypt($drug->id) ) }}" class="btn btn-tbl-edit"><i class="material-icons">visibility</i>
                                                    </a>
                                                    <a  href="{{ url('delete-churnayogas/'.encrypt($drug->id)) }}" onclick="return confirm_option('delete')" class="btn btn-tbl-delete" onclick="return confirm_option('delete')">
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
                                                    <a href="{{ url('edit-rasa-drugs/'.encrypt($drug->id) ) }}" class="btn btn-tbl-edit"> <i class="material-icons">edit</i>
                                                    </a>
                                                    <a href="{{ url('view-rasa-drugs/'.encrypt($drug->id) ) }}" class="btn btn-tbl-edit"><i class="material-icons">visibility</i>
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
                                                    <a href="{{ url('edit-vati-drugs/'.encrypt($drug->id)) }}" class="btn btn-tbl-edit"> <i class="material-icons">edit</i>
                                                    </a>
                                                
                                                    <a href="{{ url('view-vati-drugs/'.encrypt($drug->id) ) }}" class="btn btn-tbl-edit"><i class="material-icons">visibility</i>
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
                                                    <a href="{{ url('edit-talia-drugs/'.encrypt($drug->id)) }}" class="btn btn-tbl-edit"> <i class="material-icons">edit</i>
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
                                                    <a href="{{ url('edit-arishta-drugs/'.encrypt($drug->id)) }}" class="btn btn-tbl-edit"> <i class="material-icons">edit</i>
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



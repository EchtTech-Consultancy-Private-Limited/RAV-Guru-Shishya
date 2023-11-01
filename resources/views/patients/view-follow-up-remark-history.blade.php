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
                            <h6 class="page-title"> Follow Up History (Remarks) </h6>

                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{url('/dashboard')}}">
                                <i class="fas fa-home"></i> Home</a>
                        </li>

                        <li class="breadcrumb-item active">Follow Up History </li>
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
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-hover js-basic-example" id="data_table">
                                            <thead>
                                                <tr>
                                                    <th class="center">S.No</th>
                                                    <th class="center"> Send By </th>
                                                    <th class="center"> Send To </th>
                                                    <th class="center"> Date </th>
                                                    <th class="center"> Remarks </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($remarks as $k=>$remark)
                                                <tr class="odd gradeX">
                                                    <td class="center">{{($k+1)}}</td>                                                 
                                                    <td class="center">@if($remark->send_by=='2')Guru
                                                        @elseif($remark->send_by=='3')Shishya
                                                        @elseif($remark->send_by=='1')Admin @endif</td>
                                                    <td class="center">@if($remark->send_to=='2')Guru
                                                        @elseif($remark->send_to=='3')Shishya
                                                        @elseif($remark->send_to=='1')Admin @endif</td>
                                                        <td class="center">
                                                        {{date('d-m-Y',strtotime($remark->created_at))}}
                                                    </td>
                                                    <td class="center">{{$remark->remarks}}</td>

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
                <a style="line-height:2;" type="button" class="btn back btn-secondary" href="{{ url('follow-up-patients') }}">Back To Follow Up Patients</a>
            </div>
        </div>
</section>
@endsection
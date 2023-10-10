@extends('layouts.app-file')
@section('content')
      <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Dashboard</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a >
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active">Dashboard </li>
                        </ul>
                    </div>
                </div>
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{session::get('success')}}
                </div>
                @elseif(Session::has('fail'))
                <div class="alert alert-danger" data-bs-dismiss="alert">
                    {{session::get('fail')}}
                </div>
                @endif
            </div>
            <div class="row ">
                <div class="col-xl-3 col-sm-6">
                    <div class="card l-bg-purple">
                        <div class="info-box-5 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa fa-india"></i></div>
                            <div class="mb-4">
                                <h5 class="font-20 mb-0">Total No. of Case Sheets</h5><br>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <div class="col-4 text-end">
                                        <h2 class="d-flex align-items-left mb-0">{{$patients}}</h2>
                                    </div>

                                </div>
                                

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card l-bg-blue-dark">
                        <div class="info-box-5 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-globe"></i></div>
                            <div class="mb-4">
                                <h5 class="font-20 mb-0">Total No. of Shishyas</h5><br>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                <div class="col-4 text-end">
                                    <h2 class="d-flex align-items-left mb-0">{{$shishya}}</h2>
                                </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card l-bg-green-dark">
                        <div class="info-box-5 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                            <div class="mb-4">
                                <h5 class="font-20 mb-0">Total Patients Discharge</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                <div class="col-4 text-end">
                                        <span class="span-width">&nbsp;</span>
                                        <h2 class="d-flex align-items-left mb-0">
                                        5,250
                                    </h2>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card l-bg-orange-dark">
                        <div class="info-box-5 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                            <div class="mb-4">
                                <h5 class="font-20 mb-0">Total Users</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                <div class="col-4 text-end">
                                        <span class="span-width">&nbsp;</span>
                                        <h2 class="d-flex align-items-left mb-0">{{$users}}</h2>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
@endsection
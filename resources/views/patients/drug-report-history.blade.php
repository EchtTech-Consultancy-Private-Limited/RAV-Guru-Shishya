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
                  <div id="wizard_horizontal">
                   
                     <h2>Drug Report History</h2>
                     <section>
                     
                        <div class="card">
                    <form role="form" method="POST" action='' enctype="multipart/form-data">
                        @csrf
                        
                        <div class="card-body">
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Name of the Student</label>
                                        <input type="text" name="student_name" class="form-control" placeholder="Name of the Student" aria-label="Name" value="{{ old('student_name') }}" >@error('firstname') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Name of the Guru</label>
                                        <input type="text" name="guru_name" class="form-control" placeholder="Name of the Guru" aria-label="Name" value="{{ old('guru_name') }}" >
                                        @error('lastname') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Drug Report History (with month name)</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">From:</label>
                                        <input type="date" name="student_name" class="form-control" placeholder="Date" aria-label="Name" value="{{ old('student_name') }}" >@error('firstname') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror

                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">To:</label>
                                        <input type="date" name="student_name" class="form-control" placeholder="Date" aria-label="Name" value="{{ old('student_name') }}" >@error('firstname') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                </div>
                        </div>
                       
                     
                                

                        <div
                                                                class="row">
                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Student's
                                                                            E-Sign</label>
                                                                            @if(Auth::user()->e_sign!='')
                                                                              <img src="{{ asset('uploads/'.Auth::user()->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                                                             @endif
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="col-md-6">
                                                                    <div
                                                                        class="form-group">
                                                                        <label
                                                                            for="example-text-input"
                                                                            class="form-control-label">Guru's
                                                                            E-Sign</label>
                                                                            @if($guru->e_sign!='')
                                                                              <img src="{{ asset('uploads/'.$guru->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                                                             @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                    <button class="btn filter btn-primary btn-sm ms-auto nextBtn" type="button" >Filter</button>
                        </div>   
                             
                    </form>
                </div>

                <div class="card">
                    <form role="form" method="POST" action='' enctype="multipart/form-data">
                        @csrf
                       
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">INDEX</label>
                                    </div>
                                </div>
                               
                            <br>
                            <div class="row" style="overflow-x:auto;">
                            <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col" style="border:
                                                                        1px solid
                                                                        grey">SN.</th>
                                                                    <th scope="col" style="border:
                                                                        1px solid
                                                                        grey">Date</th>
                                                                    <th scope="col" style="border:
                                                                        1px solid
                                                                        grey">Name of Drug/Medicine</th>
                                                                    <th scope="col" style="border:
                                                                        1px solid
                                                                        grey">Dose</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row" style="border:
                                                                        1px solid
                                                                        grey">1</th>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" style="border:
                                                                        1px solid
                                                                        grey">2</th>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" style="border:
                                                                        1px solid
                                                                        grey">3</th>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                    <td style="border:
                                                                        1px solid
                                                                        grey"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        </div>

                                                       
                        </div>

                        
                    </form>
                </div>
                    
                     </section>
                    
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>      
@endsection
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
      <div class="row clearfix">
         <div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">
            <ul class="breadcrumb breadcrumb-style ">
               <li class="breadcrumb-item">
                  <h6 class="page-title"> Follow Up Sheet</h6>
               </li>
               <li class="breadcrumb-item bcrumb-1">
                  <a href="{{url('/dashboard')}}">
                  <i class="fas fa-home"></i> Home  </a>
               </li>
               <li class="breadcrumb-item bcrumb-1">
                  <a href="{{url('/follow-up-patients')}}">
                  <i class="breadcrumb-item bcrumb-1"></i> Follow up Patient</a>
               </li>
               <li class="breadcrumb-item active"> Follow Up Sheet  </li>
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
      <div class="col-lg-12 col-sm-12 col-sm-12 col-xs-12">
         <div class="card">
            <div class="header">
            <h2><strong>Follow Up</strong> Sheet
               <ul style="float:right; margin-top:30px;">
                  <li style="float:left;clear:none; margin:10px;">From:
                        </li><li style="float:left;clear:none; margin:10px;font-weight:normal;"> 
                           @if(request()->fdate){{date('Y-m-d',strtotime(request()->fdate))}}@endif
                        </li><li style="float:left;clear:none; margin:10px;"> 
                           TO:
                           </li><li style="float:left;clear:none; margin:10px;font-weight:normal;"> 
                           @if(request()->tdate){{date('Y-m-d',strtotime(request()->tdate))}}@endif
                           </li>
                     </ul>
         </h2>

               <ul class="header-dropdown m-r--5">
                  <li class="dropdown">
                     <a href="#" onClick="return false;"
                        class="dropdown-toggle"
                        data-bs-toggle="dropdown"
                        role="button" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="material-icons">more_vert</i>
                     </a>
                     <ul class="dropdown-menu float-start">
                        <li>
                           <a href="#" onClick="window.print();">Print</a>
                        </li>
                       
                     </ul>
                  </li>
               </ul>
            </div>
            <div class="body">
               <div id="wizard_horizontal">
                  <section>
                     <div class="col-sm-12">
                        <div class="card">
                           
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example" id="data_table1">
                                    <thead>
                                        <tr>
                                            <th class="center"></th>
                                            <th class="center">S.No.</th>
                                            <th class="center"> Registration No. </th>
                                            <th class="center"> Date </th>
                                            <th class="center"> Progress Duration </th>
                                            <th class="center" style="display:none"> Progress </th>
                                            <th class="center"  style="display:none"> Treatment/Therapies </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $k=>$followup)
                                        <tr class="odd gradeX">
                                            <td class="center"></td>
                                            <td class="center">{{($k+1)}}</td>
                                            <td class="center">{{$followup->registration_no}}</td>
                                            <td class="center">{{date('d-m-Y',strtotime($followup->follow_up_date))}}</td>
                                            <td class="center">{{$followup->report_type}}</td>
                                            <td class="center"  style="display:none">{{$followup->progress}}</td>
                                            <td class="center"  style="display:none">{{$followup->treatment}}</td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </div>

                            


                        </div>
                    </div>
                    
                        <div class="card-body">

                           

                              <div calss="row" >
                                <div class="col-sm-12 follow_up">
                                <span >Patient History Sheet </span>
                                <i class="fa fa-plus fa-x" style="float:right;clear:none;"></i>
                                </div>
                            </div>
                            <div class="card-body2" style="display:none;">

                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Name of the Guru<span
                                             class="text-danger">*</span></label><br>
                                          @if(!empty($guru->id))
                                         <label
                                         for="example-text-input"
                                         class="form-control-label"><b>{{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname}}</b></label>
                                         @endif
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Place of the Guru</label><br>
                                          @if(!empty($guru->id))
                                          <label
                                             for="example-text-input"
                                             class="form-control-label"><b>{{$guru->address}}<b></label>
                                          @endif
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Name of the Shishya<span
                                             class="text-danger">*</span></label><br>
                                         <label
                                         for="example-text-input"
                                         class="form-control-label"><b>{{Auth::user()->firstname.' '.Auth::user()->middlename.' '.Auth::user()->lastname}}</b></label>
                                          
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Date of Report</label><br>
                                          <label
                                             for="example-text-input"
                                             class="form-control-label"><b>{{date('d-m-Y',strtotime($patient->date_of_report))}}<b></label>
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <hr
                                    style="height:2px;">
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Name of the Patient<span
                                             class="text-danger">*</span></label>
                                             <br><label  for="example-text-input" class="form-control-label"><strong>{{$patient->patient_name}}</strong></label>
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Registration No<span
                                             class="text-danger">*</span></label>
                                             <br><label  for="example-text-input" class="form-control-label"><strong>{{$patient->registration_no}}</strong></label>
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Age<span
                                             class="text-danger">*</span></label>
                                             <br><label  for="example-text-input" class="form-control-label"><strong>{{$patient->age}} Yrs.</strong></label>
                                          
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Registration Date</label>
                                             <br><label  for="example-text-input" class="form-control-label"><strong>{{date('d-m-Y',strtotime($patient->registration_date))}}</strong></label>
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Gender"
                                             class="form-control-label">Gender<span
                                             class="text-danger">*</span></label>
                                             <br><label  for="example-text-input" class="form-control-label"><strong>
                                             @foreach(__('phr.gender') as $key=>$value)
                                             {{$patient->gender == $key  ? $value : ''}}</option>
                                            @endforeach
                                            </strong></label>
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Age Group<span
                                             class="text-danger">*</span></label>
                                             <br><label  for="example-text-input" class="form-control-label"><strong>
                                             @foreach(__('phr.age_group') as $key=>$value)
                                             {{$patient->age_group == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Occupation<span
                                             class="text-danger">*</span></label>
                                             <br><label  for="example-text-input" class="form-control-label"><strong>
                                             @foreach(__('phr.occupation') as $key=>$value)
                                             {{$patient->occupation == $key  ? $value : ''}}</option>
                                            @endforeach
                                            </strong></label>
                                          
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Marital Status<span
                                             class="text-danger">*</span></label>
                                             <br><label  for="example-text-input" class="form-control-label"><strong>
                                             @foreach(__('phr.marital_status') as $key=>$value)
                                                {{$patient->marital_status == $key  ? $value : ''}}</option>
                                             @endforeach
                                             </strong></label>
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Aasan Sidhi</label>
                                             <br><label  for="example-text-input" class="form-control-label"><strong>{{$patient->aasan_sidhi}}</strong></label>
                                          
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Season</label>
                                             <br><label  for="example-text-input" class="form-control-label"><strong>{{$patient->season}}</strong></label>
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-in
                                             put"
                                             class="form-control-label">Region of patient</label>
                                             <br><label  for="example-text-input" class="form-control-label"><strong>
                                             @foreach(__('phr.region_of_patient') as $key=>$value)
                                                {{$patient->region_of_patient == $key  ? $value : ''}}</option>
                                             @endforeach
                                             </strong></label>

                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Address<span
                                             class="text-danger">*</span></label>
                                             <br><label  for="example-text-input" class="form-control-label"><strong>{{$patient->address}}</strong></label>
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">1. Main Complaint(As said by patient)</label>
                                             <br><label  for="example-text-input" class="form-control-label"><strong>{{$patient->main_complaintsaid_by_patient}}</strong></label>
                                        </div>
                                    </div>
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Duration</label>
                                             <br><label  for="example-text-input" class="form-control-label"><strong>{{$patient->said_by_patient_duration}}</strong></label>
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">2. Main Complaint(As said by family member)</label>
                                             <br><label  for="example-text-input" class="form-control-label"><strong>{{$patient->main_complaint_as_said_by_family}}</strong></label>
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Duration</label>
                                             <br><label  for="example-text-input" class="form-control-label"><strong>{{$patient->complaint_as_said_by_family_duration}}</strong></label>
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">3. Past illness</label>
                                             <br><label  for="example-text-input" class="form-control-label"><strong>{{$patient->past_illness}}</strong></label>
                                          
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">4.
                                          Family
                                          History</label>
                                          <br><label  for="example-text-input" class="form-control-label"><strong>{{$patient->family_history}}</strong></label>
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-12">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">5.
                                          Examination
                                          of
                                          the
                                          patient</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label for="Skin">1) Skin</label>
                                          <br><label  for="example-text-input" class="form-control-label"><strong>
                                             @foreach(__('phr.skin') as $key=>$value)
                                             {{$patient->skin == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Nadi">2)
                                          Nadi</label>
                                          <br><label  for="example-text-input" class="form-control-label"><strong>
                                             @foreach(__('phr.nadi') as $key=>$value)
                                             {{$patient->nadi == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Place">Place</label>
                                             <br><label  for="example-text-input" class="form-control-label"><strong>
                                             @foreach(__('phr.place') as $key=>$value)
                                             {{$patient->nadi_place == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                         
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Nails">3)
                                          Nails</label>
                                          <br><label  for="example-text-input" class="form-control-label"><strong>
                                             @foreach(__('phr.nails') as $key=>$value)
                                             {{$patient->nails == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                         
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Nails">4)
                                          Anguli
                                          sandhi</label>
                                          <br><label  for="example-text-input" class="form-control-label"><strong>
                                             @foreach(__('phr.anguli_sandhi') as $key=>$value)
                                             {{$patient->anguli_sandhi == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                         
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Netra">5)
                                          Netra</label>
                                          <br><label  for="example-text-input" class="form-control-label"><strong>
                                             @foreach(__('phr.netra') as $key=>$value)
                                             {{$patient->netra == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                         
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Adhovartma">6)
                                          Adhovartma</label>
                                          <br><label  for="example-text-input" class="form-control-label"><strong>
                                             @foreach(__('phr.adhovartma') as $key=>$value)
                                             {{$patient->adhovartma == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                          
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Hastatala">7)
                                          Hastatala</label>
                                          <br><label  for="example-hastatala-input" class="form-control-label"><strong>
                                             @foreach(__('phr.adhovartma') as $key=>$value)
                                             {{$patient->hastatala == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                         
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Jihwa">8)
                                          Jihwa</label>
                                          <br><label  for="example-hastatala-input" class="form-control-label"><strong>
                                             @foreach(__('phr.jihwa') as $key=>$value)
                                             {{$patient->jihwa == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                          
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Aakriti">9)
                                          Aakriti</label>
                                          <br><label  for="example-hastatala-input" class="form-control-label"><strong>
                                             @foreach(__('phr.aakriti') as $key=>$value)
                                             {{$patient->aakriti == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                          
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Shabda">10)
                                          Shabda</label>
                                          <br><label  for="example-hastatala-input" class="form-control-label"><strong>
                                             @foreach(__('phr.shabda') as $key=>$value)
                                             {{$patient->shabda == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                         
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Koshtha">11)
                                          Koshtha</label>
                                          <br><label  for="example-hastatala-input" class="form-control-label"><strong>
                                             @foreach(__('phr.koshtha') as $key=>$value)
                                             {{$patient->koshtha == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Agni">12)
                                          Agni</label>
                                          <br><label  for="example-hastatala-input" class="form-control-label"><strong>
                                             @foreach(__('phr.agni') as $key=>$value)
                                             {{$patient->agni == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                         
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Mala
                                             Pravritti">13)
                                          Mala
                                          Pravritti</label>
                                          <br><label  for="example-hastatala-input" class="form-control-label"><strong>
                                             @foreach(__('phr.mala_pravritti') as $key=>$value)
                                             {{$patient->mala_pravritti == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                         
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Mutra
                                             Pravritti">14)
                                          Mutra
                                          Pravritti</label>
                                          <br><label  for="example-hastatala-input" class="form-control-label"><strong>
                                             @foreach(__('phr.mutra_pravritti') as $key=>$value)
                                             {{$patient->mutra_pravritti == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                         
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Vyavay
                                             Pravritti">15)
                                          Vyavay
                                          Pravritti</label>
                                          <br><label  for="example-hastatala-input" class="form-control-label"><strong>
                                             @foreach(__('phr.vyavay_pravritti') as $key=>$value)
                                             {{$patient->vyavay_pravritti == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Shukrakshanapravritti">Shukrakshana
                                          pravritti</label>
                                          <br><label  for="example-hastatala-input" class="form-control-label"><strong>
                                             @foreach(__('phr.shukrakshana_pravritti') as $key=>$value)
                                             {{$patient->shukrakshana_pravritti == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                          
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Aartava
                                             Pravritti
                                             Kala">16)
                                          Aartava
                                          Pravritti
                                          Kala</label>
                                          <br><label  for="example-hastatala-input" class="form-control-label"><strong>
                                             @foreach(__('phr.aartava_pravratti_kala') as $key=>$value)
                                             {{$patient->aartava_pravratti_kala == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                          
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Dehoshma">17)
                                          Dehoshma</label>
                                          <br><label  for="example-hastatala-input" class="form-control-label"><strong>
                                             @foreach(__('phr.dehoshma') as $key=>$value)
                                             {{$patient->dehoshma == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                          
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Bhara">18)
                                          Bhara</label>
                                          <br><label  for="example-text-input" class="form-control-label"><strong>{{$patient->bhara}}</strong></label>
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Raktachapa">19)
                                          Raktachapa</label>
                                          <br><label  for="example-hastatala-input" class="form-control-label"><strong>
                                             @foreach(__('phr.raktachapa') as $key=>$value)
                                             {{$patient->raktachapa == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                          
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Hrid
                                             gati">20)
                                          Hrid
                                          gati</label>
                                          <br><label  for="example-hastatala-input" class="form-control-label"><strong>
                                             @foreach(__('phr.hrid_gati') as $key=>$value)
                                             {{$patient->hrid_gati == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                          
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="Shvasagati">21)
                                          Shvasagati</label>
                                          <br><label  for="example-hastatala-input" class="form-control-label"><strong>
                                             @foreach(__('phr.shvasagati') as $key=>$value)
                                             {{$patient->shvasagati == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                          
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-3">
                                       <div
                                          class="form-group">
                                          <label
                                             for="parkriti_parikshana">22)
                                          Parkriti
                                          Parikshana</label>
                                          <br><label  for="example-hastatala-input" class="form-control-label"><strong>
                                             @foreach(__('phr.parkriti_parikshana') as $key=>$value)
                                             {{$patient->parkriti_parikshana == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">6.
                                          Examination
                                          by
                                          Physician</label>
                                          <br><label  for="example-hastatala-input" class="form-control-label"><strong>
                                             @foreach(__('phr.examination_by_physician') as $key=>$value)
                                             {{$patient->examination_by_physician == $key  ? $value : ''}}
                                            @endforeach
                                            </strong></label>
                                          
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">7.
                                          Prayogashaliya
                                          Parikshana</label>
                                          <br><label  for="example-text-input" class="form-control-label"><strong>{{$patient->prayogashaliya_parikshana}}</strong></label>
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">8.
                                          Samprapti
                                          Vivarana</label>
                                          <br><label  for="example-text-input" class="form-control-label"><strong>{{$patient->samprapti_vivarana}}</strong></label>
                                          
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">9.
                                          Vibhedaka
                                          Pariksha</label>
                                          <br><label  for="example-text-input" class="form-control-label"><strong>{{$patient->vibhedaka_pariksha}}</strong></label>
                                         
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">10.
                                          Roga
                                          Vinishchaya-
                                          Pramukh
                                          Nidana</label>
                                          <br><label  for="example-text-input" class="form-control-label"><strong>{{$patient->roga_vinishchaya_pramukh_nidana}}</strong></label>
                                         
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-4">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">11.
                                          Chikitsa
                                          Kalpana
                                          Anupana
                                          Sahita</label>
                                          <br><label  for="example-text-input" class="form-control-label"><strong>{{$patient->chikitsa_kalpana_anupana_sahita}}</strong></label>
                                         
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-4">
                                       <div
                                          class="form-group">
                                          <label
                                             for="samshodhana_kriyas"
                                             class="form-control-label">Samshodhana
                                          Kriyas</label>
                                          <br><label  for="example-text-input" class="form-control-label"><strong>{{$patient->samshodhana_kriyas}}</strong></label>
                                          
                                       </div>
                                    </div>
                                    <div
                                       class="col-sm-4">
                                       <div
                                          class="form-group">
                                          <label
                                             for="samshamana_kriyas"
                                             class="form-control-label">Samshamana
                                          Kriyas</label>
                                          <br><label  for="example-text-input" class="form-control-label"><strong>{{$patient->samshamana_kriyas}}</strong></label>
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">12.
                                          Pathya-Apathya
                                          (<a href="{{url('/annexure-file.pdf')}}" target="_blank" ><span class="fs-12 text-info">Annexure-1</span></a>)</label>
                                             <br><label  for="example-text-input" class="form-control-label"><strong>{{$patient->pathya_apathya}}</strong></label>
                                         
                                       </div>
                                    </div>
                                 </div>
                                 
                              </div>


                              

  
                           </div>

                               
                     
                        </div>

                        <div
                                    class="row clearfix">
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Student's
                                          E-Sign</label><br>
                                          @if(!empty($shishya->id))
                                          @if($shishya->e_sign!='')
                                          <img src="{{ asset('uploads/'.$shishya->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                          @endif
                                          <br>
                                             (@if($shishya->title>0) {{__('phr.titlename')[$shishya->title]}} @endif {{$shishya->firstname.' '.$shishya->middelname.' '.$shishya->lastname}})
                                          @endif
                                        </div>
                                    </div>
                                    <div
                                       class="col-sm-6">
                                       <div
                                          class="form-group">
                                          <label
                                             for="example-text-input"
                                             class="form-control-label">Guru's
                                          E-Sign</label><br>
                                          @if(!empty($guru->id))
                                          @if($guru->e_sign!='')
                                          <img src="{{ asset('uploads/'.$guru->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                          @endif
                                          <br>
                                             (@if($guru->title>0) {{__('phr.titlename')[$guru->title]}} @endif {{$guru->firstname.' '.$guru->middelname.' '.$guru->lastname}})
                                          @endif
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <form role="form" method="POST" action="{{ url('/send-follow-up-sheet') }}">
                                    @csrf
                                 <div class="col-sm-12 p-t-20 text-left">
                                 
                                 <a href="{{ url('/follow-up-patients') }}"><button type="button"  class="btn btn-danger waves-effect"> &nbsp; Back  &nbsp;</button></a>
                                 @foreach($data as $k=>$followup)
                                    <input type="hidden" value="{{$followup->id}}" name="followup_ids[]">
                                 @endforeach
                                    <input type="hidden" value="@if(request()->patientid){{request()->patientid}}@endif" name="patientid">
                                    <input type="hidden" value="@if(request()->fdate){{request()->fdate}}@endif" name="fdate">
                                    <input type="hidden" value="@if(request()->tdate){{request()->tdate}}@endif" name="tdate">
                                    <input type="hidden" value="@if(request()->rtype){{request()->rtype}}@endif" name="rtype">
                                    @if(Auth::user()->user_type==3)
                                       <button type="submit"  class="btn btn-primary waves-effect" onclick="return confirm_option('Send selected followup list to Guru');"> &nbsp; Send To Guru  &nbsp;</button>
                                    @elseif(Auth::user()->user_type==2)
                                       <button type="submit"  class="btn btn-primary waves-effect" onclick="return confirm_option('Send selected followup list to Admin');"> &nbsp; Send To Admin  &nbsp;</button>
                                    @endif
                                
                              </div>
                              </form>
                              
                        </div>

                     </div>
                  </section>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<script>
   $('#checkall').on('click',function(){
        if(this.checked){
            $('.form-check-input').each(function(){
                this.checked = true;
            });
        }else{
             $('.form-check-input').each(function(){
                this.checked = false;
            });
        }
    });

    $('.form-check-input').on('click',function(){
        if($('.form-check-input:checked').length == $('.form-check-input').length){
            $('#checkall').prop('checked',true);
        }else{
            $('#checkall').prop('checked',false);
        }
    });

    function confirm_option(action){
      if(!confirm("Are you sure to "+action+"!")){
         return false;
      }

      return true;
 
   }
$(document).ready(function(){
   

  $(".follow_up").click(function(){
    $(".card-body2").slideToggle();
  });
  $(".remarks").click(function(){
    $(".card-body3").slideToggle();
  });
});

</script>
@endsection
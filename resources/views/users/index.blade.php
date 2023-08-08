@extends('layouts.app-file')
@section('content')
>
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
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">

<section class="content">
   <div class="container-fluid">
      <div class="block-header">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  
               <ul class="breadcrumb breadcrumb-style ">
                  <li class="breadcrumb-item">
                     <h6 class="page-title"> All @if(request()->path()=="users") Guru @elseif(request()->path()=="shishya-list") Shishya @elseif(request()->path()=="rav-admin") Admin @endif
                     </h6>
                     
                  </li>
                  <li class="breadcrumb-item bcrumb-1">
                     <a  href="{{url('/dashboard')}}">
                     <i class="fas fa-home"></i> Home</a>
                  </li>
                  
                  <li class="breadcrumb-item active">  @if(request()->path()=="users") Guru @elseif(request()->path()=="shishya-list") Shishya @elseif(request()->path()=="rav-admin") Admin @endif</li>
               </ul>
            </div>
         </div>
      </div>
      @if ($message = Session::get('success'))
         <div class="alert alert-success">
            <p>{{ $message }}</p>
         </div>
      @endif
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
               <div class="header">
                  <h2>
                     
                    @if(Auth::user()->user_type==1)
                    <span style="float:right;" >
                        <form action="{{ route('users.create') }}" method="get">
                           <input type="hidden" name="add_user_btn" value="@if(request()->path()=='rav-admin') {{$user_type_array['Admin']}} @elseif(request()->path()=='users') {{$user_type_array['Guru']}} @elseif(request()->path()=='shishya-list') {{$user_type_array['Shishya']}} @endif">

                           <input type="submit" value="+ Add @if(request()->path()=='users') Guru @elseif(request()->path()=='shishya-list') Shishya @elseif(request()->path()=='rav-admin') Admin @endif" class="btn btn-primary" style="padding:10px !important;">
                        </form>
                     </span>
                    
                    @endif
                     
                  </h2>
                  
               </div>
               <div class="body">
                  <div class="table-responsive">
                     <table class="table table-hover js-basic-example contact_list">
                        <thead>
                           <tr>
                              
                              <th class="center"> No </th>
                              <th class="center"> Registration No. </th>
                              <th class="center"> Name </th>
                              <th class="center"> Email </th>
                              <th class="center"> User Type </th>
                              <th class="center">Created Date </th>
                              <th class="center"> Status </th>
                              <th class="center"> Action </th>
                           </tr>
                        </thead>
                        <tbody>
                           @if(count($data)>0)
                              @foreach ($data as $key => $user)
                              <tr class="odd gradeX">
                                 <td class="center">{{ ++$i }}</td>
                                 <td class="center">{{@format_user_id($user->user_type,$user->id,$user->created_at)}}</td>
                                 <td class="center">{{ $user->firstname }}</td>
                                 <td class="center">{{ $user->email }}</td>
                                 <td class="center">
                                    

                                    @if($user->user_type==1)

                                    {{__('phr.user_type')[1]}} 

                                    @elseif($user->user_type==2)

                                    {{__('phr.user_type')[2]}} 

                                    @elseif($user->user_type==3)
                                    {{__('phr.user_type')[3]}} 
                                    @endif
                                 </td> 
                                 <td class="text-center">
                                    {{ date('d-m-Y', strtotime($user->created_at)) }}
                                 </td>
                                 <td class="text-center">
                                 @if(Auth::user()->user_type=='1')
                                 <a href="{{ url('active-users/'.encrypt($user->id)) }}" class="@if($user->status==0) btn-tbl-disable @elseif($user->status==1) btn-tbl-edit @endif"   onclick="return confirm_option('change status')" title="Verify Users">
                                       <i class="fas fa-ban"></i>
                                    </a>
                                 @else
                                 <a href="javascript:void(0);" class="@if($user->status==0) btn-tbl-disable @elseif($user->status==1) btn-tbl-edit @endif" title="Status">
                                       <i class="fas fa-ban"></i>
                                    </a>
                                 @endif
                                 </td>
                                 <td class="center">
                                    <!-- <a class="btn btn-primary btn-sm" href="#"><i style="line-height:1.5 !important;" class="fa fa-pencil-square-o" aria-hidden="true"></i></a> -->

                                    <a href="{{ route('users.edit',encrypt($user->id)) }}" class="btn btn-tbl-edit" @if(Auth::user()->user_type=='1') title="Edit" @else  title="View" @endif onclick="return confirm_option('edit history sheet')">
                                       <i class="material-icons">edit</i>
                                    </a>
                                    @if(Auth::user()->user_type=='2')
                                    <a  href="{{ url('/new-patient-registration') }}" class="btn btn-tbl-delete"  title="Daily History SHeet" >
                                       <i class="material-icons">PHR</i>
                                    </a>
                                    @endif
                                    @if(Auth::user()->user_type=='1')
                                    <a  href="{{ url('delete-user/'.encrypt($user->id)) }}" class="btn btn-tbl-delete" onclick="return confirm_option('delete')">
                                       <i class="material-icons">delete_forever</i>
                                    </a>
                                    @endif
                                    <!-- <a class="btn btn-danger btn-sm" href="{{ url('delete-user/'.$user->id) }}" onclick="delete_user()"><i class="fa fa-trash" aria-hidden="true" style="line-height:1.5 !important;" ></i></a> -->

                                    <a class="btn btn-tbl-edit" href="{{ url('assign-role/'.$user->id) }}"  title="Assign user permissions"> <i class="icons-key">&nbsp&nbsp&nbsp&nbsp</i></a>
                                    
                                    @if(Auth::user()->user_type==1)
                                    <!-- <input class='input-switch' type="checkbox" id="demo"/>
                                       <label class="label-switch" for="demo"></label>
                                       <span class="info-text"></span> -->
                                    @endif
                                 
                                 </td>
                                 
                              </tr>
                              @endforeach
                           @else
                           <tr><td colspan="6">No data found!</td></tr>
                           @endif
                           
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

</div>


<script src="{{ asset('assets/js/custom/users.js') }}"></script>

<script>
   function confirm_option(action){
      if(!confirm("Are you sure to "+action+", this record!")){
         return false;
      }

      return true;
 
   }
</script>
@endsection
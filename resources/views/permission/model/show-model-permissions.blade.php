@extends('layouts.app-file')
@section('content')



<section class="content">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <p> Permission Granted Successfully</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>

                        @endif
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
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Add User Permissions</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a>
                            <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="#" onClick="return false;">Permissions</a>
                        </li>
                        <li class="breadcrumb-item active">Add Permissions</li>
                    </ul>
                </div>
                </div>
            </div>
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                    <div class="body">
                        <!-- New Table Code -->
                        <div id="success-box" style="display:none;" >
                            <div class="card-body">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p class="mb-0" id="permission_added"></p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                            </div>
                            <div id="danger-box" style="display:none;">
                            <div class="card-body">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <p class="mb-0" id="permission_removed"></p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>

                            </div>
                            </div>
                        <div class="table-responsive">
                            <table class="table table-hover  contact_list">
                                <p style="color:red;padding:10px;">Note: Submenu are not allowed without main menus</p>
                                <span style="float:right;padding:10px;">Username: @if($user){{ $user->firstname }} @endif <span>
                            <thead>
                                <tr>
                                    <th> Model Name</th>
                                    <th>
                                        <input type="checkbox" 
                                               attr-data="{{ $user->user_type == 1 ? 'Admin' : ($user->user_type == 2 ? 'Guru' : ($user->user_type == 3 ? 'Shishya' : '')) }}"
                                               id="addall" @if(@$allSelected->add==1) checked @endif attr-userId="{{$user->id}}"
                                        >Add
                                    </th>
                                     
                                    <th><input type="checkbox" id="editall" @if(@$allSelected->edit==2) checked @endif  onclick="umltiple_permission(this,'{{$user->id}}','2','edit')"> Edit/Update</th>
                                    <th><input type="checkbox" id="viewall" @if(@$allSelected->view==3) checked @endif onclick="umltiple_permission(this,'{{$user->id}}','3','view')"> View</th>
                                    <th><input type="checkbox" id="deleteall" @if(@$allSelected->delete==4) checked @endif onclick="umltiple_permission(this,'{{$user->id}}','4','delete')"> Delete</th>
                                </tr>
                            </thead>                                
                                <tbody>
                                    @foreach(showModelPermission($user->user_type) as  $key=>$models)
                                        <tr>
                                            <td> {{$models->name}}</td>

                                            <td>
                                                @php $check='0'; @endphp
                                                @foreach($permission as $per)
                                                @if($per->add==1 && $per->model_id==$models->id)
                                                    @php $check='1'; @endphp @break;
                                                @endif
                                                @endforeach
                                                <input type="checkbox" name="add_checkbox_field[]" value="1" @if($check==1) checked @endif onclick="add_permission(this,'{{$models->id}}','{{$user->id}}','1','add')" class="add" >

                                                <input type="hidden" name="model_id[]" id="model_id"  value="{{ $models->id }}">
                                                <input type="hidden" name="user_id[]" value="{{ $user->id }}">
                                            </td>

                                            <td>
                                                @php $editcheck='0'; @endphp
                                                @foreach($editpermission as $per)
                                                @if($per->edit==2 && $per->model_id==$models->id)
                                                    @php $editcheck='2'; @endphp @break;
                                                @endif
                                                @endforeach
                                                <input type="checkbox" name="edit_checkbox_field[]" value="2" class="edit" @if($editcheck==2) checked @endif onclick="add_permission(this,'{{$models->id}}','{{$user->id}}','2','edit')">


                                            </td>

                                            <td>
                                                @php $viewcheck='0'; @endphp
                                                @foreach($viewpermission as $per)
                                                @if($per->view==3 && $per->model_id==$models->id)
                                                    @php $viewcheck='3'; @endphp @break;
                                                @endif
                                                @endforeach
                                                <input type="checkbox" name="view_checkbox_field[]" value="3" class="view" @if($viewcheck==3) checked @endif onclick="add_permission(this,'{{$models->id}}','{{$user->id}}','3','view')">


                                            </td>
                                            <td>
                                                @php $dltcheck='0'; @endphp
                                                @foreach($dltpermission as $per)
                                                @if($per->delete==4 && $per->model_id==$models->id)
                                                    @php $dltcheck='4'; @endphp @break;
                                                @endif
                                                @endforeach
                                                <input type="checkbox" name="dlt_checkbox_field" value="4" class="delete" @if($dltcheck==4) checked @endif onclick="add_permission(this,'{{$models->id}}','{{$user->id}}','4','delete')"></td>
                                        </tr>
                                        {{-- @if(count(main_child($models->id)) > 0 )
                                            @foreach(main_child($models->id) as  $model)
                                            <tr>
                                                <td> 
                                                    {{$model->name}} @if($model->user_type==1) ( Admin ) @elseif($model->user_type==2) ( Guru ) @elseif($model->user_type==3) ( Shishya ) @endif
                                                </td>
                                                <td>
                                                    @php $check='0'; @endphp
                                                    @foreach($permission as $per)
                                                    @if($per->permission_id==1 && $per->model_id==$model->id)
                                                        @php $check='1'; @endphp @break;
                                                    @endif
                                                    @endforeach
                                                    <input type="checkbox" name="add_checkbox_field[]" value="1" @if($check==1) checked @endif onclick="add_permission(this,'{{$model->id}}','{{$user->id}}','1')" class="add" >

                                                    <input type="hidden" name="model_id[]" id="model_id"  value="{{ $model->id }}">
                                                    <input type="hidden" name="user_id[]" value="{{ $user->id }}">
                                                </td>
                                                <td>
                                                    @php $editcheck='0'; @endphp
                                                    @foreach($editpermission as $per)
                                                    @if($per->permission_id==2 && $per->model_id==$model->id)
                                                        @php $editcheck='1'; @endphp @break;
                                                    @endif
                                                    @endforeach
                                                    <input type="checkbox" name="edit_checkbox_field[]" value="2" class="edit" @if($editcheck==1) checked @endif onclick="add_permission(this,'{{$model->id}}','{{$user->id}}','2')">
                                                </td>
                                                <td>
                                                    @php $viewcheck='0'; @endphp
                                                    @foreach($viewpermission as $per)
                                                    @if($per->permission_id==3 && $per->model_id==$model->id)
                                                        @php $viewcheck='1'; @endphp @break;
                                                    @endif
                                                    @endforeach
                                                    <input type="checkbox" name="view_checkbox_field[]" value="3" class="view" @if($viewcheck==1) checked @endif onclick="add_permission(this,'{{$model->id}}','{{$user->id}}','3')">
                                                </td>
                                                <td>
                                                    @php $dltcheck='0'; @endphp
                                                    @foreach($dltpermission as $per)
                                                    @if($per->permission_id==4 && $per->model_id==$model->id)
                                                        @php $dltcheck='1'; @endphp @break;
                                                    @endif
                                                    @endforeach
                                                    <input type="checkbox" name="dlt_checkbox_field" value="4" class="delete" @if($dltcheck==1) checked @endif onclick="add_permission(this,'{{$model->id}}','{{$user->id}}','4')">
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- here -->

<script>
$("#addall").click(function() {
    const userName = $(this).attr('attr-data');
    const userId = $(this).attr('attr-userId');
    const userType = '1';

    const confirmationMessage = ($(this).prop("checked") == true) ? 
        'Are you sure you want to allow all permissions to ' + userName + ' ?' : 
        'Are you sure you want to remove all permissions to ' + userName + ' ?';
    
    if (confirm(confirmationMessage)) {
        umltiple_permission($(this), userId, userType,'add');
        $("input.add").prop("checked", $(this).prop("checked"));
    }else{
        $("#addall").prop("checked", false);
    }
});


$("input[class=add]").click(function() {
    if (!$(this).prop("checked")) {
        $("#addall").prop("checked", false);
    }
});

$("#editall").click(function() {
    $("input[class=edit]").prop("checked", $(this).prop("checked"));
});

$("input[class=edit]").click(function() {
    if (!$(this).prop("checked")) {
        $("#editall").prop("checked", false);
    }
});

$("#deleteall").click(function() {
    $("input[class=delete]").prop("checked", $(this).prop("checked"));
});

$("input[class=delete]").click(function() {
    if (!$(this).prop("checked")) {
        $("#deleteall").prop("checked", false);
    }
});

/*jackHarnerSig();*/
    $("#viewall").click(function() {
     $("input[class=view]").prop("checked", $(this).prop("checked"));
});

$("input[class=view]").click(function() {
    if (!$(this).prop("checked")) {
        $("#viewall").prop("checked", false);
    }
});

</script>

<script type="text/javascript">


         function add_permission(obj,model_id,user_id,permission_id,type)
         {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

          $.ajax({

           url:$baseurl+"/add-user-permissions",
           type:"POST",
           data: {"user_id":user_id,"model_id":model_id,"permission_id":permission_id,"type":type,"action_id":($(obj).prop("checked")?'1':'0')},
          // processData:false,
           dataType:'json',
           //contentType:false,
           success:function(response){
             if(response) {

                     if(response.success)
                     {
                        $("#permission_added").show().html(response.success);
                        document.getElementById("success-box").style.display = 'block';
                     }

                      if(response.error)
                      {
                        $("#permission_removed").show().html(response.error);
                        document.getElementById("danger-box").style.display = 'block';
                      }

                    }

                   },

           error: function (err)
            {

                alert("yes");


            },

           });

        };


</script>

<script type="text/javascript">


         function umltiple_permission(obj,user_id,permission_id,type)
         {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var model_ids = $("input[name='model_id[]']").map(function(){return $(this).val();}).get();

          $.ajax({
          url:$baseurl+"/user-multiple-permissions",
           type:"POST",
           data: {"user_id":user_id,"model_ids":model_ids,"permission_id":permission_id,"type":type,"action_id":($(obj).prop("checked")?'1':'0')},
          // processData:false,
           dataType:'json',
           //contentType:false,
          success:function(response){
             if(response) {

                     if(response.success)
                     {
                        $("#permission_added").show().html(response.success);
                        document.getElementById("success-box").style.display = 'block';
                     }

                      if(response.error)
                      {
                        $("#permission_removed").show().html(response.error);
                        document.getElementById("danger-box").style.display = 'block';
                      }

                    }

                   },

           error: function (err)
            {
                alert("No");
            },
           });
        };


</script>
@endsection

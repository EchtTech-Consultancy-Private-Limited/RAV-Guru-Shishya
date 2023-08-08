@extends('layouts.app-file')
@section('content')



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


<section class="content">
   <div class="container-fluid">
      <div class="block-header">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                     <p>{{ $message }}</p>
                  </div>

                  @endif
               <ul class="breadcrumb breadcrumb-style ">
                  <li class="breadcrumb-item">
                     <h4 class="page-title">Add Roles </h4>
                  </li>
                  <li class="breadcrumb-item bcrumb-1">
                     <a>
                     <i class="fas fa-home"></i> Home</a>
                  </li>
                  <li class="breadcrumb-item bcrumb-2">
                     <a href="#" onClick="return false;">Roles</a>
                  </li>
                  <li class="breadcrumb-item active">Add Roles</li>
               </ul>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                 <p style="float:right;"><b>Username:  {{ $user->name }} </b></p>
               </div>
               {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
               @csrf
               <div class="body">
                  <div class="row clearfix">
                     <div class="col-sm-4">
                        <div class="form-group">
                           <div class="form-line">
                            <strong>Name:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                           </div>
                        </div>
                     </div>
                   </div>
                  <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group">
                           <div class="form-line">
                               <strong>Permission:</strong>
                                <br/>
                                <input id="selectAll1" type="checkbox"><label for='selectAll'>Select All</label><br><br>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Role Module Permission</p>
                                            @foreach($permission as $value)
                                              <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                {{ $value->name }}</label>
                                            <br/>
                                            @endforeach
                                        </div>
                                        <div class="col-md-6">

                                        </div>
                                    </div>
                                </div>
                                <!-- <h1>Updated Code</h1> -->
                                <!-- <p>Role Module Permission</p>
                                @foreach($permission as $value)

                                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{ $value->name }}</label>
                                <br/>
                                @endforeach
                                <p>Product Module Permission</p>
                                @foreach($permissionproduct as $value1)

                                    <label>{{ Form::checkbox('permission[]', $value1->id, false, array('class' => 'name')) }}
                                    {{ $value1->name }}</label>
                                <br/>
                                @endforeach -->

                                <!-- here -->
                                   <div id="success-box" style="display:none;">
                                        <div class="card-body">
                                           <div id="" class=" alert alert-success mb-0" role="alert" >
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close" style="float: right;font-size:20px;">&times;</a>
                                              <p class="mb-0" id="dept_added"></p>
                                           </div>
                                        </div>
                                     </div>
                                   <div class="table-responsive">
                                       <table class="table table-hover  contact_list">
                                        <thead>
                                           <tr>
                                              <th> Menu Name</th>
                                              <th ><input type="checkbox"  id="addall" onclick="add_all1('{{$user->id}},1')"> Add</th>
                                              <th><input type="checkbox" id="editall"> Edit/Update</th>
                                              <th><input type="checkbox" id="viewall"> View</th>
                                              <th><input type="checkbox" id="deleteall"> Delete</th>
                                           </tr>



                                           @foreach(main_menu() as  $item)
                                             @if(count(main_child($item->id)) > 0 )
                                           <thead>
                                               <tr>
                                                 <th><input type="checkbox"> {{$item->name}}</th>

                                               </tr>
                                               @foreach(main_child($item->id) as  $items)
                                               <tr>
                                                  <td>=> {{$items->name}}</td>
                                                    <td>
                                                        <input type="checkbox" class="add"  checked="checked" value="1" name="" id="addcheckbox" onclick="add_all('{{$items->id}}','{{$user->id}}','1')">
                                                    </td>
                                                    <input type="hidden" value="1" id="addhidden" name="addcheckbox" />

                                                  <td><input type="checkbox" class="edit" onclick="add_all('{{$items->id}}','{{$user->id}}','2')"></td>

                                                  <td><input type="checkbox" class="view"></td>
                                                  <td><input type="checkbox" class="delete"></td>
                                               </tr>

                                               @endforeach
                                               @endif
                                               @endforeach
                                            </thead>
                                       </table>
                                    </div>
                                <!-- here -->
                           </div>
                        </div>
                     </div>
                  </div>


                  <div class="col-lg-12 p-t-20 text-center">
                     <button type="submit" class="btn btn-primary waves-effect m-r-15">Update</button>
                     <a href="{{ url('roles') }}" type="button" class="btn btn-danger waves-effect">Back To Roles</a>
                  </div>
               </div>
               {!! Form::close() !!}
            </div>
         </div>
      </div>
   </div>
</section>



<script>
    $("#addall").click(function() {
     $("input[class=add]").prop("checked", $(this).prop("checked"));
});

$("input[class=add]").click(function() {
    if (!$(this).prop("checked")) {
        $("#addall").prop("checked", false);
    }
});



</script>
<script>
    $("#editall").click(function() {
     $("input[class=edit]").prop("checked", $(this).prop("checked"));
});

$("input[class=edit]").click(function() {
    if (!$(this).prop("checked")) {
        $("#editall").prop("checked", false);
    }
});



</script>

<script>
    $("#deleteall").click(function() {
     $("input[class=delete]").prop("checked", $(this).prop("checked"));
});

$("input[class=delete]").click(function() {
    if (!$(this).prop("checked")) {
        $("#deleteall").prop("checked", false);
    }
});

/*jackHarnerSig();*/

</script>

<script>
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


         function add_all(menu_id,user_id,action_id)
         {
            //alert(menu_id);
           $('#addcheckbox').on('change', function(){
               $('#addhidden').val(this.checked ? 0 : 1);
            });

           var checkboxvalue=$('input[name=addcheckbox]').val();
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          $.ajax({

           url:$baseurl+"/add-permissions",
           type:"POST",
           data: {"user_id":user_id,"menu_id":menu_id,"action_id":action_id,"checkboxvalue":checkboxvalue},
          // processData:false,
           dataType:'json',
           //contentType:false,
           success:function(response){
             if(response) {

                     $("#dept_added").show().html("Permission Granted Successfully");
                     document.getElementById("success-box").style.display = 'block';
                      }

                   },

           error: function (err)
            {
                console.log(err);
                //alert("The provided credentials do not match our records.");

            },

           });

        };


</script>
@endsection

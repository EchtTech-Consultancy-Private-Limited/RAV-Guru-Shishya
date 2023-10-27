@extends('layouts.app-file')
@section('content')



<section class="content">

   <div class="container-fluid">
        <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">

               <div class="body">
                   <!-- New Table Code -->
                   <div id="success-box" style="display:none;">
                      <div class="card-body">
                         <div id="" class=" alert alert-success mb-0" role="alert" >
                            <a href="#" class="close"style="float: right;font-size:20px;">&times;</a>
                            <p class="mb-0" id="dept_added"></p>
                         </div>
                      </div>
                    </div>
                   <div class="table-responsive">
                     <table class="table table-hover  contact_list">
                        <p style="float:right;padding:10px;">Username: @if($user){{ $user->firstname }} @endif</p>
                      <thead>
                         <tr>
                            <th> Model Name</th>
                            <th ><input type="checkbox"  id="addall" onclick="add_all1('{{3}},1')"> Add</th>
                            <th><input type="checkbox" id="editall"> Edit/Update</th>
                            <th><input type="checkbox" id="viewall"> View</th>
                            <th><input type="checkbox" id="deleteall"> Delete</th>
                         </tr>
                         <form method="POST" action="{{ url('add-user-permissions') }}">
                          @foreach(main_models() as  $models)
                           <thead>
                             <tr>
                               <th> {{$models->name}}</th>
                                 <td>
                                     <input type="checkbox"  value="0"   name="" id="addcheckbox1" onclick="add_permission('{{$models->id}}','{{$user->id}}','1')" class="add" @if($permission->permission_id!=1) checked @elseif($permission->permission_id==1) unchecked @endif>
                                  </td>
                                  <input type="hidden" value="{{$models->name}}" id="addhidden" name="addcheckbox" />

                                <td><input type="checkbox" class="edit" onclick="add_all('{{$models->id}}','{{3}}','2')"></td>

                                <td><input type="checkbox" class="view"></td>
                                <td><input type="checkbox" class="delete"></td>
                             </tr>

                             
                             @endforeach
                           </thead>
                           <button type="submit" class="btn permission btn-primary">Permissions</button>
                       </form>
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


         function add_permission(model_id,user_id,action_id)
         {
           
           $('#addcheckbox').on('change', function(){
               $('#addhidden').val(this.checked ? 0 : 1);
            });

           var checkboxvalue=$('input[name=addcheckbox]').val();
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          // alert(checkboxvalue);
          $.ajax({

           url:$baseurl+"/add-user-permissions",
           type:"POST",
           data: {"user_id":user_id,"model_id":model_id,"action_id":action_id,"checkboxvalue":checkboxvalue},
          // processData:false,
           dataType:'json',
           //contentType:false,
           success:function(response){
             if(response) {
                    //alert(response);
                     $("#dept_added").show().html("Permission Granted Successfully");
                     document.getElementById("success-box").style.display = 'block';
                      }

                   },

           error: function (err)
            {
                console.log(err);
                

            },

           });

        };


</script>
@endsection

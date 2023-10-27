@extends('layouts.app-file')
@section('content')
<link href="{{ asset('assets/css/custom.css') }} " rel="stylesheet">
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Edit @if($user->user_type==1) {{__('phr.user_type')[1]}} @elseif($user->user_type==2) {{__('phr.user_type')[2] }} @elseif($user->user_type==3) {{__('phr.user_type')[3] }} @endif</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="{{url('/dashboard')}}">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="{{ url()->previous() }}" onClick="return true;">User</a>
                            </li>
                            <li class="breadcrumb-item active">Edit @if($user->user_type==1) {{__('phr.user_type')[1]}} @elseif($user->user_type==2) {{__('phr.user_type')[2] }} @elseif($user->user_type==3) {{__('phr.user_type')[3] }} @endif</li>
                        </ul>
                    </div>
                </div>
            </div>
           
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>

                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu float-end">
                                        <li>
                                            <a href="javascript:void(0);">Action</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Another action</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Something else here</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        {!! Form::model($user, ['method' => 'PATCH','files' => true,'route' => ['users.update', $user->id]]) !!}
                        <div class="body">

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">

                                            <strong>Title</strong>
                                            <select name="title" class="form-control">
                                                <option>Select Title </option>
                                                @foreach(__('phr.titlename') as $key=>$value)
                                                   <option @if( $key==$user->title) SELECTED @endif value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                              </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <strong>First Name<span class="text-danger"> *</span></strong>
                                             {!! Form::text('firstname', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                             @if ($errors->has('firstname'))
                                            <span class="help-block">
                                                <strong style="color:red;">{{ $errors->first('firstname') }}</strong>
                                            </span>
                                 @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <strong>Middle Name</strong>
                                             {!! Form::text('middlename', null, array('placeholder' => 'Middle Name','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <strong>Last Name<span class="text-danger"> *</span></strong>
                                            {!! Form::text('lastname', null, array('placeholder' => 'Lastname','class' => 'form-control')) !!}
                                            @if ($errors->has('lastname'))
                                                <span class="help-block">
                                                    <strong style="color:red;">{{ $errors->first('lastname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <strong>Email<span class="text-danger"> *</span></strong>
                                            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control', 'readonly' => 'true' )) !!}
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong style="color:red;">{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <strong>Mobile No<span class="text-danger"> *</span></strong>

                                           <input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="Mobile No."  value="{{ $user->mobile_no }}" maxlength="10" readonly>
                                           @if ($errors->has('mobile_no'))
                                                <span class="help-block">
                                                    <strong style="color:red;">{{ $errors->first('mobile_no') }}</strong>
                                                </span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div  class="form-group">
                                        <label for="Gender"
                                            class="form-control-label">Gender<span
                                            class="text-danger">*</span></label>
                                        <select
                                            name="gender"
                                            id="Gender"
                                            class="form-control">
                                            <option
                                            value="">Please
                                            select
                                            </option>
                                            @foreach(__('phr.gender') as $key=>$value)
                                            <option value="{{$key}}" {{$user->gender == $key  ? 'selected' : ''}}>{{$value}}</option>
                                        @endforeach
                                        </select>
                                        @if ($errors->has('gender'))
                                            <span class="help-block">
                                                <strong style="color:red;">{{ $errors->first('gender') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-4">
                                   <div class="form-group">
                                      <label >Country<span class="text-danger"> *</span></label>
                                      <select  id="country-dropdown" class="form-control select2" name="country">

                                          <option value=""> Select Country </option>
                                          @foreach ($countries as $data)
                                          <option value="{{ $data->id}}" {{$data->id == $user->country  ? 'selected' : ''}}>
                                              {{$data->name}}
                                          </option>

                                          @endforeach
                                      </select>
                                      @if ($errors->has('country'))
                                            <span class="help-block">
                                                <strong style="color:red;">{{ $errors->first('country') }}</strong>
                                            </span>
                                        @endif
                                   </div>
                                </div>
                                <div class="col-sm-4">
                                   <div class="form-group">
                                      <label >State<span class="text-danger"> *</span></label>
                                      <select id="state-dropdown" class="form-control select2 state" name="state" >
                                         <option value="{{ $user->state }}"> {{ $user->state_name }} </option>
                                      </select>@if ($errors->has('state'))
                                            <span class="help-block">
                                                <strong style="color:red;">{{ $errors->first('state') }}</strong>
                                            </span>
                                        @endif
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                   <div class="form-group">
                                      <label >City<span class="text-danger"> *</span></label>

                                        <select id="city-dropdown" class="form-control select2" name="city">
                                          <option value="{{ $user->city }}"> {{ $user->city_name }} </option>
                                        </select>
                                        @if ($errors->has('city'))
                                            <span class="help-block">
                                                <strong style="color:red;">{{ $errors->first('city') }}</strong>
                                            </span>
                                        @endif

                                  </div>
                                </div>
                             </div>

                            <div class="row clearfix">
                                
                                <div class="col-sm-12 col-md-6">
                                    <!-- guru name -->
                                       <div class="form-group">
                                          <label >E-Signature<span class="text-danger">*</span></label>
                                            <input type="file" name="e_sign" id="e_sign" class="form-control" >
                                            @if ($errors->has('e_sign'))
                                                <span class="help-block">
                                                    <strong style="color:red;">{{ $errors->first('e_sign') }}</strong>
                                                </span>
                                            @endif
                                             @if($user->e_sign)
                                             <img src="{{ asset('uploads/'.$user->e_sign) }}" alt="E-Sign" width="100px;" height="80px;">
                                             @endif
                                             
                                         </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group ">
                                            <label >Profile Picture<span class="text-danger">*</span></label>
                                            <input type="file" name="profile_image" id="profile_image" class="form-control" >
                                            @if ($errors->has('profile_image'))
                                                <span class="help-block">
                                                    <strong style="color:red;">{{ $errors->first('profile_image') }}</strong>
                                                </span>
                                            @endif
                                            @if($user->user_image)
                                             <img src="{{ asset('uploads/'.$user->user_image) }}" alt="Profile-Image" width="100px;" height="80px;">
                                             @else
                                             <img src="{{ asset('assets/images/user.png') }}" alt="Profile-Image" width="100px;" height="80px;">
                                             @endif
                                         </div>
                                     </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                          <div class="form-line">
                                             <label >User Type<span class="text-danger">*</span></label>
                                             <select name="user_type" id="user_type" class="form-control">
                                                <option value="">Select User Type</option>
                                                @foreach(__('phr.user_type') as $key=>$value)
                                                   <option @if( $key==$user->user_type) SELECTED @endif value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                               </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-6 gurutype" @if($user->gurutype) @else id="gurutype1" @endif>
                                       <div class="form-group">
                                          <div class="form-line">
                                             <label >Select Guru Type<span class="text-danger">*</span></label>
                                             <select name="gurutype" class="form-control">
                                                <option value="">Select User Type</option>
                                                @foreach(__('phr.guru_type') as $key=>$value)
                                                   <option @if( $key==$user->gurutype) SELECTED @endif value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-6 shishyatype" @if($user->shishyatype) @else id="shishyatype1" @endif >
                                       <div class="form-group">
                                          <div class="form-line">
                                             <label >Select Shishya Type<span class="text-danger">*</span></label>
                                             <select name="shishyatype" class="form-control">
                                                <option value="">Select User Type</option>
                                                @foreach(__('phr.shishya_type') as $key=>$value)
                                                   <option @if( $key==$user->shishyatype) SELECTED @endif value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                              </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                @if(Auth::user()->user_type=='1')
                                <div class="row">
                                       <div class="col-sm-6">
                                            <div class="form-group">
                                                  <label for="passwordinput">
                                                  Password
                                                  <span class="text-danger">*</span></label>
                                                  <input id="password" class="form-control input-md"
                                                     name="password" type="password"
                                                     placeholder="Enter your password">
                                                     <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                  <span class="text-danger" id="password_error"></span>
                                                  <span class="show-pass" onclick="toggle()">
                                                  </span>
                                                  <div id="popover-password">
                                                     <p><span id="result"></span></p>
                                                     <div class="progress">
                                                        <div id="password-strength"
                                                           class="progress-bar"
                                                           role="progressbar"
                                                           aria-valuenow="40"
                                                           aria-valuemin="0"
                                                           aria-valuemax="100"
                                                           style="width:0%">
                                                        </div>
                                                     </div>
                                                     <ul class="list-unstyled" style="display: none;">
                                                        <li class="">
                                                           <span class="low-case">
                                                           <i class="fas fa-circle" aria-hidden="true"></i>
                                                           &nbsp;Lowercase
                                                           </span>
                                                        </li>
                                                        <li class="">
                                                           <span class="upper-case">
                                                           <i class="fas fa-circle" aria-hidden="true"></i>
                                                           &nbsp;Uppercase
                                                           </span>
                                                        </li>
                                                        <li class="">
                                                           <span class="one-number">
                                                           <i class="fas fa-circle" aria-hidden="true"></i>
                                                           &nbsp;Number (0-9)
                                                           </span>
                                                        </li>
                                                        <li class="">
                                                           <span class="eight-character">
                                                           <i class="fas fa-circle" aria-hidden="true"></i>
                                                           &nbsp;Atleast 8 Character
                                                           </span>
                                                        </li>
                                                     </ul>
                                                  </div>
                                               </div>
                                         </div>
                                        <div class="col-sm-6">
                                           <div class="form-group">
                                              <div class="form-line">
                                                 <label>Confirm Password<span class="text-danger">*</span></label>
                                                 <input type="password" class="form-control" name="confirm-password" id="checkPassword" placeholder="Confirm Password checkPassword" onkeyup='check()'>
                                                 <i class="fas fa-eye-slash field-icon" id="eye1"></i>
                                                 <span id="confirm_password_msg"></span>
                                                 <span id="confirm_password_error" class="text-danger"></span>
                                              </div>
                                           </div>
                                        </div>

                                </div>
                                @endif

                                <div class="row" id="guru_list">
                                    <div class="col-sm-6">
                                           <div class="form-group">
                                              <div class="form-line">
                                                 <label>Assigned Guru</label>
                                                 <select name="guru_id" class="form-control">
                                                    <option value="0">Select Guru </option>
                                                    @if(count(get_guru_list())>0)
                                                    @foreach(get_guru_list() as $guru)
                                                    <option @if($user->guru_id==$guru->id) SELECTED @endif value="{{$guru->id}}">
                                                        @if($guru->title>0) {{__('phr.titlename')[$guru->title]}} @endif
                                                        {{$guru->firstname.' '.$guru->middlename.' '.$guru->lastname.' ' }}
                                                    </option>
                                                    @endforeach
                                                    @endif

                                                </select>
                                              </div>
                                           </div>
                                    </div>
                                </div>

                                @if(Auth::user()->user_type=='1')
                            <div class="col-lg-12 p-t-20 text-center">
                                <button type="submit" class="btn btn-primary waves-effect m-r-15">Update User</button>
                                <!--<button type="button" class="btn btn-danger waves-effect">Cancel</button>-->
                            </div>
                                @endif
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <script>

            @if($user->user_type!='3')
            $("#guru_list").hide();
            @endif
            $("#user_type").on("change",function(e){
                if($("#user_type").find(":selected").val()=='1' || $("#user_type").find(":selected").val()=='2'){
                    $("#guru_list").hide();
                    $("#guru_list option[value='0']").prop('selected', true);
                    //alert($("#guru_list").val());
                } else {
                    $("#guru_list").show();
                }
            });
        </script>
    </section>
    <script>
        /*show and hide password*/
        $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
        input.attr("type", "text");
        } else {
        input.attr("type", "password");
        }
        });
    </script>
    <script>
       $(function(){

            $('#eye1').click(function(){

                    if($(this).hasClass('fa-eye-slash')){

                    $(this).removeClass('fa-eye-slash');

                    $(this).addClass('fa-eye');

                    $('#checkPassword').attr('type','text');

                    }else{

                    $(this).removeClass('fa-eye');

                    $(this).addClass('fa-eye-slash');

                    $('#checkPassword').attr('type','password');
                    }
                });
            });
    </script>
    <script src="{{ asset('assets/js/custom/edit-password-policy.js') }}"></script>
    <script>
        // disable alphate
       $('#mobile_no').keypress(function (e) {
        var regex = new RegExp("^[0-9_]");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        e.preventDefault();
        return false;
    });
    </script>
    
    <script>
        $(document).ready(function () {

            var idCountry = $('#country-dropdown').val();
            
                $("#state-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dropdown').html('<option value="">-- Select State --</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dropdown").append('<option value="' + value
                                .id + '" '+(value.id=={{$user->state}}?"SELECTED":"")+'>' + value.name + '</option>');
                        });
                        //$('#city-dropdown').html('<option value="">-- Select City --</option>');
                    }
                });

                
  
            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#country-dropdown').on('change', function () {
                var idCountry = this.value;
                $("#state-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dropdown').html('<option value="">-- Select State --</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        //$('#city-dropdown').html('<option value="">-- Select City --</option>');
                    }
                });
            });
  
            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#state-dropdown').on('change', function () {
                var idState = this.value;
                $("#city-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
  
        });
    </script>

    <script>
        /* City dropdown */
                var idState = $('#state-dropdown').val();
                $("#city-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function (key, value) {
                            //console.log(value);
                            $("#city-dropdown").append('<option value="' + value
                                .id + '" '+(value.id=={{$user->city}}?"SELECTED":"")+'>' + value.name + '</option>');
                        });
                    }
                });
    </script>
@endsection

@extends('layouts.app-login')
@section('content')
<style>
  .form-error
   {
   color: green;
   }
</style>
<div class="container">
  <div class="card">
    <div class="form">
      <div class="main active text_center">
        <div class="text">
            @if ($message = Session::get('success'))
            <div class="alert alert-success form-error" >
               <p>{{ $message }}</p>
            </div>
            @endif
          <h2>Login </h2>
          <p>Enter your ATAB login details to continue...</p>
        </div>
        <form id="user_login_form12" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="login-input-text">
              <div class="login-input-div">
                <input type="text" required require name="email" autocomplete="email" autofocus id="email" maxlength="30">
                <span>Login ID</span>
              </div>
              <span class="emsg hidden">Please Enter a Valid Email</span>
              <div class="login-input-div">
                <input type="Password" required require id="Password" maxlength="15" name="password">
                <span>Password</span> </div>

              <div class="login-input-div1">
                <div class="col-md-12">
                    <span id="captcha">
                    </span>

                    <span type="button" style="margin:-5px 0px 0px 0px;border-radius: 7px;" onclick="createCaptcha();" class="btn btn-secondary btn-refresh"><i style="float:right;" class="fa fa-refresh" aria-hidden="true"></i></span>
                    
                </div>
              </div>

              <div class="login-input-div">
                <input type="text" required require  id="cpatchaTextBox">
                <span>Captcha</span> </div>

              <div class="input-div">
                <div class="login-buttons">
                <input type="button" value="Submit" class="next_button" id="user_login" onclick="return encrypt()">
                 
                </div>
              </div>
              <!-- <div class="login-input-div text13"> <a href="forget_password.html" class="login-input-text">Forgot password?</a> </div> -->
              <div class="login-input-div text13"> Don't have an account? <a href="{{ url('user-signup') }}" class="login-input-text">Sign up</a> </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('assets/js/custom/custom.js') }}"></script>
<script type="text/javascript">
         $('#user_login').on('click',function(e){
        //alert(baseurl);
         e.preventDefault();
           
           if (document.getElementById("cpatchaTextBox").value == code) {
                $.ajax({
           url:$baseurl+"/user-login",
           type:"POST",
           data:new FormData(document.getElementById("user_login_form")),
           processData:false,
           dataType:'json',
           contentType:false,
           success:function(response){
             $('#successMsg').show();
             console.log(response);

             if(response) {

                   window.location = "dashboard";
                  }

               },
         
           error: function (err) 
            {      
                alert("The provided credentials do not match our records.");
                  //alert(err.responseJSON.errors.email);
                  $('.emsg').addClass('hidden');
                  $('#email-error').empty();
                  $('#password-error').empty();
                  $('#authencate-error').empty();
                  $('#email-error').text(err.responseJSON.email);
                  $('#password-error').text(err.responseJSON.password);
                  $('#authencate-error').text(err.responseJSON.error);
            },
    
           });
              }
              else{
                $("#captcha-error").show().html("Invalid Captcha. try Again");
                document.getElementById("alert-box").style.display = 'block';
                //alert("Invalid Captcha. try Again");
                createCaptcha();
                $("#login-form")[0].reset();
              }
           //abobe code
           
         });
         
         
</script>
<script type="text/javascript">
function encrypt()
{

  $str=$("#password").val();
  for($i=0; $i<5;$i++) 
  {
    $str=reverseString(btoa($str));
  }
  $("#password").val($str);

  $("#loginForm").submit();

}

function reverseString(str) {
    var splitString = str.split(""); 
    var reverseArray = splitString.reverse(); 
    var joinArray = reverseArray.join(""); 
    return joinArray; 
}
</script>
<style>
    .emsg
    {
    color: red;
    }
    .emsgpsw
    {
        color: red;
    }
    .hidden
    {
         visibility:hidden;
    }
</style>
@endsection
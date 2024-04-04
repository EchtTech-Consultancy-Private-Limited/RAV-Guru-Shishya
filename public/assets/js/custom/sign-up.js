
// for show and hide 
function toggle(id) {

    a = document.getElementById('toggle_' + id);
    b = document.getElementById('display_' + id);
    if (a.style.display == 'block') {
        a.style.display = 'none';
        b.innerHTML = 'show password policy';
    } else {
        a.style.display = 'block';
        b.innerHTML = 'hide password policy';
    }
}

// show hide password

$(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

//password and confirm psw match
var check = function() {
    if (document.getElementById('password').value ==
        document.getElementById('checkPassword').value) {
        document.getElementById('alertPassword').style.color = '#8CC63E';
        document.getElementById('alertPassword').innerHTML = '<span><i class="fas fa-check-circle"></i>Match !</span>';
    } else {
        document.getElementById('alertPassword').style.color = '#EE2B39';
        document.getElementById('alertPassword').innerHTML = '<span><i class="fas fa-exclamation-triangle"></i>not matching</span>';
    }
}


// Delete User Alert

  function delete_user() {
      if(!confirm("Are you sure to delete this user"))
      event.preventDefault();
  }

  jQuery( document ).ready(function() {
    $('form input[type=text]').focus(function(){
        $(this).siblings(".text-danger").hide();
    });
  
    $('form input[type=email]').focus(function(){
      $(this).siblings(".text-danger").hide();
    });
  
    $('form input[type=password]').focus(function(){
      $(this).siblings(".text-danger").hide();
    });
    
    $('form input[type=number]').focus(function(){
        $(this).siblings(".text-danger").hide();
    });
  
    $('form input[type=date]').focus(function(){
        $(this).siblings(".text-danger").hide();
    });
  
    $('form input[type=file]').focus(function(){
        $(this).siblings(".text-danger").hide();
    });
  
    $('select').focus(function(){
        $(this).siblings(".text-danger").hide();
    });
  });
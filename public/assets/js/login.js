  $(".btn-refresh").click(function() {
    $.ajax({
      type: 'GET',
      url: refreshCaptcha,
      success: function(data) {
        $(".captcha span").html(data.captcha);
      }
    });
  });

  function encrypt() {

    $str = $("#password").val();
    for ($i = 0; $i < 5; $i++) {
      $str = reverseString(btoa($str));
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

  $(function() {

    $('#eye').click(function() {

      if ($(this).hasClass('fa-eye-slash')) {

        $(this).removeClass('fa-eye-slash');

        $(this).addClass('fa-eye');

        $('#password').attr('type', 'text');

      } else {

        $(this).removeClass('fa-eye');

        $(this).addClass('fa-eye-slash');

        $('#password').attr('type', 'password');
      }
    });
  });

  jQuery( document ).ready(function() {
    $('form input[type=text]').focus(function(){
        $(this).siblings(".error").hide();
    });

    $('form input[type=email]').focus(function(){
      $(this).siblings(".error").hide();
    });

    $('form input[type=password]').focus(function(){
      $(this).siblings(".error").hide();
    });
});
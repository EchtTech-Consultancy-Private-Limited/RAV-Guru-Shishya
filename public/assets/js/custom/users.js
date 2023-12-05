

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

  $(document).ready(function () {

    /*------------------------------------------
    --------------------------------------------
    Country Dropdown Change Event
    --------------------------------------------
    --------------------------------------------*/
    $('#country-dropdown').on('change', function () {        
        var idCountry = this.value;
        $("#state-dropdown").html('');
        $.ajax({
            url: fetchStatesUrl,
            type: "POST",
            data: {
                country_id: idCountry,
                _token: csrfToken
            },
            dataType: 'json',
            success: function (result) {
                $('#state-dropdown').html('<option value="">-- Select State --</option>');
                $.each(result.states, function (key, value) {
                    $("#state-dropdown").append('<option value="' + value
                        .id + '">' + value.name + '</option>');
                });
                $('#city-dropdown').html('<option value="">-- Select City --</option>');
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
            url: fetchCitesUrl,
            type: "POST",
            data: {
                state_id: idState,
                _token: csrfToken
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

// file validation
function validateFile(inputId) {
    const fileInput = document.getElementById(inputId);
    const file = fileInput.files[0];
    if (!file) {
      return;
    }
    const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if (!allowedExtensions.exec(file.name)) {
      Swal.fire({
        icon: 'error',
        title: 'Invalid File Format',
        text: 'Please upload a file with a valid format (jpg, jpeg, png).',
      });
      fileInput.value = '';
      return;
    }
    Swal.fire({
      icon: 'success',
      title: 'File is Valid',
      text: 'You can proceed with the file upload.',
    });
  }
// calculate date of birth
$("#date_of_birth").on('change', function() {
    var dob = $(this).val();
    var dobDate = new Date(dob);
    if (isNaN(dobDate)) {
        $("#result").text("Please enter a valid date of birth.");
    } else {
        var today = new Date();
        var age = today.getFullYear() - dobDate.getFullYear();
        // var monthDiff = today.getMonth() - dobDate.getMonth();
        if (today.getDate() < dobDate.getDate()) {
            age--;
        }
        $("#age").val(age);
    }
});

// step tabs
$(document).ready(function() {

    $(".next-step").click(function() {
     $("#step1").removeClass("active");
     $("#step2").addClass("active");
     $("#wizard_horizontal-t-2").addClass("active");
     $("#wizard_horizontal-t-1").addClass("done");
     $("#wizard_horizontal-t-1").removeClass("active");

  });

    $(".prev-step").click(function() {
     $("#step2").removeClass("active");
     $("#step1").addClass("active");
     $("#wizard_horizontal-t-1").addClass("active");
     $("#wizard_horizontal-t-2").addClass("done");
     $("#wizard_horizontal-t-2").removeClass("active");
  });

    $(".next-step1").click(function() {
     $("#step2").removeClass("active");
     $("#step3").addClass("active");
     $("#wizard_horizontal-t-3").addClass("active");
     $("#wizard_horizontal-t-2").addClass("done");
     $("#wizard_horizontal-t-2").removeClass("active");

  });

    $(".prev-step1").click(function() {
     $("#step3").removeClass("active");
     $("#step2").addClass("active");
     $("#wizard_horizontal-t-2").addClass("active");
     $("#wizard_horizontal-t-3").addClass("done");
     $("#wizard_horizontal-t-3").removeClass("active");
  });

    $(".next-step2").click(function() {
     $("#step3").removeClass("active");
     $("#step4").addClass("active");
     $("#wizard_horizontal-t-4").addClass("active");
     $("#wizard_horizontal-t-3").addClass("done");
     $("#wizard_horizontal-t-3").removeClass("active");
  });

    $(".prev-step2").click(function() {
     $("#step4").removeClass("active");
     $("#step3").addClass("active");
     $("#wizard_horizontal-t-3").addClass("active");
     $("#wizard_horizontal-t-4").addClass("done");
     $("#wizard_horizontal-t-4").removeClass("active");
  });

    $(".next-step3").click(function() {
     $("#step4").removeClass("active");
     $("#step5").addClass("active");

     $("#wizard_horizontal-t-5").addClass("active");
     $("#wizard_horizontal-t-4").addClass("done");
     $("#wizard_horizontal-t-4").removeClass("active");
  });

    $(".prev-step3").click(function() {
     $("#step5").removeClass("active");
     $("#step4").addClass("active");
     $("#wizard_horizontal-t-4").addClass("active");
     $("#wizard_horizontal-t-5").addClass("done");
     $("#wizard_horizontal-t-5").removeClass("active");
  });
});

$('#mySelect').change(function(){
    if (this.value=='1')
    {
     // $("#number_beds").style.visibility='visible'

      $("#number_beds").removeClass('d-none');
    }
    else {
        $("#number_beds").addClass('d-none');
    }
});

// Language Add Button code

$(document).ready(function(){
    var language_row = 0;
    $("#Add_language").click(function(e){
     e.preventDefault();       
     $("#language_body").append('<div id="faqs-row' + language_row + '" class="row delete-div p-0 m-0"><div class="col-sm-12 col-md-3"><div class="form-group"><input type="hidden" class="form-control" placeholder="Add Language" name="lang_id[]" value="0"><input type="text" class="form-control" placeholder="Add Language" name="lang_name[]"></div></div><div class="col-sm-12 col-md-3 mb-3"><div class="form-group"><select name="reading[]" class="form-control"><option value="">Select</option><option value="1">Yes</option><option value="0">No</option></select></div></div><div class="col-sm-12 col-md-3 mb-3"><div class="form-group"><select name="writing[]" class="form-control"><option value="">Select</option><option value="1">Yes</option><option value="0">No</option></select></div></div><div class="col-sm-12 col-md-2 mb-3"><div class="form-group"><select name="speaking[]" class="form-control"><option value="">Select</option><option value="1">Yes</option><option value="0">No</option></select></div></div><div class="col-sm-12 col-md-1"><button class="btn btn-tbl-delete" onclick="$(\'#faqs-row' + language_row + '\').remove();"><i class="material-icons">delete_forever</i></button></div></div>');

     language_row++;
    });

    $("#delete_language").click(function(e){
        e.preventDefault();
        $(".delete-div").last('.delete-div').remove();
    });
});

// Teaching Input

$('#teaching_exp').change(function(){
    if (this.value=='1')
    {
        $("#teaching_exp_input").removeClass('d-none');
    }
    else {
        $("#teaching_exp_input").addClass('d-none');
    }
});

    // Honourary Input

$('#Honourary').change(function(){
    if (this.value=='1')
    {
        $("#Honourary_input").removeClass('d-none');
    }
    else {
        $("#Honourary_input").addClass('d-none');
    }
});

$(document).ready(function () {
    var idCountry = $('#country-dropdown').val();
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
          $("#state-dropdown").append('<option value="' + value.id + '" '+(value.id==stateId?"SELECTED":"")+'>' + value.name + '</option>');
       });       
       selectedCity();
     }
  });
  /*------- Country Dropdown Change Event ---------*/
    $('#country-dropdown').on('change', function () {
      var idCountry = this.value;
      $("#state-dropdown").html('');
      $("#city-dropdown").html('');
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
        //$('#city-dropdown').html('<option value="">-- Select City --</option>');
       }
    });
   });

        /*-------------State Dropdown Change Event---------*/
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

   /* City dropdown */
   function selectedCity(){
    var idState = $('#state-dropdown').val();
    // alert(idState);
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
                            //console.log($('#state-dropdown').val());
                    $("#city-dropdown").append('<option value="' + value
                    .id + '" '+(value.id==cityId?"SELECTED":"")+'>' + value.name + '</option>');
                });
            }
        });
    }

    // same as present
    $('#same_as_present').change(function() {
        if ($(this).is(':checked')) {
          $('#per_address_Line1').val($('#address1').val());
          $('#per_address_Line2').val($('#address2').val());
          $('#per-country-dropdown').val($('#country-dropdown').val()).change();
          $('#per-state-dropdown').val($('#state-dropdown').val()).change();
          $('#per_pincode').val($('#Pincode').val());
       } else {
          $('#per_address_Line1').val('');
          $('#per_address_Line2').val('');
          $('#per-country-dropdown').val('');
          $('#per-state-dropdown').val('');
          $('#per-city-dropdown').val('');
          $('#per_pincode').val('');
       }
    });

    // permanenat address dropdown
    var idCountry = $('#per-country-dropdown').val();
     $("#per-state-dropdown").html('');
     $.ajax({
       url: fetchStatesUrl,
       type: "POST",
       data: {
         country_id: idCountry,
         _token: csrfToken
      },
      dataType: 'json',
      success: function (result) {
         $('#per-state-dropdown').html('<option value="">-- Select State --</option>');
         $.each(result.states, function (key, value) {
           $("#per-state-dropdown").append('<option value="' + value
             .id + '" '+(value.id==perState?"SELECTED":"")+'>' + value.name + '</option>');
        });        
        PerSelectedCity();
        //$('#city-dropdown').html('<option value="">-- Select City --</option>');
      }
   });
   $('#per-country-dropdown').on('change', function () {
        var idCountry = this.value;
        $("#per-state-dropdown").html('');
        $("#per-city-dropdown").html('');
        $.ajax({
        url: fetchStatesUrl,
        type: "POST",
        data: {
            country_id: idCountry,
            _token: csrfToken
        },
        dataType: 'json',
        success: function (result) {
            $('#per-state-dropdown').html('<option value="">-- Select State --</option>');
            $.each(result.states, function (key, value) {
                if($('#state-dropdown').val()==value.id){
                    $("#per-state-dropdown").append('<option value="' + value
                    .id + '" SELECTED>' + value.name + '</option>');
                }
                else
                {
                    $("#per-state-dropdown").append('<option value="' + value
                    .id + '">' + value.name + '</option>');
                }


            });
            //$('#city-dropdown').html('<option value="">-- Select City --</option>');
        }
        });         
    });

    $('#per-state-dropdown').on('change', function () {

        if($('#same_as_present').is(':checked'))
        {
           var idState = $('#state-dropdown').val();
        }
        else
        {
           var idState = this.value;
        }

        console.log(idState);
        $("#per-city-dropdown").html('');
        $.ajax({
           url: fetchCitesUrl,
           type: "POST",
           data: {
              state_id: idState,
              _token: csrfToken
           },
           dataType: 'json',
           success: function (res) {
              $('#per-city-dropdown').html('<option value="">-- Select City --</option>');
              $.each(res.cities, function (key, value)
              {

                 if($('#city-dropdown').val()==value.id){
                    $("#per-city-dropdown").append('<option value="' + value
                       .id + '" SELECTED>' + value.name + '</option>');
                 }
                 else
                 {
                    $("#per-city-dropdown").append('<option value="' + value
                       .id + '">' + value.name + '</option>');
                 }
              });
           }
        });
     });
    
    function PerSelectedCity(){
        var idState = $('#per-state-dropdown').val();
        $("#per-city-dropdown").html('');
        $.ajax({
            url: fetchCitesUrl,
            type: "POST",
            data: {
                state_id: idState,
                _token: csrfToken
            },
            dataType: 'json',
            success: function (res) {
                $('#per-city-dropdown').html('<option value="">-- Select City --</option>');
                $.each(res.cities, function (key, value) {
                            //console.log(value);
                    $("#per-city-dropdown").append('<option value="' + value
                    .id + '" '+(value.id==perCities?"SELECTED":"")+'>' + value.name + '</option>');
                });
            }
        });
    }

    // clinic record
    var idCountry = $('#country-dropdown-clinical').val();
        $.ajax({
            url: fetchStatesUrl,
            type: "POST",
            data: {
                country_id: idCountry,
                _token: csrfToken
            },
        dataType: 'json',
        success: function (result) {
        $('#state-dropdown-clinical').html('<option value="">-- Select State --</option>');
        $.each(result.states, function (key, value) {
            $("#state-dropdown-clinical").append('<option value="' + value
            .id + '" '+(value.id==clinicState?"SELECTED":"")+'>' + value.name + '</option>');
            });
        }
    });

    $('#country-dropdown-clinical').on('change',function () {
        var idCountry = this.value;
        $("#state-dropdown-clinical").html('');
        $("#city-dropdown-clinical").html('');
        $.ajax({
            url: fetchStatesUrl,
            type: "POST",
            data: {
                country_id: idCountry,
                _token: csrfToken
            },
           dataType: 'json',
           success: function (result) {
  
              $('#state-dropdown-clinical').html('<option value="">-- Select State --</option>');
              $.each(result.states, function (key, value) {
                 $("#state-dropdown-clinical").append('<option value="' + value
                    .id + '">' + value.name + '</option>');
              });
           }
        });
    });

    $('#state-dropdown-clinical').on('change', function () {
        var idState = this.value;
        $("#city-dropdown-clinical").html('');
        $.ajax({
           url: fetchCitesUrl,
           type: "POST",
           data: {
              state_id: idState,
              _token: csrfToken
           },
           dataType: 'json',
           success: function (res) {
              $('#city-dropdown-clinical').html('<option value="">-- Select City --</option>');
              $.each(res.cities, function (key, value) {
                 $("#city-dropdown-clinical").append('<option value="' + value
                    .id + '">' + value.name + '</option>');
              });
           }
        });
    });

    var idState = $('#state-dropdown-clinical').val();
   $("#city-dropdown-clinical").html('');
   $.ajax({
      url: fetchCitesUrl,
      type: "POST",
      data: {
         state_id: idState,
         _token: csrfToken
      },
      dataType: 'json',
      success: function (res) {
         $('#city-dropdown-clinical').html('<option value="">-- Select City --</option>');
         $.each(res.cities, function (key, value) {
            $("#city-dropdown-clinical").append('<option value="' + value
               .id + '" '+(value.id==clinicCity?"SELECTED":"")+'>' + value.name + '</option>');
         });
      }
   });

    $('#check_reading').on('change', function(){
        $('#hidden_read_check').val(this.checked ? 1 : 0);
    });

    $('#check_writing').on('change', function(){
        $('#hidden_write_check').val(this.checked ? 1 : 0);
    });

    $('#check_speaking').on('change', function(){
        $('#hidden_speak_check').val(this.checked ? 1 : 0);
    });

    // educational details
    $('.update_education').on('click',function(){
        var education_id= $(this).data('id');
        $.ajax({
           url: eduEditUrl,
           type: "GET",
           data: {
           education_id: education_id,
        },
        success: function(response) {
           $('#successMsg').show();
           if (response) {
              $("#edit_educational_id").val(response.id);
              $("#edit_institute_name").val(response.institute_name);
              $("#edit_course_name").val(response.course_name);
              $("#edit_year_of_passing").val(response.year_of_passing);
              $('#upload_degree').attr('src', response.upload_degree);
              $('#educational_document').attr('href', response.upload_degree);
           }
        },
        error: function(response) {
           alert(error);
        },
        });
    });

    $('.update_publication').on('click',function(){
        var publication_id= $(this).data('id');
        $.ajax({
           url: publicationEditUrl,
           type: "GET",
           data: {
             publication_id: publication_id,
           },
           success: function(response) {
             $('#successMsg').show();
              if (response) {
                 $("#edit_no_of_case_reports").val(response.no_of_case_reports);
                 $("#edit_research_papers").val(response.research_papers);
                 $("#edit_books_published").val(response.books_published);
                 $("#edit_no_of_seminars").val(response.no_of_seminars);
                 $("#edit_publication_id").val(response.id);
              }
           },
           error: function(response) {
              alert(error);
           },
        });
     });


    function confirm_option(action){
        if(!confirm("Are you sure to "+action+", this record!")){
            return false;
        }
        return true;
    }

    $("#any_done_services").change(function() {
        if(this.checked) {
           $('#output').html('Checkbox is checked');
           var data=document.getElementById('any_done_services').value='1';
        }else
        {
          var data=document.getElementById('any_done_services').value='0';
        }
    });
});
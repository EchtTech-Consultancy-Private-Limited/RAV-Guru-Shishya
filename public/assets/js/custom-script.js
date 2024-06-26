// calculate date of birth
$("#date_of_birth").on('change', function () {
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
// add attendance js
$('#checkall').on('click', function () {
    if (this.checked) {
        $('.form-check-input').each(function () {
            this.checked = true;
        });
    } else {
        $('.form-check-input').each(function () {
            this.checked = false;
        });
    }
});

$('.form-check-input').on('click', function () {
    if ($('.form-check-input:checked').length == $('.form-check-input').length) {
        $('#checkall').prop('checked', true);
    } else {
        $('#checkall').prop('checked', false);
    }
});
function confirm_option(action) {
    if (!confirm("Are you sure to " + action + "!")) {
        return false;
    }

    return true;

}
// End Attendance js

// step tabs
$(document).ready(function () {

    $(".next-step").click(function () {
        $("#step1").removeClass("active");
        $("#step2").addClass("active");
        $("#wizard_horizontal-t-2").addClass("active");
        $("#wizard_horizontal-t-1").addClass("done");
        $("#wizard_horizontal-t-1").removeClass("active");

    });

    $(".prev-step").click(function () {
        $("#step2").removeClass("active");
        $("#step1").addClass("active");
        $("#wizard_horizontal-t-1").addClass("active");
        $("#wizard_horizontal-t-2").addClass("done");
        $("#wizard_horizontal-t-2").removeClass("active");
    });

    $(".next-step1").click(function () {
        $("#step2").removeClass("active");
        $("#step3").addClass("active");
        $("#wizard_horizontal-t-3").addClass("active");
        $("#wizard_horizontal-t-2").addClass("done");
        $("#wizard_horizontal-t-2").removeClass("active");

    });

    $(".prev-step1").click(function () {
        $("#step3").removeClass("active");
        $("#step2").addClass("active");
        $("#wizard_horizontal-t-2").addClass("active");
        $("#wizard_horizontal-t-3").addClass("done");
        $("#wizard_horizontal-t-3").removeClass("active");
    });

    $(".next-step2").click(function () {
        $("#step3").removeClass("active");
        $("#step4").addClass("active");
        $("#wizard_horizontal-t-4").addClass("active");
        $("#wizard_horizontal-t-3").addClass("done");
        $("#wizard_horizontal-t-3").removeClass("active");
    });

    $(".prev-step2").click(function () {
        $("#step4").removeClass("active");
        $("#step3").addClass("active");
        $("#wizard_horizontal-t-3").addClass("active");
        $("#wizard_horizontal-t-4").addClass("done");
        $("#wizard_horizontal-t-4").removeClass("active");
    });

    $(".next-step3").click(function () {
        $("#step4").removeClass("active");
        $("#step5").addClass("active");

        $("#wizard_horizontal-t-5").addClass("active");
        $("#wizard_horizontal-t-4").addClass("done");
        $("#wizard_horizontal-t-4").removeClass("active");
    });

    $(".prev-step3").click(function () {
        $("#step5").removeClass("active");
        $("#step4").addClass("active");
        $("#wizard_horizontal-t-4").addClass("active");
        $("#wizard_horizontal-t-5").addClass("done");
        $("#wizard_horizontal-t-5").removeClass("active");
    });
});

$('#mySelect').change(function () {
    if (this.value == '1') {
        // $("#number_beds").style.visibility='visible'

        $("#number_beds").removeClass('d-none');
    }
    else {
        $("#number_beds").addClass('d-none');
    }
});

// Language Add Button code

$(document).ready(function () {
    var language_row = 0;
    $("#Add_language").click(function (e) {
        e.preventDefault();
        $("#language_body").append('<div id="faqs-row' + language_row + '" class="row delete-div p-0 m-0"><div class="col-sm-12 col-md-3"><div class="form-group"><input type="hidden" class="form-control" placeholder="Add Language" name="lang_id[]" value="0"><input type="text" class="form-control" placeholder="Add Language" name="lang_name[]"></div></div><div class="col-sm-12 col-md-3 mb-3"><div class="form-group"><select name="reading[]" class="form-control"><option value="">Select</option><option value="1">Yes</option><option value="0">No</option></select></div></div><div class="col-sm-12 col-md-3 mb-3"><div class="form-group"><select name="writing[]" class="form-control"><option value="">Select</option><option value="1">Yes</option><option value="0">No</option></select></div></div><div class="col-sm-12 col-md-2 mb-3"><div class="form-group"><select name="speaking[]" class="form-control"><option value="">Select</option><option value="1">Yes</option><option value="0">No</option></select></div></div><div class="col-sm-12 col-md-1"><button class="btn btn-tbl-delete" onclick="$(\'#faqs-row' + language_row + '\').remove();"><i class="material-icons">delete_forever</i></button></div></div>');

        language_row++;
    });

    $("#delete_language").click(function (e) {
        e.preventDefault();
        $(".delete-div").last('.delete-div').remove();
    });
});

// Teaching Input

$('#teaching_exp').change(function () {
    if (this.value == '1') {
        $("#teaching_exp_input").removeClass('d-none');
    }
    else {
        $("#teaching_exp_input").addClass('d-none');
    }
});

// Honourary Input

$('#Honourary').change(function () {
    if (this.value == '1') {
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
                $("#state-dropdown").append('<option value="' + value.id + '" ' + (value.id == stateId ? "SELECTED" : "") + '>' + value.name + '</option>');
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
    function selectedCity() {
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
                        .id + '" ' + (value.id == cityId ? "SELECTED" : "") + '>' + value.name + '</option>');
                });
            }
        });
    }

    // same as present
    $('#same_as_present').change(function () {
        if ($(this).is(':checked')) {
            $('#per_address_Line1').val($('#address1').val());
            $('#per_address_Line2').val($('#address2').val());
            $('#per-country-dropdown').val($('#country-dropdown').val()).change();
            $('#per-state-dropdown').val($('#state-dropdown').val()).change();
            $('#per_pincode').val($('#Pincode').val());
        } else {
            $('#per_address_Line1').val('');
            $('#per_address_Line2').val('');
            $('#per-country-dropdown').val('').change();
            $('#per-state-dropdown').val('').change();
            $('#per-city-dropdown').val('').change();
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
                    .id + '" ' + (value.id == perState ? "SELECTED" : "") + '>' + value.name + '</option>');
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
                    if ($('#state-dropdown').val() == value.id) {
                        $("#per-state-dropdown").append('<option value="' + value
                            .id + '" SELECTED>' + value.name + '</option>');
                    }
                    else {
                        $("#per-state-dropdown").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    }


                });
                //$('#city-dropdown').html('<option value="">-- Select City --</option>');
            }
        });
    });

    $('#per-state-dropdown').on('change', function () {

        if ($('#same_as_present').is(':checked')) {
            var idState = $('#state-dropdown').val();
        }
        else {
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
                $.each(res.cities, function (key, value) {

                    if ($('#city-dropdown').val() == value.id) {
                        $("#per-city-dropdown").append('<option value="' + value
                            .id + '" SELECTED>' + value.name + '</option>');
                    }
                    else {
                        $("#per-city-dropdown").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    }
                });
            }
        });
    });

    function PerSelectedCity() {
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
                        .id + '" ' + (value.id == perCities ? "SELECTED" : "") + '>' + value.name + '</option>');
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
                    .id + '" ' + (value.id == clinicState ? "SELECTED" : "") + '>' + value.name + '</option>');
            });
        }
    });

    $('#country-dropdown-clinical').on('change', function () {
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
                    .id + '" ' + (value.id == clinicCity ? "SELECTED" : "") + '>' + value.name + '</option>');
            });
        }
    });

    $('#check_reading').on('change', function () {
        $('#hidden_read_check').val(this.checked ? 1 : 0);
    });

    $('#check_writing').on('change', function () {
        $('#hidden_write_check').val(this.checked ? 1 : 0);
    });

    $('#check_speaking').on('change', function () {
        $('#hidden_speak_check').val(this.checked ? 1 : 0);
    });

    // educational details
    $('.update_education').on('click', function () {
        var education_id = $(this).data('id');
        $.ajax({
            url: eduEditUrl,
            type: "GET",
            data: {
                education_id: education_id,
            },
            success: function (response) {
                $('#successMsg').show();
                if (response) {
                    $("#edit_educational_id").val(response.id);
                    $("#edit_institute_name").val(response.institute_name);
                    $("#edit_course_name").val(response.course_name);
                    $("#edit_year_of_passing").val(response.year_of_passing);
                    $("#edit_name_of_board").val(response.name_of_board);
                    $("#edit_year_of_regis").val(response.year_of_regis);
                    $("#edit_regis_no").val(response.regis_no);
                    $('#upload_degree').attr('src', response.upload_degree);
                    $('#educational_document').attr('href', response.upload_degree);
                }
            },
            error: function (response) {
                alert(error);
            },
        });
    });

    $('.update_publication').on('click', function () {
        var publication_id = $(this).data('id');
        $.ajax({
            url: publicationEditUrl,
            type: "GET",
            data: {
                publication_id: publication_id,
            },
            success: function (response) {
                $('#successMsg').show();
                if (response) {
                    $("#edit_no_of_case_reports").val(response.no_of_case_reports);
                    $("#edit_research_papers").val(response.research_papers);
                    $("#edit_books_published").val(response.books_published);
                    $("#edit_no_of_seminars").val(response.no_of_seminars);
                    $("#edit_publication_id").val(response.id);
                }
            },
            error: function (response) {
                alert(error);
            },
        });
    });


    function confirm_option(action) {
        if (!confirm("Are you sure to " + action + ", this record!")) {
            return false;
        }
        return true;
    }

    $("#any_done_services").change(function () {
        if (this.checked) {
            $('#output').html('Checkbox is checked');
            var data = document.getElementById('any_done_services').value = '1';
        } else {
            var data = document.getElementById('any_done_services').value = '0';
        }
    });

    $('#bank_aadhar_link').change(function () {
        var checkboxValue = $('#bank_aadhar_link').is(':checked') ? 1 : 0;
        $("#bank_aadhar_link").val(checkboxValue);
    });

    $('#bank_mobile_link').change(function () {
        var checkboxValue = $('#bank_mobile_link').is(':checked') ? 1 : 0;
        $("#bank_mobile_link").val(checkboxValue);
    });
});

// follow up script
$("#checkall").click(function () {
    $(".input-checkbox").prop("checked", $(this).prop("checked"));
});

$(".input-checkbox").click(function () {
    if (!$(this).prop("checked")) {
        $("#checkall").prop("checked", false);
    }
});


$(".find-registration").click(function () {
    if ($("#registration_no").val() == '') {
        $("#registration_no-error").html('Enter patient registration no.');
        return false;
    } else $("#registration_no-error").html('');

    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        url: findPhrRegistration,
        data: {
            'registration_no': $("#registration_no").val()
        },
        success: function (data) {
            if (data.id === undefined) {
                $("#registration_no-error").html(data.message);
                $("#follow-up-btn").html('');
            } else {
                let url = `${addFollowUpSheetUrl}/${data.id}`
                $("#follow-up-btn").html(`<a href=${url}><button type="button" class="btn add waves-effect">Add Follow Up</button></a>`);
            }
        }
    });
});
function confirm_option(action) {
    if (!confirm("Are you sure to " + action + ", this record!")) {
        return false;
    }
    return true;
}
// validate input
function validateInput(input) {
    input.value = input.value.replace(/\D/g, '');
}
// End follow up script
$("#year_of_passing").on('change', function () {
    const date = $("#year_of_passing").val();
    $("#Registration_year").attr("max", date);
});

$("#edit_year_of_passing").on('change', function () {
    const date = $("#edit_year_of_passing").val();
    $("#edit_year_of_regis").attr("max", date);
});
//  manage profile form validation
$(document).ready(function () {
    $("#manage_profile_form").validate({
        // ignore: ':hidden:not(.summernote),.note-editable.card-block',

        rules: {
            firstname: {
                required: true
            },
            f_name: {
                required: true,
            },
            date_of_birth: {
                required: true
            },
            age: {
                required: true
            },
            mobile_no: {
                required: true
            },
            aadhaar_no: {
                required: true
            },
            pan_no: {
                required: true
            },
            address1: {
                required: true
            },
            address2: {
                required: true
            },
            country: {
                required: true
            },
            state: {
                required: true
            },
            city: {
                required: true
            },
            pincode: {
                required: true
            },
            per_address1: {
                required: true
            },
            per_address2: {
                required: true
            },
            per_country: {
                required: true
            },
            per_state: {
                required: true
            },
            per_city: {
                required: true
            },
            per_pincode: {
                required: true
            },
            bank_name: {
                required: true
            },
            ifsc_code: {
                required: true
            },
            account_no: {
                required: true
            },
            account_holder_name: {
                required: true
            },

        },
        errorPlacement: function (error, element) {
            var name = $(element).attr("name");
            error.appendTo($("#" + name + "_err"));
        },
        messages: {
            firstname: {
                required: "Please enter first name"
            },
            f_name: {
                required: "Please enter father name",
            },
            date_of_birth: {
                required: "Please enter date of birth"
            },
            age: {
                required: "Please enter age"
            },
            mobile_no: {
                required: "Please enter 10 digit mobile number"
            },
            aadhaar_no: {
                required: "Please enter 12 digit aadhar number"
            },
            pan_no: {
                required: "Please enter pan number"
            },
            address1: {
                required: "Address is required"
            },
            address2: {
                required: "Address is required"
            },
            country: {
                required: "Country is required"
            },
            state: {
                required: "State is required"
            },
            city: {
                required: "City is required"
            },
            pincode: {
                required: "Pincode is required"
            },
            per_address1: {
                required: "Address is required"
            },
            per_address2: {
                required: "Address is required"
            },
            per_country: {
                required: "Country is required"
            },
            per_state: {
                required: "State is required"
            },
            per_city: {
                required: "City is required"
            },
            per_pincode: {
                required: "Pincode is required"
            },
            bank_name: {
                required: "Bank name is required"
            },
            ifsc_code: {
                required: "IFSC code is required"
            },
            account_no: {
                required: "Account is required"
            },
            account_holder_name: {
                required: "Account holder name is required"
            },
        }
    });
});

// manage step form 3
$(document).ready(function () {
    $("#manage_profile_form_step3").validate({
        // ignore: ':hidden:not(.summernote),.note-editable.card-block',

        rules: {
            address1: {
                required: true
            },
            address2: {
                required: true
            },
            country: {
                required: true
            },
            state: {
                required: true
            },
            pincode: {
                required: true
            },
            average_no_of_patients_in_opd: {
                required: true
            }
        },
        errorPlacement: function (error, element) {
            var name = $(element).attr("name");
            error.appendTo($("#" + name + "_error"));
        },
        messages: {
            address1: {
                required: "Address field is required",
            },
            address2: {
                required: "Address field is required",
            },
            country: {
                required: "Please select country"
            },
            state: {
                required: "Please select State"
            },
            pincode: {
                required: "Pincode field is required"
            },
            average_no_of_patients_in_opd: {
                required: "Average Number field is required"
            }
        }
    });
});
// End manage step form 3

//   patient form validation
$(document).ready(function () {
    $("#php_form").validate({
        rules: {
            patient_name: {
                required: true
            },
            registration_no: {
                required: true,
            },
            age_group: {
                required: true
            },
            age: {
                required: true
            },
            gender: {
                required: true
            },
            occupation: {
                required: true
            },
            marital_status: {
                required: true
            },
            address: {
                required: true
            },
        },
        errorPlacement: function (error, element) {
            var name = $(element).attr("name");
            error.appendTo($("#" + name + "_err"));
        }
    });
});
// disable alphate
$('#age').keypress(function (e) {
    //alert("yes");
    var regex = new RegExp("^[0-9_]");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    e.preventDefault();
    return false;
});


$("#submit-phr-report").click(function (e) {
    var from_date = $("#from_date").val();
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: 'send-phr-report',
        dataType: 'json',
        data: {
            from_date: from_date,
        },
        success: function (result) {
            if (result == 1) {
                alert("Your report submitted successfuly!");
            }
            else if (result == 2) {
                alert("You have already submitted your today's report.");
            }
        },
        error: function (result) {
            alert("Some error occured. We are working on it and will fix it as soon as possible.");
        }
    });
});



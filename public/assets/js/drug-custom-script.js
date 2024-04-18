// edit churna yoda 
function yogas_select_change(){
    if($('#yogas_select').val()==1){
        $("#yogas_type").html($("#churna_yogas").html());
    } else if($('#yogas_select').val()==2){
        $("#yogas_type").html($("#rasa_yogas").html());
    } else if($('#yogas_select').val()==3){
        $("#yogas_type").html($("#vati_yogas").html());
    } else if($('#yogas_select').val()==4){
        $("#yogas_type").html($("#talia_yogas").html());
    } else if($('#yogas_select').val()==5){
        $("#yogas_type").html($("#asva_yogas").html());
    }
}

// add drugs
var faqs_row = 0;
function addfaqs() {
html = '<tr id="faqs-row' + faqs_row + '">';
    html += '<input type="hidden" name="drug_part_id[]" value="0" placeholder="Enter name of the Ingredients">';
    html += '<td><input type="text" name="name_of_the_ingredients[]" class="form-control" placeholder="quantity" aria-label="quantity" value=""></td>';
    html += '<td><input type="text" name="part_used[]" class="form-control" placeholder="Part used" aria-label="Part used" value=""></td>';
    html += '<td class="text-danger mt-10"> <input type="text" name="quantity[]" class="form-control" placeholder="quantity" aria-label="quantity" value=""></td>';
    html += '<td class="mt-10"><a class="btn btn-tbl-delete " onclick="$(\'#faqs-row' + faqs_row + '\').remove();"><i class="material-icons text-light">delete_forever</i></a></td>';
    html += '</tr>';
$('#faqs tbody').append(html);

faqs_row++;

$("#comosition_update").val(faqs_row);
}


function yogas_select_change() {
    $(".extra_faqs_rows").remove();
    if ($('#yogas_select').val() == 1) {
        $("#yogas_type").html($("#churna_yogas").html());
    } else if ($('#yogas_select').val() == 2) {
        $("#yogas_type").html($("#rasa_yogas").html());
    } else if ($('#yogas_select').val() == 3) {
        $("#yogas_type").html($("#vati_yogas").html());
    } else if ($('#yogas_select').val() == 4) {
        $("#yogas_type").html($("#talia_yogas").html());
    } else if ($('#yogas_select').val() == 5) {
        $("#yogas_type").html($("#asva_yogas").html());
    }

    // form validation
    $("#add_drug_details").validate({
        rules: {
          churna_yoga_type_individual: {
            required: true
          }
        },
        errorPlacement: function(error, element) {
          var name = $(element).attr("name");
          error.appendTo($("#" + name + "_err"));
        }
    });

    $("#add_rasayoga_details").validate({
        rules: {
            rasa_yoga_type_individual: {
            required: true
          }
        },
        errorPlacement: function(error, element) {
          var name = $(element).attr("name");
          error.appendTo($("#" + name + "_err"));
        }
    });

    $("#vati_yoga_details").validate({
        rules: {
            vati_yoga_type_individual: {
            required: true
          }
        },
        errorPlacement: function(error, element) {
          var name = $(element).attr("name");
          error.appendTo($("#" + name + "_err"));
        }
    });

    $("#talia_yogas_details").validate({
        rules: {
            talia_yoga_type_individual: {
            required: true
          }
        },
        errorPlacement: function(error, element) {
          var name = $(element).attr("name");
          error.appendTo($("#" + name + "_err"));
        }
    });

    $("#add_arishtayoga_details").validate({
        rules: {
            arishtayoga_type_individual: {
            required: true
          }
        },
        errorPlacement: function(error, element) {
          var name = $(element).attr("name");
          error.appendTo($("#" + name + "_err"));
        }
    });
}
    
var faqs_row = 0;

function addfaqs() {
    html = '<tr class="extra_faqs_rows" id="faqs-row' + faqs_row + '">';
    html +=
        '<td><input type="text" name="name_of_the_ingredients[]" class="form-control" placeholder="Enter name of the ingredients " aria-label="quantity" value="" maxlength="200"></td>';
    html +=
        '<td><input type="text" name="part_used[]" class="form-control" placeholder="Enter part used" aria-label="Part used" value="" maxlength="100"></td>';
    html +=
        '<td class="text-danger mt-10"> <input type="text" name="quantity[]" class="form-control" placeholder="Enter quantity" aria-label="quantity" value="" maxlength="10"></td>';
    html += '<td class="mt-10"><button class="btn btn-tbl-delete aapend-delete" onclick="$(\'#faqs-row' + faqs_row +
        '\').remove();"><i class="material-icons">delete_forever</i> </button></td>';

    html += '</tr>';

    $('#faqs tbody').append(html);

    faqs_row++;
}

// form validation
$("#add_drug_details").validate({
    rules: {
      churna_yoga_type_individual: {
        required: true
      }
    },
    errorPlacement: function(error, element) {
      var name = $(element).attr("name");
      error.appendTo($("#" + name + "_err"));
    }
});

$("#add_rasayoga_details").validate({
    rules: {
        rasa_yoga_type_individual: {
        required: true
      }
    },
    errorPlacement: function(error, element) {
      var name = $(element).attr("name");
      error.appendTo($("#" + name + "_err"));
    }
});

$("#vati_yoga_details").validate({
    rules: {
        vati_yoga_type_individual: {
        required: true
      }
    },
    errorPlacement: function(error, element) {
      var name = $(element).attr("name");
      error.appendTo($("#" + name + "_err"));
    }
});

$("#talia_yogas_details").validate({
    rules: {
        talia_yoga_type_individual: {
        required: true
      }
    },
    errorPlacement: function(error, element) {
      var name = $(element).attr("name");
      error.appendTo($("#" + name + "_err"));
    }
});

$("#add_arishtayoga_details").validate({
    rules: {
        arishtayoga_type_individual: {
        required: true
      }
    },
    errorPlacement: function(error, element) {
      var name = $(element).attr("name");
      error.appendTo($("#" + name + "_err"));
    }
});
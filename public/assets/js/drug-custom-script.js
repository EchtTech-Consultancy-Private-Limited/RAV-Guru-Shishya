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

var faqs_row = 0;
function addfaqs() {
html = '<tr id="faqs-row' + faqs_row + '">';
    html += '<input type="hidden" name="drug_part_id[]" value="0" >';

    html += '<td><input type="text" name="name_of_the_ingredients[]" class="form-control" placeholder="quantity" aria-label="quantity" value=""></td>';
    html += '<td><input type="text" name="part_used[]" class="form-control" placeholder="Part used" aria-label="Part used" value=""></td>';
    html += '<td class="text-danger mt-10"> <input type="text" name="quantity[]" class="form-control" placeholder="quantity" aria-label="quantity" value=""></td>';
    html += '<td class="mt-10"><a class="btn btn-tbl-delete " onclick="$(\'#faqs-row' + faqs_row + '\').remove();"><i class="material-icons text-light">delete_forever</i></a></td>';

   

    html += '</tr>';

$('#faqs tbody').append(html);

faqs_row++;

$("#comosition_update").val(faqs_row);
}
// End churna yoga

function yogas_select_change() {


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

}
</script>

<script>
var faqs_row = 0;

function churna() {
    html = '<tr id="faqs-row' + faqs_row + '">';
    html +=
        '<td><input type="text" name="name_of_the_ingredients[]" class="form-control" placeholder="Name of the ingredients Mineral" aria-label="quantity" value="" maxlength="200"></td>';
    html +=
        '<td><input type="text" name="part_used[]" class="form-control" placeholder="Part used" aria-label="Part used" value="" maxlength="100"></td>';
    html +=
        '<td class="text-danger mt-10"> <input type="text" name="quantity[]" class="form-control" placeholder="Quantity" aria-label="quantity" value="" maxlength="10"></td>';
    html += '<td class="mt-10"><button class="btn btn-tbl-delete" onclick="$(\'#faqs-row' + faqs_row +
        '\').remove();"><i class="material-icons">delete_forever</i> </button></td>';

    html += '</tr>';

    $('#churna tbody').append(html);

    faqs_row++;
}
function rasa() {
    html = '<tr id="faqs-row' + faqs_row + '">';
    html +=
        '<td><input type="text" name="name_of_the_ingredients[]" class="form-control" placeholder="Name of the ingredients Mineral" aria-label="quantity" value="" maxlength="200"></td>';
    html +=
        '<td><input type="text" name="part_used[]" class="form-control" placeholder="Part used" aria-label="Part used" value="" maxlength="100"></td>';
    html +=
        '<td class="text-danger mt-10"> <input type="text" name="quantity[]" class="form-control" placeholder="Quantity" aria-label="quantity" value="" maxlength="10"></td>';
    html += '<td class="mt-10"><button class="btn btn-tbl-delete" onclick="$(\'#faqs-row' + faqs_row +
        '\').remove();"><i class="material-icons">delete_forever</i> </button></td>';

    html += '</tr>';

    $('#rasa tbody').append(html);

    faqs_row++;
}
function vati() {
    html = '<tr id="faqs-row' + faqs_row + '">';
    html +=
        '<td><input type="text" name="name_of_the_ingredients[]" class="form-control" placeholder="Name of the ingredients Mineral" aria-label="quantity" value="" maxlength="200"></td>';
    html +=
        '<td><input type="text" name="part_used[]" class="form-control" placeholder="Part used" aria-label="Part used" value="" maxlength="100"></td>';
    html +=
        '<td class="text-danger mt-10"> <input type="text" name="quantity[]" class="form-control" placeholder="Quantity" aria-label="quantity" value="" maxlength="10"></td>';
    html += '<td class="mt-10"><button class="btn btn-tbl-delete" onclick="$(\'#faqs-row' + faqs_row +
        '\').remove();"><i class="material-icons">delete_forever</i> </button></td>';

    html += '</tr>';

    $('#vati tbody').append(html);

    faqs_row++;
}
function taila() {
    html = '<tr id="faqs-row' + faqs_row + '">';
    html +=
        '<td><input type="text" name="name_of_the_ingredients[]" class="form-control" placeholder="Name of the ingredients Mineral" aria-label="quantity" value="" maxlength="200"></td>';
    html +=
        '<td><input type="text" name="part_used[]" class="form-control" placeholder="Part used" aria-label="Part used" value="" maxlength="100"></td>';
    html +=
        '<td class="text-danger mt-10"> <input type="text" name="quantity[]" class="form-control" placeholder="Quantity" aria-label="quantity" value="" maxlength="10"></td>';
    html += '<td class="mt-10"><button class="btn btn-tbl-delete" onclick="$(\'#faqs-row' + faqs_row +
        '\').remove();"><i class="material-icons">delete_forever</i> </button></td>';

    html += '</tr>';

    $('#taila tbody').append(html);

    faqs_row++;
}
function asava() {
    html = '<tr id="faqs-row' + faqs_row + '">';
    html +=
        '<td><input type="text" name="name_of_the_ingredients[]" class="form-control" placeholder="Name of the ingredients Mineral" aria-label="quantity" value="" maxlength="200"></td>';
    html +=
        '<td><input type="text" name="part_used[]" class="form-control" placeholder="Part used" aria-label="Part used" value="" maxlength="100"></td>';
    html +=
        '<td class="text-danger mt-10"> <input type="text" name="quantity[]" class="form-control" placeholder="Quantity" aria-label="quantity" value="" maxlength="10"></td>';
    html += '<td class="mt-10"><button class="btn btn-tbl-delete" onclick="$(\'#faqs-row' + faqs_row +
        '\').remove();"><i class="material-icons">delete_forever</i> </button></td>';

    html += '</tr>';

    $('#asava tbody').append(html);

    faqs_row++;
}
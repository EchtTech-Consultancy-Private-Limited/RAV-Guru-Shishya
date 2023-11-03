$(function () {
    //Multi-select
    $("#optgroup").multiSelect({ selectableOptgroup: true });

    //Select2
    $(".select2").select2();

    $("#select2-search-hide").select2({
    minimumResultsForSearch: Infinity,
    });

    $("#select2-rtl-multiple").select2({
    placeholder: "RTL Select",
    dir: "rtl",
    });

    $("#select2-max-length").select2({
    maximumSelectionLength: 2,
    placeholder: "Select only maximum 2 items",
    });
});

function add_phr_func() {
    if(!confirm("Currently No Guru Assigned To You Kindly Contact To Admin"))
    event.preventDefault();
}

function send_to_guru() {
    if(!confirm("Are you sure to send this record to your assigned guru? \n Note: Once you send this record to your assigned guru,\n You can not edit this record."))
    event.preventDefault();
}


  $('.preventnumeric').keypress(function (e) {
        //alert("yes");
       var regex = new RegExp("^[a-z , A-Z_]");
       var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
       if (regex.test(str)) {
           return true;
       }
       e.preventDefault();
       return false;
   });

   $(document).ready(function() {
   
    if ( $.fn.dataTable.isDataTable( '#data_table' ) ) {
     table = $('#data_table').DataTable();
     table.destroy();
     table = $('#data_table').DataTable( {
         paging: false,
         searching: false,
         info:false
     } );
 }
 else {
     table = $('#data_table').DataTable( {
         paging: false,
         searching: false,
         info:false
     } );
 
 }
 
 
 function format ( d ) {
     // `d` is the original data object for the row
     return '<div class="slider">'+
         '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
             '<tr>'+
                 '<td class="slider-heading">Progress Duration:</td>'+
                 '<td>'+d.report_type+'</td>'+
             '</tr>'+
             '<tr>'+
                 '<td  class="slider-heading">Progress:</td>'+
                 '<td>'+d.progress+'</td>'+
             '</tr>'+
             '<tr>'+
                 '<td  class="slider-heading">Treatment/Therapies:</td>'+
                 '<td>'+d.treatment+'</td>'+
             '</tr>'+
 
         '</table>'+
     '</div>';
 }
 
 
 if ( $.fn.dataTable.isDataTable('#data_table1') ) {
     table = $('#data_table1').DataTable();
     table.destroy();
     var table = $('#data_table1').DataTable( {
         paging: false,
         searching: false,
         info:false,
         "columns": [
                 {
                     "class":          'details-control',
                     "orderable":      false,
                     "data":           null,
                     "defaultContent": ''
                 },
                 { "data": "s_no" },
                 { "data": "registration_no" },
                 { "data": "follow_up_date" },
                 { "data": "report_type" },
                 { "data": "progress" },
                 { "data": "treatment" }
             ],
             "order": [[1, 'desc']]
         } );
 } else {
     table = $('#data_table1').DataTable( {
         paging: false,
         searching: false,
         info:false
     } );
 
 }
 
     // Add event listener for opening and closing details
     $('#data_table1 tbody').on('click', 'td.details-control', function () {
         var tr = $(this).closest('tr');
         var row = table.row( tr );
 
         if ( row.child.isShown() ) {
             // This row is already open - close it
             $('div.slider', row.child()).slideUp( function () {
                 row.child.hide();
                 tr.removeClass('shown');
             } );
         }
         else {
             // Open this row
             row.child( format(row.data()), 'no-padding' ).show();
             tr.addClass('shown');
 
             $('div.slider', row.child()).slideDown();
         }
     } );
 
 
 
 });

 jQuery(document).ready(function() {
    
    // 1 Capitalize string - convert textbox user entered text to uppercase
    jQuery('#txtuppercase').keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
    
    // 2 Capitalize string first character to uppercase
    jQuery('#txtcapital').keyup(function() {
        var caps = jQuery('#txtcapital').val(); 
        caps = caps.charAt(0).toUpperCase() + caps.slice(1);
        jQuery('#txtcapital').val(caps);
    });
    
    // 3 Capitalize string every 1st chacter of word to uppercase
    jQuery('#txt_firstCapital').keyup(function() 
    {
        var str = jQuery('#txt_firstCapital').val();
       
        
        var spart = str.split(" ");
        for ( var i = 0; i < spart.length; i++ )
        {
            var j = spart[i].charAt(0).toUpperCase();
            spart[i] = j + spart[i].substr(1);
        }
      jQuery('#txt_firstCapital').val(spart.join(" "));
    
    });
});

// change data according select guru or shishya

    $( document ).ready(function() {
         $('#gurutype1').hide();
         $('#shishyatype1').hide();
      });

          $('#user_type').on('change', function(){
         
          var listvalue = $(this).val();
          //alert(listvalue);   
          if(listvalue==2)
          {
              $(".gurutype").show();
              $(".shishyatype").hide();
          } 
          else if(listvalue==3)
          {
             $(".gurutype").hide();
              $(".shishyatype").show();
          }
           
          else if(listvalue==1 || listvalue=='')
          {
             $(".gurutype").hide();
              $(".shishyatype").hide();
          }

             
            
         });

    // sweet alert msg
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);

// create pdf of patient history
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
 }
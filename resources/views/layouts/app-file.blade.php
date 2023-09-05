<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
     <title>RAV Guru Shishya Parampara</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script>
        var $baseurl="{{url('/')}}";
    </script>
    <!-- vendor css -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }} " type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="{{ asset('assets/css/app.min.css') }} " rel="stylesheet">
    <link href="{{ asset('assets/css/form.min.css') }}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{ asset('assets/css/style.css') }} " rel="stylesheet" />
    <link href="{{ asset('assets/css/custom.css') }} " rel="stylesheet" />
    <!-- You can choose a theme from css/styles instead of get all themes -->
    <link href="{{ asset('assets/css/styles/all-themes.css') }} " rel="stylesheet" />
    <!-- OLD LINK -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='#'></script>

    <script src="{{ asset('assets/js/pages/jquerylocal.js') }} "></script>

    <!-- <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




    <!-- #region datatables files -->
    <!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" /> -->

</head>
<body  class="light">
        <!-- [ Pre-loader ] start -->
         <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30">
                    <img class="loading-img-spin" src="{{ asset('assets/images/loading.png') }} " alt="loader">
                </div>
                <p>Please wait...</p>
            </div>
        </div>
       <!-- [ Pre-loader ] End -->

        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->

        <!-- [ Header ] start -->
        @include('layouts/partials.header')


       @if(Auth::user()->user_type==1)
       <div>
           @include('layouts/partials.sidebar')
       </div>
       @elseif(Auth::user()->user_type==3)
       <div>
           @include('layouts/partials.sidebar')
       </div>
       @elseif(Auth::user()->user_type==2)
       <div>
           @include('layouts/partials.sidebar')
       </div>
       @endif
       <!-- [ Side-bar ] Start -->

       <!-- [ Side-bar ] End -->

       @yield('content')

       <!-- [ Content ] Start -->


       <!-- [ Content ] End -->
       @include('layouts/partials.footer')


<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/table.min.js') }} "></script>
<!-- Custom Js -->
<script src="{{ asset('assets/js/admin.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>

<!-- Form validation js -->
<script src="{{ asset('assets/js/plugins/jquery.validate.min.js') }}"></script>
<!-- form-picker-custom Js -->
<script src="{{ asset('assets/js/pages/form-validation.js') }} "></script>

 <!-- Custom Js Multi Step Form -->
<script src="{{ asset('js/jquery.steps.min.js') }} "></script>
<script src="{{ asset('js/form-wizard.js') }} "></script>

<!-- <script src="{{ asset('assets/js/custom/custom.js') }} "></script> -->
<script src="{{ asset('assets/js/form.min.js') }}"></script>
<script src="{{ asset('assets/js/bundles/multiselect/js/jquery.multi-select.js') }}"></script>
<script>
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
</script>
<script>
     // alert for you have guru or not

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
</script>

<script>
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
 </script>

<!-- first letter capital  -->
<script>
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
</script>
<!--end first letter capital  -->

<!-- change data according select guru or shishya -->
<script>
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
</script>

</body>
</html>

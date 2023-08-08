<!doctype html>
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
    <link href="{{ asset('assets/css/custom.css') }} " rel="stylesheet">
    <link href="{{ asset('assets/css/form.min.css') }}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{ asset('assets/css/sign-upstyle.css') }} " rel="stylesheet" />
    <!-- You can choose a theme from css/styles instead of get all themes -->
    <link href="{{ asset('assets/css/styles/all-themes.css') }} " rel="stylesheet" />
    <!-- OLD LINK -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='#'></script>

    <!-- <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script> -->
    
    <script src="{{ asset('assets/js/pages/jquerylocal.js') }} "></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     

    <!-- #region datatables files -->
    <!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" /> -->

</head>
<body  class="light bg-img"  style="background-image: url({{ asset('assets/images/login_bg.jpg')}});z-index:999; background-attachment: fixed !important; background-color: none;">
     <!-- [ Pre-loader ] start -->
       
       <!-- [ Pre-loader ] End -->

        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->

        <!-- [ Header ] start -->
           
       <!-- [ Header ] end -->
       <div>
          
       </div>
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
     // disable alphate
     $('#mobile_no').keypress(function (e) {
          //alert("yes");
         var regex = new RegExp("^[0-9_]");
         var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
         if (regex.test(str)) {
             return true;
         }
         e.preventDefault();
         return false;
     });

     $('.preventnumeric').keypress(function (e) {
          //alert("yes");
         var regex = new RegExp("^[a-z,A-Z_]");
         var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
         if (regex.test(str)) {
             return true;
         }
         e.preventDefault();
         return false;
     });


     $( document ).ready(function() {
         $('#gurutype').hide();
         $('#shishyatype').hide();
      });

          $('#user_type').on('change', function(){

          var listvalue = $(this).val();
          //alert(listvalue);   
          if(listvalue==2)
          {
              $("#gurutype").show();
              $("#shishyatype").hide();
          } 
          else if(listvalue==3)
          {
             $("#gurutype").hide();
              $("#shishyatype").show();
          }
             
            
         });
</script>

</body>
</html>

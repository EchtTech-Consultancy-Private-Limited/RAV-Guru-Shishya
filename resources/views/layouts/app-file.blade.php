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
    <link rel="icon" href="{{ asset('assets/images/rav-logo.png') }} " type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="{{ asset('assets/css/app.min.css') }} " rel="stylesheet">
    <link href="{{ asset('assets/css/form.min.css') }}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{ asset('assets/css/style.css') }} " rel="stylesheet" />
    <link href="{{ asset('assets/css/custom.css') }} " rel="stylesheet" />
    <!-- You can choose a theme from css/styles instead of get all themes -->
    <link href="{{ asset('assets/css/styles/all-themes.css') }} " rel="stylesheet" />
    <!-- OLD LINK -->
    <link href="{{ asset('assets/plugins/font-awesome.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('assets/font-awesome-4.7.0/css/font-awesome.min.css') }} " rel="stylesheet" />
    <script type='text/javascript' src='#'></script>
    <script src="{{ asset('assets/js/pages/jquerylocal.js') }} "></script>
</head>
<body  class="light">
        <!-- [ Pre-loader ] start -->
         <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30">
                    <img class="loading-img-spin" src="{{ asset('assets/images/loading-7528_256.gif') }} " alt="loader">
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
       @elseif(Auth::user()->user_type==4)
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
<script src="{{ asset('assets/js/footer-custom-script.js') }}"></script>
<script src="{{ asset('assets/js/plugins/sweetalert.js') }}"></script>
</body>
</html>

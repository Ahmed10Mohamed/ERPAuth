<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  @if(env('APP_URL') == 'http://127.0.0.1:8000') data-assets-path="https://dash.fatshly.com/public/admin/" @else   data-assets-path="https://admin.cyberzai.com/admin/" @endif
  data-template="vertical-menu-template"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Admin | ERP </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('admin/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('admin/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/fonts/tabler-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/fonts/flag-icons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('admin/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('admin/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/libs/node-waves/node-waves.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/libs/typeahead-js/typeahead.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/libs/apex-charts/apex-charts.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/libs/select2/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/libs/animate-css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/libs/sweetalert2/sweetalert2.css')}}" />
    <!-- custom CSS -->

    <link rel="stylesheet" href="{{asset('datatables/datatables.bundle.css')}}">



  <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&amp;subset=latin-ext" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('ckeditor/css/samples.css')}}">
		<link rel="stylesheet" href="{{asset('ckeditor/toolbarconfigurator/lib/codemirror/neo.css')}}">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('admin/vendor/libs/bs-stepper/bs-stepper.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/libs/jquery-timepicker/jquery-timepicker.css')}}" />




    <!-- Page CSS -->


<!-- Vendors CSS -->
<link rel="stylesheet" href="{{asset('admin/vendor/libs/bs-stepper/bs-stepper.css')}}" />
<link rel="stylesheet" href="{{asset('admin/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{asset('css/toaster.css')}}">

<link rel="stylesheet" href="{{asset('admin/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{asset('admin/vendor/libs/pickr/pickr-themes.css')}}" />

@yield('css')


    <!-- Helpers -->
    <script src="{{asset('admin/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('admin/vendor/js/template-customizer.js')}}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('admin/js/config.js')}}"></script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-253086478-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-253086478-1');
</script>

</head>









<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
    <title>Tracer Study Polihasnur</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

  
    <!-- Favicons -->
    <link href="{{ asset('') }}/assets/images/polihasnur.png" rel="icon">
    <link href="{{ asset('') }}/assets/images/polihasnur.png" rel="apple-touch-icon">
  
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="{{ asset('nice') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('nice') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('nice') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('nice') }}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('nice') }}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{ asset('nice') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('nice') }}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    {{-- SweetAlert --}}
    <link rel="stylesheet" href="{{ asset('vendors/sweetalert/sweetalert.min.js') }}">

  
    <!-- Template Main CSS File -->
    <link href="{{ asset('nice') }}/assets/css/style.css" rel="stylesheet">
  
    @yield('styles')

    <!-- =======================================================
    * Template Name: NiceAdmin - v2.2.2
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    @toastr_css
</head>
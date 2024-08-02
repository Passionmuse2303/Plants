<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">

    <!-- Page Title -->
    @yield('page_title')

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/admin/imgs/theme/favicon.svg">

    <!-- Template CSS -->
    <link href="/assets/admin/css/main.css" rel="stylesheet" type="text/css" />

    <!-- Page Css -->
    @yield('page_css')
</head>

<body>
    <div class="screen-overlay"></div>
    @yield('page_subcontent_head')
    @include('Layout.admin_aside')
    @yield('content')
    <script src="/assets/admin/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="/assets/admin/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="/assets/admin/js/vendors/perfect-scrollbar.js"></script>
    <!-- Main Script -->
    <script src="/assets/admin/js/main.js" type="text/javascript"></script>

    <!-- Page JS -->
    @yield('page_js')
</body>

</html>
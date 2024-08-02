<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <!-- Page  title -->
    @yield('page_title')

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Page  meta_data -->
    @yield('page_meta')

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/user/imgs/theme/favicon.svg">
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/user/css/main.css?v=3.4">

    <!-- Page  Css -->
    @yield('page_css')

    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
</head>

<body>
    @yield('page_subcontent_head')
    <main class="main">
        @yield('content')
    </main>


    <!-- Vendor JS-->
    <script src="/assets/user/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/assets/user/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="/assets/user/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/assets/user/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="/assets/user/js/plugins/slick.js"></script>
    <script src="/assets/user/js/plugins/jquery.syotimer.min.js"></script>
    <script src="/assets/user/js/plugins/wow.js"></script>
    <script src="/assets/user/js/plugins/jquery-ui.js"></script>
    <script src="/assets/user/js/plugins/perfect-scrollbar.js"></script>
    <script src="/assets/user/js/plugins/magnific-popup.js"></script>
    <script src="/assets/user/js/plugins/select2.min.js"></script>
    <script src="/assets/user/js/plugins/waypoints.js"></script>
    <script src="/assets/user/js/plugins/counterup.js"></script>
    <script src="/assets/user/js/plugins/jquery.countdown.min.js"></script>
    <script src="/assets/user/js/plugins/images-loaded.js"></script>
    <script src="/assets/user/js/plugins/isotope.js"></script>
    <script src="/assets/user/js/plugins/scrollup.js"></script>
    <script src="/assets/user/js/plugins/jquery.vticker-min.js"></script>
    <script src="/assets/user/js/plugins/jquery.theia.sticky.js"></script>
    <script src="/assets/user/js/plugins/leaflet.js"></script>
    <!-- Template  JS -->
    <script src="/assets/user/js/main.js?v=3.4"></script>

    <!-- Page  JS -->
    @yield('page_js')
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Drift - A fully responsive, HTML5 based admin template">
    <meta name="keywords" content="Responsive, HTML5, admin theme, business, professional, jQuery, web design, CSS3, sass">
    <title>MFMCFUI</title>
    <link rel="shortcut icon" href="{{asset('assets/images/mfm-logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('design_modules/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/gaxon-icon/styles.css')}}">
    <link rel="stylesheet" href="{{asset('design_modules/perfect-scrollbar/css/perfect-scrollbar.css')}}"> 
    <link rel="stylesheet" href="{{asset('assets/css/semidark-style-1.min.css')}}">

</head>
<body class="dt-sidebar--fixed dt-header--fixed">

    <main class="py-4">
        @yield('content')
    </main>

    <script src="{{asset('design_modules/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('design_modules/moment/moment.js')}}"></script>
    <script src="{{asset('design_modules/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('design_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('design_modules/masonry-layout/dist/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('design_modules/sweetalert2/dist/sweetalert2.js')}}"></script>
    <script src="{{asset('assets/js/functions.js')}}"></script>
    <script src="{{asset('assets/js/customizer.js')}}"></script><!-- Custom JavaScript -->
    <script src="{{asset('assets/js/script.js')}}"></script>

</body>
</html>
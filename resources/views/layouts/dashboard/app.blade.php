<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>:: وظائف غزة ::</title>
    <link rel="icon" href="{{asset('suitcase.svg')}}" type="image/x-icon"> <!-- Favicon-->

    @stack('styles')

    <link rel="stylesheet" href="{{asset('dashboard_files/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('dashboard_files/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('dashboard_files/assets/plugins/morrisjs/morris.min.css')}}"/>
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('dashboard_files/rtl/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_files/rtl/assets/css/rtl.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard_files/rtl/assets/css/color_skins.css')}}">

    <!-- Fonts -->
    {{--<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"--}}
          {{--rel="stylesheet">--}}
    {{--<style>--}}
        {{--* {--}}
            {{--font-family: cairo;--}}
        {{--}--}}
    {{--</style>--}}


</head>
<body class="theme-cyan rtl">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{asset('suitcase.svg')}}" width="48" height="48" alt="Oreo">
        </div>
        <p>الرجاء الانتظار...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Top Bar -->
<nav class="navbar p-l-5 p-r-5">
    <ul class="nav navbar-nav navbar-left">
        <li>
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="">
                    <img src="{{asset('suitcase.svg')}}" width="30" alt="Oreo">
                    <span class="m-l-10">وظائف غزة</span>
                </a>
            </div>
        </li>
        <li>
            <a href="javascript:void(0);" class="ls-toggle-btn" data-close="true">
                <i class="zmdi zmdi-swap"></i>
            </a>
        </li>

        <li class="float-right">
            <a href="{{route('dashboard.logout')}}" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i>
                تسجيل خروج</a>
        </li>
    </ul>
</nav>

@include('layouts.dashboard._aside')

@yield('content')

<!-- Jquery Core Js -->
<script src="{{asset('dashboard_files/rtl/assets/bundles/libscripts.bundle.js')}}"></script>
<!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="{{asset('dashboard_files/rtl/assets/bundles/vendorscripts.bundle.js')}}"></script>
<!-- slimscroll, waves Scripts Plugin Js -->

<script src="{{asset('dashboard_files/assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
<!-- Bootstrap Notify Plugin Js -->


<script src="{{asset('dashboard_files/rtl/assets/bundles/morrisscripts.bundle.js')}}"></script>
<!-- Morris Plugin Js -->
<script src="{{asset('dashboard_files/rtl/assets/bundles/jvectormap.bundle.js')}}"></script>
<!-- JVectorMap Plugin Js -->
<script src="{{asset('dashboard_files/rtl/assets/bundles/knob.bundle.js')}}"></script>
<!-- Jquery Knob, Count To, Sparkline Js -->

<script src="{{asset('dashboard_files/rtl/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('dashboard_files/rtl/assets/js/pages/ui/notifications.js')}}"></script> <!-- Custom Js -->
<script src="{{asset('dashboard_files/rtl/assets/js/pages/index.js')}}"></script>

{{--<script src="http://unpkg.com/turbolinks"></script>--}}

@if(session('success'))
    <script type="text/javascript">
        $(document).ready(function () {
            var allowDismiss = true;

            $.notify({
                    message: "{{ session('success') }}"
                },
                {
                    type: "alert-success",
                    allow_dismiss: allowDismiss,
                    newest_on_top: true,
                    timer: 1000,
                    placement: {
                        from: "bottom",
                        align: "left"
                    },
                    animate: {
                        enter: "animated fadeIn",
                        exit: "animated fadeOut"
                    },
                    template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-35" : "") + '" role="alert">' +
                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                        '<span data-notify="icon"></span> ' +
                        '<span data-notify="title">{1}</span> ' +
                        '<span data-notify="message">{2}</span>' +
                        '<div class="progress" data-notify="progressbar">' +
                        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                        '</div>' +
                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                        '</div>'
                });
        });
    </script>
@endif

@stack('scripts')

</body>
</html>
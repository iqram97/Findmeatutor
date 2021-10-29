<!doctype html>
<html class="no-js " lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Meta -->
    <title>Find A Tutor - @yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('/')}}frontEnd/images/fab.png" type="image/x-icon"/>
    <link rel="apple-touch-icon" href="{{asset('/')}}frontEnd/images/apple-touch-icon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" rel="stylesheet">

    <!-- Custom & Default Styles -->
    <link rel="stylesheet" href="{{asset('/')}}frontEnd/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}frontEnd/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/')}}frontEnd/css/carousel.css">
    <link rel="stylesheet" href="{{asset('/')}}frontEnd/css/animate.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}frontEnd/css/bootstrap-datetimepicker.min.css">


    <link rel="stylesheet" href="{{asset('/')}}frontEnd/css/style.css">
    <link rel="stylesheet" href="{{asset('/')}}frontEnd/css/custom.css">

    @yield('custom_css')
</head>
<body>

<!-- LOADER -->
<div id="preloader">
    <img class="preloader" src="{{asset('/')}}frontEnd/images/loader.gif" alt="">
</div><!-- end loader -->
<!-- END LOADER -->

<div id="wrapper">
    <!-- BEGIN # MODAL LOGIN -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                    <form id="login-form">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="flaticon-add" aria-hidden="true"></span>
                        </button>
                        <div class="modal-body">
                            <input class="form-control" type="text" placeholder="What you are looking for?" required>
                        </div>
                    </form><!-- End # Login Form -->
                </div><!-- End # DIV Form -->
            </div>
        </div>
    </div>
    <!-- END # MODAL LOGIN -->

    @include('FrontEnd.include.header')

    @yield('body')

    @include('FrontEnd.include.footer')
</div><!-- end wrapper -->

<!-- jQuery Files -->
<script src="{{asset('/')}}frontEnd/js/jquery.min.js"></script>
<script src="{{asset('/')}}frontEnd/js/bootstrap.min.js"></script>
<script src="{{asset('/')}}frontEnd/js/carousel.js"></script>
<script src="{{asset('/')}}frontEnd/js/animate.js"></script>
<script src="{{asset('/')}}frontEnd/js/custom.js"></script>
<!-- VIDEO BG PLUGINS -->
<script src="{{asset('/')}}frontEnd/js/videobg.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="{{asset('/')}}frontEnd/js/moment.min.js"></script>
<script src="{{asset('/')}}frontEnd/js/bootstrap-datetimepicker.min.js"></script>

<script>
    @if(session()->has('success'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true,
        };
    toastr.success("{{ session('success') }}");
    @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        };
    toastr.error("{{ session('error') }}");
    @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        };
    toastr.info("{{ session('info') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        };
    toastr.warning("{{ session('warning') }}");
    @endif


    if ($('.datetimepicker').length > 0) {
        $('.datetimepicker').datetimepicker({
            icons:
                {
                    next: 'fa fa-angle-right',
                    previous: 'fa fa-angle-left'
                },
            minDate: new Date(),
        });
    }

    $(function () {
        $('.time').datetimepicker({
            icons:
                {
                    up: 'fa fa-angle-up',
                    down: 'fa fa-angle-down'
                },
            format: 'LT',
        })
    });

</script>

@yield('custom_js')

</body>
</html>

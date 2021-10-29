<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/')}}backEnd/images/fab.png">
    <title>Find A Tutor (Tutors) - Register</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('/')}}backEnd/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{asset('/')}}backEnd/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('/')}}backEnd/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{asset('/')}}backEnd/css/colors/default.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="new-login-register">
    <div class="lg-info-panel" style="background-image: url({{asset('/')}}frontEnd/images/banner3.jpg) !important;">
        <div class="inner-panel">
            <a href="{{route('home')}}" class="p-20 di"><img width="30" src="{{asset('/')}}backEnd/images/fab.png"></a>
        </div>
    </div>
    <div class="new-login-box">
        <div class="white-box">
            <h3 class="box-title m-b-0">Sign UP to Tutors</h3> <small>Enter your details below</small>
            <form class="form-horizontal new-lg-form" id="loginform" action="{{route('tutor.register')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="" placeholder="First Name" name="first_name">
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="" placeholder="Last Name" name="last_name">
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="email" required="" placeholder="Email" name="email"></div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" required="" placeholder="Password" name="password"></div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <label for="avatar">Avatar</label>
                        <input class="form-control" type="file" id="avatar" placeholder="Avatar" name="avatar"></div>
                </div>

                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>Already have an account? <a href="{{route('tutor.login')}}" class="text-danger m-l-5"><b>Sign In</b></a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- jQuery -->
<script src="{{asset('/')}}backEnd/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('/')}}backEnd/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{asset('/')}}backEnd/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

<!--slimscroll JavaScript -->
<script src="{{asset('/')}}backEnd/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="{{asset('/')}}backEnd/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="{{asset('/')}}backEnd/js/custom.min.js"></script>
<!--Style Switcher -->
<script src="{{asset('/')}}backEnd/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

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
</script>

</body>
</html>

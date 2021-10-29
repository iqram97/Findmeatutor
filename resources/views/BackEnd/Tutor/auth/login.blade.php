<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/')}}backEnd/images/fab.png">
    <title>Find A Tutor (Tutor) - Login</title>
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
            <h3 class="box-title m-b-0">Sign In to Tutor</h3>
            <small>Enter your details below</small>
            <form method="post" action="{{route('tutor.login')}}" class="form-horizontal new-lg-form" id="loginform">
                @csrf
                <div class="form-group  m-t-20">
                    <div class="col-xs-12">
                        <label>Tutor Email Address</label>
                        <input class="form-control" type="text" required="" placeholder="Tutor Email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label>Tutor Password</label>
                        <input name="password" class="form-control" type="password" required="" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-info pull-left p-t-0">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup"> Remember me </label>
                        </div>
                        <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a></div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                        <div class="social"><a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i
                                    aria-hidden="true" class="fa fa-facebook"></i> </a> <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip"
                                                                                           title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i>
                            </a></div>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>Don't have an account? <a href="{{route('tutor.register')}}" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                    </div>
                </div>
            </form>


            <form class="form-horizontal" id="recoverform" action="index.html">
                <div class="form-group ">
                    <div class="col-xs-12">
                        <h3>Recover Password</h3>
                        <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="" placeholder="Email">
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
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

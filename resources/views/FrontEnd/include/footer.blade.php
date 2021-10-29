<footer class="section footer noover">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="widget clearfix">
                    <h3 class="widget-title">Subscribe Our Newsletter</h3>
                    <div class="newsletter-widget">
                        <form class="form-inline" action="{{route('subscriber.store')}}" method="post">
                            @csrf
                            <div class="form-1">
                                <input type="text" class="form-control" name="email" placeholder="Enter email here.." required>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane-o"></i></button>
                            </div>
                        </form>
{{--                        <img src="{{asset('/')}}frontEnd/images/payments.png" alt="" class="img-responsive">--}}
                    </div><!-- end newsletter -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-3 col-md-3">
                <div class="widget clearfix">
                    <h3 class="widget-title">Join us today</h3>
                    <p>Become a tutor and start earning! Easiest way to create tutor profile</p>
                    <a href="{{route('tutor.register')}}" target="_blank" class="readmore">Became a Tutor</a>
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-3 col-md-3">
                <div class="widget clearfix">
                    <h3 class="widget-title">Popular Tags</h3>
                    <div class="tags-widget">
                        <ul class="list-inline">
                            <li><a href="#">tutor</a></li>
                            <li><a href="#">tuition</a></li>
                            <li><a href="#">online class</a></li>
                            <li><a href="#">student</a></li>
                        </ul>
                    </div><!-- end list-widget -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-2 col-md-2">
                <div class="widget clearfix">
                    <h3 class="widget-title">Support Links</h3>
                    <div class="list-widget">
                        <ul>
                            <li><a href="#">Terms & Condition</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Carrier</a></li>
                        </ul>
                    </div><!-- end list-widget -->
                </div><!-- end widget -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</footer><!-- end footer -->

<div class="copyrights">
    <div class="container">
        <div class="clearfix">
            <div class="pull-left">
                <div class="cop-logo">
                    <a href="{{route('home')}}"><img src="{{asset($web_config->website_footer_logo)}}" alt=""></a>
                </div>
            </div>

            <div class="pull-right">
                <div class="footer-links">
                    <ul class="list-inline">
                        <li>{{$web_config->website_copyright_text}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- end container -->
</div><!-- end copy -->

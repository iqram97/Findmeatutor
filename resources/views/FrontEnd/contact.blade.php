@extends('FrontEnd.layout.master')
@section('title')
    Contact
@endsection

@section('body')
    <section class="section db p120">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tagline-message page-title text-center">
                        <h3>Get In Touch</h3>
                        <ul class="breadcrumb">
                            <li><a href="javascript:void(0)">Home</a></li>
                            <li class="active">Get in touch</li>
                        </ul>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end section -->

    <section class="section gb nopadtop">
        <div class="container">
            <div class="boxed boxedp4">

                <div class="row contactv2 text-center">
                    <div class="col-md-4">
                        <div class="small-box">
                            <i class="flaticon-email wow fadeIn"></i>
                            <h4>Contact us today</h4>
                            <small>Phone: +90 987 665 55 44</small>
                            <small>Fax:  +90 987 665 55 45</small>
                            <p><a href="mail:to">info@yoursite.com</a></p>
                        </div><!-- end small-box -->
                    </div><!-- end col -->

                    <div class="col-md-4">
                        <div class="small-box">
                            <i class="flaticon-map-with-position-marker wow fadeIn"></i>
                            <h4>Visit Our Office</h4>
                            <small>PO Box 16122 Collins Street West</small>
                            <small>Victoria 8007 Australia</small>
                            <p><a href="#">View on Google Map</a></p>
                        </div><!-- end small-box -->
                    </div><!-- end col -->

                    <div class="col-md-4">
                        <div class="small-box">
                            <i class="flaticon-share wow fadeIn"></i>
                            <h4>Be Social</h4>
                            <small>Twitter: @yourhandle</small>
                            <small>Facebook: facebook.com/yourhandle</small>
                            <p><a href="#">Email Newsletter</a></p>
                        </div><!-- end small-box -->
                    </div><!-- end col -->
                </div><!-- end contactv2 -->

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="section-title text-center">
                            <h3>Contact Form</h3>
                            <p>Maecenas sit amet tristique turpis. Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis.</p>
                        </div><!-- end title -->

                        <form class="big-contact-form" role="search">
                            <input type="text" class="form-control" placeholder="Enter your name..">
                            <input type="email" class="form-control" placeholder="Enter email..">
                            <input type="text" class="form-control" placeholder="Your phone..">
                            <input type="text" class="form-control" placeholder="Subject..">
                            <textarea class="form-control" placeholder="Message goes here.."></textarea>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div>
    </section>
@endsection

@extends('FrontEnd.layout.master')
@section('title')
    Home
@endsection

@section('body')
    <section {{--id="home"--}} class="video-section js-height-full"
             style="background: url({{asset('frontEnd/images/banner1.jpg')}});background-size: cover;background-position: center;background-repeat: no-repeat;">
        <div class="overlay"></div>
        <div class="home-text-wrapper relative container">
            <div class="home-message">
                <p>Find And Hire Perfect Tutor</p>
                <small>Get your desired tutor now.</small>
                <div class="btn-wrapper">
                    <div class="text-center">
                        <a href="{{route('hire.tutor.index')}}" class="btn btn-primary wow slideInLeft">Hire Now</a>
                    </div>
                </div><!-- end row -->
            </div>
        </div>
        <div class="slider-bottom">
            <span>Explore <i class="fa fa-angle-down"></i></span>
        </div>
    </section>

    {{--<section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 hidden-sm hidden-xs">
                    <div class="custom-module">
                        <img src="{{asset('/')}}frontEnd/upload/device_01.png" alt="" class="img-responsive wow slideInLeft">
                    </div><!-- end module -->
                </div><!-- end col -->
                <div class="col-md-8">
                    <div class="custom-module p40l">
                        <h2>We are a passionate
                            <mark>learning system</mark>
                            from<br>
                            London. Do beautiful and easy-to-use digital <br>
                            design & web development
                        </h2>

                        <p> Must be responsible at time maintaning and regular attending .</p>

                        <hr class="invis">

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 first">
                                <ul class="check">
                                    <li>Custom Shortcodes</li>
                                    <li>Visual Page Builder</li>
                                    <li>Unlimited Shortcodes</li>
                                    <li>Responsive Theme</li>
                                    <li>Tons of Layouts</li>
                                </ul><!-- end check -->
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <ul class="check">
                                    <li>Font Awesome Icons</li>
                                    <li>Pre-Defined Colors</li>
                                    <li>AJAX Transitions</li>
                                    <li>High Quality Support</li>
                                    <li>Unlimited Options</li>
                                </ul><!-- end check -->
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 last">
                                <ul class="check">
                                    <li>Shopping Layouts</li>
                                    <li>Pre-Defined Fonts</li>
                                    <li>Style Changers</li>
                                    <li>Footer Styles</li>
                                    <li>Header Styles</li>
                                </ul><!-- end check -->
                            </div><!-- end col-lg-4 -->
                        </div><!-- end row -->

                        <hr class="invis">

                        <div class="btn-wrapper">
                            <a href="#" class="btn btn-primary">Learn More About us</a>
                        </div>

                    </div><!-- end module -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>--}}

    <section class="section gb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Available Tuitions (Area)</h3>
                <p>All available tuition areas are listed bellow</p>
            </div><!-- end title -->

            <div class="row">
                @foreach($data['areas'] as $item)
                    {{--                    @dd($item->getJobs->where('status',1)->count())--}}
                    <div class="col-lg-3 mb-1">
                        <div class="course-box">
                            <div class="image-wrap entry">
                                <img src="{{asset('/')}}{{$item->area_image}}" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="{{route('area.job.board.index',$item->id)}}" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div><!-- end image-wrap -->
                            <div class="course-details">
                                <h4 style="padding-bottom: 0;">
                                    <a href="{{route('area.job.board.index',$item->id)}}" title="">{{$item->name}} <span style="color: #14CF68">({{$item->getJobs->where('status',1)->count()}})</span></a>
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    {{--<section class="section db p120">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tagline-message text-center">
                        <h3>Howdy, we are Edulogy, we have brought together the best quality services, offers, projects for you!</h3>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end section -->

    <section class="section gb nopadtop">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="box m30">
                        <i class="flaticon-computer-tool-for-education"></i>
                        <h4>Learning system</h4>
                        <p>All sections required for online training are included to Edulogy.</p>
                        <a href="#" class="readmore">Read more</a>
                    </div>
                </div><!-- end col -->

                <div class="col-md-6">
                    <div class="box m30">
                        <i class="flaticon-monitor-tablet-and-smartohone"></i>
                        <h4>Works all mobile devices</h4>
                        <p>The most important feature of this template is that it is compatible with all mobile devices. Your customers can also visit your site easily
                            from tablets and phones.</p>
                        <a href="#" class="readmore">Read more</a>
                    </div>
                </div><!-- end col -->

                <div class="col-md-3">
                    <div class="box m30">
                        <i class="flaticon-download-business-statistics-symbol-of-a-graphic"></i>
                        <h4>User Dashboard</h4>
                        <p>We designed the design of all the sub-pages needed for the users.</p>
                        <a href="#" class="readmore">Read more</a>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="invis">

            <div class="row">
                <div class="col-md-6">
                    <div class="box">
                        <i class="flaticon-html5"></i> <i class="flaticon-css-3"></i>
                        <h4>Compatible HTML5 & CSS3</h4>
                        <p>HTML5 is a markup language used for structuring and presenting content on the World Wide Web. It is the fifth and current version of the HTML
                            standard.</p>
                        <a href="#" class="readmore">Read more</a>
                    </div>
                </div><!-- end col -->

                <div class="col-md-6">
                    <div class="box">
                        <i class="flaticon-html-coding"></i>
                        <h4>Bootstrap Framework</h4>
                        <p>Bootstrap is a technique of loading a program into a computer by means of a few initial instructions which enable the introduction of the rest
                            of the program from an input device.</p>
                        <a href="#" class="readmore">Read more</a>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>--}}

    <section class="section db">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 text-center">
                    <div class="stat-count">
                        <h4 class="stat-timer">{{$data['students']->count()}}</h4>
                        <h3><i class="flaticon-black-graduation-cap-tool-of-university-student-for-head"></i> Happy Students/Parents</h3>
                        {{--                        <p>Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. </p>--}}
                    </div><!-- stat-count -->
                </div><!-- end col -->

                <div class="col-lg-4 col-md-4 text-center">
                    <div class="stat-count">
                        <h4 class="stat-timer">{{$data['tutors']->count()}}</h4>
                        <h3><i class="flaticon-online-course"></i> Total Tutors</h3>
                        {{--                        <p>Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. </p>--}}
                    </div><!-- stat-count -->
                </div><!-- end col -->

                <div class="col-lg-4 col-md-4 text-center">
                    <div class="stat-count">
                        <h4 class="stat-timer">{{\App\JobBoard::where('status',3)->count()}}</h4>
                        <h3><i class="flaticon-coffee-cup"></i> Hired Tutors</h3>
                        {{--                        <p>Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. </p>--}}
                    </div><!-- stat-count -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>


    <section class="section gb">
        <div class="container">
            <div class="section-title text-center">
                <h3>How it works for students/parents?</h3>
            </div><!-- end title -->

            <div class="row">
                <div class="col-lg-4 col-md-12 text-center">
                    <img width="100" src="{{asset('/')}}frontEnd/upload/how-for-parents/tutor-requirement.png" alt="">
                    <div class="blog-desc">
                        <h4><a href="#">Post Your Desire Tutor Requirements</a></h4>
                        <p>Post your Tutor requirements. Our experts will analyze it and live your requirements to our job board.</p>
                    </div><!-- end blog-desc -->
                </div><!-- end col -->


                <div class="col-lg-4 col-md-12 text-center">
                    <img width="100" src="{{asset('/')}}frontEnd/upload/how-for-parents/get-cv.png" alt="">
                    <div class="blog-desc">
                        <h4><a href="#">Get the Best 5 Tutor's CVs</a></h4>
                        <p>You'll receive the 5 (max) best Tutor's CVs in your account within 48 hours which closely match to your requirements.</p>
                    </div><!-- end blog-desc -->
                </div><!-- end col -->


                <div class="col-lg-4 col-md-12 text-center">
                    <img width="100" src="{{asset('/')}}frontEnd/upload/how-for-parents/select-candidate.png" alt="">
                    <div class="blog-desc">
                        <h4><a href="#">Select the Perfect One & Start Learning</a></h4>
                        <p>Choose the best one among the 5 CV's. Offer the selected Tutor for few trial classes before taking the regular classes.</p>
                    </div><!-- end blog-desc -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="invis">

            <div class="section-button text-center">
                <a href="{{route('student.register')}}" class="btn btn-primary">Sign Up For Student/Parents</a>
            </div>
        </div><!-- end container -->
    </section>


    <section class="section">
        <div class="container">
            <div class="section-title text-center">
                <h3>Parent's Reviews</h3>
                <p style="color: black">Most trusted & advance way to hire a tutor! Hire a tutor today & start learning</p>
            </div><!-- end title -->

            <div class="row">
                @foreach($data['s_review'] as $item)
                    <div class="col-md-4">
                        <div class="box testimonial">
                            <p class="testiname"><strong><img src="{{$item->avatar ? asset($item->avatar) : asset('backEnd/images/avatar.jpg')}}" alt="" class="img-circle"> {{$item->first_name}} {{$item->last_name}}</strong>
                            </p>
                            <p class="testimonial_text">{{$item->message}}</p>
                            <div class="rating">
                                <i>{{$item->address}}</i>
                            </div>
                        </div><!-- end testimonial -->
                    </div>
                @endforeach
                {{--<div class="col-md-4">
                    <div class="box testimonial">
                        <p class="testiname"><strong><img src="{{asset('/')}}uploads/testimonials/Zakaria_Habib.jpg" alt="" class="img-circle"> Zakaria Habib</strong></p>
                        <p class="testimonial_text">I found this platform very safe & secure. I already got three tutors by using this platform and feeling like they are
                            being part of our family. Best wishes for the Find A Tutor family.</p>
                        <div class="rating">
                            <i>Anderkilla, Chattogram</i>
                        </div>
                    </div><!-- end testimonial -->
                </div><!-- end col -->

                <div class="col-md-4">
                    <div class="box testimonial">
                        <p class="testiname"><strong><img src="{{asset('/')}}uploads/testimonials/10644464_994033127302047_7342254430010718888_n.jpg" alt=""
                                                          class="img-circle"> Ariful Islam</strong></p>
                        <p class="testimonial_text">I am very satisfied with this platform. Find A Tutor really help me to find the right tutor. I will recommend this
                            service to others.</p>
                        <div class="rating">
                            <i>Mirpur, Dhaka</i>
                        </div>
                    </div><!-- end testimonial -->
                </div><!-- end col -->

                <div class="col-md-4">
                    <div class="box testimonial">
                        <p class="testiname"><strong><img src="{{asset('/')}}uploads/testimonials/Shanjidul_Bari.jpg" alt="" class="img-circle"> Shanjidul Bari</strong>
                        </p>
                        <p class="testimonial_text">Find A Tutor gives you a good selection of tutors' profiles. I am very pleased with the effort of the tutors taking
                            care of my child. The tutors try their very best to identify the problems, encourage my children to study and gain interest in the subjects
                            they study. I show my utmost gratidue and thank Find A Tutor for connecting the tutors to us parents who always want the best in our
                            children.</p>
                        <div class="rating">
                            <i>Mirpur, Dhaka</i>
                        </div>
                    </div><!-- end testimonial -->
                </div>--}}
            </div>
        </div>
    </section>


    <section class="section gb">
        <div class="container">
            <div class="section-title text-center">
                <h3>How it works for tutors?</h3>
            </div><!-- end title -->

            <div class="row">
                <div class="col-lg-4 col-md-12 text-center">
                    <img width="100" src="{{asset('/')}}frontEnd/upload/how-for-tutor/create-account.png" alt="">
                    <div class="blog-desc">
                        <h4><a href="#">Create a Free Account</a></h4>
                        <p>Make your profile in minutes. Add your educational information, preferred locations, classes/courses, and make your profile presentable.</p>
                    </div><!-- end blog-desc -->
                </div><!-- end col -->


                <div class="col-lg-4 col-md-12 text-center">
                    <img width="100" src="{{asset('/')}}frontEnd/upload/how-for-tutor/apply-job.png" alt="">
                    <div class="blog-desc">
                        <h4><a href="#">Apply to Your Desired Tuition Job</a></h4>
                        <p>Check our job board everyday and apply to your preferred tutoring jobs that match your skills.</p>
                    </div><!-- end blog-desc -->
                </div><!-- end col -->


                <div class="col-lg-4 col-md-12 text-center">
                    <img width="100" src="{{asset('/')}}frontEnd/upload/how-for-tutor/start-tutor.png" alt="">
                    <div class="blog-desc">
                        <h4><a href="#">Start Tutoring</a></h4>
                        <p>Get selected by students/parents if your expertise matches their requirements.</p>
                    </div><!-- end blog-desc -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="invis">

            <div class="section-button text-center">
                <a href="{{route('tutor.register')}}" class="btn btn-primary">Sign Up For Tutor</a>
            </div>
        </div><!-- end container -->
    </section>


    <section class="section">
        <div class="container">
            <div class="section-title text-center">
                <h3>Tutor's Reviews</h3>
                <p style="color: black">Become a tutor and start earning! Easiest way to create tutor profile</p>
            </div><!-- end title -->

            <div class="row">
                @foreach($data['t_review'] as $item)
                    <div class="col-md-4">
                        <div class="box testimonial">
                            <p class="testiname"><strong><img src="{{$item->avatar ? asset($item->avatar) : asset('backEnd/images/avatar.jpg')}}" alt="" class="img-circle"> {{$item->first_name}} {{$item->last_name}}</strong>
                            </p>
                            <p class="testimonial_text">{{$item->message}}</p>
                            <div class="rating">
                                <i>{{$item->address}}</i>
                            </div>
                        </div><!-- end testimonial -->
                    </div>
                @endforeach
                {{--<div class="col-md-4">
                    <div class="box testimonial">
                        <p class="testiname"><strong><img src="{{asset('/')}}uploads/testimonials/rsz_hafez_mawlana_md_yousuf_jamia_husainia_islamia_arzabad_madrasah.jpg"
                                                          alt="" class="img-circle"> Hafez Mwl. Md. Yousuf</strong></p>
                        <p class="testimonial_text">A very nice interaction and build upping of tuition career through Caretutors.com, it's a very good source for getting
                            teaching related job. They are so much reliable and connect people with polite behavior. My experience has been riched with accuracy. In
                            today's situation, we have such a huge importance of awareness. because of the risky Circumstance. with full realization, I can confess that
                            Caretutors.com is the best and most trustworthy website among all. For finding perfect tuition with a standard salary, this site is very
                            helpful. Also for the students, this site is very helpful for searching for a qualified teacher. I really appreciate Caretutors.com from the
                            bottom of my heart. Thanks a lot for giving me such a great opportunity. best wishes always.</p>
                        <div class="rating">
                            <i>Jamia Husainia Islamia Arzabad Madrasah</i>
                        </div>
                    </div><!-- end testimonial -->
                </div><!-- end col -->

                <div class="col-md-4">
                    <div class="box testimonial">
                        <p class="testiname"><strong><img src="{{asset('/')}}uploads/testimonials/rsz_maruf_ul_islam_maruf_bup.jpg" alt="" class="img-circle"> Md. Maruf
                                Ul Islam Maruf</strong></p>
                        <p class="testimonial_text">The journey with Caretutors.com has been amazing, as it has brought all the relevant tuitions which I am capable of.
                            The media and application process was simple and smooth and most importantly safe compared to other sites.</p>
                        <div class="rating">
                            <i>Bangladesh University of Professionals (BUP)</i>
                        </div>
                    </div><!-- end testimonial -->
                </div><!-- end col -->

                <div class="col-md-4">
                    <div class="box testimonial">
                        <p class="testiname"><strong><img src="{{asset('/')}}uploads/testimonials/humaira_afia_nisu_nsu.jpg" alt="" class="img-circle"> Humaira Afia Nisu</strong>
                        </p>
                        <p class="testimonial_text">I had a great experience with Caretutors.com. Professional behaviour, ensuring tutors safety these are the things
                            amazed me the most. Highly recommend their service.</p>
                        <div class="rating">
                            <i>North South University (NSU)</i>
                        </div>
                    </div><!-- end testimonial -->
                </div>--}}
            </div>
        </div>
    </section>

    {{--<section class="section bgcolor1">
        <div class="container">
            <a href="#">
                <div class="row callout">
                    <div class="col-md-4 text-center">
                        <h3><sup>$</sup>49.99</h3>
                        <h4>Start your awesome course today!</h4>
                    </div><!-- end col -->

                    <div class="col-md-8">
                        <p class="lead">Limited time offer! Your profile will be added to our "Students" directory as well. </p>
                    </div>
                </div><!-- end row -->
            </a>
        </div><!-- end container -->
    </section>--}}
@endsection

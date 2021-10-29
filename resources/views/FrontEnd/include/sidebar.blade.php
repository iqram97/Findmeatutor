<div class="col-lg-3">
    <div class="course-box" style="border-radius: 6px !important;background: #DEE1E6;border: 1px solid #d1d7e2;">
        @if(Auth::guard('student')->check())
            <div class="course-details">
                <div class="avatar text-center">
                    <img style="border-radius: 50%;width: 130px"
                         src="{{Auth::guard('student')->user()->avatar ? asset(Auth::guard('student')->user()->avatar) : asset('backEnd/images/avatar.jpg')}}" alt="">
                </div>

                <div class="user_info">
                    <h4 class="text-center"
                        style="margin-top: 10px;padding-bottom: 0">{{Auth::guard('student')->user()->first_name}} {{Auth::guard('student')->user()->last_name}}</h4>
                    <h5 class="text-center">{{Auth::guard('student')->user()->email}}</h5>
                    <h5 class="text-center">Student/Parent ID: {{Auth::guard('student')->user()->id}}</h5>
                </div>

                <div class="u_menu text-left" style="margin-top: 40px;">
                    <a href="{{route('student.home')}}" style="margin-bottom: 5px;">
                        <div class="u_menu_btn {{request()->is('student/dashboard*') ?"u_menu_btn_active":""}}">
                            <i class="fa fa-desktop"></i>&emsp;&emsp;Dashboard
                        </div>
                    </a>

                    <a href="{{route('hire.tutor.index')}}" style="margin-bottom: 5px;">
                        <div class="u_menu_btn {{request()->is('hire-tutor*') ?"u_menu_btn_active":""}}">
                            <i class="fa fa-user-plus"></i>&emsp;&emsp;Hire Tutor
                        </div>
                    </a>

                    <a href="{{route('job.posted.index')}}" style="margin-bottom: 5px;">
                        <div class="u_menu_btn {{request()->is('job-posted*') ?"u_menu_btn_active":""}}">
                            <i class="fa fa-file-pdf-o"></i>&emsp;&emsp;Posted Tuition
                        </div>
                    </a>

                    <a href="{{route('tutor.request')}}" style="margin-bottom: 5px;">
                        <div class="u_menu_btn {{request()->is('tutor-request*') ?"u_menu_btn_active":""}}">
                            <i class="fa fa-hand-paper-o"></i>&emsp;&emsp;Tutor Request
                        </div>
                    </a>

                    <a href="{{route('chat.list')}}" style="margin-bottom: 5px;">
                        <div class="u_menu_btn {{request()->is('chat*') ?"u_menu_btn_active":""}}">
                            <i class="fa fa-comments"></i>&emsp;&emsp;Chat List
                        </div>
                    </a>
                    @if(\App\JobBoard::where([['user_id',Auth::guard('student')->user()->id],['status',3]])->count() > 0)
                        <a href="{{route('reviews')}}" style="margin-bottom: 5px;">
                            <div class="u_menu_btn {{request()->is('reviews*') ?"u_menu_btn_active":""}}">
                                <i class="fa fa-commenting"></i>&emsp;&emsp;Reviews
                            </div>
                        </a>
                    @endif
                </div>
            </div>
        @endif

        @if(Auth::guard('tutor')->check())
            <div class="course-details">
                <div class="avatar text-center">
                    <img style="border-radius: 50%;width: 130px"
                         src="{{Auth::guard('tutor')->user()->avatar ? asset(Auth::guard('tutor')->user()->avatar) : asset('backEnd/images/avatar.jpg')}}" alt="">
                </div>

                <div class="user_info">
                    <h4 class="text-center"
                        style="margin-top: 10px;padding-bottom: 0">{{Auth::guard('tutor')->user()->first_name}} {{Auth::guard('tutor')->user()->last_name}}</h4>
                    <h5 class="text-center">{{Auth::guard('tutor')->user()->email}}</h5>
                    <h5 class="text-center">Tutor ID: {{Auth::guard('tutor')->user()->id}}</h5>
                </div>

                <div class="u_menu text-left" style="margin-top: 40px;">
                    <a href="{{route('tutor.home')}}" style="margin-bottom: 5px;">
                        <div class="u_menu_btn {{request()->is('tutor/dashboard*') ?"u_menu_btn_active":""}}">
                            <i class="fa fa-desktop"></i>&emsp;&emsp;Dashboard
                        </div>
                    </a>

                    <a href="{{route('tutor.job.applied')}}" style="margin-bottom: 5px;">
                        <div class="u_menu_btn {{request()->is('tutor/job-applied*') ?"u_menu_btn_active":""}}">
                            <i class="fa fa-tasks"></i>&emsp;&emsp;Job Applied
                        </div>
                    </a>

                    <a href="{{route('job.accepted.list')}}" style="margin-bottom: 5px;">
                        <div class="u_menu_btn {{request()->is('job-accepted*') ?"u_menu_btn_active":""}}">
                            <i class="fa fa-thumbs-up"></i>&emsp;&emsp;Accepted Tuition
                        </div>
                    </a>

                    <a href="{{route('chat.list')}}" style="margin-bottom: 5px;">
                        <div class="u_menu_btn {{request()->is('chat*') ?"u_menu_btn_active":""}}">
                            <i class="fa fa-comments"></i>&emsp;&emsp;Chat List
                        </div>
                    </a>

                    @if(\App\TutorNotification::where('user_id',Auth::guard('tutor')->user()->id)->count() > 0)
                        <a href="{{route('reviews')}}" style="margin-bottom: 5px;">
                            <div class="u_menu_btn {{request()->is('reviews*') ?"u_menu_btn_active":""}}">
                                <i class="fa fa-commenting"></i>&emsp;&emsp;Reviews
                            </div>
                        </a>
                    @endif

                    {{--<a href="#" style="margin-bottom: 5px;">
                        <div class="u_menu_btn {{request()->is('') ?"u_menu_btn_active":""}}">
                            <i class="fa fa-check"></i>&emsp;&emsp;Confirmation Letter
                        </div>
                    </a>--}}
                </div>
            </div>
        @endif
    </div>
</div>

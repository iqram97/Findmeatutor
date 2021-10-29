<header class="header {{request()->is('/') ? '': 'header-normal'}}">
    <div class="topbar clearfix">
        <div class="container">
            <div class="row-fluid">
                <div class="col-md-6 col-sm-6 text-left">
                    <p>
                        <strong><i class="fa fa-phone"></i></strong> <a href="tel:{{$web_config->website_phone}}">{{$web_config->website_phone}}</a> &nbsp;&nbsp;
                        <strong><i class="fa fa-envelope"></i></strong> <a href="mailto:{{$web_config->website_email}}">{{$web_config->website_email}}</a>
                    </p>
                </div><!-- end left -->
                <div class="col-md-6 col-sm-6 hidden-xs text-right">
                    <div class="social">
                        <a class="facebook" href="{{$web_config->website_facebook}}" data-tooltip="tooltip" data-placement="bottom" title="Facebook"><i
                                class="fa fa-facebook"></i></a>
                        <a class="twitter" href="{{$web_config->website_twitter}}" data-tooltip="tooltip" data-placement="bottom" title="Twitter"><i
                                class="fa fa-twitter"></i></a>
                        <a class="linkedin" href="{{$web_config->website_linkedin}}" data-tooltip="tooltip" data-placement="bottom" title="Linkedin"><i
                                class="fa fa-linkedin"></i></a>
                    </div><!-- end social -->
                </div><!-- end left -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end topbar -->

    <div class="container">
        <nav class="navbar navbar-default yamm">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="logo-normal">
                    <a class="navbar-brand" href="{{route('home')}}">
                        <img src="{{asset($web_config->website_header_logo)}}" alt="Find A Tutor Logo">
                    </a>
                </div>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="{{request()->is('/') ? 'a_active': ''}}" href="{{route('home')}}">Home</a></li>
                    <li><a class="{{request()->is('job-board') ? 'a_active': ''}}" href="{{route('job.board.index')}}">Tuition Board</a></li>
                    @guest('student')
                        <li><a href="{{route('student.login')}}">Sign In</a></li>
                    @else
                        <li class="dropdown hassubmenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span
                                    style="font-weight: bold;color: #14CF68;text-transform: uppercase">{{Auth::guard('student')->user()->first_name}} {{Auth::guard('student')->user()->last_name}}</span>
                                <span class="fa fa-angle-down"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{route('student.home')}}">
                                        <i class="fa fa-desktop"></i>
                                        Dashboard
                                    </a>
                                </li>

                                <li>
                                    <a href="{{route('student.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i>
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('student.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @php
                            $notification = \App\StudentNotification::where('user_id',Auth::guard('student')->user()->id)->get();
                            $chat = \App\Conversation::where('student_id',Auth::guard('student')->user()->id)->get();
                        @endphp

                        <li class="dropdown hassubmenu">
                            <a href="#" style="position: relative" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-comments"></i>
                                @if($chat->where('s_seen',0)->count()>0)
                                    <span class="badge badge-danger" style="font-weight: bold;position:absolute;top: 7px;right: -3px;">{{$chat->where('s_seen',0)->count()}}</span>
                                @endif
                            </a>

                            @if($chat->where('s_seen',0)->count() > 0)
                                <ul class="dropdown-menu hassubmenu_notification" role="menu">
                                    @foreach($chat as $item)
                                        <p @if($item->s_seen == 0) style="font-weight: bold;color: black;" @endif>
                                            <a href="{{route('chat',[$item->student_id,$item->tutor_id])}}"
                                               style="display: inline-block;color: limegreen">{{\App\Tutor::find($item->tutor_id)->first_name}} <span style="color: black">Sent You A Message</span></a>
                                        </p>
                                    @endforeach
                                </ul>
                            @endif
                        </li>

                        <li class="dropdown hassubmenu">
                            <a href="#" style="position: relative" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                @if($notification->where('is_seen',0)->count() > 0)
                                    <span class="badge badge-danger"
                                          style="font-weight: bold;position:absolute;top: 7px;right: -3px;">{{$notification->where('is_seen',0)->count()}}</span>
                                @endif
                            </a>

                            @if($notification->count() > 0)
                                <ul class="dropdown-menu hassubmenu_notification" role="menu">
                                    @foreach($notification as $item)
                                        <p @if($item->is_seen == 0) style="font-weight: bold;color: black;" @endif>
                                            <a href="{{route('job.applied',[$item->tutor_id,$item->job_id])}}"
                                               style="display: inline-block;color: limegreen">{{\App\Tutor::find($item->tutor_id)->first_name}}</a> Applied For This Tuition <a
                                                href="{{route('job.board.details',$item->job_id)}}" style="display: inline-block;color: limegreen">#{{$item->job_id}}</a>
                                        </p>

                                    @endforeach
                                </ul>
                            @endif
                        </li>

                    @endguest

                    @if(Auth::guard('tutor')->check())
                        @guest('tutor')
                        @else
                            <li class="dropdown hassubmenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span
                                        style="font-weight: bold;color: #14CF68;text-transform: uppercase">{{Auth::guard('tutor')->user()->first_name}} {{ Auth::guard('tutor')->user()->last_name}}</span>
                                    <span class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{route('tutor.home')}}">
                                            <i class="fa fa-desktop"></i>
                                            Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('tutor.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i>
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('tutor.logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @php
                                $notification = \App\TutorNotification::where('user_id',Auth::guard('tutor')->user()->id)->get();
                                $chat = \App\Conversation::where('tutor_id',Auth::guard('tutor')->user()->id)->get();
                            @endphp

                            <li class="dropdown hassubmenu">
                                <a href="#" style="position: relative" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-comments"></i>
                                    @if($chat->where('t_seen',0)->count() > 0)
                                        <span class="badge badge-danger"
                                              style="font-weight: bold;position:absolute;top: 7px;right: -3px;">{{$chat->where('t_seen',0)->count()}}</span>
                                    @endif
                                </a>

                                @if($chat->where('t_seen',0)->count() > 0)
                                    <ul class="dropdown-menu hassubmenu_notification" role="menu">
                                        @foreach($chat as $item)
                                            <p @if($item->t_seen == 0) style="font-weight: bold;color: black;" @endif>
                                                <a href="{{route('chat',[$item->student_id,$item->tutor_id])}}"
                                                   style="display: inline-block;color: limegreen">{{\App\Student::find($item->student_id)->first_name}} <span style="color: black">Sent You A Message</span></a>
                                            </p>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>

                            <li class="dropdown hassubmenu">
                                <a href="#" style="position: relative" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    @if($notification->where('is_seen',0)->count() > 0)
                                        <span class="badge badge-danger"
                                              style="font-weight: bold;position:absolute;top: 7px;right: -3px;">{{$notification->where('is_seen',0)->count()}}</span>
                                    @endif
                                </a>

                                @if($notification->count() > 0)
                                    <ul class="dropdown-menu hassubmenu_notification" role="menu">
                                        @foreach($notification as $item)
                                            <p @if($item->is_seen == 0) style="font-weight: bold;color: black;" @endif>
                                                <a href="{{route('job.accept',[$item->student_id,$item->job_id])}}"
                                                   style="display: inline-block;color: limegreen">{{\App\Student::find($item->student_id)->first_name}}</a> Accept Your Request For
                                                This Tuition <a
                                                    href="{{route('job.board.details',$item->job_id)}}" style="display: inline-block;color: limegreen">#{{$item->job_id}}</a>
                                            </p>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endguest
                    @endif
                    {{--<li class="iconitem"><a class="shopicon" href="shop-cart.html"><i class="fa fa-shopping-basket"></i> &nbsp;(0)</a></li>--}}
                </ul>
            </div>
        </nav><!-- end navbar -->
    </div><!-- end container -->
</header>

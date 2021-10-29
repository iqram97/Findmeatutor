@extends('FrontEnd.layout.master')
@section('title')
    Tuition Applied
@endsection

@section('body')

    <section class="section gb mt120">
        <div class="container-fluid">
            <div class="row" style="margin-bottom: 15px;">
                @include('FrontEnd.include.sidebar')
                <div class="col-lg-9">
                    <div class="row">

                        <div class="col-lg-9">
                            <div class="course-box" style="border-radius: 6px !important;margin-bottom: 20px;">
                                <div class="course-details job-board-info" style="padding-top: 1rem">
                                    <h3 style="margin-top: 10px; text-transform: capitalize"><a href="">Need {{$jobs->category_name}} Tutor For {{$jobs->class_course}}
                                            Student - {{$jobs->no_of_days}}</a>
                                    </h3>
                                    <p style="margin-bottom: 15px;"><strong>Job ID:</strong> {{$jobs->id}} &emsp; | &emsp;
                                        <strong>{{date('M d, Y',strtotime($jobs->hire_date))}}</strong></p>
                                    <div class="row" style="margin-bottom: 10px;">
                                        <div class="col-lg-3">
                                            <p>
                                                <i class="fa fa-th-large text-primary"></i>
                                                <strong>Tuition Type</strong><br>
                                                &emsp;&nbsp;{{$jobs->tuition_type_name ?? 'N/A'}}
                                            </p>
                                        </div>

                                        <div class="col-lg-3">
                                            <p>
                                                <i class="fa fa-money text-primary"></i>
                                                <strong>Salary</strong><br>
                                                &emsp;&nbsp;{{$jobs->salary ?? 'N/A'}} BDT
                                            </p>
                                        </div>

                                        <div class="col-lg-6">
                                            <p>
                                                <i class="fa fa-book text-primary"></i>
                                                <strong>Subject</strong><br>
                                                &emsp;&nbsp;{{$jobs->subject ?? 'N/A'}}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col-lg-6">
                                            <p>
                                                <i class="fa fa-map-marker text-primary"></i> &nbsp;
                                                <strong>Location</strong><br>
                                                &emsp;&nbsp;{{$jobs->address ?? 'N/A'}}, {{$jobs->city_name ?? 'N/A'}}
                                            </p>
                                        </div>
                                    </div>

                                    <a href="{{route('job.board.details',$jobs->id)}}" class="btn btn-info btn-sm">
                                        View Details
                                    </a>
                                </div>
                            </div>
                            @if($student_notification->is_accept == 0 && $jobs->status == 1)
                                <a href="{{route('job.accept.or.decline',[1,$jobs->id,$tutor->id])}}" class="btn btn-success"
                                   onclick="return confirm('Are you sure to accept this?')">Accept</a>
                                <a href="{{route('job.accept.or.decline',[2,$jobs->id,$tutor->id])}}" class="btn btn-danger"
                                   onclick="return confirm('Are you sure to decline this? If you decline this it can\'t be undo!!!')">Decline</a>
                            @elseif($student_notification->is_accept == 1 && $jobs->status == 3)
                                <a href="{{route('chat',[Auth::guard('student')->user()->id,$tutor->id])}}" class="btn btn-success">Chat Now</a>
                                <a href="tel:{{$tutor->phone ?? null}}" class="btn btn-danger">Call: {{$tutor->phone ?? null}}</a>
                                <a href="mailto:{{$tutor->email ?? null}}" class="btn btn-warning">Email: {{$tutor->email ?? null}}</a>
                            @elseif($student_notification->is_accept == 2 && $jobs->status == 3)
                                <h3 class="text-danger">You had rejected this tutor!</h3>
                            @else
                                <h3 class="text-danger">This Tuition is appointed</h3>
                            @endif
                        </div>
                        <div class="col-lg-3">
                            <div class="course-box" style="border-radius: 6px !important;background: #DEE1E6;border: 1px solid #d1d7e2;">
                                <div class="course-details">
                                    <div class="avatar text-center">
                                        <img style="border-radius: 50%;width: 130px" src="{{$tutor->avatar ? asset($tutor->avatar) : asset('backEnd/images/avatar.jpg')}}" alt="">
                                    </div>

                                    <div class="user_info">
                                        <h4 class="text-center"
                                            style="margin-top: 10px;padding-bottom: 0">{{$tutor->first_name}} {{$tutor->last_name ?? "N/A"}}</h4>
                                        @if($student_notification->is_accept == 1)
                                            <h5 class="text-center">{{$tutor->phone ?? "N/A"}}</h5>
                                            <h5 class="text-center">{{$tutor->email ?? "N/A"}}</h5>
                                        @endif
                                        <h5 class="text-center">Tutor ID: {{$tutor->id}}</h5>
                                    </div>

                                    <div class="u_menu text-left" style="margin-top: 40px;">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- end container -->
    </section>
@endsection

@section('custom_js')
    <script>
        $('#job_board_details_btn').click(function () {

        });
    </script>
@endsection

@extends('FrontEnd.layout.master')
@section('title')
    Tuition Accepted
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
                                    <p style="margin-bottom: 15px;"><strong>Tuition ID:</strong> {{$jobs->id}} &emsp; | &emsp;
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
                            <a href="{{route('chat',[$student->id,Auth::guard('tutor')->user()->id])}}" class="btn btn-success">Chat Now</a>
                            <a href="tel:{{$student->phone ?? null}}" class="btn btn-danger">Call: {{$student->phone ?? null}}</a>
                            <a href="mailto:{{$student->email ?? null}}" class="btn btn-warning">Email: {{$student->email ?? null}}</a>
                        </div>
                        <div class="col-lg-3">
                            <div class="course-box" style="border-radius: 6px !important;background: #DEE1E6;border: 1px solid #d1d7e2;">
                                <div class="course-details">
                                    <div class="avatar text-center">
                                        <img style="border-radius: 50%;width: 130px"
                                             src="{{$student->avatar ? asset($student->avatar) : asset('backEnd/images/avatar.jpg')}}" alt="">
                                    </div>

                                    <div class="user_info">
                                        <h4 class="text-center"
                                            style="margin-top: 10px;padding-bottom: 0">{{$student->first_name}} {{$student->last_name ?? "N/A"}}</h4>
                                        @if($tutor_notification->is_accept == 1)
                                            <h5 class="text-center">{{$student->phone ?? "N/A"}}</h5>
                                            <h5 class="text-center">{{$student->email ?? "N/A"}}</h5>
                                        @endif
                                        <h5 class="text-center">Tutor ID: {{$student->id}}</h5>
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

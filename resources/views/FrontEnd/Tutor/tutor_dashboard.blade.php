@extends('FrontEnd.layout.master')
@section('title')
    Tutor Dashboard
@endsection

@section('body')
    <section class="section gb mt120">
        <div class="container-fluid">
            <div class="row" style="margin-bottom: 15px;">
                @include('FrontEnd.include.sidebar')
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="course-box" style="border-radius: 6px !important;">
                                <a href="{{route('tutor.job.applied')}}">
                                    <div class="course-details bg-info" style="padding-top: .5rem;padding-bottom: .5rem">
                                        <h3 style="margin-bottom: 0;">Applied Tuition</h3>
                                        <h1 style="margin-top: 0;">{{$total_apply->count() ?? 0}}</h1>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="course-box" style="border-radius: 6px !important;">
                                <a href="{{route('job.accepted.list')}}">
                                    <div class="course-details bg-success" style="padding-top: .5rem;padding-bottom: .5rem">
                                        <h3 style="margin-bottom: 0;">Total Accepted</h3>
                                        <h1 style="margin-top: 0;">{{$total_accepted->count()}}</h1>
                                    </div>
                                </a>
                            </div>
                        </div>

                        {{--<div class="col-lg-3">
                            <div class="course-box" style="border-radius: 6px !important;">
                                <a href="{{route('job.posted.index')}}">
                                    <div class="course-details bg-warning" style="padding-top: .5rem;padding-bottom: .5rem">
                                        <h3 style="margin-bottom: 0;">Pending Jobs</h3>
                                        <h1 style="margin-top: 0;">{{\App\JobBoard::where([['user_id',Auth::guard('student')->user()->id],['status',0]])->count()}}</h1>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="course-box" style="border-radius: 6px !important;">
                                <a href="{{route('job.posted.index')}}">
                                    <div class="course-details bg-danger" style="padding-top: .5rem;padding-bottom: .5rem">
                                        <h3 style="margin-bottom: 0;">Cancelled Jobs</h3>
                                        <h1 style="margin-top: 0;">{{\App\JobBoard::where([['user_id',Auth::guard('student')->user()->id],['status',2]])->count()}}</h1>
                                    </div>
                                </a>
                            </div>
                        </div>--}}
                    </div>
                </div>

            </div>
        </div><!-- end container -->
    </section>
@endsection

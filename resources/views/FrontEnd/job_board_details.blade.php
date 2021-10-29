@extends('FrontEnd.layout.master')
@section('title')
    Tuition Details
@endsection

@section('body')
    <section class="section gb mt120">
        <div class="container-fluid">
            <div class="row" style="margin-bottom: 15px;">
                @include('FrontEnd.include.sidebar')
                <div class="col-lg-9">
                    <div class="course-box" style="border-radius: 6px !important;margin-bottom: 20px;">
                        <div class="course-details job-board-info" style="padding-top: 1rem">
                            <h3 style="margin-top: 10px; text-transform: capitalize">Need {{$data->category_name}} Tutor For {{$data->class_course}}
                                Student - {{$data->no_of_days}}
                            </h3>
                            <p style="margin-bottom: 15px;"><strong>Tuition ID:</strong> {{$data->id}} &emsp; | &emsp;
                                <strong>{{date('M d, Y',strtotime($data->hire_date))}}</strong></p>
                            <div class="row" style="margin-bottom: 20px;">
                                <div class="col-lg-3">
                                    <p>
                                        <i class="fa fa-th-large text-primary"></i>
                                        <strong>Tuition Type</strong><br>
                                        &emsp;&nbsp;{{$data->tuition_type_name ?? 'N/A'}}
                                    </p>
                                </div>

                                <div class="col-lg-3">
                                    <p>
                                        <i class="fa fa-money text-primary"></i>
                                        <strong>Salary</strong><br>
                                        &emsp;&nbsp;{{$data->salary ?? 'N/A'}} BDT
                                    </p>
                                </div>

                                <div class="col-lg-6">
                                    <p>
                                        <i class="fa fa-book text-primary"></i>
                                        <strong>Subject</strong><br>
                                        &emsp;&nbsp;{{$data->subject ?? 'N/A'}}
                                    </p>
                                </div>
                            </div>

                            <div class="row" style="margin-bottom: 20px;">
                                <div class="col-lg-3">
                                    <p>
                                        <i class="fa fa-venus-mars text-primary"></i>
                                        <strong>Student Gender</strong><br>
                                        &emsp;&nbsp;{{$data->gender ?? 'N/A'}}
                                    </p>
                                </div>

                                <div class="col-lg-3">
                                    <p>
                                        <i class="fa fa-venus-mars text-primary"></i>
                                        <strong>Preferred Tutor</strong><br>
                                        &emsp;&nbsp;{{$data->gender_pref ?? 'N/A'}}
                                    </p>
                                </div>

                                <div class="col-lg-6">
                                    <p>
                                        <i class="fa fa-map-marker text-primary"></i> &nbsp;
                                        <strong>Location</strong><br>
                                        &emsp;&nbsp;{{$data->address ?? 'N/A'}}, {{$data->city_name ?? 'N/A'}}
                                    </p>
                                </div>
                            </div>

                            <div class="row" style="margin-bottom: 20px;">
                                <div class="col-lg-3">
                                    <p>
                                        <i class="fa fa-clock-o text-primary"></i>
                                        <strong>Tutoring Time</strong><br>
                                        &emsp;&nbsp;{{$data->tutoring_time	 ?? 'N/A'}}
                                    </p>
                                </div>

                                <div class="col-lg-3">
                                    <p>
                                        <i class="fa fa-calendar text-primary"></i>
                                        <strong>Tutoring Days</strong><br>
                                        &emsp;&nbsp;{{$data->no_of_days ?? 'N/A'}}
                                    </p>
                                </div>

                                <div class="col-lg-6">
                                    <p>
                                        <i class="fa fa-graduation-cap text-primary"></i>
                                        <strong>No. of Student</strong><br>
                                        &emsp;&nbsp;&nbsp;{{$data->no_of_student ?? null}}
                                    </p>
                                </div>
                            </div>

                            <div class="row" style="margin-bottom: 20px;">
                                <div class="col-lg-12">
                                    <p>
                                        <strong>Other Requirements: </strong>{{$data->more_requirement	 ?? 'N/A'}}
                                    </p>
                                </div>
                            </div>

                            @if(Auth::guard('tutor')->check())
                                <a href="{{route('tutor.apply',$data->id)}}" class="btn btn-primary btn-sm">
                                    Apply
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end container -->
    </section>


    {{--<!-- Modal -->
    <div class="modal fade" id="job_board_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>--}}
@endsection

@section('custom_js')
    <script>
        $('#job_board_details_btn').click(function () {

        });
    </script>
@endsection

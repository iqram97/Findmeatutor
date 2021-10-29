@extends('FrontEnd.layout.master')
@section('title')
    Area Tuition
@endsection

@section('body')
    <section class="section gb mt150">
        <div class="container">
            <div class="row" style="margin-bottom: 15px;">
                <div class="col-lg-12">
                    <p style="margin-left: 5px;">
                        <i class="fa fa-th-list text-primary"></i>
                        {{$areaJobs->count()}} Tuition Found
                    </p>
                    @foreach($areaJobs as  $item)
                        <div class="course-box" style="border-radius: 6px !important;margin-bottom: 20px;">
                            <div class="course-details job-board-info" style="padding-top: 1rem">
                                <h3 style="margin-top: 10px; text-transform: capitalize"><a href="">Need {{$item->category_name}} Tutor For {{$item->class_course}}
                                        Student - {{$item->no_of_days}}</a>
                                </h3>
                                <p style="margin-bottom: 15px;"><strong>Tuition ID:</strong> {{$item->id}} &emsp; | &emsp;
                                    <strong>{{date('M d, Y',strtotime($item->hire_date))}}</strong></p>
                                <div class="row" style="margin-bottom: 10px;">
                                    <div class="col-lg-3">
                                        <p>
                                            <i class="fa fa-th-large text-primary"></i>
                                            <strong>Tuition Type</strong><br>
                                            &emsp;&nbsp;{{$item->tuition_type_name ?? 'N/A'}}
                                        </p>
                                    </div>

                                    <div class="col-lg-3">
                                        <p>
                                            <i class="fa fa-money text-primary"></i>
                                            <strong>Salary</strong><br>
                                            &emsp;&nbsp;{{$item->salary ?? 'N/A'}} BDT
                                        </p>
                                    </div>

                                    <div class="col-lg-6">
                                        <p>
                                            <i class="fa fa-book text-primary"></i>
                                            <strong>Subject</strong><br>
                                            &emsp;&nbsp;{{$item->subject ?? 'N/A'}}
                                        </p>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col-lg-6">
                                        <p>
                                            <i class="fa fa-map-marker text-primary"></i> &nbsp;
                                            <strong>Location</strong><br>
                                            &emsp;&nbsp;{{$item->address ?? 'N/A'}}, {{$item->city_name ?? 'N/A'}}
                                        </p>
                                    </div>
                                </div>

                                <a href="{{route('job.board.details',$item->id)}}" class="btn btn-primary btn-sm">View Details</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div><!-- end container -->
    </section>
@endsection

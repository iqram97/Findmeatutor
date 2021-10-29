@extends('FrontEnd.layout.master')
@section('title')
    Tuition Board
@endsection

@section('body')
    <section class="section gb mt150">
        <div class="container">
            <div class="row" style="margin-bottom: 15px;">
                <div class="col-lg-12">
                    <p style="margin-left: 5px;">
                        <i class="fa fa-th-list text-primary"></i>
                        {{\App\JobBoard::where('status',1)->count()}} Tuition Found
                    </p>
                    @foreach($data as  $item)
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

                                <a href="{{route('job.board.details',$item->id)}}" class="btn btn-primary btn-sm">
                                    View Details
                                </a>
                            </div>
                        </div>
                    @endforeach
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

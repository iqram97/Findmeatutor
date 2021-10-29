@extends('FrontEnd.layout.master')
@section('title')
    Tutor Request
@endsection

@section('body')
    <section class="section gb mt120">
        <div class="container-fluid">
            <div class="row" style="margin-bottom: 15px;">
                @include('FrontEnd.include.sidebar')

                <div class="col-lg-9">
                    <p style="margin-left: 5px;">
                        <i class="fa fa-th-list text-primary"></i>
                        {{\App\JobBoard::where('user_id',Auth::guard('student')->user()->id)->count()}} Tuition Found
                    </p>
                    @foreach($data as  $item)
                        @php
                            $request = \App\StudentNotification::where([['job_id',$item->id],['user_id',Auth::guard('student')->user()->id]])->get();
                        @endphp
                        <div class="course-box" style="border-radius: 6px !important;margin-bottom: 20px;">
                            <div class="course-details job-board-info" style="padding-top: 1rem">
                                <h4 style="margin-top: 10px; text-transform: capitalize"><a href="">Need {{$item->category_name}} Tutor For {{$item->class_course}}
                                        Student
                                        - {{$item->no_of_days}}</a>
                                    @if($item->status == 1)
                                        <span class="badge badge-success">Live</span>
                                    @elseif($item->status == 0)
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($item->status == 2)
                                        <span class="badge badge-danger">Canceled</span>
                                    @elseif($item->status == 3)
                                        <span class="badge badge-info">Appointed</span>
                                    @endif
                                </h4>
                                <p style="margin-bottom: 15px;"><strong>Tuition ID:</strong> {{$item->id}} &emsp; | &emsp;
                                    <strong>{{date('M d, Y',strtotime($item->hire_date))}}</strong></p>
                                <div class="row" style="margin-bottom: 10px;">
                                    <div class="col-lg-3">
                                        <p>
                                            <strong>Total Request:</strong> {{$request->count()}}
                                        </p>
                                    </div>
                                </div>
                                <a href="{{route('tutor.request.view',$item->id)}}" class="btn btn-primary btn-sm">View All Request</a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div><!-- end container -->
    </section>
@endsection

@section('custom_js')

@endsection

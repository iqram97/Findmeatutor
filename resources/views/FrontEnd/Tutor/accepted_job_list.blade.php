@extends('FrontEnd.layout.master')
@section('title')
    Accepted Tuition List
@endsection

@section('body')
    <section class="section gb mt120">
        <div class="container-fluid">
            <div class="row" style="margin-bottom: 15px;">
                @include('FrontEnd.include.sidebar')
                <div class="col-lg-9">
                    <div class="course-box" style="border-radius: 6px !important;margin-bottom: 20px;">
                        <div class="course-details job-board-info" style="padding-top: 1rem">
                            <h2 style="margin-bottom: 20px;">Accepted Tuition List</h2>
                            @php($i=1)
                            @foreach($data as  $item)
                                <h4 style="margin-top: 10px; text-transform: capitalize;padding-bottom: 0;">
                                    {{$i++}}. <a href="{{route('job.accept',[$item->student_id,$item->job_id])}}" style="display: inline-block;color: limegreen">{{$item->first_name}}</a> Accept Your Request For This Tuition <a
                                        href="{{route('job.board.details',$item->job_id)}}" style="display: inline-block;color: limegreen">#{{$item->job_id}}</a>
                                </h4>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end container -->
    </section>
@endsection

@section('custom_js')

@endsection

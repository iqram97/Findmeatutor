@extends('FrontEnd.layout.master')
@section('title')
    Tutor Request List
@endsection

@section('body')
    <section class="section gb mt120">
        <div class="container-fluid">
            <div class="row" style="margin-bottom: 15px;">
                @include('FrontEnd.include.sidebar')
                <div class="col-lg-9">
                    <div class="course-box" style="border-radius: 6px !important;margin-bottom: 20px;">
                        <div class="course-details job-board-info" style="padding-top: 1rem">
                            @php($i=1)
                            @if($data->count() >0)
                                <h2 style="margin-bottom: 20px;">Tutor List For #Tuition ID {{$job_id}}</h2>
                                @foreach($data as  $item)
                                    <h4 style="margin-top: 10px; text-transform: capitalize;padding-bottom: 0;">
                                        <a href="{{route('job.applied',[$item->tutor_id,$item->job_id])}}"><strong>{{$i++}}
                                                . {{$item->first_name}} {{$item->last_name}}</strong></a>
                                        @if($item->is_accept == 1)
                                            <span class="badge badge-info">Appointed</span>
                                        @endif
                                    </h4>
                                @endforeach
                            @else
                                <h2 style="margin-bottom: 20px;">No Request Found!</h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end container -->
    </section>
@endsection

@section('custom_js')

@endsection

@extends('FrontEnd.layout.master')
@section('title')
    Chat List
@endsection

@section('body')
    <section class="section gb mt120">
        <div class="container-fluid">
            <div class="row" style="margin-bottom: 15px;">
                @include('FrontEnd.include.sidebar')
                <div class="col-lg-6">
                    <div class="course-box" style="border-radius: 6px !important;margin-bottom: 20px;padding-top: 20px;">
                        <div class="course-details job-board-info" style="padding-top: 1rem">
                            @foreach($data as  $item)
                                <div class="course-header" style="padding-bottom: 40px">
                                    <img style="border-radius: 50%;width: 50px" src="{{$item ? ($item->avatar ? asset($item->avatar) : asset('backEnd/images/avatar.jpg')) : asset('backEnd/images/avatar.jpg')}}" alt="">
                                    <a href="{{route('chat',[$item->student_id,$item->tutor_id])}}">&nbsp; <strong>{{$item->first_name ?? null}} {{$item->last_name ?? null}} </strong></a>
                                </div>
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

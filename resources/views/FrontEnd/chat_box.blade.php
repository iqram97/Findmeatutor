@extends('FrontEnd.layout.master')
@section('title')
    Chat
@endsection

@section('body')

    <section class="section gb mt120">
        <div class="container-fluid">
            <div class="row" style="margin-bottom: 15px;">
                @include('FrontEnd.include.sidebar')
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="course-box" style="border-radius: 6px !important;margin-bottom: 20px;">
                                <div class="course-details job-board-info" style="padding-top: 1rem;min-height: 555px;position: relative">
                                    @if(Auth::guard('student')->check())
                                        <div class="course-header" style="border-bottom: 1px solid #eaeaea; padding-bottom: 10px">
                                            <img style="border-radius: 50%;width: 50px" src="{{$tutor ? ($tutor->avatar ? asset($tutor->avatar) : asset('backEnd/images/avatar.jpg')) : asset('backEnd/images/avatar.jpg')}}" alt="">
                                            &nbsp; <strong>{{$tutor->first_name ?? null}} {{$tutor->last_name ?? null}} </strong>
                                        </div>
                                    @endif

                                    @if(Auth::guard('tutor')->check())
                                        <div class="course-header" style="border-bottom: 1px solid #eaeaea; padding-bottom: 10px">
                                            <img style="border-radius: 50%;width: 50px" src="{{$student ? ($student->avatar ? asset($student->avatar) : asset('backEnd/images/avatar.jpg')) : asset('backEnd/images/avatar.jpg')}}" alt="">
                                            &nbsp; <strong>{{$student->first_name ?? null}} {{$student->last_name ?? null}} </strong>
                                        </div>
                                    @endif

                                    <div class="hassubmenu_notification" style="padding-top: 10px;height: 400px;overflow-y: scroll;padding-right: 10px;">
                                        @if($data->count() > 0)
                                            @foreach($data as $item)
                                                @if(Auth::guard('student')->check())
                                                    @if($item->type == $tutor->role && $item->sender == $tutor->id)
                                                        <div style="text-align: left">
                                                            <img style="border-radius: 50%;width: 30px;display: inline-block;"
                                                                 src="{{$tutor ? ($tutor->avatar ? asset($tutor->avatar) : asset('backEnd/images/avatar.jpg')) : asset('backEnd/images/avatar.jpg')}}" alt="">
                                                            <div style="display: inline-block;">
                                                                <small style="margin-bottom: 0;color: darkgrey">{{date('d M, Y H:i:s A',strtotime($item->created_at))}}</small>
                                                                <span
                                                                    style="padding: 10px;background-color: #f1f1f1;color:black;border-radius: 5px;max-width: 85%;margin-bottom: 10px;display: inline-block;">{{$item->message}}</span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @elseif(Auth::guard('tutor')->check())
                                                    @if($item->type == $student->role && $item->sender == $student->id)
                                                        <div style="text-align: left">
                                                            <img style="border-radius: 50%;width: 30px;display: inline-block;"
                                                                 src="{{$student ? ($student->avatar ? asset($student->avatar) : asset('backEnd/images/avatar.jpg')) : asset('backEnd/images/avatar.jpg')}}" alt="">
                                                            <div style="display: inline-block;">
                                                                <small style="margin-bottom: 0;color: darkgrey">{{date('d M, Y H:i:s A',strtotime($item->created_at))}}</small>
                                                                <span
                                                                    style="padding: 10px;background-color: #f1f1f1;color:black;border-radius: 5px;max-width: 85%;margin-bottom: 10px;display: inline-block;">{{$item->message}}</span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif

                                                @if(Auth::guard('student')->check())
                                                    @if($item->type == Auth::guard('student')->user()->role && $item->sender == Auth::guard('student')->user()->id)
                                                        <div style="text-align: right">
                                                            <div style="display: inline-block;">
                                                                <small style="margin-bottom: 0;color: darkgrey">{{date('d M, Y H:i:s A',strtotime($item->created_at))}}</small>
                                                                <span
                                                                    style="padding: 10px;background-color: #f1f1f1;color:black;border-radius: 5px;max-width: 85%;margin-bottom: 10px;display: inline-block;text-align: left">{{$item->message}}</span>
                                                            </div>
                                                            <img style="border-radius: 50%;width: 30px;display: inline-block;"
                                                                 src="{{Auth::guard('student')->user()->avatar ? asset(Auth::guard('student')->user()->avatar) : asset('backEnd/images/avatar.jpg')}}"
                                                                 alt="">
                                                        </div>
                                                    @endif
                                                @elseif(Auth::guard('tutor')->check())
                                                    @if($item->type == Auth::guard('tutor')->user()->role && $item->sender == Auth::guard('tutor')->user()->id)
                                                        <div style="text-align: right">
                                                            <div style="display: inline-block;">
                                                                <small style="margin-bottom: 0;color: darkgrey">{{date('d M, Y H:i:s A',strtotime($item->created_at))}}</small>
                                                                <span
                                                                    style="padding: 10px;background-color: #f1f1f1;color:black;border-radius: 5px;max-width: 85%;margin-bottom: 10px;display: inline-block;text-align: left">{{$item->message}}</span>
                                                            </div>
                                                            <img style="border-radius: 50%;width: 30px;display: inline-block;"
                                                                 src="{{Auth::guard('tutor')->user()->avatar ? asset(Auth::guard('tutor')->user()->avatar) : asset('backEnd/images/avatar.jpg')}}"
                                                                 alt="">
                                                        </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @else
                                            <p>No Message Found</p>
                                        @endif

                                    </div>

                                    <div style="position: absolute;width: 95%;bottom: 20px;">
                                        <form action="{{route('send.message')}}" method="post" style="margin-bottom: 40px;">
                                            @csrf
                                            <input type="hidden" name="conversation_id" value="{{$conversation_id->id}}">
                                            @if(Auth::guard('student')->check())
                                                <input type="hidden" name="sender" value="{{Auth::guard('student')->user()->id}}">
                                                <input type="hidden" name="type" value="{{Auth::guard('student')->user()->role}}">
                                            @endif

                                            @if(Auth::guard('tutor')->check())
                                                <input type="hidden" name="sender" value="{{Auth::guard('tutor')->user()->id}}">
                                                <input type="hidden" name="type" value="{{Auth::guard('tutor')->user()->role}}">
                                            @endif

                                            <div style="float:left;width: 90%">
                                                <input type="text" class="form-control" name="message" placeholder="Type Here..." style="height: 50px" required>
                                            </div>

                                            <div style="float:right;width: 9%">
                                                <button type="submit" class="btn btn-success btn-sm" style="height: 50px;border: unset"><i class="fa fa-paper-plane"></i></button>
                                            </div>
                                        </form>
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

@extends('FrontEnd.layout.master')
@section('title')
    Review
@endsection

@section('body')
    <section class="section gb mt120">
        <div class="container-fluid">
            <div class="row" style="margin-bottom: 15px;">
                @include('FrontEnd.include.sidebar')
                <div class="col-lg-6">
                    <div class="course-box" style="border-radius: 6px !important;margin-bottom: 20px;padding-top: 20px;">
                        <div class="course-details job-board-info" style="padding-top: 1rem">
                            <form action="{{route('reviews.post')}}" method="post">
                                @csrf
                                <textarea name="message" id="" rows="6" cols="3" class="form-control" placeholder="Type Here..."></textarea>
                                <button class="btn btn-success" type="submit" style="margin-top: 10px;">Submit</button>
                            </form>
                            <hr>
                            <h2 class="text-center">Your Reviews</h2>
                            @if($data->count() >0 )
                                @foreach($data as  $item)
                                    <div class="course-header" style="padding-bottom: 20px">
                                        <p style="padding: 10px;background-color: #dde3ee;color: black;border-radius: 5px">
                                            {{$item->message}}
                                            <br>
                                            <small style="color: black;margin-top: 5px;">{{date('d M, Y H:i:s A',strtotime($item->created_at))}}</small>
                                        </p>
                                    </div>
                                @endforeach
                            @else
                                <h5 class="text-danger text-center">No Reviews Found!</h5>
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

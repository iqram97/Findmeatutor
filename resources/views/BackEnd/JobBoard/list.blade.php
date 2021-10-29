@extends('BackEnd.layout.master')

@section('title')
    Job List
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Job List</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{route('admin.home')}}">Dashboard</a></li>
                    <li class="active">Job List</li>
                </ol>
            </div>
        </div>

        {{--<div class="row" style="margin-bottom: 10px;">
            <div class="col-md-12 text-right">
                <a href="{{route('admin.area.create')}}" class="btn btn-info">
                    <i class="fa fa-plus"></i>
                    Add Area
                </a>
            </div>
        </div>--}}

        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="table-responsive">
                        <table class="table table-hover manage-u-table text-center text-capitalize">
                            <thead>
                            <tr>
                                <th width="50" class="text-center">#</th>
                                <th class="text-center">Tuition Type</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Class/Course</th>
                                <th class="text-center">Subject</th>
                                <th class="text-center">Institute</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">No. Of Students</th>
                                <th class="text-center">No. Of Days</th>
                                <th class="text-center">Tutoring Time</th>
                                <th class="text-center">Hire Date</th>
                                <th class="text-center">Salary</th>
                                <th class="text-center">Student Gender</th>
                                <th class="text-center">Tutor Preff. Gender</th>
                                <th class="text-center">More Requirements</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @if($data->count()>0)
                                @foreach($data as $item)
                                    <tr>
                                        <td width="50">{{$i++}}</td>
                                        <td>{{$item->tuition_type_name}}</td>
                                        <td>{{$item->category_name}}</td>
                                        <td>{{$item->class_course}}</td>
                                        <td>{{$item->subject}}</td>
                                        <td>{{$item->institute_name}}</td>
                                        <td>{{$item->address}}</td>
                                        <td>{{$item->no_of_student}}</td>
                                        <td>{{$item->no_of_days}}</td>
                                        <td>{{$item->tutoring_time}}</td>
                                        <td>
                                            {{date('d M, Y',strtotime($item->hire_date))}}
                                        </td>
                                        <td>{{$item->salary}}</td>
                                        <td>{{$item->gender}}</td>
                                        <td>{{$item->gender_pref}}</td>
                                        <td>
                                            <span data-toggle="tooltip" data-placement="top" title="{{$item->more_requirement}}">
                                                {{\Illuminate\Support\Str::limit($item->more_requirement,15)}}
                                            </span>
                                        </td>
                                        <td>
                                            @if($item->status == 1)
                                                <span class="badge badge-success">Live</span>
                                            @elseif($item->status == 0)
                                                <span class="badge badge-warning">Pending</span>
                                            @elseif($item->status == 2)
                                                <span class="badge badge-danger">Canceled</span>
                                            @elseif($item->status == 3)
                                                <span class="badge badge-info">Appointed</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm m-r-2 statusbtn" data-target="#status" data-toggle="modal"
                                               data-status="{{$item->status}}" data-id="{{$item->id}}">Status</a>
                                            <a href="{{route('admin.job_board.delete',$item->id)}}" class="btn btn-danger btn-outline btn-circle"
                                               onclick="return confirm('Are You Sure To Delete This?')"><i class="ti-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="17" class="text-danger text-center font-bold">No Data Found!</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="status" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.job_board.update')}}" method="post">
                                @csrf
                                <input type="hidden" id="id" name="id">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="">Select...</option>
                                            <option value="0">Pending</option>
                                            <option value="1">Live</option>
                                            <option value="3">Appointed</option>
                                            <option value="2">Canceled</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>



                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
    <script>
        $('.statusbtn').on('click', function () {
            $('#id').val($(this).data('id'));
            if ($(this).data('status') == 0) {
                $('#status option[value=0]').attr('selected', 'selected');
            } else if ($(this).data('status') == 1) {
                $('#status option[value=1]').attr('selected', 'selected');
            } else if ($(this).data('status') == 2) {
                $('#status option[value=2]').attr('selected', 'selected');
            } else if ($(this).data('status') == 3) {
                $('#status option[value=3]').attr('selected', 'selected');
            }
        });
    </script>
@endsection

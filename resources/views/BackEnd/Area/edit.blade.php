@extends('BackEnd.layout.master')

@section('title')
    Area Edit
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Area Edit</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{route('admin.home')}}">Dashboard</a></li>
                    <li class="active">Area Edit</li>
                </ol>
            </div>
        </div>

        <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-12 text-right">
                <a href="{{route('admin.area.list')}}" class="btn btn-danger">
                    <i class="fa fa-angle-double-left"></i>
                    Back
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="white-box p-l-20 p-r-20">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="form-material form-horizontal" action="{{route('admin.area.update',$data->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-md-12">Area Name <span class="text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="name" id="name"
                                               placeholder="Enter Area Name" value="{{$data->name}}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12">Area Image</label>
                                    <div class="col-sm-10">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                    class="fileinput-filename"></span></div>
                                            <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span
                                                    class="fileinput-exists">Change</span>
                                                    <input type="file" name="area_image"> </span> <a href="#"
                                                                                                     class="input-group-addon btn btn-default fileinput-exists"
                                                                                                     data-dismiss="fileinput">Remove</a>
                                            <input type="hidden" value="{{$data->area_image}}" name="area_image_old">
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <img width="38" src="{{asset($data->area_image)}}" alt="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="status" class="col-md-12">Status <span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="status" id="status">
                                            <option value="1" {{$data->status == 1 ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{$data->status == 0 ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
    <script src="{{asset('/')}}backEnd/js/jasny-bootstrap.js"></script>
@endsection

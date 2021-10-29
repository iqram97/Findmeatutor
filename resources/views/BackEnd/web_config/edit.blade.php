@extends('BackEnd.layout.master')

@section('title')
    Students List
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Web Settings</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{route('admin.home')}}">Dashboard</a></li>
                    <li class="active">Web Settings</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="white-box p-l-20 p-r-20">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="form-material form-horizontal" action="{{route('admin.web.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="website_phone" class="col-md-12">Website Phone</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="website_phone" id="website_phone"
                                               placeholder="Enter Website Phone" value="{{$data->website_phone}}"></div>
                                </div>

                                <div class="form-group">
                                    <label for="website_email" class="col-md-12">Website Email</label>
                                    <div class="col-md-12">
                                        <input type="email" class="form-control form-control-line" name="website_email" id="website_email"
                                               placeholder="Enter Website Eamil" value="{{$data->website_email}}"></div>
                                </div>

                                <div class="form-group">
                                    <label for="website_facebook" class="col-md-12">Website Facebook Link</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="website_facebook" id="website_facebook"
                                               placeholder="Enter Website Facebook Link" value="{{$data->website_facebook}}"></div>
                                </div>

                                <div class="form-group">
                                    <label for="website_twitter" class="col-md-12">Website Twitter Link</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="website_twitter" id="website_twitter"
                                               placeholder="Enter Website Twitter Link" value="{{$data->website_twitter}}"></div>
                                </div>

                                <div class="form-group">
                                    <label for="website_linkedin" class="col-md-12">Website Linkedin Link</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="website_linkedin" id="website_linkedin"
                                               placeholder="Enter Website Linkedin Link" value="{{$data->website_linkedin}}"></div>
                                </div>

                                <div class="form-group">
                                    <label for="website_copyright_text" class="col-md-12">Website Copyright Text</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="website_copyright_text" id="website_copyright_text"
                                               placeholder="Enter Website Copyright Text" value="{{$data->website_copyright_text}}"></div>
                                </div>

                                {{--<div class="form-group">
                                    <label class="col-md-12">Text area</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12">Input Select</label>
                                    <div class="col-sm-12">
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>--}}

                                <div class="form-group">
                                    <label class="col-sm-12">Website Header Logo</label>
                                    <div class="col-sm-10">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                    class="fileinput-filename"></span></div>
                                            <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span
                                                    class="fileinput-exists">Change</span>
                                                    <input type="file" name="website_header_logo"> </span> <a href="#"
                                                                                                              class="input-group-addon btn btn-default fileinput-exists"
                                                                                                              data-dismiss="fileinput">Remove</a>
                                            <input type="hidden" value="{{asset($data->website_header_logo)}}" name="website_header_logo_old">
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <img width="38" src="{{asset($data->website_header_logo)}}" alt="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12">Website Footer Logo</label>
                                    <div class="col-sm-10">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                    class="fileinput-filename"></span></div>
                                            <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span
                                                    class="fileinput-exists">Change</span>
                                                    <input type="file" name="website_footer_logo"> </span>
                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a></div>
                                        <input type="hidden" value="{{asset($data->website_footer_logo)}}" name="website_footer_logo_old">
                                    </div>

                                    <div class="col-sm-2">
                                        <img width="38" src="{{asset($data->website_footer_logo)}}" alt="">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update</button>
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

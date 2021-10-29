@extends('BackEnd.layout.master')

@section('title')
    Home
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
        <!-- Different data widgets -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="row row-in">
                        <div class="col-lg-4 col-sm-12 row-in-br">
                            <ul class="col-in">
                                <li>
                                    <span class="circle circle-md bg-danger"><i class="fa fa-users"></i></span>
                                </li>
                                <li class="col-last">
                                    <h3 class="counter text-right m-t-15">{{$data['students']->count()}}</h3></li>
                                <li class="col-middle">
                                    <h4>Total Students/Parents</h4>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{$data['students']->count()}}" aria-valuemin="0" aria-valuemax="100"
                                             style="width: {{$data['students']->count()}}%">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-4 col-sm-12 row-in-br  b-r-none">
                            <ul class="col-in">
                                <li>
                                    <span class="circle circle-md bg-info"><i class="fa fa-user"></i></span>
                                </li>
                                <li class="col-last">
                                    <h3 class="counter text-right m-t-15">{{$data['tutors']->count()}}</h3></li>
                                <li class="col-middle">
                                    <h4>Total Tutors</h4>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{$data['tutors']->count()}}" aria-valuemin="0" aria-valuemax="100"
                                             style="width: {{$data['tutors']->count()}}%">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-4 col-sm-12 row-in-br  b-r-none">
                            <ul class="col-in">
                                <li>
                                    <span class="circle circle-md bg-info"><i class="fa fa-map-marker"></i></span>
                                </li>
                                <li class="col-last">
                                    <h3 class="counter text-right m-t-15">{{$data['areas']->count()}}</h3></li>
                                <li class="col-middle">
                                    <h4>Total Areas</h4>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{$data['areas']->count()}}" aria-valuemin="0" aria-valuemax="100"
                                             style="width: {{$data['areas']->count()}}%">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

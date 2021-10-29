@extends('BackEnd.layout.master')

@section('title')
    Students List
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Students List</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{route('admin.home')}}">Dashboard</a></li>
                    <li class="active">Students List</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="table-responsive">
                        <table class="table table-hover manage-u-table text-center">
                            <thead>
                            <tr>
                                <th width="50" class="text-center">#</th>
                                <th class="text-center">Avatar</th>
                                <th class="text-center">First Name</th>
                                <th class="text-center">Last Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($data['students'] as $item)
                                <tr>
                                    <td width="50">{{$i++}}</td>
                                    <td>
                                        <img width="40" src="{{asset('/')}}{{$item->avatar}}" alt="">
                                    </td>
                                    <td>{{$item->first_name}}</td>
                                    <td>{{$item->last_name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>
                                        @if($item->is_active == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-success">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-outline btn-circle  m-r-2"><i class="ti-pencil-alt"></i></button>
                                        <button type="button" class="btn btn-danger btn-outline btn-circle "><i class="ti-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

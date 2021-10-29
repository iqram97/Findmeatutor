@extends('BackEnd.layout.master')

@section('title')
    Area List
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Area List</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{route('admin.home')}}">Dashboard</a></li>
                    <li class="active">Area List</li>
                </ol>
            </div>
        </div>

        <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-12 text-right">
                <a href="{{route('admin.area.create')}}" class="btn btn-info">
                    <i class="fa fa-plus"></i>
                    Add Area
                </a>
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
                                <th class="text-center">Name</th>
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
                                        <td>{{$item->name}}</td>
                                        <td>
                                            <img width="50" src="{{asset($item->area_image)}}" alt="">
                                        </td>
                                        <td>
                                            @if($item->status == 1 )
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.area.edit',$item->id)}}" class="btn btn-info btn-outline btn-circle  m-r-2"><i class="ti-pencil-alt"></i></a>
                                            <a href="{{route('admin.area.delete',$item->id)}}" class="btn btn-danger btn-outline btn-circle"
                                               onclick="return confirm('Are You Sure To Delete This?')"><i class="ti-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-danger text-center font-bold">No Data Found!</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

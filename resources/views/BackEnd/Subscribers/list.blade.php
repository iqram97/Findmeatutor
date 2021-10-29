@extends('BackEnd.layout.master')

@section('title')
    Subscribers List
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Subscribers List</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{route('admin.home')}}">Dashboard</a></li>
                    <li class="active">Subscribers List</li>
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
                                <th class="text-center">Email</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @if($data->count()>0)
                            @foreach($data as $item)
                                <tr>
                                    <td width="50">{{$i++}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        <a href="{{route('admin.subscribers.delete',$item->id)}}" class="btn btn-danger btn-outline btn-circle" onclick="return confirm('Are You Sure To Delete This?')"><i class="ti-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                                @else
                                <tr>
                                    <td colspan="3" class="text-danger text-center font-bold">No Data Found!</td>
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

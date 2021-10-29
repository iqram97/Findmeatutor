<?php

namespace App\Http\Controllers;

use App\Area;
use App\JobBoard;
use Illuminate\Http\Request;
use File;

class JobBoardController extends Controller
{
//    back
    public function getList()
    {
        $data = JobBoard::orderBy('id','asc')->get();
        return view('BackEnd.JobBoard.list', compact('data'));
    }

    public function create()
    {
        return view('BackEnd.Area.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('area_image')) {
            $image = $request->file('area_image');
            $name = uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/areas');
            $image->move($destinationPath, $name);

            $url = 'uploads/areas/' . $name;
        }

        $input = array_merge($request->all(), [
            'area_image' => $url,
        ]);

        Area::create($input);
        return redirect()->route('admin.area.list')->with('success', 'Area Created Successfully');
    }

    public function edit($id)
    {
        $data = JobBoard::where('id',$id)->first();
        $cities = Area::where('status', 1)->orderBy('name', 'asc')->get();
        return view('BackEnd.JobBoard.edit', compact('data','cities'));
    }

    public function update(Request $request)
    {
        JobBoard::where('id',$request->id)->first()->update([
            'status' => $request->status
        ]);
        return redirect()->route('admin.job_board.list')->with('success', 'Job Status Updated Successfully');

    }

    public function delete($id)
    {
        JobBoard::where('id',$id)->first()->delete();
        return back()->with('success', 'Job Deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use File;

class AreaController extends Controller
{
//    back
    public function getList()
    {
        $data = Area::orderBy('name','asc')->get();
        return view('BackEnd.Area.list', compact('data'));
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
        $data = Area::where('id',$id)->first();
        return view('BackEnd.Area.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        if ($request->hasFile('area_image')) {

            $img_url = Area::where('id',$id)->first()->area_image;
            if (file_exists(public_path($img_url))) {
                File::delete(public_path($img_url));
            }

            $image = $request->file('area_image');
            $name = uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/areas');
            $image->move($destinationPath, $name);

            $url = 'uploads/areas/' . $name;
        } else {
            $url = $request->area_image_old;
        }

        $input = array_merge($request->all(), [
            'area_image' => $url,
        ]);

        Area::where('id',$id)->first()->update($input);
        return redirect()->route('admin.area.list')->with('success', 'Area Updated Successfully');

    }

    public function delete($id)
    {
        $img_url = Area::where('id',$id)->first()->area_image;
        if (file_exists(public_path($img_url))) {
            File::delete(public_path($img_url));
        }

        Area::where('id',$id)->first()->delete();

        return back()->with('success', 'Area Deleted Successfully');
    }
}

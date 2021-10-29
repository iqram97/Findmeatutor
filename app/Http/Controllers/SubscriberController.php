<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
//    front
    public function store(Request $request)
    {
        if (Subscriber::where('email', $request->email)->first()) {
            return redirect()->back()->with('error', 'This Email Already In Subscribe List');
        } else {
            Subscriber::create($request->all());
            return redirect()->back()->with('success', 'Subscribed Successfully');
        }

    }


//    back

    public function getList()
    {
        $data = Subscriber::all();
        return view('BackEnd.Subscribers.list',compact('data'));
    }

    public function delete($id)
    {
        Subscriber::find($id)->delete();
        return redirect()->back()->with('success','Subscriber Successfully Deleted');
    }
}

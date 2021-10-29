<?php

namespace App\Http\Controllers;

use App\Area;
use App\Student;
use App\Tutor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['students'] = Student::where('is_active',1)->get();
        $data['tutors'] = Tutor::where('is_active',1)->get();
        $data['areas'] = Area::where('status',1)->get();
        return view('BackEnd.index',compact('data'));
    }

    public function studentList()
    {
        $data['students'] = Student::where('is_active',1)->get();
        return view('BackEnd.Student.list',compact('data'));
    }

    public function tutorList()
    {
        $data['tutors'] = Tutor::where('is_active',1)->get();
        return view('BackEnd.Tutor.list',compact('data'));
    }
}

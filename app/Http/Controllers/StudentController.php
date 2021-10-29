<?php

namespace App\Http\Controllers;

use App\Area;
use App\JobBoard;
use App\StudentNotification;
use App\Tutor;
use App\TutorNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class StudentController extends Controller
{
//    front
    public function index()
    {
        return view('FrontEnd.Student.student_dashboard');
    }

    public function hireTutorIndex()
    {
        $cities = Area::where('status', 1)->orderBy('name', 'asc')->get();
        return view('FrontEnd.Student.hire_tutor_index', compact('cities'));
    }

    public function hireTutorStore(Request $request)
    {
        if ($request->tuition_type ==1 ){
            $tuition_type = 'Home Tutoring';
        }elseif ($request->tuition_type ==2 ){
            $tuition_type = 'Online Tutoring';
        }

        if ($request->category_id == 1 ){
            $cat_name = 'Bangla Medium';
        }elseif ($request->category_id == 2 ){
            $cat_name = 'English Version';
        }elseif ($request->category_id == 3 ){
            $cat_name = 'English Medium (Ed-Excel)';
        }elseif ($request->category_id == 4 ){
            $cat_name = 'English Medium (Cambridge)';
        }elseif ($request->category_id == 5 ){
            $cat_name = 'English Medium (Cambridge)';
        }elseif ($request->category_id == 6 ){
            $cat_name = 'Madrasha Medium';
        }

        $city_name = Area::find($request->city_id)->name;

        $input = array_merge($request->all(),[
           'user_id' =>  Auth::guard('student')->user()->id,
           'subject' =>  implode(', ',$request->subject),
           'tuition_type_name' =>  $tuition_type,
           'category_name' =>  $cat_name,
           'city_name' =>  $city_name,
           'hire_date' =>  Carbon::parse($request->hire_date)->format('Y-m-d H:i:s'),
        ]);
        JobBoard::create($input);
        return redirect()->back()->with('success', 'Job Info Submitted Successfully');
    }

    public function getJobPostedIndex(Request $request)
    {
        $data = JobBoard::where('user_id',Auth::guard('student')->user()->id)->get();
        return view('FrontEnd.Student.job_posted_index',compact('data'));
    }

    public function getCourse($cat)
    {
        if ($cat == 1 || $cat == 2) {
            return Config::get('staticArray.bmEV_class_course');
        } elseif ($cat == 3 || $cat == 4 || $cat == 5) {
            return Config::get('staticArray.em_class_course');
        } elseif ($cat == 6) {
            return Config::get('staticArray.mm_class_course');
        }
    }

    public function getSubject($cat, $course)
    {
        if ($cat == 1) {
            if ($course == "pre schooling" || $course == "play" || $course == "nursery" || $course == "kg") {
                return Config::get('staticArray.preSchoolingPlayNurseryKg_BM_EV');
            }

            if ($course == "class 1" || $course == "class 2" || $course == "class 3" || $course == "class 4") {
                return Config::get('staticArray.c1_c2_c3_c4_BM');
            }
            if ($course == "class 5" || $course == "class 6" || $course == "class 7" || $course == "class 8" || $course == "class 9" || $course == "class 10" || $course == "hsc-1st year" || $course == "hsc-2nd year") {
                return Config::get('staticArray.c5_BM');
            }
        }

        if ($cat == 2) {
            if ($course == "pre schooling" || $course == "play" || $course == "kg") {
                return Config::get('staticArray.preSchoolingPlayNurseryKg_BM_EV');
            }
            if ($course == "nursery") {
                return Config::get('staticArray.Nursery_EV');
            }

            if ($course == "class 1" || $course == "class 3" || $course == "class 4") {
                return Config::get('staticArray.c1_c3_c4_EV');
            }

            if ($course == "class 2") {
                return Config::get('staticArray.c2_EV');
            }

            if ($course == "class 5" || $course == "class 6" || $course == "class 7" || $course == "class 8" || $course == "class 9" || $course == "class 10" || $course == "hsc-1st year" || $course == "hsc-2nd year") {
                return Config::get('staticArray.c5_EV');
            }
        }
    }

    public function getJobApplied($id,$job_id)
    {
        StudentNotification::where([['tutor_id',$id],['job_id',$job_id]])->first()->update([
            'is_seen' => 1
        ]);

        $tutor = Tutor::find($id);
        $jobs = JobBoard::find($job_id);
        $student_notification = StudentNotification::where([['tutor_id',$id],['job_id',$job_id]])->first();
//        dd($job);
        return view('FrontEnd.Student.job_applied',compact('tutor','jobs','student_notification'));
    }

    public function acceptOrDecline($status,$job_id,$tutor_id)
    {
        if ($status == 1){
            StudentNotification::where([['job_id',$job_id],['tutor_id',$tutor_id]])->first()->update([
                'is_accept' => $status
            ]);

            JobBoard::find($job_id)->update([
                'status' => 3
            ]);

            TutorNotification::create([
                'user_id' => $tutor_id,
                'job_id' => $job_id,
                'student_id' => Auth::guard('student')->user()->id,
            ]);

            return back()->with('success','Tutor Accepted Successfully');
        }else{
            StudentNotification::where([['job_id',$job_id],['tutor_id',$tutor_id]])->first()->update([
                'is_accept' => $status
            ]);

            return back()->with('error','Tutor Declined!!!');
        }
    }

    public function tutorRequest()
    {
        $data = JobBoard::where('user_id',Auth::guard('student')->user()->id)->get();
        return view('FrontEnd.Student.tutor_request_index',compact('data'));
    }

    public function tutorRequestView($id)
    {
        $job_id = $id;
        $data = StudentNotification::join('tutors','tutors.id','student_notifications.tutor_id')
        ->where([['job_id',$id],['user_id',Auth::guard('student')->user()->id]])->get();
//        dd($data);
        return view('FrontEnd.Student.tutor_request_list',compact('data','job_id'));
    }



}

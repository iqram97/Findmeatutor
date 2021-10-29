<?php

namespace App\Http\Controllers;

use App\JobApply;
use App\JobBoard;
use App\Student;
use App\StudentNotification;
use App\TutorNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorController extends Controller
{

    public function apply($id)
    {
        $tutor_id = Auth::guard('tutor')->user()->id;
        $getJob = JobApply::where([['job_id', $id], ['tutor_id', $tutor_id]])->first();

        $find_job_details = JobBoard::find($id);
        if ($getJob) {
            return back()->with('error', 'You Already Applied This Job');
        } else {
            JobApply::create([
                'job_id' => $id,
                'tutor_id' => $tutor_id,
            ]);

            StudentNotification::create([
                'user_id' => $find_job_details->user_id,
                'tutor_id' => $tutor_id,
                'job_id' => $id,
            ]);

            return back()->with('success', 'Job Applied Successfully');
        }
    }

    public function index()
    {
        $total_apply = JobApply::where('tutor_id',Auth::guard('tutor')->user()->id)->get();
        $total_accepted = StudentNotification::where([['tutor_id',Auth::guard('tutor')->user()->id],['is_accept',1]])->get();
        return view('FrontEnd.Tutor.tutor_dashboard',compact('total_apply','total_accepted'));
    }

    public function jobApplied()
    {
        $jobs = JobApply::join('job_boards','job_boards.id','job_applies.job_id')
            ->where('job_applies.tutor_id',Auth::guard('tutor')->user()->id)
            ->get();
        return view('FrontEnd.Tutor.job_applied',compact('jobs'));
    }

    public function getJobAccept($id,$job_id)
    {
        TutorNotification::where([['student_id',$id],['job_id',$job_id]])->first()->update([
            'is_seen' => 1
        ]);

        $student = Student::find($id);
        $jobs = JobBoard::find($job_id);
        $tutor_notification = TutorNotification::where([['student_id',$id],['job_id',$job_id]])->first();
//        dd($job);
        return view('FrontEnd.Tutor.job_accepted',compact('student','jobs','tutor_notification'));
    }

    public function getJobAcceptedList()
    {
        $data = TutorNotification::
            join('students','students.id','tutor_notifications.student_id')
                    ->where('user_id',Auth::guard('tutor')->user()->id)->get();
//        dd($data);
        return view('FrontEnd.Tutor.accepted_job_list',compact('data'));
    }
}

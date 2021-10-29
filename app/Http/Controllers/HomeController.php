<?php

namespace App\Http\Controllers;

use App\Area;
use App\Conversation;
use App\JobBoard;
use App\Message;
use App\Review;
use App\Student;
use App\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['students'] = Student::where('is_active', 1)->get();
        $data['tutors'] = Tutor::where('is_active', 1)->get();
        $data['areas'] = Area::orderBY('name', 'asc')->get();
        $data['s_review'] = Review::join('students', 'students.id', 'reviews.user_id')
            ->where('user_type', 3)->get();
        $data['t_review'] = Review::join('tutors', 'tutors.id', 'reviews.user_id')
            ->where('user_type', 4)->get();
        return view('FrontEnd.index', compact('data'));
    }

    public function jobBoardIndex()
    {
        $data = JobBoard::where('status', 1)->get();
        return view('FrontEnd.job_board', compact('data'));
    }

    public function jobBoardDetails($id)
    {
        $data = JobBoard::find($id);
        return view('FrontEnd.job_board_details', compact('data'));
    }

    public function AreaJobBoardIndex($id)
    {
        $areaJobs = JobBoard::where('city_id', $id)->get();
        return view('FrontEnd.area_job_board', compact('areaJobs'));
    }

    public function contactIndex()
    {
        return view('FrontEnd.contact');
    }

    public function chatList()
    {
        if (Auth::guard('student')->check()) {
            $data = Conversation::join('tutors', 'tutors.id', 'conversations.tutor_id')
                ->where('student_id', Auth::guard('student')->user()->id)->get();
        } else {
            $data = Conversation::join('students', 'students.id', 'conversations.student_id')
                ->where('tutor_id', Auth::guard('tutor')->user()->id)->get();
        }

        return view('FrontEnd.chat_list', compact('data'));
    }

    public function chat($s_id, $t_id)
    {
        $conversation_id = Conversation::where([['tutor_id', $t_id], ['student_id', $s_id]])->first();
        if (!$conversation_id) {
            $conversation_id = Conversation::create([
                'tutor_id' => $t_id,
                'student_id' => $s_id
            ]);
        }

        if (Auth::guard('student')->check()) {
            $conversation_id->update([
                's_seen' => 1
            ]);
        } elseif (Auth::guard('tutor')->check()) {
            $conversation_id->update([
                't_seen' => 1
            ]);
        }

        $student = Student::find($s_id);
        $tutor = Tutor::find($t_id);
        $data = Message::join('conversations', 'conversations.id', 'messages.conversation_id')
            ->where([['conversations.tutor_id', $t_id], ['conversations.student_id', $s_id]])
            ->get();
        return view('FrontEnd.chat_box', compact('data', 'student', 'tutor', 'conversation_id'));
    }

    public function sendMessage(Request $request)
    {
        Message::create([
            'conversation_id' => $request->conversation_id,
            'message' => $request->message,
            'sender' => $request->sender,
            'type' => $request->type
        ]);

        if (Auth::guard('student')->check()) {
            Conversation::find($request->conversation_id)->update([
                't_seen' => 0
            ]);
        } elseif (Auth::guard('tutor')->check()) {
            Conversation::find($request->conversation_id)->update([
                's_seen' => 0
            ]);
        }
        return back()->with('success', 'Message Sent!');
    }

    public function reviews()
    {
        if (Auth::guard('student')->check()) {
            $data = Review::where([['user_id', Auth::guard('student')->user()->id], ['user_type', Auth::guard('student')->user()->role]])->get();
        } elseif (Auth::guard('tutor')->check()) {
            $data = Review::where([['user_id', Auth::guard('tutor')->user()->id], ['user_type', Auth::guard('tutor')->user()->role]])->get();
        }

        return view('FrontEnd.reviews', compact('data'));
    }

    public function reviewsPost(Request $request)
    {
        if (Auth::guard('student')->check()) {
            $user_id = Auth::guard('student')->user()->id;
            $user_type = Auth::guard('student')->user()->role;
        }

        if (Auth::guard('tutor')->check()) {
            $user_id = Auth::guard('tutor')->user()->id;
            $user_type = Auth::guard('tutor')->user()->role;
        }

        Review::create([
            'user_id' => $user_id,
            'user_type' => $user_type,
            'message' => $request->message
        ]);

        return back()->with('success', 'Your Review Submitted Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TuitionAssessment;
use App\Models\TuitionRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TuitionRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $requests = Auth::user()->isTutee() ? Auth::user()->sentTuitionRequests : Auth::user()->receivedTuitionRequests;
        // return view('tutee.requests.index', [
        //     'requests' => $requests,
        // ]);


        // Default tab to 'pending' if no tab is provided
        $tab = $request->input('tab', 'pending');
        $status = $request->input('status', 'accepted'); // Set 'accepted' as default status

        // Redirect to 'pending' tab if no tab is set in the URL
        if (!$request->has('tab')) {
            return redirect()->route('requests.index', ['tab' => 'pending']);
        }

        $user = Auth::user();

        if ($user->isTutee()) {
            $baseQuery = $user->sentTuitionRequests();
        } else {
            $baseQuery = $user->receivedTuitionRequests();
        }

        switch ($tab) {
            case 'rejected':
                $requests = $baseQuery->where('status', 'rejected')->get();
                break;
            case 'pending':
                $requests = $baseQuery->where('status', 'pending')->get();
                break;
            case 'scheduled':
                // Default to showing accepted status if no status is provided
                if ($status == 'accepted') {
                    $requests = $baseQuery->where('status', 'accepted')->get();
                } elseif ($status == 'paid') {
                    $requests = $baseQuery->where('status', 'paid')->get();
                } else {
                    // Default to showing both accepted and paid sessions if status is not provided
                    $requests = $baseQuery->whereIn('status', ['accepted', 'paid'])->get();
                }
                break;
            case 'completed':
                $requests = $baseQuery->where('status', 'completed')->get();
                break;
            default:
                $requests = $baseQuery->where('status', 'pending')->get();
        }

        return view('tutee.requests.index', [
            'tab' => $tab,
            'status' => $status,
            'requests' => $requests,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request_date = $request['date'];
        $request_timeslot = $request['timeslot'];
        $tutor = User::find($request['tutor_id']);
        $subject = $tutor->subjects()->where('subject_id', $request->expertise)->first();
        // dd($assessment);

        $user = Auth::user();
        $not_available = $user->sentTuitionRequests()->where('date', $request_date)->where($request_timeslot)->exists();
        if ($not_available) {
            return redirect(route('requests.index'))->with('error', 'You have other session scheduled with the same date and timeslot selected.');
        }

        $request = $user->sentTuitionRequests()->create([
            'tutor_id' => $request['tutor_id'],
            'expertise' => $request->expertise,
            'assessment_id' => $subject->assessment_id ?? null,
            'date' => $request['date'],
            'timeslot' => $request['session'],
        ]);
        if ($subject->assessment) {
            return view('tutee.assessments.index', [
                'assessment' => $subject->assessment,
                'tuition_request' => $request,
            ]);
        } else {
            return redirect(route('requests.index'));
        }
    }

    public static function assessment(TuitionAssessment $assessment, TuitionRequest $tuition_request)
    {
        // dd($assessment);

        return view('tutee.assessments.index', [
            'assessment' => $assessment,
            'tuition_request' => $tuition_request,
        ]);
    }

    public function submit_assessment(Request $request)
    {
        $request->validate([
            'assessment_id' => 'required',
            'answers.*' => 'required',
        ]);
        $assessment = TuitionAssessment::find($request['assessment_id']);
        $tuition_request = TuitionRequest::find($request['tuition_request_id']);
        $answers = $request['answers'];
        $score = 0;
        $total = collect($assessment->questions)->count();
        foreach ($assessment->questions as $index => $question) {
            if ($question['type'] == 'multiple_choice') {
                if ($question['correct_answer'] == $answers[$index])
                    $score += 1;
            } else {
                if ($question['true_false'] == $answers[$index])
                    $score += 1;
            }
        }

        $score_percent = ($score / $total) * 100;

        $tuition_request->update([
            'score' => $score_percent,
            'answers' => $answers,
        ]);
        return redirect(route('assessments.results', ['id' => $tuition_request->id]));
    }


    public function update_status(Request $request)
    {
        // dd($request);
        $tuition_request = TuitionRequest::find($request['tuition_request_id']);
        if ($request->status == 'accepted') {
            $not_available = Auth::user()->receivedTuitionRequests()
                ->where('date', $tuition_request->date)
                ->where('timeslot', $tuition_request->timeslot)
                ->where('status', 'accepted')
                ->exists();
            if ($not_available) {
                return redirect(route('requests.index'))->with('error', 'You have an existing session scheduled for this date and timeslot.');
            }
        }
        $tuition_request->update([
            'status' => $request['status'],
        ]);

        return redirect(route('requests.index'));
    }

    public function score_result(int $id)
    {
        $tuition_request = TuitionRequest::find($id);
        return view('tutor.assessments.result', [
            'tuition_request' => $tuition_request,
            'score' => 0,
            'total' => 0,
        ]);
    }
}

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
    public function index()
    {
        // $tutors = User::where('role', 'tutor')->get();
        $requests = Auth::user()->isTutee() ? Auth::user()->sentTuitionRequests : Auth::user()->receivedTuitionRequests;
        // dd($tutors); to view data without page
        return view('tutee.requests.index', [
            'requests' => $requests,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tutor = User::find($request['tutor_id']);
        $user = Auth::user();
        $request = $user->sentTuitionRequests()->create([
            'tutor_id' => $request['tutor_id'],
            'date' => $request['date'],
            'timeslot' => $request['session'],
        ]);
        // return redirect(route('tutee.assessment', [
        //     $tutor->tutor_assessments->id,
        //     $request->id,
        // ]));
        return view('tutee.assessments.index', [
            'assessment' => $tutor->tutor_assessments,
            'tuition_request' => $request,
        ]);
        // static::assessment($tutor->tutor_assessments,$request);


    }

    public static function assessment(TuitionAssessment $assessment,TuitionRequest $tuition_request)
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
        foreach($assessment->questions as $index => $question){
            if($question['type'] == 'multiple_choice'){
                if($question['correct_answer'] == $answers[$index]) $score += 1;
            }else{
                if($question['true_false'] == $answers[$index]) $score +=1;
            }
        }

        $score_percent = ($score/$total)*100;

        // dd($score_percent);

        $tuition_request->update([
            'score' => $score_percent,
            'answers' => $answers,
        ]);


        return redirect(route('dashboard'));
    }

    public function update_status(Request $request)
    {
        // dd($request);
        $tuition_request = TuitionRequest::find($request['tuition_request_id']);
        $tuition_request->update([
            'status' => $request['status'],
        ]);

        return redirect(route('requests.index'));
    }
    /**
     * Display the specified resource.
     */
    public function show(TuitionRequest $tuitionRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TuitionRequest $tuitionRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TuitionRequest $tuitionRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TuitionRequest $tuitionRequest)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TuitionAssessment;
use App\Models\TutorSubject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TuitionAssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Auth::user()->subjects?? null;
        // dd($tutors); to view data without page
        return view('tutor.assessments.index', [
            'subjects' => $subjects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $id)
    {
        return view('tutor.assessments.create', [
            'subject_id' => $id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $questions = $request->questions;
        $user = Auth::user();
        $assessment = $user->tutor_assessments()->create([
            'questions' => $questions,
        ]);
        $tutor_subject = TutorSubject::find($request->tutor_subject_id);
        $tutor_subject->assessment_id = $assessment->id;
        $tutor_subject->timestamps = false;
        $tutor_subject->save();

        return redirect(route('assessments.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(TuitionAssessment $tuitionAssessment)
    {
        $assessments = $tuitionAssessment;
        return view('tutor.assessments.show',[
            'assessments' => $assessments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TuitionAssessment $tuitionAssessment)
    {
        return view('tutor.assessments.edit', compact('tuitionAssessment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TuitionAssessment $tuitionAssessment)
    {
        // Validate and update the assessment
        $request->validate([
            'questions' => 'required|array',
        ]);
        $tuitionAssessment->update([
            'questions' => $request->questions,
        ]);
        return redirect()->route('assessments.index')->with('success', 'Assessment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TuitionAssessment $tuitionAssessment)
    {
        // Delete the assessment
        $tuitionAssessment->delete();

        // Redirect to the assessments index
        return redirect(route('assessments.index'))->with('success', 'Assessment deleted successfully');
    }

    public function deleteQuestion(Request $request, TuitionAssessment $assessment, $index)
    {
        $questions = $assessment->questions;
        unset($questions[$index]);
        $assessment->update(['questions' => array_values($questions)]);
        return response()->json(['message' => 'Question deleted successfully'], 200);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\TuitionAssessment;
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
        $assessments = Auth::user()->tutor_assessments ?? null;
        // dd($tutors); to view data without page
        return view('tutor.assessments.index', [
            'assessments' => $assessments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tutor.assessments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->questions);
        $questions = $request->questions;
        $user = Auth::user();
        $user->tutor_assessments()->create([
            'questions' => $questions,
        ]);
        return redirect(route('assessments.index'));
    }

    

    /**
     * Display the specified resource.
     */
    public function show(TuitionAssessment $tuitionAssessment)
    {
        //
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

}

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
        $assessments = Auth::user()->tutor_assessments??null;
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TuitionAssessment $tuitionAssessment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TuitionAssessment $tuitionAssessment)
    {
        //
    }

}

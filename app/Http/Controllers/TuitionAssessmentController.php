<?php

namespace App\Http\Controllers;

use App\Models\TuitionAssessment;
use App\Models\User;
use Illuminate\Http\Request;

class TuitionAssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assessments = User::where('role', 'tutor')->get();
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

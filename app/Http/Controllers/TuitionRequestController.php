<?php

namespace App\Http\Controllers;

use App\Models\TuitionRequest;
use App\Models\User;
use Illuminate\Http\Request;

class TuitionRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tutors = User::where('role', 'tutor')->get();
        // dd($tutors); to view data without page
        return view('tutee.requests.index', [
            'tutors' => $tutors,
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

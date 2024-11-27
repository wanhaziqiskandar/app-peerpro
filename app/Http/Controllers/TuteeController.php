<?php

namespace App\Http\Controllers;

use App\Models\Tutee;
use App\Models\User;
use Illuminate\Http\Request;

class TuteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tutees = User::where('role', 'tutee')->get();
        // dd($tutors); to view data without page
        return view('tutor.tutees.index', [
            'tutees' => $tutees,
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $tutee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $tutee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $tutee)
    {
        //
    }
}

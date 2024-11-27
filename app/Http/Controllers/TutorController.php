<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\User;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tutors = User::where('role', 'tutor')->get();
        // dd($tutors); to view data without page
        return view('tutee.tutors.index', [
            'tutors' => $tutors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tutors = User::where('role', 'tutor')->get();
        return view('tutee.tutors.create', [
            'tutors' => $tutors
        ]);
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
        $tutor = User::find($id);

        // dd($tutor); 
        return view('tutee.tutors.show', [
            'tutor' => $tutor
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $tutor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $tutor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $tutor)
    {
        //
    }
}

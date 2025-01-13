<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Query for tutors
        $query = User::where('role', 'tutor');

        // Search by tutor name (if provided)
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('lastname', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by expertise (if selected)
        if ($request->has('subject') && $request->subject !== 'all') {
            $query->where('expertise', $request->subject);
        }

        $tutors = $query->get();

        // Fetch all distinct expertise values from the database
        $expertiseOptions = User::where('role', 'tutor')->distinct()->pluck('expertise');

        return view('tutee.tutors.index', [
            'tutors' => $tutors,
            'search' => $request->search,
            'subject' => $request->subject,
            'expertiseOptions' => $expertiseOptions, // Pass expertise options to the view
        ]);
    }


    // public function index()
    // {
    //     $tutors = User::where('role', 'tutor')->get();
    //     // dd($tutors); to view data without page
    //     return view('tutee.tutors.index', [
    //         'tutors' => $tutors,
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $id)
    {
        $tutor = User::find($id);

        return view('tutee.tutors.create', [
            'tutor' => $tutor
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tutor = User::where('id', $id)->where('role', 'tutor')->first();

        if (!$tutor) {
            return response()->json(['error' => 'Tutor not found'], 404);
        }

        return response()->json([
            'id' => $tutor->id,
            'name' => $tutor->name,
            'age' => $tutor->age,
            'experience' => $tutor->experience,
            'qualifications' => $tutor->qualifications,
            'expertise' => $tutor->expertise,
            'email' => $tutor->email,
            'phone_number' => $tutor->phone_number,
        ]);

        // $tutor = User::find($id);

        // // dd($tutor);
        // return view('tutee.tutors.show', [
        //     'tutor' => $tutor
        // ]);
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

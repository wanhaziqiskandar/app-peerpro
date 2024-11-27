<?php

namespace App\Http\Controllers;

use App\Models\TuitionPayment;
use App\Models\User;
use Illuminate\Http\Request;

class TuitionPaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tutors = User::where('role', 'tutor')->get();
        // dd($tutors); to view data without page
        return view('tutee.payments.index', [
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
    public function show(TuitionPayment $tuitionPayments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TuitionPayment $tuitionPayments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TuitionPayment $tuitionPayments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TuitionPayment $tuitionPayments)
    {
        //
    }
}

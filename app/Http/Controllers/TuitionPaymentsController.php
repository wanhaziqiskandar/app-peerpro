<?php

namespace App\Http\Controllers;

use App\Models\TuitionPayment;
use App\Models\TuitionRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TuitionPaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $tuition_request_id)
    {
        // dd($tuition_request_id);
        $tuition_request = TuitionRequest::find($tuition_request_id);
        $tuition_payment = TuitionPayment::create([
            'request_id' => $tuition_request->id,
            'tutee_id' => Auth::id(),
            'amount' => ($tuition_request->tutor->price_rate * 3),
            'date' => now(),
        ]);
        // $tutors = User::where('role', 'tutor')->get();
        // dd($tutors); to view data without page
        return view('tutee.payments.index', [
            // 'tutors' => $tutors,
            'payment' => $tuition_payment,
        ]);
    }

    public function submit(Request $request)
    {
        $tuition_payment = TuitionPayment::find($request['payment_id']);
        $tuition_payment->update([
            'status' => 'success',
        ]);

        return redirect(route('requests.index'));
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

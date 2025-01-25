<?php

namespace App\Http\Controllers;

use App\Models\TuitionPayment;
use App\Models\TuitionRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Cashier;

class TuitionPaymentsController extends Controller
{
    public function index(Request $request, int $id)
    {
        $tuition_request = TuitionRequest::find($id);

        if($tuition_request->status == 'paid'){
            return redirect(route('requests.index'))->with('error', 'This session has been paid');
        }

        $tuition_payment = TuitionPayment::create([
            'request_id' => $tuition_request->id,
            'tutee_id' => Auth::id(),
            'amount' => ($tuition_request->tutor->price_rate * 3 *100),
            'date' => now(),
        ]);

        return $request->user()->checkoutCharge($tuition_payment->amount, ('Session Payment: ' . $tuition_request->tutor->name), 1, [
            'success_url' => route('payments.success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payments.fail'),
            'metadata' => [
                'tuition_payment_id' => $tuition_payment->id,
            ],
        ]);
    }

    public function submit(Request $request)
    {

        $tuition_payment = TuitionPayment::find($request['payment_id']);
        $tuition_payment->update([
            'status' => 'success',
        ]);
        // return redirect($session->url);
        return redirect(route('requests.index'));
    }

    public function payment_success(Request $request)
    {
        $sessionId = $request->get('session_id');

        if ($sessionId === null) {
            return view('checkout.failure');
        }

        $session = Cashier::stripe()->checkout->sessions->retrieve($sessionId);

        if ($session->payment_status !== 'paid') {
            return view('checkout.failure');
        }

        $tuition_payment_id = $session['metadata']['tuition_payment_id'] ?? null;

        $tuition_payment = TuitionPayment::findOrFail($tuition_payment_id);

        $tuition_payment->update(['status' => 'success']);
        $tuition_payment->tuitionRequest->update([
            'status' => 'paid'
        ]);

        return view('checkout.success', ['tuition_payment' => $tuition_payment]);
    }
    public function payment_fail(Request $request)
    {
        return view('checkout.cancel');
    }
}

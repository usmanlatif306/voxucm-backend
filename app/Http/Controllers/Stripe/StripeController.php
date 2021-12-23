<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use App\Models\Did;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Stripe;

class StripeController extends Controller
{
    public function index(Purchase $purchase)
    {
        if ($purchase->payment_id) {
            return redirect()->route('prison.did.index')->with('error', "Payment already successfully done.");
        }

        return view('prison.payment.index', compact('purchase'));
    }

    // Saving payment
    public function paymentSave(Purchase $purchase, Request $request)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $payment = Stripe\Charge::create([
            "amount" => 100 * 10,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Making test payment."
        ]);
        $purchase->update(['payment_id' => $payment->id, 'invoiced' => now()]);

        return redirect()->route('prison.did.index')->with('success', "Payment has been successfully done.");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Plan;
use App\Models\Promo;
use Illuminate\Http\Request;
use Stripe;

class CartController extends Controller
{
    public function cart()
    {
        if (!auth()->user()) {
            session(['redirect' => 'prison.cart']);
            return redirect()->route('prison.login');
        }
        // dd(Order::whereIn('id', session('user.cart'))->where('order_status', 'Unpaid')->get());
        $orders = auth()->user()->orders()->where('order_status', 'Unpaid')->get();

        $price = 0;
        foreach ($orders as $order) {
            $price = $price + $order->price;
        }

        return view('prison.cart', [
            'orders' => $orders,
            'price' => $price,
        ]);
    }

    // Save records
    public function saveRecords(Request $request)
    {
        // dd($request->price);
        $orders = auth()->user()->orders()->where('order_status', 'Unpaid')->get();
        $plan = auth()->user()->orders()->whereNotNull('product_id')->where('order_status', 'Unpaid')->first();

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $payment = Stripe\Charge::create([
            "amount" => 100 * $request->price,
            "currency" => "eur",
            "source" => $request->stripeToken,
            "description" => "Making test payment."
        ]);

        foreach ($orders as $order) {
            $order->update(['order_status' => 'Paid', 'payment_id' => $payment->id, 'invoiced' => now()]);
            $order->billdetail()->create($request->all());
            $order->prisonerdetail()->create($request->all());
        }
        if ($plan) {
            auth()->user()->plan()->create([
                'product_id' => $plan->product->id,
                // 'expired_at' => now()->addMonth($plan->product->month),
                'expired_at' => now()->addDays($plan->product->month * 30)->toDateTimeString(),
                'month' => $plan->product->month,
                'minutes' => $plan->product->minutes,
                'allowed_dids' => $plan->product->lines,
            ]);
        }


        // BillDetail::create($request->all());
        // PrisonerDetail::create($request->all());

        return redirect()->route('prison.did.index')->with('success', "Payment has been successfully done.");
    }

    // apply promo code to cart
    public function promo(Request $request)
    {
        $promo = Promo::where('name', $request->name)->first();
        if ($promo && $promo->status) {
            return response([
                'error' => false,
                'message' => 'valid promo code',
                'discount' => $promo->value,
            ]);
        } else {
            return response([
                'error' => true,
                'message' => 'invalid promo code',
            ]);
        }
    }
}

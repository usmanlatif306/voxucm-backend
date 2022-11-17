<?php

namespace App\Services;

use App\Models\Order;

/**
 * Class AuthService
 * @package App\Services
 */
class AuthService
{
    public function session_orders()
    {
        // if session cart has orders then updating user_id for that orders
        if (session('user.cart') && count(session('user.cart')) > 0) {
            $orders = Order::whereIn('id', session('user.cart'))->where('order_status', 'Unpaid')->get();
            // dd($orders);
            foreach ($orders  as $order) {
                $order->update(['user_id' => auth()->id()]);
            }
            request()->session()->forget('user.cart');
            return redirect()->route('prison.cart');
        }
        // if user has to redirect to specific page after login
        if (session()->has('redirect')) {
            $redirect = session('redirect');
            request()->session()->forget('redirect');
            return redirect()->route($redirect);
        }
    }
}

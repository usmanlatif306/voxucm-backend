<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Save Order to DB
    public function saveOrder(Request $request)
    {
        $order = Order::create($request->all());
        if ($order) {
            return redirect()->back()->with('success', 'Order Has been Added');
        }
        return redirect()->back()->with('error', 'Something Went Wrong');
    }

    // Delete Order
    public function deleteOrder(Order $order)
    {
        $order->delete();
        return redirect()->back()->with('success', 'Order Deleted Successfully');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Did;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Save Order to DB
    public function saveOrder(Request $request)
    {
        $order = Order::create($request->all());
        $request->session()->push('user.cart', $order->id);
        $request->session()->put('orderId', $order->id);
        if ($order) {
            // return redirect()->back()->with('success', 'Order Has been Added');
            return response([
                'error' => false,
                'message' => 'Order Has been Added'
            ]);
        }
        // return redirect()->back()->with('error', 'Something Went Wrong');
        return response([
            'error' => true,
            'message' => 'Something Went Wrong'
        ]);
    }

    // Save Order to DB
    public function orderCity(Request $request)
    {
        $order = Order::find($request->session()->get('orderId'))->update(['area_code_id' => $request->city]);

        if ($order) {
            return response([
                'error' => false,
                'message' => 'City has been added'
            ]);
        }
        return response([
            'error' => true,
            'message' => 'Something Went Wrong'
        ]);
    }

    // Delete Order
    public function deleteOrder(Order $order)
    {
        // if order is for peckage
        if ($order->product_id) {
            $order->delete();
        } else {
            // order is for did purchase
            $did = Did::where('id', $order->did_id)->first();
            $did->update(['status' => false]);
            $order->delete();
        }

        return redirect()->back()->with('success', 'Order Deleted Successfully');
    }
}

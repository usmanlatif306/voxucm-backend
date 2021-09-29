<?php

namespace App\Http\Controllers;

use App\Models\BillDetail;
use App\Models\Cart;
use App\Models\PrisonerDetail;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $orders = auth()->user()->orders;
        // dd($orders[0]->billdetail);
        // dd($orders[0]->prisonerdetail);
        $price = 0;
        foreach ($orders as $order) {
            $price = $price + $order->product->price;
        }

        return view('prison.cart', [
            'orders' => $orders,
            'price' => $price,
        ]);
    }

    // Save records
    public function saveRecords(Request $request)
    {
        // dd($request->all());
        BillDetail::create($request->all());
        PrisonerDetail::create($request->all());
        dd("Added");
    }
}

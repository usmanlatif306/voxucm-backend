<?php

namespace App\Http\Controllers;

use App\Models\PurchaseDetail;
use Illuminate\Http\Request;

class PurchaseDetailController extends Controller
{
    // details about a did
    public function index(PurchaseDetail $did)
    {
        return response()->json([
            "detail" => $did
        ], 200);
    }

    // Store details about a number
    public function store(PurchaseDetail $did, Request $request)
    {
        $detail = PurchaseDetail::create($request->all());
        return response()->json([
            "detail" => $detail
        ], 200);
    }

    // Updatedetails about a number
    public function update(Request $request)
    {

        PurchaseDetail::where('purchase_id', $request->id)
            ->update($request->all());
        return response()->json([
            "message" => "Data has been updated",
        ], 200);
    }
}

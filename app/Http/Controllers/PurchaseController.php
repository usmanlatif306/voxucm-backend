<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index(User $user)
    {
        $dids = $user->numbers;
        if ($dids) {
            return response()->json([
                "dids" => $dids
            ], 200);
        }
        return response()->json([
            "error" => "No did found against this user"
        ], 404);
    }

    // store new purchase did
    public function store(Request $request)
    {
        // return $request->all();
        $did = Purchase::create($request->all());
        return response()->json([
            "message" => "Did store successfully",
            "did" => $did
        ], 200);
    }

    // show single purchase did
    public function show(Purchase $did)
    {
        $detail = $did->purchase_details[0];
        return response()->json([
            "did" => $did,
            "detail" => $detail
        ], 200);
    }

    // Updatenew purchase did
    public function update(Request $request)
    {
        // return $request->all();

        Purchase::where('id', $request->id)
            ->update($request->all());
        return response()->json([
            "message" => "Note has been update",
        ], 200);
    }
}

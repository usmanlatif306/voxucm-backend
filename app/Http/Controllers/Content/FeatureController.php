<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use App\Models\Content\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function features()
    {
        $feature = Feature::get()->first();
        return view('prison.features', compact('feature'));
    }

    public function index()
    {
        $feature = Feature::get()->first();
        return view('content.feature', compact('feature'));
    }

    public function update(Feature $feature, Request $request)
    {
        $feature->update($request->all());
        return redirect()->back()->with('success', 'Data has been updated');
    }
}

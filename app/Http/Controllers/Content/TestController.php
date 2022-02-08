<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use App\Models\Content\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $test = Test::get()->first();
        return view('content.test', compact('test'));
    }

    public function update(Test $test, Request $request)
    {
        $test->update($request->all());
        return redirect()->back()->with('success', 'Data has been updated');
    }
}

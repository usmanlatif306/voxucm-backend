<?php

namespace App\Http\Controllers\content;

use App\Http\Controllers\Controller;
use App\Models\content\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function works()
    {
        $work = Work::get()->first();
        return view('prison.works', compact('work'));
    }
    public function index()
    {
        $work = Work::get()->first();
        return view('content.work', compact('work'));
    }

    public function update(Work $work, Request $request)
    {
        $work->update($request->all());
        return redirect()->back()->with('success', 'Data has been updated');
    }
}

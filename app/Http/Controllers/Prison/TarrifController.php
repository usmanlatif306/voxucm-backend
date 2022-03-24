<?php

namespace App\Http\Controllers\Prison;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TarrifController extends Controller
{
    public function index()
    {
        return view('prison.tarrif.index');
    }

    public function setTarrif(Request $request)
    {
        dd($request->all());
    }
}

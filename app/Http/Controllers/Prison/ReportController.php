<?php

namespace App\Http\Controllers\Prison;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function calls()
    {
        return view('prison.reports.index');
    }

    public function onlinesipuser()
    {
        return view('prison.reports.onlinesipuser');
    }
}

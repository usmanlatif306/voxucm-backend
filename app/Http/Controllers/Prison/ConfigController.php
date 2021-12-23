<?php

namespace App\Http\Controllers\Prison;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{

    public function daynight()
    {
        return view('prison.config.daynight');
    }

    public function ivr()
    {
        return view('prison.config.ivr');
    }
}

<?php

namespace App\Http\Controllers\Prison;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class UserPlanController extends Controller
{
    public function index()
    {
        $plan = auth()->user()->plan;

        return view('prison.plan.index', compact('plan'));
    }

    public function expired()
    {
        $plan = auth()->user()->plan;

        return view('prison.plan.index', compact('plan'));
    }

    // admin methods
    // all active plans
    public function plans()
    {
        $plans = Plan::with(['product', 'user'])->where('expired_at', '>=', now())->get();

        return view('admin.plans.index', compact('plans'));
    }
}

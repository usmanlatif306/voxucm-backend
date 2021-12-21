<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserDetailController extends Controller
{
    public function index()
    {
        $user =  DB::connection('mysql2')->table('vox_tenant')->where('tenant_id', 21)->first();
        return response()->json([
            'user' => $user
        ]);
    }
}

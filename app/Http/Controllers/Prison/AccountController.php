<?php

namespace App\Http\Controllers\Prison;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{

    // MyAccount
    public function myAccount()
    {
        $user = $this->getUserDetails();
        return view('prison.account.myaccount', compact('user'));
    }

    public function editAccount()
    {
        return view('prison.account.edit');
    }

    // public function editPassword()
    // {
    //     return view('prison.account.password');
    // }

    // getting user details from msql2 connection
    private function getUserDetails()
    {
        return  DB::connection('mysql2')->table('vox_tenant')->where('tenant_id', 21)->first();
    }
}

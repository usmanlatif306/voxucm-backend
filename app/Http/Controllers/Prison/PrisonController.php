<?php

namespace App\Http\Controllers\Prison;

use App\Http\Controllers\Controller;
use App\Models\CallForwarding;
use App\Models\User;
use App\Models\Vox;
use App\Models\Voxucm;
use App\Models\Voxucm\VoxTenant;
use App\Models\Voxucm\VoxUser;
use App\Services\ExtensionService;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class PrisonController extends Controller
{

    public function __construct()
    {
    }
    public function index()
    {
        return view('prison.index');
    }
    // dashboard
    public function dashboard()
    {
        $user = $this->getUserDetails();
        $extensions = (new ExtensionService())->getExtensions();
        session(['username' => $user->username]);
        session(['balance' => $user->credit]);

        return view('prison.dashboard.dashboard', compact('user', 'extensions'));
    }

    // account
    public function account()
    {
        $user = auth()->user();
        $user->load('user_details');
        return view('prison.dashboard.account', compact('user'));
    }

    // Extensions
    public function extensions()
    {
        $extensions = (new ExtensionService())->getExtensions();
        foreach ($extensions as $key => $array) {
            foreach ($array as $value) {
                $SUBSCRIBERID = $array['SUBSCRIBERID'];
                // $forwardings = DB::connection('mysql2')->table('vox_forwarding')->where('subscriber_id', $SUBSCRIBERID)->where('calltype', 'ALLFORWARD')->first();
                $forwardings = CallForwarding::where('subscriber_id', $SUBSCRIBERID)->where('call_type', 'ALLFORWARD')->orderBy('created_at', 'DESC')->first();
                $extensions[$key]['FORWARDING'] = $forwardings;
            }
        }
        // dd($extensions);
        return view('prison.dashboard.extensions', compact('extensions'));
    }

    // call history
    public function callHistory()
    {
        return view('prison.dashboard.callhistory');
    }
    public function callHistorySearch(Request $request)
    {
        dd($request->all());
    }

    // setting
    public function setting()
    {
        $user = VoxTenant::where('tenant_id', auth()->user()->tenant_id)->first();
        return view('prison.dashboard.setting', compact('user'));
    }

    // updating password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if (Auth::attempt(['email' => auth()->user()->email, 'password' => $request->old_password])) {
            $user = User::where('email', auth()->user()->email)->first();
            $user->password = Hash::make($request->password);
            $user->save();
            VoxUser::findOrFail(auth()->user()->tenant_user)->update([
                'password' => sha1($request->password),
            ]);
            return redirect()->back()->with('success', 'Password Successfully Updated');
        }
        return redirect()->back()->with('error', 'Invalid Old Password');
        $validId = auth()->user()->email === $request->email;
        if ($validId) {
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $user = User::where('email', $request->email)->first();
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('success', 'Password Successfully Updated');
        }
        return redirect()->back()->with('email', 'Invalid Email ID');
    }

    // updating details
    public function updateDetails(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        if ($request->phone !== $user->phone) {
            $user->is_phone_verified = 0;
            $user->save();
        }
        $user->update($request->all());
        VoxTenant::where('tenant_id', auth()->user()->tenant_id)->update([
            'firstname' => $request->name,
            'username' => $request->username,
            'address' => $request->address,
            'phonenumber' => $request->phone,
            'billing_type' => $request->billing_type,
            'billing_cycle_mode' => $request->billing_cycle,
        ]);

        return redirect()->back()->with('status', 'User Details Successfully Updated');
    }
    // update prison details
    public function updatePrisonDetails(Request $request)
    {
        $request->validate([
            'prison_fname' => ['required', 'string', 'max:255'],
            'prison_lname' => ['required', 'string', 'max:255'],
            'prison_number' => ['required', 'numeric'],
            'prison_status' => ['required'],
            'release_date' => [$request->prison_status === 'sentenced' ? 'required' : 'nullable', 'date'],
            'prison_relation' => ['required', 'string', 'max:255'],
        ]);
        auth()->user()->user_details()->update([
            'prison_fname' => $request->prison_fname,
            'prison_lname' => $request->prison_lname,
            'prison_number' => $request->prison_number,
            'prison_status' => $request->prison_status,
            'release_date' => $request->release_date,
            'prison_relation' => $request->prison_relation,
        ]);
        return redirect()->back()->with('prison_status', 'User Details Successfully Updated');
    }
    // buymore
    public function buymore()
    {
        return view('prison.dashboard.buymore');
    }

    // accounts
    public function accounts()
    {
        return view('prison.dashboard.order');
    }
    // usage
    public function usage()
    {
        return view('prison.dashboard.usage');
    }
    // usage
    public function expiry()
    {
        return view('prison.dashboard.expiry');
    }


    // getting user details from msql2 connection
    private function getUserDetails()
    {
        return  DB::connection('mysql2')->table('vox_tenant')->where('tenant_id', auth()->user()->vox_user->tenant_id)->first();
    }
}

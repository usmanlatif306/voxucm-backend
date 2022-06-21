<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VoxDidDetail;
use App\Services\ExtensionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminExtensionController extends Controller
{
    public function index()
    {
        $users = User::select(['id', 'name', 'email', 'phone'])->paginate(10);
        return view('admin.extensions.index', compact('users'));
    }

    // showing user extensions
    public function show($id)
    {
        $user = User::findorFail($id);
        $id = $user->vox_user->extension;
        $data = [
            'APIUSER' => $user->vox_user->api_username,
            'APIPASSWORD' => $user->vox_user->api_password
        ];
        $extensions = (new ExtensionService())->getExtensionsAdmin($id, $data);
        foreach ($extensions as $key => $item) {
            $numberQuery = DB::connection('mysql2')->table('vox_forwarding')->where('subscriber_id', $item["SUBSCRIBERID"])->select(['dest_app_number'])->first();
            $number = $numberQuery ? $numberQuery->dest_app_number : null;
            $extensions[$key]['FORWARDING'] = $number;
            $query = VoxDidDetail::where('subscriber_id', $item["SUBSCRIBERID"])->select(['did'])->first();
            $did = $query ? $query->did : null;
            $extensions[$key]['DID'] = $did;
        }
        return view('admin.extensions.show', compact('user', 'extensions'));
    }

    public function saveDid(Request $request)
    {
        VoxDidDetail::create($request->all());
        return redirect()->back();
    }
}

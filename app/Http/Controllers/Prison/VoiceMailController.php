<?php

namespace App\Http\Controllers\Prison;

use App\Http\Controllers\Controller;
use App\Models\Voxucm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoiceMailController extends Controller
{
    public function index()
    {
        $voicemails = DB::connection('mysql2')->table('vox_viocemail')->where('tenant_id', auth()->user()->tenant_id)->get();

        return view('prison.config.voicemail.index', compact('voicemails'));
    }

    // add voice mail
    public function addVoiceMail(Request $request)
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'VOICEMAIL',
            'ACTION' => 'ADD',
            'DATA' => array(
                "VOICEMAILUSER" => $request->username,
                "VOICEMAILSECRET" => $request->secret,
                "EMAILADDRESS" => $request->email,
                "STATUS" => "1"
            )
        ));
        $data = Voxucm::curlRequest($postdata);
        $data = json_decode($data, true);

        if ($data['STATUS'] === 'FAILED') {
            $error = $data['DATA']['MESSAGE'];
            return redirect()->back()->with('error', $error);
        }
        return redirect()->back()->with('success', "Voice Mail added successfully");
    }

    // edit
    public function edit($id)
    {
        $voicemail = DB::connection('mysql2')->table('vox_viocemail')->where('tenant_id', 21)->where('voicemail_id', $id)->first();

        return view('prison.config.voicemail.edit', compact('voicemail'));
    }

    public function update($id, Request $request)
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'VOICEMAIL',
            'ACTION' => 'EDIT',
            'DATA' => array(
                "VOICEMAILID" => $id,
                "VOICEMAILUSER" => $request->username,
                "VOICEMAILSECRET" => $request->secret,
                "EMAILADDRESS" => $request->email,
                "STATUS" => $request->status
                // "STATUS" => "$request->status"
            )
        ));
        $data = Voxucm::curlRequest($postdata);
        $data = json_decode($data, true);

        if ($data['STATUS'] === 'FAILED') {
            $error = $data['DATA']['MESSAGE'];
            return redirect()->back()->with('error', $error);
        }
        return redirect()->back()->with('success', "Voice Mail added successfully");
    }

    // delete voice mail

    public function delete($id)
    {

        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'VOICEMAIL',
            'ACTION' => 'DELETE',
            'DATA' => array("VOICEMAILID" => $id)
        ));
        $data = Voxucm::curlRequest($postdata);

        $data = json_decode($data, true);
        if ($data['STATUS'] === 'FAILED') {
            $error = $data['DATA']['MESSAGE'];
            return redirect()->back()->with('error', $error);
        }
        return redirect()->back()->with('success', "Voice Mail deleted successfully");
    }
}

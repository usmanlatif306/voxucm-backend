<?php

namespace App\Http\Controllers;

use App\Models\Voxucm;
use App\Services\VoiceMailService;
use Illuminate\Http\Request;

class VoiceController extends Controller
{

    // Voice Mail list
    public function voicemaillist()
    {
        return (new VoiceMailService())->fetchVoiceMails();
    }
    // Voice Mail Drop list
    public function voicemaildroplist()
    {
        $postdata = array(
            'SECTION' => 'VOICEMAINDROPDOWN',
            'ACTION' => 'LIST',
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Mapped Extension
    public function mappedextension()
    {
        $postdata = array(
            'SECTION' => 'VOICEMAIL',
            'SECTION' => 'VOICEMAIL',
            'ACTION' => 'MAPPEDEXTENSION',
            'DATA' => array("VOICEMAILID" => "17")
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Add Voice Mail
    public function addvoicemail(Request $request)
    {
        $postdata = array(
            'SECTION' => 'VOICEMAIL',
            'ACTION' => 'ADD',
            'DATA' => array(
                "VOICEMAILUSER" => $request->user,
                "VOICEMAILSECRET" => $request->secret,
                "EMAILADDRESS" => $request->email,
                "STATUS" => "1"
            )
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // EditVoice Mail
    public function editvoicemail(Request $request)
    {
        $postdata = array(
            'SECTION' => 'VOICEMAIL',
            'ACTION' => 'EDIT',
            'DATA' => array(
                "VOICEMAILID" => $request->voice_id,
                "VOICEMAILUSER" => $request->user,
                "VOICEMAILSECRET" => $request->secret,
                "EMAILADDRESS" => $request->email,
                "STATUS" => "1"
                // "STATUS" => "$request->status"
            )
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Delete Voice Mail
    public function deltvoicemail($id)
    {
        $postdata = array(
            'SECTION' => 'VOICEMAIL',
            'ACTION' => 'DELETE',
            'DATA' => array("VOICEMAILID" => $id)
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
}

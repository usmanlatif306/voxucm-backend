<?php

namespace App\Http\Controllers;

use App\Models\Voxucm;
use Illuminate\Http\Request;

class VoiceController extends Controller
{
    // Voice Mail list
    public function voicemaillist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'VOICEMAIL',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Voice Mail Drop list
    public function voicemaildroplist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'VOICEMAINDROPDOWN',
            'ACTION' => 'LIST',
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Mapped Extension
    public function mappedextension()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'VOICEMAIL',
            'SECTION' => 'VOICEMAIL',
            'ACTION' => 'MAPPEDEXTENSION',
            'DATA' => array("VOICEMAILID" => "17")
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Add Voice Mail
    public function addvoicemail(Request $request)
    {

        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'VOICEMAIL',
            'ACTION' => 'ADD',
            'DATA' => array(
                "VOICEMAILUSER" => $request->user,
                "VOICEMAILSECRET" => $request->secret,
                "EMAILADDRESS" => $request->email,
                "STATUS" => "1"
            )
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // EditVoice Mail
    public function editvoicemail(Request $request)
    {
        // return $request->all();
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
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
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Delete Voice Mail
    public function deltvoicemail($id)
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'VOICEMAIL',
            'ACTION' => 'DELETE',
            'DATA' => array("VOICEMAILID" => $id)
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
}

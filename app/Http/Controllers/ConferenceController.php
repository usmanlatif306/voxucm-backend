<?php

namespace App\Http\Controllers;

use App\Models\Voxucm;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    // Conference List
    public function conflist()
    {
        $postdata = array(
            'SECTION' => 'CONFERENCE',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Add Conference
    public function addconference()
    {
        $postdata = array(
            'SECTION' => 'CONFERENCE',
            'ACTION' => 'ADD',
            'DATA' => array(
                "CONFERENCENUMBER" => "6599",
                "MAXMEMBERS" => "5",
                "ADMINSECRET" => "4155",
                "USERSECRET" => "5266",
                "STARTTIME" => "2021-06-21 08:38:14",
                "ENDTIME" => "2021-06-21 09:40:14",
                "RECORDING" => "1"
            )
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Update Conference
    public function editconference()
    {
        $postdata = array(
            'SECTION' => 'CONFERENCE',
            'ACTION' => 'EDIT',
            'DATA' => array(
                "CONFERENCEID" => "3",
                "CONFERENCENUMBER" => "6591*9",
                "MAXMEMBERS" => "4",
                "ADMINSECRET" => "4255",
                "USERSECRET" => "5216",
                "STARTTIME" => "2021-06-21 08:38:14",
                "ENDTIME" => "2021-06-21 09:40:14",
                "RECORDING" => "1"
            )
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Delete Conference
    public function deleteconference()
    {
        $postdata = array(
            'SECTION' => 'CONFERENCE',
            'ACTION' => 'DELETE',
            'DATA' => array("CONFERENCEID" => "9")
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
}

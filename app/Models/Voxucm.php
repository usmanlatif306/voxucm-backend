<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nette\Utils\Json;

class Voxucm extends Model
{
    use HasFactory;

    static public function curlRequest($postdata)
    {
        $url = config('app.vox_url');
        // $user = array(
        //     'APIUSER' => '21_apiuser',
        //     'APIPASSWORD' => MD5('123456')
        // );
        $user = array(
            'APIUSER' => auth()->user()->vox_user->api_username,
            'APIPASSWORD' => MD5(auth()->user()->vox_user->api_password)
        );

        $data = json_encode(array_merge($user, $postdata));
        $ch = curl_init();

        // Set SERVER API URL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'request=' . $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        return $server_output;
    }

    static public function curlRequestAdmin($postdata, $data = null)
    {
        $url = config('app.vox_url');
        // $user = array(
        //     'APIUSER' => '21_apiuser',
        //     'APIPASSWORD' => MD5('123456')
        // );

        $user = array(
            'APIUSER' => $data['APIUSER'] ?? auth()->user()->vox_user->api_username,
            'APIPASSWORD' => $data['APIPASSWORD'] ? MD5($data['APIPASSWORD']) : MD5(auth()->user()->vox_user->api_password)
        );
        $data = json_encode(array_merge($user, $postdata));
        $ch = curl_init();

        // Set SERVER API URL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'request=' . $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        return $server_output;
    }
}

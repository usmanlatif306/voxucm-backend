<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TenantController extends Controller
{
    // getting tenant
    public function index()
    {
        $postdata = json_encode(array(
            'adminusername' => 'admin',
            'adminpassword' => 'newPass#2021',
            'title_name' => 'DR',
            'companyname' => 'newTestTenant',
            'name' => 'usman latif',
            'address' => 'toba tek singh',
            'status' => 'Active',
            'phonenumber' => '8096613153',
            'emailaddress' => 'usman306@demo.com',
            'country_name' => 'Pakistan',
            'currency' => 'USD',
            'username' => 'usman306',
            'password' => '123456',
            'confirmpassword' => '123456',
            'tariffplan' => 'cpaasrates',
            'smsrateplan' => 'Bond007',
            'billing_type' => 'PREPAID',
            'credit' => '12.00',
            'credit_limit' => '20.00',
            'subscribers_limit' => '10',
            'tax_type' => 'GST',
            'gst_tax' => '20',
            'paymentterms' => '10',
            'invoice_date' => '2020-09-04',
            'billing_cycle_mode' => 'DAYWISE',
            'billing_cycle' => '11',
            'parking_option' => '0',
        ));
        $ch = curl_init();

        // Set SERVER API URL
        curl_setopt($ch, CURLOPT_URL, 'http://141.94.55.55/voxucm/api/api.php');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'request=' . $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        // return $server_output;
        return response(['message' => $server_output]);
    }

    public function testing()
    {
        return DB::connection('mysql2')->table('vox_tenant')->where('tenant_id', 21)->get();
        return "testing";
    }
}

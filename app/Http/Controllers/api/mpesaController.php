<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class mpesaController extends Controller
{
    public function getAccessToken()
    {
        $consumer_key = 'MzbOg0uFAJmVZbR3t3B3yJg1sUwusVl0AGHNoAmM1fQJNYtI';
        $consumer_secret= 'IwsaCQvAxTLxEAQ80ydL6eewJESvl1wezMndrYE7Ozc8PxAD8qyJKVK4HzZNC4Kq';
        $credentials = base64_encode($consumer_key.':'.$consumer);
        $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $curl_response = curl_exec($curl);
        $json_decode = json_decode($curl_response);
        $access_token = $json_decode->access_token;
        return $access_token;
        echo $access_token;

    }
}

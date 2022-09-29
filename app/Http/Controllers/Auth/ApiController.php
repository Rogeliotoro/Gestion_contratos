<?php

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;


class ApiController extends Controller
{
    public function Api()
    {
        $client = new Client();
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Cookie' => 'fpc=Am-xO5eyqQ5NlFPwau7ZqFcvJCvyAQAAAB11x9oOAAAA; stsservicecookie=estsfd; x-ms-gateway-slice=estsfd'
        ];
        $options = [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => 'f74877e9-0d7f-41f0-8c91-364fc0246cb1',
                'client_secret' => 'k1q8Q~Efk_1oVpM8YmzmEonyX1E6WoDNg_aJAb7g',
                'scope' => 'https://api.businesscentral.dynamics.com/.default'
            ]
        ];
        $request = new Request('POST', 'https://login.microsoftonline.com/d473ae56-acdd-4bb7-9914-f33a177b6739/oauth2/v2.0/token', $headers);
        $res = $client->sendAsync($request, $options)->wait();
        echo $res->getBody();
    }
}

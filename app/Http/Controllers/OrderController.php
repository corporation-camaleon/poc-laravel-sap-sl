<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealSoft\SAPBOSL\Config;
use RealSoft\SAPBOSL\SAPClient;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{

    public function index()
    {

        // $configOptions =  config('sap.sap');
        // $config = new Config($configOptions);
        // dd($config->getServiceUrl('Orders'));

        $client = SAPClient::createSession();
        $session = $client->getSession();
        $client = new SAPClient(config('sap.sap'), $session);

        $orders = $client->getService('Orders');

        $result = $orders->queryBuilder()
            ->select('DocEntry,DocNum')
            ->orderBy('DocNum', 'asc')
            ->findAll();

        dd($result);
    }

    public function index2()
    {

        $response = Http::post('http://190.61.26.90:50000/b1s/v2/Login', [
            'UserName' => config('sap.sap.username'),
            'Password' => config('sap.sap.password'),
            'CompanyDB' => config('sap.sap.company_db')
        ])->throw()->json();

        // $client = SAPClient::createSession();
        // $session = $client->getSession();
        // $client = new SAPClient(config('sap.sap'), $session);

        // $orders = $client->getService('Orders');

        // $result = $orders->queryBuilder()
        //     ->select('DocEntry,DocNum')
        //     ->orderBy('DocNum', 'asc')
        //     ->limit(5)
        //     ->findAll();

        dd($response);
    }

}

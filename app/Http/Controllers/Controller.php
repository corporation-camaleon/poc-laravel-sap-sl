<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
// use RealSoft\SAPBOSL\SAPClient;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Variable containing the SAP connection instance through the Service Layer.
     */
    // protected $client = null;

    /**
     * Contructor that generates the connection to SAP using the Service Layer,
     * which generates a SessioID of the configuration data and returns it to us
     * by means of a variable
     */
    // private function __contruct(){
    //     $this->client = SAPClient::createSession(config('username'), config('password'), config('company_db'));
    //     $session = $this->client->getSession();
    //     $this->client = new SAPClient(config('SAP'), $session);
    // }
}

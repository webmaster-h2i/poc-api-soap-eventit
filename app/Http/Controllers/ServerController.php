<?php

namespace App\Http\Controllers;

use SoapServer;
use App\Http\Controllers\SoapController;

class ServerController extends Controller
{
    
    public function startServer(){

        $params = ['trace' => true , 'soap_version'   => SOAP_1_2];
        $soapServer = new SoapServer('http://poceventit.h2i.fr/api/soap/wsdl', $params);
        $soapServer->setClass(SoapController::class);
        $soapServer->handle();
    }
}

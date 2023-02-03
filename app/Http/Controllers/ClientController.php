<?php

namespace App\Http\Controllers;

use SoapClient;

class ClientController extends Controller
{

    private $soapClient;

    public function __construct()
    {
        if(empty($this->soapClient)){
            $params = ['trace' => true , 'soap_version'   => SOAP_1_2];
            $this->soapClient = new SoapClient('http://poceventit.h2i.fr/api/soap/wsdl', $params);
        }
    }

    public function testServer(){

        $soap_params = array(
            "code_cabinetbase" 	=> '00034582',
            "no_pers" 			=> '000027031102',
            "motdepasse" 		=> '74FMVAET'
        );

        $test = $this->soapClient->__soapCall('Connexion', $soap_params);

        return $test;
    }
    
}

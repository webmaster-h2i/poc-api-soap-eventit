<?php

namespace App\Http\Controllers;

use SoapHeader;
use App\Models\Cabinet;
use App\Utility\Bundle;
use Illuminate\Http\Request;
use App\Utility\BundleResponse;

class SoapController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function getWsdl()
    {
        return response(file_get_contents(resource_path('wsdl/eventit.xml')), 200, [
            'Content-Type' => 'application/xml'
        ]);
    }

    public function complexType($data){

        return array_change_key_case($data, CASE_UPPER);
    }

    public function Connexion($code_cabinetbase, $no_pers, $motdepasse){

        $cabinet = Cabinet::where('code_cabinet',$code_cabinetbase)->get()->toArray();

        $cabinet = $this->complexType($cabinet[0]);

        $bundle = new Bundle;
        $bundle->setCabinet($cabinet);

        $bundleResp = new BundleResponse;
        $bundleResp->setStatut(true);
        $bundleResp->setMessage('cool');
        $bundleResp->setMessageTechnique('noproblemo');
        $bundleResp->setDetail($bundle);

        return $bundleResp;
    }

}

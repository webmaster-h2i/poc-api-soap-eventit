<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use Illuminate\Http\Request;
use SoapHeader;

class ApiController extends Controller
{
    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getSoap(Request $request)
    {
        $object = simplexml_load_string($request->getContent());
        $object = $object->children('soap', true)->children();
        $arr = json_decode( json_encode($object) , 1);

        if(array_keys($arr)[0] === 'Connexion'){
            $result = Cabinet::where('code_cabinet',$arr['Connexion']['code_cabinetbase'])->get();

            $retour = new SoapHeader('namespace', 'RequestorCredentials', $result);

            var_dump($retour);

            return 'hello';
        }

        return 'error';
    }
}

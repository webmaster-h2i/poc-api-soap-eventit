<?php

namespace App\Utility;

class BundleResponse
{
    public $statut = false;
    public $message = '';
    public $message_technique = '';
    public $detail = null;

    public function setStatut($statut){
        $this->statut = $statut;
    }

    public function setMessage($message){
        $this->message = $message;
    }

    public function setMessageTechnique($message_technique){
        $this->message_technique = $message_technique;
    }

    public function setDetail($detail){
        $this->detail = $detail;
    }

}
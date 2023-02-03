<?php

namespace App\Utility;

class Bundle
{
    public $CABINET = null;
    public $personne = null;

    public function setCabinet($cabinet){
        $this->CABINET = $cabinet;
    }

    public function setPersonne($personne){
        $this->personne = $personne;
    }

}
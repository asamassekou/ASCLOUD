<?php

include_once 'vue_inscription.php';
include_once 'modele_inscription.php';

class ContInscription{

    public $modele;
    public $vue;

    public function __construct() {
        $this->modele = new ModeleInscription();
        $this->vue = new VueInscription();
    }

    public function inscription()
    {
        $msg = $this->modele->inscription();

        $this->modele->inscription();
        $this->vue->inscription($msg);
    }


}


?>
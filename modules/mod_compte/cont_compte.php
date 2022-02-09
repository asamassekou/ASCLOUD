<?php

include_once 'vue_compte.php';
include_once 'modele_compte.php';

class ContCompte{

    public $modele;
    public $vue;

    public function __construct() {
      //  $this->modele = new ModeleAccueil();
        $this->vue = new VueCompte();
    }

    public function pagePrincipal()
    {
        $this->vue->pagePrincipal();
    }


}


?>
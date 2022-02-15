<?php

require_once 'vue_connexion.php';
require_once 'modele_connexion.php';

class ContConnexion{

    public $modele;
    public $vue;

    public function __construct() {
        $this->modele = new ModeleConnexion();
        $this->vue = new VueConnexion();
    }

    public function connexion()
    {
        $msg = $this->modele->connexion();

        $this->modele->connexion();
        $this->vue->connexion($msg);
    }

}


?>
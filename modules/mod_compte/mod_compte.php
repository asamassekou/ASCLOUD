<?php

require_once 'cont_compte.php';

class ModCompte{

    private $controleur;

    public function __construct() {
        $this->controleur = new ContCompte();
        $this->controleur->pagePrincipal();
    }

}

?>
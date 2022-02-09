<?php

require_once 'cont_inscription.php';

class ModInscription{

    private $controleur;

    public function __construct() {
        $this->controleur = new ContInscription();
        $this->controleur->inscription();
    }

}

?>
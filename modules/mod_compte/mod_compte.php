<?php

require_once 'cont_compte.php';

class ModCompte{

    private $controleur;

    public function __construct() {
        $this->controleur = new ContCompte();
        switch($this->controleur->action)
        {
            case "compte":
                $this->controleur->pagePrincipal();
                break;
            case "deconnexion":
                $this->controleur->deconnexion();
                break;
            default:
                break;

        }
    }
}

?>
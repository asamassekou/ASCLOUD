<?php

require_once 'cont_fichier.php';

class ModFichier{

    private $controleur;

    public function __construct() {
        $this->controleur = new ContFichier();
        switch($this->controleur->action)
        {
            case "fichier":
                $this->controleur->pageFichier();
                break;
            default:
                break;

        }
    }
}

?>
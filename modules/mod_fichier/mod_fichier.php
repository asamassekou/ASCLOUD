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
            case "fichierPerso":
                $this->controleur->pageFichierPerso();
                break;
            case "AccesRefuser":
                $this->controleur->pageAccesFichier();
                break;
            default:
                break;

        }
    }
}

?>
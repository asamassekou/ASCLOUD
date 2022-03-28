<?php

require_once 'cont_favoris.php';

class ModFavoris{

    private $controleur;

    public function __construct() {
        $this->controleur = new ContFavoris();
        switch($this->controleur->action)
        {
            case "favoris":
                $this->controleur->pageFavoris();
                break;

            default:
                break;

        }
    }
}

?>
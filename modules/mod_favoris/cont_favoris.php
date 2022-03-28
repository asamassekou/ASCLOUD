<?php

include_once 'vue_favoris.php';
include_once 'modele_favoris.php';

class ContFavoris{

    public $modele;
    public $vue;
    public $action;

    public function __construct() {
        if(isset($_GET['action'])){
            $this->action = $_GET['action'];
        }
        $this->modele = new ModeleFavoris();
        $this->vue = new VueFavoris();
    }

    public function pageFavoris()
    {
        if (isset($_GET['user']))
        {
            $fichier = $this->modele->favoris();

            $this->vue->pageFavoris($fichier);
        }
    }

}


?>
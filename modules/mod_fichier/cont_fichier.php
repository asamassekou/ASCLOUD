<?php

include_once 'vue_fichier.php';
include_once 'modele_fichier.php';

class ContFichier{

    public $modele;
    public $vue;
    public $action;

    public function __construct() {
        if(isset($_GET['action'])){
            $this->action = $_GET['action'];
        }
        $this->vue = new VueFichier();
        $this->modele = new ModeleFichier();

    }

    public function pageFichier()
    {
        $this->modele->fichier();
        $this->vue->pageFichier();
    }



}


?>
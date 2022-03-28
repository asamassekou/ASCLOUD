<?php

include_once 'vue_compte.php';
include_once 'modele_compte.php';

class ContCompte{

    public $modele;
    public $vue;
    public $action;

    public function __construct() {
        if(isset($_GET['action'])){
            $this->action = $_GET['action'];
        }
        $this->modele = new ModeleCompte();
        $this->vue = new VueCompte();
    }

    public function pagePrincipal()
    {
        if (isset($_GET['user']))
        {
            $fichier = $this->modele->compte();
            //$extension = $this->modele->extension();
            $recherche = $this->modele->recherche();
            $search = $this->modele->getSearch();
            $this->vue->pagePrincipal($fichier, $recherche, $search);
        }
    }

    public function deconnexion()
    {
        //session_start();
        session_destroy();
        header('Location:index.php');
        die();
    }


}


?>
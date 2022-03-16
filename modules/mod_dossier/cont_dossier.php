<?php

include_once 'vue_dossier.php';
include_once 'modele_dossier.php';

class ContDossier{

    public $modele;
    public $vue;
    public $action;

    public function __construct() {
        if(isset($_GET['action'])){
            $this->action = $_GET['action'];
        }
        $this->vue = new VueCompte();
    }

    public function pagePrincipal()
    {
        $this->vue->pagePrincipal();
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
<?php

include_once 'vue_message.php';
include_once 'modele_message.php';

class ContMessage{

    public $modele;
    public $vue;
    public $action;

    public function __construct() {
        if(isset($_GET['action'])){
            $this->action = $_GET['action'];
        }
        $this->modele = new ModeleMessage();
        $this->vue = new VueMessage();
    }

    public function pageMessage()
    {
        if (isset($_GET['user']))
        {
            $fichier = $this->modele->message();

            $this->vue->pageMessage($fichier);
        }
    }

}


?>
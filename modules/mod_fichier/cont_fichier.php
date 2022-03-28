<?php

include_once 'vue_fichier.php';
include_once 'modele_fichier.php';

class ContFichier
{

    public $modele;
    public $vue;
    public $action;

    public function __construct()
    {
        if (isset($_GET['action'])) {
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

    public function pageFichierPerso()
    {
        if(isset($_GET['fich'])) {


            $msg = "Ce fichier n'existe pas";
            $nomFichier = $this->modele->selectNom();
            $extension = $this->modele->extension();
            $date = $this->modele->getDate();
            $this->modele->download();
            $this->modele->favoris();
            $this->modele->message();
            $this->modele->renameFile();
            $this->modele->deleteFile();
            $this->modele->secureFichier();
            $this->vue->pageFichierPerso($nomFichier, $extension, $msg, $date);

        }
    }

    public function pageAccesFichier()
    {
        if(isset($_GET['fich'])) {

            $nomFichier = $this->modele->selectNom();
            $extension = $this->modele->extension();
            $this->modele->unlockFile();
            $this->vue->pageAccesFichier($nomFichier, $extension);

        }
    }

    public function download()
    {
        if($_GET['fich'])
        {
            $idFichier = $_GET['fich'];

            $co = new Config();
            $bdd = $co->initConnexion();

            $sql = $bdd->prepare("SELECT * FROM fichier WHERE idFichier = ?");
            $sql->execute(array($idFichier));
            $check = $sql->fetch();
            $file = $check['nomFichier'];



            header('content-Type: application/octet-stream');
            header('content-Transfer-Encoding: Binary');
            header('content-disposition: attachment; filename="' . basename($file) . '"');
            echo readfile($file);
        }
    }

}

?>
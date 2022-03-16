<?php
require_once 'config.php';
class ModeleCompte
{

    public function __construct()
    {

    }

    public function compte()
    {
            $co = new Config();
            $bdd = $co->initConnexion();

            $fichier = $bdd->prepare('SELECT * FROM fichier WHERE idUser = ?');
            $fichier->execute(array($_SESSION['user']));

        return $fichier;
    }

}
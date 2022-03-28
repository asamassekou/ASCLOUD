<?php
require_once 'config.php';
//require_once 'C:\wamp64\www\projetCloud\modules\mod_fichier\modele_fichier.php';

class ModeleFavoris
{
    //  public $modeleF;
    public function __construct()
    {
        //  $this->modeleF = new ModeleFichier();
    }


    public function favoris()
    {
        $co = new Config();
        $sql = $co->initConnexion();

        $bdd = $sql->prepare('SELECT * FROM fichier inner join favoris WHERE fichier.idFichier = favoris.idFichier AND favoris.idUser = ? ');

        $bdd->execute(array($_SESSION['user']));

        return $bdd;


    }
}
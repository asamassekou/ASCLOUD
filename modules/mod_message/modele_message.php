<?php
require_once 'config.php';
//require_once 'C:\wamp64\www\projetCloud\modules\mod_fichier\modele_fichier.php';

class ModeleMessage
{
    //  public $modeleF;
    public function __construct()
    {
        //  $this->modeleF = new ModeleFichier();
    }


    public function message()
    {
        $co = new Config();
        $sql = $co->initConnexion();

        $bdd = $sql->prepare('SELECT * FROM fichier natural join messages WHERE fichier.idUser = messages.idExpediteur AND messages.idDestinataire = ? ');

        $bdd->execute(array($_SESSION['user']));

        return $bdd;


    }
}
<?php
require_once 'config.php';
//require_once 'C:\wamp64\www\projetCloud\modules\mod_fichier\modele_fichier.php';

class ModeleCompte
{
    //  public $modeleF;
    public function __construct()
    {
        //  $this->modeleF = new ModeleFichier();
    }

    public function compte()
    {
        $co = new Config();
        $bdd = $co->initConnexion();

        $fichier = $bdd->prepare('SELECT * FROM fichier WHERE idUser = ?');
        $fichier->execute(array($_SESSION['user']));

        return $fichier;
    }

    public function recherche()
    {
        $co = new Config();
        $bdd = $co->initConnexion();
        $recherche = $bdd->prepare("SELECT * FROM fichier WHERE idUser = ?");
        $recherche->execute(array($_SESSION['user']));

        if(isset($_GET['searchFich']) AND !empty($_GET['searchFich']))
        {
            $nomRechercher = htmlspecialchars($_GET['searchFich']);

            $recherche = $bdd->query('SELECT * FROM fichier WHERE nomFichier LIKE"%'.$nomRechercher.'%" AND idUser = '. $_SESSION['user']);
            //$recherche = $selectFich->execute(array($nomRechercher, $_SESSION['user']));
            // $result = $recherche->fetch();
        }
        return $recherche;

    }

    public function getSearch() {
        $search = null;
        if (isset($_GET['searchFich']) AND !empty($_GET['searchFich'])) {
            $search = htmlspecialchars($_GET['searchFich']);
        }
        return $search;

    }

    public function extension()
    {

        $selectFichier = $this->compte();
        $fich = $selectFichier->fetch();
        $extension = strtolower(substr(strrchr($fich['nomFichier'], '.'), 1));
        return $extension;
    }
}
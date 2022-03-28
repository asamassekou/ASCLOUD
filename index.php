<?php
require_once 'controleur.php';
require_once 'modules/mod_accueil/mod_accueil.php';
require_once 'modules/mod_compte/mod_compte.php';
require_once 'modules/mod_inscription/mod_inscription.php';
require_once 'modules/mod_connexion/mod_connexion.php';
require_once 'modules/mod_fichier/mod_fichier.php';
require_once 'modules/mod_dossier/mod_dossier.php';
require_once 'modules/mod_message/mod_message.php';
require_once 'modules/mod_favoris/mod_favoris.php';

    $controleur = new controleur();

    switch($controleur->module){
        case "compte":
            $mod = new ModCompte();
            break;
        case "inscription":
            $mod = new ModInscription();
            break;
        case "connexion":
            $mod = new ModConnexion();
            break;
        case "fichier":
            $mod = new ModFichier();
            break;
        case "message":
            $mod = new ModMessage();
            break;
        case "favoris":
        $mod = new ModFavoris();
        break;
        default :
            $mod = new ModAccueil();
        break;
    }

if(!isset($_GET['module']) AND isset($_GET['searchFich'])) {
    echo "aa";
    header('Location:index.php?module=compte&action=compte&user=' . $_SESSION['user'] . '&searchFich='.$_GET['searchFich']);
}

if (!isset($mod) AND !isset($_GET['searchFich'])){
    echo "aa";
    $mod = new ModCompte();

}

?>
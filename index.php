<?php
require_once 'controleur.php';
require_once 'modules/mod_accueil/mod_accueil.php';
require_once 'modules/mod_compte/mod_compte.php';
require_once 'modules/mod_inscription/mod_inscription.php';
require_once 'modules/mod_connexion/mod_connexion.php';


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
        default :
            $mod = new ModAccueil();
        break;
    }

?>
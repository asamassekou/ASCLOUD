<?php
session_start();
require_once 'config.php';

 class ModeleInscription
{

    public function __construct()
    {

    }

    public function inscription()
    {
        $co = new Config();
        $msg ="";

        $bdd = $co->initConnexion();
        if (isset($_POST['inscription'])) {
            if (isset($_POST['nom']) and !empty($_POST['nom']) and isset($_POST['prenom']) and !empty($_POST['prenom']) and isset($_POST['email']) and !empty($_POST['email']) and isset($_POST['mdp1']) and !empty($_POST['mdp1']) and isset($_POST['mdp2']) and !empty($_POST['mdp2'])) {
                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $email = htmlspecialchars($_POST['email']);
                $mdp1 = sha1($_POST['mdp1']);
                $mdp2 = sha1($_POST['mdp2']);
                $sql = $bdd->prepare('SELECT * FROM user WHERE email = ?');
                $sql->execute(array($email));
                $row = $sql->rowCount();

                if($row > 0)
                {
                    $msg = "Cet email existe déjà, réessayez avec un autre email";
                }
                elseif(strlen($email) > 250)
                    {
                        $msg ="Votre email ne doit pas dépasser 250 caractères, veuillez réessaillez...";
                    }
                elseif(strlen($nom) > 50 OR strlen($prenom) > 50)
                    {
                        $msg = "Votre nom ou votre prénom ne doit pas dépasser 50 caractères, veuillez réessaillez...";
                    }
                elseif($mdp1 != $mdp2)
                {
                    $msg = "Les deux mots de passe ne correspondent pas";
                }
                else
                {
                    $insUser = $bdd->prepare('INSERT INTO user(nom,prenom,email,mdp) VALUES (?,?,?,?)');
                    $insUser->execute(array($nom,$prenom,$email,$mdp1));

                    $_SESSION['nom'] = $nom;
                    $_SESSION['prenom'] = $prenom;
                    $_SESSION['email'] = $email;

                    header('Location:index.php?module=compte&action=compte');
                }
            }
        }
        return $msg;
    }




}

?>
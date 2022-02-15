<?php
require_once 'config.php';

class ModeleConnexion
{

    public function __construct()
    {

    }

    public function connexion()
    {
        $co = new Config();
        $msg ="";
        $bdd = $co->initConnexion();

        if(isset($_POST['connexion']))
        {
            if(isset($_POST['email']) AND !empty($_POST['email']) AND isset($_POST['mdp']) AND !empty($_POST['mdp']))
            {
                $email = htmlspecialchars($_POST['email']);
                $mdp = sha1($_POST['mdp']);

                $sql = $bdd->prepare('SELECT * FROM user WHERE email = ?');
                $sql->execute(array($email));
                $check = $sql->fetch();

                $Vraimail = $check['email'];
                $vraimdp = $check['mdp'] ;

                $row = $sql->rowCount();

                if($row <= 0)
                {
                    $msg = "Cet email n'existe pas ";
                }
                elseif($mdp != $vraimdp)
                    {
                        $msg = "Mauvais mot de passe";
                    }
                else
                {
                    $_SESSION['email'] = $email;
                    $_SESSION['mdp'] = $mdp;
                    header('Location: index.php?module=compte&action=compte');
                }
            }
        }
        return $msg;
    }
}

?>
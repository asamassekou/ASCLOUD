<?php
require_once 'config.php';

class ModeleFichier
{

    public function __construct()
    {

    }

    public function fichier()
    {

        $co = new Config();
        $bdd = $co->initConnexion();
        if (isset($_POST['valider'])) {
            if (isset($_FILES['file']) and !empty($_FILES['file']['name'])) {
                $tailleMax = 2097152;  // 2Mo
                $extensionsValides = array('jpg', 'jpeg', 'gif', 'png','pdf');
            //    date_default_timezone_set('Europe/France');
                $DateAndTime = date('m-d-Y h:i:s a', time());

                $date= date("Y-m-d");
                $time=date("h:m:s");
                $datetime=$date."T".$time;

                $token =  md5(bin2hex(openssl_random_pseudo_bytes(6)));
                if ($_FILES['file']['size'] <= $tailleMax) {
                    $extensionUpload = strtolower(substr(strrchr($_FILES['file']['name'], '.'), 1)); //Ignore le premier caractere de la chaine et renvoie l'extension du fichier avec le point
                    if (in_array($extensionUpload, $extensionsValides)) {
                        $chemin = "fichiers/" . $token ."user".$_SESSION['user'] . "." . $extensionUpload;
                        $resultat = move_uploaded_file($_FILES['file']['tmp_name'], $chemin);
                        if ($resultat) {
                            $insertFile = $bdd->prepare('INSERT INTO fichier(nomFichier,dateFichier,idUser) VALUES(?, ?, ?)');
                            $insertFile->execute(array($chemin,$datetime,$_SESSION['user']));


                            $sql = $bdd->prepare('SELECT * FROM fichier WHERE nomFichier = ?');
                            $sql->execute(array($chemin));
                            $check = $sql->fetch();
                            $idFichier = $check['idFichier'];
                            $url = "index.php?module=fichier&action=fichier&user=" . $_SESSION['user'] . "&fich=" . $idFichier;
                            $insURL = $bdd->prepare("UPDATE fichier SET url = ? WHERE idFichier = ?");
                            $insURL->execute(array($url, $idFichier));
                            header('Location:index.php?module=compte&action=compte&user=' . $_SESSION['user']);
                        }

                    }
                }
            }
        }
    }
}
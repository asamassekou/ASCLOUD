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
                $tailleMax = 1000000000 ;  // 1Go
                $extensionsValides = array('jpg', 'jpeg', 'gif', 'png', 'pdf', 'mp4', 'exe', 'zip', 'mp3', 'docx');
                //    date_default_timezone_set('Europe/France');
                $DateAndTime = date('m-d-Y h:i:s a', time());

                $date= date("Y-m-d");
                $time=date("h:m:s");
                $datetime=$date."T".$time;

                $token =  md5(bin2hex(openssl_random_pseudo_bytes(6)));
                if ($_FILES['file']['size'] <= $tailleMax) {
                    $taille = $_FILES['file']['size'];
                    $extensionUpload = strtolower(substr(strrchr($_FILES['file']['name'], '.'), 1)); //Ignore le premier caractere de la chaine et renvoie l'extension du fichier avec le point
                    if (in_array($extensionUpload, $extensionsValides)) {
                        $chemin = "fichiers/" . $token ."user".$_SESSION['user'] . "." . $extensionUpload;
                        $resultat = move_uploaded_file($_FILES['file']['tmp_name'], $chemin);
                        if ($resultat) {
                            $insertFile = $bdd->prepare('INSERT INTO fichier(nomFichier,dateFichier, tailleFichier, idUser) VALUES(?, ?, ?)');
                            $insertFile->execute(array($chemin,$datetime,$taille,$_SESSION['user']));

                            $sql = $bdd->prepare('SELECT * FROM fichier WHERE nomFichier = ?');
                            $sql->execute(array($chemin));
                            $check = $sql->fetch();
                            $idFichier = $check['idFichier'];
                            $url = "index.php?module=fichier&action=fichierPerso&user=" . $_SESSION['user'] . "&fich=" . $idFichier;
                            $insURL = $bdd->prepare("UPDATE fichier SET url = ? WHERE idFichier = ?");
                            $insURL->execute(array($url, $idFichier));
                            header('Location:index.php?module=compte&action=compte&user=' . $_SESSION['user']);
                        }
                    }
                }
            }
        }
    }

    public function getDate()
    {
        $fichiers =$this->selectNom();
        $date = $fichiers['dateFichier'];

        return $date;
    }


    public function selectNom()
    {
        if (isset($_GET['user']) AND isset($_GET['fich'])) {
            $idU = htmlspecialchars($_GET['user']);
            $idF = htmlspecialchars($_GET['fich']);

            $co = new Config();
            $bdd = $co->initConnexion();

            $sql = $bdd->prepare("SELECT * FROM fichier WHERE idFichier = ?");
            $sql->execute(array($idF));
            $selectNomfichier = $sql->fetch();
            // $nom = $selectNomfichier['nomFichier'];
            return $selectNomfichier;
        }
    }

    public function selectFichier()
    {
        $co = new Config();
        $bdd = $co->initConnexion();

        $sql = $bdd->prepare("SELECT * FROM fichier WHERE idUser = ?");
        $sql->execute(array($_SESSION['user']));
        $selectFichier = $sql->fetch();

        return $selectFichier;

    }


    public function extensionFichCompte()
    {
        $nomFich = $this->selectFichier();
        $extension = strtolower(substr(strrchr($nomFich['nomFichier'], '.'), 1));

        return $extension;
    }

    public function extension()
    {
        $nomFichier = $this->selectNom();
        $extensionUpload = strtolower(substr(strrchr($nomFichier['nomFichier'], '.'), 1));

        return $extensionUpload;
    }
    public function secureFichier()
    {
        if(isset($_POST['confirmer']))
        {
            if(isset($_POST['mdp']) AND !empty($_POST['mdp']) AND isset($_POST['Confirme_mdp']) AND !empty($_POST['Confirme_mdp']))
            {
                $mdp = $_POST['mdp'];
                $mdpC = $_POST['Confirme_mdp'];
                if ($mdp == $mdpC) {

                    $mdpSecure = hash('sha256', $_POST['mdp']);
                    $upSecu = 1;
                    $co = new Config();
                    $bdd = $co->initConnexion();
                    $fichiers = $this->selectNom();
                    $idFichier = $fichiers['idFichier'];

                    $updateSecure = $bdd->prepare("UPDATE fichier SET securise = ? , mdpSecure = ? WHERE idFichier = ?");
                    $updateSecure->execute(array($upSecu, $mdpSecure, $idFichier));

                    header('Location:index.php?module=compte&action=compte&user='. $_SESSION['user']);
                }
            }
        }
    }

    public function favoris()
    {
        if(isset($_POST['favoris'])) {
            $co = new Config();
            $fichiers = $this->selectNom();
            $idFichier = $fichiers['idFichier'];
            $sql = $co->initConnexion();
            $bdd = $sql->prepare('INSERT INTO favoris (idUser, idFichier) VALUES(?,?)');
            $bdd->execute(array($_SESSION['user'], $idFichier));
            header('Location:index.php?module=favoris&action=favoris&user=' . $_SESSION['user']);
        }
    }

    public function message()
    {
        if(isset($_POST['envoie'])) {
            if(isset($_POST['emailDestinataire']) AND !empty($_POST['emailDestinataire']))
            {
                $emailDestinataire = htmlspecialchars($_POST['emailDestinataire']);
                $co = new Config();
                $sql = $co->initConnexion();
                $fichiers = $this->selectNom();
                $idFichier = $fichiers['idFichier'];

                $check = $sql->prepare('SELECT * FROM user WHERE email = ?');
                $check->execute(array($emailDestinataire));
                $iD = $check->fetch();
                $idDestinataire = $iD['idUser'];
                $date= date("Y-m-d");
                $time=date("h:m:s");
                $datetime=$date."T".$time;


                $bdd = $sql->prepare('INSERT INTO messages (dateMessage,idFichier, idExpediteur, idDestinataire) VALUES(?,?,?)');
                $bdd->execute(array($datetime, $idFichier, $_SESSION['user'], $idDestinataire));
                header('Location:index.php?module=favoris&action=favoris&user=' . $_SESSION['user']);
            }
        }
    }
    public function unlockFile()
    {
        if(isset($_POST['confirmer']))
        {
            $co = new Config();

            if(isset($_POST['mdp']) AND !empty($_POST['mdp']))
            {
                $mdp = hash('sha256', $_POST['mdp']);
                //$tokenFile =  md5(bin2hex(openssl_random_pseudo_bytes(6)));
                $_SESSION['tokenFile'] = $co->token();

                $fichiers = $this->selectNom();
                $VraiMdp = $fichiers['mdpSecure'];

                if ($mdp == $VraiMdp)
                {
                    $co->cookies();
                    header('Location:index.php?module=fichier&action=fichierPerso&user='. $_SESSION['user'] .'&fich=' . $fichiers['idFichier'] .'&o=' . $_SESSION['tokenFile'] );
                }

            }
        }
    }

    public function download()
    {
        if (isset($_POST['download'])) {
            if (isset($_GET['fich'])) {
                $idU = htmlspecialchars($_GET['user']);
                $idF = htmlspecialchars($_GET['fich']);

                $co = new Config();
                $bdd = $co->initConnexion();

                $sql = $bdd->prepare("SELECT * FROM fichier WHERE idFichier = ?");
                $sql->execute(array($idF));
                $selectNomfichier = $sql->fetch();

                header('Location:' . $selectNomfichier['nomFichier']);
            }
        }
    }

    public function renameFile()
    {
        if(isset($_POST['confirm_modif']))
        {
            if(isset($_POST['modif']) AND !empty($_POST['modif']) )
            {
                $modif = htmlspecialchars($_POST['modif']);
                $extension = $this->extension();

                $newName = "fichiers/" . $modif . "." . $extension ;
                $co = new Config();
                $sql = $co->initConnexion();

                $fichiers = $this->selectNom();
                $idFichier = $fichiers['idFichier'];

                $bdd =  $sql->prepare("UPDATE fichier SET nomFichier = ? WHERE idFichier = ?");
                $bdd->execute(array($newName, $idFichier));


                $oldname = $fichiers['nomFichier'];

                if (rename($oldname, $newName)) {
                    $message = sprintf(
                        'The file %s was renamed to %s successfully!',
                        $oldname,
                        $newName
                    );
                } else {
                    $message = sprintf(
                        'There was an error renaming file %s',
                        $oldname
                    );
                }
                echo $message;
            }
            header('Location:index.php?module=compte&action=compte&user='.$_SESSION['user']);
        }
    }

    public function deleteFile()
    {
        $fichiers = $this->selectNom();
        $nomFichier = $fichiers['nomFichier'];

        $deleteFile = 'C:/wamp64/www/projetCloud/'. $nomFichier;

        if(isset($_POST['delete'])) {
            if (file_exists($deleteFile)) {
                unlink($deleteFile);

                $co = new Config();
                $sql = $co->initConnexion();
                $bdd = $sql->prepare('DELETE FROM fichier WHERE nomFichier = ? AND idFichier = ? ');
                $bdd->execute(array($nomFichier, $fichiers['idFichier']));
            }
        }
    }

}
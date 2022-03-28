<?php
class VueFichier {

    public function __construct() {

    }

    public function pageFichier() {

        ?>

        <!doctype html>
        <html lang="fr">
        <head>
            <meta charset="utf-8">
            <title>ASCLOUD - Connexion</title>
            <link rel="icon" type="image/png" sizes="16x16" href="images/logo.png">
            <link rel="stylesheet" href="../../css/fichier.css">
        </head>

        <header>
            <NAV id="mainNav">
                <a href="../../index.php?module=compte&action=compte&user=<?= $_SESSION['user'];?>" > <img id="logo" src="../../images/logo.png" alt="Logo du site"/> </a>
                <form method="GET"> <input type="search" id="search" name=""search placeholder="Rechercher..."/> </form>
                <nav class="menus">
                    <a class="menuLink" href=""> Accueil </a>
                    <a class="menuLink" href="">  Aide </a>
                    <a class="menuLink" href="index.php?module=compte&action=deconnexion"> Déconnexion </a>
                </nav>
            </NAV>

        </header>

        <body>
        <div id="zonee">
            <div class ="control">
                <form method="POST" action="">
                    <div class="buttonBox">
                        <!--    <button name="new" class="button" id="new"> Nouveau </button> -->
                        <ul class="menu" id="new">
                            <li>
                                Nouveau
                                <ul class="sub-menu">
                                    <li><a id="contLi" href="index.php?module=fichier&action=fichier"> Fichier </a> </li>
                                    <li> <a id="contLi" href="index.php?module=dossier&action=dossier"> Dossier </a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="buttonBox">
                        <button name="monDrive" class="button"id="monDrive" > Mon Drive </button>
                    </div>
                    <div class="buttonBox">
                        <button name="reception" class="button" id="reception" > Réception </button>
                    </div>
                    <div class="buttonBox">
                        <button  type="button" name="favori" class="button" id="favoris"> Favoris </button>
                    </div>
                </form>
            </div>

            <h1> Ajouter un fichier dans votre espace de stockage </h1>
            <form method="POST" enctype="multipart/form-data">
                <div id="zone" ondrop="glisser_fichier(event)" ondragover="this.style.background = '#CCC';return false" ondragleave="this.style.background = '#EEE'">
                    <div id="envoi">
                        <p>Glisser les fichiers ici<br>ou<br><input type="button" value="Sélectionner les fichiers" onclick="parcourir_fichier();"></p>
                        <input type="file" name="file" id="fichier">
                        <p id="nom_fichiers"></p>
                    </div>

                    <div id="valider">
                        <button id="btn-valider" name="valider"> TERMINER </button>

                    </div>
                </div>
            </form>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="../../js/depoFichier.js"></script>
        </body>
        </html>

        <?php
    }
    /************************************ PAGE FICHIER PERSO **********************************************************************/

    public function pageFichierPerso($nomFichier, $extension,$msg, $dateFile) {

        if( $nomFichier['securise'] == NULL AND !isset($_GET['o']))
        {

            ?>
            <!doctype html>
            <html lang="fr">
            <head>
                <meta charset="utf-8">
                <title>ASCLOUD - Connexion</title>
                <link rel="icon" type="image/png" sizes="16x16" href="images/logo.png">
                <link rel="stylesheet" href="../../css/fichier.css">
            </head>

            <header>
                <NAV id="mainNav">
                    <a href="../../index.php?module=compte&action=compte&user=<?= $_SESSION['user'];?>" > <img id="logo" src="../../images/logo.png" alt="Logo du site"/> </a>
                    <form method="GET"> <input type="search" id="search" name=""search placeholder="Rechercher..."/> </form>
                    <nav class="menus">
                        <a class="menuLink" href=""> Accueil </a>
                        <a class="menuLink" href="">  Aide </a>
                        <a class="menuLink" href="index.php?module=compte&action=deconnexion"> Déconnexion </a>
                    </nav>
                </NAV>

            </header>

            <body>


            <script type="text/javascript">
                function viewImage(id) {
                    document.getElementById(id).innerHTML="<div class='div-secureFile'> <input id='modif' name='modif-File' placeholder='mdpFichier'>" +
                        " <button class ="btn-download" name="confirmer"> Confirmer </button> </div>";
                }
            </script>
            <?php

            if($extension == "pdf")
            {
                ?>
                <div id = "dos"> <a href="<?= $nomFichier['nomFichier'];?>">  <iframe src="<?=$nomFichier['nomFichier'];?>" width="100%" height="500px"> </a></div>
            <?php }elseif ($extension == "zip")
            { ?>
                <a href = "<?= $nomFichier['url']?>"> <img  id="fichZIP" src="../../images/logoZIP.png" alt="dossier"/> </a>

            <?php }elseif ($extension == "mp4")
            { ?>
                <a href = "<?= $nomFichier['url']?>"> <video controls width="250">
                        <source src="../../<?=$nomFichier['nomFichier'];?>"
                                type="video/mp4">
                        Sorry, your browser doesn't support embedded videos.
                    </video> </a>
            <?php }
            else
            { ?>
                <div id = "dos"> <a href="<?= $nomFichier['nomFichier'];?>"> <img id ="imgFichier" src="<?=$nomFichier['nomFichier'];?>"> </a> </div>
            <?php } ?>

            <form method="POST" action="">
                <script type="text/javascript">
                    function viewModif(id) {
                        document.getElementById(id).innerHTML="<div class='div-modif-File'>  " +
                            "<p > Nom du fichier : <?=$nomFichier['nomFichier'];?></p>" +
                            "<p> Taille fichier : <?=$nomFichier['tailleFichier'];?></p>" +
                            "<p> Date de dépôt : <?= $dateFile ?></p>" +
                            "<button class='btn-download' name='delete_file'> SUPPRIMER </button>  </div>" +
                            "<h2> Modifier le nom de ce fichier </h2> " +
                            "<input class='input-form' name='modif' placeholder='mdpFichier'> " +
                            "<button class='btn-download' name='confirm_modif'> CONFIRMER </button>  </div>";
                    }
                    <!-- onclick="javascript:viewModif('div-Modif');" -->
                </script>

                <div id="div-btn-telecharger" > <button class ="btn-download" name="download" > Télécharger </button>
                    <imput class ="btn-download" type="button" name="info" onclick="javascript:viewModif('div-Modif');" > Informations </imput>

                </div>
                <div id="div-Modif"></div>
                <?php if ($nomFichier['securise'] == NULL) { ?>
                <div id="box-form">
                    <h2 id="h2Fich"> Sécuriser ce fichier</h2>
                    <div class="form-inscription">
                        <input type="password" name="mdp"  class="input-form" placeholder="entrez un mdp"/>
                    </div>

                    <div class="form-inscription">
                        <input type="password" name="Confirme_mdp"  class="input-form" placeholder="confirmez le mdp"/>
                    </div>
                    <div id="button">
                        <button id="Buttonconnexion" name="confirmer" > CONFIRMER </button>
                    </div>
                </div>
            </form>
            <?php } //else { echo $msg ; } ?>
            </body>
            </html>
            <?php
        } elseif ($nomFichier['securise'] != NULL AND isset($_GET['o']) AND $_GET['o'] = $_SESSION['tokenFile'])
        {
            if(isset($_COOKIE['secureFile']))
            { ?>
                <!doctype html>
                <html lang="fr">
                <head>
                    <meta charset="utf-8">
                    <title>ASCLOUD - Connexion</title>
                    <link rel="icon" type="image/png" sizes="16x16" href="images/logo.png">
                    <link rel="stylesheet" href="../../css/fichier.css">
                </head>

                <header>
                    <NAV id="mainNav">
                        <a href="../../index.php?module=compte&action=compte&user=<?= $_SESSION['user'];?>" > <img id="logo" src="../../images/logo.png" alt="Logo du site"/> </a>
                        <form method="GET"> <input type="search" id="search" name=""search placeholder="Rechercher..."/> </form>
                        <nav class="menus">
                            <a class="menuLink" href=""> Accueil </a>
                            <a class="menuLink" href="">  Aide </a>
                            <a class="menuLink" href="index.php?module=compte&action=deconnexion"> Déconnexion </a>
                        </nav>
                    </NAV>

                </header>

                <body>


                <script type="text/javascript">
                    function viewImage(id) {
                        document.getElementById(id).innerHTML="<div class='div-secureFile'> <input id='modif' name='modif-File' placeholder='mdpFichier'>" +
                            " <button class ="btn-download" name="confirmer"> Confirmer </button> </div>";
                    }
                </script>
                <?php

                if($extension == "pdf")
                {
                    ?>
                    <div id = "dos"> <a href="<?= $nomFichier['nomFichier'];?>">  <iframe src="<?=$nomFichier['nomFichier'];?>" width="100%" height="500px"> </a></div>
                <?php }elseif ($extension == "zip")
                { ?>
                    <a href = "<?= $nomFichier['url']?>"> <img  id="fichZIP" src="../../images/logoZIP.png" alt="dossier"/> </a>

                <?php }elseif ($extension == "mp4")
                { ?>
                    <a href = "<?= $nomFichier['url']?>"> <video controls width="250">
                            <source src="../../<?=$nomFichier['nomFichier'];?>"
                                    type="video/mp4">
                            Sorry, your browser doesn't support embedded videos.
                        </video> </a>
                <?php }
                else
                { ?>
                    <div id = "dos"> <a href="<?= $nomFichier['nomFichier'];?>"> <img id ="imgFichier" src="<?=$nomFichier['nomFichier'];?>"> </a> </div>
                <?php } ?>

                <form method="POST" action="">
                    <script type="text/javascript">
                        function viewModif(id) {
                            document.getElementById(id).innerHTML="<div class='div-modif-File'>  " +
                                "<p > Nom du fichier : <?=$nomFichier['nomFichier'];?></p>" +
                                "<p> Taille fichier : <?=$nomFichier['tailleFichier'];?></p>" +
                                "<p> Date de dépôt : <?= $dateFile ?></p>" +
                                "<button class='btn-download' name='favoris'> AJOUTER AUX FAVORIS </button>  </div>" +
                                "<button class='btn-download' name='delete_file'> SUPPRIMER </button>  </div>" +
                                "<h2> Modifier le nom de ce fichier </h2> " +
                                "<input class='input-form' name='modif' placeholder='mdpFichier'> " +
                                "<button class='btn-download' name='confirm_modif'> CONFIRMER </button>  </div>";
                        }

                        function viewMessage(id) {
                            document.getElementById(id).innerHTML="<div class='div-modif-File'>  " +
                                " <label> </label>"+
                                "<input class='input-form' name='emailDestinataire' placeholder='email Destinataire'> " +
                                "<button class='btn-download' name='confirm_modif'> ENVOYER </button>  </div>";
                        }

                        <!-- onclick="javascript:viewModif('div-Modif');" -->
                    </script>

                    <div id="div-btn-telecharger" > <button class ="btn-download" name="download" > Télécharger </button>
                        <imput class ="btn-download" type="button" name="info" onclick="javascript:viewModif('div-Modif');" > Informations </imput>
                        <imput class ="btn-download" type="button" name="info" onclick="javascript:viewMessage('div-Modif');" > Partager ce fichier </imput>


                    </div>
                    <div id="div-Modif"></div>
                    <?php if ($nomFichier['securise'] == NULL) { ?>
                    <div id="box-form">
                        <h2 id="h2Fich"> Sécuriser ce fichier</h2>
                        <div class="form-inscription">
                            <input type="password" name="mdp"  class="input-form" placeholder="entrez un mdp"/>
                        </div>

                        <div class="form-inscription">
                            <input type="password" name="Confirme_mdp"  class="input-form" placeholder="confirmez le mdp"/>
                        </div>
                        <div id="button">
                            <button id="Buttonconnexion" name="confirmer" > CONFIRMER </button>
                        </div>
                    </div>
                </form>
                <?php } //else { echo $msg ; } ?>
                </body>
                </html>
                <?php
            }else{
                include_once 'redirection.php';
            }
        }else {
            header ('Location: index.php?module=fichier&action=AccesRefuser&user='.$_SESSION['user'] .'&fich=' . $nomFichier['idFichier']);
        }
    }


    /************************************ PAGE ACCES REFUSER **********************************************************************/

    public function pageAccesFichier($nomFichier, $extension) {
        ?>
        <!doctype html>
        <html lang="fr">
        <head>
            <meta charset="utf-8">
            <title>ASCLOUD - Connexion</title>
            <link rel="icon" type="image/png" sizes="16x16" href="images/logo.png">
            <link rel="stylesheet" href="../../css/fichierRefuser.css">
        </head>

        <header>
            <NAV id="mainNav">
                <a href="../../index.php?module=compte&action=compte&user=<?= $_SESSION['user'];?>" > <img id="logo" src="../../images/logo.png" alt="Logo du site"/> </a>
                <form method="GET"> <input type="search" id="search" name=""search placeholder="Rechercher..."/> </form>
                <nav class="menus">
                    <a class="menuLink" href=""> Accueil </a>
                    <a class="menuLink" href="">  Aide </a>
                    <a class="menuLink" href="index.php?module=compte&action=deconnexion"> Déconnexion </a>
                </nav>
            </NAV>

        </header>

        <body>

        <form method="POST" action="">
            <script type="text/javascript">
                function viewImage(id) {
                    document.getElementById(id).innerHTML="<div class='div-secureFile'> <input id='mdp-Secure' name='mdpSecure' placeholder='mdpFichier'>" +
                        " <button class ="btn-download" name="confirmer"> Confirmer </button> </div>";
                }
            </script>
            <?php

            if($extension == "pdf")
            {
                ?>
                <div id = "dos">  <iframe src="<?=$nomFichier['nomFichier'];?>" width="100%" height="500px"></div>
            <?php }elseif ($extension == "zip")
            { ?>
                <a href = "<?= $nomFichier['url']?>"> <img  id="fichZIP" src="../../images/logoZIP.png" alt="fichier zip"/> </a>

            <?php }elseif ($extension == "mp4")
            { ?>
                <video controls width="250">
                    <source src="../../<?=$nomFichier['nomFichier'];?>"
                            type="video/mp4">
                    Sorry, your browser doesn't support embedded videos.
                </video>
            <?php }
            else
            { ?>
                <div id = "dos"> <img id ="imgFichier" src="../../<?=$nomFichier['nomFichier'];?>"> </div>
            <?php } ?>

            <div id="div-btn-telecharger" > <button class ="btn-download" name="download"> Télécharger </button>
                <button class ="btn-download" name="info" > Informations </button>

            </div>

            <div id="box-form-file">
                <h2 id="h2Fich-2"> Ce fichier est sécurisé </h2>
                <div class="form-openFile">
                    <input type="password" name="mdp"  class="input-form" placeholder="entrez le mdp"/>
                </div>

                <div id="button-openFile">
                    <button id="ButtonOpenFile" name="confirmer" > CONFIRMER </button>
                </div>
            </div>

        </form>
        </body>
        </html>
        <?php
    }
}

?>
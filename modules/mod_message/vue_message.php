<?php
class VueMessage {

    public function __construct() {

    }

    public function pageMessage($fichier) {
//if(!isset($_POST['user'])){ header('Location:index.php');}
        if(isset($_GET['user'])){
            ?>

            <!doctype html>
            <html lang="fr">
            <head>
                <meta charset="utf-8">
                <title>ASCLOUD - Connexion</title>
                <link rel="icon" type="image/png" sizes="16x16" href="images/logo.png">
                <link rel="stylesheet" href="../../css/compte.css">
                <script src="script.js"></script>
            </head>
            <body>

            <header>
                <NAV id="mainNav">
                    <a href="../../index.php" > <img id="logo" src="../../images/logo.png" alt="Logo du site"/> </a>
                    <form method="GET"> <input type="search" id="search" name="searchFich" placeholder="Rechercher..."/> </form>
                    <nav class="menus">
                        <a class="menuLink" href=""> Accueil </a>
                        <a class="menuLink" href="">  Aide </a>
                        <a class="menuLink" href="index.php?module=compte&action=deconnexion"> Déconnexion </a>
                    </nav>
                </NAV>

            </header>

            <div id="zone">
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
                            <button name="monDrive" class="button"id="monDrive" > Mon Cloud </button>
                        </div>
                        <div class="buttonBox">
                            <button name="reception" class="button" id="reception" > Réception </button>
                        </div>
                        <div class="buttonBox">
                            <button  type="button" name="favoris" class="button" id="favoris"> Favoris </button>
                        </div>
                    </form>
                </div>

                <div class="control2">
                    <form method="POST" action="">

                        <?php

                        if($fichier->rowCount() > 0) {
                            while($fichiers = $fichier->fetch()) {
                                $extension = strtolower(substr(strrchr($fichiers['nomFichier'], '.'), 1));
                                ?>

                                <script type="text/javascript">
                                    function viewImage(id) {
                                        document.getElementById(id).innerHTML="<div class='div-secureFile'> <input id='mdp-Secure' name='mdpSecure' placeholder='mdpFichier'> </div>";
                                    }
                                    <!-- onclick="javascript:viewImage('image');"-->
                                </script>
                                <div class="ImagesBox">

                                    <?php
                                    switch ($extension)
                                    {
                                        case "zip":
                                            if($fichiers['securise'] == NULL) {?>
                                                <div class ="test">
                                                    <a href = "<?= $fichiers['url']?>"> <img  class="fichier" src="../../images/logoZIP.png" alt="fichier ZIP"/> </a>
                                                    <p id ="fich"> fichier ZIP </p>
                                                </div>
                                            <?php }else { ?>
                                                <div class ="test">
                                                    <a href = "<?= $fichiers['url']?>"> <img  class="fichier" src="../../images/fichier.png" alt="fichier ZIP"/> </a>
                                                    <p id ="fich"> fichier ZIP </p>
                                                </div>
                                            <?php }

                                            break;
                                        case "pdf":
                                            if($fichiers['securise'] == NULL) {?>
                                                <div class ="test">
                                                    <a href = "<?= $fichiers['url']?>"> <img  class="fichier" src="../../images/icone-pdf.jpg" alt="dossier"/> </a>
                                                    <p id ="fich">fichier pdf</p>
                                                </div>
                                            <?php }else { ?>
                                                <div class ="test">
                                                    <a href = "<?= $fichiers['url']?>"> <img  class="fichier" src="../../images/fichier.png" alt="fichier ZIP"/> </a>
                                                    <p id ="fich"> fichier pdf </p>
                                                </div>
                                            <?php }
                                            break;

                                        case "png":
                                        case "gif":
                                        case "jpeg":
                                        case "jpg":
                                            if($fichiers['securise'] == NULL) {?>
                                                <a href = "<?= $fichiers['url']?>"> <img  class="fichier" src="../../<?= $fichiers['nomFichier']; ?>" alt="dossier"/> </a>
                                                <div id="divAuDessus"> <img id="imgAuDessus" src="../../images/icone-fichier.png"> </div>
                                                <p id ="fich">fichier <?=$fichiers['idFichier'];?> </p>
                                                <div id="image"></div>

                                            <?php }else {  ?>
                                                <a href = "<?= $fichiers['url']?>"> <img  class="fichier" src="../../images/fichier.png" alt="dossier"/> </a>
                                                <p id ="fich">fichier <?=$fichiers['idFichier'];?> </p>
                                                <div id="image"></div>
                                            <?php }
                                            break;

                                        default:
                                            break;
                                    }?>
                                </div>
                                <?php
                            }}  ?>
                </div>

                </form>
            </div>
            </div>
            <h2 id ="nomChamp"> Boite de reception </h2>



            </body>
            </html>

            <?php
        } else{
            echo "OUPSS... Assurez vous d'avoir tapez la bonne adresse!";
        }
    }
}
?>


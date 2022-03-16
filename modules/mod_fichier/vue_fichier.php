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
                <a href="../../index.php" > <img id="logo" src="../../images/logo.png" alt="Logo du site"/> </a>
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
                        <button  type="button" name="favoris" class="button" id="favoris"> Favoris </button>
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
}
?>
<?php
class VueCompte {

public function __construct() {

}

public function pagePrincipal() {

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>ASCLOUD - Connexion</title>
    <link rel="stylesheet" href="../../css/compte.css">
    <script src="script.js"></script>
</head>
<body>

<header>
    <NAV id="mainNav">
        <a href="../../index.php" > <img id="logo" src="../../images/logo.png" alt="Logo du site"/> </a>
        <form method="GET"> <input type="search" id="search" name=""search placeholder="Rechercher..."/> </form>
        <nav class="menus">
            <a class="menuLink" href=""> Accueil </a>
            <a class="menuLink" href="">  Aide </a>
            <a class="menuLink" href=""> Mon Compte </a>
        </nav>
    </NAV>

</header>
<div id="zone">
    <div class ="control">
        <form method="POST" action="">
            <div class="buttonBox">
                <button name="new" class="button" id="new"> Nouveau </button>
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
    <div class="control2">
        <form method="POST" action="">
            <div class="ImagesBox">
                <a href="dossier.php" > <img class="dossier" src="../../images/dossier.png" alt="dossier"/> </a>
                <p> dossier </p>
            </div>
            <div class="ImagesBox">
                <a href="dossier.php" > <img class="dossier" src="../../images/dossier.png" alt="dossier"/> </a>
                <p> dossier </p>
            </div>
            <div class="ImagesBox">
                <a href="fichier.php" > <img class="dossier" src="../../images/fichier.png" alt="dossier"/> </a>
                <p> fichier </p>
            </div>
            <div class="ImagesBox">
                <a href="dossier.php" > <img class="dossier" src="../../images/dossier.png" alt="dossier"/> </a>
                <p> dossier </p>
            </div>
        </form>
    </div>
</div>
<h2 id ="nomChamp"> Mon Drive </h2>



</body>
</html>

<?php
    }
}
?>
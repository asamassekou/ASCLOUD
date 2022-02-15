<?php
class VueAccueil {

public function __construct() {

}

public function affichage() {

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>ASCLOUD</title>
    <link rel="stylesheet" href="css/accueil.css">
    <script src="script.js"></script>
</head>
<body>

<header>
    <NAV id="mainNav">
        <a href="index.php" id="logo"> <img id="logo"src="images/logo.png" alt="Logo du site"/> </a>
        <h1> BIENVENUE SUR ASCLOUD </h1>
        <nav class="menus">
            <a class="menuLink" href=""> Accueil </a>
            <a class="menuLink" href="">  Aide </a>
            <a class="menuLink" href=""> Mon Compte </a>
        </nav>
    </NAV>

</header>
<div class="pres">
    <div id ="pp">
        <img src="images/logo.png" alt="" />
    </div>
    <div id="description">
        <h2> ASCLOUD</h2>
        <p> ASCLOUD is a website on which you can deposit your files and share them with your friends in complete safety.</p>
    </div>
    <form method="POST" action="index.php?module=inscription&action=inscription">
        <div id="button">
            <button id="inscription" name="inscription" > INSCRIVEZ-VOUS </button>
        </div>
    </form>

    <div id="connect">
        <a id="connexion" href="index.php?module=connexion&action=connexion">j'ai déjà un compte</a>
    </div>
</div>

<FOOTER>
    <p id ="fp" > 2022 - ASCLOUD - Creative Licence </p>
    <div class ="mfooter">
        <div class="compFooter">
            <ul>
                <li> Questions</li>
                <li> Conditions</li>
                <li> Sécurité</li>
                <li> Nous Contacter</li>
            </ul>
        </div>
        <div class="compFooter">
            <ul>
                <li> Questions</li>
                <li> Conditions</li>
                <li> Sécurité</li>
                <li> Nous Contacter</li>
            </ul>
        </div>
        <div class="compFooter">
            <ul>
                <li> Questions</li>
                <li> Conditions</li>
                <li> Sécurité</li>
                <li> Nous Contacter</li>
            </ul>
        </div>
        <div class="compFooter">
            <ul>
                <li> Questions</li>
                <li> Conditions</li>
                <li> Sécurité</li>
                <li> Nous Contacter</li>
            </ul>
        </div>
    </div>
</FOOTER>
</body>
</html>

<?php
    }
}
?>
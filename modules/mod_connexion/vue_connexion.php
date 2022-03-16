<?php
class VueConnexion {

    public function __construct() {

    }

    public function connexion($msg) {

        ?>
        <!doctype html>
        <html lang="fr">
        <head>
            <meta charset="utf-8">
            <title>ASCLOUD - inscription</title>
            <link rel="icon" type="image/png" sizes="16x16" href="images/logo.png">
            <link rel="stylesheet" href="css/connexion.css">
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
                <!--<img src="images/logo.png" alt="" /> -->
                <h2> CONNEXION </h2>
            </div>
            <div id="box-form">
                <form method="POST" action="">
                    <div class="form-inscription">
                        <label class="lab-form"> email : </label>
                        <input type="text" name="email" id="nom" class="input-form"  />
                    </div>

                    <div class="form-inscription">
                        <label class="lab-form" > mot de passe : </label>
                        <input type="password" name="mdp" id="nom" class="input-form"  />
                    </div>

                    <div id="error">
                        <?php
                        if(isset($msg)) echo $msg;
                        ?>
                    </div>
                    <div id="button">
                        <button id="Buttonconnexion" name="connexion" > CONNEXION </button>
                    </div>
                </form>
                <div id="connect">
                    <a id="connexion" href="index.php?module=inscription&action=inscription">je n'ai pas de compte</a>
                </div>

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
<?php
class VueInscription {

    public function __construct() {

    }

    public function inscription() {

        ?>
        <!doctype html>
        <html lang="fr">
        <head>
            <meta charset="utf-8">
            <title>ASCLOUD - inscription</title>
            <link rel="stylesheet" href="css/inscription.css">
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
                <h2> INSCRIPTION </h2>
            </div>
            <div id="box-form">
            <form method="POST" action="index.php">
                <div class="form-inscription">
                    <label class="lab-form"> Nom : </label>
                    <input type="text" name="nom" id="nom" class="input-form" />
                </div>

                <div class="form-inscription">
                    <label class="lab-form">Prénom :</label>
                    <input type="text" name="prenom" id="nom" class="input-form" />
                </div>

                <div class="form-inscription">
                    <label class="lab-form"> email : </label>
                    <input type="text" name="email" id="nom" class="input-form"  />
                </div>

                <div class="form-inscription">
                    <label class="lab-form" > mot de passe : </label>
                    <input type="text" name="mdp1" id="nom" class="input-form"  />
                </div>

                <div class="form-inscription">
                    <label class="lab-form" > confirmation mot de passe : </label>
                    <input type="text" name="mdp2" id="nom" class="input-form"  />
                </div>

                <div id="button">
                    <button id="inscription" name="inscription" > INSCRIVEZ-VOUS </button>
                </div>
            </form>

            <div id="connect">
                <a id="connexion" href="index.php?module=compte&action=compte">j'ai déjà un compte</a>
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
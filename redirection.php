<html>
<head>
    <script type="text/javascript">
        function RedirectionJavascript(){
            document.location.href="index.php?module=compte&action=compte&user=". <?= $_SESSION['user']; ?>;
        }
    </script>
</head>
<body onLoad="setTimeout('RedirectionJavascript()', 10000)">
<div> Votre session est expiré. Dans 1O secondes vous allez être redirigé vers l'Accueil</div>
</body>
</html>
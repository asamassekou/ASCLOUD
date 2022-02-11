<?php

class Config{
     static protected $bdd;

     static function initConnexion(){
        $dns="mysql:host=localhost;dbname=cloud";
        $user="asamassekou";
        $password="admin";
        $bdd = new PDO($dns, $user, $password);
        return $bdd;
    }

    static function cookies() {
        setcookie('accepter',true,time() + 365*24*3600);
        header('Location:./');
    }

    static function token() {
        if (!isset($_SESSION['jeton'])) {
            $_SESSION['jeton'] = bin2hex(openssl_random_pseudo_bytes(6));
        }
    }
}

?>

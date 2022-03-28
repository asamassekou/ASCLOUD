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
        setcookie('secureFile',true,time() + 300);
        header('Location:./');
    }

    static function token() {
            $token = bin2hex(openssl_random_pseudo_bytes(3));
            return $token;
    }
}

?>

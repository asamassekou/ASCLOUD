<?php

require_once 'cont_message.php';

class ModMessage{

    private $controleur;

    public function __construct() {
        $this->controleur = new ContMessage();
        switch($this->controleur->action)
        {
            case "message":
                $this->controleur->pageMessage();
                break;

            default:
                break;

        }
    }
}

?>
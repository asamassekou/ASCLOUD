<?php

class controleur {

    public $module;

    public function __construct(){
        if(isset($_GET['module'])){
            $this->module = $_GET['module'];
        }
    }
}

?>

<?php

namespace App\Middleware;

class Middleware {
    private $typeUser ;
    private $id ;
    private static $instance;

    private function __construct() {
       session_start();
       $this->typeUser = $this->middleWare();
       $this->id = $this->getIdFromSession();
    }

     static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

     function middleWare() {
        if (isset($_SESSION["authorID"])) {
            $this->typeUser = "author";
        } else if (isset($_SESSION["adminID"])) {
            $this->typeUser = "admin";
        } 
        
        return $this->typeUser;
    }
     function getIdFromSession(){
        if (isset($_SESSION["authorID"])) {
            $this->id = $_SESSION["authorID"];
        } else if (isset($_SESSION["adminID"])) {
            $this->id = $_SESSION["adminID"];
        } 
        return $this->id;
    }


    
     function closeSession() {
        session_write_close();
    }
}

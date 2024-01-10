<?php

namespace App\Middleware;

class Middleware {
    private $userType;
    private $userId;
    private static $instance;

    private function __construct() {
        
        $this->startSession();
        $this->initializeUser();
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function startSession() {
        if (session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }

    private function initializeUser() {
        $this->userType = $this->fetchUserType();
        $this->userId = $this->fetchUserId();
    }

    private function fetchUserType() {
        if (isset($_SESSION["authorID"])) {
            return "author";
        } else if (isset($_SESSION["adminID"])) {
            return "admin";
        }
        
        return null;
    }

    private function fetchUserId() {
        if (isset($_SESSION["authorID"])) {
            return $_SESSION["authorID"];
        } else if (isset($_SESSION["adminID"])) {
            return $_SESSION["adminID"];
        }
        
        return null;
    }

    public function closeSession() {
        session_write_close();
    }

    public function getUserType() {
        return $this->userType;
    }

    public function getUserId() {
        return $this->userId;
    }
}

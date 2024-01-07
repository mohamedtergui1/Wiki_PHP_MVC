<?php

    namespace App\Controller;

    class AboutController extends Controller {
        function index(){
            $this->render("user","about","About Us");
        }
    
    }
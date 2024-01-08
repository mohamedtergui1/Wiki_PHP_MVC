<?php

namespace App\Controller;

class HomeController extends Controller
{   
    function index()
    {
        $this->render("user", "home", "WiKi");
    }

}
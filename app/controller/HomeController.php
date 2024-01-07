<?php

namespace App\Controller;

use App\Orm\Orm;
class HomeController extends Controller
{
    function  index(){
        $a= new Orm;
        var_dump($a->selectAll("role"));
    }
}
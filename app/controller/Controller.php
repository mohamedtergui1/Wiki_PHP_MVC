<?php
namespace App\Controller;

class Controller
{
    public function render($nameFolder  ="404", $nameFile ="404", $title ="Error 404" ,array $data = null)
    {   
        ob_start();
        include "../app/view/" . $nameFolder . "/" . $nameFile . ".php";
        $body = ob_get_clean(); 
        include '../app/view/include/layout.php';

    }
}
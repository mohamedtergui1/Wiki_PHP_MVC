<?php
namespace App\Controller;

class Controller
{
    public function render($nameFolder, $nameFile, $title, $data)
    {

        include "../app/View/" . $nameFolder . "/" . $nameFile . ".php";
        include '../app/View/include/layout.php';

    }
}
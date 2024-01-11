<?php

namespace App\Controller;

use App\Middleware\Middleware;
use App\Model\UserModel;

class Controller
{   
    protected $admin;
    protected $typeUser;
    protected $idFromSession;

    private $middleware ;

    public function __construct()
    {    
      
        $this->middleware = Middleware::getInstance(); 
        $this->typeUser =  $this->middleware ->getUserType();
        
        
        $this->idFromSession =  $this->middleware ->getUserId();

        $this->typeUser == "admin" ? $this->admin = true : $this->admin = false;
        
        $this->middleware ->closeSession();
    }

    public function render(string $nameFolder = "404", string $nameFile = "404", $title = "Error 404", array $data = null , string $layout = "layout")
    {   
        
        
       
        $typeUser = $this->typeUser;
        $idFromSession = $this->idFromSession;
        $admin = $this->admin;
      
        if ($idFromSession) {
            $infoUser = UserModel::getInstance()->selectUser($idFromSession);
        }
           
         
        ob_start();
        include "../app/view/" . $nameFolder . "/" . $nameFile . ".php";
        $body = ob_get_clean();
        include '../app/view/include/'.$layout.'.php';
    }
}

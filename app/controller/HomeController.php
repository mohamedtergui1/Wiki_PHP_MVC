<?php

namespace App\Controller;
use App\Model\WikiModel;
use App\Model\UserModel;
use App\Model\CategoryModel;
class HomeController extends Controller
{   
    function index()
    {
        
        $this->render("user", "home", "Wi.Ki",[
            "category" => (new CategoryModel)->selectCategory()
        ,
              "author" => (new UserModel)->selectUser()
              ,
              "wiki" => (new WikiModel)->slelectWiki()
    ]);

    }

}
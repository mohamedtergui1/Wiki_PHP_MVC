<?php

namespace App\Controller;
use App\Model\CategoryModel;
use App\Model\TagModel;
use App\Model\UserModel;
use App\Model\WikiModel;


class DashboardController extends Controller{

    function  index(){
        // var_dump ($this->typeUser);
        // die;
        if($this->admin)
        $this->render("admin","main","Dashboard",array ( (new UserModel)->selectCount(
            [
                'userCount' => 'user ',
                'categoryCount' => 'category ',
                'tagCount' => 'tag ',
                'wikiCount' => 'wiki '
            ]
            ) )
    ,"layoutDashboard");
      else header("Location:".APP_URL);
    }
    function manageUser (){
        if($this->admin)
        $this->render("admin","users","User Managmnet",(new UserModel)->selectUser(),"layoutDashboard");
        else header("Location:".APP_URL);
    }
    function manageCategory (){
        if($this->admin)
        $this->render("admin","categories","Category Managmnet",(new CategoryModel)->selectCategory(),"layoutDashboard");
        else header("Location:".APP_URL);
    }
    function manageTag (){
        if($this->admin)
        $this->render("admin","tags","Tag Managmnet",(new TagModel)->selectTag(),"layoutDashboard");
        else header("Location:".APP_URL);
    }
    function manageWiki (){
        if($this->admin)
        $this->render("admin","wikis","Wiki Managmnet",(new WikiModel)->slelectWiki(),"layoutDashboard");
        else header("Location:".APP_URL);
    }

}
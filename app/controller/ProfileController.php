<?php 
  namespace App\Controller;
  use App\Model\WikiModel;
  class ProfileController extends Controller{
    function view($id){
        if($this->idFromSession)
       $this->render("user","profile","profile" , ( new WikiModel)->slelectWiki(
        null
        ,
        ["user.id" => $id ]

    ));
    else echo "you dont have permention to open this ";
    }
  }
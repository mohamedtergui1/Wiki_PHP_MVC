<?php
  namespace App\Controller;
  use App\Model\CategoryModel;
  class AddwikiController extends Controller{
      private $category ;


      public function __construct(){
        parent::__construct();
        $this->category = new CategoryModel;
      }
      function index(){
          if($this->idFromSession){
             $this->render("user","addWiki","Add Wi.Ki" , ["category" => $this->category->selectCategory()] );
          }else {
            header("Location:". APP_URL);
          }
      }
      function insert(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            var_dump($_POST);
        }
      }
  }
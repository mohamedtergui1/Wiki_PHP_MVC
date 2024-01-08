<?php
   namespace App\Controller;

 use App\Model\UserModel;
   class SigninController extends Controller {
      private $user;
      function __construct()
      {
          $this->user =  UserModel::getInstance();
      }
     
             function index(){
                $this->render("user","signIn","Sign In");
             }
             function  login(){
               if ($_SERVER["REQUEST_METHOD"] == "POST"){
                  $data = $_POST;
                  $res = $this->user->selectByEmail($data["email"]);
                  if($res){
                       if( password_verify($_POST["password"],$res->password) ){
                        $_SESSION["userID"] = $res->id;
                        echo 1;
                        exit;
                         
                       } else echo "password inncorict";
                  }else echo " email not fount";
               } 
             }

   }
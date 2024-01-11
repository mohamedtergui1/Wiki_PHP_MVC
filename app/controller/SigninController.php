<?php
namespace App\Controller;

use App\Model\UserModel;

class SigninController extends Controller
{
   private $user;
   function __construct()
   {
      $this->user = UserModel::getInstance();
   }

   function index()
   {
      $this->render("user", "signIn", "Sign In");
   }
   function login()
   {
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $data = $_POST;
         $res = $this->user->selectByEmail($data["email"]);
         if ($res) {
            if (password_verify($_POST["password"], $res->password)) {


               if ($res->roleID == 2) {
                  $_SESSION["authorID"] = $res->id;
               } else if ($res->roleID ==1) {
                  $_SESSION["adminID"] = $res->id;

               } else {
                  echo "somthing is wrong please try again ";

               }
               echo 1;


            } else
               echo "password wrong";
         } else
            echo " email not fount";
      }
   }

   function logout()
   {
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
         if ($_POST['logout'] ) {
           
            session_destroy();
            echo 1;
         }
      }
   }

}
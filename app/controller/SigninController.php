<?php
   namespace App\Controller;


   class SigninController extends Controller {
             function index(){
                $this->render("user","signIn","Sign In");
             }
   }
<?php 
 
    namespace App\Controller;


    class ContactController extends Controller {
          function index(){
             $this->render("user","contact","Contact Us");

          }
    }
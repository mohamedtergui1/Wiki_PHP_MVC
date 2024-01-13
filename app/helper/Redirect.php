<?php 
namespace App\Helper;
class Redirect{

    public static function  to($location){
        header("Location: ".APP_URL."/"."$location");
        exit();
    }

    public static function  back(){
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    }
}
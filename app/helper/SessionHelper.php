<?php  
 namespace  App\Helper;
 class SessionHelper{
 
    public static function  start(){
        session_start();
    }
    public static function  get($name){
        echo $_SESSION[$name];
    }

    public static function  destroy(){
        session_destroy();
    }

    public static function  name($name){
        return $_SESSION[$name];
    }

    public static function  set($name, $msg){
       return $_SESSION[$name] = $msg;
       
    }

    public static function clear($name){
        unset($_SESSION[$name]);
    }

    public static function existed($name){
       if(isset($_SESSION[$name])){
           return true;
       }else {
        return false;
       }
    }

    public static function success($msg){
        if(isset($_SESSION[$msg])){
            echo ' <script>  swal("'.$_SESSION[$msg].'", "You clicked the button!", "success");  </script>  ';
            unset($_SESSION[$msg]);
        }
    }

    public static function danger($msg){
        if(isset($_SESSION[$msg])){
            echo ' <script>  swal("'.$_SESSION[$msg].'", "You clicked the button!", "error");  </script>  ';
            unset($_SESSION[$msg]);
        }
     }
}
 
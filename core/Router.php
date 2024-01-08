<?php



class Router
{

    private $controller = 'App\Controller\HomeController';
    private $method = 'index';
    private $params = [];
    
    private static $instance;

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    private function __construct()
    {
        $this->routes();
    }

    public function routes()
    {
        session_start();
        $uri = $_GET['uri'] ?? '';
        $uri = explode('/', trim(strtolower($uri), '/'));

        if (!empty($uri[0])) {

            $controller = $uri[0] . 'Controller';
            unset($uri[0]);
            $controller = 'App\Controller\\' . $controller;

            if (class_exists($controller)) {
                $this->controller = $controller;
            } else {

                $this->error();

            }
        }

        $this->controller = new $this->controller;


        if (isset($uri[1])) {

            $method = $uri[1];
            unset($uri[1]);

            if (method_exists($this->controller, $method)) {
                $this->method = $method;
            } else {
                $this->error();

            }
        }


        if (isset($uri[2])) {
           
            $this->params = array_values($uri);
        
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    function error()
    {
        $this->controller = 'App\Controller\Error';
        $this->controller = new $this->controller;
        call_user_func_array([$this->controller, $this->method], $this->params);
        die;
    }
    
   
}
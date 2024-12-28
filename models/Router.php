<?php

class Router
{
    private $conn ;
    protected $routes = [];

    public function __construct($db)
    {
        $this->conn= $db;
    }
    private function addRoute($uri, $ctl, $className, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'ctl' => $ctl,
            'class' => $className,
            'method' => strtoupper($method)
        ];
    }

    public function get($uri, $ctl ,$className)
    {
        $this->addRoute($uri, $ctl ,$className, 'GET');
    }
    public function post($uri, $ctl ,$className)
    {
        $this->addRoute($uri, $ctl ,$className, 'POST');
    }
    public function delete($uri, $ctl ,$className)
    {
        $this->addRoute($uri, $ctl ,$className, 'DELETE');
    }
    public function update($uri, $ctl ,$className)
    {
        $this->addRoute($uri, $ctl ,$className, 'UPDATE');
    }
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                if (file_exists($route['ctl'])) {
                    require_once $route['ctl'];
                } else {
                    $this->_404();
                    return;
                }
                $controllerClass = $route['class'];

                if (class_exists($controllerClass)) {
                    $controller = new $controllerClass($this->conn);
        
                    $methodToCall = strtolower($method);
                    if ($method == 'GET') {
                        $methodToCall = 'show';  // Default to 'show' for GET
                    } elseif ($method == 'POST') {
                        $methodToCall = 'store'; // Default to 'store' for POST
                    } elseif ($method == 'DELETE') {
                        $methodToCall = 'destroy'; // Default to 'destroy' for DELETE
                    } elseif ($method == 'UPDATE') {
                        $methodToCall = 'update'; // Default to 'update' for UPDATE
                    }
        
                    if (method_exists($controller, $methodToCall)) {
                        $controller->$methodToCall();
                    } else {
                        $this->_404();
                    }
                } else {
                    $this->_404();
                }
                return;
            }
           
        } 
        // else 
        $this->_404();
    }
    public function test(){
        echo " aaaaaaaaaa"; die();
    } 
    private function _404()
    {
        require "views/error/404.php";
        die();
    }
}

<?php

class Router
{

    protected $routes = [];

    private function addRoute($uri, $ctl, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'ctl' => $ctl,
            'method' => $method
        ];
    }

    public function get($uri, $ctl)
    {
        $this->addRoute($uri, $ctl, 'GET');
    }
    public function post($uri, $ctl)
    {
        $this->addRoute($uri, $ctl, 'POST');
    }
    public function delete($uri, $ctl)
    {
        $this->addRoute($uri, $ctl, 'DELETE');
    }
    public function update($uri, $ctl)
    {
        $this->addRoute($uri, $ctl, 'UPDATE');
    }
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require $route['ctl'];
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

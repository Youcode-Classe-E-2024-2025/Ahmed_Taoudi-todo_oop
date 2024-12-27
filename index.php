<?php
require "assets/helper/fonctions.php";
require_once "models/Router.php";
require_once "models/Database.php";

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$db = new Database();
// 
if(isset($_POST['createdb'])){
    // echo 'hhhhhhh'; die();
    // dd($_POST);
    if(isset($_POST['checkbox'])){
        $db->createDatabase(DBNAME,true);
    }else{
        $db->createDatabase(DBNAME);
    }
    
}

$router = new Router();

require "routes.php";

$aa = 44 ;

// dd($uri);

$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];
// dd($method);
$router->route($uri, $method);

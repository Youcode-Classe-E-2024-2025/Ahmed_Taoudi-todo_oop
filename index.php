<?php
session_start();
require "assets/helper/fonctions.php";
require_once "models/Router.php";
require_once "models/Database.php";

// CSRF
if (empty($_SESSION['csrf_token'])) { 

    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generates a 64-character hex token
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$db = new Database();
// 
if(isset($_POST['createdb'])){
    // echo 'hhhhhhh'; die();
    // dd($_POST);
    if(isset($_POST['checkbox']) && $_POST['checkbox'] == 'on' ){
        // dd("aaaaaaaaaaaaaaaaaaaaaa");
        $db->createDatabase(DBNAME,true);
    }else{
        // dd("zzzzzzzzzzzzzz");
        $db->createDatabase(DBNAME,false);
    }
    
}

$router = new Router($db);

require "routes.php";

$aa = 44 ;

// dd($uri);

$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];
// dd($method);
$router->route($uri, $method);

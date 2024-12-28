<?php 

// GET

$router->get('/','controllers/pages/index.ctl.php','Index');
$router->get('/profile','controllers/user/UserController.php','UserController');
$router->get('/task','controllers/task/taskController.php','TaskController');

// $router->get('/login','controllers/connection/login.ctl.php');:
// $router->get('/signup','controllers/connection/signup.ctl.php');

//  POST

// $router->post('/login','controllers/login.ctl.php');
// $router->post('/signup','controllers/signup.ctl.php','UserController');

//  UPDATE

// $router->update('/task','controllers/task/TaskController.php','taskController');


//  DELETE

// $router->delete('/task','controllers/task/TaskController.php','taskController');

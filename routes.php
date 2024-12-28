<?php 

// GET

$router->get('/','controllers/pages/index.ctl.php');
$router->get('/profile','controllers/pages/profile.ctl.php');
$router->get('/task','controllers/task/taskController.php');

$router->get('/login','controllers/connection/login.ctl.php');
$router->get('/signup','controllers/connection/signup.ctl.php');

//  POST

$router->post('/login','controllers/login.ctl.php');
$router->post('/signup','controllers/signup.ctl.php');

//  UPDATE

$router->update('/task','controllers/task/taskController.php');


//  DELETE

$router->delete('/task','controllers/task/taskController.php');

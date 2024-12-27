<?php 

// GET

$router->get('/profile','controllers/profile.ctl.php');
$router->get('/','controllers/index.ctl.php');
$router->get('/task','controllers/task/show.php');

$router->get('/login','controllers/login.ctl.php');
$router->get('/signup','controllers/signup.ctl.php');

//  POST

$router->post('/login','controllers/login.ctl.php');
$router->post('/signup','controllers/signup.ctl.php');

//  UPDATE

$router->update('/task','controllers/task/update.php');


//  DELETE

$router->delete('/task','controllers/task/destroy.php');

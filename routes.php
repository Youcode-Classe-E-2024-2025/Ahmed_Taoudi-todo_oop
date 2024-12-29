<?php 

// GET

$router->get('/','controllers/pages/index.ctl.php','Index');
$router->get('/profile','controllers/user/UserController.php','UserController');
$router->get('/task','controllers/task/taskController.php','TaskController');

$router->get('/login','controllers/user/UserController.php','UserController');
$router->get('/signup','controllers/user/UserController.php','UserController');

//  POST

$router->post('/task','controllers/task/taskController.php','TaskController');

$router->post('/task/update-status','controllers/task/taskController.php','TaskController');
$router->post('/login','controllers/user/UserController.php','UserController');
$router->post('/logout','controllers/user/UserController.php','UserController');
$router->post('/signup','controllers/user/UserController.php','UserController');

//  UPDATE

$router->update('/task','controllers/task/taskController.php','taskController');


//  DELETE

$router->delete('/task','controllers/task/taskController.php','TaskController');

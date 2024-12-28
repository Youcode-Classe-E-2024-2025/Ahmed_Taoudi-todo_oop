<?php 
require_once "models/Task.php";
global $db;
$allTask = Task::getAllTask($db);
// $db->test();
// dd($allTask);
require_once("views/index.view.php");

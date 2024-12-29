<?php
    require_once('models/Database.php');
    require_once('models/Task.php');

$dbb = new Database();
$id=(int) $_GET['id'];
    $task =  Task::getTaskById($id, $dbb) ;

    echo json_encode($task);
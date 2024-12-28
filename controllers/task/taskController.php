<?php
// session_start();
require_once "models/Validator.php";
require_once "models/Task.php";

class TaskController
{
    private $conn ;
    public function __construct($db)
    {
        $this->conn = $db ;
    }
    // Show all tasks (GET)
    public function show()
    {
        // var_dump((int)$_GET['id']);
       require_once 'views/detail.php';
    }

    public function store(){
        // dd(Validator::XSS($_POST['taskdesc']));
        // dd($_POST);
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("CSRF token validation failed. Possible CSRF attack.");
        }
        $name=Validator::XSS($_POST['taskname']);
        $desc=Validator::XSS($_POST['taskdesc']);
        $status=Validator::XSS($_POST['taskstatus']);
        $priority=Validator::XSS($_POST['taskpriority']);
        $start= date('Y-m-d H:i:s');
        $fin=Validator::XSS($_POST['taskfin']);
        $task = new Task($name,$desc,$status,$priority,$start,$fin);
        $task->createTask($this->conn);
        header('Location: /');

    }

    // Update a task
    public function update()
    {
         // CSRF
         if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("CSRF token validation failed. Possible CSRF attack.");
        }
    }

    // Destroy (delete) a task
    public function destroy()
    {
         // CSRF
         if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("CSRF token validation failed. Possible CSRF attack.");
        }
    }
}

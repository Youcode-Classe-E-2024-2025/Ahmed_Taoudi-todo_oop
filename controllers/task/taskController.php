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
        if (!isset($_SESSION['userid']) || !isset($_SESSION['username'])) { header('location: /'); exit(); } 
       if(Task::isInDatabase($_GET['id'],$this->conn) == 0 ){
        require_once 'views/error/404.php';
        exit();
       }
        $id=(int)$_GET['id'];

        $task= Task::getTaskById($id , $this->conn);
        $users =Task::getUersOfTask($id,$this->conn);
        // dd($users);
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
      $newtaskid =  $task->createTask($this->conn);
    //   dd($newtaskid);
       // Ensure 'contributor' is handled correctly
        if (isset($_POST['contributor'])) {
            $contributors = $_POST['contributor'];

            // If it's a comma-separated list (which is likely), split it
            if (is_string($contributors[0])) {
                $contributors = explode(',', $contributors[0]);
            }

            // Clean up the IDs and ensure they're integers
            $contributors = array_map('intval', $contributors);

            // var_dump($contributors);
            if(count($contributors) >= 1 && $contributors[0] !== 0 ){
                
                foreach($contributors as $userId){
                    Task::addUserToTask($newtaskid,$userId,$this->conn);
                }
                // echo  count($contributors);
            }
        }
        header('Location: /');

    }

    // Update a task
    public function update()
    {
         // CSRF
         if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("CSRF token validation failed. Possible CSRF attack.");
        }
        // dd($_POST);
        $id=Validator::XSS($_POST['id']); 
        $name=Validator::XSS($_POST['taskname_up']);
        $desc=Validator::XSS($_POST['description_up']);
        $status=Validator::XSS($_POST['taskstatus_up']);
        $priority=Validator::XSS($_POST['taskpriority_up']);
        $fin=Validator::XSS($_POST['taskfin_up']);
        // dd($fin);
        $task = new Task($name,$desc,$status,$priority,'',$fin);
        Task::updateTask($id, $task, $this->conn);
        // die();
        header('Location: /');

    }

    // Destroy (delete) a task
    public function destroy()
    {
         // CSRF
         if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("CSRF token validation failed. Possible CSRF attack.");
        }
        $id = (int) $_POST['id'];
        
        Task::deleteTask($id,$this->conn);
        // dd($id);
        header('Location: /');

    }
}

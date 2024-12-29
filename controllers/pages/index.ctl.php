<?php 


require_once "models/Task.php";
require_once "models/User.php";

// global $db;
class Index  {
    private $conn ;
    public function __construct($db)
    {
        $this->conn = $db ;
    }

    function show(){
        if (isset($_SESSION['userid']) && isset($_SESSION['username'])) {

            $allTask = Task::getAllTask($this->conn);
            // $db->test();
            $usersQuery = User::getAllUser($this->conn);
            $completed = array_filter($allTask, function ($task) {
                return $task['taskstatus'] == 'DONE';
            } );
            $todo = array_filter($allTask, function ($task) {
                return $task['taskstatus'] == 'TODO';
            } );
            $doing = array_filter($allTask, function ($task) {
                return $task['taskstatus'] == 'DOING';
            } );
            
            // dd($allTask);
            require_once("views/index.view.php");
            // require_once("views/home.php");
        } else {
            require_once "views/home.php";
        }
        
    }

}

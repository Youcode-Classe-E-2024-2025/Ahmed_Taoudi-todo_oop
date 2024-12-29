<?php 


require_once "models/Task.php";

// global $db;
class Index  {
    private $conn ;
    public function __construct($db)
    {
        $this->conn = $db ;
    }

    function show(){
        $allTask = Task::getAllTask($this->conn);
        // $db->test();
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
    }

}

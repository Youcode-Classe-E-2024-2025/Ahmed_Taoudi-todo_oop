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
        // dd($allTask);
        require_once("views/index.view.php");
    }

}

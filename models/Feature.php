<?php 
class Feature extends Task {

    private $taskType;
    
    public function __construct($id, $name, $desc, $status, $priority, $start, $fin, $taskType) {
        parent::__construct($id, $name, $desc, $status, $priority, $start, $fin);
        $this->setTaskType($taskType);
    }

    public function getTaskType() {
        return $this->taskType;
    }

    public function setTaskType($taskType) {
        $this->taskType = $taskType;
    }
}
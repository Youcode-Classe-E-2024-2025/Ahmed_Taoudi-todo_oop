<?php
// session_start();
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

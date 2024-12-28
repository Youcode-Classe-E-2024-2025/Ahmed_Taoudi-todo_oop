<?php
session_start();
class UserController
{
    private $conn ;
    public function __construct($db)
    {
        $this->conn = $db ;
    }
    // Show user profile (GET)
    public function show()
    {
        
        require_once "views/profile.view.php";
    }

    // Register a new user (POST)
    public function store()
    {
         // CSRF
         if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("CSRF token validation failed. Possible CSRF attack.");
        }
        echo "User registration process...";
        require_once "views/profile.view.php";
    }

    // Log the user in (POST)
    public function login()
    {
         // CSRF
         if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("CSRF token validation failed. Possible CSRF attack.");
        }
        echo "User login process...";
    }

    
    public function update()
    {
         // CSRF
         if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("CSRF token validation failed. Possible CSRF attack.");
        }
        echo "Updating user details...";
    }

    // Delete user account (DELETE)
    public function destroy()
    {
        // Handle user account deletion (remove user from DB)
        echo "Deleting user account...";
    }
}

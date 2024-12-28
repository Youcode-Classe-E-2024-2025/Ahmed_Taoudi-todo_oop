<?php
// session_start();
require_once "models/Validator.php";
require_once "models/User.php";
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
        if (isset($_SESSION['userid']) && isset($_SESSION['username'])){

            require_once "views/profile.view.php";
        }else{
            require_once "views/auth.php";
        }
    }

    // Register a new user (POST)
    public function store()
    {
         // CSRF
         if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("CSRF token validation failed. Possible CSRF attack.");
        }
        // dd($_POST);
        $useremail = Validator::XSS($_POST['email']);
        //  dd( $emailExist);
        $username = Validator::XSS($_POST['username']);
        $emailExists = User::isIndatabase($useremail , $this->conn);
        $password = $_POST['password'];
        // dd($emailExists);
        if ($emailExists === 0) {
            echo "you can not use this email try another one <br>";
            require("views/auth.php");
            return;
        }
        // } else {
        //     $hashedPassword = password_hash($password, PASSWORD_BCRYPT); 
        //     $newUser = $db->query(
        //         "insert into utilisateur (email,name,mot_pass) values (:email, :name , :password)",
        //         ['name' => $username, 'email' => $useremail, 'password' => $hashedPassword ]
        //     );
        //     $id = $db->query("select id from utilisateur where email = :email", ['email' => $useremail])->fetchColumn();
        //     $db->query("insert into user_status (utilisateur_id) values (:id)",['id'=>$id]);
        //     require("views/login.view.php");
        // }
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

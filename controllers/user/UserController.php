<?php
// session_start();
require_once "models/Validator.php";
require_once "models/User.php";
class UserController
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    // Show user profile (GET)
    public function show()
    {
        if (isset($_SESSION['userid']) && isset($_SESSION['username'])) {

            require_once "views/profile.view.php";
        } else {
            require_once "views/auth.php";
        }
    }

    // Register a new user (POST)
    public function store()
    {
        if (isset($_POST['logout'])) {
            return $this->logout();
        }
        if (isset($_SESSION['username'])) {
            header('location: /');
            return;
        }
        if (isset($_POST['login'])) {
            return $this->login();
        }
        // CSRF
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("CSRF token validation failed. Possible CSRF attack.");
        }
        // dd($_POST);
        $useremail = Validator::XSS($_POST['email']);
        //  dd( $emailExist);
        $username = Validator::XSS($_POST['username']);
        $emailExists = User::isIndatabase($useremail, $this->conn);
        $password = $_POST['password'];
        // dd($emailExists);
        if ($emailExists > 0) {
            echo "you can not use this email try another one <br>";
            require("views/auth.php");
            return;
        } else {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $newUser = new User('', $useremail, $username, $hashedPassword);
            $newUserId = $newUser->createUser($this->conn);
            // dd($newUserId);
            require("views/auth.php");
        }
        // echo "User registration process...";
        // require_once "views/profile.view.php";
    }

    // Log the user in (POST)
    public function login()
    {
        if (isset($_SESSION['username'])) {
            header('location: /');
            return;
        }
        // CSRF
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("CSRF token validation failed. Possible CSRF attack.");
        }
        // dd($_POST);
        $useremail = $_POST['email'];
        $password = $_POST['password'];
        $emailExists = User::isIndatabase($useremail, $this->conn);
        if ($emailExists > 0) {
            $loginUser = new User($this->conn, $useremail);
            if ($loginUser->checkPassword($password)) {
                // dd([$loginUser->getName(),$loginUser->getId()]);
                $_SESSION['username'] = $loginUser->getName();
                $_SESSION['userid'] = $loginUser->getId();
                $_SESSION['useremail'] = $loginUser->getEmail();
                header('location: /');
            } else {
                echo ('useremail or the password are wrong ! try again');
                require("views/auth.php");
            }
        } else {
            echo ('useremail or the password are wrong ! try again');
            require("views/auth.php");
        }

        // dd($loginUser->getEmail());
        // echo "User login process...";
    }

    public function logout(){
        session_unset();
        session_destroy();
    //    dd('333333');
        header('Location: /');
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

<?php 

class User{
 protected $username; 
 protected $useremail; 
 protected $userpassword; 

public function __construct($username,$useremail,$userpassword){
$this->setName($username);
$this->setEmail($useremail);
$this->setPassword($userpassword);
}

 //  SET
 public function setName($username){
    $this->username = $username; 
 }
 public function setEmail($useremail){
    $this->useremail = $useremail;
 }
 public function setPassword($userpassword){
    $this->userpassword = $userpassword;
 }

//  GET
 public function getName(){
   return $this->username;
 }
 public function getEmail(){
    return $this->userpassword;
  }
  public function getPassword(){
    return $this->userpassword;
  }

}
<?php

class User
{
   protected $id;
   protected $username;
   protected $useremail;
   protected $userpassword;

   // public function __construct($email,$db)
   // {
   //    $result = $db->query(
   //       'select * from user where useremail = :email',
   //       ['email' => $email]
   //    );
   //    $this->setName($result['username']);
   //    $this->setEmail($result['useremail']);
   //    $this->setPassword($result['userpassword']);
   //    $this->setId($result['id']);
   // }

   public function __construct($db, $useremail = null, $username = null, $userpassword = null)
   {
   if($userpassword == null){
      $this->getUserbyEmail($db,$useremail);
   }else{
      $this->setName($username);
      $this->setEmail($useremail);
      $this->setPassword($userpassword);
      $this->setId(null);}
   }

   public static function isIndatabase($email, $db)
   {

      $result = $db->query(
         'select * from user where useremail = :email',
         ['email' => $email]
      );
      return $result->rowCount();
   }

   //  SET
   public function setName($username)
   {
      $this->username = $username;
   }
   public function setId($id)
   {
      $this->id = $id;
   }
   public function setEmail($useremail)
   {
      $this->useremail = $useremail;
   }
   public function setPassword($userpassword)
   {
      $this->userpassword = $userpassword;
   }

   // add user to database 
   public function createUser($db)
   {
       $db->query(
         "insert into user (useremail,username,userpassword) values (:email, :name , :password)",
         ['name' => $this->getName(), 'email' => $this->getEmail(), 'password' => $this->getPassword()]
      );
      $newUserId = $this->getIdByEmail($this->getEmail(),$db);
      $this->setId($newUserId);
      return $newUserId ;
   }
   //  GET
   public static function getIdByEmail($email, $db)
   {
      return $db->query("select id from user where useremail = :email", ['email' => $email])->fetchColumn();
   }
   private function getUserbyEmail($db,$email){
      $user = $db->query("select * from user where useremail = :email", ['email' => $email])->fetch();
      // dd($user);
      $this->setName($user['username']);
      $this->setEmail($user['useremail']);
      $this->setPassword($user['userpassword']);
      $this->setId($user['id']);

   }
   public static function getUserbyId($db,$id){
      $user = $db->query("select * from user where id = :id", ['id' => $id])->fetch();
      // dd($user);
      return $user;
   }

   public function getId()
   {
      return $this->id;
   }
   public function getName()
   {
      return $this->username;
   }
   public function getEmail()
   {
      return $this->useremail;
   }
   public function getPassword()
   {
      return $this->userpassword;
   }
   public static function getAllUser($db){
      return  $db->query("select id, username , useremail from user ")->fetchAll();
   }


   // password check
   public function checkPassword($password)
    {
        return password_verify($password, $this->userpassword);
    }
}

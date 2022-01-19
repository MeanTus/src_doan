<?php
include_once '../utils/MySQLUtils.php';
class User{
    private string $userName;
    private string $email;
    private string $password;
    private int $sex;
    private int $role;

    public function __construct($userName, $email, $password, $sex, $role = 0)
    {
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->sex = $sex;
        $this->role = $role;
    }

    public function setUserName($userName){
        $this->userName = $userName;
    }

    public function getUserName(){
        return $this->userName;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPhai($sex){
        $this->sex = $sex;
    }

    public function isSex(){
        return $this->sex;
    }

    public function isRole(){
        return $this->role;
    }

    public function insertUser(){
        $dbCon = new MySQLUtils();
        $query = "INSERT INTO user (username, email, password, sex, role) 
        VALUES (:username, :email, :password, :sex, :role)";
        $param = [
            ":username"=>$this->getUserName(), 
            ":email"=>$this->getEmail(), 
            ":password"=>$this->getPassword(), 
            ":sex"=>$this->isSex(),
            ":role"=>$this->isRole()
        ];
        $dbCon->insertData($query, $param);
        $dbCon->disconnect();
    }

    public function getUserByEmail(){
        $dbCon = new MySQLUtils();
        $query = "select * from user where email = :email";
        $param = [":email"=>$this->getEmail()];
        $user = $dbCon->getData($query, $param);
        $dbCon->disconnect();
        return $user;
    }

    public function getAllUser(){
        $dbCon = new MySQLUtils();
        $query = "select * from user";
        $data = $dbCon->getData($query);
        $dbCon->disconnect();
        return $data;
    }

    public function updateUser(){
        $dbCon = new MySQLUtils();
        $query = "UPDATE user set username = :username, password = :password, sex = :sex where email = :email";
        $param = [
            ":username"=>$this->getUserName(),  
            ":password"=>$this->getPassword(), 
            ":sex"=>$this->isSex()
        ];
        $count = $dbCon->updateData($query, $param);
        $dbCon->disconnect();
        return $count;
    }

    public function blockUser(){
        $dbCon = new MySQLUtils();
        $query = "UPDATE user set user_status = 1 where email = :email";
        $param = [":email"=>$this->getEmail()];
        $count = $dbCon->updateData($query, $param);
        $dbCon->disconnect();
        return $count;
    }
}
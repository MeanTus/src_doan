<?php
include_once '../utils/MySQLUtils.php';
class User{
    private string $userName;
    private string $email;
    private string $password;
    private bool $sex;
    private bool $role;

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

    public function insertUser(){
        $dbCon = new MySQLUtils();
        $query = "INSERT INTO user (username, email, password, sex) 
        VALUES (:username, :email, :password, :sex)";
        $param = [
            ":username"=>$this->getUserName(), 
            ":email"=>$this->getEmail(), 
            ":password"=>$this->getPassword(), 
            ":sex"=>$this->isSex()
        ];
        $dbCon->insertData($query, $param);
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
        return $dbCon->updateData($query, $param);
    }

    public function deleteUser(){
        $dbCon = new MySQLUtils();
        $query = "DELETE from user where email = :email";
        $param = [":email"=>$this->getEmail()];
        return $dbCon->deleteData($query, $param);
    }
}
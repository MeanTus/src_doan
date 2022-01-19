<?php
include_once '../utils/MySQLUtils.php';

class Manufacturer{
    private int $manufacturerID;
    private string $manufacturerName;

    public function __construct($manufacturerId = 0, $manufacturerName)
    {
        $this->manufacturerID = $manufacturerId;
        $this->manufacturerName = $manufacturerName;
    }

    public function getManufacturerId(){
        return $this->manufacturerID;
    }

    public function setManufacturerID($manufacturerId){
        $this->manufacturerID = $manufacturerId;
    }

    public function getManufacturerName(){
        return $this->manufacturerName;
    }

    public function setManufacturerName($manufacturerName){
        $this->manufacturerName = $manufacturerName;
    }

    public function insertManufacturer(){
        $dbCon = new MySQLUtils();
        $query = "INSERT INTO manufacturer (manufacturer_name) VALUES (:manufacturer_name)";
        $param = [":manufacturer_name"=>$this->manufacturerName];
        $dbCon->insertData($query, $param);
        $dbCon->disconnect();
    }

    public function getAllManufacturer(){
        $dbCon = new MySQLUtils();
        $query = "select * from manufacturer";
        $data = $dbCon->getData($query);
        $dbCon->disconnect();
        return $data;
    }

    public function getManufacturerById(){
        $dbCon = new MySQLUtils();
        $query = "select * from manufacturer where manufacturer_id = :id";
        $param = [":id"=>$this->manufacturerID];
        $data = $dbCon->getData($query, $param);
        $dbCon->disconnect();
        return $data;
    }
}
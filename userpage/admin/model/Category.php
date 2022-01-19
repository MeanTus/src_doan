<?php
include_once '../utils/MySQLUtils.php';

class Category{
    private int $categoryID;
    private string $categoryName;

    public function __construct($categoryId = 0, $categoryName)
    {
        $this->categoryID = $categoryId;
        $this->categoryName = $categoryName;
    }

    public function getCategoryId(){
        return $this->categoryID;
    }

    public function setCategoryID($categoryId){
        $this->categoryID = $categoryId;
    }

    public function getCategoryName(){
        return $this->categoryName;
    }

    public function setCategoryName($categoryName){
        $this->categoryName = $categoryName;
    }

    public function insertCategory(){
        $dbCon = new MySQLUtils();
        $query = "INSERT INTO category (category_name) VALUES (:category_name)";
        $param = [":category_name"=>$this->categoryName];
        $dbCon->insertData($query, $param);
        $dbCon->disconnect();
    }

    public function getAllCategory(){
        $dbCon = new MySQLUtils();
        $query = "select * from category";
        $data = $dbCon->getData($query);
        $dbCon->disconnect();
        return $data;
    }

    public function getCategoryById(){
        $dbCon = new MySQLUtils();
        $query = "select * from category where category_id = :id";
        $param = [":id"=>$this->categoryID];
        $data = $dbCon->getData($query, $param);
        $dbCon->disconnect();
        return $data;
    }
    public function getCategoryByName(){
        $dbCon = new MySQLUtils();
        $query = "select * from category where category_name = :name";
        $param = [":name"=>$this->categoryName];
        $data = $dbCon->getData($query, $param);
        $dbCon->disconnect();
        return $data;
    }

    public function updateCategory(){
        $dbCon = new MySQLUtils();
        $query = "UPDATE category set category_name = :category_name where category_id = :id";
        $param = [
            "category_name"=>$this->categoryName,
            ":id"=>$this->categoryID
        ];
        $count = $dbCon->updateData($query, $param);
        $dbCon->disconnect();
        return $count;
    }

    public function deleteCategory(){
        $dbCon = new MySQLUtils();
        $query = "DELETE from category where category_id = :id";
        $param = [":id"=>$this->getCategoryId()];
        return $dbCon->deleteData($query, $param);
    }
}
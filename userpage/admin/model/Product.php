<?php
include_once '../utils/MySQLUtils.php';

class Product{
    private int $productId;
    private string $productName;
    private string $productDesc;
    private $priceCurrent;
    private string $img;
    private int $amount;
    private float $priceSale;
    private string $category;
    private int $manufacturer;

    public function __construct($productName, $productDesc, $priceCurrent, $img, $amount, $priceSale, $category, $manufacturer, $productId = 0)
    {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->productDesc = $productDesc;
        $this->priceCurrent = $priceCurrent;
        $this->img = $img;
        $this->amount = $amount;
        $this->priceSale = $priceSale;
        $this->category = $category;
        $this->manufacturer = $manufacturer;
    }

    public function getProductId(){
        return $this->productId;
    }

    public function setProductId($productId){
        $this->productId = $productId;
    }

    public function getProductName(){
        return $this->productName;
    }

    public function setProductName($productName){
        $this->productName = $productName;
    }

    public function getProductDesc(){
        return $this->productDesc;
    }

    public function setProductDesc($productDesc){
        $this->productDesc = $productDesc;
    }

    public function getPriceCurrent(){
        return $this->priceCurrent;
    }

    public function setPriceCurrent($priceCurrent){
        $this->priceCurrent = $priceCurrent;
    }

    public function getImg(){
        return $this->img;
    }

    public function setImg($img){
        $this->img = $img;
    }

    public function getAmount(){
        return $this->amount;
    }

    public function setAmount($amount){
        $this->amount = $amount;
    }

    public function getPriceSale(){
        return $this->priceSale;
    }

    public function setPriceSale($priceSale){
        $this->priceSale = $priceSale;
    }

    public function getCategory(){
        return $this->category;
    }

    public function setCategory($category){
        $this->category = $category;
    }

    public function getManufacturer(){
        return $this->manufacturer;
    }

    public function setManufacturer($manufacturer){
        $this->manufacturer = $manufacturer;
    }

    public function insertProduct(){
        $dbCon = new MySQLUtils();
        $query = "INSERT INTO product (product_name, product_desc, price_current, img, amount, price_sale, category_id, manufacturer_id) 
        VALUES (:product_name, :product_desc, :price_current, :img, :amount, :price_sale, :category_id, :manufacturer_id)";
        $param = [
            ":product_name"=>$this->productName,
            ":product_desc"=>$this->productDesc,
            ":price_current"=>$this->priceCurrent,
            ":img"=>$this->img,
            ":amount"=>$this->amount,
            ":price_sale"=>$this->priceSale,
            ":category_id"=>$this->category,
            ":manufacturer_id"=>$this->manufacturer,
        ];
        $dbCon->insertData($query, $param);
        $dbCon->disconnect();
    }

    public function getAllProduct(){
        $dbCon = new MySQLUtils();
        $query = "select * from product";
        $data = $dbCon->getData($query);
        $dbCon->disconnect();
        return $data;
    }

    public function getProductById(){
        $dbCon = new MySQLUtils();
        $query = "select * from product where product_id = :id";
        $param = [":id"=>$this->productId];
        $data = $dbCon->getData($query, $param);
        $dbCon->disconnect();
        return $data;
    }

    public function updateProduct(){
        $dbCon = new MySQLUtils();
        $query = "UPDATE product set 
        product_name = :product_name,
        product_desc = :product_desc,
        price_current = :price_current,
        img = :img,
        amount = :amount,
        price_sale = :price_sale,
        category_id = :category_id,
        manufacturer_id = :manufacturer_id
        where product_id = :id";
        $param = [
            ":product_name"=>$this->productName,
            ":product_desc"=>$this->productDesc,
            ":price_current"=>$this->priceCurrent,
            ":img"=>$this->img,
            ":amount"=>$this->amount,
            ":price_sale"=>$this->priceSale,
            ":category_id"=>$this->category,
            ":manufacturer_id"=>$this->manufacturer,
            ":id"=>$this->productId
        ];
        $count = $dbCon->updateData($query, $param);
        $dbCon->disconnect();
        return $count;
    }

    public function updateAmountProduct($amount){
        $dbCon = new MySQLUtils();
        $query = 'UPDATE product set amount = :amount where product_id = :id';
        $param = [":amount"=>$amount, ":id"=>$this->productId];
        $count = $dbCon->updateData($query, $param);
        $dbCon->disconnect();
        return $count;
    }

    public function deleteProduct(){
        $dbCon = new MySQLUtils();
        $query = "delete from product where product_id = :id";
        $param = [":id"=>$this->productId];
        $count = $dbCon->getData($query, $param);
        $dbCon->disconnect();
        return $count;
    }
}
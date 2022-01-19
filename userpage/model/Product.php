<?php
include_once '../utils/MySQLUtils.php';
include_once '../config.php';

class Product{
    // Tổng số trang để hiển thị sản phẩm
    protected $numPage;

    private int $productId;
    private string $productName;
    private string $productDesc;
    private float $priceCurrent;
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

    public function getNumPage(){
        return $this->numPage;
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

    public function getProductLimit($page = 1){
        $dbCon = new MySQLUtils();
        $page_size = PAGE_SIZE;
        $start = ($page - 1) * $page_size;

        // Lấy tổng số sản phẩm để xem có bao nhiêu trang
        $sql = "SELECT COUNT(*) as dem FROM product";
        $count = $dbCon->getData($sql);
        $n = $count[0]['dem'];
        $this->numPage = ceil($n / $page_size);

        $query = "select * from `product` limit :start, :page_size";
        $param = [':start'=>$start, ':page_size'=>$page_size];
        $data = $dbCon->getData($query, $param);
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

    public function getProductByKw($kw, $page){
        $dbCon = new MySQLUtils();
        $page_size = PAGE_SIZE;
        $start = ($page - 1) * $page_size;

        // Lấy tổng số sản phẩm để xem có bao nhiêu trang
        $sql = "SELECT COUNT(*) as dem FROM product where product_name like ?";
        $param1 = ["%$kw%"];
        $count = $dbCon->getData($sql, $param1);
        $n = $count[0]['dem'];
        $this->numPage = ceil($n / $page_size);

        $query = "select * from product where product_name like ? limit ?, ?";
        $param = ["%$kw%", $start, $page_size];
        $data = $dbCon->getData($query, $param);
        $dbCon->disconnect();
        return $data;
    }
    public function getProductByKwAndCate($kw, $idCate, $page){
        $dbCon = new MySQLUtils();
        $page_size = PAGE_SIZE;
        $start = ($page - 1) * $page_size;

        // Lấy tổng số sản phẩm để xem có bao nhiêu trang
        $sql = "SELECT COUNT(*) as dem FROM product where product_name like ? and category_id = ?";
        $param1 = ["%$kw%", $idCate];
        $count = $dbCon->getData($sql, $param1);
        $n = $count[0]['dem'];
        $this->numPage = ceil($n / $page_size);

        $query = "select * from product where product_name like ? and category_id = ? limit ?, ?";
        $param = ["%$kw%", $idCate, $start, $page_size];
        $data = $dbCon->getData($query, $param);
        $dbCon->disconnect();
        return $data;
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
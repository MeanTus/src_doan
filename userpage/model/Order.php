<?php
include_once '../utils/MySQLUtils.php';

class Order{
    private $receiver;
    private $address;
    private $phoneNumber;
    private $totalPrice;
    private $paymentMethods;
    private $status;
    private $userId;

    public function __construct($receiver, $address, $phoneNumber, $totalPrice, $paymentMethods, $status, $userId)
    {
        $this->receiver = $receiver;
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
        $this->totalPrice = $totalPrice;
        $this->paymentMethods = $paymentMethods;
        $this->status = $status;
        $this->userId = $userId;
    }

    public function getReceiver(){
        return $this->receiver;
    }

    public function setReceiver($receiver){
        $this->receiver = $receiver;
    }

    public function getAddress(){
        return $this->address;
    }

    public function setAddress($address){
        $this->address = $address;
    }

    public function getPhoneNumber(){
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber){
        $this->phoneNumber = $phoneNumber;
    }

    public function getTotalPrice(){
        return $this->totalPrice;
    }

    public function setTotalPrice($totalPrice){
        $this->totalPrice = $totalPrice;
    }

    public function getPaymentMethods(){
        return $this->paymentMethods;
    }

    public function setPaymentMethods($paymentMethods){
        $this->paymentMethods = $paymentMethods;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function getUserId(){
        return $this->userId;
    }

    public function setUserId($userId){
        $this->userId = $userId;
    }

    public function insertOrder(){
        $dbCon = new MySQLUtils();
        $query = "insert into my_order (receiver, address, phone_number, totalPrice, payment_methods, order_status, user_id) 
        values (:receiver, :address, :phone_number, :totalPrice, :payment_methods, :order_status, :user_id)";
        $param = [
            ":receiver"=>$this->getReceiver(),
            ":address"=>$this->getAddress(), 
            ":phone_number"=>$this->getPhoneNumber(), 
            ":totalPrice"=>$this->getTotalPrice(), 
            ":payment_methods"=>$this->getPaymentMethods(),
            ":order_status"=>$this->getStatus(),
            ":user_id"=>$this->getUserId()
        ];
        $dbCon->insertData($query, $param);
        $dbCon->disconnect();
    }

    public function insertOrderDetail($order_id, $product_id, $current_price, $quality){
        $dbCon = new MySQLUtils();
        $query = "insert into order_detail (order_id, product_id, current_price, quality)
                values (:order_id, :product_id, :current_price, :quality)";
        $param = [
            ":order_id"=>$order_id, 
            ":product_id"=>$product_id,
            ":current_price"=>$current_price, 
            ":quality"=>$quality
        ];
        $dbCon->insertData($query, $param);
        $dbCon->disconnect();
    }

    public function getNewOrder(){
        $dbCon = new MySQLUtils();
        $query = "SELECT order_id FROM `my_order` WHERE user_id = :user_id order by order_id desc limit 1";
        $param = [":user_id"=>$this->getUserId()];
        $data = $dbCon->getData($query, $param);
        $dbCon->disconnect();
        return $data;
    }

    public function getOrderByUserId(){
        $dbCon = new MySQLUtils();
        $query = "SELECT * from my_order where user_id = :user_id";
        $param = [":user_id"=>$this->getUserId()];
        $data = $dbCon->getData($query, $param);
        $dbCon->disconnect();
        return $data;
    }

    public function getDetailOrderById($order_id){
        $dbCon = new MySQLUtils();
        $query = "SELECT od.quality, pro.product_id, pro.img, pro.price_current, pro.product_name from order_detail as od inner join product as pro where od.product_id = pro.product_id and od.order_id = :order_id";
        $param = [":order_id"=>$order_id];
        $data = $dbCon->getData($query, $param);
        $dbCon->disconnect();
        return $data;
    }

    public function cancelOrder($order_id){
        $dbCon = new MySQLUtils();
        $query = "UPDATE my_order SET order_status = 3 where order_id = :order_id";
        $param = [":order_id"=>$order_id];
        $data = $dbCon->updateData($query, $param);
        $dbCon->disconnect();
        return $data;
    }
}
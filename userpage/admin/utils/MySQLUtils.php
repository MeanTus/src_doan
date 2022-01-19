<?php
include '../config.php';
class MySQLUtils{
    private $host;
    private $dbName;
    private $userName;
    private $password;

    // Biến để xác định đã có connect được tạo chưa
    private static $conn;
    public function getConn(){
        return self::$conn;
    }

    public function __construct()
    {
        $this->host = HOST;
        $this->dbName = DB;
        $this->userName = USER_NAME;
        $this->password = PW;

        if(self::$conn == null){
            $this->connectDB();
        }else{
            return self::$conn;
        }
    }

    public function __destruct()
    {
        $this->host = "";
        $this->dbName = "";
        $this->userName = "";
        $this->password = "";
        self::$conn = null;
    }

    public function connectDB(){
        try {
            self::$conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->userName, $this->password);
            // set the PDO error mode to exception
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function disconnect(){
        self::$conn = null;
    }

    public function insertData($query, $param = []){
        $stm = self::$conn->prepare($query);
        $stm->execute($param);
    }

    public function getData($query, $param = []){
        $stm = self::$conn->prepare($query);
        $stm->execute($param);
        $data = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function updateData($query, $param = []){
        $stm = self::$conn->prepare($query);
        $stm->execute($param);
        return $stm->rowCount();
    }

    public function deleteData($query, $param = []){
        $stm = self::$conn->prepare($query);
        $stm->execute($param);
        return $stm->rowCount();
    }
}
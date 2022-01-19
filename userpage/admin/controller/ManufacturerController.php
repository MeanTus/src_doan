<?php
include_once './BaseController.php';
include '../utils/ValidateData.php';
include '../utils/MySQLUtils.php';
include '../model/Manufacturer.php';

class ManufacturerController extends BaseController{
    public function getManufacturerById($manufacturer){
        return $manufacturer->getManufacturerById();
    }

    public function getAllManufacturer($manufacturer){
        return $manufacturer->getAllManufacturer();
    }

    public function deleteManufacturer($manufacturer){
        return $manufacturer->deleteManufacturer();
    }

    public function productPage(){
        $manufacturer = new Product("", "", 0, "", 0, 0, 0);
        $data['list'] = $manufacturer->getAllProduct($manufacturer);
        $this->view("products", $data);
    }
}
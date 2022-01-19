<?php
include_once './BaseController.php';
include_once '../utils/ValidateData.php';
include_once '../model/Product.php';
include_once '../model/Category.php';

class ProductController extends BaseController{
    public function shopPage(){
        $data['currentPage'] = 1;
        if(isset($_GET['page'])){
            $data['currentPage'] = (int)$_GET['page'];
        }
        
        $product = new Product("","",0,"",0,0,0,0);
        $data['product'] = $product->getProductLimit($data['currentPage']);
        $data['numPage'] = $product->getNumPage();
        
        $category = new Category(0, "");
        $data['cate'] = $category->getAllCategory();

        $this->view('shop', $data);
    }

    public function search($idCate, $keyword){
        $data['currentPage'] = 1;
        if(isset($_GET['page'])){
            $data['currentPage'] = (int)$_GET['page'];
        }
        $category = new Category(0, "");
        $data['cate'] = $category->getAllCategory();

        $product = new Product("", "", 0, "", 0, 0, 0, 0, 0);
        $data['numPage'] = $product->getNumPage();

        if($idCate == 0){
            $data['product'] = $product->getProductByKw($keyword, $data['currentPage']);
        } else {
            $data['product'] = $product->getProductByKwAndCate($keyword, $idCate, $data['currentPage']);
        }
        $this->view('shop', $data);
    }
}

$pro_controller = new ProductController();
$action = "";
if(isset($_GET['action'])){
    $action = $_GET['action'];
}

switch ($action) {
    case 'search':
        $idCate = $_GET['select'];
        $keyword = trim($_GET['txt_search']);
        $pro_controller->search($idCate, $keyword);
        break;
    
    default:
        $pro_controller->shopPage();
        break;
}
?>
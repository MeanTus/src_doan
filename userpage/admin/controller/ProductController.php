<?php
    include_once './BaseController.php';
    include_once '../utils/ValidateData.php';
    include_once '../utils/MySQLUtils.php';
    include_once '../model/Product.php';

    class ProductController extends BaseController{
        public function insertProduct($product){
            $product->insertProduct();
        }

        public function getProductById($product){
            return $product->getProductById();
        }

        public function getAllProduct($product){
            return $product->getAllProduct();
        }

        public function updateProduct($product){
            return $product->updateProduct();
        }

        public function deleteProduct($product){
            return $product->deleteProduct();
        }

        public function productPage(){
            $product = new Product("", "", 0, "",0, 0, 0, 0);
            $data['list'] = $product->getAllProduct($product);
            $this->view("products", $data);
        }
    }

    $product_action = "";
    $productController = new ProductController();
    if(count($_POST) > 0){
        $product_action = $_POST['grp_btn_product'];
    }

    if(count($_GET) > 0){
        $action = $_GET['action'];
        $id = $_GET['id'];

        if($action == 'delete'){
            $deletePro = new Product("", "", 0, "", 0, 0,0,0, $id);

            // Lấy product muốn xóa
            $productDelete = $productController->getProductById($deletePro);
            $count = $productController->deleteProduct($deletePro);
            if($count > 0){
                unlink('../../view'. ltrim($productDelete[0]['img'], '.'));
                echo '<script>
                        alert("Xóa thành công");
                    </script>';
                header("Location: ProductController.php");
            }
            else{
                echo '<script>
                        alert("Xóa không thành công");
                    </script>';
                header("Location: ProductController.php");
            }
        }
    }

    switch ($product_action) {
        case 'add':
            $product_name = trim($_POST['txt_name_pro']);
            $product_desc = trim($_POST['txt_desc_pro']);
            $product_amount = (int)$_POST['txt_amount'];
            $product_price_cur = (float)$_POST['txt_price_current'];
            $product_price_sale = (float)$_POST['txt_price_sale'];
            $product_manu = $_POST['cbx_manu'];
            $product_cate = $_POST['cbx_category'];
            $product_img = $_FILES['prod_img'];
            $error = checkProduct($product_img, $product_name, $product_desc, $product_amount, $product_price_cur, $product_price_sale, $product_manu, $product_cate);
            if(!empty($error)){
                echo '<script>
                    alert("'.$error.'");
                    window.history.back();
                </script>';
            }else{
                $temp = $product_img['tmp_name'];
                $name = $product_img['name'];

                $target_dir = '../../view/assets/img/product/';
                $target_file = $target_dir . basename($product_img["name"]);
                move_uploaded_file($temp, $target_file);
                $image = './assets/img/product/' . $name;

                $newPro = new Product($product_name, $product_desc, $product_price_cur, $image, $product_amount, $product_price_sale, $product_cate, $product_manu);
                $productController->insertProduct($newPro);

                echo '<script>
                    alert("Thêm sản phẩm thành công");
                    window.history.back();
                </script>';
            }
            break;

        case 'edit':
            $proId = $_POST['txt_id'];
            $newName = trim($_POST['txt_name']);
            $newDesc = trim($_POST['txt_desc']);
            $newAmount = (int)$_POST['txt_amount'];
            $newPrice = (float)$_POST['txt_price'];
            $newDiscount = (float)$_POST['txt_discount'];
            $newManu = (int)$_POST['cbx_manu'];
            $newCate = (int)$_POST['cbx_cate'];
            $newImg = $_FILES['prod_img'];

            $err = checkProductUpdate($newName, $newDesc, $newAmount, $newPrice, $newDiscount);
            if(empty($err)){
                // Trường hợp không update hình ảnh
                if($newImg['name'] == ""){
                    $clonePro = new Product("", "", 0, "", 0,0,0,0,$proId);
                    $oldPro = $productController->getProductById($clonePro);
                    $oldImg = $oldPro[0]['img'];
                    $updatePro = new Product($newName, $newDesc, $newPrice, $oldImg, $newAmount, $newDiscount, $newCate, $newManu, $proId);
                    $count = $productController->updateProduct($updatePro);

                    if($count > 0){
                        echo '<script>
                                alert("Chỉnh sửa sản phẩm thành công");
                                window.history.back();
                            </script>';
                    }else{
                        echo '<script>
                                alert("Chỉnh sửa sản phẩm thất bại");
                                window.history.back();
                            </script>';
                    }
                }
                // Trường hợp có hình ảnh
                else{
                    // Lấy link img cũ để xóa hình cũ
                    $clonePro = new Product("", "", 0, "", 0,0,0,0,$proId);
                    $oldPro = $productController->getProductById($clonePro);
                    $oldImg = $oldPro[0]['img'];
                    unlink('../../view'. ltrim($oldImg, '.'));

                    $temp = $newImg['tmp_name'];
                    $name = $newImg['name'];

                    $target_dir = '../../view/assets/img/product/';
                    $target_file = $target_dir . basename($newImg["name"]);
                    move_uploaded_file($temp, $target_file);
                    $image = './assets/img/product/' . $name;

                    $updatePro = new Product($newName, $newDesc, $newPrice, $image, $newAmount, $newDiscount, $newCate, $newManu, $proId);
                    $count = $productController->updateProduct($updatePro);

                    if($count > 0){
                        echo '<script>
                                alert("Chỉnh sửa sản phẩm thành công");
                                window.history.back();
                            </script>';
                    }else{
                        echo '<script>
                                alert("Chỉnh sửa sản phẩm thất bại");
                                window.history.back();
                            </script>';
                    }
                }
            }else{
                echo '<script>
                    alert("'.$err.'");
                    window.history.back();
                </script>';
            }
            break;

        default:
            $productController->productPage();
            break;
    }
?>
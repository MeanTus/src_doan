<?php
    include_once './BaseController.php';
    include '../utils/ValidateData.php';
    include '../utils/MySQLUtils.php';
    include '../model/Category.php';

    class CategoryController extends BaseController{
        public function insertCate($category){
            $category->insertCategory();
        }

        public function getCategoryById($category){
            return $category->getCategoryById();
        }

        public function getCategoryByName($category){
            return $category->getCategoryByName();
        }

        public function getAllCategory($category){
            return $category->getAllCategory();
        }

        public function deleteCategory($category){
            return $category->deleteCategory();
        }

        public function updateCategory($category){
            return $category->updateCategory();
        }

        public function categoryPage(){
            $category = new Category(0,"");
            $data['list'] = $category->getAllCategory($category);
            $this->view("category", $data);
        }
    }

    $category_action = "";
    $categoryController = new CategoryController();
    if(count($_POST) > 0){
        $category_action = $_POST['grp_btn_category'];
    }

    if(count($_GET) > 0){
        $action = $_GET['action'];
        if(!empty($_GET['id'])){
            if($action == 'delete'){
                $id = $_GET['id'];
                $cate = new Category($id, "");
                $count = $categoryController->deleteCategory($cate);
                if($count > 0){
                    echo '<script>
                            alert("Xóa thành công");
                        </script>';
                    header("Location: CategoryController.php");
                }
                else{
                    echo '<script>
                            alert("Xóa không thành công");
                        </script>';
                    header("Location: CategoryController.php");
                }
            }
        }
    }
    switch ($category_action) {
        case 'add':
            $category_name = trim($_POST['txt_category_name']);
            if(!empty($category_name)){
                $newCate = new Category(0, $category_name);
                $existCate = $categoryController->getCategoryByName($newCate);

                if(count($existCate) == 0){
                    $categoryController->insertCate($newCate);
                    echo '<script>
                            alert("Thêm danh mục mới thành công!!");
                        </script>';
                    header("Location: CategoryController.php");
                }else{
                    echo '<script>
                        alert("Danh mục đã tồn tại!!");
                        window.history.back();
                    </script>';
                }
            }else{
                echo '<script>
                        alert("Chưa nhập danh mục!!");
                        window.history.back();
                    </script>';
            }
            break;

        case 'edit':
            $category_id = (int)trim($_POST['txt_category_id']);
            $category_name = trim($_POST['txt_category_name']);

            $newCate = new Category($category_id, $category_name);
            $existCate = $categoryController->getCategoryByName($newCate);

            if(count($existCate) == 0){
                $count = $categoryController->updateCategory($newCate);
                if($count > 0){
                    echo '<script>
                            alert("Chỉnh sửa thành công!!");
                        </script>';
                    header("Location: CategoryController.php");
                }else{
                    echo '<script>
                            alert("Chỉnh sửa thất bại!!");
                            window.history.back();
                        </script>';
                }
            }else{
                echo '<script>
                        alert("Danh mục đã tồn tại!!");
                        window.history.back();
                    </script>';
            }
            break;
        default:
            $categoryController->categoryPage();
            break;
    }
?>
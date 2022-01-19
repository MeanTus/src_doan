<?php
    include_once './BaseController.php';
    include '../utils/ValidateData.php';
    include '../utils/MySQLUtils.php';
    include '../model/User.php';
    if(!isset($_SESSION)) session_start();
    class UserController extends BaseController{
        public function getUserByEmail($user){
            return $user->getUserByEmail();
        }

        public function getAllUser($user){
            return $user->getAllUser();
        }

        public function blockUser($user){
            return $user->blockUser();
        }

        public function userPage(){
            $user = new User("", "", "", 1, 1);
            $data['list'] = $user->getAllUser($user);
            $this->view("users", $data);
        }
    }

    $action = "";
    if(count($_POST) > 0){
        $action = $_POST['btn_user_action'];
    }
    $user_controller = new UserController();

    if(count($_GET) > 0){
        if(isset($_GET['action'])){
            if($_GET['action'] == 'block'){
                $email = $_GET['email'];
                $user = new User("", $email, "", 1, 0);
                $count = $user_controller->blockUser($user);
                if($count > 0){
                    echo '<script>
                            alert("Khóa thành công");
                        </script>';
                        header("Location: UserController.php");
                }
                else{
                    echo '<script>
                            alert("Khóa không thành công");
                        </script>';
                    header("Location: UserController.php");
                }
            } 
        }
        if(isset($_GET['add'])){
            $email = $_GET['txt_email'];
            $username = $_GET['txt_username'];
            $password = $_GET['txt_pass'];
            $role = 0;
            $sex = $_GET['rad_gender'];
            if($sex = "male"){
                $user = new User($username, $email, md5($password), 0, 0);
            }else{
                $user = new User($username, $email, md5($password), 1, 0);
            }
            $count = $user->insertUser();
            if($count > 0){
                echo '<script>
                        alert("Xóa thành công");
                    </script>';
                    header("Location: UserController.php");
            }
            else{
                echo '<script>
                        alert("Xóa không thành công");
                    </script>';
                header("Location: UserController.php");
            }
        }
    }

    switch($action){
        case 'login':
            $email = $_POST["email"];
            $password = md5($_POST["password"]);

            if(checkEmail($email)){
                $loginUser = new User("", $email, $password, 0);
                $user = $user_controller->getUserByEmail($loginUser);

                if(sizeof($user) == 0){
                    //header("Location: ../view/login.php");
                    echo '<script>
                            alert("Sai email!!");
                            window.history.back();
                        </script>';
                }else{
                    if($user[0]['password'] == $password){
                        if($user[0]['role'] == 1){
                            $_SESSION["adminname"] = $user[0]['username'];
                            header("Location: ./UserController.php");
                        }else{
                            echo '<script>
                                alert("Không phải admin");
                                window.history.back();
                            </script>';
                        }
                    }else{
                        // header("Location: ../view/login.php");
                        echo '<script>
                                alert("Sai mật khẩu");
                                window.history.back();
                            </script>';
                    }
                }
            }else{
                //header("Location: ../view/login.php");
                echo '<script>
                        alert("Bạn nhập không phải email");
                        window.history.back();
                    </script>';
            }
            break;
        default:
            $user_controller->userPage();
            break;
    }
?>
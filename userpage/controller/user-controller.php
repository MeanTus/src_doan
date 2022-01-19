<?php
    include '../utils/ValidateData.php';
    include '../utils/MySQLUtils.php';
    include '../model/User.php';
    include '../PHPMailer/class.smtp.php';
    include "../PHPMailer/class.phpmailer.php";
    if(!isset($_SESSION)) session_start();

    class UserController{
        public function insertUser($user){
            $user->insertUser();
        }

        public function getUserByEmail($user){
            return $user->getUserByEmail();
        }

        public function deleteUser($user){
            $user->deleteUser();
        }

        public function updateUser($user){
            $user->updateUser();
        }
    }

    if($_POST > 0){
        $grp_user_controller = $_POST['grp_user_controller'];
        $userControl = new UserController();
        switch ($grp_user_controller) {
            case 'user_login':
                $email = trim($_POST["email"]);
                $password = md5(trim($_POST["password"]));

                if(checkEmail($email)){
                    $loginUser = new User("", $email, $password, 0, 0);
                    $user = $userControl->getUserByEmail($loginUser);

                    if(sizeof($user) == 0){
                         //header("Location: ../view/login.php");
                         echo '<script>
                                alert("Sai email!!");
                                window.history.back();
                            </script>';
                    }else{
                        if($user[0]['password'] == $password){
                            if($user[0]['user_status'] == 1){
                                echo '<script>
                                        alert("Tài khoản của bạn đã bị khóa!!");
                                        window.history.back();
                                    </script>';
                            } else {
                                $_SESSION["userId"] = $user[0]['user_id'];
                                $_SESSION["username"] = $user[0]['username'];
                                $_SESSION["email"] = $user[0]['email'];
                                $_SESSION["pw"] = $user[0]['password'];
                                $_SESSION["sex"] = $user[0]['sex'];
                                header("Location: ../view/home.php");
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

            case 'user_register':
                $txtUsername = trim($_POST['txtUsername']);
                $txtEmail = trim($_POST['txtEmail']);
                $txtPassword = trim($_POST['txtPassword']);
                $radGender = $_POST['radGender'];

                if(empty($txtUsername)){
                    echo '<script>
                            alert("Bạn chưa nhập username");
                            window.history.back();
                        </script>';
                }else if(empty($txtEmail)){
                    echo '<script>
                            alert("Bạn chưa nhập email");
                            window.history.back();
                        </script>';
                } else if(empty($txtPassword)){
                    echo '<script>
                            alert("Bạn chưa nhập password");
                            window.history.back();
                        </script>';
                }else{
                    if(checkEmail($txtEmail)){
                        $md5Password = md5($txtPassword);
                        $sex = $radGender == "Nam" ? true : false;
                        $newUser = new User($txtUsername, $txtEmail, $md5Password, $sex);
                        $data = $userControl->getUserByEmail($newUser);

                        if($data == null){
                            if(checkLengthPw($txtPassword)){
                                $userControl->insertUser($newUser);

                                echo '<script>
                                        alert("Đăng ký thành công!");
                                        window.history.back();
                                    </script>';
                            }else{
                                echo '<script>
                                        alert("Mật khẩu phải có ít nhất 8 ký tự!!");
                                        window.history.back();
                                    </script>';
                            }
                        }
                        else{
                            echo '<script>
                                    alert("Email này đã được sử dụng");
                                    window.history.back();
                                </script>';
                        }
                    }else {
                        echo '<script>
                            alert("Bạn nhập không phải email");
                            window.history.back();
                        </script>';
                    }
                }
                break;

                case 'update_pass':
                    $txtEmail = trim($_POST['txt_email']);
                    $pass_old = trim($_POST['old_password']);
                    $pass_new = trim($_POST['new_password']);
                    $pass_new_agian = trim($_POST['new_password_agian']);
                    $dbCon = new MySQLUtils();
                    $query = "select * from user where email = :email";
                    $param = [
                        ":email"=> $txtEmail
                    ];
                    $user = $dbCon->getData($query, $param);
                    // $dbCon->disconnect();
                    if(empty($pass_old)){
                        echo '<script>
                        alert("Bạn chưa nhập mật khẩu cũ!!");
                        window.history.back();
                    </script>';
                    }
                    else if(empty($pass_new)){
                        echo '<script>
                                alert("Bạn chưa nhập mật khẩu mới!!");
                                window.history.back();
                            </script>';
                    }
                    else if(empty($pass_new_agian)){
                        echo '<script>
                                alert("Bạn chưa nhập lại mật khẩu mới!!");
                                window.history.back();
                            </script>';
                    }
                    else{
                        if($user){
                            foreach($user as $u){
                                if($pass_old == $pass_new){
                                    echo '<script>
                                            alert("Mật khẩu mới phải khác mật khẩu cũ!!");
                                            window.history.back();
                                            </script>';
                                }
                                if(md5($pass_old) == $u['password']){
                                    if($pass_new == $pass_new_agian){
                                        if(checkLengthPw($pass_new)){
                                            $sql = "UPDATE user SET password = md5(:password) WHERE email = :email";
                                            $par = [
                                                ":password"  => $pass_new,  
                                                ":email"=> $txtEmail, 
                                            ];
                                            if ($dbCon->updateData($sql, $par) == TRUE) {
                                                echo '<script>
                                                alert("Cập nhật mật khẩu thành công!!");
                                                window.location.replace("../view/my-account.php");
                                                </script>';
                                            }
                                            else{
                                                echo '<script>
                                                alert("Thất bại!!");
                                                window.history.back();
                                                </script>';
                                            }
                                        }
                                    }
                                    else{
                                        echo '<script>
                                            alert("Mật khẩu mới phải trùng nhau!!");
                                            window.history.back();
                                            </script>';
                                    }
                                }
                                else{
                                    echo '<script>
                                            alert("Mật khẩu cũ không đúng!!");
                                            window.history.back();
                                            </script>';
                                }
                            }
                        }
                        else{
                            echo '<script>
                            alert("Thất bại!!");
                            window.history.back();
                        </script>';
                        }
                    }
                    break;
                    

            case 'lost_pass':
                $txtEmail = trim($_POST['mail_to']);
                $_SESSION["email"] =  $txtEmail;
                $loginUser = new User("", $txtEmail, "", 0, 0);
                $user = $userControl->getUserByEmail($loginUser);

                // random OTP
                if(!empty($user)){
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $randomString = '';
                    for ($i = 0; $i < 5; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    $dbCon = new MySQLUtils();
                    $query = "UPDATE user set otp = :otp where email = :email";
                    $param = [
                        ":otp"  => $randomString,  
                        ":email"=> $txtEmail, 
                    ];
                    if ($dbCon->updateData($query, $param) == TRUE) {
                        $mail             = new PHPMailer();
                        $mail->IsSMTP();             
                        $mail->CharSet  = "utf-8";
                        $mail->SMTPDebug  = 0;
                        $mail->SMTPAuth   = true;
                        $mail->SMTPSecure = "tls";
                        $mail->Host       = "smtp.gmail.com";
                        $mail->Port       = 587;
                        $mail->Username   = "phammanh2508@gmail.com"; 
                        $mail->Password   = "twlmxdysgaxabsqe";
                        $mail->SetFrom("phammanh2508@gmail.com", "phammanh2508@gmail.com");
                        $mail->AddReplyTo('phammanh2508@gmail.com', 'Mạnh');
                        $mail->Subject    = 'Xác nhận thông tin quên mật khẩu';
                        $mail->MsgHTML('Mã OTP của bạn là: '. $randomString);
                        $mail->AddAddress("$txtEmail", "$txtEmail");
                        if(!$mail->Send()) {
                            echo '<script>
                            alert("Có lỗi khi gửi mail vui lòng thử lại!!");
                            window.history.back();
                        </script>';  
                        } else {
                            header("Location: ../view/OTP.php");
                        }
                    }
                }
                else{
                    echo '<script>
                    alert("Email chưa đc đăng ký!!");
                    window.history.back();
                </script>';
                }
                break;

            case 'otp':
                $txtEmail = trim($_POST['mail_to']);
                $otp = trim($_POST['otp']);
                $dbCon = new MySQLUtils();
                $query = "select * from user where email = :email and otp = :otp";
                $param = [
                    ":email"=> $txtEmail,
                    ":otp"  => $otp
                ];
                $user = $dbCon->getData($query, $param);
                $dbCon->disconnect();
                if($user){
                    header("Location: ../view/UpdatePass.php");
                }
                else{
                    echo '<script>
                    alert("Mã OTP của bạn không đúng!!");
                    window.history.back();
                </script>';
                }
                break;

            case 'updatePass':
                $txtEmail = trim($_POST['mail_to']);
                $pass1 = trim($_POST['pas']);
                $pass2 = trim($_POST['pass']);
                if($pass1 != $pass2){
                    echo '<script>
                    alert("Mật khẩu của bạn phải trùng nhau!!");
                    window.history.back();
                </script>';
                }else{
                    if(checkLengthPw($pass1)){
                        $dbCon = new MySQLUtils();
                        $query = "UPDATE user SET password = md5(:password) WHERE email = :email";
                        $param = [
                            ":password"  => $pass1,  
                            ":email"     => $txtEmail, 
                        ];
                        if ($dbCon->updateData($query, $param) == TRUE) {
                            echo '<script>
                            alert("Đổi mật khẩu thành công vui lòng đăng nhập lại!!");
                            window.location.replace("../view/login.php");
                        </script>';
                        }
                        else{
                            echo '<script>
                            alert("Thất bại!!");
                            window.history.back();
                        </script>';
                        }
                    }
                }
                break;
            default:
                # code...
                break;
        }
    }
?>
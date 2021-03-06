<?php
include_once '../model/Product.php';
include_once './BaseController.php';
include_once '../utils/ValidateData.php';
include_once '../model/Order.php';
include '../PHPMailer/class.smtp.php';
include "../PHPMailer/class.phpmailer.php";
class OrderController extends BaseController{
    public function getProductById($product){
        return $product->getProductById();
    }

    public function insertOrder($order){
        $order->insertOrder();
    }

    public function getNewOrder($order){
        return $order->getNewOrder();
    }

    public function getDetailOrderById($order, $order_id){
        return $order->getDetailOrderById($order_id);
    }

    public function cancelOrder($order, $order_id){
        return $order->cancelOrder($order_id);
    }

    public function insertOrderDetail($order, $order_id, $product_id, $current_price, $quality){
        $order->insertOrderDetail($order_id, $product_id, $current_price, $quality);
    }
}

$orderController = new OrderController();

session_start();
$order_action = "";
if(count($_POST) > 0){
    $order_action = $_POST['order_action'];
} elseif (isset($_GET['action'])){
    $order_action = $_GET['action'];
    if(isset($_GET['delete']) && $_GET['delete'] == 'true'){
        $id = $_GET['id'];
        unset($_SESSION['cart-item'][$id]);
        header("Location: ../controller/order-controller.php?action=checkcart");
    }
    if(isset($_GET['plus']) && $_GET['plus'] == 'true'){
        $id = $_GET['id'];
        $amount = $_SESSION['cart-item'][$id]->getAmount();
        $_SESSION['cart-item'][$id]->setAmount($amount + 1);
        header("Location: ../controller/order-controller.php?action=checkcart");
    }
    if(isset($_GET['minus']) && $_GET['minus'] == 'true'){
        $id = $_GET['id'];
        $amount = $_SESSION['cart-item'][$id]->getAmount();
        $_SESSION['cart-item'][$id]->setAmount($amount - 1);
        if($_SESSION['cart-item'][$id]->getAmount() == 0){
            unset($_SESSION['cart-item'][$id]);
        }
        header("Location: ../controller/order-controller.php?action=checkcart");
    }
}

switch ($order_action) {
    case 'add':
        $id = (int)$_POST['txt_id'];
        $name = $_POST['txt_name'];
        $img = $_POST['txt_img'];
        $price = $_POST['txt_price'];
        $amount = $_POST['txt_amount'];
        if(isset($_POST['quantity'])){
            $quantity = $_POST['quantity'];
        } else {
            $quantity = 1;
        }

        $pro = new Product("", "", 0, "", 1, 0, 0, 0, $id);
        $dataPro = $orderController->getProductById($pro);
        $selectedProduct = new Product($dataPro[0]['product_name'], "", $dataPro[0]['price_current'], $dataPro[0]['img'], $quantity, 0, 0, 0, $dataPro[0]['product_id']);

        if(!empty($_SESSION['username'])){
            if($amount > 0){
                if(!empty($_SESSION['cart-item'])){
                    if(array_key_exists($id, $_SESSION['cart-item'])){
                        $amount = $_SESSION['cart-item'][$id]->getAmount();
                        $_SESSION['cart-item'][$id]->setAmount($amount + 1);
                    } else {
                        $_SESSION['cart-item'][$id] = $selectedProduct;
                    }
                    echo '<script>
                            alert("Th??m v??o gi??? h??ng th??nh c??ng");
                            window.history.back();
                        </script>';
                } else {
                    $_SESSION['cart-item'][$id] = $selectedProduct;
                    echo '<script>
                            alert("Th??m v??o gi??? h??ng th??nh c??ng");
                            window.history.back();
                        </script>';
                }
            } else {
                echo '<script>
                            alert("R???t ti???c s???n ph???m ???? h???t h??ng");
                            window.history.back();
                        </script>';
            }
        }else{
            header("Location: ../view/login.php");
            exit();
        }
        break;

    case 'checkcart':
        if(isset($_SESSION['cart-item'])){
            $data['cart'] = $_SESSION['cart-item'];
            $orderController->view("cart", $data);
        } else {
            $orderController->view("cart");
        }
        break;

    case 'detailOrder':
        $id_order = $_GET['id_order'];
        $order = new Order("", "", "", "", "", "", "");
        $data['cart'] = $orderController->getDetailOrderById($order, $id_order);
        $orderController->view("cart-detail", $data);
        break;

    case 'clear':
        unset($_SESSION);
        session_destroy();
        break;

    case 'cancel-order':
        $order_id = $_POST['txt_id'];
        $order = new Order("","","","","","","");
        $count = $orderController->cancelOrder($order, $order_id);

        if($count > 0){
            echo '<script>
                    alert("H???y ????n h??ng th??nh c??ng");
                    window.history.back();
                </script>';
        } else {
            echo '<script>
                    alert("H???y ????n h??ng kh??ng th??nh c??ng");
                    window.history.back();
                </script>';
        }
        break;

    case 'order':
        $user_id = $_SESSION['userId'];
        $receiver = $_POST['txt_receiver'];
        $address = $_POST['txt_address'];
        $phoneNumber = $_POST['txt_phoneNumber'];
        $totalPrice = $_SESSION['total'];
        $paymentMethods = $_POST['radPaymentMethods'];

        $err = checkOrder($receiver, $address, $phoneNumber);
        if(!empty($err)){
            echo '<script>
                    alert("'.$err.'");
                    window.history.back();
                </script>';
        } else {
            $order = new Order($receiver, $address, $phoneNumber, $totalPrice, $paymentMethods, 0, $user_id);
            $orderController->insertOrder($order);
            $dbCon = new MySQLUtils();
            $query = "select * from user where user_id = :user_id";
            $param = [
                ":user_id"  => $user_id
            ];
            $user = $dbCon->getData($query, $param);
            $dbCon->disconnect();
            $payment = $paymentMethods == 1 ? "Thanh to??n khi nh???n h??ng!!" : "Thanh to??n online";
            $newOrder = $orderController->getNewOrder($order);
            $order_id = $newOrder[0]['order_id'];
            foreach($_SESSION['cart-item'] as $product){
                $currentPrice = $product->getAmount() * $product->getPriceCurrent();
                $detailOrder = new Order("", "", "", 0, 0,0,0);
                $orderController->insertOrderDetail($detailOrder, $order_id, $product->getProductId(), $currentPrice, $product->getAmount());
            }
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
            $mail->AddReplyTo('phammanh2508@gmail.com', 'M???nh');
            $mail->Subject    = 'X??c nh???n ????n h??ng c???a b???n!!!';
            $mail->MsgHTML(
                "<html>
                    <body>
                        <h3>T??n ng?????i nh???n: $receiver</h3>
                        <h3>?????a ch??? nh???n h??ng: $address</h3>
                        <h3>S??T nh???n h??ng: $phoneNumber</h3>
                        <h3>T???ng ti???n ????n h??ng: $totalPrice</h3>
                        <h3>Thanh to??n: $payment</h3>
                    </body>
                </html>"
            );
            if (!empty($user)) 
                {
                foreach($user as $row){
                        $mail->AddAddress("".$row['email']."", "".$row['email']."");
                    }
                } 
            else {
                echo "Kh??ng c?? record n??o";
            }

            if(!$mail->Send()) {
                echo '<script>
                alert("C?? l???i khi g???i mail vui l??ng th??? l???i!!");
                window.history.back();
            </script>';  
            } else {
                echo '<script>
                alert("?????t h??ng th??nh c??ng");
                window.location.replace("../view/home.php");
            </script>';
            }
            unset($_SESSION['cart-item']);
        }
        break;
    default:
        # code...
        break;
}
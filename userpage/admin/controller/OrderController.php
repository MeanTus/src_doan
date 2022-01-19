<?php
    include_once '../utils/MySQLUtils.php';
    include_once '../model/Order.php';
    include_once '../model/Product.php';
    include_once '../model/Category.php';
    include_once '../model/Manufacturer.php';
    include_once '../controller/BaseController.php';

    class OrderController extends BaseController{
        public function orderPage(){
            $orderStatus = 0;
            $order = new Order("", "", "", 0, 0, $orderStatus, 0);
            $data['list-order'] = $order->getAllOrder();
            $this->view("orders", $data);
        }

        public function orderViewPage($orderId, $success = 'false', $cancel = 'false'){
            $order = new Order("", "", "", 0, 0, 0, 0, $orderId);
            $data['order_detail'] = $order->getDetailOderById();
            if($success == 'true'){
                $flag = 0;
                foreach($data['order_detail'] as $detail){
                    $product = new Product("", "", 0, "", 0, 0, 0, 0 , $detail['product_id']);
                    $amountProduct = (int)$product->getProductById()[0]['amount'];
                    $newAmount = $amountProduct - $detail['quality'];
                    if($newAmount < 0){
                        $flag = 0;
                        echo '<script>
                              alert("Không đủ số lượng sản phẩm");
                              window.history.back();
                            </script>';
                        return;
                    } else {
                        $count = $product->updateAmountProduct($newAmount);
                        if($count > 0){
                            $flag = 1;
                        }
                    }
                }

                if($flag == 1){
                    $order->updateOrderStatus();
                    $data['order'] = $order->getOrderById();
                    echo '<script>
                              alert("Duyệt đơn thành công");
                              window.history.back();
                            </script>';
                } else {
                    echo '<script>
                              alert("Duyệt đơn thất bại");
                              window.history.back();
                            </script>';
                }
            } else if ($cancel == 'true') {
                $order = new Order("", "", "", "", "", "", "", $orderId);
                $count = $order->cancelOrder();

                if($count > 0){
                    header("Location: ?order_action=detail&&order_id=".$orderId);
                    echo '<script>
                            alert("Hủy đơn thành công");
                        </script>';
                } else {
                    echo '<script>
                            alert("Hủy đơn thất bại");
                            window.history.back();
                        </script>';
                }
            } else {
                $data['order'] = $order->getOrderById();
            }
            $this->view("order_view", $data);
        }
    }

    $orderController = new OrderController();
    $orderAction = "";
    if(count($_GET) > 0){
        $orderAction = $_GET['order_action'];
    } elseif (count($_POST) > 0){
        $orderAction = $_POST['order_action'];
    }

    switch ($orderAction) {
        case 'detail':
            $orderId = $_GET['order_id'];
            if(isset($_GET['success'])){
                $orderController->orderViewPage($orderId, 'true');
            } else if (isset($_GET['cancel'])){
                $orderController->orderViewPage($orderId, 'false', 'true');
            } else {
                $orderController->orderViewPage($orderId);
            }
            break;

        case 'filter':
            $filter_order = $_POST['filter_order'];
            var_dump($filter_order);
            die;

        default:
            $orderController->orderPage();
            break;
    }
?>
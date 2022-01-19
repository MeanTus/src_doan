<?php
include_once '../config.php';
session_start();
function loadClass($classname)
{
    include "../model/$classname.php";
}
spl_autoload_register('loadClass');
$userId = $_SESSION['userId'];

$order = new Order("", "", "", 0, 0, 0, $userId);
$historyOrder = $order->getOrderByUserId();
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <?php include "layout/header.php"; ?>
</head>

<body>

   <!--Offcanvas menu area start-->
    <?php include 'layout/menu-mobile.php'; ?>
    <!--Offcanvas menu area end-->

    <!--header area start-->
    <?php include "layout/menu-header.php"; ?>
    <!--header area end-->

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="home.php">home</a></li>
                            <li>My account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- my account start  -->
    <div class="account_page_bg">
        <div class="container">
            <section class="main_content_area">
                <div class="account_dashboard">
                    <div class="row">
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <!-- Nav tabs -->
                            <div class="dashboard_tab_button">
                                <ul role="tablist" class="nav flex-column dashboard-list" id="nav-tab">
                                    <li><a href="#account-details" data-toggle="tab" class="nav-link active">Account details</a></li>
                                    <li> <a href="#orders" data-toggle="tab" class="nav-link">Orders</a></li>
                                    <li><a href="#update-pass" data-toggle="tab" class="nav-link">Update Password</a></li>
                                    <!-- <li><a href="login.php" class="nav-link">logout</a></li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-9 col-lg-9">
                            <!-- Tab panes -->
                            <div class="tab-content dashboard_content">
                                <div class="tab-pane fade active" id="account-details">
                                    <h3>Account details </h3>
                                    <div class="login">
                                        <div class="login_form_container">
                                            <div class="account_login_form">
                                                <form action="../controller/user-controller.php" method="post">
                                                    <label>Username</label>
                                                    <input type="text" name="txt_username"
                                                    value="<?php echo $_SESSION['username'] ?>">
                                                    <div class="input-radio">
                                                        <span class="custom-radio">
                                                            <input type="radio" value="1" name="rad_gender"
                                                            <?php
                                                            if($_SESSION['sex'] == 1) echo 'checked';
                                                            ?> > Nam
                                                        </span>
                                                        <span class="custom-radio">
                                                            <input type="radio" value="0" name="rad_gender"
                                                            <?php
                                                            if($_SESSION['sex'] == 0) echo 'checked';
                                                            ?> > Nữ
                                                        </span>
                                                    </div> <br>
                                                    <label>Email</label>
                                                    <input readonly type="email" name="txt_email" 
                                                    value="<?php echo $_SESSION['email'] ?>">
                                                    <label>Password</label>
                                                    <input readonly type="password" name="txt_password"
                                                    value="<?php echo $_SESSION['pw'] ?>">
                                                    <br>
                                                    <div class="save_button primary_btn default_button">
                                                        <button type="submit"
                                                        name="grp_user_controller"
                                                        value="update">Cập nhật</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="orders">
                                    <h3>Orders</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Order</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                foreach($historyOrder as $order){
                                                    if($order['order_status'] == 0){
                                                        $status = "Chờ xác nhận";
                                                    } elseif ($order['order_status'] == 1) {
                                                        $status = "Đã duyệt";
                                                    } else {
                                                        $status = "Đã hủy đơn";
                                                    }
                                                    $isDisable = $order['order_status'] ? "disabled" : "";
                                                    echo 
                                                        '<form action="../controller/order-controller.php" method="post">
                                                        <input type="text" name="txt_id" value="'.$order['order_id'].'" hidden/>
                                                            <tr>
                                                            <td>'.$order['order_id'].'</td>
                                                            <td>'.$order['createAt'].'</td>
                                                            <td><span class="success">'.$status.'</span></td>
                                                            <td>'.number_format($order['totalPrice']).' Đ</td>
                                                            <td>
                                                            <button 
                                                            style="background-color: #0dcaf0"
                                                            type="button" 
                                                            class="btn btn-info">
                                                            <a href="../controller/order-controller.php?action=detailOrder&id_order='.$order['order_id'].'" class="view">view</a>
                                                            </button>
                                                            <button 
                                                            type="submit"
                                                            name="order_action"
                                                            value="cancel-order"
                                                            '.$isDisable.'
                                                            style="background-color: red"
                                                            class="btn btn-danger">Hủy đơn</button>
                                                            </td>
                                                        </tr>
                                                        </form>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="update-pass">
                                    <h3>Update Password</h3>
                                    <div class="login">
                                        <div class="login_form_container">
                                            <div class="account_login_form">
                                                <form action="../controller/user-controller.php" method="post">
                                                    <label>Mật khẩu cũ</label>
                                                    <input type="password" name="old_password" require>
                                                    <!-- <label>Email</label> -->
                                                    <input type="hidden" name="txt_email" 
                                                    value="<?php echo $_SESSION['email'] ?>">
                                                    <label>Mật khẩu mới</label>
                                                    <input type="password" name="new_password" require>
                                                    <label>Nhập lại mật khẩu</label>
                                                    <input type="password" name="new_password_agian" require>
                                                    <br>
                                                    <div class="save_button primary_btn default_button">
                                                        <button type="submit"
                                                        name="grp_user_controller"
                                                        value="update_pass">Cập nhật</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- my account end   -->

    <!--footer area start-->
    <?php include "layout/footer.php"; ?>
</body>


<!-- Mirrored from template.hasthemes.com/antomi/antomi/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 10:28:38 GMT -->
</html>
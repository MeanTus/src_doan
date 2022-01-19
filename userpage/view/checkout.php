<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from template.hasthemes.com/antomi/antomi/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 10:28:38 GMT -->
<head>
    <?php include 'layout/header.php'; ?>
</head>

<body>

    <!--Offcanvas menu area start-->
    <?php include 'layout/menu-mobile.php'; ?>
    <!--Offcanvas menu area end-->
    <!--header area start-->
    <?php include 'layout/menu-header.php'; ?>
    <!--header area end-->

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="home.php">home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--Checkout page section-->
    <div class="checkout_page_bg">
        <div class="container">
            <div class="Checkout_section">
                <div class="checkout_form">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout_form_left">
                                <form action="../controller/order-controller.php" method="post">
                                    <h3>Billing Details</h3>
                                    <div class="row">
                                    <div class="col-12 mb-20">
                                            <label>Tên người nhận <span>*</span></label>
                                            <input type="text" name="txt_receiver">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Địa chỉ nhận hàng <span>*</span></label>
                                            <input type="text" name="txt_address">
                                        </div>
                                        <div class="col-lg-6 mb-20">
                                            <label>Số điện thoại<span>*</span></label>
                                            <input type="text" name="txt_phoneNumber">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Phương thức thanh toán <span>*</span></label><br>
                                            <input style="width: auto; height: auto" type="radio" name="radPaymentMethods" value="1" checked>
                                            <label class="form-check-label">
                                                Thanh toán trực tiếp
                                            </label><br>
                                            <input style="width: auto; height: auto" type="radio" name="radPaymentMethods" value="0">
                                            <label class="form-check-label">
                                                Thanh toán Internet banking
                                            </label><br>
                                        </div>
                                        <div class="order_button">
                                            <button type="submit" name="order_action" value="order">
                                                Đặt hàng
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout_form_right">
                                <form action="#">
                                    <h3>Your order</h3>
                                    <div class="order_table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Số lượng</th>
                                                    <th>Đơn giá</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach($_SESSION['cart-item'] as $product){
                                                        echo '<tr>
                                                            <td>'.$product->getProductName().'</td>
                                                            <td>'.$product->getAmount().'</td>
                                                            <td>'.number_format($product->getPriceCurrent()).'</td>
                                                        </tr>';
                                                    }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Cart Subtotal</th>
                                                    <td></td>
                                                    <?php
                                                        echo '<td><strong>' .number_format($_SESSION['total']). ' Đ</strong></td>';
                                                    ?>
                                                </tr>
                                                <tr>
                                                    <th>Shipping</th>
                                                    <td></td>
                                                    <?php
                                                        echo '<td><strong>' .number_format(10000,0,",", "."). ' Đ</strong></td>';
                                                    ?>
                                                </tr>
                                                <tr class="order_total">
                                                    <th>Order Total</th>
                                                    <td></td>
                                                    <?php
                                                        echo '<td><strong>' .number_format($_SESSION['total']). ' Đ</strong></td>';
                                                    ?>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Checkout page section end-->

    <!--footer area start-->
    <?php include 'layout/footer.php'; ?>
    <!--footer area end-->
</body>


<!-- Mirrored from template.hasthemes.com/antomi/antomi/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 10:28:38 GMT -->
</html>
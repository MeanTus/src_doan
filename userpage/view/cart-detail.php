<!doctype html>
<html class="no-js" lang="en">
<!-- Mirrored from template.hasthemes.com/antomi/antomi/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 10:28:38 GMT -->
<head>
    <?php include "../view/layout/header.php"; ?>
</head>

<body>

   <!--Offcanvas menu area start-->
    <?php include '../view/layout/menu-mobile.php'; ?>
    <!--Offcanvas menu area end-->

    <!--header area start-->
    <?php include "../view/layout/menu-header.php"; ?>
    <!--header area end-->

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="../view/home.php">home</a></li>
                            <li>Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shopping cart area start -->
    <div class="cart_page_bg">
        <div class="container">
            <div class="shopping_cart_area">
                <form action="../controller/order-controller.php" method="post">
                    <div class="row">
                        <div class="col-12">
                            <div class="table_desc">
                                <div class="cart_page table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product_remove">Delete</th>
                                                <th class="product_thumb">Image</th>
                                                <th class="product_name">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product_quantity">Quantity</th>
                                                <th class="product_total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        if(isset($data['cart'])){
                                            $_SESSION['total'] = 0;
                                            foreach($data['cart'] as $item){
                                                echo'
                                                <tr>
                                                <td class="product_remove"><a href="order-controller.php?action=checkcart&&delete=true&&id='.$item['product_id'].'"><i class="fa fa-trash-o"></i></a></td>
                                                <td class="product_thumb"><a href="#"><img src="../view/'.ltrim($item['img'], ".").'" alt=""></a></td>
                                                <td class="product_name"><a href="../view/variable-product.php?id='.$item['product_id'].'">'.$item['product_name'].'</a></td>
                                                <td class="product-price">'.number_format($item['price_current']).' Đ</td>
                                                <td class="product_quantity">
                                                    <span>
                                                        <a href="order-controller.php?action=checkcart&&plus=true&&id='.$item['product_id'].'">
                                                        <i class="fa fa-plus-circle fa-lg"></i>
                                                        </a>
                                                    </span>
                                                    <input name="amount" value="'.$item['quality'].'" type="text">
                                                    <span>
                                                        <a href="order-controller.php?action=checkcart&&minus=true&&id='.$item['product_id'].'">
                                                        <i class="fa fa-minus-circle fa-lg"></i></a>
                                                    </span>
                                                </td>
                                                <td class="product_total">'.number_format($item['price_current'] * $item['quality']).' Đ</td>
                                                </tr>';
                                                $_SESSION['total'] += $item['price_current'] * $item['quality'];
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--coupon code area start-->
                    <div class="coupon_area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon_code left">
                                    <h3>Coupon</h3>
                                    <div class="coupon_inner">
                                        <p>Enter your coupon code if you have one.</p>
                                        <input placeholder="Coupon code" type="text">
                                        <button type="submit">Apply coupon</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon_code right">
                                    <h3>Cart Totals</h3>
                                    <div class="coupon_inner">
                                        <div class="cart_subtotal">
                                            <p>Subtotal</p>
                                            <p class="cart_amount">
                                                <?php 
                                                if(isset($_SESSION['total'])){
                                                    echo number_format($_SESSION['total']);
                                                } else echo "0";
                                                ?> 
                                            Đ</p>
                                        </div>
                                        <div class="cart_subtotal ">
                                            <p>Shipping</p>
                                            <p class="cart_amount">
                                            <span>Flat Rate:</span> 0 Đ</p>
                                        </div>
                                        <a href="#">Calculate shipping</a>

                                        <div class="cart_subtotal">
                                            <p>Total</p>
                                            <p class="cart_amount">
                                                <?php 
                                                if(isset($_SESSION['total'])){
                                                    echo number_format($_SESSION['total']);
                                                } else echo "0";?> 
                                            Đ</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--coupon code area end-->
                </form>
            </div>
        </div>
    </div>
    <!--shopping cart area end -->

    <!--footer area start-->
    <?php include "layout/footer.php"; ?>
</body>
</html>
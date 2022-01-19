<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from template.hasthemes.com/antomi/antomi/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 10:28:48 GMT -->
<head>
    <?php include "layout/header.php"; ?>
</head>

<body>

   <!--Offcanvas menu area start-->
        <?php include 'layout/menu-mobile.php'; ?>
    <!--Offcanvas menu area end-->

    <!--header area start-->
    <?php include "layout/menu-header.php" ?>
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

    <!-- customer login start -->
    <div class="login_page_bg">
        <div class="container">
            <div class="customer_login">
                <!-- <div class="row"> -->
                    <!--login area start-->
                    <div class="col-lg col-md">
                        <div class="account_form login">
                            <h2>Nhập Email của bạn:</h2>
                            <form action="../controller/user-controller.php" method="POST">
                                <p>
                                    <!-- <label>Email <span>*</span></label> -->
                                    <input type="email" name="mail_to" require>
                                </p>
                                <div class="login_submit">
                                    <button type="submit" name="grp_user_controller" value="lost_pass">Xác nhận</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
        </div>
    </div>

    <!-- customer login end -->

    <!--footer area start-->
    <?php include "layout/footer.php"; ?>
</body>


<!-- Mirrored from template.hasthemes.com/antomi/antomi/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 10:28:48 GMT -->
</html>
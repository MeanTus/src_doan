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
                <div class="row">
                    <!--login area start-->
                    <div class="col-lg-6 col-md-6">
                        <div class="account_form login">
                            <h2>login</h2>
                            <form action="../controller/user-controller.php" method="POST">
                                <p>
                                    <label>Email <span>*</span></label>
                                    <input type="text" name="email">
                                </p>
                                <p>
                                    <label>Passwords <span>*</span></label>
                                    <input type="password" name="password">
                                </p>
                                <div class="login_submit">
                                    <a href="lostPass.php">Lost your password?</a>
                                    <label for="remember">
                                        <input id="remember" type="checkbox">
                                        Remember me
                                    </label>
                                    <button type="submit" name="grp_user_controller" value="user_login">login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--login area start-->

                    <!--register area start-->
                    <div class="col-lg-6 col-md-6">
                        <div class="account_form register">
                            <h2>Register</h2>
                            <form action="../controller/user-controller.php" method="post">
                                <p>
                                    <label>Username <span>*</span></label>
                                    <input type="text" name="txtUsername">
                                </p>
                                <p>
                                    <label>Email address <span>*</span></label>
                                    <input type="text" name="txtEmail">
                                </p>
                                <p>
                                    <label>Passwords <span>*</span></label>
                                    <input type="password" name="txtPassword">
                                </p>
                                <p>
                                    <label>Gender <span>*</span></label>
                                    <br>
                                    <input style="width: auto; height: auto" type="radio" name="radGender" value="Nam" checked>
                                    <label class="form-check-label" for="radGender">
                                        Nam
                                    </label>
                                    <br>
                                    <input style="width: auto; height: auto" type="radio" name="radGender" value="Nữ">
                                    <label class="form-check-label" for="radGender">
                                        Nữ
                                    </label>
                                </p>
                                <div class="login_submit">
                                    <button type="submit" name="grp_user_controller" value="user_register">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--register area end-->
                </div>
            </div>
        </div>
    </div>

    <!-- customer login end -->

    <!--footer area start-->
    <?php include "layout/footer.php"; ?>
</body>


<!-- Mirrored from template.hasthemes.com/antomi/antomi/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 10:28:48 GMT -->
</html>
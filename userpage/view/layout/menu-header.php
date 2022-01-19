<?php
include_once '../config.php';
include_once '../model/Category.php';

$category = new Category(0, "");
$cateData = $category->getAllCategory();
?>
<header>
    <div class="main_header">
        <div class="container">
            <!--header middel start-->
            <div class="header_middle sticky-header">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-3 col-4">
                        <div class="logo">
                            <a href="../view/home.php"><img src="../view/assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="main_menu menu_position text-center">
                            <nav>
                                <ul>
                                    <li><a class="active" href="../view/home.php">Trang chủ</a></li>
                                    <li class="mega_items"><a href="../controller/product-controller.php">shop</a></li>
                                    <li><a href="../view/blog.php">Blog</a></li>
                                    <li><a href="../view/about.php">About Us</a></li>
                                    <li><a href="../view/contact.php"> Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-7 col-6">
                            <?php
                                if(isset($_SESSION["username"])){
                                    if(!empty($_SESSION['cart-item'])){
                                        $count = count($_SESSION['cart-item']);
                                    } else {
                                        $count = 0;
                                    }
                                    echo '
                                        <div class="header_configure_area">
                                        <div class="dropdown me-5 my-auto">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Hello '.$_SESSION["username"].'
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="../view/my-account.php">Profile</a></li>
                                            <li><a class="dropdown-item" href="../controller/logout-controller.php">Log out</a></li>
                                            </ul>
                                        </div>
                                            <div class="mini_cart_wrapper">
                                                <a href="../controller/order-controller.php?action=checkcart">
                                                    <i class="fa fa-shopping-bag"></i>
                                                    <span class="cart_count">'.$count.'</span>
                                                </a>
                                            </div>
                                        </div>';
                                }else{
                                    echo '<div class="header_configure_area">
                                            <div class="main_menu menu_position text-center mx-5">
                                                <nav>
                                                    <ul>
                                                        <li><a href="../view/login.php"><i class="fa fa-user"></i> Login</a></li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>';
                                }
                            ?>
                        </div>
                </div>
            </div>
            <!--header middel end-->

            <!--header bottom satrt-->
            <div class="header_bottom">
                <div class="row align-items-center">
                    <div class="column1 col-lg-3 col-md-6">
                        <div class="categories_menu categories_three">
                            <div class="categories_title">
                                <h2 class="categori_toggle">Danh mục sản phẩm</h2>
                            </div>
                            <div class="categories_menu_toggle">
                                <ul>
                                    <?php 
                                    for($i = 0; $i < count($cateData); $i++){
                                        echo '<li class="menu_item_children"><a href="#">'.$cateData[$i]['category_name'].'</a>
                                        </li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="column2 col-lg-6 ">
                        <div class="search_container">
                            <form action="../controller/product-controller.php" method="GET">
                                <div class="hover_category">
                                    <select class="select_option" name="select" id="categori2">
                                        <option selected value="0">Tất cả danh mục</option>
                                        <?php 
                                        for($i = 0; $i < count($cateData); $i++){
                                            echo '<option value="'.$cateData[$i]['category_id'].'">'.$cateData[$i]['category_name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="search_box">
                                    <input name="action" value="search" hidden>
                                    <input placeholder="Tìm sản phẩm..." type="text" name="txt_search">
                                    <button type="submit">Tìm kiếm</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="column3 col-lg-3 col-md-6">
                        <div class="header_bigsale">
                            <a href="#">BIG SALE BLACK FRIDAY</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--header bottom end-->
        </div>
    </div>
</header>
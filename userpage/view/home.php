<?php
include '../config.php';
function loadClass($classname)
{
    include "../model/$classname.php";
}
spl_autoload_register('loadClass');

$product = new Product("", "", 0, "", 0, 0, 0, 0);
$data = $product->getAllProduct();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include "layout/header.php"; ?>
</head>

<body>
    <!--Offcanvas menu area start-->
    <?php
    include 'layout/menu-mobile.php';

    // import cart product
    include 'layout/product-cart.php';
    ?>
    <!--Offcanvas menu area end-->

    <!--header area start-->
    <?php include "layout/menu-header.php"; ?>
    <!--header area end-->

    <!--slider area start-->
    <section class="slider_section slider_s_three mb-60 mt-20">
        <div class="slider_area slider3_carousel owl-carousel">
            <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/slider/slider9.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <div class="slider_content slider_c_three color_white">
                                <h3>new collection</h3>
                                <h1>new Arrivals <br> cellphone new model 2019</h1>
                                <p>discount <span> -30% off</span> this week</p>
                                <a class="button" href="/shop.php">DISCOVER NOW</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/slider/slider10.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-12 mx-auto">
                            <div class="slider_content slider_c_three color_white">
                                <h3>new collection</h3>
                                <h1>happy summer <br> vagetable organic food 2019</h1>
                                <p>discount <span> -30% off</span> this week</p>
                                <a class="button" href="shop.php">DISCOVER NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/slider/slider11.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-12 mx-auto">
                            <div class="slider_content slider_c_three color_white">
                                <h3>new collection</h3>
                                <h1>new collection <br> sport clothes for men,s</h1>
                                <p>discount <span> -30% off</span> this week</p>
                                <a class="button" href="shop.php">DISCOVER NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider area end-->

    <!--shipping area start-->
    <div class="shipping_area mb-60">
        <div class="container">
            <div class="shipping_inner">
                <?php
                $arrImg = array(
                    "assets/img/about/shipping1.png",
                    "assets/img/about/shipping2.png",
                    "assets/img/about/shipping3.png",
                    "assets/img/about/shipping4.png",
                    "assets/img/about/shipping5.png"
                );

                for ($i = 0; $i < 5; $i++) {
                    echo '<div class="single_shipping">
                                <div class="shipping_icone">
                                    <img src=' . $arrImg[$i] . ' alt="">
                                </div>
                                <div class="shipping_content">
                                    <h4>Free Delivery</h4>
                                    <p>For all oders over $120</p>
                                </div>
                            </div>';
                }
                ?>
            </div>
        </div>
    </div>
    <!--shipping area end-->

    <!--home section bg area start-->
    <div class="home_section_bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-12 order-lg-2">
                    <!--product area start-->
                    <div class="product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product_header row">
                                    <div class="section_title col-xl-auto col-12">
                                        <h2>Featured Products</h2>
                                    </div>
                                    <div class="product_tab_btn col-xl-auto col-12 mt-md-3 mt-xl-0">
                                        <ul class="nav" role="tablist" id="nav-tab">
                                            <li>
                                                <a class="active" data-toggle="tab" href="#Computer" role="tab" aria-controls="Computer" aria-selected="true">
                                                    Computer
                                                </a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#Networking" role="tab" aria-controls="Networking" aria-selected="false">
                                                    Networking
                                                </a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#Computer2" role="tab" aria-controls="Computer2" aria-selected="false">
                                                    Computer & Networking
                                                </a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#Audio" role="tab" aria-controls="Audio" aria-selected="false">
                                                    Television & Audio
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="Computer" role="tabpanel">
                                <div class="product_carousel product_style product_column4 owl-carousel">
                                    <?php
                                    for ($i = 0; $i < 10; $i += 2) {
                                        echo '<div class="product_items">';
                                        product($data[$i]);
                                        product($data[$i + 1]);
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Networking" role="tabpanel">
                                <div class="product_carousel product_style product_column4 owl-carousel">
                                    <?php
                                    for ($i = 0; $i < 10; $i += 2) {
                                        echo '<div class="product_items">';
                                        product($data[$i]);
                                        product($data[$i + 1]);
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Computer2" role="tabpanel">
                                <div class="product_carousel product_style product_column4 owl-carousel">
                                    <?php
                                    for ($i = 0; $i < 10; $i += 2) {
                                        echo '<div class="product_items">';
                                        product($data[$i]);
                                        product($data[$i + 1]);
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Audio" role="tabpanel">
                                <div class="product_carousel product_style product_column4 owl-carousel">
                                    <?php
                                    for ($i = 0; $i < 10; $i += 2) {
                                        echo '<div class="product_items">';
                                        product($data[$i]);
                                        product($data[$i + 1]);
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--product area end-->

                    <!--banner area start-->
                    <div class="banner_area mb-55">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <figure class="single_banner">
                                    <div class="banner_thumb">
                                        <a href="shop.html"><img src="assets/img/bg/banner4.jpg" alt=""></a>
                                    </div>
                                </figure>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <figure class="single_banner">
                                    <div class="banner_thumb">
                                        <a href="shop.html"><img src="assets/img/bg/banner5.jpg" alt=""></a>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <!--banner area end-->

                    <!--product area start-->
                    <div class="small_product_area mb-55">
                        <div class="row">
                            <div class="col-12">
                                <div class="product_header row">
                                    <div class="section_title col-xl-auto col-12">
                                        <h2>Best Selling Products</h2>
                                    </div>
                                    <div class="product_tab_btn col-xl-auto col-12 mt-md-3 mt-xl-0">
                                        <ul class="nav" role="tablist" id="nav-tab2">
                                            <li>
                                                <a class="active" data-toggle="tab" href="#Fashion2" role="tab" aria-controls="Fashion2" aria-selected="true">
                                                    Fashion & Clothing
                                                </a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#Games2" role="tab" aria-controls="Games2" aria-selected="false">
                                                    Games & Consoles
                                                </a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#Headphone2" role="tab" aria-controls="Headphone2" aria-selected="false">
                                                    Headphone & Speaker
                                                </a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#Mobile2" role="tab" aria-controls="Mobile2" aria-selected="false">
                                                    Mobile & Tablets
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="Fashion2" role="tabpanel">
                                <div class="product_carousel small_p_container small_product_column2 owl-carousel">
                                    <?php
                                    for ($i = 0; $i < 4; $i++) {
                                        echo '<div class="product_items">';
                                        productFlexRow($data[$i]);
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Games2" role="tabpanel">
                                <div class="product_carousel small_p_container  small_product_column2 owl-carousel">
                                    <?php
                                    for ($i = 0; $i < 4; $i++) {
                                        echo '<div class="product_items">';
                                        productFlexRow($data[$i]);
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Headphone2" role="tabpanel">
                                <div class="product_carousel small_p_container  small_product_column2 owl-carousel">
                                    <?php
                                    for ($i = 0; $i < 4; $i++) {
                                        echo '<div class="product_items">';
                                        productFlexRow($data[$i]);
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Mobile2" role="tabpanel">
                                <div class="product_carousel small_p_container  small_product_column2 owl-carousel">
                                    <?php
                                    for ($i = 0; $i < 4; $i++) {
                                        echo '<div class="product_items">';
                                        productFlexRow($data[$i]);
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--product area end-->

                    <!--banner area start-->
                    <div class="banner_area banner_style2 mb-55">
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <figure class="single_banner">
                                    <div class="banner_thumb">
                                        <a href="shop.php"><img src="assets/img/bg/banner6.jpg" alt=""></a>
                                    </div>
                                </figure>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <figure class="single_banner">
                                    <div class="banner_thumb">
                                        <a href="shop.php"><img src="assets/img/bg/banner7.jpg" alt=""></a>
                                    </div>
                                </figure>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <figure class="single_banner">
                                    <div class="banner_thumb">
                                        <a href="shop.php"><img src="assets/img/bg/banner8.jpg" alt=""></a>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <!--banner area end-->

                    <!--product area start-->
                    <div class="product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product_header row">
                                    <div class="section_title col-xl-auto col-12">
                                        <h2>New Arrivals</h2>
                                    </div>
                                    <div class="product_tab_btn col-xl-auto col-12 mt-md-3 mt-xl-0">
                                        <ul class="nav" role="tablist" id="nav-tab3">
                                            <li>
                                                <a class="active" data-toggle="tab" href="#Computer3" role="tab" aria-controls="Computer3" aria-selected="true">
                                                    Computer
                                                </a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#Networking2" role="tab" aria-controls="Networking2" aria-selected="false">
                                                    Networking
                                                </a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#Networking3" role="tab" aria-controls="Networking3" aria-selected="false">
                                                    Computer & Networking
                                                </a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#Audio2" role="tab" aria-controls="Audio2" aria-selected="false">
                                                    Television & Audio
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="Computer3" role="tabpanel">
                                <div class="product_carousel product_style product_column4 owl-carousel">
                                    <?php
                                    for ($i = 0; $i < 10; $i += 2) {
                                        echo '<div class="product_items">';
                                        product($data[$i]);
                                        product($data[$i + 1]);
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Networking2" role="tabpanel">
                                <div class="product_carousel product_style product_column4 owl-carousel">
                                    <?php
                                    for ($i = 0; $i < 10; $i += 2) {
                                        echo '<div class="product_items">';
                                        product($data[$i]);
                                        product($data[$i + 1]);
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Networking3" role="tabpanel">
                                <div class="product_carousel product_style product_column4 owl-carousel">
                                    <?php
                                    for ($i = 0; $i < 10; $i += 2) {
                                        echo '<div class="product_items">';
                                        product($data[$i]);
                                        product($data[$i + 1]);
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Audio2" role="tabpanel">
                                <div class="product_carousel product_style product_column4 owl-carousel">
                                    <?php
                                    for ($i = 0; $i < 10; $i += 2) {
                                        echo '<div class="product_items">';
                                        product($data[$i]);
                                        product($data[$i + 1]);
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--product area end-->

                </div>

                <div class="col-xl-3 col-lg-4 col-12">
                    <!--sidebar widget start-->
                    <aside class="sidebar_widget mb-5">
                        <div class="widget_list widget_products">
                            <h3>Deals Of The Month</h3>
                            <div class="product_carousel product_style product_sidebar_slider owl-carousel">
                                <?php
                                for ($i = 0; $i < 6; $i++) {
                                    product($data[$i]);
                                }
                                ?>
                            </div>
                        </div>
                        <div class="widget_list widget_categories">
                            <h3>Product categories</h3>
                            <div class="categories_sidebar_slider owl-carousel">
                                <?php
                                for ($i = 0; $i < 3; $i++) {
                                    echo '<div class="categories_sidebar_slide">';
                                    for ($j = 0; $j < 3; $j++) {
                                        echo '<div class="single_categories_product">
                                                <div class="categories_product_content">
                                                    <h4><a href="shop.php"> Cells & Tablets</a></h4>
                                                    <p>12 Products</p>
                                                </div>
                                                <div class="categories_product_thumb">
                                                    <a href="shop.php"><img src="assets/img/s-product/category' . ($j + 1) . '.jpg" alt=""></a>
                                                </div>
                                            </div>';
                                    }
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="widget_list widget_banner">
                            <figure class="single_banner">
                                <div class="banner_thumb">
                                    <a href="shop.php"><img src="assets/img/bg/banner9.jpg" alt=""></a>
                                </div>
                            </figure>
                        </div>
                        <!-- <div class="widget_list widget_products">
                            <h3>Popular Products</h3>
                            <div class="recent_product_container">
                                <?php
                                for ($i = 0; $i < 3; $i++) {
                                    productFlexRow($data[$i], "recent_product_list");
                                }
                                ?>
                            </div>
                        </div> -->
                    </aside>
                    <!--sidebar widget end-->
                </div>

            </div>
        </div>

        <!--product area start-->
        <div class="small_product_area small_product_style2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="small_product_list">
                            <div class="section_title">
                                <h2>Computer & Networking</h2>
                            </div>
                            <div class="product_carousel small_p_container  product_column1 owl-carousel">
                                <?php
                                for ($i = 0; $i < 8; $i++) {
                                    echo '<div class="product_items">';
                                    for ($j = 0; $j < 3; $j++) {
                                        productFlexRow($data[$i]);
                                        $i++;
                                    }
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="small_product_list">
                            <div class="section_title">
                                <h2>Games & Consoles</h2>
                            </div>
                            <div class="product_carousel small_p_container  product_column1 owl-carousel">
                                <?php
                                for ($i = 0; $i < 8; $i++) {
                                    echo '<div class="product_items">';
                                    for ($j = 0; $j < 3; $j++) {
                                        productFlexRow($data[$i]);
                                        $i++;
                                    }
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="small_product_list">
                            <div class="section_title">
                                <h2>Mobile & Tablets</h2>
                            </div>
                            <div class="product_carousel small_p_container  product_column1 owl-carousel">
                                <?php
                                for ($i = 0; $i < 8; $i++) {
                                    echo '<div class="product_items">';
                                    for ($j = 0; $j < 3; $j++) {
                                        productFlexRow($data[$i]);
                                        $i++;
                                    }
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--product area end-->
    </div>
    <!--home section bg area end-->

    <!--footer area start-->
    <?php include "layout/footer.php"; ?>
    <!--footer area end-->

    <!-- modal area start-->
    <!-- <?php
            include "layout/quick-view.php";
            ?> -->
    <!-- modal area end-->
</body>


<!-- Mirrored from template.hasthemes.com/antomi/antomi/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 10:28:35 GMT -->

</html>
<?php
include '../config.php';
function loadClass($classname){
  include "../model/$classname.php";
}
spl_autoload_register('loadClass');

$id_product = (int)$_GET["id"];
$product = new Product("", "", 0, "", 0, 0, 0, 0, $id_product);

// dữ liệu recommend sản phẩm
$data = $product->getAllProduct();

// Sản phẩm để xem chi tiết
$productDetail = $product->getProductById();

$product_id = (int)$productDetail[0]['product_id'];
$product_name = $productDetail[0]["product_name"];
$product_price = $productDetail[0]["price_current"];
$product_desc = $productDetail[0]["product_desc"];
$product_img = $productDetail[0]["img"];
$product_cate = $productDetail[0]["category_id"];
$product_amount = $productDetail[0]["amount"];

$cate = new Category($product_cate, "");
$cate_name = $cate->getCategoryById()[0]['category_name'];
?>
<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from template.hasthemes.com/antomi/antomi/variable-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 10:28:39 GMT -->
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
                            <li><a href="index.php">home</a></li>
                            <li>product variable</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <div class="product_page_bg">
        <div class="container">
            <div class="product_details_wrapper mb-55">
                <!--product details start-->
                <div class="product_details">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="product-details-tab">
                                <div id="img-1" class="zoomWrapper single-zoom">
                                    <a href="#">
                                        <img id="zoom1" src="<?php echo $product_img ?>" data-zoom-image="<?php echo $product_img ?>" alt="big-1">
                                    </a>
                                </div>
                                <div class="single-zoom-thumb">
                                    <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                        <li>
                                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="<?php echo $product_img ?>" data-zoom-image="<?php echo $product_img ?>">
                                                <img src="<?php echo $product_img ?>" alt="zo-th-1" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="<?php echo $product_img ?>" data-zoom-image="<?php echo $product_img ?>">
                                                <img src="<?php echo $product_img ?>" alt="zo-th-1" />
                                            </a>

                                        </li>
                                        <li>
                                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="<?php echo $product_img ?>" data-zoom-image="<?php echo $product_img ?>">
                                                <img src="<?php echo $product_img ?>" alt="zo-th-1" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="<?php echo $product_img ?>" data-zoom-image="<?php echo $product_img ?>">
                                                <img src="<?php echo $product_img ?>" alt="zo-th-1" />
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="product_d_right">
                                <form action="../controller/order-controller.php" method="post">
                                <input type="text" name="txt_id" value='<?php echo $product_id ?>' hidden/>
                                <input type="text" name="txt_name" value='<?php echo $product_name ?>' hidden/>
                                <input type="text" name="txt_img" value='<?php echo $product_img ?>' hidden/>
                                <input type="text" name="txt_price" value='<?php echo $product_price ?>' hidden/>
                                <input type="text" name="txt_amount" value='<?php echo $product_amount ?>' hidden/>
                                    <h3><a href="#">
                                        <?php echo $product_name ?>
                                    </a></h3>
                                    <div class="product_nav">
                                        <ul>
                                            <li class="prev"><a href="product-details.html"><i class="fa fa-angle-left"></i></a></li>
                                            <li class="next"><a href="variable-product.html"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_rating">
                                        <ul>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li class="review"><a href="#">(1 customer review )</a></li>
                                        </ul>
                                    </div>
                                    <div class="price_box">
                                        <!-- <span class="old_price">$80.00</span> -->
                                        <span class="current_price">
                                            <?php echo number_format($product_price); ?> VNĐ</span>
                                    </div>
                                    <div class="product_desc">
                                        <p>
                                            <?php echo $product_desc; ?>
                                        </p>
                                    </div>
                                    <div class="product_variant color">
                                        <h3>Available Options</h3>
                                        <label>color</label>
                                        <ul>
                                            <li class="color1"><a href="#"></a></li>
                                            <li class="color2"><a href="#"></a></li>
                                            <li class="color3"><a href="#"></a></li>
                                            <li class="color4"><a href="#"></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_variant quantity">
                                        <label>quantity</label>
                                        <input min="1" max="100" value="1" type="number" name="quantity">
                                        <button name="order_action" value="add" class="button" type="submit">add to cart</button>
                                    </div>
                                </form>
                                <div class="product_d_meta">
                                    <span>
                                        Tình trạng: 
                                        <?php
                                        if($product_amount > 0){
                                            echo '<a href="#" style="color: green; font-size:20px"> Còn hàng </a>';
                                        }else{
                                            echo '<a href="#" style="color: red; font-size:20px"> Hết hàng </a>';
                                        }
                                        ?>
                                    </span>
                                    <span>Danh mục sản phẩm: <a href="#"><?php echo $cate_name ?></a></span>
                                </div>
                                <div class="priduct_social">
                                    <ul>
                                        <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>
                                        <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>
                                        <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>
                                        <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>
                                        <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--product details end-->

                <!--product info start-->
                <div class="product_d_info">
                    <div class="row">
                        <div class="col-12">
                            <div class="product_d_inner">
                                <div class="product_info_button">
                                    <ul class="nav" role="tablist" id="nav-tab">
                                        <li>
                                            <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews (1)</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="info" role="tabpanel">
                                        <div class="product_info_content">
                                            <p>
                                                <?php echo $product_desc; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                                        <div class="reviews_wrapper">
                                            <h2>1 review for Donec eu furniture</h2>
                                            <div class="reviews_comment_box">
                                                <div class="comment_thmb">
                                                    <img src="assets/img/blog/comment2.jpg" alt="">
                                                </div>
                                                <div class="comment_text">
                                                    <div class="reviews_meta">
                                                        <div class="product_rating">
                                                            <ul>
                                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <p><strong>admin </strong>- September 12, 2018</p>
                                                        <span>roadthemes</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="comment_title">
                                                <h2>Add a review </h2>
                                                <p>Your email address will not be published. Required fields are marked </p>
                                            </div>
                                            <div class="product_rating mb-10">
                                                <h3>Your rating</h3>
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product_review_form">
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="review_comment">Your review </label>
                                                            <textarea name="comment" id="review_comment"></textarea>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <label for="author">Name</label>
                                                            <input id="author" type="text">

                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <label for="email">Email </label>
                                                            <input id="email" type="text">
                                                        </div>
                                                    </div>
                                                    <button type="submit">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--product info end-->
            </div>

            <!--product area start-->
            <section class="product_area related_products">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2>Related Products </h2>
                        </div>
                    </div>
                </div>
                <div class="product_carousel product_style product_column5 owl-carousel">
                    <?php
                        include 'layout/product-cart.php';
                        for($i = 0; $i < 6; $i++){
                            product($data[$i]);
                        }
                    ?>
                </div>

            </section>
            <!--product area end-->

            <!--product area start-->
            <section class="product_area upsell_products">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2>Upsell Products </h2>
                        </div>
                    </div>
                </div>
                <div class="product_carousel product_style product_column5 owl-carousel">
                    <?php
                        for($i = 0; $i < 6; $i++){
                            product($data[$i]);
                        }
                    ?>
                </div>
            </section>
            <!--product area end-->
        </div>
    </div>

    <!--footer area start-->
    <?php include "layout/footer.php"; ?>
    <!--footer area end-->

    <!-- modal area start-->
    <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="modal_tab">
                                    <div class="tab-content product-details-large">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/productbig2.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/productbig3.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/productbig4.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab4" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/productbig5.jpg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal_tab_button">
                                        <ul class="nav product_navactive owl-carousel" role="tablist">
                                            <li>
                                                <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="assets/img/product/product1.jpg" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="assets/img/product/product6.jpg" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link button_three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="assets/img/product/product9.jpg" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><img src="assets/img/product/product14.jpg" alt=""></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="modal_right">
                                    <div class="modal_title mb-10">
                                        <h2>Sit voluptatem rhoncus sem lectus</h2>
                                    </div>
                                    <div class="modal_price mb-10">
                                        <span class="new_price">$64.99</span>
                                        <span class="old_price" >$78.99</span>
                                    </div>
                                    <div class="modal_description mb-15">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel recusandae </p>
                                    </div>
                                    <div class="variants_selects">
                                        <div class="variants_size">
                                            <h2>size</h2>
                                            <select class="select_option">
                                                <option selected value="1">s</option>
                                                <option value="1">m</option>
                                                <option value="1">l</option>
                                                <option value="1">xl</option>
                                                <option value="1">xxl</option>
                                            </select>
                                        </div>
                                        <div class="variants_color">
                                            <h2>color</h2>
                                            <select class="select_option">
                                                <option selected value="1">purple</option>
                                                <option value="1">violet</option>
                                                <option value="1">black</option>
                                                <option value="1">pink</option>
                                                <option value="1">orange</option>
                                            </select>
                                        </div>
                                        <div class="modal_add_to_cart">
                                            <form action="#">
                                                <input min="1" max="100" step="2" value="1" type="number">
                                                <button type="submit">add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal_social">
                                        <h2>Share this product</h2>
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal area end-->

</body>


<!-- Mirrored from template.hasthemes.com/antomi/antomi/variable-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 10:28:39 GMT -->
</html>
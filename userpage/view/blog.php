<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from template.hasthemes.com/antomi/antomi/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 10:28:39 GMT -->
<head>
    <?php include 'layout/header.php' ?>
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
                            <li><a href="index.php">home</a></li>
                            <li>blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <div class="blog_bg_area">
        <div class="container">
            <!--blog area start-->
            <div class="blog_page_section">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="blog_wrapper mb-60">
                            <div class="blog_header">
                                <h1>Blog</h1>
                            </div>
                            <div class="blog_wrapper_inner">
                                <article class="single_blog">
                                    <figure>
                                        <div class="blog_thumb">
                                            <a href="blog-details.html"><img src="assets/img/blog/blogpage1.jpg"
                                                    alt=""></a>
                                        </div>
                                        <figcaption class="blog_content">
                                            <h4 class="post_title"><a href="blog-details.html">Blog image post
                                                    (sticky)</a></h4>
                                            <div class="blog_meta">
                                                <span class="author">Posted by : <a href="#">admin</a> / </span>
                                                <span class="meta_date">Posted on : <a href="#">June 22, 2019</a></span>
                                            </div>
                                            <div class="blog_desc">
                                                <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu
                                                    ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent
                                                    ornare tortor ac ante egestas hendrerit. Aliquam et metus pharetra,
                                                    bibendum massa nec, fermentum odio. Nunc id leo ultrices, mollis
                                                    ligula in, finibus tortor. Mauris perferendis officia, nihil
                                                    molestiae!</p>
                                            </div>
                                            <footer class="btn_more">
                                                <a href="blog-details.html"> Read more</a>
                                            </footer>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_blog single_blog_gallery">
                                    <figure>
                                        <div class="blog_thumb blog_thumb_active owl-carousel">
                                            <?php 
                                            $arrImg4 = array(
                                                "assets/img/blog/blogpage2.jpg",
                                                "assets/img/blog/blogpage1.jpg",
                                                "assets/img/blog/blogpage3.jpg",
                                                "assets/img/blog/blogpage4.jpg"
                                            );
                                            for($i = 0 ; $i <4 ;$i++)
                                            {
                                                echo'<div class="single_blog_thumb">
                                                <a href="#"><img src='.$arrImg4[$i].' alt=""></a>
                                                </div>';

                                            }
                                            ?>
                                            
                                        </div>
                                        <?php 
                                            for($i = 0 ; $i <5;$i++){
                                                echo'<figcaption class="blog_content">
                                                <h4 class="post_title"><a href="blog-details.html">Post with Gallery</a>
                                                </h4>
                                                <div class="blog_meta">
                                                    <span class="author">Posted by : <a href="#">admin</a> / </span>
                                                    <span class="meta_date">Posted on : <a href="#">June 22, 2019</a></span>
                                                </div>
                                                <div class="blog_desc"> 
                                                    <p>Donec vitae hendrerit arcu, sit ametfaucibus nisl. Cras pretium arcu
                                                        ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent
                                                        ornare tortor ac ante egestas hendrerit. Aliquam et metus pharetra,
                                                        bibendum massa nec, fermentum odio. Nunc id leo ultrices, mollis
                                                        ligula in, finibus tortor. Mauris perferendis officia, nihil
                                                        molestiae!</p>
                                                </div>
                                                <footer class="btn_more">
                                                    <a href="blog-details.html"> Read more</a>
                                                </footer>
                                            </figcaption>
                                        </figure>
                                    </article>
                                    <article class="single_blog">
                                        <figure>
                                            <div class="blog_thumb">
                                                <a href="blog-details.html"><img src="assets/img/blog/blogpage3.jpg"
                                                        alt=""></a>
                                            </div>';
                                            }
                                        ?>
                        <!--blog pagination area start-->
                        <div class="blog_pagination">
                            <div class="pagination">
                                <ul>
                                    <li class="current">1</li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li class="next"><a href="#">next</a></li>
                                    <li><a href="#">>></a></li>
                                </ul>
                            </div>
                        </div>
                        <!--blog pagination area end-->
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="blog_sidebar_widget">
                            <div class="widget_list widget_search">
                                <div class="widget_title">
                                    <h3>Search</h3>
                                </div>
                                <form action="#">
                                    <input placeholder="Search..." type="text">
                                    <button type="submit">search</button>
                                </form>
                            </div>
                            <div class="widget_list comments">
                                <div class="widget_title">
                                    <h3>Recent Comments</h3>
                                </div>
                                <div class="post_wrapper">
                                    <div class="post_thumb">
                                        <a href="blog-details.html"><img src="assets/img/blog/comment2.png.jpg"
                                                alt=""></a>
                                    </div>
                                    <?php
                                        for($i=0;$i<4;$i++){
                                           echo' <div class="post_info">
                                            <span> <a href="#">demo</a> says:</span>
                                            <a href="blog-details.html">Quisque semper nunc</a>
                                        </div>
                                    </div>
                                    <div class="post_wrapper">
                                        <div class="post_thumb">
                                            <a href="blog-details.html"><img src="assets/img/blog/comment2.png.jpg"
                                                    alt=""></a>
                                        </div>';
                                        }
                                    ?>
                                   

                            </div>
                            <div class="widget_list widget_post">
                                <div class="widget_title">
                                    <h3>Recent Posts</h3>
                                </div>
                                <?php 
                                    $arrImg2=array(
                                        "assets/img/blog/blog6.jpg",
                                        "assets/img/blog/blog7.jpg",
                                        "assets/img/blog/blog8.jpg",
                                        "assets/img/blog/blog9.jpg"
                                    );
                                    $array4 = array(
                                        "Blog image post",
                                        "Post with Gallery",
                                        "Post with Audio",
                                        "Post with Video"
                                    );
                                    for($i=0;$i<4;$i++){
                                        echo'<div class="post_wrapper">
                                        <div class="post_thumb">
                                            <a href="blog-details.html"><img src='.$arrImg2[$i].' alt=""></a>
                                        </div>
                                        <div class="post_info">
                                            <h4><a href="blog-details.html">'.$array4[$i].'</a></h4>
                                            <span>March 16, 2018 </span>
                                        </div>
                                    </div>';
                                    }

                                ?>
                            </div>
                            <div class="widget_list widget_categories">
                                <div class="widget_title">
                                    <h3>Categories</h3>
                                </div>
                                <ul>
                                    <li><a href="#">Audio</a></li>
                                    <li><a href="#">Company</a></li>
                                    <li><a href="#">Gallery</a></li>
                                    <li><a href="#">Image</a></li>
                                    <li><a href="#">Other</a></li>
                                    <li><a href="#">Travel</a></li>
                                </ul>
                            </div>
                            <div class="widget_list widget_tag">
                                <div class="widget_title">
                                    <h3>Tag products</h3>
                                </div>
                                <div class="tag_widget">
                                    <ul>
                                        <li><a href="#">asian</a></li>
                                        <li><a href="#">brown</a></li>
                                        <li><a href="#">euro</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--blog area end-->
        </div>
    </div>

    <!--footer area start-->
    <?php include 'layout/footer.php'; ?>
</body>


<!-- Mirrored from template.hasthemes.com/antomi/antomi/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 10:28:42 GMT -->
</html>
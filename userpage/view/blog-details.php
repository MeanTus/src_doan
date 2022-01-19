<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from template.hasthemes.com/antomi/antomi/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 10:28:42 GMT -->
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
                            <li>blog details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--blog body area start-->
    <div class="blog_bg_area">
        <div class="container">
            <div class="blog_page_section">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <!--blog grid area start-->
                        <div class="blog_wrapper blog_details">
                            <article class="single_blog">
                                <figure>
                                    <div class="post_header">
                                        <h3 class="post_title">Aypi non habent claritatem insitam</h3>
                                        <div class="blog_meta">
                                            <span class="author">Posted by : <a href="#">admin</a> / </span>
                                            <span class="meta_date">On : <a href="#">April 10, 2019</a> /</span>
                                            <span class="post_category">In : <a href="#">Company, Image, Travel</a></span>
                                        </div>
                                    </div>
                                    <div class="blog_thumb">
                                        <img src="assets/img/blog/blog-big1.jpg" alt="">
                                    </div>
                                    <figcaption class="blog_content">
                                        <div class="post_content">
                                            <p>Aenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed efficitur ex ultrices. Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh. Phasellus nec lacus id arcu facilisis elementum. Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec iaculis lacus sem non lorem. Duis suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac fringilla mi vehicula nec. Nunc vitae lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus consectetur, placerat suscipit justo dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.</p>
                                            <blockquote>
                                                <p>Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin dictum tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.</p>
                                            </blockquote>
                                            <p>Aenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed efficitur ex ultrices. Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh. Phasellus nec lacus id arcu facilisis elementum. Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec iaculis lacus sem non lorem. Duis suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac fringilla mi vehicula nec. Nunc vitae lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus consectetur, placerat suscipit justo dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.</p>
                                            <p>Suspendisse turpis ipsum, tempus in nulla eu, posuere pharetra nibh. In dignissim vitae lorem non mollis. Praesent pretium tellus in tortor viverra condimentum. Nullam dignissim facilisis nisl, accumsan placerat justo ultricies vel. Vivamus finibus mi a neque pretium, ut convallis dui lacinia. Morbi a rutrum velit. Curabitur sagittis quam quis consectetur mattis. Aenean sit amet quam vel turpis interdum sagittis et eget neque. Nunc ante quam, luctus et neque a, interdum iaculis metus. Aliquam vel ante mattis, placerat orci id, vehicula quam. Suspendisse quis eros cursus, viverra urna sed, commodo mauris. Cras diam arcu, fringilla a sem condimentum, viverra facilisis nunc. Curabitur vitae orci id nulla maximus maximus. Nunc pulvinar sollicitudin molestie.</p>
                                        </div>
                                        <div class="entry_content">
                                            <div class="post_meta">
                                                <span>Tags: </span>
                                                <span><a href="#">, fashion</a></span>
                                                <span><a href="#">, t-shirt</a></span>
                                                <span><a href="#">, white</a></span>
                                            </div>

                                            <div class="social_sharing">
                                                <p>share this post:</p>
                                                <ul>
                                                    <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#" title="google+"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                            <div class="related_posts">
                                <h3>Related posts</h3>
                                <div class="row">
                                    <?php 
                                        $arrImg = array(
                                            "assets/img/blog/blog7.jpg",
                                            "assets/img/blog/blog8.jpg",
                                            "assets/img/blog/blog9.jpg"
                                        );
                                        $array = array(
                                            "Post with Gallery",
                                            "Post with Audio",
                                            "Maecenas ultricies"
                                        );
                                        for($i = 0 ; $i <3 ;$i++)
                                        {
                                           echo' <div class="col-lg-4 col-md-6">
                                        <article class="single_related">
                                            <figure>
                                                <div class="related_thumb">
                                                    <img src='.$arrImg[$i].' alt="">
                                                </div>
                                                <figcaption class="related_content">
                                                    <h4><a href="#">'.$array[$i].'</a></h4>
                                                    <div class="blog_meta">
                                                        <span class="author">By : <a href="#">admin</a> / </span>
                                                        <span class="meta_date"> April 11, 2019	</span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                        </div>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="comments_box">
                                <h3>3 Comments </h3>
                                <?php 
                                    for($i = 0 ; $i<3;$i++)
                                    {
                                        echo '<div class="comment_list">
                                        <div class="comment_thumb">
                                            <img src="assets/img/blog/comment3.png.jpg" alt="">
                                        </div>
                                        <div class="comment_content">
                                            <div class="comment_meta">
                                                <h5><a href="#">Admin</a></h5>
                                                <span>October 16, 2018 at 1:38 am</span>
                                            </div>
                                            <p>But I must explain to you how all this mistaken idea of denouncing pleasure</p>
                                            <div class="comment_reply">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                    </div>';
                                    }
                                ?>
                               
                            <div class="comments_form">
                                <h3>Leave a Reply </h3>
                                <p>Your email address will not be published. Required fields are marked *</p>
                                <form action="#">
                                    <div class="row">
                                    <div class="col-12">
                                            <label for="review_comment">Comment </label>
                                            <textarea name="comment" id="review_comment"></textarea>
                                        </div>
                                        <?php 
                                        $array3 = array(
                                            "Name",
                                            "Email",
                                            "Website"
                                        );
                                        for($i =0 ;$i<3;$i++){
                                            echo'
                                            <div class="col-lg-4 col-md-4">
                                            <label for="author">'.$array3[$i].'</label>
                                            <input id="author" type="text">
                                            </div>';
                                        }
                                        ?>
                                    </div>
                                    <button class="button" type="submit">Post Comment</button>
                                </form>
                            </div>

                        </div>
                        <!--blog grid area start-->
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
                                <?php 
                                    for($i = 0 ;$i<4;$i++){
                                        echo'
                                        <div class="post_wrapper">
                                        <div class="post_thumb">
                                            <a href="blog-details.html"><img src="assets/img/blog/comment2.png.jpg" alt=""></a>
                                        </div>
                                        <div class="post_info">
                                            <span> <a href="#">demo</a> says:</span>
                                            <a href="blog-details.html">Quisque semper nunc</a>
                                        </div>
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
        </div>
    </div>

    <!--blog section area end-->

    <!--footer area start-->
    <?php include "layout/footer.php"; ?>

</body>


<!-- Mirrored from template.hasthemes.com/antomi/antomi/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 10:28:43 GMT -->
</html>
<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from template.hasthemes.com/antomi/antomi/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 10:28:44 GMT -->
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

    <!--about bg area start-->
    <div class="about_bg_area">
        <div class="container">
            <!--about section area -->
            <section class="about_section mb-60">
                <div class="row align-items-center">
                    <div class="col-12">
                        <figure>
                            <div class="about_thumb">
                                <img src="assets/img/about/about1.jpg" alt="">
                            </div>
                            <figcaption class="about_content">
                                <h1>We are a digital agency focused on delivering content and utility user-experiences.</h1>
                                <p>Adipiscing lacus ut elementum, nec duis, tempor litora turpis dapibus. Imperdiet cursus odio tortor in elementum. Egestas nunc eleifend feugiat lectus laoreet, vel nunc taciti integer cras. Hac pede dis, praesent nibh ac dui mauris sit. Pellentesque mi, facilisi mauris, elit sociis leo sodales accumsan. Iaculis ac fringilla torquent lorem consectetuer, sociosqu phasellus risus urna aliquam, ornare.</p>
                                <div class="about_signature">
                                    <img src="assets/img/about/about-us-signature.png" alt="">
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </section>
            <!--about section end-->

            <!--chose us area start-->
            <div class="choseus_area" data-bgimg="assets/img/about/about-us-policy-bg.jpg">
            <div class="row">  
                    <?php 
                    $arrImg = array (
                        "assets/img/about/About_icon1.png" ,
                        "assets/img/about/About_icon2.png" ,
                        "assets/img/about/About_icon3.png" 
                    );
                    $array = array(
                        "Creative Design",
                        "100% Money Back Guarantee",
                        "Online Support 24/7"
                    );
                    for ($i = 0 ;$i<1;$i++)
                    {
                        for ($j = 0 ;$j<3; $j++)
                        {
                            echo'
                            <div class="col-lg-4 col-md-4">
                            <div class="single_chose">
                            <div class="chose_icone">
                                <img src='.$arrImg[$j].' alt="">
                            </div>
                            <div class="chose_content">
                                <h3>'.$array[$j].'</h3>
                                <p>Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare velit amet</p>
                            </div>
                            </div>
                            </div>';
                        }  
                    }
                 ?>
                </div>
            </div>
            <!--chose us area end-->

            <!--services img area-->
            <div class="about_gallery_section mb-55">
                <div class="row">
                    <?php
                    $arrImg2= array(
                        "assets/img/about/about2.jpg",
                        "assets/img/about/about3.jpg",
                        "assets/img/about/about4.jpg"
                    );
                    $arr1 = array(
                        "What do we do?",
                        "Our Mission",
                        "History Of Us"
                    );
                    for($i =0;$i <1;$i++)
                    {
                        for($j =0;$j<3;$j++)
                        {
                        echo'<div class="col-lg-4 col-md-4">
                            <article class="single_gallery_section">
                                <figure>
                                    <div class="gallery_thumb">
                                        <img src='.$arrImg2[$j].' alt="">
                                    </div>
                                    <figcaption class="about_gallery_content">
                                        <h3>'.$arr1[$j].'</h3>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto</p>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>';
                        }
                    }
                    ?>
                </div>
            </div>
            <!--services img end-->

            <!--testimonial area start-->
            <div class="faq-client-say-area">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="section_title">
                            <h2>What can we do for you ?</h2>
                        </div>
                        <div class="faq-style-wrap" id="faq-five">
                            <!-- Panel-default -->
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <a id="octagon" class="collapsed" role="button" data-bs-toggle="collapse" href="#faq-collapse1" aria-expanded="true" aria-controls="faq-collapse1"> <span class="button-faq"></span>Fast Free Delivery</a>
                                </h5>
                            </div>
                            <div id="faq-collapse1" class="collapse show" aria-expanded="true" role="tabpanel" data-parent="#faq-five">
                                <div class="panel-body">
                                    <p>Nam liber tempor cum soluta nobis eleifend option.</p>
                                    <p>Congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me.
                                    </p>
                                    <p> Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                                </div>
                            </div>
                        </div>
                        <!--// Panel-default -->

                        <!-- Panel-default -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <a class="collapsed" role="button" data-bs-toggle="collapse" href="#faq-collapse2" aria-expanded="false" aria-controls="faq-collapse2"> <span class="button-faq"></span>More Than 30 Years In The Business</a>
                                </h5>
                            </div>
                            <div id="faq-collapse2" class="collapse" aria-expanded="false" role="tabpanel" data-parent="#faq-five">
                                <div class="panel-body">
                                    <p>Nam liber tempor cum soluta nobis eleifend option.</p>
                                    <p>Congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me.
                                    </p>
                                    <p> Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                                </div>
                            </div>
                        </div>
                        <!--// Panel-default -->

                        <!-- Panel-default -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <a class="collapsed" role="button" data-bs-toggle="collapse" href="#faq-collapse3" aria-expanded="false" aria-controls="faq-collapse3"> <span class="button-faq"></span>100% Organic Foods</a>
                                </h5>
                            </div>
                            <div id="faq-collapse3" class="collapse" role="tabpanel" data-parent="#faq-five">
                                <div class="panel-body">
                                    <p>Nam liber tempor cum soluta nobis eleifend option.</p>
                                    <p>Congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me.
                                    </p>
                                    <p> Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                                </div>
                            </div>
                        </div>
                        <!--// Panel-default -->

                        <!-- Panel-default -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <a class="collapsed" role="button" data-bs-toggle="collapse" href="#faq-collapse4" aria-expanded="false" aria-controls="faq-collapse4"> <span class="button-faq"></span>Best Shopping Strategies</a>
                                </h5>
                            </div>
                            <div id="faq-collapse4" class="collapse" role="tabpanel" data-parent="#faq-five">
                                <div class="panel-body">
                                    <p>Nam liber tempor cum soluta nobis eleifend option.</p>
                                    <p>Congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me.
                                    </p>
                                    <p> Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                                </div>
                            </div>
                        </div>
                        <!--// Panel-default -->
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="testimonials-area">
                            <div class="section_title">
                                <h2>What Our Customers Says ?</h2>
                            </div>
                            <div class="testimonial-two owl-carousel">
                            <?php 
                                $arrImg3 = array(
                                    "assets/img/about/testimonial1.jpg",
                                    "assets/img/about/testimonial2.jpg",
                                    "assets/img/about/testimonial3.jpg",
                                );
                                for($i = 0 ;$i <3;$i++){
                                echo'<div class="testimonial-wrap-two text-center">
                                    <div class="quote-container">
                                    <div class="quote-image">
                                        <img src='.$arrImg3[$i].' alt="">
                                    </div>
                                    <div class="testimonials-text">
                                        <p>Support and response has been amazing, helping me with several issues I came across and got them solved almost the same day. A pleasure to work with them!</p>
                                    </div>
                                    <div class="author">
                                        <h6>Kathy Young</h6>
                                        <p>CEO of SunPark</p>
                                    </div>
                                    </div>
                                    </div>';
                                }
                            ?>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--testimonial area end-->
        </div>
    </div>
    <!--about bg area end-->

    <!--footer area start-->
    <?php include "layout/footer.php"; ?>
    <!--footer area end-->
</body>


<!-- Mirrored from template.hasthemes.com/antomi/antomi/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 10:28:47 GMT -->
</html>
<?php
$template_dir=get_template_directory_uri();
$root=site_url();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
    <title>A R C H I - Creative Interior Design Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Archi is best selling interior design website template with responsive stunning design">
    <meta name="keywords" content="architecture,building,business,bootstrap,creative,exterior design,furniture design,gallery,garden design,house,interior design,landscape design,multipurpose,onepage,portfolio,studio">
    <meta name="author" content="">

    <!-- CSS Files
    ================================================== -->
    <link href="<?=$template_dir?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap" />
    <link href="<?=$template_dir?>/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css" id="bootstrap-grid" />
    <link href="<?=$template_dir?>/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" id="bootstrap-reboot" />
    <link href="<?=$template_dir?>/css/plugins.css" rel="stylesheet" type="text/css">
    <link href="<?=$template_dir?>/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?=$template_dir?>/css/color.css" rel="stylesheet" type="text/css">

    <!-- color scheme -->
	<link href="<?=$template_dir?>/css/colors/yellow.css" rel="stylesheet" type="text/css" id="colors">

    <!-- revolution slider -->
    <link href="<?=$template_dir?>/rs-plugin/css/settings.css" rel="stylesheet" type="text/css">
    <link href="<?=$template_dir?>/css/rev-settings.css" rel="stylesheet" type="text/css">
</head>

<body id="homepage">

    <div id="wrapper">

        <!-- header begin -->
        <?=get_header()?>
        <!-- header close -->

        <!-- content begin -->
        <div id="content" class="no-bottom no-top">

            <!-- revolution slider begin -->
            <section id="section-slider" class="fullwidthbanner-container" aria-label="section-slider">
                <div id="revolution-slider">
                    <ul>
                        <li data-transition="fade" data-slotamount="10" data-masterspeed="200" data-thumb="">
                            <!--  BACKGROUND IMAGE -->
                            <img src="images/slider/wide1.jpg" alt="" />
                            <div class="tp-caption big-white sft" data-x="0" data-y="150" data-speed="800" data-start="400" data-easing="easeInOutExpo"
                                data-endspeed="450">
                                Our Expertise For
                            </div>

                            <div class="tp-caption ultra-big-white customin customout start" data-x="0" data-y="center" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:2;scaleY:2;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.85;scaleY:0.85;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-speed="800" data-start="400" data-easing="easeInOutExpo" data-endspeed="400">
                                Interior Design
                            </div>

                            <div class="tp-caption sfb" data-x="0" data-y="335" data-speed="400" data-start="800" data-easing="easeInOutExpo">
                                <a href="#" class="btn-slider">Our Portfolio
                                </a>
                            </div>
                        </li>

                        <li data-transition="fade" data-slotamount="10" data-masterspeed="200" data-thumb="">
                            <!--  BACKGROUND IMAGE -->
                            <img src="images/slider/wide2.jpg" alt="" />
                            <div class="tp-caption big-white sft" data-x="0" data-y="160" data-speed="800" data-start="400" data-easing="easeInOutExpo"
                                data-endspeed="450">
                                Featured Project
                            </div>

                            <div class="tp-caption ultra-big-white customin customout start" data-x="0" data-y="center" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:2;scaleY:2;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.85;scaleY:0.85;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-speed="800" data-start="400" data-easing="easeInOutExpo" data-endspeed="400">
                                Green Interior
                            </div>

                            <div class="tp-caption sfb" data-x="0" data-y="335" data-speed="400" data-start="800" data-easing="easeInOutExpo">
                                <a href="#" class="btn-slider">Our Portfolio
                                </a>
                            </div>
                        </li>

                        <li data-transition="fade" data-slotamount="10" data-masterspeed="200" data-thumb="">
                            <!--  BACKGROUND IMAGE -->
                            <img src="images/slider/wide3.jpg" alt="" />
                            <div class="tp-caption big-white sft" data-x="0" data-y="160" data-speed="800" data-start="400" data-easing="easeInOutExpo"
                                data-endspeed="450">
                                Interior Remodeling To Makes
                            </div>

                            <div class="tp-caption ultra-big-white customin customout start" data-x="0" data-y="center" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:2;scaleY:2;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.85;scaleY:0.85;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-speed="800" data-start="400" data-easing="easeInOutExpo" data-endspeed="400">
                                Your Life Easier
                            </div>

                            <div class="tp-caption sfb" data-x="0" data-y="335" data-speed="400" data-start="800" data-easing="easeInOutExpo">
                                <a href="#" class="btn-slider">Our Portfolio
                                </a>
                            </div>
                        </li>

                    </ul>
                </div>
            </section>
            <!-- revolution slider close -->

            <!-- section begin -->
            <section id="section-about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                            <h1>What We Do</h1>
                            <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                            <div class="spacer-single"></div>
                        </div>


                        <div class="col-md-4 wow fadeInLeft">
                            <h3><span class="id-color">Residential</span> Design</h3>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                            ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                            <div class="spacer-single"></div>
                            <a class="image-popup-no-margins" href="images/misc/pic_1.jpg">
                                <img src="images/misc/pic_1.jpg" class="img-responsive" alt="">
                            </a>
                        </div>

                        <div class="col-md-4 wow fadeInUp" data-wow-delay=".2s">
                            <h3><span class="id-color">Office</span> Design</h3>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                            ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                            <div class="spacer-single"></div>
                            <a class="image-popup-no-margins" href="images/misc/pic_2.jpg">
                                <img src="images/misc/pic_2.jpg" class="img-responsive" alt="">
                            </a>
                        </div>

                        <div class="col-md-4 wow fadeInRight">
                            <h3><span class="id-color">Commercial</span> Design</h3>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                            ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                            <div class="spacer-single"></div>
                            <a class="image-popup-no-margins" href="images/misc/pic_3.jpg">
                                <img src="images/misc/pic_3.jpg" class="img-responsive" alt="">
                            </a>
                        </div>

                    </div>
                </div>
            </section>
            <!-- section close -->

            <!-- section begin -->
            <section id="section-steps" class="jarallax text-light">
            	<img src="images/background/bg-2.jpg" class="jarallax-img" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                            <h1>Our Process</h1>
                            <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                            <div class="spacer-single"></div>
                        </div>

                        <div class="col-md-12">
                            <div class="de_tab tab_steps">
                                <ul class="de_nav">
                                    <li class="active wow fadeIn" data-wow-delay="0s"><span>Meet &amp; Agree</span>
                                        <div class="v-border"></div>
                                    </li>
                                    <li class="wow fadeIn" data-wow-delay=".4s"><span>Idea &amp; Concept</span>
                                        <div class="v-border"></div>
                                    </li>
                                    <li class="wow fadeIn" data-wow-delay=".8s"><span>Design &amp; Create</span>
                                        <div class="v-border"></div>
                                    </li>
                                    <li class="wow fadeIn" data-wow-delay="1.2s"><span>Build &amp; Install</span>
                                        <div class="v-border"></div>
                                    </li>
                                </ul>

                                <div class="de_tab_content">

                                    <div id="tab1">
                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                        ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                        explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
                                        sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
                                        porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                                        velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam
                                        aliquam quaerat voluptatem. Ut enim ad minima veniam.
                                    </div>

                                    <div id="tab2">
                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                        ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                        explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
                                        sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
                                        porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                                        velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam
                                        aliquam quaerat voluptatem. Ut enim ad minima veniam.
                                    </div>

                                    <div id="tab3">
                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                        ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                        explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
                                        sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
                                        porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                                        velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam
                                        aliquam quaerat voluptatem. Ut enim ad minima veniam.
                                    </div>

                                    <div id="tab4">
                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                        ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                        explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
                                        sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
                                        porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                                        velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam
                                        aliquam quaerat voluptatem. Ut enim ad minima veniam.
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->


            <!-- section begin -->
            <section id="section-portfolio" class="no-top no-bottom" aria-label="section-portfolio">
                <div class="container">

                    <div class="spacer-single"></div>

                    <!-- portfolio filter begin -->
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
                                <li><a href="#" data-filter="*" class="selected">All Projects</a></li>
                                <li><a href="#" data-filter=".residential">Residential</a></li>
                                <li><a href="#" data-filter=".hospitaly">Hospitaly</a></li>
                                <li><a href="#" data-filter=".office">Office</a></li>
                                <li><a href="#" data-filter=".commercial">Commercial</a></li>
                            </ul>

                        </div>
                    </div>
                    <!-- portfolio filter close -->

                </div>

                <div id="gallery" class="gallery full-gallery de-gallery pf_full_width wow fadeInUp" data-wow-delay=".3s">

                    <!-- gallery item -->
                    <div class="item residential">
                        <div class="picframe">
                            <a class="simple-ajax-popup-align-top" href="project-details-1.html">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Eco Green Interior</span>
                                    </span>
                                </span>
                            </a>
                            <img src="images/portfolio/cols-4/pf%20(1).jpg" alt="" />
                        </div>
                    </div>
                    <!-- close gallery item -->

                    <!-- gallery item -->
                    <div class="item hospitaly">
                        <div class="picframe">
                            <a class="simple-ajax-popup-align-top" href="project-details-2.html">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Modern Elegance Suite</span>
                                    </span>
                                </span>
                            </a>

                            <img src="images/portfolio/cols-4/pf%20(2).jpg" alt="" />
                        </div>
                    </div>
                    <!-- close gallery item -->

                    <!-- gallery item -->
                    <div class="item hospitaly">
                        <div class="picframe">
                            <a class="simple-ajax-popup-align-top" href="project-details-3.html">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Apartment Renovation</span>
                                    </span>
                                </span>
                            </a>

                            <img src="images/portfolio/cols-4/pf%20(3).jpg" alt="" />
                        </div>
                    </div>
                    <!-- close gallery item -->

                    <!-- gallery item -->
                    <div class="item residential">
                        <div class="picframe">
                            <a class="simple-ajax-popup-align-top" href="project-details-youtube.html">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Youtube Video</span>
                                    </span>
                                </span>
                            </a>
                            <img src="images/portfolio/cols-4/pf%20(4).jpg" alt="" />
                        </div>
                    </div>
                    <!-- close gallery item -->

                    <!-- gallery item -->
                    <div class="item office">
                        <div class="picframe">
                            <a class="simple-ajax-popup-align-top" href="project-details-vimeo.html">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Vimeo Video</span>
                                    </span>
                                </span>
                            </a>
                            <img src="images/portfolio/cols-4/pf%20(5).jpg" alt="" />
                        </div>
                    </div>
                    <!-- close gallery item -->

                    <!-- gallery item -->
                    <div class="item commercial">
                        <div class="picframe">
                            <a class="simple-ajax-popup-align-top" href="project-details.html">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Restaurant In Texas</span>
                                    </span>
                                </span>
                            </a>
                            <img src="images/portfolio/cols-4/pf%20(6).jpg" alt="" />
                        </div>
                    </div>
                    <!-- close gallery item -->

                    <!-- gallery item -->
                    <div class="item residential">
                        <div class="picframe">
                            <a class="simple-ajax-popup-align-top" href="project-details-youtube.html">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Summer House</span>
                                    </span>
                                </span>
                            </a>

                            <img src="images/portfolio/cols-4/pf%20(7).jpg" alt="" />
                        </div>
                    </div>
                    <!-- close gallery item -->

                    <!-- gallery item -->
                    <div class="item office">
                        <div class="picframe">
                            <a class="simple-ajax-popup-align-top" href="project-details-vimeo.html">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Office On Space</span>
                                    </span>
                                </span>
                            </a>

                            <img src="images/portfolio/cols-4/pf%20(8).jpg" alt="" />
                        </div>
                    </div>
                    <!-- close gallery item -->

                </div>

                <div id="loader-area">
                    <div class="project-load"></div>
                </div>
            </section>
            <!-- section close -->


            <!-- section begin -->
            <section id="view-all-projects" class="call-to-action bg-color text-center" data-speed="5" data-type="background" aria-label="view-all-projects">
                <a href="project-wide-4-cols.html" class="btn btn-line black btn-big">View All Projects</a>
            </section>
            <!-- logo carousel section close -->


            <!-- section begin -->
            <section id="section-testimonial" class="jarallax text-light">
            	<img src="images/background/bg-3.jpg" class="jarallax-img" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                            <h1>Customer Says</h1>
                            <div class="separator"><span><i class="fa fa-circle"></i></span></div>
                            <div class="spacer-single"></div>
                        </div>
                    </div>
                    <div id="testimonial-carousel" class="owl-carousel owl-theme de_carousel wow fadeInUp" data-wow-delay=".3s">

                        <div class="item">
                            <div class="de_testi">
                                <blockquote>
                                    <p>I'm always impressed with the services. Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                        ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                    <div class="de_testi_by">
                                        John, Customer
                                    </div>
                                </blockquote>

                            </div>
                        </div>

                        <div class="item">
                            <div class="de_testi">
                                <blockquote>
                                    <p>I have very much enjoyed with your services. Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                    <div class="de_testi_by">
                                        Michael, Customer
                                    </div>
                                </blockquote>
                            </div>
                        </div>

                        <div class="item">
                            <div class="de_testi">
                                <blockquote>
                                    <p>I totally recommend your services. Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                        ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                    <div class="de_testi_by">
                                        Patrick, Customer
                                    </div>
                                </blockquote>
                            </div>
                        </div>

                        <div class="item">
                            <div class="de_testi">
                                <blockquote>
                                    <p>I have very much enjoyed with your services. Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                    <div class="de_testi_by">
                                        James, Customer
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section close -->


            <!-- footer begin -->
        <?=get_footer()?>
        <!-- footer close -->

        </div>
    </div>

    <!-- Javascript Files
    ================================================== -->
    <script src="<?=$template_dir?>/js/plugins.js"></script>
    <script src="<?=$template_dir?>/js/designesia.js"></script>

    <!-- SLIDER REVOLUTION SCRIPTS  -->
    <script src="<?=$template_dir?>/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script src="<?=$template_dir?>/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <!-- COOKIES PLUGIN  -->
     <!-- <script>
      $(document).ready(function() {
        $.cookit({
          backgroundColor: '#1c1c1c',
          messageColor: '#fff',
          linkColor: '#fad04c',
          buttonColor: '#fad04c',
          messageText: "This website uses <b>cookies</b> to ensure you get the best experience on our website.",
          linkText: "Learn more",
          linkUrl: "index.html",
          buttonText: "I accept",
        });
      });
    </script> -->


</body>

</html>
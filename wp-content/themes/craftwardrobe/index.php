<?php
$template_dir = get_template_directory_uri();
$root = site_url();
$testimonials_bg = "";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?= get_the_title() ?>
    </title>
    <?php
    include("includes/head.php");
    ?>
</head>

<body id="homepage" class="de_light">

    <div id="wrapper">

        <!-- header begin -->
        <?= get_header() ?>
        <!-- header close -->

        <!-- content begin -->
        <div id="content" class="no-bottom no-top">
            <?php
            $home_list = new WP_Query(
                array(
                    'post_type' => 'home',
                    'post_status' => 'publish'
                )
            );
            if ($home_list->have_posts()) {
                while ($home_list->have_posts()) {
                    $home_list->the_post();
                    // the_field('description')
                    $custom = get_post_custom($post->ID);
                    $testimonials_bg = isset($custom['background']) ? $custom['background'] : "";
                    ?>
                    <!-- section begin -->
                    <section id="section-slider" class="fullwidthbanner-container text-light" aria-label="section-slider">
                        <div id="revolution-slider">
                            <ul>
                                <?php
                                if (isset($custom['hero-banner']))
                                    foreach ($custom['hero-banner'] as $image) {
                                        ?>
                                        <li data-transition="fade" data-slotamount="1" data-masterspeed="800" data-thumb="">
                                            <!--  BACKGROUND IMAGE -->
                                            <img src="<?= wp_get_attachment_url($image) ?>"
                                                alt="<?= get_post_meta($image, '_wp_attachment_image_alt', true) ?>" />
                                        </li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </section>
                    <!-- section close -->

                    <section id="section-intro" class="pt60" data-bgcolor="#efe7d3">
                        <div class="container" style="margin:0; max-width: 100% !important;">
                            <div class="row align-items-center">
                                <?php
                                if (isset($custom['about_us_image']))
                                    foreach ($custom['about_us_image'] as $image) {
                                        ?>
                                        <div class="col-lg-6 col-12">
                                            <!-- <div class="spacer-double sm-hide"></div> -->
                                            <img src="<?= wp_get_attachment_url($image) ?>"
                                                alt="<?= get_post_meta($image, '_wp_attachment_image_alt', true) ?>"
                                                class="img-responsive wow fadeInUp" data-wow-duration="1s"
                                                style="border:2px solid var(--primary-color-1)">
                                        </div>
                                        <?php
                                    }
                                ?>

                                <div class="col-lg-6 wow fadeIn">
                                    <div class="padding20">
                                        <?= isset($custom['about-us']) ? $custom['about-us'][0] : "" ?>

                                        <a href="<?= $root ?>/about-us" class="btn-custom font-weight-bold text-white">Read
                                            More</a>

                                    </div>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </section>
                    <?php
                }
                wp_reset_postdata();
            }
            ?>

            <?php
            $testimonials_list = new WP_Query(
                array(
                    'post_type' => 'testimonials',
                    'post_status' => 'publish'
                )
            );
            if ($testimonials_list->have_posts()) { ?>

                <section id="section-quotes" aria-label="section" class="text-light jarallax" style="padding:20px 0 20px 0;">
                    <img src="<?= wp_get_attachment_url($testimonials_bg[0]) ?>" class="jarallax-img"
                        alt="<?= get_post_meta($testimonials_bg[0], '_wp_attachment_image_alt', true) ?>"
                        style="filter: brightness(70%);">
                    <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                        <h2>Customer Feedback</h2>
                    </div>
                    <div class="container">
                        <div class="row">

                            <div class="col-md-8 offset-md-2 wow fadeInUp">
                                <div id="testimonial-carousel-single" class="owl-carousel owl-theme wow fadeInUp">
                                    <?php
                                    while ($testimonials_list->have_posts()) {
                                        $testimonials_list->the_post();
                                        // the_field('description')
                                        $custom = get_post_custom($post->ID);
                                        ?>
                                        <blockquote class="testimonial-big">
                                            <span class="d-testi" style="padding-bottom:40px;">
                                                <?= isset($custom['message']) ? $custom['message'][0] : "" ?>
                                            </span>
                                            <!-- <span class="name">Benedict Mervine, Customer</span> -->
                                            <?php
                                            for ($i = 0; $i < $custom['rating'][0]; $i++) {
                                                ?>
                                                <i class="fa fa-star" aria-hidden="true" style="color: var(--primary-color-2);"></i>
                                                <?php
                                            } ?>
                                        </blockquote>
                                        <?php
                                    }
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
            }
            ?>


            <?php
            $category_list = new WP_Query(
                array(
                    'post_type' => 'wardrobes',
                    'post_status' => 'publish',
                    'orderby' => 'title',
                    'order' => 'ASC'
                )
            );
            if ($category_list->have_posts()) { ?>
                <section id="section-text">
                    <div class="container" style="max-width:100%;">
                        <div class="row align-items-center">
                            <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                                <h2>Our Categories</h2>
                                <div class="separator mt0"><span><i class="fa fa-circle"></i></span></div>
                                <p>With a focus on furnitures, explore a wide selection of top-quality products designed to
                                    elevate your living spaces with comfort and elegance.</p>
                            </div>
                            <?php
                            while ($category_list->have_posts()) {
                                $category_list->the_post();
                                // the_field('description')
                                $custom = get_post_custom($post->ID);
                                ?>
                                <div class="col-lg-4 wow fadeInRight" data-wow-delay=".3s" style="margin-top:24px;">
                                    <div class="de-card-room">
                                        <a class="d-overlay" href="<?= $root ?>/wardrobe?postID=<?= $post->ID ?>">
                                            <div class="d-content">
                                                <h3 style="padding-bottom: 10%; padding-left: 0px;" class="">
                                                    <?= get_the_title() ?>
                                                </h3>
                                                <span href="#" class="btn-main"></span>
                                            </div>
                                        </a>
                                        <div class="d-image"
                                            data-bgimage="url(<?= isset($custom['thumbnail']) ? wp_get_attachment_url($custom['thumbnail'][0]) : "" ?>) center">
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </section>
                <?php
            }
            ?>

        </div>

        <!-- footer begin -->
        <?= get_footer() ?>
        <!-- footer close -->
    </div>
    <div class="popup_container closePopup">
        <div class="row popup_form_contactus align-items-center">
            <?php
            $contact_list = new WP_Query(
                array(
                    'post_type' => 'contactus',
                    'post_status' => 'publish'
                )
            );
            if ($contact_list->have_posts()) {
                while ($contact_list->have_posts()) {
                    $contact_list->the_post();
                    // the_field('description')
                    $custom = get_post_custom($post->ID);
                    ?>
                    <section id="" class="side-bg no-padding">
                        <?php
                        if (isset($custom['image']))
                            foreach ($custom['image'] as $image) {
                                ?>
                                <div class="image-container col-md-5 pull-left" data-delay="0" style="height:100%;">
                                    <img src="<?= wp_get_attachment_url($image) ?>"
                                        alt="<?= get_post_meta($image, '_wp_attachment_image_alt', true) ?>"
                                        style="object-fit: cover; width: 100%; height: 100%; padding: 0;">
                                    <div class="tp-caption ultra-big-white sfb text-center" data-x="center" data-y="195"
                                        data-speed="800" data-start="500" data-easing="easeInOutExpo" data-endspeed="400"
                                        style="position:relative;top:-90%;">
                                        <h1 style="color:white;">
                                            You've Made the <br>Right Choice!
                                        </h1>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 offset-lg-6 " data-animation="fadeInRight" data-delay="200">
                                    <div class="inner-padding contactForm">
                                        <form name="contactForm" id='contact_form' method="post"
                                            onsubmit="sendMail();return false">
                                            <div class="row">
                                                <div class="col-md-12 mb10">
                                                    <h3>Send Us Message</h3>
                                                </div>
                                                <div class="col-md-6">
                                                    <div id='name_error' class='error'>Please enter your name.</div>
                                                    <div>
                                                        <input type='text' name='Name' id='contact_name' class="form-control"
                                                            placeholder="Your Name" required>
                                                    </div>

                                                    <div id='email_error' class='error'>Please enter your valid E-mail ID.</div>
                                                    <div>
                                                        <input type='email' name='Email' id='contact_email' class="form-control"
                                                            placeholder="Your Email" required>
                                                    </div>

                                                    <div id='phone_error' class='error'>Please enter your phone number.</div>
                                                    <div>
                                                        <input type='text' name='phone' id='contact_phone' class="form-control"
                                                            placeholder="Your Phone" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div id='message_error' class='error'>Please enter your message.</div>
                                                    <div>
                                                        <textarea name='message' id='contact_message' class="form-control"
                                                            placeholder="Your Message" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="checkbox" id="contactTnc">
                                                    <label for="contactTnc">By selecting this,
                                                        you agree to share details with us.</label>
                                                </div>

                                                <div class="col-md-12">
                                                    <!-- <div class="g-recaptcha" data-sitekey="copy-your-site-key-here"></div> -->
                                                    <p id='submit' class="mt20">
                                                        <input type='submit' id='send_message' name="send_message"
                                                            value='Submit Form' class="btn btn-line" disabled>
                                                    </p>
                                                </div>
                                                <div class="col-md-12">
                                                    <div><b id="contact_error"></b></div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="closeContainer align-items-center">
                            <span class="close">&times;</span>
                        </div>
                    </section>
                    <?php
                }
                wp_reset_postdata();
            }
            ?>
        </div>
    </div>

    <!-- Javascript Files
    ================================================== -->
    <script src="<?= $template_dir ?>/js/plugins.js"></script>
    <script src="<?= $template_dir ?>/js/designesia.js"></script>
    <script src="<?= $template_dir ?>/js/jquery.plugin.js"></script>
    <script src="<?= $template_dir ?>/js/jquery.countdown.js"></script>
    <script src="<?= $template_dir ?>/js/countdown-custom.js"></script>
    <script src="<?= $template_dir ?>/js/jquery.event.move.js"></script>
    <script src="<?= $template_dir ?>/js/jquery.twentytwenty.js"></script>

    <!-- SLIDER REVOLUTION SCRIPTS  -->
    <script src="<?= $template_dir ?>/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script src="<?= $template_dir ?>/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="<?= $template_dir ?>/js/sendMail.js"></script>

    <script>
        $(function () {
            // --------------------------------------------------
            // revolution slider
            // --------------------------------------------------
            var revapi;

            revapi = jQuery('#revolution-slider').revolution({
                delay: 3000,
                startwidth: 1170,
                startheight: 500,
                hideThumbs: 10,
                fullWidth: "on",
                fullScreen: "on",
                fullScreenOffsetContainer: "",
                touchenabled: "on",
                navigationType: "none",
                dottedOverlay: ""
            });
        });
    </script>

    <script>
        $(window).on("load", function () {
            $(".twentytwenty-container[data-orientation!='vertical']").twentytwenty({ default_offset_pct: 0.5 });
            $(".twentytwenty-container[data-orientation='vertical']").twentytwenty({ default_offset_pct: 0.5, orientation: 'vertical' });
        });
    </script>


</body>

</html>
<?php
$template_dir = get_template_directory_uri();
$root = site_url();
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
                    ?>
                    <!-- section begin -->
                    <section id="section-slider" class="fullwidthbanner-container text-light" aria-label="section-slider">
                        <div id="revolution-slider">
                            <ul>
                                <?php
                                if (isset($custom['hero-banner']))
                                    foreach ($custom['hero-banner'] as $image) {
                                        ?>
                                        <li data-transition="fade" data-slotamount="10" data-masterspeed="800" data-thumb="">
                                            <!--  BACKGROUND IMAGE -->
                                            <img src="<?= wp_get_attachment_url($image) ?>" alt="" />
                                        </li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </section>
                    <!-- section close -->

                    <section id="section-intro" class="pt60" data-bgcolor="#efe7d3">
                        <div class="container">
                            <div class="row align-items-center">
                                <?php
                                if (isset($custom['about_us_image']))
                                    foreach ($custom['about_us_image'] as $image) {
                                        ?>
                                        <div class="col-lg-6 col-12">
                                            <div class="spacer-double sm-hide"></div>
                                            <img src="<?= wp_get_attachment_url($image) ?>" alt="" class="img-responsive wow fadeInUp"
                                                data-wow-duration="1s">
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

                <section id="section-quotes" aria-label="section" class="text-light jarallax">
                    <img src="<?= $template_dir ?>/images-hotel/bg/1.jpg" class="jarallax-img" alt="">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-8 offset-md-2 wow fadeInUp">
                                <?php
                                while ($testimonials_list->have_posts()) {
                                    $testimonials_list->the_post();
                                    // the_field('description')
                                    $custom = get_post_custom($post->ID);
                                    ?>
                                    <div id="testimonial-carousel-single" class="owl-carousel owl-theme wow fadeInUp">
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
                                    </div>
                                    <?php
                                }
                                wp_reset_postdata();
                                ?>

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
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                                <h2>Our Categories</h2>
                                <div class="separator mt0"><span><i class="fa fa-circle"></i></span></div>
                                <p>With a focus on furnitures, explore a wide selection of top-quality products designed to elevate your living spaces with comfort and elegance.</p>
                            </div>
                            <?php
                            while ($category_list->have_posts()) {
                                $category_list->the_post();
                                // the_field('description')
                                $custom = get_post_custom($post->ID);
                                ?>
                                <div class="col-lg-4 wow fadeInRight" data-wow-delay=".3s" style="margin-top:10px;">
                                    <div class="de-card-room">
                                        <a class="d-overlay" href="<?= $root ?>/wardrobe?postID=<?=$post->ID?>">
                                            <div class="d-content">
                                                <h3 style="padding-bottom: 10%; padding-left: 0px;"><?= get_the_title() ?></h3>
                                                <!-- <div class="d-text"> -->
                                                <!-- <?= $custom['description'][0] ?> -->
                                                <!-- </div> -->
                                                <span href="#" class="btn-main"></span>
                                            </div>
                                        </a>
                                        <div class="d-image" data-bgimage="url(<?= isset($custom['images']) ? wp_get_attachment_url($custom['images'][0]) : "" ?>) center"></div>
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

    <script>
        $(function () {
            // --------------------------------------------------
            // revolution slider
            // --------------------------------------------------
            var revapi;

            revapi = jQuery('#revolution-slider').revolution({
                delay: 15000,
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
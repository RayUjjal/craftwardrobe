<?php
// Template Name: Wardrobe

$template_dir = get_template_directory_uri();
$root = site_url();

$postid = $_GET['postID'];

$post = get_post($postid, OBJECT);
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
    <link href="<?= $template_dir ?>/css/wardrobes.css" rel="stylesheet" type="text/css">
</head>

<body id="homepage" class="de_light">

    <div id="wrapper">

        <!-- header begin -->
        <?= get_header() ?>
        <?php $post = get_post($postid, OBJECT); ?>
        <!-- header close -->
        <?php
        $post_list = new WP_Query(
            array(
                'post_type' => 'wardrobes',
                'post_status' => 'publish',
                'p' => $postid
            )
        );
        ?>
        <?php
        if ($post_list->have_posts()) {
            while ($post_list->have_posts()) {
                $post_list->the_post();
                // the_field('description')
                $custom = get_post_custom($post->ID);
                ?>

                <!-- content begin -->
                <div id="content" class="no-bottom no-top">

                    <section id="section-text" style="padding-top:10%;background:#fff;padding-bottom:5%;">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-12 offset-md-12 text-center wow fadeInUp">
                                    <h2>
                                        <!-- <span class="id-color">The Archi Hotel</span> -->
                                        <?= get_the_title() ?>
                                    </h2>
                                    <div class="separator mt0"><span><i class="fa fa-circle"></i></span></div>
                                    <p>
                                        <?= $custom['description'][0] ?>
                                    </p>
                                </div>

                                <div class="clearfix"></div>

                            </div>
                        </div>
                    </section>

                    <section id="section-images" class="fullwidthbanner-container no-top no-bottom"
                        aria-label="section-portfolio" style="padding-top:0px !important;padding-bottom:50px !important;">
                        <div id="gallery" class="gallery full-gallery de-gallery pf_full_width pf_4_cols wow fadeInUp"
                            data-wow-delay=".3s">

                            <?php
                            if (isset($custom['images']))
                                foreach ($custom['images'] as $image) {
                                    ?>
                                    <!-- gallery item -->
                                    <div class="item residential" style="width:25%;">
                                        <div class="picframe images">
                                            <img src="<?= wp_get_attachment_url($image) ?>"
                                                alt="<?= get_post_meta($image, '_wp_attachment_image_alt', true) ?>"
                                                style="object-fit: cover;height: 220px;" />
                                        </div>
                                    </div>
                                    <!-- close gallery item -->
                                    <?php
                                }
                            ?>
                        </div>
                    </section>
                </div>
                <?php
            }
            wp_reset_postdata();
        }
        ?>

        <!-- footer begin -->
        <?= get_footer() ?>
        <!-- footer close -->

        <div id="image-viewer">
            <span class="close">&times;</span>
            <img class="modal-content" id="full-image">
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

        $(".images img").click(function () {
            $("#full-image").attr("src", $(this).attr("src"));
            $('#image-viewer').show();
        });

        $("#image-viewer .close").click(function () {
            $('#image-viewer').hide();
        });
    </script>

    <script>
        $(window).on("load", function () {
            $(".twentytwenty-container[data-orientation!='vertical']").twentytwenty({ default_offset_pct: 0.5 });
            $(".twentytwenty-container[data-orientation='vertical']").twentytwenty({ default_offset_pct: 0.5, orientation: 'vertical' });
            $(":header").addClass("smaller");
        });
    </script>

</body>

</html>
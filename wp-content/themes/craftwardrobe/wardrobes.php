<?php
// Template Name: Wardrobe

$template_dir = get_template_directory_uri();
$root = site_url();

$postName = $_GET['postName'];

$post = get_page_by_path($postName, OBJECT, 'wardrobes');
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

<body class="de_light">

    <div id="wrapper">

        <!-- header begin -->
        <?= get_header() ?>
        <!-- header close -->
        <?php
        $post_list = new WP_Query(
            array(
                'name' => $postName,
                'post_type' => 'wardrobes',
                'post_status' => 'publish',
                // 'p' => $postid
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

                    <section id="" style="padding-top:0; padding-bottom:24px;">
                        <div class="container" style="max-width:100%;">
                            <div class="row align-items-center" >
                                <?php
                                if (isset($custom['images'])) {
                                    $count = 1;
                                    ?>
                                    <script>
                                        var totalImages = "<?= sizeof($custom['images']) ?>";
                                    </script>
                                    <?php
                                    foreach ($custom['images'] as $image) {
                                        ?>
                                        <div class="col-lg-4 wow fadeInRight" data-wow-delay=".3s" style="padding: 2px;">
                                            <div class="de-card-room images">
                                                <img class="d-image" src="<?= wp_get_attachment_url($image) ?>"
                                                    alt="<?= get_post_meta($image, '_wp_attachment_image_alt', true) ?>" id="img_<?= $count ?>" />
                                            </div>
                                        </div>
                                        <?php
                                        $count++;
                                    }
                                }
                                ?>
                            </div>
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
            <div class="left-arrow"></div>
            <span class="close">&times;</span>
            <img class="modal-content" id="full-image">
            <div class="right-arrow"></div>

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

    <!-- image viewer -->
    <script src="<?= $template_dir ?>/js/image-viewer.js"></script>

    <script>
        $(window).on("load", function () {
            $(".twentytwenty-container[data-orientation!='vertical']").twentytwenty({ default_offset_pct: 0.5 });
            $(".twentytwenty-container[data-orientation='vertical']").twentytwenty({ default_offset_pct: 0.5, orientation: 'vertical' });
            $(":header").addClass("smaller");
        });
    </script>

</body>

</html>
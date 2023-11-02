<?php
// Template Name: Policy Template
$template_dir = get_template_directory_uri();
$root = site_url();

$postName = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?= get_the_title() ?>
    </title>
    <?php
    require("includes/head.php");

    $postData = new WP_Query(
        array(
            'name' => $postName,
            'post_type' => "policy",
            'post_status' => 'publish',
            'posts_per_page' => 100
        )
    );
    ?>
    <link href="<?= $template_dir ?>/css/wardrobes.css" rel="stylesheet" type="text/css">
    <link href="<?= $template_dir ?>/css/blog-inner.css" rel="stylesheet" type="text/css">
</head>

<body class="de_light">

    <div id="wrapper">
        <!-- header begin -->
        <?= get_header() ?>
        <!-- header close -->

        <?php
        if ($postData->have_posts()) {
            while ($postData->have_posts()) {
                $postData->the_post();
                // the_field('description')
                $custom = get_post_custom($post->ID);
                ?>
                <section id="subheader"
                    data-bgimage="url(<?= isset($custom['banner']) ? wp_get_attachment_url($custom['banner'][0]) : "" ?>)"
                    data-stellar-background-ratio=".2">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h1 style="width:100%;">
                                    <?= get_the_title() ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- content begin -->
                <div id="content" class="no-bottom no-top">
                    <section id="section-text" style="padding-top:10%;background:#fff;padding-bottom:5%;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 offset-md-12 wow fadeInUp">
                                    <?= $custom['description'][0] ?>
                                </div>

                                <div class="clearfix"></div>

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
    </div>

    <!-- Javascript Files
    ================================================== -->
    <script src="<?= $template_dir ?>/js/plugins.js"></script>
    <script src="<?= $template_dir ?>/js/designesia.js"></script>

    <!-- SLIDER REVOLUTION SCRIPTS  -->
    <script src="<?= $template_dir ?>/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script src="<?= $template_dir ?>/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

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
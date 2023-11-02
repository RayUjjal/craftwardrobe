<?php
// Template Name: Blog Listing
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
    require("includes/head.php");
    ?>
</head>

<body class="de_light">

    <div id="wrapper">
        <!-- header begin -->
        <?= get_header() ?>
        <!-- header close -->

        <!-- content begin -->
        <div id="content" class="no-bottom no-top">
            <?php
            $home_list = new WP_Query(
                array(
                    'post_type' => 'aboutus',
                    'post_status' => 'publish'
                )
            );
            if ($home_list->have_posts()) {
                while ($home_list->have_posts()) {
                    $home_list->the_post();
                    // the_field('description')
                    $custom = get_post_custom($post->ID);
                    ?>
                    <section id="section-slider" class="fullwidthbanner-container text-light" aria-label="section-slider">
                        <div id="revolution-slider">
                            <ul>
                                <?php
                                if (isset($custom['banner']))
                                    foreach ($custom['banner'] as $image) {
                                        ?>
                                        <li data-transition="fade" data-slotamount="10" data-masterspeed="800" data-thumb="">
                                            <img src="<?= wp_get_attachment_url($image) ?>"
                                                alt="<?= get_post_meta($image, '_wp_attachment_image_alt', true) ?>" />
                                            <div class="tp-caption ultra-big-white sfb text-center" data-x="center" data-y="195"
                                                data-speed="800" data-start="500" data-easing="easeInOutExpo" data-endspeed="400">
                                                <h1 class="bannerheading">Blogs</h1>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </section>
                    <?php
                }
                wp_reset_postdata();
            }
            ?>


            <?php
            $blogs_list = new WP_Query(
                array(
                    'post_type' => 'blogs',
                    'post_status' => 'publish',
                    'orderby' => 'title',
                    'order' => 'ASC'
                )
            );
            if ($blogs_list->have_posts()) { ?>
                <section id="section-text" style="background-color: var(--primary-color-1);">
                    <div class="container" style="max-width:100%;">
                        <div class="row align-items-center">
                            <?php
                            while ($blogs_list->have_posts()) {
                                $blogs_list->the_post();
                                // the_field('description')
                                $custom = get_post_custom($post->ID);
                                $category_detail = get_the_category($post->ID);
                                //isset($category_detail['name'])?$category_detail['name']:""
                                ?>
                                <div class="col-lg-4 wow fadeInRight" data-wow-delay=".3s" style="padding: 2px;">
                                    <div class="de-card-room">
                                        <a class="d-overlay" href="<?= $root ?>/blog?postID=<?= $post->ID ?>">
                                            <div class="d-content">
                                                <span class="d-tag text-dark blog-category">
                                                    <?php
                                                    for ($i = 0; $i < sizeof($category_detail); $i++) {
                                                        echo $category_detail[$i]->name;
                                                        echo $i != (sizeof($category_detail) - 1) ? ", " : "";
                                                    }
                                                    ?>
                                                </span>
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
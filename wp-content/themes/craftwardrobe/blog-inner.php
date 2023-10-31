<?php
// Template Name: Blog Inner
$template_dir = get_template_directory_uri();
$root = site_url();

$postid = $_GET['postID'];
$post = get_post($postid, OBJECT);

$postTitle = get_the_title();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?= get_the_title() ?>
    </title>
    <?php
    require("includes/head.php");

    $blogs_item = new WP_Query(
        array(
            'post_type' => 'blogs',
            'post_status' => 'publish',
            'posts_per_page' => 100,
            'p' => $postid
        )
    );
    ?>
    <link href="<?= $template_dir ?>/css/wardrobes.css" rel="stylesheet" type="text/css">
    <link href="<?= $template_dir ?>/css/blog-inner.css" rel="stylesheet" type="text/css">
</head>

<body id="homepage" class="de_light">

    <div id="wrapper">
        <!-- header begin -->
        <?= get_header() ?>
        <!-- header close -->

        <?php
        if ($blogs_item->have_posts()) {
            while ($blogs_item->have_posts()) {
                $blogs_item->the_post();
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
                                    <?= $postTitle ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
            }
            wp_reset_postdata();
        }
        ?>

        <!-- content begin -->
        <div id="content">
            <div class="container">
                <?php
                if ($blogs_item->have_posts()) {
                    while ($blogs_item->have_posts()) {
                        $blogs_item->the_post();
                        // the_field('description')
                        $custom = get_post_custom($post->ID);
                        ?>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="blog-read">
                                    <div class="post-content">
                                        <div class="post-image">
                                            <img src="<?= isset($custom['thumbnail']) ? wp_get_attachment_url($custom['thumbnail'][0]) : "" ?>"
                                                alt="<?= isset($custom['thumbnail']) ? get_post_meta($custom['thumbnail'][0], '_wp_attachment_image_alt', true) : "" ?>" />
                                        </div>

                                        <div class="date-box">
                                            <?php
                                            $blog_date = isset($custom['blog_date']) ? $custom['blog_date'][0] : "";
                                            // $blog_dateArray = date_parse_from_format('Y-m-d', $blog_date);
                                            $blog_dateArray = explode('-', date("d-M-Y", strtotime($blog_date)));
                                            ?>
                                            <div class="day">
                                                <?= $blog_dateArray[0] ?>
                                            </div>
                                            <div class="month">
                                                <?= strtoupper($blog_dateArray[1]) ?>
                                            </div>
                                        </div>

                                        <div class="post-text">
                                            <!-- <h3><a href="#">5 Things That Take a Room from Good to Great</a></h3> -->
                                            <?= isset($custom['description']) ? $custom['description'][0] : "" ?>
                                        </div>
                                    </div>
                                    <section id="" style="padding-top:0; padding-bottom:24px;background:#fff;">
                                        <div class="container" style="max-width:100%;">
                                            <div class="row align-items-center">
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
                                                        <div class="col-lg-4 wow fadeInRight" data-wow-delay=".3s"
                                                            style="padding: 2px;">
                                                            <div class="de-card-room images">
                                                                <img class="d-image" src="<?= wp_get_attachment_url($image) ?>"
                                                                    alt="<?= get_post_meta($image, '_wp_attachment_image_alt', true) ?>"
                                                                    id="img_<?= $count ?>" />
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
                                    <div class="post-meta" style="margin:0px;">
                                        <span><i class="fa fa-user id-color"></i>
                                            By: <a href="<?= isset($custom['post_by_cta']) ? $custom['post_by_cta'][0] : "#" ?>"
                                                target="_blank">
                                                <?= isset($custom['post_by']) ? $custom['post_by'][0] : "" ?>
                                            </a>
                                        </span>
                                        <span><i class="fa fa-tag id-color"></i>
                                            <?php
                                            $tags_detail = get_the_tags($post->ID);
                                            for ($i = 0; $i < sizeof($tags_detail); $i++) {
                                                echo $tags_detail[$i]->name;
                                                echo $i != (sizeof($tags_detail) - 1) ? ", " : "";
                                            }
                                            ?>
                                        </span>
                                        <span>
                                            <i class="fa fa-bars id-color"></i>
                                            <?php
                                            $category_detail = get_the_category($post->ID);
                                            for ($i = 0; $i < sizeof($category_detail); $i++) {
                                                echo $category_detail[$i]->name;
                                                echo $i != (sizeof($category_detail) - 1) ? ", " : "";
                                            }
                                            ?>
                                            </a>
                                        </span>
                                    </div>
                                    <div class="spacer-single"></div>
                                </div>
                            </div>
                            <?php
                    }
                    wp_reset_postdata();
                }
                ?>

                    <div id="sidebar" class="col-md-4">
                        <div class="widget widget-post">
                            <h4>Recent Posts</h4>
                            <div class="small-border"></div>

                            <ul class="de-bloglist-type-1">
                                <?php
                                $blogs_list = new WP_Query(
                                    array(
                                        'post_type' => 'blogs',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 5,
                                        'orderby' => 'title',
                                        'order' => 'ASC'
                                    )
                                );
                                while ($blogs_list->have_posts()) {
                                    $blogs_list->the_post();
                                    $custom = get_post_custom($post->ID);
                                    if ($post->ID != $postid) {
                                        ?>
                                        <li>
                                            <div class="d-image">
                                                <img src="<?= isset($custom['thumbnail']) ? wp_get_attachment_url($custom['thumbnail'][0]) : "" ?>"
                                                    alt="<?= isset($custom['thumbnail']) ? get_post_meta($custom['thumbnail'][0], '_wp_attachment_image_alt', true) : "" ?>">
                                            </div>
                                            <div class="d-content">
                                                <a href="<?= $root ?>/blog?postID=<?= $post->ID ?>">
                                                    <?= get_the_title() ?>
                                                </a>
                                                <div class="d-date">
                                                    <?php
                                                    $blog_date = isset($custom['blog_date']) ? $custom['blog_date'][0] : "";
                                                    echo date("M d, Y", strtotime($blog_date));
                                                    ?>
                                                </div>
                                            </div>

                                        </li>
                                        <?php
                                    }
                                }
                                wp_reset_postdata();
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        </div>
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

    <!-- SLIDER REVOLUTION SCRIPTS  -->
    <script src="<?= $template_dir ?>/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script src="<?= $template_dir ?>/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <!-- image viewer -->
    <script src="<?= $template_dir ?>/js/image-viewer.js"></script>

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
<?php
$template_dir = get_template_directory_uri();
$root = site_url();

$post_list = new WP_Query(
    array(
        'post_type' => 'wardrobes',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
    )
);
?>
<style>
    a:hover {
        color: var(--primary-color-2) !important;
    }
</style>
<header class="transparent" style="background: rgba(34, 34, 34, .75);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="md-flex">
                    <!-- logo begin -->
                    <div id="logo">
                        <a href="<?= $root ?>">
                            <img class="logo" style="width:80%;" src="<?= get_header_image() ?>" alt="">
                        </a>
                    </div>
                    <!-- logo close -->

                    <!-- small button begin -->
                    <span id="menu-btn"></span>
                    <!-- small button close -->

                    <!-- mainmenu begin -->
                    <div class="md-flex-col">
                        <nav class="md-flex">
                            <ul id="mainmenu" class="no-separator">
                                <li><a href="<?= $root ?>">Home<span></span></a></li>
                                <li><a href="<?= $root ?>/about-us">About Us</a></li>
                                <?php
                                if ($post_list->have_posts()) {
                                    ?>
                                    <li><a href="#">Categories</a>
                                        <ul>
                                            <?php
                                            while ($post_list->have_posts()) {
                                                $post_list->the_post();
                                                the_field('description');
                                                ?>
                                                <li><a href="<?= $root ?>/wardrobe?postID=<?= $post->ID ?>">
                                                        <?= the_title() ?>
                                                    </a></li>
                                                <?php
                                            }
                                            wp_reset_postdata();
                                            ?>
                                        </ul>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </nav>
                        <!-- mainmenu close -->
                    </div>

                    <div class="md-flex-col col-extra white_hover_color">
                        <a href="<?= $root ?>/contact-us" class="btn-on-header btn-line">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
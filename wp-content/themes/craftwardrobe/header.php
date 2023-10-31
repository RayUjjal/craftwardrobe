<?php
$template_dir = get_template_directory_uri();
$root = site_url();

function display_alt_text()
{

    $data = get_object_vars(get_theme_mod('header_image_data'));
    $image_id = is_array($data) && isset($data['attachment_id'])
        ? $data['attachment_id'] : false;

    if ($image_id) {

        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
        return $image_alt;

    } else {
        return "";
    }

}

add_action('wp_enqueue_scripts', 'display_alt_text');

$post_list = new WP_Query(
    array(
        'post_type' => 'wardrobes',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
    )
);

$wardrobe_array=array();
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
                            <img class="logo" style="width:80%;" src="<?= get_header_image() ?>"
                                alt="<?= display_alt_text(); ?>">
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
                                            <script>
                                                var wardrobe_array = [];
                                            </script>
                                            <?php
                                            while ($post_list->have_posts()) {
                                                $post_list->the_post();
                                                // the_field('description');
                                                ?>
                                                <script>
                                                    wardrobe_array.push("<?= the_title() ?>");
                                                </script>
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
                                <li><a href="<?= $root ?>/blogs-listing">Blogs</a></li>
                                <li id="nav_contactus" style="display:none;"><a href="<?= $root ?>/contact-us">Contact Us</a></li>
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
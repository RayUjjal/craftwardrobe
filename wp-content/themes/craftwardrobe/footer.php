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
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <img src="<?= get_header_image() ?>" class="logo-small" alt="">
            </div>

            <div class="col-lg-3">
                <div class="widget widget_recent_post">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="<?= $root ?>">Home</a></li>
                        <li><a href="<?= $root ?>/about-us">About Us</a></li>
                        <li><a href="#">Our Vision</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="widget widget_recent_post">
                    <h3>Categories</h3>
                    <ul>
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
                        <!-- <li><a href="#">Standart Room</a></li>
                        <li><a href="#">Deluxe Room</a></li>
                        <li><a href="#">Luxury Room</a></li>
                        <li><a href="#">Family Room</a></li>
                        <li><a href="#">President Room</a></li> -->
                    </ul>
                </div>
            </div>

            <div class="col-lg-3">
                <h3>Get In Touch</h3>
                <div class="widget widget-address">
                    <address>
                        <span>85 Great Portland Street, First Floor, London, W1W 7L</span>
                        <span><strong>Email:</strong><a
                                href="mailto:info@craftwardrobe.co.uk">info@craftwardrobe.co.uk</a></span>
                        <span><strong>Phone:</strong>+44 2033759375</span>
                        <span><strong></strong>+44 7456610018</span>
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="subfooter">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    &copy; 2023 Craft Wardrobe, Inc. All rights reserved.
                    Designed and developed by <span class="id-color"><a href="#"
                            style="color: var(--primary-color-2);">@Developers</a></span>
                </div>
                <div class="col-md-6 text-right">
                    <div class="social-icons">
                        <a href="https://www.facebook.com/people/Craft-Wardrobe/100091172341094/"><i
                                class="fa fa-facebook fa-lg"></i></a>
                        <a href="https://www.instagram.com/craftwardrobeuk/?igshid=MzRlODBiNWFlZA%3D%3D"><i
                                class="fa fa-instagram fa-lg"></i></a>
                    </div>
                </div>
                <!-- <div class="col-md-6 text-right">
                    <div class="social-icons">
                        <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                        <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
                        <a href="#"><i class="fa fa-rss fa-lg"></i></a>
                        <a href="#"><i class="fa fa-google-plus fa-lg"></i></a>
                        <a href="#"><i class="fa fa-skype fa-lg"></i></a>
                        <a href="#"><i class="fa fa-dribbble fa-lg"></i></a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <a href="#" id="back-to-top"></a>
</footer>
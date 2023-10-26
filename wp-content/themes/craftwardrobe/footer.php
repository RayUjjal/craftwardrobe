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
                <img src="<?= get_header_image() ?>" class="logo-small" alt="<?= display_alt_text(); ?>">
                <?= do_shortcode("[insta-gallery id='0']"); ?>
            </div>

            <!-- <div class="col-lg-3">
                <div class="widget widget_recent_post">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="<?= $root ?>">Home</a></li>
                        <li><a href="<?= $root ?>/about-us">About Us</a></li>
                        <li><a href="#">Our Vision</a></li>
                    </ul>
                </div>
            </div> -->

            <div class="col-lg-3">
                <div class="widget widget_recent_post">
                    <h3>Categories</h3>
                    <ul>
                        <?php
                        if ($post_list->have_posts()) {
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
                <h3>Office Hours</h3>
                <div class="widget widget-address">
                    <address>
                        <span>
                            MONDAY TO FRIDAY<br>
                            9:00 AM - 6:00 PM
                        </span>
                        <span>
                            SATURDAY<br>
                            9:00 AM - 5:00 PM
                        </span>
                        <span>
                            SUNDAYS<br>
                            CLOSED
                        </span>
                    </address>
                </div>
            </div>

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
                    <div class="col-lg-3">
                        <h3>Get In Touch</h3>
                        <div class="widget widget-address">
                            <address>
                                <span>
                                    <?= isset($custom['address']) ? $custom['address'][0] : "" ?>
                                </span>
                                <span>
                                    <div class="row">
                                        <div class="col-4">
                                            <strong>Email:</strong>
                                        </div>
                                        <div class="col-8">
                                            <a href="<?= isset($custom['email']) ? $custom['email'][0] : "" ?>">
                                                <?= isset($custom['email']) ? $custom['email'][0] : "" ?>
                                            </a>
                                        </div>
                                    </div>
                                </span>
                                <span>
                                    <div class="row">
                                        <div class="col-4">
                                            <strong>Phone:</strong>
                                        </div>
                                        <div class="col-8">
                                            <?= isset($custom['phone']) ? $custom['phone'][0] : "" ?>
                                        </div>
                                    </div>
                                </span>
                            </address>
                        </div>
                        <div class="instagram_feed">
                            <h3>Instagram Feed</h3>
                            <?php echo do_shortcode("[catch-instagram-feed-gallery-widget title='' number='9']"); ?>
                        </div>
                    </div>

                    <?php
                }
                wp_reset_postdata();
            }
            ?>
        </div>
    </div>

    <div class="subfooter">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    &copy; 2023 Craft Wardrobe, Inc. All rights reserved.<br>
                    Designed and developed by <span class="id-color"><a href="https://ujjalray.com/"
                            style="color: var(--primary-color-2);" target="_blank">@UjjalRay</a></span> &
                    <span><a href="https://www.linkedin.com/in/rishabhdaliya/" style="color: var(--primary-color-2);"
                            target="_blank">@Rishabhdaliya</a></span>
                </div>
                <div class="col-md-6 text-right">
                    <div class="social-icons">
                        <a href="https://www.facebook.com/people/Craft-Wardrobe/100091172341094/"><i
                                class="fa fa-facebook fa-lg" style="font-size: 30px;"></i></a>
                        <a href="https://www.instagram.com/craftwardrobeuk/?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D"><i
                                class="fa fa-instagram fa-lg" style="font-size: 30px;"></i></a>
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
<?php
// Template Name: Contact Us
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
                                                <h1 class="bannerheading">
                                                    <?= isset($custom['heading']) ? $custom['heading'][0] : "" ?>
                                                </h1>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </section>

                    <section id="section-intro" class="pt60" data-bgcolor="#efe7d3">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                                    <h2>Get In Touch</h2>
                                    <div class="separator mt0"><span><i class="fa fa-circle"></i></span></div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-lg-8 col-12 wow fadeIn">
                                    <div class="padding20">
                                        <div class="padding20">
                                            <?= isset($custom['info']) ? $custom['info'][0] : "" ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12 wow fadeIn">
                                    <div class="padding20">
                                        <h3>Contact Info</h3>
                                        <address>
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

                                            <span>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <strong>Address:</strong>
                                                    </div>
                                                    <div class="col-8">
                                                        <?= isset($custom['address']) ? $custom['address'][0] : "" ?>
                                                    </div>
                                                </div>
                                            </span>
                                        </address>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </section>

                    <!-- <section id="de-map" aria-label="map-container">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="map-container map-fullwidth">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4965.09364761289!2d-0.1538274308631427!3d51.521529564945276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761b3a9cd87457%3A0x9734f33aa59affda!2sThe%20London%20Office!5e0!3m2!1sen!2sin!4v1698087484826!5m2!1sen!2sin"
                                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section> -->

                    <section id="" class="side-bg no-padding">
                        <?php
                        if (isset($custom['image']))
                            foreach ($custom['image'] as $image) {
                                ?>
                                <div class="image-container col-md-5 pull-left" data-delay="0" style="">
                                    <img src="<?= wp_get_attachment_url($image) ?>"
                                        alt="<?= get_post_meta($image, '_wp_attachment_image_alt', true) ?>"
                                        style="object-fit: cover; width: 100%; height: 100%; padding: 0;">
                                    <div class="tp-caption ultra-big-white sfb text-center" data-x="center" data-y="195"
                                        data-speed="800" data-start="500" data-easing="easeInOutExpo" data-endspeed="400"
                                        style="position:relative;top:-90%;">
                                    </div>
                                </div>
                                <?php
                            }
                        ?>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 offset-md-6 " data-animation="fadeInRight" data-delay="200">
                                    <div class="inner-padding">
                                        <form name="contactForm" id='contact_form' method="post"
                                            onsubmit="sendMail();return false">
                                            <div class="row">
                                                <div class="col-md-12 mb10">
                                                    <h3>Send Us Message</h3>
                                                </div>
                                                <div class="col-md-6">
                                                    <div>
                                                        <input type='text' name='Name' id='contact_name' class="form-control"
                                                            placeholder="Your Name" required>
                                                    </div>
                                                    <div>
                                                        <input type='email' name='Email' id='contact_email' class="form-control"
                                                            placeholder="Your Email" required>
                                                    </div>
                                                    <div>
                                                        <input type='text' name='phone' id='contact_phone' class="form-control"
                                                            placeholder="Your Phone" required>
                                                    </div>
                                                    <div>
                                                        <select name="categories_select" id="categories_select" placeholder="Select Category" style="width:100%;" required>
                                                            <option value="categories" disabled selected>Category</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">

                                                    <div id='message_error' class='error'>Please enter your message.</div>
                                                    <div>
                                                        <textarea name='message' id='contact_message' class="form-control"
                                                            placeholder="Your Message" required></textarea>
                                                    </div>

                                                    <div style="display:flex;align-item:center;">
                                                        <input type="file" id="attachment" name="attachment">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <input type="checkbox" id="contactTnc">
                                                    <label for="contactTnc">By selecting this,
                                                        you agree to share details with us.</label>
                                                </div>

                                                <div class="col-md-12">
                                                    <!-- <div class="g-recaptcha" data-sitekey="copy-your-site-key-here"></div> -->
                                                    <p id='submit' class="mt20">
                                                        <input type='submit' id='send_message' name="send_message"
                                                            value='Submit Form' class="btn btn-line" disabled>
                                                    </p>
                                                </div>
                                                <div class="col-md-12">
                                                    <div><b id="contact_error"></b></div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                }
                wp_reset_postdata();
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
    <script src="<?= $template_dir ?>/js/sendMail.js"></script>



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
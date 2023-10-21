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

<body id="homepage" class="de_light">

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
                                            <img src="<?= wp_get_attachment_url($image) ?>" alt="" />
                                            <div class="tp-caption ultra-big-white sfb text-center" data-x="center" data-y="195"
                                                data-speed="800" data-start="500" data-easing="easeInOutExpo" data-endspeed="400">
                                                <h1>
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


                    <section id="" class="side-bg no-padding">
                        <?php
                        if (isset($custom['image']))
                            foreach ($custom['image'] as $image) {
                                ?>
                                <div class="image-container col-md-5 pull-left" data-delay="0">
                                    <img src="<?= wp_get_attachment_url($image) ?>" alt=""
                                        style="object-fit: cover; width: 100%;padding: 0;">
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
                                                    <div id='name_error' class='error'>Please enter your name.</div>
                                                    <div>
                                                        <input type='text' name='Name' id='contact_name' class="form-control"
                                                            placeholder="Your Name" required>
                                                    </div>

                                                    <div id='email_error' class='error'>Please enter your valid E-mail ID.</div>
                                                    <div>
                                                        <input type='email' name='Email' id='contact_email' class="form-control"
                                                            placeholder="Your Email" required>
                                                    </div>

                                                    <div id='phone_error' class='error'>Please enter your phone number.</div>
                                                    <div>
                                                        <input type='text' name='phone' id='contact_phone' class="form-control"
                                                            placeholder="Your Phone" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div id='message_error' class='error'>Please enter your message.</div>
                                                    <div>
                                                        <textarea name='message' id='contact_message' class="form-control"
                                                            placeholder="Your Message" required></textarea>
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

    <script>;
        const contactTnc = document.getElementById('contactTnc')

        contactTnc.addEventListener('change', (event) => {
            if (event.currentTarget.checked) {
                $('#send_message').prop('disabled', false);
            } else {
                $('#send_message').prop('disabled', true);
            }
        })


        function sendMail() {
            var subject=$("#contact_name").val()+" wants to connect";
            var message="Name: "+ $("#contact_name").val()+"<br>"+
            "Email: "+ $("#contact_email").val()+"<br>"+
            "Phone: "+ $("#contact_phone").val()+"<br>"+
            "Message: "+ $("#contact_message").val();

            var data = new FormData();
            data.append('message', message);
            data.append('subject',  subject);
            $.ajax({
                url: "<?=$root?>/wp-json/craftwardrobe/v1/sendmail/",
                cache: false,
                contentType: false,
                processData: false,
                type: 'post',
                data: data,
                dataType: 'JSON',
                success: function (response) {
                    console.log(response.Message);
                    if(response.Message=="Success"){
                        $('#contact_form')[0].reset();
                        $("#contact_error").css("color", "var(--primary-color-1)")
                        $("#contact_error").text("*Mail Sent Successfully");
                    }
                    else{
                        $("#contact_error").css("color", "red")
                        $("#contact_error").text("*Mail Could Not Send.");
                    }

                }
            });
        }
    </script>

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
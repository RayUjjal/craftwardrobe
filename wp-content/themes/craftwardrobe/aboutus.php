<?php
// Template Name: About Us
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
      $home_list = new WP_Query(
        array(
          'post_type' => 'aboutus',
          'posts_per_page' => 100,
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
                      <div class="tp-caption ultra-big-white sfb text-center" data-x="center" data-y="195" data-speed="800"
                        data-start="500" data-easing="easeInOutExpo" data-endspeed="400">
                        <h1 class="bannerheading">About Us</h1>
                      </div>
                    </li>
                    <?php
                  }
                ?>
              </ul>
            </div>
          </section>

          <section id="section-intro">
            <div class="container" style="margin:0; max-width: 100% !important;">
              <div class="row align-items-center">
                <?php
                if (isset($custom['about_us_image']))
                  foreach ($custom['about_us_image'] as $image) {
                    ?>
                    <div class="col-lg-6 col-12">
                      <!-- <div class="spacer-double sm-hide"></div> -->
                      <img src="<?= wp_get_attachment_url($image) ?>"
                        alt="<?= get_post_meta($image, '_wp_attachment_image_alt', true) ?>" class="img-responsive wow fadeInUp"
                        data-wow-duration="1s" style="border:2px solid var(--primary-color-1); max-height:700px; float:right;">
                    </div>
                    <?php
                  }
                ?>

                <div class="col-lg-6 wow fadeIn">
                  <div class="padding20">
                    <?= isset($custom['about-us']) ? $custom['about-us'][0] : "" ?>
                  </div>
                </div>

                <div class="clearfix"></div>
              </div>
            </div>
          </section>

          <section id="section-intro">
            <div class="container" style="margin:0; max-width: 100% !important;">
              <div class="row align-items-center">
                <?php
                if (isset($custom['s2-description__image']))
                  foreach ($custom['s2-description__image'] as $image) {
                    ?>
                    <div class="col-lg-6 col-12">
                      <!-- <div class="spacer-double sm-hide"></div> -->
                      <img src="<?= wp_get_attachment_url($image) ?>"
                        alt="<?= get_post_meta($image, '_wp_attachment_image_alt', true) ?>" class="img-responsive wow fadeInUp"
                        data-wow-duration="1s" style="border:2px solid var(--primary-color-1);max-height:700px; float:right;">
                    </div>
                    <?php
                  }
                ?>
                <div class="col-lg-6 wow fadeIn">
                  <div class="padding20">
                    <h2>
                      <?= isset($custom['s2-heading']) ? $custom['s2-heading'][0] : "" ?>
                    </h2><br>
                    <!-- <div class="separator mt0"><span><i class="fa fa-circle"></i></span></div> -->
                    <?= isset($custom['s2-description']) ? $custom['s2-description'][0] : "" ?>
                  </div>
                </div>
                <div class="clearfix"></div>
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
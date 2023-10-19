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

<body id="homepage">

    <div id="wrapper">

        <!-- header begin -->
        <?= get_header() ?>
        <!-- header close -->

        <!-- content begin -->
        <div id="content" class="no-bottom no-top">
            <!-- footer begin -->
            <?= get_footer() ?>
            <!-- footer close -->
        </div>
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
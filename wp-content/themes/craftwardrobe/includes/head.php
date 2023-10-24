<meta charset="utf-8">
<link rel="icon" href="<?= get_site_icon_url() ?>" type="image/gif" sizes="16x16">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description"
    content="Introducing Craft Wardrobe, an exclusive bespoke furniture service driven by a passion to create visually pleasing and functional spaces. Founded in 2012, the concept behind Craft Wardrobe is to seamlessly blend cultural craftsmanship techniques with modern technology, resulting in exquisite joinery pieces that not only provide ample storage but also make a bold style statement. Originally established as a carpentry business, Craft Wardrobe has grown to become a leading brand for luxurious wardrobes and home storage solutions. Located in the heart of London, we take pride in offering tailor-made designs, expert manufacturing, and impeccable installations, catering to clients across the UK. Experience the epitome of artistry and sophistication with Craft Wardrobe, where creativity knows no bounds.">
<meta name="keywords" content="">
<meta name="author" content="">

<!-- CSS Files
    ================================================== -->
<link href="<?= $template_dir ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap" />
<link href="<?= $template_dir ?>/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css" id="bootstrap-grid" />
<link href="<?= $template_dir ?>/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" id="bootstrap-reboot" />
<link href="<?= $template_dir ?>/css/plugins.css" rel="stylesheet" type="text/css">
<link href="<?= $template_dir ?>/css/style.css" rel="stylesheet" type="text/css">
<link href="<?= $template_dir ?>/css/color.css" rel="stylesheet" type="text/css">
<link href="<?= $template_dir ?>/css/popup.css" rel="stylesheet" type="text/css">

<!-- custom background -->
<link rel="stylesheet" href="<?= $template_dir ?>/css/bg.css" type="text/css">

<!-- color scheme -->
<link rel="stylesheet" href="<?= $template_dir ?>/css/colors/brown.css" type="text/css" id="colors">

<!-- revolution slider -->
<link rel="stylesheet" href="<?= $template_dir ?>/rs-plugin/css/settings.css" type="text/css">
<link rel="stylesheet" href="<?= $template_dir ?>/css/rev-settings.css" type="text/css">

<!-- custom style -->
<link rel="stylesheet" href="<?= $template_dir ?>/css/custom-hotel.css" type="text/css">
<script>
    sessionStorage.setItem("template_dir", "<?= get_template_directory_uri() ?>");
    sessionStorage.setItem("root", "<?= site_url() ?>");
</script>

<?php
session_start();
if (session_status() === PHP_SESSION_ACTIVE) {
    $_SESSION['craftwardrobe'] = true;
} else {
    echo "Session is not started.";
}
?>
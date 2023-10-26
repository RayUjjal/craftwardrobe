<?php
function custom_theme_widgets_init() {
    register_sidebar( array(
        'name'          => 'Craft Wardrobe',
        'id'            => 'craft-wardrobe',
        'description'   => 'craftwardrobe sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'custom_theme_widgets_init' );

add_theme_support('custom-header');
?>
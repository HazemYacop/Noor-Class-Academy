<?php
function noor_class_theme_scripts() {
    wp_enqueue_style( 'noor-main-style', get_template_directory_uri() . '/styles/style.css', array(), '1.0' );
    wp_enqueue_style( 'noor-bg-style', get_template_directory_uri() . '/styles/bg.css', array(), '1.0' );
    wp_enqueue_script( 'noor-script', get_template_directory_uri() . '/scripts/script.js', array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'noor_class_theme_scripts' );
?>

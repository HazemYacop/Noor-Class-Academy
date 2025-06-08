<?php
function noor_class_theme_scripts() {
    wp_enqueue_style( 'noor-main-style', get_template_directory_uri() . '/styles/style.css', array(), '1.0' );
    wp_enqueue_style( 'noor-bg-style', get_template_directory_uri() . '/styles/bg.css', array(), '1.0' );

    if ( is_page() ) {
        wp_enqueue_style( 'noor-page-style', get_template_directory_uri() . '/styles/page.css', array( 'noor-main-style' ), '1.0' );
    }

    if ( is_single() ) {
        wp_enqueue_style( 'noor-single-style', get_template_directory_uri() . '/styles/single.css', array( 'noor-main-style' ), '1.0' );
    }

    if ( is_archive() ) {
        wp_enqueue_style( 'noor-archive-style', get_template_directory_uri() . '/styles/all-posts.css', array( 'noor-main-style' ), '1.0' );
    }

    wp_enqueue_script( 'noor-script', get_template_directory_uri() . '/scripts/script.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'noor_class_theme_scripts' );

function noor_class_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'noor-class' ),
        'footer'  => __( 'Footer Menu', 'noor-class' ),
    ) );
}
add_action( 'after_setup_theme', 'noor_class_theme_setup' );

function noor_class_add_menu_item_class( $classes, $item, $args ) {
    if ( $args->theme_location === 'primary' ) {
        $classes[] = 'nav-item';
    } elseif ( $args->theme_location === 'footer' ) {
        $classes[] = 'footer-item';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'noor_class_add_menu_item_class', 10, 3 );

function noor_class_default_menu() {
    echo '<ul class="nav-items">';
    echo '<li class="nav-item"><a href="' . esc_url( home_url( '/about-us' ) ) . '">About Us</a></li>';
    echo '<li class="nav-item"><a href="' . esc_url( home_url( '/contact-us' ) ) . '">Contact Us</a></li>';
    echo '<li class="nav-item"><a href="' . esc_url( home_url( '/pricings' ) ) . '">Pricings</a></li>';
    echo '<li class="nav-item"><a href="' . esc_url( home_url( '/all-posts' ) ) . '">Blogs</a></li>';
    echo '</ul>';
}

function noor_class_footer_menu_fallback() {
    echo '<ul class="footer-items">';
    echo '<li class="footer-item"><a href="' . esc_url( home_url( '/about-us' ) ) . '">About Us</a></li>';
    echo '<li class="footer-item"><a href="' . esc_url( home_url( '/contact-us' ) ) . '">Contact Us</a></li>';
    echo '<li class="footer-item"><a href="' . esc_url( home_url( '/pricings' ) ) . '">Pricings</a></li>';
    echo '<li class="footer-item"><a href="' . esc_url( home_url( '/all-posts' ) ) . '">Blogs</a></li>';
    echo '</ul>';
}
?>

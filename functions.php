<?php
function noor_class_theme_scripts() {
    wp_enqueue_style( 'noor-main-style', get_template_directory_uri() . '/styles/style.css', array(), '1.0' );
    wp_enqueue_style( 'noor-bg-style', get_template_directory_uri() . '/styles/bg.css', array(), '1.0' );

    if ( is_page_template( 'page-all-posts.php' ) ) {
        wp_enqueue_style( 'noor-all-posts-style', get_template_directory_uri() . '/styles/all-posts.css', array( 'noor-main-style' ), '1.0' );
    } elseif ( is_page() ) {
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
    // Ensure featured images are available for posts and pages.
    add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'noor-class' ),
        'footer'  => __( 'Footer Menu', 'noor-class' ),
    ) );
}
add_action( 'after_setup_theme', 'noor_class_theme_setup' );

function noor_class_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'noor-class' ),
        'id'            => 'primary-sidebar',
        'description'   => __( 'Widgets in this area will be shown on blog posts and archives.', 'noor-class' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-section">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="sidebar-section-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'noor_class_widgets_init' );

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
    echo '<li class="nav-item"><a href="' . esc_url( home_url( '/#about-us' ) ) . '">About Us</a></li>';
    echo '<li class="nav-item"><a href="' . esc_url( home_url( '/#contact-us' ) ) . '">Contact Us</a></li>';
    echo '<li class="nav-item"><a href="' . esc_url( home_url( '/#most-popular-plan' ) ) . '">Pricings</a></li>';
    echo '<li class="nav-item"><a href="' . esc_url( home_url( '/all-posts' ) ) . '">Blogs</a></li>';
    echo '</ul>';
}

function noor_class_footer_menu_fallback() {
    echo '<ul class="footer-items">';
    echo '<li class="footer-item"><a href="' . esc_url( home_url( '/#about-us' ) ) . '">About Us</a></li>';
    echo '<li class="footer-item"><a href="' . esc_url( home_url( '/#contact-us' ) ) . '">Contact Us</a></li>';
    echo '<li class="footer-item"><a href="' . esc_url( home_url( '/#most-popular-plan' ) ) . '">Pricings</a></li>';
    echo '<li class="footer-item"><a href="' . esc_url( home_url( '/all-posts' ) ) . '">Blogs</a></li>';
    echo '</ul>';
}

class Noor_Trending_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'noor_trending_posts',
            __( 'Trending Posts', 'noor-class' )
        );
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Trending Posts', 'noor-class' );
        echo $args['before_title'] . esc_html( $title ) . $args['after_title'];

        $trending = new WP_Query( array( 'posts_per_page' => 3, 'orderby' => 'comment_count' ) );
        if ( $trending->have_posts() ) {
            echo '<ul>';
            while ( $trending->have_posts() ) {
                $trending->the_post();
                echo '<li class="post-link"><a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></li>';
            }
            echo '</ul>';
            wp_reset_postdata();
        }

        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title = isset( $instance['title'] ) ? $instance['title'] : __( 'Trending Posts', 'noor-class' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }
}

class Noor_Latest_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'noor_latest_posts',
            __( 'Latest Posts', 'noor-class' )
        );
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Latest Posts', 'noor-class' );
        echo $args['before_title'] . esc_html( $title ) . $args['after_title'];

        $latest = new WP_Query( array( 'posts_per_page' => 3, 'orderby' => 'date' ) );
        if ( $latest->have_posts() ) {
            echo '<ul>';
            while ( $latest->have_posts() ) {
                $latest->the_post();
                echo '<li class="post-link"><a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></li>';
            }
            echo '</ul>';
            wp_reset_postdata();
        }

        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title = isset( $instance['title'] ) ? $instance['title'] : __( 'Latest Posts', 'noor-class' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }
}

function noor_register_custom_widgets() {
    register_widget( 'Noor_Trending_Widget' );
    register_widget( 'Noor_Latest_Widget' );
}
add_action( 'widgets_init', 'noor_register_custom_widgets' );

function noor_set_posts_per_page( $query ) {
    if ( ! is_admin() && $query->is_main_query() && ( $query->is_home() || $query->is_archive() ) ) {
        $query->set( 'posts_per_page', 6 );
    }
}
add_action( 'pre_get_posts', 'noor_set_posts_per_page' );

function noor_handle_contact_form() {
    $phone   = isset( $_POST['contact_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['contact_phone'] ) ) : '';
    $message = isset( $_POST['contact_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['contact_message'] ) ) : '';

    $admin_email = get_option( 'admin_email' );
    $subject     = __( 'New Contact Message', 'noor-class' );
    $body        = "Phone: $phone\n\n$message";

    wp_mail( $admin_email, $subject, $body );
    wp_safe_redirect( wp_get_referer() ? wp_get_referer() : home_url() );
    exit;
}
add_action( 'admin_post_nopriv_noor_contact_form', 'noor_handle_contact_form' );
add_action( 'admin_post_noor_contact_form', 'noor_handle_contact_form' );

/**
 * Output basic SEO meta tags.
 */
function noor_class_seo_meta_tags() {
    if ( is_singular() ) {
        global $post;
        $title       = single_post_title( '', false );
        $description = has_excerpt( $post ) ? strip_tags( get_the_excerpt( $post ) ) : '';
        $image       = get_the_post_thumbnail_url( $post, 'full' );
        $url         = get_permalink( $post );
    } else {
        $title       = get_bloginfo( 'name' );
        $description = get_bloginfo( 'description' );
        $image       = get_template_directory_uri() . '/assets/logo.png';
        $url         = home_url();
    }

    if ( $description ) {
        echo '<meta name="description" content="' . esc_attr( wp_strip_all_tags( $description ) ) . '" />' . PHP_EOL;
    }
    echo '<link rel="canonical" href="' . esc_url( $url ) . '" />' . PHP_EOL;
    echo '<meta property="og:title" content="' . esc_attr( $title ) . '" />' . PHP_EOL;
    if ( $description ) {
        echo '<meta property="og:description" content="' . esc_attr( wp_strip_all_tags( $description ) ) . '" />' . PHP_EOL;
    }
    echo '<meta property="og:url" content="' . esc_url( $url ) . '" />' . PHP_EOL;
    if ( $image ) {
        echo '<meta property="og:image" content="' . esc_url( $image ) . '" />' . PHP_EOL;
    }
    echo '<meta name="twitter:card" content="summary_large_image" />' . PHP_EOL;
}
add_action( 'wp_head', 'noor_class_seo_meta_tags', 1 );

/**
 * Output minimal structured data for the organization.
 */
function noor_class_structured_data() {
    $data = array(
        '@context' => 'https://schema.org',
        '@type'    => 'Organization',
        'url'      => home_url(),
        'name'     => get_bloginfo( 'name' ),
        'logo'     => get_template_directory_uri() . '/assets/logo.png',
    );

    if ( get_bloginfo( 'description' ) ) {
        $data['description'] = get_bloginfo( 'description' );
    }

    echo '<script type="application/ld+json">' . wp_json_encode( $data ) . '</script>' . PHP_EOL;
}
add_action( 'wp_head', 'noor_class_structured_data', 5 );

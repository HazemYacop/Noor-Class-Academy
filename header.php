<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,400..700;1,400..700&family=Akshar:wght@300..700&family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=BenchNine:wght@300;400;700&family=Manrope:wght@200..800&family=Pragati+Narrow:wght@400;700&family=Rethink+Sans:ital,wght@0,400..800;1,400..800&family=Staatliches&family=Thasadith:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<section id="hero" class="hero">
  <header>
    <nav class="nav-bar">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/logo.png' ); ?>" alt="Noor Class Logo" id="logo" />
      </a>
      <button class="hamburger" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="nav-items-list">
        <button class="close-nav" aria-label="Close navigation">&times;</button>
        <?php
        wp_nav_menu( array(
          'theme_location' => 'primary',
          'container'      => false,
          'menu_class'     => 'nav-menu',
          'fallback_cb'    => 'noor_class_default_menu',
        ) );
      ?>
        <a href="<?php echo esc_url( home_url( '/free-trial' ) ); ?>" class="pri-btn" id="nav-free-trial">
          <span>Free Trial</span>
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/gift-icon.png' ); ?>" alt="gift-icon" class="btn-icon" />
        </a>
      </div>
    </nav>
  </header>

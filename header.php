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
<section class="hero">
  <header>
    <nav class="nav-bar">
      <a href="<?php echo home_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="Noor Class Logo" id="logo" />
      </a>
      <ul class="nav-items">
        <a href="#"><li class="nav-item">About Us</li></a>
        <a href="#"><li class="nav-item">Contact Us</li></a>
        <a href="#"><li class="nav-item">Pricings</li></a>
        <a href="#"><li class="nav-item">Blogs</li></a>
        <a href="#">
          <button class="pri-btn" id="nav-free-trial">
            <span>Free Trial</span>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/gift-icon.png" alt="gift-icon" class="btn-icon" />
          </button>
        </a>
      </ul>
    </nav>
  </header>

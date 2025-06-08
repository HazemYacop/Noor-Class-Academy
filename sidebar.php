<?php if ( is_active_sidebar( 'primary-sidebar' ) ) : ?>
  <div class="sidebar">
    <?php dynamic_sidebar( 'primary-sidebar' ); ?>
  </div>
<?php else : ?>
  <div class="sidebar">
    <div class="sidebar-section" id="trending-posts">
      <h3 class="sidebar-section-title"><?php esc_html_e( 'Trending Articles', 'noor-class' ); ?></h3>
      <ul>
        <li class="post-link"><?php esc_html_e( 'Building a Strong Islamic Identity in the Digital Age', 'noor-class' ); ?></li>
        <li class="post-link"><?php esc_html_e( 'Online Quran Classes vs. Traditional Learning: Which Is Better for Your Child?', 'noor-class' ); ?></li>
        <li class="post-link"><?php esc_html_e( 'The Role of Islamic Education in Developing Good Manners (Akhlaq)', 'noor-class' ); ?></li>
      </ul>
    </div>
    <div class="sidebar-section" id="latest-posts">
      <h3 class="sidebar-section-title"><?php esc_html_e( 'Latest Articles', 'noor-class' ); ?></h3>
      <ul>
        <li class="post-link"><?php esc_html_e( 'Making the Most of Learning During the Blessed Days (Ramadan, Dhul-Hijjah, etc.)', 'noor-class' ); ?></li>
        <li class="post-link"><?php esc_html_e( 'Encouraging Your Child to Speak Arabic: A Language of the Qur’an', 'noor-class' ); ?></li>
        <li class="post-link"><?php esc_html_e( 'Choosing the Right Female Quran Teacher for Your Daughter', 'noor-class' ); ?></li>
      </ul>
    </div>
    <div class="sidebar-section" id="newsletter-form">
      <h3 class="sidebar-section-title"><?php esc_html_e( 'Subscribe To Newsletter', 'noor-class' ); ?></h3>
      <?php echo do_shortcode( '[newsletter_form]' ); ?>
    </div>
  </div>
<?php endif; ?>

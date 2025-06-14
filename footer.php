<footer>
  <div class="footer-container">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><h3 id="footer-logo"><span style="font-weight: bold">Noor</span>Class Academy</h3></a>
    <div class="footer-column">
      <h4 class="footer-column-title">Navigation</h4>
      <?php
        wp_nav_menu( array(
          'theme_location' => 'footer',
          'container'      => false,
          'menu_class'     => 'footer-items',
          'fallback_cb'    => 'noor_class_footer_menu_fallback',
        ) );
      ?>
    </div>
    <div class="footer-column">
      <h4 class="footer-column-title">Contact Us</h4>
      <ul class="footer-items">
        <li class="footer-item">
          <a href="mailto:noor.class.support@gmail.com">noor.class.support@gmail.com</a>
        </li>
        <li class="footer-item">
          <a href="tel:+201102401767">+20 1102401767</a>
        </li>
      </ul>
    </div>
    <?php echo do_shortcode( '[newsletter_form form="2"]' ); ?>
  </div>
  <span id="love">Made with ❤ by <a href="https://github.com/HazemYacop" target="_blank">Hazem Karam</a></span>
</footer>
<?php wp_footer(); ?>
</body>
</html>

      <div class="triangle-shape" class="down-sliding" id="footer-slide"></div>
</section>
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
        <a href="mailto:noor.class.support@gmail.com"><li class="footer-item">noor.class.support@gmail.com</li></a>
        <a href="tel:+201102401767"><li class="footer-item">+20 1102401767</li></a>
      </ul>
    </div>
    <?php echo do_shortcode( '[newsletter_form]' ); ?>
  </div>
  <span id="love">Made with ❤ by <a href="#">Pyxelate</a></span>
</footer>
<?php wp_footer(); ?>
</body>
</html>

<?php get_header(); ?>
      <div class="hero-content">
        <div class="hero-text">
          <h1 id="hero-title"><?php the_title(); ?></h1>
        </div>
      </div>
    </section>
    <section class="page-content">
      <?php
        if ( have_posts() ) :
          while ( have_posts() ) : the_post();
            the_content();
          endwhile;
        else :
          echo '<p>' . esc_html__( 'No content found.', 'noor-class' ) . '</p>';
        endif;
      ?>
    </section>
<?php get_footer(); ?>

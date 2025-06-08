<?php get_header(); ?>
      <div class="hero-content">
        <div class="hero-text">
          <h1 id="hero-title"><?php the_title(); ?></h1>
          <h2 id="hero-description"><?php the_excerpt(); ?></h2>
        </div>
      </div>
    </section>
    <section class="post">
      <div class="post-content">
        <?php if ( has_post_thumbnail() ) : ?>
          <?php the_post_thumbnail( 'full', array( 'id' => 'thumbnail-img' ) ); ?>
        <?php endif; ?>
        <div class="post-text">
          <?php
            if ( have_posts() ) :
              while ( have_posts() ) : the_post();
                the_content();
              endwhile;
            else :
              echo '<p>' . esc_html__( 'No content found.', 'noor-class' ) . '</p>';
            endif;
          ?>
        </div>
      </div>
    </section>
<?php get_footer(); ?>

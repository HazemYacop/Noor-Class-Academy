<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
          <?php the_content(); ?>
        </div>
      </div>
      <?php get_sidebar(); ?>
    </section>
<?php endwhile; else : ?>
    <p><?php esc_html_e( 'No content found.', 'noor-class' ); ?></p>
<?php endif; ?>
<?php get_footer(); ?>

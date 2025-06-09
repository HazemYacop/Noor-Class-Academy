<?php
/* Template Name: All Posts */
get_header();
?>
      <div class="hero-content">
        <div class="hero-text">
          <h1 id="hero-title"><?php the_title(); ?></h1>
        </div>
      </div>
    </section>
    <section class="all-posts">
      <div class="post-container">
        <div class="posts">
          <?php
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $args = array(
              'post_type' => 'post',
              'posts_per_page' => 6,
              'paged' => $paged
            );
            $all_posts = new WP_Query( $args );
            $temp_query = $wp_query;
            $wp_query   = $all_posts;
            if ( $all_posts->have_posts() ) :
              while ( $all_posts->have_posts() ) : $all_posts->the_post();
          ?>
            <a href="<?php the_permalink(); ?>">
              <div class="post-card">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'medium' ); ?>
                  <div class="post-thumbnail" style="background-image:url('<?php echo esc_url( $thumb_url ); ?>')"></div>
                <?php endif; ?>
                <div class="post-info">
                  <h2 class="post-title"><?php the_title(); ?></h2>
                  <h3 class="post-author-and-date"><?php the_author(); ?> - <?php the_time( get_option( 'date_format' ) ); ?></h3>
                  <p class="post-description"><?php echo get_the_excerpt(); ?></p>
                </div>
              </div>
            </a>
          <?php
              endwhile;
          ?>
        </div>
        <div class="navigator">
          <?php
              the_posts_pagination( array( 'mid_size' => 1, 'prev_text' => '<', 'next_text' => '>' ) );
          ?>
        </div>
      </div>
      <?php
            $wp_query = $temp_query;
            wp_reset_postdata();
          else :
            echo '<p>' . esc_html__( 'No posts found.', 'noor-class' ) . '</p>';
          endif;
      ?>
      <?php get_sidebar(); ?>
    </section>
<?php get_footer(); ?>

<aside class="sidebar-events">
    <div class="card">
        <div class="card-body">
            <!-- Heading -->
            <?php if( get_sub_field('heading') ): ?>
            <h3 class="card-title"><?php the_sub_field('heading'); ?></h3>
            <?php endif; ?>

            <!-- WP_Query -->
            <?php $terms = get_sub_field('category'); $post_count = get_sub_field('post_count');
              $tax_posts = new WP_Query( array(
                  'post_type' => 'tribe_events',
                  'posts_per_page' => $post_count,
                  'tax_query' => array( array (
                      'taxonomy' => 'tribe_events_cat',
                      'field'    => 'term_id',
                      'terms'    => $terms ) ),
                  'orderby' => 'title',
                  'order' => 'ASC' ) );
              while ($tax_posts->have_posts()) : $tax_posts->the_post(); ?>

                <article class="category-feed-item col-12">
                    <p><a href="<?php the_permalink() ?>" title="<?php echo get_the_title(); ?>" rel="bookmark"><?php echo get_the_title(); ?></a></p>
                    <p><?php echo tribe_get_start_date( null, false, 'F d, Y' ); ?> @ <?php echo tribe_get_start_time( null, false, 'F d, Y' ); ?></p>
                </article>

              <?php wp_reset_postdata(); ?>
              <?php endwhile; // End of news loop. ?>

            <!-- Button -->
            <?php $button = get_sub_field('post_count'); if( $button ): ?><?php endif; ?>

        </div>
    </div>
</aside>

<h2><?php the_sub_field('heading'); ?></h2>
<?php $post_id = get_sub_field('url', false, false); if( $post_id ): ?>
<a href="<?php echo get_the_permalink($post_id); ?>"><?php echo get_the_title($post_id); ?> - <?php echo get_post_type($post_id); ?></a>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
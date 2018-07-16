<section class="directory-feed" aria-label="Directory">

    <?php if( get_sub_field('fullscreen') ): ?>
    <div class="container-fluid">
    <?php else: ?>
    <div class="container">
    <?php endif; ?>

        <?php if( get_sub_field('heading') ): ?>
            <div class="row">
                <div class="col-12"><h2><?php the_sub_field('heading'); ?></h2></div>
            </div>
        <?php endif; ?>

        <div class="card-deck">
            <?php
            $posts = get_posts(array(
                'posts_per_page'	=> -1,
                'post_type'			=> 'directory',
            ));
            if( $posts ): ?>
            <?php foreach( $posts as $post ): setup_postdata( $post ); ?>

                <div class="card">
                  <?php if( get_sub_field('directory_feed_photo') ): ?>
                          <?php echo wp_get_attachment_image(get_field('photo'), 'portrait-mobile'); ?>
                  <?php endif; ?>
                  <div class="card-body">
                      <h3 class="card-title">
                        <a href="<?php the_permalink(); ?>">
                          <?php echo get_field('directory_first_name'); ?>
                          <?php echo ' ' . get_field('directory_last_name'); ?>
                        </a>
                      </h3>
                      <?php if( get_sub_field('directory_feed_position') ): ?>
                          <p class="card-subtitle text-muted"><?php echo get_field('directory_position'); ?></p>
                      <?php endif; ?>
                      <?php if( get_sub_field('directory_feed_department') ): ?>
                          <p class="card-text">
                            <?php echo '<a href="' . get_field('directory_department')->slug . '">'; ?>
                            <?php echo get_field('directory_department')->name . '</a>'; ?>
                          </p>
                      <?php endif; ?>
                      <?php if( get_sub_field('directory_feed_phone') ): ?>
                          <p class="card-text"><?php echo get_field('directory_phone'); ?></p>
                      <?php endif; ?>
                      <?php if( get_sub_field('directory_feed_email') ): ?>
                          <p class="card-text"><?php echo get_field('directory_email'); ?></p>
                      <?php endif; ?>
                      <?php if( get_sub_field('directory_feed_biography') ): ?>
                          <p class="card-text"><?php echo get_field('directory_biography'); ?></p>
                      <?php endif; ?>
                      <?php if( get_sub_field('directory_feed_social') ): ?>
                        <?php if( have_rows('directory_social_media') ): while( have_rows('directory_social_media') ): the_row(); ?>
                            <?php $link = get_sub_field('directory_social_media_link'); if( $link ): ?>
                                <a class="card-link" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                            <?php endif; ?>
                        <?php endwhile; endif; ?>
                      <?php endif; ?>
                    </div><!-- .card-body -->
              </div><!-- .card -->
            <?php endforeach; ?>
	       <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div><!-- .card-deck -->

    </div><!-- .container -->
</section>
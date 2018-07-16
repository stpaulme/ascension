<section class="content-feed" aria-label="Post Feed">
    
    <?php if( get_sub_field('fullscreen') ): ?>
    <div class="container-fluid">
    <?php else: ?>
    <div class="container">
    <?php endif; ?>
        
        <?php if( get_sub_field('heading') ): ?>
            <div class="row">
                <div class="col"><h2><?php the_sub_field('heading'); ?></h2></div>
            </div>
        <?php endif; ?>

        <div class="card-deck">
            <?php
            $type = get_sub_field('post_select');
            $number = get_sub_field('post_max');
            $posts = get_posts(array(
                'posts_per_page'	=> $number,
                'post_type'			=> $type, 
            ));
            if( $posts ): ?>
            <?php foreach( $posts as $post ): setup_postdata( $post ); ?>
            
                <div class="card">
                    <?php if( get_sub_field('thumbnail_option') ): ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php
                            $alttext = get_the_title();
                            the_post_thumbnail('landscape-mobile', ['class' => 'card-img-top', 'alt' => $alttext]); ?>
                        </a>
                    <?php endif; ?>
                    <?php if( get_sub_field('header_option') ): ?>
                    <div class="card-header">
                        <?php if(is_sticky()): ?>
                            <p>Sticky</p>
                        <?php else: ?>
                            <p class="post-meta"><time datetime="<?php the_time('c'); ?>"><?php the_time('F j, Y'); ?></time></p>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php if( get_sub_field('subtitle_option') ): ?>
                            <p class="card-subtitle text-muted"><?php the_author(); ?></p>
                        <?php endif; ?>
                        <?php if( get_sub_field('categories_option') ): ?>
                            <p class="card-subtitle text-muted"><?php the_category(', '); ?></p>
                        <?php endif; ?>
                        <?php if( get_sub_field('link_option') ): ?>
                            <p class="card-text"><?php $postcontent = get_the_excerpt(); echo $postcontent; ?></p>
                            <a class="button" href="<?php the_permalink(); ?>">Read More</a>
                        <?php else: ?>
                            <p class="card-text">
                            <?php $postcontent = get_the_excerpt(); echo $postcontent; ?>
                            <br><a class="card-link" href="<?php the_permalink(); ?>">Read More »</a>
                            </p>
                        <?php endif; ?>
                    </div>
                    <?php if( get_sub_field('footer_option') ): ?>
                    <div class="card-footer">
                        <?php if ($type == 'post') : ?>
                            <time datetime="<?php the_time('c'); ?>"><?php the_time('F j, Y'); ?></time>
                        <?php elseif ($type == 'tribe_events') : ?>
                            <time datetime="<?php echo tribe_get_start_date(get_the_ID(), false, 'c') ?>"><?php echo tribe_get_start_date(get_the_ID(), false, 'F j, Y') ?></time>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div><!-- .card -->
            
            <?php endforeach; ?>
	       <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div><!-- .card-deck -->
    
    </div><!-- .container -->        
</section>



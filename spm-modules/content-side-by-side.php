<section class="content-side-by-side" aria-label="Side-by-Side Calls to Action">

    <?php
    if ( get_sub_field('fullscreen') ) :
        $container_class = 'container-fluid';
    else :
        $container_class = 'container';
    endif;
    ?>
    
        <?php if( get_sub_field('heading') ): ?>
        <div class="<?php echo $container_class; ?>">
            <div class="row">
                <div class="col"><h2><?php the_sub_field('heading'); ?></h2></div>
            </div>
        </div>
        <?php endif; ?>

        <div class="side-by-side-repeater">
            <?php if( have_rows('side_by_side_repeater') ) : ?>
            <div class="<?php echo $container_class; ?>">
                <div class="row">
                    <?php while ( have_rows('side_by_side_repeater') ) : the_row(); ?>
                    <div class="col-md-6">
                        <?php 
                        $image = get_sub_field('image');
                        $size = 'medium'; // (thumbnail, medium, large, full or custom size)
                        
                        if( $image ) {
                            echo wp_get_attachment_image( $image, $size );
                        }
                        ?>

                        <?php if( get_sub_field('heading') ): ?>
                        <h3><?php the_sub_field('heading'); ?></h3>
                        <?php endif; ?>

                        <?php if( get_sub_field('content') ): ?>
                        <?php the_sub_field('content'); ?>
                        <?php endif; ?>
                        
                        <?php $link = get_sub_field('link'); if( $link ): ?>
                        <a class="btn btn-primary" href="<?php echo $link['url'];?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                        <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>

</section>
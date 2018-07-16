    <section class="hero" aria-labelledby="hero-title" aria-describedby="hero-copy">
        <?php if( !get_sub_field('fullscreen') ): ?>
        <div class="container">
        <?php endif; ?>
            <div class="row">
                <div class="col-12">
                    <?php if( get_sub_field('vignette_filter') ): ?><div class="hero-vignette"><?php endif; ?>
                    <?php echo wp_get_attachment_image(get_sub_field('image'), 'widescreen-desktop', 0, array('class' => 'hero-image')); ?>
                    <?php if( get_sub_field('vignette_filter') ): ?></div><?php endif; ?>
                </div>
                <div class="hero-content col col-lg-6">
                    <?php if( get_sub_field('heading') ): ?>
                        <h2 id="hero-title"><?php the_sub_field('heading'); ?></h2>
                    <?php endif; ?>
                    <?php if( get_sub_field('copy') ): ?>
                        <div class="hero-copy"><p><?php the_sub_field('copy'); ?></p></div>
                    <?php endif; ?>
                    <?php
                    $buttons = get_sub_field('buttons');
                    if( $buttons ):
                        if( have_rows('buttons') ):
                            while ( have_rows('buttons') ) : the_row();
                                $link = get_sub_field('button');
                    ?>
                                <a class="btn btn-primary" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                    <?php
                            endwhile;
                        else :
                            echo "no buttons";
                        endif;
                    endif;
                    ?> 
                </div>
            </div>
        <?php if( !get_sub_field('fullscreen') ): ?>
        </div>
        <?php endif; ?>
    </section>
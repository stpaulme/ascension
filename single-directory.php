<?php get_header(); ?>

<section id="post-wrapper" class="site-content" aria-labelledby="post-title" aria-describedby="content">  
    
    <?php get_template_part('spm-modules/header', 'page'); ?>

    <div class="content-wrapper">
    
        <div class="container">
            <div class="row">
                <main id="content" role="main" class="post-content col-md-7">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <div class="row">
                        <div class="col-md-3">
                        <?php 
                            $photo = get_field('photo');
                            $size = 'thumbnail';
                            if( $photo ) {
                                echo wp_get_attachment_image( $photo, $size );
                            }
                        ?>
                        </div>
                        <div class="col-md-9">
                            <?php if( get_field('directory_position') ): ?>
                            <p class="dir-position"><?php the_field('directory_position'); ?></p>
                            <?php endif; ?>
                         
                            <?php
                            if( get_field('directory_department') ):
                                $department = get_field('directory_department');
                            ?>
                            <p class="dir-department"><?php echo $department->name; ?></p>
                            <?php endif; ?>
                            
                            <?php if( get_field('directory_email') ): ?>
                            <p class="dir-email"><a href="mailto:<?php the_field('directory_email'); ?>"><?php the_field('directory_email'); ?></a></p>
                            <?php endif; ?>
                            
                            <?php if( get_field('directory_phone') ): ?>
                            <p class="dir-phone"><a href="tel:<?php the_field('directory_phone'); ?>"><?php the_field('directory_phone'); ?></a></p>
                            <?php endif; ?>

                            <?php if( get_field('directory_biography') ): ?>
                            <p class="dir-biography"><?php the_field('directory_biography'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endwhile; else : ?>
                        <p><?php _e( 'Sorry, nothing matched your query.' ); ?></p>
                    <?php endif; ?>
                </main>
            </div>
        </div>

    <footer class="post-footer">
        <div class="container">
            <div class="row">
                <?php get_template_part( 'spm-layouts/layout', 'below' ); ?>
            </div>
        </div>
    </footer><!-- #page-footer -->
                        </div>

</section>

<?php get_footer(); ?>
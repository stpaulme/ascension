<?php get_header(); ?>

    <section class="page-wrapper">
        
        <?php get_template_part('spm-modules/header', 'page') ?>

        <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div id="primary" class="content-area col-md-8">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                        <div class="entry">
                            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                <?php the_excerpt(); ?>
                                <a class="btn btn-primary" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read More</a>
                        </div><!-- .entry-content -->

                    <?php endwhile; else : ?>
                        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php endif; ?>

                </div><!-- #primary -->
            </div><!-- .row -->
        </div><!-- .container -->
</div>

<?php get_footer(); ?>
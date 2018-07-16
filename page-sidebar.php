<?php /* Template Name: Sidebar */ get_header(); ?>

<section class="page-wrapper">
        
<?php get_template_part('spm-modules/header', 'page') ?>

        <div class="container">

            <?php get_template_part('spm-layouts/layout', 'page-links'); ?>
            
            <div class="row">
                <main class="page-content col-lg-7">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                    <?php endwhile; else : ?>
                        <p><?php _e( 'Sorry, nothing matched your query.' ); ?></p>
                    <?php endif; ?>
                </main>
                <aside class="page-sidebar col-lg-4 offset-lg-1">
                    <?php get_template_part( 'spm-layouts/layout', 'secondary' ); ?>
                </aside> 
            </div>
        </div>

        <footer class="page-footer">
            <div class="container">
                <div class="row">
                    <?php get_template_part( 'spm-layouts/layout', 'below' ); ?>
                </div>
            </div>
        </footer><!-- #page-footer -->

</section>
<?php get_footer(); ?>
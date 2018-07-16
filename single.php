<?php get_header(); ?>

<section id="post-wrapper" class="site-content" aria-labelledby="post-title" aria-describedby="content">  
    
    <?php get_template_part('spm-modules/header', 'page'); ?>

    <div class="content-wrapper">
    
        <div class="container">
            <div class="row">
                <main id="content" role="main" class="post-content col-md-7">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                    <?php endwhile; else : ?>
                        <p><?php _e( 'Sorry, nothing matched your query.' ); ?></p>
                    <?php endif; ?>
                </main>
                <aside class="post-sidebar col-md-4 offset-md-1">
                    <h3>News Categories</h3>
                    <ul>
                        <?php wp_list_categories( array(
                            'orderby' => 'name',
                            'title_li' => ''
                        ) ); ?> 
                    </ul>
                </aside>
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

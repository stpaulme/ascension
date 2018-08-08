<?php get_header(); ?>

<section id="page-wrapper" class="site-content" role="document" aria-labelledby="page-title" aria-describedby="content">

    <header class="page-header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 id="page-title"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </header><!-- #page-header -->

    <div class="container">
        <div class="row">
            <nav role="navigation" aria-label="Pages in <?php the_title(); ?>" class="page-nav col">
                <ul>
                    <?php
                    wp_list_pages( array(
                        'child_of' => $post->ID,
                        'title_li' => '',
                        'sort_column' => 'post_parent',
                        'depth' => 2,

                    ) );
                    ?>
                </ul>
            </nav>
        </div>
        <div class="row">
            <main id="content" role="main" class="page-content col-lg-7">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
                <?php endwhile; else : ?>
                    <p><?php _e( 'Sorry, nothing matched your query.' ); ?></p>
                <?php endif; ?>
            </main>
            <aside role="complementary" class="page-sidebar col-lg-4 offset-lg-1">
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

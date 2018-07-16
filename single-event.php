<?php get_header(); ?>
<?php include_once('spm-schema/schema-graph.php'); ?>

<section id="event-wrapper" class="site-content" aria-labelledby="post-title" aria-describedby="content">  
    
    <header class="event-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 id="event-title"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </header><!-- #page-header -->

    <div class="container">
        <div class="row">
            <main id="content" role="main" class="event-content col-12 col-md-8">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
                <?php endwhile; else : ?>
                    <p><?php _e( 'Sorry, nothing matched your query.' ); ?></p>
                <?php endif; ?>
            </main>
            <aside class="event-sidebar col-12 col-md-4">
                <h3>Categories</h3>
                <ul>
                    <?php 
                        $terms = get_terms( array('taxonomy' => 'event_categories', 'hide_empty' => false,) ); 
                        foreach ($terms as $term) {echo '<li><a href="/event-category/' . $term->slug . '">' . $term->name . '</a></li>';}
                    ?>
                </ul>
            </aside>
        </div>
    </div>

    <footer class="event-footer">
        <div class="container">
            <div class="row">
                <?php get_template_part( 'spm-layouts/layout', 'below' ); ?>
            </div>
        </div>
    </footer><!-- #page-footer -->

</section>

<?php get_footer(); ?>
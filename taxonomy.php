<?php get_header(); ?>
<?php include_once('spm-schema/schema-graph.php'); ?>

<section id="tax-wrapper" class="site-content" role="main" aria-labelledby="page-title" aria-describedby="content"> 
    
    <header id="tax-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                        $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
                        echo '<p><a href="' . $term->slug . '">' . $term->name . '</a></p>';
                    ?>
                    <h1 id="tax-title"><?php single_cat_title(); ?></h1>
                </div>
            </div>
        </div>
    </header><!-- #page-header -->
    
    <div class="container">
        <div class="row">
            <main id="content" role="main" class="tax-content col-12 col-md-8">
                <div class="row">
                    <?php
                    $queried_object = get_queried_object();
                    $slug = get_queried_object()->slug;
                    $name = get_queried_object()->name;
                    $tax = get_queried_object()->taxonomy;
                    $terms = get_queried_object()->term_id;
                    $tax_posts = new WP_Query( 
                        array(  
                            'post_type' => 'recipe',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array (
                                'taxonomy' => $tax,
                                'field'    => 'term_id',
                                'terms'    => $terms
                                )
                            ),
                            'orderby' => 'title',
                            'order' => 'ASC'
                        )
                    );
                    while ($tax_posts->have_posts()) : $tax_posts->the_post(); ?>

                    <article class="tax-item col-12">
                        <a href="<?php the_permalink() ?>" title="<?php echo get_the_title(); ?>"><?php the_post_thumbnail( 'archives' ); ?></a>
                        <h2><a href="<?php the_permalink() ?>" title="<?php echo get_the_title(); ?>" rel="bookmark"><?php echo get_the_title(); ?></a></h2>
                    </article>

                    <?php wp_reset_postdata(); ?>
                    <?php endwhile; // End of news loop. ?>
                </div>
            </main>
            <aside class="tax-sidebar col-12 col-md-4">
                <h3>Categories</h3>
                <ul>
                    <?php
                        $queried_object = get_queried_object();
                        var_dump( $queried_object );
                        echo get_taxonomy($queried_object->name); 
                    ?>
                </ul>
            </aside>
        </div>
    </div>
</section>

<?php get_footer(); ?>
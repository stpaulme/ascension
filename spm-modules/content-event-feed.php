<?php // Events Feed
    $today = date('Ymd');
    $relatedposts = new WP_Query( array(
    'posts_per_page'=> 3, 
    'post_type' => 'events',
    'meta_key' => 'start_date',
    'orderby' => 'meta_value',
    'order'	=> 'ASC',
    'ignore_sticky_posts' => 1,
    'meta_query' => array(
        array(
            'key'	=> 'start_date', 
            'compare' => '>=', 
            'value' => $today,)
    ) ) ); 
    while ($relatedposts->have_posts()) : $relatedposts->the_post(); ?>
    
    <div class="card-deck">
        <div class="card">
            <div class="card-body">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div>

<?php wp_reset_postdata(); // Reset that loop. ?>
<?php endwhile; // End of news loop. ?>
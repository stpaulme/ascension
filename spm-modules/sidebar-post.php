<?php
    $post_object = get_sub_field('blog_post_selector'); 
    if( $post_object ): $post = $post_object; setup_postdata( $post );
?>

<aside class="sidebar-post">    
    <article class="card">
        <?php the_post_thumbnail('blog', array('class' => 'card-img-top')); ?>
        <div class="card-body">

        <h3 class="card-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
        <?php
            $storyLink = get_the_permalink();
            $storyContent = the_excerpt();
            echo '<p class="card-text">' . $storyContent . '<a class="card-link" href="' . $storyLink . '">Read More</a></p>';
        ?>
        </div>

        <?php wp_reset_postdata(); ?>      
        <?php endif; ?>
    </article>
</aside>
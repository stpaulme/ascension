<aside id="blog-post" class="container">
    <!-- Sidebar Navigation Styling -->
    <style>
        #blog-post {}
        #blog-post .box {border:1px solid #CCCCCC;background:#f1f1f1;padding:15px;margin-bottom:30px;}
        @media (min-width: 576px) {}
        @media (min-width: 768px) {}
        @media (min-width: 992px) {}
        @media (min-width: 1200px) {}
    </style>
    
    <!-- Sidebar Navigation Logic -->
    <div class="box">
        <?php $post_object = get_sub_field('blog_post_selector'); 
        if( $post_object ): $post = $post_object; setup_postdata( $post ); ?>
            <article class="sidebarStory">
                <?php the_post_thumbnail('blog'); ?>
                <div class="sidebarStoryContent">
                    <h3 class="ctaStoryTitle"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                    <?php $storyLink = get_the_permalink(); $storyContent = the_excerpt();
                    echo '<p>' . $storyContent . '<a class="readMore" href="' . $storyLink . '">Read More »</a></p>'; ?>
                </div>
            </article>
        <?php wp_reset_postdata(); ?>      
        <?php endif; ?>
    </div>
</aside>
<aside class="sidebar-search">
    <div class="card">
        <div class="card-body">
            <!-- Heading -->
            <?php if( get_sub_field('search_box_title') ): ?>
            <h3 class="card-title"><?php the_sub_field('search_box_title'); ?></h3>
            <?php endif; ?>
            
            <!-- Search Box -->
            <?php
            if( get_sub_field('search_box_type') ) {
                $post_types_arr = get_sub_field('search_box_type');
                $post_types_str = implode (", ", $post_types_arr);
            
                $shortcode = sprintf(
                    '[searchandfilter fields="search" post_types="%1$s"]',
                    $post_types_str
                );
            } else {
                $shortcode = '[searchandfilter fields="search"]';
            }
            
            echo do_shortcode( $shortcode );
            ?>
        </div>
    </div>
</aside>
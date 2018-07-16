<?php
if ( get_field('page_links_on') || is_page_template('page-sidebar.php') ) :

    $level = count(get_post_ancestors( $post->ID )) + 1;

    $parent = $post->post_parent;
    $children = get_pages('child_of='.$post->ID);
    $siblings =  get_pages('child_of='.$parent);
    
    $args = array(
        'depth' => 1,
        'title_li' => '',
    );

    if ( $level == 1 ) :
        if ( $children ) :
            $args['child_of'] = $post->ID;
        else :
            $args = array();
        endif;
    else :
        $args['child_of'] = $parent;
    endif;

    if ( $args ) :
?>
<div class="row">
    <nav class="page-nav col">
        <ul>
            <?php wp_list_pages( $args ); ?>
        </ul>
    </nav>
</div>
<?php
    endif;
endif;
?>
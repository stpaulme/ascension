<?php
/**
 * Template Name: Directory
 */
$queried_object = get_queried_object();

$context = Timber::get_context();
$post = new TimberPost();

$parent_page_args = array(
    'post_type'         => 'page',
    'page_id'           => $post->post_parent,
);
$parent_page = Timber::get_posts( $parent_page_args );

$other_page_args = array(
    'post_type'         => 'page',
    'post_parent'       => $post->post_parent,
    'posts_per_page'    => -1,
    'order'             => 'ASC',
    'orderby'           => 'menu_order'
);
$other_pages = Timber::get_posts( $other_page_args );

$menu_items = array_merge( $parent_page, $other_pages );

$directory_args = array(
    'posts_per_page' => -1,
);

if ( is_page('Board') ) :
    $directory_args['post_type'] = 'board';
    $directory_args['meta_key'] = 'last_name';
	$directory_args['orderby'] = array (
        'meta_value' => 'ASC',
    );
elseif ( is_page('Staff') ) :
    $directory_args['post_type'] = 'staff';
    $directory_args['meta_query'] = array(
            array(
                'relation' => 'AND',
                'position_clause' => array(
                    'key'       => 'position',
                    'compare'   => 'EXISTS',
                ),
                'last_name_clause' => array(
                    'key'       => 'last_name',
                    'compare'   => 'EXISTS',
                ),
            )
        );
        // Order by position, then last name
        $directory_args['orderby'] = array (
            'position_clause' => 'ASC',
            'last_name_clause' => 'ASC',  
        );
endif;

$context['post'] = $post;
$context['template'] = 'directory';
$context['menu_items'] = $menu_items;
$context['current'] = $queried_object->ID;
$context['title'] = $post->name;
$context['members'] = Timber::get_posts( $directory_args );

Timber::render( array( 'custom-directory.twig' ), $context );
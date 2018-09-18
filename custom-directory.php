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
    'post_type' => $post->slug,
    'posts_per_page' => -1,
    'meta_key' => 'last_name',
	'orderby' => array (
        'meta_value' => 'ASC',
    ),
);

$context['post'] = $post;
$context['template'] = 'directory';
$context['menu_items'] = $menu_items;
$context['current'] = $queried_object->ID;
$context['title'] = $post->name;
$context['members'] = Timber::get_posts( $directory_args );

Timber::render( array( 'custom-directory.twig' ), $context );
<?php
/**
 * Template Name: Podcast
 */
$queried_object = get_queried_object();

global $paged;
if (!isset($paged) || !$paged){
    $paged = 1;
}

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

$context['post'] = $post;
$context['menu_items'] = $menu_items;
$context['current'] = $queried_object->ID;
$context['title'] = $post->name;
$podcast_args = array(
    'post_type'         => 'podcast',
    'posts_per_page'    => 5,
    'paged' => $paged,
);
$context['posts'] = new Timber\PostQuery($podcast_args);

$sidebar_context = array();
$sidebar_context['post'] = $post;
$context['sidebar'] = Timber::get_sidebar('sidebar.twig', $sidebar_context);

Timber::render( array( 'custom-podcast.twig' ), $context );
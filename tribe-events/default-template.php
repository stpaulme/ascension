<?php /** * Default Events Template * This file is the basic wrapper template for all the views if 'Default Events Template' * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
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

$context['post'] = $post;
$context['current'] = $queried_object->ID;
$context['title'] = 'Events';

Timber::render('templates/page-events.twig', $context);
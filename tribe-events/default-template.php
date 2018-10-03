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

$context['post'] = $post;
$context['current'] = $queried_object->ID;
$context['title'] = 'Events';

Timber::render('templates/page-events.twig', $context);
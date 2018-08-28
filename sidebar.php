<?php
/**
 * The Template for the sidebar containing the main widget area
 *
 *
 * @package  WordPress
 * @subpackage  Timber
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
Timber::render('sidebar.twig', $context);
<?php
$context = Timber::get_context();
$post = new TimberPost();

$context['post'] = $post;
$context['title'] = $post->name;

$context['attachment'] = wp_get_attachment_image( $post->id );
$context['attachment_caption'] = wp_get_attachment_caption( $post->id );

Timber::render( array( 'attachment.twig' ), $context );
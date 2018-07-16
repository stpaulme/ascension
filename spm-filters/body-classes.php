<?php
//////////////////////////////////////////////
// ADD BODY CLASSES TO PAGES, POSTS, AND ARCHIVES
//////////////////////////////////////////////
function about_body_class( $classes ) {
 
    if ( is_page_template( array(
        'page-full-width.php',
                                ) ) ) {
        $classes[] = 'full-width';
    }
    if ( is_page_template( array(
        'page-sidebar-left.php',
                                ) ) ) {
        $classes[] = 'sidebar-left';
    }
    if ( is_page_template( array(
        'page-sidebar-right.php',
                                ) ) ) {
        $classes[] = 'sidebar-right';
    }
    if ( is_page_template( array(
        'page-sidebar-both.php',
                                ) ) ) {
        $classes[] = 'sidebar-both';
    }
    if ( is_post_type_archive('events') ) {
        $classes[] = 'events-archive';
    }
    if ( is_post_type_archive('stories') ) {
        $classes[] = 'stories-archive';
    }
    if ( is_archive( array(
        'taxonomy-focus.php',
        'taxonomy-region.php',
        'taxonomy-season.php',
                                ) ) ) {
        $classes[] = 'grantees-archive';
    }

      
    return $classes;
     
}
add_filter( 'body_class','about_body_class' );
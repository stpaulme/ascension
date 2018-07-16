<?php
    
    function spm_resources() {
    
    global $post;
    
    $spm_terms = wp_get_object_terms( $post->ID,  'subject' );
        foreach( $spm_terms as $term ) {
        echo '<li><a href="' . get_term_link( $term->slug, 'subject' ) . '">' . esc_html( $term->name ) . '</a></li>'; 
    }
    
    $spm_terms = wp_get_object_terms( $post->ID,  'types' );
        foreach( $spm_terms as $term ) {
        echo '<li><a href="' . get_term_link( $term->slug, 'types' ) . '">' . esc_html( $term->name ) . '</a></li>'; 
    }

}
<?php
    
    function spm_trainings() {
    
    global $post;
    
    $spm_terms = wp_get_object_terms( $post->ID,  'location' );
        foreach( $spm_terms as $term ) {
        echo '<li><a href="' . get_term_link( $term->slug, 'location' ) . '">' . esc_html( $term->name ) . '</a></li>'; 
    }
    
    $spm_terms = wp_get_object_terms( $post->ID,  'delivery' );
        foreach( $spm_terms as $term ) {
        echo '<li><a href="' . get_term_link( $term->slug, 'delivery' ) . '">' . esc_html( $term->name ) . '</a></li>'; 
    }

}
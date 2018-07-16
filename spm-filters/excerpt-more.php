<?php
//////////////////////////////////////////////
//  SET DEFAULT EXCERPT LENGTH
//////////////////////////////////////////////
function wpdocs_excerpt_more( $more ) {
    return sprintf( '...' );
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
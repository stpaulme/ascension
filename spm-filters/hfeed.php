<?php
//////////////////////////////////////////////
//  ADD 'HFEED' CLASS TO INDEXES
//////////////////////////////////////////////
function spm_x_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'spm_x_body_classes' );
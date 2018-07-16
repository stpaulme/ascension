<?php
//////////////////////////////////////////////
//  SET DEFAULT EXCERPT LENGTH
//////////////////////////////////////////////
function spm_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'spm_excerpt_length', 999 );
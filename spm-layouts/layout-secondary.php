<?php
// check if the flexible content field has rows of data
if( have_rows('sidebar') ):

     // loop through the rows of data
    while ( have_rows('sidebar') ) : the_row();

        if( get_row_layout() == 'navigation' ):

            get_template_part( 'spm-modules/sidebar', 'navigation' );

        elseif( get_row_layout() == 'search' ):

            get_template_part( 'spm-modules/sidebar', 'search' );

        elseif( get_row_layout() == 'post' ):

            get_template_part( 'spm-modules/sidebar', 'post' );

        elseif( get_row_layout() == 'cta' ):

            get_template_part( 'spm-modules/sidebar', 'cta' );

        elseif( get_row_layout() == 'taxonomy' ):

            get_template_part( 'spm-modules/sidebar', 'taxonomy' );

        elseif( get_row_layout() == 'upcoming_events' ):

            get_template_part( 'spm-modules/sidebar', 'events' );

        endif;

    endwhile;

else :

    //no layouts

endif;

?>

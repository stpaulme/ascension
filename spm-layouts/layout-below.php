<?php
// check if the flexible content field has rows of data
if( have_rows('lower_layout') ):

     // loop through the rows of data
    while ( have_rows('lower_layout') ) : the_row();

        if( get_row_layout() == 'feed' ):

            get_template_part( 'spm-modules/content', 'feed' );

            elseif( get_row_layout() == 'side_by_side' ): 

                get_template_part( 'spm-modules/content', 'side-by-side' );

        endif;

    endwhile;

else :

    // no layouts found

endif;

?>
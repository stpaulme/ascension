<?php
// check if the flexible content field has rows of data
if( have_rows('special_functions') ):

     // loop through the rows of data
    while ( have_rows('special_functions') ) : the_row();

        if( get_row_layout() == 'search_box' ): 

            get_template_part( 'spm-modules/content', 'search' );
        
        elseif( get_row_layout() == 'sidebar_taxonomy' ): 

            get_template_part( 'spm-modules/sidebar', 'taxonomy' );

        endif;

    endwhile;

else :

    // no layouts found

endif;

?>
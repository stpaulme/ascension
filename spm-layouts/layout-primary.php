<?php
// check if the flexible content field has rows of data
if( have_rows('primary_fields') ):

     // loop through the rows of data
    while ( have_rows('primary_fields') ) : the_row();

        if( get_row_layout() == 'hero' ):

            get_template_part( 'spm-modules/content', 'hero' );

        elseif( get_row_layout() == 'cta' ):

            get_template_part( 'spm-modules/content', 'cta' );

        elseif( get_row_layout() == 'basic' ):

            get_template_part( 'spm-modules/content', 'basic' );

        elseif( get_row_layout() == 'feed' ):

            get_template_part( 'spm-modules/content', 'feed' );

        elseif( get_row_layout() == 'buttons' ): 

            get_template_part( 'spm-modules/content', 'buttons' );

        elseif( get_row_layout() == 'side_by_side' ): 

            get_template_part( 'spm-modules/content', 'side-by-side' );
        
        elseif( get_row_layout() == 'directory_feed' ): 

            get_template_part( 'spm-modules/content', 'directory' );

        endif;

    endwhile;

else :

    // no layouts found

endif;

?>

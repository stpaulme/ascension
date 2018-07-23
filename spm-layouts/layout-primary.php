<?php
if( have_rows('primary_fields') ):
    
    while ( have_rows('primary_fields') ) : the_row();
    
        // Save current layout, replacing ACF's underscores with dashes for WP
        $layout = str_replace( "_", "-", get_row_layout() );
        
        get_template_part( 'spm-modules/content', $layout );
    
    endwhile;

else :

    // No layouts found

endif;
?>
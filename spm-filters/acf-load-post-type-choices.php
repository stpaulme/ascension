<?php
//////////////////////////////////////////////
//  ACF LOAD POST TYPE CHOICES
//////////////////////////////////////////////

function acf_load_post_type_choices( $field ) {

    $field['choices'] = array();
    $choices = get_post_types( array('public' => true) );

    if( is_array($choices) ) {
        foreach( $choices as $choice ) {
            $field['choices'][ $choice ] = $choice;
        }
    }
    
    return $field;
}

add_filter('acf/load_field/name=search_box_type', 'acf_load_post_type_choices');

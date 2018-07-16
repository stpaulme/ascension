<?php
//////////////////////////////////////////////
//  REMOVE 'ARCHIVE/CATEGORY' FROM ARCHIVE TITLES
//////////////////////////////////////////////
function modify_archive_title( $title ) { 
    if( is_category() ) 
    { $title = single_cat_title( '', false ); }
return $title; }
add_filter( 'get_the_archive_title', 'modify_archive_title' ); 
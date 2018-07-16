<?php
//////////////////////////////////////////////
// HIDE ACF ADMIN ON NON-LOCAL DOMAINS
//////////////////////////////////////////////
function hide_acf_admin() {

    // Site URL
    $site_url = get_bloginfo( 'url' );
    
    if (strpos($site_url, '.local') !== false) {
        // .local is in the URL; show the ACF menu item
        return true;
    } else {
        // .local is not in the URL; hide the ACF menu item
        return false;
    }
  
}

add_filter('acf/settings/show_admin', 'hide_acf_admin');
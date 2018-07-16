<?php
//////////////////////////////////////////////
//  ACF OPTIONS
//////////////////////////////////////////////

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point( $path ) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}
/**
 * Implement the Custom Fields Options Page
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Basic Information',
		'menu_title'	=> 'Organization',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
  acf_add_options_sub_page(array(
		'page_title' 	=> 'Hours',
		'menu_title'	=> 'Hours',
		'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Contact Points',
		'menu_title'	=> 'Contacts',
		'parent_slug'	=> 'theme-general-settings',
	));
  acf_add_options_sub_page(array(
		'page_title' 	=> 'Optional Information',
		'menu_title'	=> 'Optional Info',
		'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Podcasts',
		'menu_title'	=> 'Podcasts',
		'parent_slug'	=> 'theme-general-settings',
	));
    acf_add_options_sub_page(array(
		'page_title' 	=> 'Social Media',
		'menu_title'	=> 'Social Media',
		'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Announcement Bar',
		'menu_title'	=> 'Announcements',
		'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Functionality',
		'menu_title'	=> 'Functionality',
		'parent_slug'	=> 'theme-general-settings',
	));
}

<?php

if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php') ) . '</a></p></div>';
	});
	
	add_filter('template_include', function($template) {
		return get_stylesheet_directory() . '/static/no-timber.html';
	});
	
	return;
}

Timber::$dirname = array('templates', 'views');

class StarterSite extends TimberSite {

	function __construct() {
		add_theme_support( 'post-formats' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_filter( 'pre_get_posts', array( $this, 'spm_custom_archives' ) );
		add_filter( 'acf/settings/show_admin', array( $this, 'spm_hide_acf' ) );
		add_filter( 'upload_mimes', array( $this, 'cc_mime_types' ) );
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'spm_create_options_pages' ) );
		add_action( 'init', array( $this, 'spm_register_nav_menus' ) );
		add_action( 'init', array( $this, 'spm_register_post_types' ) );
		add_action( 'init', array( $this, 'spm_register_taxonomies' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'spm_enqueue' ) );
		
		parent::__construct();
	}

	function spm_hide_acf() {
		$site_url = get_bloginfo('url');
		
		if ( strpos( $site_url, '.local' ) !== false ) :
			// .local is in the URL; show the ACF menu item
			return true;
		else :
			// .local is not in the URL; hide the ACF menu item
			return false;
		endif;
	}

	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}

	function spm_create_options_pages() {
		//this is where you can create ACF options pages
		if( function_exists('acf_add_options_page') ) {
			acf_add_options_page( array(
				'page_title'	=> 'Organization',
				'capability'	=> 'edit_posts',
				'updated_message'	=> __("Organization Updated", 'acf'),
			) );
		}
	}

	function spm_register_nav_menus() {
		//this is where you can register custom nav menus
		register_nav_menus( array(
			'header_primary' => 'Header Primary',
			'header_secondary' => 'Header Secondary',
			'footer_primary' => 'Footer Primary',
			'footer_secondary' => 'Footer Secondary',
		) );
	}

	function spm_register_post_types() {

		register_post_type( 'board', array(
			'labels' => array(
				'name' => __( 'Board' ),
				'singular_name' => __( 'Board' )
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array( 'slug' => 'about/board' ),
		) );

		register_post_type( 'staff', array(
			'labels' => array(
				'name' => __( 'Staff' ),
				'singular_name' => __( 'Staff' )
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array( 'slug' => 'about/staff' ),
		) );

	}

	function spm_register_taxonomies() {

			$labels = array(
				"name" => __( "Departments", "" ),
				"singular_name" => __( "Department", "" ),
			);
		
			$args = array(
				"label" => __( "Departments", "" ),
				"labels" => $labels,
				"public" => true,
				"hierarchical" => false,
				"label" => "Departments",
				"show_ui" => true,
				"show_in_menu" => true,
				"show_in_nav_menus" => true,
				"query_var" => true,
				"rewrite" => array( 'slug' => 'department', 'with_front' => true, ),
				"show_admin_column" => false,
				"show_in_rest" => false,
				"rest_base" => "department",
				"show_in_quick_edit" => false,
			);
			//register_taxonomy( "department", array( "staff" ), $args );
		
			$labels = array(
				"name" => __( "Grades", "" ),
				"singular_name" => __( "Grade", "" ),
			);
		
			$args = array(
				"label" => __( "Grades", "" ),
				"labels" => $labels,
				"public" => true,
				"hierarchical" => false,
				"label" => "Grades",
				"show_ui" => true,
				"show_in_menu" => true,
				"show_in_nav_menus" => true,
				"query_var" => true,
				"rewrite" => array( 'slug' => 'grade', 'with_front' => true, ),
				"show_admin_column" => false,
				"show_in_rest" => false,
				"rest_base" => "grade",
				"show_in_quick_edit" => false,
			);
			//register_taxonomy( "grade", array( "staff" ), $args );

	}

	function spm_enqueue() {
		//this is where you can enqueue styles and scripts
		wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/static/css/bootstrap.css' );
		wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/static/js/bootstrap.bundle.min.js', array(), '4.0.3', true );
		wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Roboto:400,400i,500,700', false );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/static/css/fa-all.min.css' );
	}
	
	function spm_custom_archives( $query ) {
		$query->set('posts_per_page', -1 );

		if ( is_post_type_archive( 'board' ) ) :
			$query->set('meta_key', 'last_name' );
			$query->set('orderby', array (
				'meta_value' => 'ASC',  
			) );

		elseif ( is_post_type_archive( 'staff' ) ) :
			$query->set('meta_query', array(
				array(
					'relation' => 'AND',
					'position_clause' => array(
						'key'       => 'position',
						'compare'   => 'EXISTS',
					),
					'last_name_clause' => array(
						'key'       => 'last_name',
						'compare'   => 'EXISTS',
					),
				)
			) );
			// Order by position, then last name
			$query->set('orderby', array (
				'position_clause' => 'ASC',
				'last_name_clause' => 'ASC',  
			) );
		endif;
	}

	function add_to_context( $context ) {
		$context['categories'] = Timber::get_terms('category');
		$context['header_primary'] = new TimberMenu( 'header_primary' );
		$context['header_secondary'] = new TimberMenu( 'header_secondary' );
		$context['footer_primary'] = new TimberMenu( 'footer_primary' );
		$context['footer_secondary'] = new TimberMenu( 'footer_secondary' );
		$context['options'] = get_fields('option');

		function spm_get_form_id( $form_title ) {
			$forms = GFAPI::get_forms();

			foreach ( $forms as $index=>$form ) :
				if ( $form['title'] == $form_title ) :
					return $form['id'];
				endif;
			endforeach;
		}

		$context['newsletter'] = spm_get_form_id('Newsletter');
		$context['site'] = $this;
		return $context;
	}

	function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	

	function add_to_twig( $twig ) {
		/* this is where you can add your own functions to twig */
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter('myfoo', new Twig_SimpleFilter('myfoo', array($this, 'myfoo')));
		return $twig;
	}

}

new StarterSite();

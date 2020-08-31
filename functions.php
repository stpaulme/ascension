<?php
if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php') ) . '</a></p></div>';
	});
	
	add_filter('template_include', function($template) {
		return get_stylesheet_directory() . '/src/no-timber.html';
	});
	
	return;
}

Timber::$dirname = array('templates', 'views');

class StarterSite extends TimberSite {

	function __construct() {
		add_theme_support( 'post-formats' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_filter( 'embed_oembed_html', array( $this, 'wrap_embeds' ) );
		add_filter( 'pre_get_posts', array( $this, 'spm_custom_archives' ) );
		add_filter( 'acf/settings/show_admin', array( $this, 'spm_acf_show_admin' ) );
		add_filter( 'tribe_events_add_no_index_meta', array( $this, '__return_false' ) );
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

	function spm_acf_show_admin( $show ) {
		return current_user_can('manage_options');
	}

	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}

	function spm_create_options_pages() {
		//this is where you can create ACF options pages
		if( function_exists('acf_add_options_page') ) {
			acf_add_options_page();
		}
	}

	function spm_register_nav_menus() {
		//this is where you can register custom nav menus
		register_nav_menus( array(
			'header_primary' => 'Header Primary',
			'header_secondary' => 'Header Secondary',
			'footer_primary' => 'Footer Primary',
			'footer_secondary' => 'Footer Secondary',
			'mobile_menu' => 'Mobile Menu',
		) );
	}

	function spm_register_post_types() {
		//this is where you can register custom post types
		register_post_type( 'board', array(
			'labels' => array(
				'name' => __( 'Board' ),
				'singular_name' => __( 'Board' )
			),
			'public' => true,
			'publicly_queryable'  => false,
			'menu_position' => 20,
			'menu_icon' => 'dashicons-groups',
			'has_archive' => false,
			'rewrite' => array( 'slug' => 'about/board' ),
			
		) );

		register_post_type( 'leadership', array(
			'labels' => array(
				'name' => __( 'Leadership' ),
				'singular_name' => __( 'Leadership' )
			),
			'public' => true,
			'publicly_queryable'  => false,
			'menu_position' => 20,
			'menu_icon' => 'dashicons-groups',
			'has_archive' => false,
			'rewrite' => array( 'slug' => 'about/leadership' ),
		) );

		register_post_type( 'staff', array(
			'labels' => array(
				'name' => __( 'Staff' ),
				'singular_name' => __( 'Staff' )
			),
			'public' => true,
			'publicly_queryable'  => false,
			'menu_position' => 20,
			'menu_icon' => 'dashicons-groups',
			'has_archive' => false,
			'rewrite' => array( 'slug' => 'about/staff' ),
		) );

			register_post_type( 'homily', array(
				'labels' => array(
					'name' => __( 'Homilies' ),
					'singular_name' => __( 'Homily' )
				),
				'public' => true,
				'publicly_queryable'  => true,
				'menu_position' => 5,
				'has_archive' => false,
				'rewrite' => array( 'slug' => 'liturgy/homilies' ),
			) );
	

	}

	function spm_register_taxonomies() {
		//this is where you can register custom taxonomies
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
		
		wp_enqueue_style( 'spm', get_template_directory_uri() . '/src/css/spm.css', array(), filemtime(get_template_directory() . '/src/css/spm.css'), false );
		wp_enqueue_style( 'roboto', '//fonts.googleapis.com/css?family=Roboto:400,400i,500,700,700i' );
		wp_enqueue_style( 'font-awesome', '//use.fontawesome.com/releases/v5.3.1/css/all.css' );

		wp_enqueue_script( 'popper', get_template_directory_uri() . '/src/js/popper.min.js' );
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/src/js/bootstrap.min.js', array( 'jquery' ) );
		
	}

	function wrap_embeds( $html ) {
		return '<div class="er-container">' . $html . '</div>';
	}

	function add_to_context( $context ) {
		$context['header_primary'] = new TimberMenu( 'header_primary' );
		$context['header_secondary'] = new TimberMenu( 'header_secondary' );
		$context['footer_primary'] = new TimberMenu( 'footer_primary' );
		$context['footer_secondary'] = new TimberMenu( 'footer_secondary' );
		$context['mobile_menu'] = new TimberMenu( 'mobile_menu' );
		$context['options'] = get_fields('option');

		function hex2rgba($color, $opacity = false) {
 
			$default = 'rgb(0,0,0)';
		 
			//Return default if no color provided
			if(empty($color))
				  return $default; 
		 
			//Sanitize $color if "#" is provided 
			if ($color[0] == '#' ) {
				$color = substr( $color, 1 );
			}
		 
			//Check if color has 6 or 3 characters and get values
			if (strlen($color) == 6) {
					$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
			} elseif ( strlen( $color ) == 3 ) {
					$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
			} else {
					return $default;
			}
		 
			//Convert hexadec to rgb
			$rgb =  array_map('hexdec', $hex);
		 
			//Check if opacity is set(rgba or rgb)
			if($opacity) {
				if(abs($opacity) > 1)
					$opacity = 1.0;
				$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
			} else {
				$output = 'rgb('.implode(",",$rgb).')';
			}
		 
			//Return rgb(a) color string
			return $output;
		}
		
		$context['random_color'] = hex2rgba('#ff013f', 0.5);

		function spm_get_form_id( $form_title ) {
			$forms = GFAPI::get_forms();
			$form_id = false;

			foreach ( $forms as $index=>$form ) :
				if ( $form['title'] == $form_title ) :
					$form_id = $form['id'];
				endif;
			endforeach;

			return $form_id;
		}

		$context['newsletter'] = spm_get_form_id('Newsletter');
		$context['site'] = $this;
		return $context;
	}

	function add_to_twig( $twig ) {
		/* this is where you can add your own functions to twig */
		$twig->addExtension( new Twig_Extension_StringLoader() );
		return $twig;
	}

}

new StarterSite();

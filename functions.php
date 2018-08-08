<?php


//////////////////////////////////////////////
//  DEFAULT SPM_X SUPPORTS
//////////////////////////////////////////////

if ( ! function_exists( 'spm_x_setup' ) ) :

	function spm_x_setup() {


        //////////////////////////////////////////////
        //  LANGUAGE TRANSLATION
        //////////////////////////////////////////////
        load_theme_textdomain( 'spm_x', get_template_directory() . '/languages' );


        //////////////////////////////////////////////
        //  DOCUMENT TITLE HANDLER
        //////////////////////////////////////////////
        add_theme_support( 'title-tag' );


        //////////////////////////////////////////////
        //  POST THUMBNAILS
        //////////////////////////////////////////////
        add_theme_support('post-thumbnails');


        //////////////////////////////////////////////
        //  THUMBNAIL SIZES
        //////////////////////////////////////////////
        add_image_size( 'square-mobile', 768, 768, array( 'center', 'center' ) );
        add_image_size( 'square-tablet', 1024, 1024, array( 'center', 'center' ) );
        add_image_size( 'square-desktop', 1200, 1200, array( 'center', 'center' ) );
        add_image_size( 'landscape-mobile', 768, 512, array( 'center', 'center' ) );
        add_image_size( 'landscape-tablet', 1280, 853, array( 'center', 'center' ) );
        add_image_size( 'landscape-desktop', 2560, 1707, array( 'center', 'center' ) );
        add_image_size( 'portrait-mobile', 768, 1152, array( 'top', 'center' ) );
        add_image_size( 'portrait-tablet', 1024, 1536, array( 'top', 'center' ) );
        add_image_size( 'portrait-desktop', 2560, 3840, array( 'top', 'center' ) );
        add_image_size( 'widescreen-mobile', 768, 329, array( 'center', 'center' ) );
        add_image_size( 'widescreen-tablet', 1024, 438, array( 'center', 'center' ) );
        add_image_size( 'widescreen-desktop', 2560, 1097, array( 'center', 'center' ) );


        //////////////////////////////////////////////
        //  EXCERPTS FOR PAGES
        //////////////////////////////////////////////
        add_action( 'init', 'spm_excerpts' );
        function spm_excerpts() {
            add_post_type_support( 'page', 'excerpt' );
            add_post_type_support( 'sample', 'excerpt' );
        }

        //////////////////////////////////////////////
        //  REGISTER MENUS
        //////////////////////////////////////////////
        register_nav_menus( array(
            'mobile' => esc_html__( 'Mobile Menu', 'spm_x' ),
            'header-primary' => esc_html__( 'Primary', 'spm_x' ),
            'header-secondary' => esc_html__( 'Secondary', 'spm_x' ),
            'about' => esc_html__( 'About', 'spm_x' ),
            'footer-primary' => esc_html__( 'Footer Primary', 'spm_x' ),
            'footer-secondary' => esc_html__( 'Footer Secondary', 'spm_x' ),
        ) );

        //////////////////////////////////////////////
        //  HTML5 SUPPORT
        //////////////////////////////////////////////
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );


        //////////////////////////////////////////////
        //  SELECTIVE REFRESH FOR WIDGETS
        //////////////////////////////////////////////
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'spm_x_setup' );




//////////////////////////////////////////////
//  LEGACY CONTENT WIDTH VARIABLE
//////////////////////////////////////////////

function spm_x_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'spm_x_content_width', 1200 );
}
add_action( 'after_setup_theme', 'spm_x_content_width', 0 );

//////////////////////////////////////////////
// REMOVE EMOJIS
//////////////////////////////////////////////
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

//////////////////////////////////////////////
// REGISTER SIDEBAR WIDGETS
//////////////////////////////////////////////
function spm_x_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'About Sidebar', 'spm_x' ),
		'id'            => 'sidebar-about',
		'description'   => esc_html__( 'Add widgets here.', 'spm_x' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Services Sidebar', 'spm_x' ),
		'id'            => 'sidebar-services',
		'description'   => esc_html__( 'Add widgets here.', 'spm_x' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );


}
add_action( 'widgets_init', 'spm_x_widgets_init' );

//////////////////////////////////////////////
// REGISTER CUSTOM POST TYPES
//////////////////////////////////////////////

///////
// Events Off/On
///////
if (get_field('global_events', 'option')) {
	function cptui_register_my_cpts_events() {
		$labels = array(
			"name" => __( "Events", "" ),
			"singular_name" => __( "Event", "" ),
		);
		$args = array(
			"label" => __( "Events", "" ),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"rest_base" => "",
			"has_archive" => false,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "events", "with_front" => true ),
			"query_var" => true,
			"menu_position" => 20,
			"supports" => array( "title", "editor", "thumbnail", "excerpt" ),
		);

		register_post_type( "events", $args );
	}
	add_action( 'init', 'cptui_register_my_cpts_events' );
}

	///////
	// Directory Off/On
	///////
	if (get_field('global_directory', 'option')) {
		function cptui_register_my_cpts_directory() {
			$labels = array(
				"name" => __( "Directory", "" ),
				"singular_name" => __( "Directory", "" ),
			);
			$args = array(
				"label" => __( "Directory", "" ),
				"labels" => $labels,
				"description" => "",
				"public" => true,
				"publicly_queryable" => true,
				"show_ui" => true,
				"show_in_rest" => false,
				"rest_base" => "",
				"has_archive" => false,
				"show_in_menu" => true,
				"show_in_nav_menus" => true,
				"exclude_from_search" => false,
				"capability_type" => "post",
				"map_meta_cap" => true,
				"hierarchical" => false,
				"rewrite" => array( "slug" => "directory", "with_front" => false ),
				"query_var" => true,
				"menu_position" => 22,
				"supports" => array( "title", "editor", "thumbnail", "excerpt", "comments", "revisions", "author" ),
			);
			register_post_type( "directory", $args );
		}
		add_action( 'init', 'cptui_register_my_cpts_directory' );
		// Add Services Categories
		function cptui_register_my_taxes_directory_category() {
			$labels = array(
				"name" => __( "Departments", "" ),
				"singular_name" => __( "Departments", "" ),
			);
			$args = array(
				"label" => __( "Dpeartments", "" ),
				"labels" => $labels,
				"public" => true,
				"hierarchical" => false,
				"label" => "Departments",
				"show_ui" => true,
				"show_in_menu" => true,
				"show_in_nav_menus" => true,
				"query_var" => true,
				"rewrite" => array( 'slug' => "department", 'with_front' => false, ),
				"show_admin_column" => true,
				"show_in_rest" => false,
				"rest_base" => "department",
				"show_in_quick_edit" => true,
			);
				register_taxonomy( "department", array( "directory" ), $args );
			}
		add_action( 'init', 'cptui_register_my_taxes_directory_category' );

	}

///////
// Courses Off/On
///////
if (get_field('global_courses', 'option')) {
	function cptui_register_my_cpts_courses() {
		$labels = array(
			"name" => __( "Courses", "" ),
			"singular_name" => __( "Course", "" ),
		);
		$args = array(
			"label" => __( "Courses", "" ),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"rest_base" => "",
			"has_archive" => false,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "courses", "with_front" => false ),
			"query_var" => true,
			"menu_position" => 22,
			"supports" => array( "title", "editor", "thumbnail", "excerpt", "comments", "revisions", "author" ),
		);
		register_post_type( "courses", $args );
	}
	add_action( 'init', 'cptui_register_my_cpts_courses' );
}

///////
// Resources Off/On
///////
if (get_field('global_resources', 'option')) {
	function cptui_register_my_cpts_resources() {
		$labels = array(
			"name" => __( "Resources", "" ),
			"singular_name" => __( "Resource", "" ),
		);
		$args = array(
			"label" => __( "Resources", "" ),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"rest_base" => "",
			"has_archive" => false,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "resources", "with_front" => false ),
			"query_var" => true,
			"menu_position" => 22,
			"supports" => array( "title", "editor", "thumbnail", "excerpt", "comments", "revisions", "author" ),
		);
		register_post_type( "resources", $args );
	}
	add_action( 'init', 'cptui_register_my_cpts_resources' );
}

///////
// Resources Off/On
///////
if (get_field('global_stories', 'option')) {
	function cptui_register_my_cpts_stories() {
		$labels = array(
			"name" => __( "Stories", "" ),
			"singular_name" => __( "Story", "" ),
		);
		$args = array(
			"label" => __( "Stories", "" ),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"rest_base" => "",
			"has_archive" => false,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "stories", "with_front" => false ),
			"query_var" => true,
			"menu_position" => 22,
			"supports" => array( "title", "editor", "thumbnail", "excerpt", "comments", "revisions", "author" ),
		);
		register_post_type( "stories", $args );
	}
	add_action( 'init', 'cptui_register_my_cpts_stories' );
}

///////
// Resources Off/On
///////
if (get_field('global_volunteers', 'option')) {
	function cptui_register_my_cpts_volunteers() {
		$labels = array(
			"name" => __( "Volunteers", "" ),
			"singular_name" => __( "Opportunity", "" ),
		);
		$args = array(
			"label" => __( "Volunteers", "" ),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"rest_base" => "",
			"has_archive" => false,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "volunteers", "with_front" => false ),
			"query_var" => true,
			"menu_position" => 22,
			"supports" => array( "title", "editor", "thumbnail", "excerpt", "comments", "revisions", "author" ),
		);
		register_post_type( "volunteers", $args );
	}
	add_action( 'init', 'cptui_register_my_cpts_volunteers' );
}

//////////////////////////////////////////////
//  Enqueue Scripts and Styles
//////////////////////////////////////////////
function spm_x_scripts() {
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css' );
    wp_enqueue_style( 'style-css', get_stylesheet_uri() );
    wp_enqueue_style( 'style-prototype-css', get_template_directory_uri() . '/style-prototype.css' );
    wp_enqueue_style( 'default-font', '//fonts.googleapis.com/css?family=Roboto+Condensed:700|Roboto:400,400i,500,700' );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), '4.0.3', true );
    wp_enqueue_script( 'fontawesome', '//use.fontawesome.com/85cfa098d4.js', array(), '3.3.6', true );
    wp_enqueue_script( 'master', get_template_directory_uri() . '/js/master.js', array(), '1.2', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'spm_x_scripts' );


//////////////////////////////////////////////
//  Add Custom Filters
//////////////////////////////////////////////
require get_template_directory() . '/spm-filters/autoversion.php';
require get_template_directory() . '/spm-filters/svg-upload.php';
require get_template_directory() . '/spm-filters/remove-protected.php';
require get_template_directory() . '/spm-filters/hfeed.php';
require get_template_directory() . '/spm-filters/excerpt-length.php';
require get_template_directory() . '/spm-filters/archive-titles.php';
require get_template_directory() . '/spm-filters/body-classes.php';
require get_template_directory() . '/spm-filters/acf-options.php';
require get_template_directory() . '/spm-filters/trim-excerpt.php';
require get_template_directory() . '/spm-filters/hide-acf-admin.php';
require get_template_directory() . '/spm-filters/acf-load-post-type-choices.php';

add_filter( 'github_updater_set_options',
	function () {
		return array( 
			'github_access_token' => '18164438e3ca4c3538340185e854c88f71d45b50',
		);
	} );



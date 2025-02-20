<?php
/**
 * activehub-leeds functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package activehub-leeds
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function activehub_leeds_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on activehub-leeds, use a find and replace
		* to change 'activehub-leeds' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'activehub-leeds', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'activehub-leeds' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'activehub_leeds_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'activehub_leeds_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function activehub_leeds_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'activehub_leeds_content_width', 640 );
}
add_action( 'after_setup_theme', 'activehub_leeds_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function activehub_leeds_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'activehub-leeds' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'activehub-leeds' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'activehub_leeds_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function activehub_leeds_scripts() {

	// === Stylesheets ===

	// Base Underscores stylesheet
	wp_enqueue_style( 'activehub-leeds-style', get_stylesheet_uri(), array(), _S_VERSION );
	
	// Google Fonts
	wp_enqueue_style('activehub-leeds-google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rowdies:wght@300;400;700&display=swap');
	
	// Google Material Symbols
	wp_enqueue_style('activehub-leeds-google-material-symbols-rounded', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200');

	// Iconoir symbols
	wp_enqueue_style('activehub-leeds-iconoir', 'https://cdn.jsdelivr.net/gh/iconoir-icons/iconoir@main/css/iconoir.css');
	
	// Bootstrap V5.3.3
	wp_enqueue_style('activehub-leeds-bootstrap-5-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');

	// Main stylesheet (from static site)
	wp_enqueue_style('activehub-leeds-main-style', get_stylesheet_directory_uri() . '/stylesheets/main-style.css');
	wp_style_add_data( 'activehub-leeds-style', 'rtl', 'replace' );

	// === Scripts ===

	// Underscores navigation.js
	wp_enqueue_script( 'activehub-leeds-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	// JQuery V3.7.1 
	// For bootstrap-select js-plugin, may delete later if plugin not used.
	wp_enqueue_script('activehub-leeds-jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), '3.7.1', true);

	// Bootstrap V5.3.3
	wp_enqueue_script('activehub-leeds-bootstrap5-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), '5.3.3', true);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'activehub_leeds_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Proper ob_end_flush() for all levels
 *
 * This replaces the WordPress `wp_ob_end_flush_all()` function
 * with a replacement that doesn't cause PHP notices.
 * 
 * 09/01/2025 Taken from: https://www.kevinleary.net/blog/wordpress-ob_end_flush-error-fix/
 */
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
add_action( 'shutdown', function() {
   while ( @ob_end_flush() );
} );

// ** Main Navigation filters**
// Add 'nav-item' Bootstrap class to list elements in main nav

function add_class_nav_item_bs($classes, $item, $args) {
    if(isset($args->add_nav_item_bs_class)) {
        $classes[] = $args->add_nav_item_bs_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_class_nav_item_bs', 1, 3);

// Add 'nav-link' Bootstrap class to anchor elements in main nav list items
function add_class_nav_link_bs($atts, $item, $args) {
    if(isset($args->add_nav_link_bs_class)) {
        $atts['class'] = $args->add_nav_link_bs_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_class_nav_link_bs', 1, 3);

// Change dashboard Posts to Organisers
add_action( 'init', 'my_change_post_object' );
	function my_change_post_object() {
	$get_post_type = get_post_type_object('post');
	$labels = $get_post_type->labels;
	$labels->name = 'Organisers';
	$labels->singular_name = 'Organiser';
	$labels->add_new = 'Add New';
	$labels->add_new_item = 'Add Organiser';
	$labels->edit_item = 'Edit Organiser';
	$labels->new_item = 'Organiser';
	$labels->view_item = 'View Organiser';
	$labels->search_items = 'Search Organisers';
	$labels->not_found = 'No Organisers found';
	$labels->not_found_in_trash = 'No Organisers found in Trash';
	$labels->all_items = 'All Organisers';
	$labels->menu_name = 'Organisers';
	$labels->name_admin_bar = 'Organisers';
}

// ===== ACF Plugin =====

//Embeding google maps solution taken from ACF forum post
	// Link: https://support.advancedcustomfields.com/forums/topic/displaying-a-google-map-on-front-end/
	// User: tylerlwsmith
	// Date posted: April 11, 2018 at 9:19 pm

/**
 * Set constants for Google Maps JS API key--used for ACF's backend map--and Google Maps
 * Embed API Key, used for generating maps on the site front end.
 *
 * @link https://developers.google.com/maps/documentation/javascript/get-api-key
 * @link https://developers.google.com/maps/documentation/embed/get-api-key
 */
const GOOGLE_MAPS_JS_API_KEY = 'AIzaSyD9N54baiPMM2SmR1k3nqYG3Uf7DwPsO2o';
const GOOGLE_MAPS_EMBED_API_KEY = 'AIzaSyD5H7UXa0-5d1WK8iSMZA2HXdf-bvqSb7c';

/**
 * Hook Maps JS API into ACF intialization.
 */
function add_google_map_to_acf_init() {
    acf_update_setting( 'google_api_key', GOOGLE_MAPS_JS_API_KEY );
}
add_action( 'acf/init', 'add_google_map_to_acf_init' );

/**
 * Pass in ACF Google Map field to generate HTML for
 * Google maps embed on the front end of the site.
 *
 * @param array  $acf_map_field  The array generated by ACF Google Maps field.
 *
 * @link https://developers.google.com/maps/documentation/embed/guide
 */
function acf_make_map( $acf_map_field ){
    $address_field = $acf_map_field['address'];
    $encoded_address = urlencode( $address_field );
    echo '
        <iframe
            width="100%"
            height="400px"
            frameborder="0" style="border:0"
            src="https://www.google.com/maps/embed/v1/place?key=' . GOOGLE_MAPS_EMBED_API_KEY . '&q=' . $encoded_address . '" allowfullscreen>
        </iframe>';
}
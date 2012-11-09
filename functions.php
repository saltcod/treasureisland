<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */

/**
 * Make theme available for translation
 * Translations can be filed in the /languages/ directory
 * If you're building a theme based on toolbox, use a find and replace
 * to change 'toolbox' to the name of your theme in all the template files
 */

/* Enqueue stylesheets / scripts */
 
add_action( 'wp_enqueue_scripts', 'bookmarkie_add_scripts' );
 
function bookmarkie_add_scripts() {
    wp_register_style( '1140px', get_template_directory_uri() .'/1140.css');
    wp_enqueue_style( '1140px' );

}

add_theme_support( 'infinite-scroll', array(
    'container'  => 'content',
    'footer'     => 'colophon',
) );

/** Exclude certain post categories from showing on the frontpage  **/
function exclude_category($query) {
	if ($query->is_home){
		$query->set('category__not_in', array(4,5,8,9,10,35));

		}
	return $query;
	}
 	
 	add_filter ('pre_get_posts', 'exclude_category');
  

	// Add support for post formats

	add_theme_support( 'post-formats', array( 'aside', 'status', 'link' ) );



 
 /* Make all links open in a _Blank window */
 function autoblank($text) {
	$return = str_replace('<a', '<a target="_blank"', $text);
	return $return;
}
add_filter('the_content', 'autoblank');

 
/**
Theme invidual posts with a new template file located in /single
**/
/** Define a constant path to our single template folder **/
	define(SINGLE_PATH, TEMPLATEPATH . '/single');


/** Filter the single_template with our custom function **/
	add_filter('single_template', 'my_single_template');

/** Single template function which will choose our template  **/
function my_single_template($single) {
	global $wp_query, $post;
 
/** Checks for single template by ID **/
	if(file_exists(SINGLE_PATH . '/single-' . $post->ID . '.php'))
		return SINGLE_PATH . '/single-' . $post->ID . '.php';
 return $single;
}
 
 
 
/*
Theme single posts from specific categories using single-category.php file.
*/
add_filter('single_template', create_function('$t', 'foreach( (array) get_the_category() as $cat ) { if ( file_exists(TEMPLATEPATH . "/single-{$cat->term_id}.php") ) return TEMPLATEPATH . "/single-{$cat->term_id}.php"; } return $t;' ));
 
 
/*
Add items to admin bar
*/
 function mytheme_admin_bar_render() {
	global $wp_admin_bar;
        $wp_admin_bar->add_menu( array(
        	'parent' => 'appearance',
	        'id' => 'themes',
	        'title' => __('Themes'),
	        'href' => admin_url( 'themes.php') ) );
	
		$wp_admin_bar->add_menu( array(
			'parent' => 'appearance',
	        'id' => 'plugins',
	        'title' => __('Plugins'),
	        'href' => admin_url( 'plugins.php') ) );
	
		$wp_admin_bar->add_menu( array(
		    'parent' => 'admin',
	        'id' => 'posts',
	        'title' => __('Posts'),
	       'href' => admin_url( 'edit.php') ) );
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );
 

load_theme_textdomain( 'toolbox', TEMPLATEPATH . '/languages' );



$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable( $locale_file ) )
	require_once( $locale_file );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 580; /* pixels */

/**
 * This theme uses wp_nav_menu() in one location.
 */
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'toolbox' ),
) );

/**
 * Add default posts and comments RSS feed links to head
 */
add_theme_support( 'automatic-feed-links' );

/**
 * Add support for the Aside and Gallery Post Formats
 */
add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function toolbox_page_menu_args($args) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'toolbox_page_menu_args' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function toolbox_widgets_init() {
	register_sidebar( array (
		'name' => __( 'Sidebar 1', 'toolbox' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array (
		'name' => __( 'Sidebar 2', 'toolbox' ),
		'id' => 'sidebar-2',
		'description' => __( 'An optional second sidebar area', 'toolbox' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );	
}
add_action( 'init', 'toolbox_widgets_init' );
<?php

/*********************************************************************
ADD SOME PLUGIN GOODNESS
*********************************************************************/
// change this value to false to view custom field editor in Wordpress and make modifications.
define( 'ACF_LITE' , false );

include_once( 'plugins/advanced-custom-fields/acf.php' );
include_once( 'plugins/acf-gallery/acf-gallery.php' );
include_once( 'plugins/acf-flexible-content/acf-flexible-content.php' );
include_once( 'plugins/acf-options-page/acf-options-page.php' );

if( function_exists('acf_set_options_page_title') ) {
    acf_set_options_page_title( __('Boombox Theme Options') );
}

/*********************************************************************
SCRIPTS & ENQUEUEING
*********************************************************************/

function boombox_styles_and_scripts(){

	// loading modernizr and jquery, and reply script
	global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
	if (!is_admin()) {
	
	// modernizr (without media query polyfill)
	wp_register_script( 'modernizr', get_stylesheet_directory_uri() . '/library/js/modernizr.custom.js', array(), '2.6.2', false );
	wp_register_script( 'flexslider', get_stylesheet_directory_uri() . '/library/js/jquery.flexslider-min.js', array('jquery'), '2.2.0', true );
	wp_register_script( 'imagesLoaded', get_stylesheet_directory_uri() . '/library/js/imagesloaded.min.js', array('jquery'), '3.1.0', true );
	
	// register main stylesheet
	wp_register_style( 'default', get_stylesheet_directory_uri() . '/style.css', array(), '', 'all' );
	wp_register_style( 'stylesheet', get_stylesheet_directory_uri() . '/library/css/main.css', array(), '', 'all' );
	wp_register_style( 'normalize', get_stylesheet_directory_uri() . '/library/css/normalize.css', array(), '', 'all' );
	wp_register_style( 'ie-only', get_stylesheet_directory_uri() . '/library/css/ie.css', array(), '' );
	wp_register_style( 'mapbox', 'https://api.tiles.mapbox.com/mapbox.js/v1.6.2/mapbox.css', array(), '' );
	wp_register_style( 'googlefonts', 'http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300italic,300,400italic,500,500italic,700,700italic,900,900italic|Roboto+Condensed:300italic,400italic,700italic,400,300,700', array(), '', 'all' );
	
	
	// comment reply script for threaded comments
	if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
	  wp_enqueue_script( 'comment-reply' );
	}
	
	//adding scripts file in the footer
	wp_register_script( 'main-js', get_stylesheet_directory_uri() . '/library/js/main-ck.js', array( 'jquery' ), '', true );
	
	// enqueue styles
	wp_enqueue_style('googlefonts');
	wp_enqueue_style( 'default' );
	wp_enqueue_style( 'stylesheet' );
	wp_enqueue_style( 'normalize' );
	wp_enqueue_style('ie-only');
	if( is_front_page() ){
		wp_enqueue_style( 'mapbox' );
	}
	$wp_styles->add_data( 'ie-only', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet
	
	//enqueue scripts
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'flexslider' );
	wp_enqueue_script( 'imagesLoaded' );
	if( is_front_page() ){
		wp_enqueue_script( 'mapbox' );
	}
	//wp_enqueue_script( 'customSelect' );
	wp_enqueue_script( 'main-js' );
	
	}

}

add_action( 'wp_enqueue_scripts', 'boombox_styles_and_scripts' );

/*********************************************************************
THEME SUPPORT
*********************************************************************/

// wp thumbnails (sizes handled in functions.php)
add_theme_support('post-thumbnails');

// default thumb size
set_post_thumbnail_size( 256, 160, true );
add_image_size( 'gallery-photo', 320, 320, true );

// rss thingy
add_theme_support('automatic-feed-links');

// registering wp3+ menus
register_nav_menus(
	array(
		'main-nav' => 'The Main Menu'   // main nav in header
	)
);

//define content width
if( ! isset($content_width) ){
	$content_width = 920;
}

/*******************************************************************************************
Custom style for the wordpress editor
*******************************************************************************************/
function boombox_add_editor_styles() {
    add_editor_style( get_template_directory_uri() . '/library/css/custom-editor-style.css' );
}
add_action( 'init', 'boombox_add_editor_styles' );
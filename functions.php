<?php

/*********************************************************************************************************
ADD SOME PLUGIN GOODNESS
*********************************************************************************************************/
include_once( 'plugins/advanced-custom-fields/acf.php' ); //Core ACF
include_once( 'plugins/acf-gallery/acf-gallery.php' ); //ACF Gallery
include_once( 'plugins/acf-flexible-content/acf-flexible-content.php' ); //ACF Flexible Content Field
include_once( 'plugins/acf-repeater/acf-repeater.php' ); //ACF Repeater Field
include_once( 'plugins/acf-options-page/acf-options-page.php' ); //ACF Options Page



/*********************************************************************************************************
ADD CUSTOM ACF OPTIONS + TOGGLE ACF CONFIG PANEL IN DASHBOARD
*********************************************************************************************************/
//add custom ACF options
include_once( 'includes/theme_options.php' );

//set default values for fields
include_once( 'includes/default_options.php' );

// change this value to false to view custom field editor in Wordpress and make modifications.
define( 'ACF_LITE' , true );



/*********************************************************************************************************
BOOMBOX MAIN MENU - Used as fallback when no menu is initially created
*********************************************************************************************************/
function boombox_main_menu(){
	echo '<ul id="menu_links">';
	wp_list_pages('title_li=');
	echo '</ul>';
}

/*********************************************************************************************************
ADD CUSTOM HEX TO RGBA CONVERTER  - thanks http://mekshq.com/how-to-convert-hexadecimal-color-code-to-rgb-or-rgba-using-php/
*********************************************************************************************************/
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
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }

        //Return rgb(a) color string
        return $output;
}

/*********************************************************************************************************
ADD & SET HOME PAGE ON THEME ACTIVATION
Thanks Kevin: http://wpsnipp.com/index.php/functions-php/create-page-on-theme-activation/
*********************************************************************************************************/
if (isset($_GET['activated']) && is_admin()){
    $new_page_title = 'Home';
    $new_page_content = '';
    $new_page_template = ''; //ex. template-custom.php. Leave blank if you don't want a custom page template.
    //don't change the code bellow, unless you know what you're doing
    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
        'post_type' => 'page',
        'post_title' => $new_page_title,
        'post_content' => $new_page_content,
        'post_status' => 'publish',
        'post_author' => 1,
    );
    if(!isset($page_check->ID)){
        $new_page_id = wp_insert_post($new_page);
        if(!empty($new_page_template)){
            update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
        }
    }

    $homepage = get_page_by_title($new_page_title);
    if( $homepage ){
    	update_option( 'page_on_front', $homepage->ID );
    	update_option( 'show_on_front', 'page' );
    }

}

/*********************************************************************************************************
SCRIPTS & ENQUEUEING
*********************************************************************************************************/

function boombox_styles_and_scripts(){

	// loading modernizr and jquery, and reply script
	global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
	if (!is_admin()) {
	
		// register scripts
		wp_register_script( 'fitvids', get_stylesheet_directory_uri() . '/library/js/jquery.fitvids.js', array('jquery'), '1.1', true );
		wp_register_script( 'swipebox', get_stylesheet_directory_uri() . '/library/js/jquery.swipebox.min.js', array('jquery'), '1.2.4', true );
		wp_register_script( 'nivo', get_stylesheet_directory_uri() . '/library/js/jquery.nivo-lightbox.min.js', array('jquery'), '1.0', true );
		wp_register_script( 'main-js', get_stylesheet_directory_uri() . '/library/js/main-ck.js', array( 'jquery' ), '', true );
		
		// register stylesheets
		wp_register_style( 'default', get_stylesheet_directory_uri() . '/style.css', array(), '', 'all' );
		wp_register_style( 'swipebox', get_stylesheet_directory_uri() . '/library/css/swipebox/swipebox.css', array(), '', 'all' );
		wp_register_style( 'nivo', get_stylesheet_directory_uri() . '/library/css/nivo/nivo-lightbox.css', array(), '', 'all' );
		wp_register_style( 'nivotheme', get_stylesheet_directory_uri() . '/library/css/nivo/themes/default/default.css', array(), '', 'all' );
		wp_register_style( 'stylesheet', get_stylesheet_directory_uri() . '/library/css/main.css', array(), '', 'all' );
		wp_register_style( 'normalize', get_stylesheet_directory_uri() . '/library/css/normalize.css', array(), '', 'all' );
		wp_register_style( 'ie-only', get_stylesheet_directory_uri() . '/library/css/ie.css', array(), '' );
		wp_register_style( 'googlefonts', 'http://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800', array(), '', 'all' );
		
		// enqueue styles
		wp_enqueue_style('googlefonts');
		wp_enqueue_style( 'swipebox' );
		wp_enqueue_style( 'nivo' );
		wp_enqueue_style( 'nivotheme' );
		wp_enqueue_style( 'default' );
		wp_enqueue_style( 'normalize' );
		wp_enqueue_style( 'stylesheet' );
		wp_enqueue_style('ie-only');
		$wp_styles->add_data( 'ie-only', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet
		
		//enqueue scripts
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'fitvids' );
		wp_enqueue_script( 'swipebox' );
		wp_enqueue_script( 'nivo' );
		wp_enqueue_script( 'main-js' );
	
	}

}

add_action( 'wp_enqueue_scripts', 'boombox_styles_and_scripts' );

/*********************************************************************************************************
THEME SUPPORT
*********************************************************************************************************/

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

/*********************************************************************************************************
Custom style for the wordpress editor
*********************************************************************************************************/
function boombox_add_editor_styles() {
    add_editor_style( get_template_directory_uri() . '/library/css/custom-editor-style.css' );
}
add_action( 'init', 'boombox_add_editor_styles' );
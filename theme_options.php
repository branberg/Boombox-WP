<?php

function boombox_customizer_register($wp_customize) {


	/***************************************************
	Logo Section
	***************************************************/
	$wp_customize->add_section('boombox_logo', array(
		'title' => __('Logo', 'boombox'),
		'description' => 'Add a custom logo to this theme',
		'priority' => 1
	));

	//Logo Image
	$wp_customize->add_setting('logo_image', array(
		'default' => get_stylesheet_directory_uri() . '/library/img/logo.png'
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_image', array(
		'label' => __('Change Site Logo', 'boombox' ),
		'section' => 'boombox_logo',
		'settings' => 'logo_image'
	)));



	/***************************************************
	Background Section
	***************************************************/
	$wp_customize->add_section('boombox_background', array(
		'title' => __('Background', 'boombox'),
		'description' => 'Modify the theme\'s background properties',
		'priority' => 2
	));


	//Background Image
	$wp_customize->add_setting('background_image', array(
		'default' => get_stylesheet_directory_uri() . '/library/img/background.jpg'
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'background_image', array(
		'label' => __('Background Image', 'boombox' ),
		'section' => 'boombox_background',
		'settings' => 'background_image'
	)));


	//Background Color
	$wp_customize->add_setting('background_color', array(
		'default' => '#382A3B'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
		'label' => __('Background Color', 'boombox' ),
		'section' => 'boombox_background',
		'settings' => 'background_color'
	)));


	//Background Position
	$wp_customize->add_setting('background_position', array(
		'default' => 'fill'
	));
	$wp_customize->add_control( 'background_position', array(
		'type' => 'radio',
		'label' => __('Background Position', 'boombox' ),
		'section' => 'boombox_background',
		'choices' => array(
			'fill' => 'Fullscreen',
			'topleft' => 'Top Left',
			'topcenter' => 'Top Center',
			'center' => 'Centered'
		)
	));


	//Background Repeat
	$wp_customize->add_setting('background_repeat', array(
		'default' => 'repeat'
	));
	$wp_customize->add_control( 'background_repeat', array(
		'type' => 'radio',
		'label' => __('Background Repeat', 'boombox' ),
		'section' => 'boombox_background',
		'choices' => array(
			'repeat' => 'Repeat Both',
			'repeatx' => 'Repeat Horizontally',
			'repeaty' => 'Repeat Vertically',
			'norepeat' => 'No Repeat'
		)
	));


	//Background Attachment
	$wp_customize->add_setting('background_attachment', array(
		'default' => 'fixed'
	));
	$wp_customize->add_control( 'background_attachment', array(
		'type' => 'radio',
		'label' => __('Background Attachment', 'boombox' ),
		'section' => 'boombox_background',
		'choices' => array(
			'scroll' => 'Scrollable Background',
			'fixed' => 'Fixed Background'
		)
	));


	//Overlay color
	$wp_customize->add_setting('overlay_color', array(
		'default' => '#ffffff'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'overlay_color', array(
		'label' => __('Background Overlay Color', 'boombox' ),
		'section' => 'boombox_background',
		'settings' => 'overlay_color'
	)));


	//overlay opacity
	$wp_customize->add_setting('overlay_opacity', array(
		'default' => '0.7'
	));
	$wp_customize->add_control( 'overlay_opacity', array(
		'label' => __('Background Overly Opacity.Choose a value between 0 and 1 (eg: 0.7).', 'boombox' ),
		'section' => 'boombox_background',
		'settings' => 'overlay_opacity'
	));


	/***************************************************
	Colors
	***************************************************/
	$wp_customize->add_section('boombox_colors', array(
		'title' => __('Colors', 'boombox'),
		'description' => 'Change the site\'s colors',
		'priority' => 3
	));


	//primary color
	$wp_customize->add_setting('primary_color', array(
		'default' => '#382a3b'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
		'label' => __('Primary Theme Color', 'boombox' ),
		'section' => 'boombox_colors',
		'settings' => 'primary_color'
	)));


}

function boombox_css_customizer(){

	//set needed variables from above
	$background_position = get_theme_mod('background_position');
	$background_repeat = get_theme_mod('background_repeat');
	$background_attachment = get_theme_mod('background_attachment');

	$overlay_color = get_theme_mod('overlay_color');
	$overlay_opacity = get_theme_mod('overlay_opacity');

	$primary_color = get_theme_mod('primary_color');

	?>

		<style type="text/css">
			#site_wrap{
				background-image: url("<?php echo get_theme_mod('background_image') ?>");
				<?php

					if( $background_position != '' ){
						switch($background_position){

							case 'fill':
								echo "background-position: center center;
									-webkit-background-size: cover;
									-moz-background-size: cover;
									-o-background-size: cover;
									background-size: cover;";
								break;
							case 'topleft':
								echo "background-position: top left;";
								break;
							case 'topcenter':
								echo "background-position: top center;";
								break;
							case 'center':
								echo "background-position: center center;";
								break;

						}
					}

					if( $background_repeat ){
						switch( $background_repeat ){

							case 'repeat':
								echo "background-repeat: repeat;";
								break;
							case 'repeatx':
								echo "background-repeat: repeat-x;";
								break;
							case 'repeaty':
								echo "background-repeat: repeat-y;";
								break;
							case 'norepeat':
								echo "background-repeat: no-repeat;";
								break;

						}
					}

					if( $background_attachment ){
						switch( $background_attachment ){

							case 'scroll':
								echo "background-attachment: scroll;";
								break;
							case 'fixed':
								echo "background-attachment: fixed;";
								break;

						}
					}

				?>
			}
			#site_wrap #overlay_color{
				background-color: <?php echo $overlay_color; ?>;
				opacity: <?php echo $overlay_opacity; ?>;
			}

			a,
			html,
			body,
			.mailing_list .mailing_list_title,
			.mailing_list form input[type="text"]{
				color: <?php echo $primary_color; ?>;
			}
			#mobile_menu,
			.mailing_list form input[type="submit"]{
				background-color: <?php echo $primary_color; ?>;
			}
			.mailing_list form input{
				border: solid 2px <?php echo $primary_color; ?>;
			}
			.mailing_list form ::-webkit-input-placeholder { color: <?php echo $primary_color; ?>; }
			.mailing_list form :-moz-placeholder { color: <?php echo $primary_color; ?>; }
			.mailing_list form ::-moz-placeholder { color: <?php echo $primary_color; ?>; }
			.mailing_list form :-ms-input-placeholder { color: <?php echo $primary_color; ?>; }
			.mailing_list form label.placeholder{ color: <?php echo $primary_color; ?>; }

		</style>

	<?php
}


/*
this means every time Wordpress calls the "customize_register" functon, 
my function is connected to it and fired every time as well!
*/
add_action( 'wp_head', 'boombox_css_customizer' ); //eg: fire the boombox_css_customizer function whenever wp_head is called
add_action( 'customize_register', 'boombox_customizer_register' );

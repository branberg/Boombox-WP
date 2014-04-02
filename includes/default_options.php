<?php

function updateoptionkeys() {
	$fields = array (

		//background options
		"field_53348c776bf17"	=> 'Fullscreen', //bg position
		"field_53348c316bf16"	=> 'No Repeat', //bg repeat
		"field_53348cbb6bf18"	=> 'Fixed Background', //bg attachment
		"field_53348ce66bf19"	=> '#ffffff', //bg overlay color
		"field_53348d016bf1a"	=> '90', //bg overlay opacity

		//site colors
		"field_53348a129e5f7"	=> '#382A3B', //main color
		"field_53371f6f6f463"	=> '#382A3B', //menu color
		"field_53371f916f464"	=> '#382A3B', //footer text color

		//music colors
		"field_5337146fe4728"	=> '#382A3B', //music background color
		"field_5337148fe4729"	=> '#ffffff', //music text color

		//mobile
		"field_533717bc7b2ef"	=> '#382A3B', //mobile menu background color
		"field_533717d67b2f0"	=> '#ffffff', //mobile menu text color

		//social icons
		"field_533351fd6cbf6"	=> array(
			array( 'social_network' => 'facebook', 'link_url' => 'http://facebook.com' ),
			array( 'social_network' => 'twitter', 'link_url' => 'http://twitter.com' ),
			array( 'social_network' => 'soundcloud', 'link_url' => 'http://soundcloud.com' )
		),

		//mailing list
		"field_5332feb5d5632"	=> 'On', //mailing list visibility
		"field_5332feced5633"	=> 'Mailing List', //mailing list title
		"field_5332fefbd5635"	=> 'Enter your email address', //mailing list placeholder text
		"field_5332feecd5634"	=> 'Submit', //mailing list button text

	); 

	foreach ($fields as $key=>$value) { 

		$existence = get_field_object($key);

		if (!get_field($existence['name'], "options")) {
			update_field($key, $value, "options");
		}

	} 
}

function myactivationfunction($oldname, $oldtheme=false) {
	updateoptionkeys();
}

add_action("after_switch_theme", "myactivationfunction");
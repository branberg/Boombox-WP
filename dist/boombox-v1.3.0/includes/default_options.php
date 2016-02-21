<?php

function updateoptionkeys() {
  
  $fields = array (
    //background options
    "field_534575addbe8c" => 'Fullscreen', //bg position
    "field_534575d9dbe8d" => 'No Repeat', //bg repeat
    "field_53457600dbe8e" => 'Fixed Background', //bg attachment
    "field_5345762adbe8f" => '#ffffff', //bg overlay color
    "field_53457641dbe90" => '90', //bg overlay opacity
    //fonts
    "field_53457694dbe92" => 'Google Font', //set default heading font type
    "field_534576c1dbe93" => 'Montserrat', //heading font
    "field_53457777f2cf2" => 'Google Font', //body font type
    "field_5345779af2cf3" => 'Open Sans', //body font
    //site colors
    "field_5345784994490" => '#382A3B', //main color
    "field_5345787494491" => '#382A3B', //menu color
    "field_5345788294492" => '#382A3B', //footer text color
    //music colors
    "field_534578a294494" => '#382A3B', //music background color
    "field_534578b594495" => '#ffffff', //music text color
    //mobile
    "field_53457923df004" => '#382A3B', //mobile menu background color
    "field_5345793bdf005" => '#ffffff', //mobile menu text color
    //social icons
    "field_534579d0ada8d" => array(
      array( 'social_network' => 'facebook', 'link_url' => 'http://facebook.com' ),
      array( 'social_network' => 'twitter', 'link_url' => 'http://twitter.com' ),
      array( 'social_network' => 'soundcloud', 'link_url' => 'http://soundcloud.com' )
    ),
    //mailing list
    "field_534574934f4c8" => 'Off', //mailing list visibility
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

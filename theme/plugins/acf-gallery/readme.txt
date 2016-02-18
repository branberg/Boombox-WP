=== Advanced Custom Fields: Gallery Field ===
Contributors: elliotcondon
Author: Elliot Condon
Author URI: http://www.elliotcondon.com
Plugin URI: http://www.advancedcustomfields.com
Requires at least: 3.5
Tested up to: 3.5.1
Stable tag: trunk
Homepage: http://www.advancedcustomfields.com/add-ons/gallery-field/
Version: 1.1.1


== Copyright ==
Copyright 2011 - 2013 Elliot Condon

This software is NOT to be distributed, but can be INCLUDED in WP themes and Plugins: Premium or Contracted.
If you include this software within a premium theme or premium plugin, you MUST remove the acf-gallery-update.php file from the folder.

This software is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.


== Description ==

= Create beautiful image galleries, sliders and more at lightning speed! =

The Gallery field creates a simple and intuitive interface for managing a collection of images. The interface features 2 different views for clients to better manage the data

http://www.advancedcustomfields.com/add-ons/gallery-field/


== Installation ==

This software can be treated as both a WP plugin and a theme include.
However, only when activated as a plugin will updates be available/

= Plugin =
1. Copy the 'acf-gallery' folder into your plugins folder
2. Activate the plugin via the Plugins admin page

= Include =
1. Copy the 'acf-gallery' folder into your theme folder (can use sub folders)
   * You can place the folder anywhere inside the 'wp-content' directory
2. Edit your functions.php file and add the following code to include the field:

`
include_once('acf-gallery/acf-gallery.php');

`

3. Make sure the path is correct to include the acf-gallery.php file
4. Remove the acf-gallery-update.php file from the folder.


== Changelog ==

= 1.1.1 =
* Fixed Bug where upload popup would appear when editing an image

= 1.1.0 =
* IMPORTANT: ACF Gallery Field now requires a minimum WordPress version of 3.5.0
* IMPORTANT: If you are using this add-on within a premium theme / plugin, you MUST remove the update file
* Added uploadedTo option to match image / file fields
* Major re-write of the JS to comply with newer jQuery versions
* Improved value returned by get_field: Files and images will now return slightly different and more relevant data

= 1.0.0 =
* Official Release

= 0.0.6 =
* [Fixed] Fix JS error causing images not to update (metadata)

= 0.0.5 =
* [IMPORTANT] This update requires the latest ACF v4 files available on GIT - https://github.com/elliotcondon/acf4
* [Added] Added category to field to appear in the 'Content' optgroup
* [Updated] Updated dir / path code to use acf filter

= 0.0.4 =
* [Fixed] Fix wrong str_replace in $dir

= 0.0.3 =
* [IMPORTANT] This update requires the latest ACF v4 files available on GIT - https://github.com/elliotcondon/acf4
* [Updated] Updated format_value filters for new 3rd parameter

= 0.0.2 =
* [Fixed] Fix wrong css / js urls on WINDOWS server.

= 0.0.1 =
* Initial Release.

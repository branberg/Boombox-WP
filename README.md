# Boombox WP
A simple, single-page Wordpress theme made just for Musicians.

![](https://cloud.githubusercontent.com/assets/7304891/13133255/4d4c8e88-d5bf-11e5-9fc4-42be1c35ab4f.jpg)

## Installation Instructions
All instructions assume you're working with a fresh install of Wordpress.  
It might work on an existing site, though your mileage will likely vary.

  1. Install base Wordpress
  2. Download `boombix.zip` from the [latest release](https://github.com/branberg/Boombox-WP/releases/latest)
  3. Install theme manually by dropping extracted download in your wp-content/themes directory or use the "Add Themes" page in your Dashboard
  4. Active theme and preview site
  5. Fill out content! (details coming soon)

## Making Releases
Boombox-WP uses [Gulp](https://github.com/gulpjs/gulp) to generate builds. It works in three steps:

  1. `$ gulp bump-package` to increase version number in `package.json`
  2. `$ gulp bump-style`* to update/match the version in `theme/style.css` to match (to keep Wordpress versioning intact)
  3. `$ gulp release' to zip up the theme and place it in the `dist` directory

*_Ideally doing #1 & #2 in one step would be great, but Gulp's streams are weird with caching the `pachage.json` version number._

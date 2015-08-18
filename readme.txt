=== WordPress LiveRacers ===
Contributors: pglewis
Tags: LiveRacers, simracing
Requires at least: 3.4
Tested up to: 4.2.4
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Insert the LiveRacers Live Widget on your site via a WordPress widget or shortcode.

== Description ==

= Widget Use =

The WordPress widget allows you to insert the LiveRacers Live Widget into any widgetized area in your site's theme.  All the settings are available directly in the widget UI.

= Shortcode Use =

You can also use the shortcode `lr_livewidget` to insert the Live Widget into any shortcode enabled content area or via `do_shortcode()` in PHP code.

Example: `[lr_livewidget url="http://efnetsimracing.liveracers.com" theme="dark"]`

= Shortcode attributes =

* `url` -  String, required: the full URL to your LiveRacers domain
* `theme` - String: `"light"` (default) or `"dark"`
* `orientation` - String: `"vertical"` (default) or `"horizontal"`
* `width` - Numeric: width of the widget in pixels (default = 200)
* `canjoin` - String: `"true"` (default) or `"false"`; whether or not to show the "Join" link

== Installation ==

1. Unpack the entire contents of the plugin zip file into your `wp-content/plugins/` folder locally
1. Upload to your site
1. Navigate to the WP Admin plugin page
1. Activate this plugin

OR you can just install it from the WordPress admin by going to Plugins >> Add New and typing this plugin's name

== Screenshots ==

1. The WordPress Widget UI for the LiveRacers Live Widget

== Changelog ==

= 1.0.1 =
* Fix missing output for theme and orientation drop-downs in the widget

= 1.0 =
* Initial release

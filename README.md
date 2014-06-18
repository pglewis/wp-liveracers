WordPress LiveRacers
====================

Support for the LiveRacers "Live Widget" as a WordPress plugin.  Insert the LiveRacers Live Widget on your site via a WordPress widget or shortcode

Installing
==========

1. Download the .zip file from the repository
1. Put the contents of the .zip file into your wp-content/plugins folder
1. Enable the plugin

Widget
======
The WordPress widget allows you to insert the LiveRacers Live Widget into any widgetized area in your site's theme.  All the settings are available directly in the widget UI. 

![alt tag](https://raw.githubusercontent.com/pglewis/wp-liveracers/master/assets/screenshot-1.png)

Shortcode
=========

You can also use the shortcode `lr_livewidget` to insert the Live Widget into any shortcode enabled content area or via `do_shortcode()` in PHP code.  

Example: `[lr_livewidget url="http://efnetsimracing.liveracers.com" theme="dark"]`

Supported attributes: 
* `url`: Required, the full URL to your LiveRacers domain
* `theme`: String, `light` (default) and `dark`
* `orientation`: String, `vertical` (default) and `horizontal`
* `width`: Numeric, width of the widget in pixels (default = 200)
* `canjoin`: String, `true` (default) or `false`; whether or not to show the "Join" link

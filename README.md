wp-liveracers
=============

WordPress plugin to insert the LiveRacers Live Widget on your site via a WordPress widget or shortcode

Widget
======
The WordPress widget allows you to insert the LiveRacers Live Widget into any widgetized area in your site's theme.  All the settings are available directly in the widget UI. 

![alt tag](https://raw.githubusercontent.com/pglewis/wp-liveracers/master/wp-liveracers-widget.png)

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

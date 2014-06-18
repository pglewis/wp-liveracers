<?php
/*
Plugin Name: WordPress LiveRacers
Plugin URI: https://github.com/pglewis/wp-liveracers
Description: Support for the LiveRacers "Live Widget" in WordPress
Version: 1.0
Author: Phil Lewis
License: GPLv2 or later
Text Domain: wp-liveracers
Domain Path: /languages/

Copyright 2014 Phil Lewis

This file is part of WordPress LiveRacers

WordPress LiveRacers is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/**
 * Class WP_LiveRacers
 */
class WP_LiveRacers {

	static $plugin_url;

	static $plugin_dir;

	/**
	 * Bootstrap for the plugin
	 */
	public static function init () {

		self::$plugin_url = trailingslashit( plugin_dir_url( __FILE__ ) );
		self::$plugin_dir = trailingslashit( plugin_dir_path( __FILE__ ) );

		load_plugin_textdomain( 'wp-liveracers', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

		// Scripts
		add_action( 'wp_enqueue_scripts', array( 'WP_LiveRacers', 'enqueue_scripts' ) );

		// Widget support
		add_action( 'widgets_init', array( 'WP_LiveRacers', 'register_widgets' ) );

		// Shortcode support
		add_shortcode( 'lr_livewidget', array( 'wp_LiveRacers', 'liveracers_shortcode' ) );
	}

	/**
	 * Front end scripts
	 */
	public static function enqueue_scripts () {

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'wp-liveracers', self::$plugin_url . 'scripts/wp-liveracers.js', array( 'jquery' ), 1.0, true );
	}

	/**
	 * Widget support
	 */
	public static function register_widgets () {

		require_once self::$plugin_dir . 'includes/wp-liveracers-widget.php';

		register_widget( 'WP_LiveRacers_Widget' );
	}

	/**
	 * Shortcode support
	 *
	 * @param $attributes
	 *
	 * @return string
	 */
	public static function liveracers_shortcode ( $attributes ) {

		$attributes = shortcode_atts( self::get_liveracers_defaults(), $attributes );

		return WP_LiveRacers::get_liveracers_markup( $attributes );
	}

	/**
	 * @param $params
	 *
	 * @return string
	 */
	public static function get_liveracers_markup ( $params ) {

		$params = array_merge( self::get_liveracers_defaults(), $params );

		$url = esc_url( $params[ 'url' ] );
		$theme = esc_attr( $params[ 'theme' ] );
		$orientation = esc_attr( $params[ 'orientation' ] );
		$width = esc_attr( $params[ 'width' ] );
		$can_join = esc_attr( $params[ 'canjoin' ] );

		$return_string = sprintf( "<script type='text/javascript'>window._lr = { url : '%s' };</script>", $url );
		$return_string .= sprintf( "<div id='lr-servers' theme='%s' orientation='%s' width='%spx' canjoin='%s'></div>", $theme, $orientation, $width, $can_join );

		return $return_string;
	}

	/**
	 * @return array
	 */
	public static function get_liveracers_defaults () {

		return array(
			'url'         => '',
			'theme'       => 'light',
			'orientation' => 'vertical',
			'width'       => '200',
			'canjoin'     => 'true'
		);
	}
}

/**
 * Call init after all plugins have loaded
 */
add_action( 'plugins_loaded', array( 'WP_LiveRacers', 'init' ) );

<?php

/**
 * Class WP_LiveRacers_Widget
 */
class WP_LiveRacers_Widget extends WP_Widget {

	/**
	 *
	 */
	function __construct () {

		$name = __( 'LiveRacers Live Widget', 'wp-liveracers' );
		$options = array(
			'description' => __( 'Display the LiveRacers Live Widget', 'wp-liveracers' )
		);

		parent::__construct( 'wp_liveracers', $name, $options );
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	function widget ( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );

		echo $args[ 'before_widget' ];

		if ( ! empty( $title ) ) {
			echo $args[ 'before_title' ] . $title . $args[ 'after_title' ];
		}

		echo WP_LiveRacers::get_liveracers_markup( $instance );

		echo $args[ 'after_widget' ];
	}

	/**
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array|void
	 */
	function update ( $new_instance, $old_instance ) {

		$new_instance[ 'canjoin' ] = ( !empty( $new_instance[ 'canjoin' ] ) ) ? "true" : "false";
		$new_instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ) ? strip_tags( $new_instance[ 'title' ] ) : '';

		return array_merge( WP_LiveRacers::get_liveracers_defaults(), $new_instance );
	}

	/**
	 * @param array $instance
	 *
	 * @return string|void
	 */
	function form ( $instance ) {

		$title = ( isset( $instance[ 'title' ] ) ) ? $instance[ 'title' ] : __( 'LiveRacers Servers', 'wp-liveracers' );
		$url = ( isset( $instance[ 'url' ] ) ) ? $instance[ 'url' ] : 'http://YOURDOMAIN.liveracers.com';
		$theme = ( isset( $instance[ 'theme' ] ) ) ? $instance[ 'theme' ] : 'light';
		$orientation = ( isset( $instance[ 'orientation' ] ) ) ? $instance[ 'orientation' ] : 'vertical';
		$width = ( isset( $instance[ 'width' ] ) ) ? $instance[ 'width' ] : '200';
		$canjoin = ( isset( $instance[ 'canjoin' ] ) ) ? $instance[ 'canjoin' ] : 'true';
		?>
		<p>
			<label for="<?= $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'wp-liveracers' ); ?></label>
			<input class="widefat" id="<?= $this->get_field_id( 'title' ); ?>" name="<?= $this->get_field_name( 'title' ); ?>" type="text" value="<?= esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?= $this->get_field_id( 'url' ); ?>"><?php _e( 'LiveRacers URL:', 'wp-liveracers' ); ?></label>
			<input class="widefat" id="<?= $this->get_field_id( 'url' ); ?>" name="<?= $this->get_field_name( 'url' ); ?>" type="text" value="<?= esc_url( $url ); ?>">
		</p>
		<p>
			<label for="<?= $this->get_field_id( 'theme' ); ?>"><?php _e( 'Theme:', 'wp-liveracers' ); ?></label>
			<select class="widefat" id="<?= $this->get_field_id( 'theme' ); ?>" name="<?= $this->get_field_name( 'theme' ); ?>">
				<option value="light" <?= ( $theme == 'light' ) ? 'selected="selected"' : ''; ?>>Light</option>
				<option value="dark" <?= ( $theme == 'dark' ) ? 'selected="selected"' : ''; ?>>Dark</option>
			</select>
		</p>
		<p>
			<label for="<?= $this->get_field_id( 'orientation' ); ?>"><?php _e( 'Orientation:', 'wp-liveracers' ); ?></label>
			<select class="widefat" id="<?= $this->get_field_id( 'orientation' ); ?>" name="<?= $this->get_field_name( 'orientation' ); ?>">
				<option value="vertical" <?= ( $orientation == 'vertical' ) ? 'selected="selected"' : ''; ?>>Vertical</option>
				<option value="horizontal" <?= ( $orientation == 'horizontal' ) ? 'selected="selected"' : ''; ?>>Horizontal</option>
			</select>
		</p>
		<p>
			<label for="<?= $this->get_field_id( 'width' ); ?>"><?php _e( 'Width (pixels)', 'wp-liveracers' ); ?></label>
			<input class="widefat" id="<?= $this->get_field_id( 'width' ); ?>" name="<?= $this->get_field_name( 'width' ); ?>" type="text" value="<?= esc_attr( $width ); ?>">
		</p>
		<p>
			<input type="checkbox" id="<?= $this->get_field_id( 'canjoin' ); ?>" name="<?= $this->get_field_name( 'canjoin' ); ?>" value="canjoin" <?= ( 'true' == $canjoin ) ? 'checked="checked"' : ''; ?>>
			<label for="<?= $this->get_field_id( 'canjoin' ); ?>"><?php _e( 'Can join server?', 'wp-liveracers' ); ?></label>
		</p>
		<?php
	}

}
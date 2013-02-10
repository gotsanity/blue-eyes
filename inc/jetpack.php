<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package: Blue Eyes 1.0
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function blue_eyes_1_0_infinite_scroll_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'blue_eyes_1_0_infinite_scroll_setup' );

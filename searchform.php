<?php
/**
 * The template for displaying search forms in Blue Eyes 1.0
 *
 * @package Blue Eyes 1.0
 * @since Blue Eyes 1.0 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'blue_eyes_1_0' ); ?></label>
		<input type="text" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'blue_eyes_1_0' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'blue_eyes_1_0' ); ?>" />
	</form>

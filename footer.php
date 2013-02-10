<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Blue Eyes 1.0
 * @since Blue Eyes 1.0 1.0
 */
?>

	</div><!-- #main .site-main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'blue_eyes_1_0_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'blue_eyes_1_0' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'blue_eyes_1_0' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'blue_eyes_1_0' ), 'Blue Eyes 1.0', '<a href="http://www.insidousdesigns.net" rel="designer">Gotsanity</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>
</body>
</html>

<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package mon_cahier
 * @since mon_cahier 1.0
 */
?>

	</div><!-- #main -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="site-info">
			<?php do_action( 'mon_cahier_credits' ); ?>

			<?php echo date('Y'); ?> <?php bloginfo('name'); ?> <span class="sep">|</span> <?php _e( 'Powered by', 'mon_cahier' ); ?> <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'mon_cahier' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'mon_cahier' ); ?>"><?php printf( 'WordPress' ); ?></a> <span class="sep">|</span> <?php _e( 'Theme Mon Cahier by', 'mon_cahier' ); ?> <a href="<?php echo esc_url( __( 'http://bluelimemedia.com/', 'mon_cahier' ) ); ?>" title="<?php esc_attr_e( 'Bluelime Media', 'mon_cahier' ); ?>"><?php printf( 'Bluelime Media' ); ?></a>


		</div><!-- .site-info -->
	</footer><!-- .site-footer .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>
</body>
</html>

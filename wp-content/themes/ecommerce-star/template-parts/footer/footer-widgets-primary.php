<?php
/**
 * Displays footer widgets if assigned
 * @package ecommerce-star
 * @since 1.0
 */

?>

	<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'ecommerce-star' ); ?>">
		<?php
		if ( is_active_sidebar( 'footer-sidebar-1' ) ) {
		?>
			<div class="col-md-4 col-sm-4 footer-widget">
				<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
			</div>
		<?php
		}
		if ( is_active_sidebar( 'footer-sidebar-2' ) ) {
		?>
			<div class="col-md-4 col-sm-4 footer-widget">
				<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
			</div>			
		<?php
		}
		if ( is_active_sidebar( 'footer-sidebar-3' ) ) {
		?>
			<div class="col-md-4 col-sm-4 footer-widget">
				<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
			</div>
		<?php } ?>
	</aside><!-- .widget-area -->
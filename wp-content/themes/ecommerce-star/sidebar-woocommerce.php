<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ecommerce-star
 * @since 1.0
 */
if ( ! is_active_sidebar( 'sidebar-woocommerce' ) ) {
	return;
}
?>
<aside id="secondary" class="widget-area woocomemrce-widgets" role="complementary" aria-label="<?php esc_attr_e( 'Woocommerce Sidebar', 'ecommerce-star' ); ?>">
	<?php dynamic_sidebar( 'sidebar-woocommerce' ); ?>
</aside><!-- #secondary -->

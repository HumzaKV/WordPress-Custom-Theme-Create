<?php 
global $ecommerce_star_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $ecommerce_star_option = wp_parse_args(  get_option( 'ecommerce_star_option', array() ) , ecommerce_star_settings());  
}
?>
<!-- start of site branding search -->
<div class="container">
	<?php if($ecommerce_star_option['header_woocommerce'] && class_exists( 'WooCommerce' )): ?>
		<?php ecommerce_star_woocommerce_header(); ?>
	<?php else: ?>
		<?php ecommerce_star_default_header(); ?>
	<?php endif; ?> 
	 
</div><!-- .container -->

<!--display menu bar full row when header options -> woocommerce layout with search--> 
<?php if($ecommerce_star_option['header_woocommerce'] && class_exists( 'WooCommerce' )): ?>
	<?php ecommerce_star_woocommerce_menu(); ?>
<?php endif; ?>


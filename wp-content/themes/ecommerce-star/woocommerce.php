<?php
/**
 * The template for displaying woocommerce pages
 * @package business-store-pro
 * @since 1.0
 */
global $ecommerce_star_option;
get_header();

if ( class_exists( 'WP_Customize_Control' ) ) {
   $ecommerce_star_option = wp_parse_args(  get_option( 'ecommerce_star_option', array() ) , ecommerce_star_settings());  
}
?>
<div class="container background">
   <div class="row">
   
   <?php if( is_active_sidebar( 'sidebar-woocommerce' ) ): ?>
	
		<?php if ($ecommerce_star_option['woo_sidebar_position']=='left'): ?>
				<div class="col-md-3 col-sm-3 col-xs-12 floateleft" > 
					<?php get_template_part('sidebar', 'woocommerce'); ?>			
				</div>
		<?php endif; ?>	 
		  
			<div id="primary" class="col-md-9 col-sm-9 col-lg-9 content-area">
				<main id="main" class="site-main" role="main">			
			
				<?php if (!$ecommerce_star_option['woocommerce_no_breadcrumb'] &&  class_exists('WooCommerce') && is_woocommerce()) : ?>	
					<div><?php woocommerce_breadcrumb(); ?></div>
				<?php endif; ?>		
			
				<?php woocommerce_content(); ?>
			
				</main><!-- #main --> 
			
			</div><!-- #primary -->
	
		<?php if ($ecommerce_star_option['woo_sidebar_position']=='right'): ?>
				<div class="col-md-3 col-sm-3 col-xs-12 floateright" > 
					<?php get_template_part('sidebar', 'woocommerce'); ?>			
				</div>
		<?php endif; ?>
					
	<!--no sidebar-->		
	<?php else: ?>
	
  	<div id="primary" class="col-md-12 col-sm-12 col-lg-12 content-area">
		<main id="main" class="site-main" role="main">

		<?php if (class_exists('WooCommerce') && is_woocommerce()) : ?>	
			<?php woocommerce_breadcrumb(); ?>	
		<?php endif; ?>		

		<?php woocommerce_content(); ?>

		</main><!-- #main --> 

	</div><!-- #primary -->
	
			
	<?php endif; ?>

  </div>		
</div><!-- .container -->

<?php
get_footer();

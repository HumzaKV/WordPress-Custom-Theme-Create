<?php
/*
 * WooCommerce Header
 */
function retail_shop_default_header(){
	global $ecommerce_star_option;
?>

		<div class="row">
			<!-- .start of site-branding -->
			<div class="col-md-12 col-sm-12 col-xs-12 site-branding" >
			  <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
			  <?php the_custom_logo(); ?>
			  <?php endif; ?>
			  <div class="site-branding-text" style=" <?php if(!$ecommerce_star_option['header_show_title_tag']) echo 'display:none'; ?>" >
				<?php if ( is_front_page() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" >
				  <?php bloginfo( 'name' ); ?>
				  </a></h1>
				<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" >
				  <?php bloginfo( 'name' ); ?>
				  </a></p>
				<?php endif; ?>
				<?php $description = get_bloginfo( 'description', 'display' ); if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo esc_html($description); ?></p>
				<?php endif; ?>
			  </div>
			</div>
			<!-- .end of site-branding -->		
		</div>

 		<!--  menu, search -->
		<div class="vertical-center">
	
		<div class="col-md-5 col-lg-5 col-sm-5 col-xs-12" >
				<?php ecommerce_star_product_search(); ?>
		</div>
		
		<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">
			<div id="cart-wishlist-container">
				<table class="cart-wishlist-table">
				<tr>
				<td>
				  <?php if(class_exists('YITH_WCWL')): ?>
				  <div id="wishlist-top" class="wishlist-top">
					<div class="wishlist-container">
					  <?php ecommerce_star_wishlist_count(); ?>
					</div>
				  </div>
				  <?php endif; ?>
				</td>
				<td>
				  <div id="cart-top" class="cart-top">
					<div class="cart-container">
					  <?php do_action( 'woocommerce_cart_top' ); ?>
					</div>
					
					<div id="popup-cart-wrap" class="widget woocommerce widget_shopping_cart "><?php woocommerce_mini_cart(); ?></div>

				  </div>
				</td>
				</tr>
				</table>
			</div>
		</div>
		
	</div><!-- end of  .menu, search -->
<?php 
}

<div class="padding-top-md padding-bottom-md">
<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<div><?php
			global $retail_shop_option;	
			if ( class_exists( 'WP_Customize_Control' ) ) {
			   $retail_shop_option = wp_parse_args(  get_option( 'ecommerce_star_option', array() ) , ecommerce_star_settings());  
			}
			the_widget('ecommerce_star_product_navigation_widget', ''); 
			?>
			</div>
		</div>
		<div class="col-sm-8">
			<div><?php
			$retail_shop_instance = array(
				'category_id' => $retail_shop_option['slider_nav_cat'],
			);			
			the_widget('ecommerce_star_product_carousal_widget', $retail_shop_instance); 
			?></div>
		</div>
	</div>
</div>
</div>

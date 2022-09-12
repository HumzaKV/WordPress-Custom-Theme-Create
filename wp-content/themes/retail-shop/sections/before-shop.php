<section id="before-shop">
	<div>
		<?php 
		global $retail_shop_option;	
			if ( class_exists( 'WP_Customize_Control' ) ) {
			$retail_shop_option = wp_parse_args(  get_option( 'ecommerce_star_option', array() ) , ecommerce_star_settings());  
		}

		$retail_shop_banner = $retail_shop_option['before_shop'];
	
	
		$retail_shop_args = array( 'post_type' => 'page','ignore_sticky_posts' => 1 , 'post__in' => array($retail_shop_banner));
		$retail_shop_result = new WP_Query($retail_shop_args);
		while ( $retail_shop_result->have_posts() ) :
			$retail_shop_result->the_post();
			the_content();
		endwhile;
		wp_reset_postdata();

		 ?>
	</div>
</section> 
<div class="container">
<div id="search-category" tabindex="0"> 
<form class="search-box" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	<div class="search-cat">
		<select class="category-items" name="product_cat" >
			<option value="0"><?php esc_html_e('All Categories','ecommerce-star'); ?></option>
			<?php
			$ecommerce_star_args = array(
				 'taxonomy'     => 'product_cat',
				 'orderby'      => 'date',
				 'order'      => 'ASC',
				 'show_count'   => 1,
				 'pad_counts'   => 0,
				 'hierarchical' => 1,
				 'title_li'     => '',
				 'hide_empty'   => 1,
			);
			$ecommerce_star_all_categories = get_categories( $ecommerce_star_args );
			foreach ($ecommerce_star_all_categories as $ecommerce_star_cat) {
				echo '<option value="'.esc_attr($ecommerce_star_cat->slug).'">'.esc_html($ecommerce_star_cat->name).'</option>';
			}
			?>
		</select>
	</div>
	
  <label class="screen-reader-text" for="woocommerce-product-search-field"><?php esc_html_e('Search for','ecommerce-star'); ?></label>
  <input type="search" name="s" id="text-search" value="" placeholder="<?php esc_attr_e('Search products...','ecommerce-star'); ?>">
  <button id="btn-search-category" type="submit"><span class="fa icon fa-search"></span></button>
  <input type="hidden" name="post_type" value="product">
</form>
</div>
</div>
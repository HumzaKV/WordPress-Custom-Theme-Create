<?php
/*
 * Show woocomemrce categories as menu
 */

if (!class_exists('WooCommerce') || !class_exists('ecommerce_star_product_carousal_widget')) return;

class ecommerce_star_product_navigation_widget extends WC_Widget {

		function __construct() {
				
				$this->widget_cssclass    = 'woocommerce product_navigation_widget';
				$this->widget_description = esc_html__( 'Display product category menu.', 'ecommerce-star' );
				$this->widget_id          = 'ecommerce_star_product_navigation_widget';
				$this->widget_name        = esc_html__( 'THEME: Product Navigation[Categories]', 'ecommerce-star' );
		
				parent::__construct();				
		}

		public function widget($args, $instance) {
		
						
				$max_items = (!empty($instance['max_items'])) ? absint($instance['max_items']) : 20;

				echo $args['before_widget'];
				
				//Generate widget front end html
				ecommerce_star_product_navigation(esc_html__("Categories", "ecommerce-star"), $max_items);

				echo $args['after_widget'];
										


		}

		public function form($instance) {
				$max_items = (!empty($instance['max_items'])) ? absint($instance['max_items']) : 20;
		?>

		<p>
		<label for="<?php echo esc_attr($this->get_field_id('max_items')); ?>"><?php esc_html_e('Max Items to Show:', 'ecommerce-star'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('max_items')); ?>" name="<?php echo esc_attr($this->get_field_name('max_items')); ?>" type="number" value="<?php echo esc_attr($max_items); ?>" />
		</p>

		<?php
		}

		// Updating widget replacing old instances with new
		public function update($new_instance, $old_instance) {
				$instance = array();
				$instance['max_items'] = (!empty($new_instance['max_items'])) ? absint($new_instance['max_items']) : '';
				return $instance;
		}
} // widget ends


/*
 * Product navigation by categories up to 3 sub categories
 */

function ecommerce_star_product_navigation($widget_title, $max_items = 50){
  if (!class_exists('WooCommerce')) return;
  $args = array(
         'taxonomy'     => 'product_cat',
         'orderby'      => 'date',
		 'order'      	=> 'ASC',
         'show_count'   => 1,
         'pad_counts'   => 0,
         'hierarchical' => 1,
         'title_li'     => '',
         'hide_empty'   => 1,
  );
 $all_categories = get_categories( $args );
 $cat_count = 1;
 echo '<div class="product-navigation">'; 	
	 echo '<ul>';
	 if($widget_title){
	 	echo '<li class="navigation-name"><a href="#"><i class="fa fa-align-left"></i> '.esc_html($widget_title).'</a></li>';
	 }
	 foreach ($all_categories as $cat) {
		 if($cat_count > $max_items){
			break;
		 }
		 $cat_count++;
		
			if($cat->category_parent == 0) {
				$category_id = $cat->term_id; 
				$args2 = array(
						'taxonomy'     => 'product_cat',
						'child_of'     => 0,
						'parent'       => $category_id,
						'orderby'      => 'name',
						'show_count'   => 1,
						'pad_counts'   => 0,
						'hierarchical' => 1,
						'title_li'     => '',
						'hide_empty'   => 0,
				);
				$sub_cats = get_categories( $args2 );
				
				if($sub_cats) {
				echo '<li class="has-sub"> <a href="'.esc_url(get_term_link($cat->slug, 'product_cat')).'">'.esc_html($cat->name).'</a>';
				echo '<ul>';
					foreach($sub_cats as $sub_category) {
						$sub_category_id = $sub_category->term_id;
						$args3 = array(
								'taxonomy'     => 'product_cat',
								'child_of'     => 0,
								'parent'       => $sub_category_id,
								'orderby'      => 'name',
								'show_count'   => 1,
								'pad_counts'   => 0,
								'hierarchical' => 1,
								'title_li'     => '',
								'hide_empty'   => 0,
						);
						$sub_sub_cats = get_categories( $args3 );
						if($sub_sub_cats) {
						echo '<li class="has-sub"> <a href="'.esc_url(get_term_link($sub_category->slug, 'product_cat')).'">'.esc_html($sub_category->name).'</a>';
							echo '<ul>';
								foreach($sub_sub_cats as $sub_sub_cat) {
									echo '<li> <a href="'.esc_url(get_term_link($sub_sub_cat->slug, 'product_cat')).'">'.esc_html($sub_sub_cat->name).'</a>';
								}
							echo '</ul>';						
						} else {
						echo '<li> <a href="'.esc_url(get_term_link($sub_category->slug, 'product_cat')) .'">'.esc_html($sub_category->name).'</a>';
						}
					}
				echo '</ul>'; 
				} else {
					echo '<li> <a href="'.esc_url(get_term_link($cat->slug, 'product_cat')).'">'.esc_html($cat->name).'</a>';
				}
			}		      
	 } /* end for each */
	 echo '</ul>';
 echo '</div>';

} /* end category function */



function ecommerce_star_product_navigation_widget() {
		register_widget('ecommerce_star_product_navigation_widget');
}
add_action('widgets_init', 'ecommerce_star_product_navigation_widget');


/* 
 * slider widget 
 */

class ecommerce_star_product_carousal_widget extends WC_Widget {

		function __construct() {
				
				$this->widget_cssclass    = 'woocommerce product_carousal_widget';
				$this->widget_description = esc_html__( 'Display product carousal through categories.', 'ecommerce-star' );
				$this->widget_id          = 'ecommerce_star_product_carousal_widget';
				$this->widget_name        = esc_html__( 'THEME: Product Carousal', 'ecommerce-star' );
		
				parent::__construct();				
		}

		public function widget($args, $instance) {
		
						
				$category_id = (!empty($instance['category_id'])) ? absint($instance['category_id']) : '';
				$max_height = (!empty($instance['max_height'])) ? absint($instance['max_height']) : 450;

				echo $args['before_widget'];
						
				//generate widget front end
				ecommerce_star_product_carousal($category_id, $max_height);

				echo $args['after_widget'];

		}

		public function form($instance) {
				$category_id = (!empty($instance['category_id'])) ? absint($instance['category_id']) : '';
				$max_height = (!empty($instance['max_height'])) ? absint($instance['max_height']) : 450;
				
				$args = array(
						'taxonomy' => 'product_cat',
						'orderby' => 'date',
						'order' => 'ASC',
						'show_count' => 1,
						'pad_counts' => 0,
						'hierarchical' => 0,
						'title_li' => '',
						'hide_empty' => 1,
				);
				
				$categories = get_categories($args);
				$category_list = '';
				if (0 == $category_id) {
						$category_list = $category_list . '<option value="0" Selected=selected>' . esc_html__('Any', 'ecommerce-star') . '</option>';
				}
				else {
						$category_list = $category_list . '<option value="0">' . esc_html__('Any', 'ecommerce-star') . '</option>';
				}
				foreach ($categories as $cat) {
						$selected = '';
						if (($cat->term_id) == $category_id) {
								$selected = 'Selected=selected';
						}
						$category_list = $category_list . '<option value="' . esc_attr($cat->term_id) . '" ' . $selected . ' >' . esc_html($cat->name) . '</option>';
				}
		global $ecommerce_star_allowed_html;
		?>
		
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('category_id')); ?>"><?php esc_html_e('Select Product Category:', 'ecommerce-star'); ?></label> 
		<select class="widefat" id="<?php echo esc_attr($this->get_field_id('category_id')); ?>" name="<?php echo esc_attr($this->get_field_name('category_id')); ?>" type="text">
		<?php echo wp_kses($category_list, $ecommerce_star_allowed_html); ?>
		</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('max_height'); ?>">
			<?php esc_html_e( 'Max Height:', 'ecommerce-star' ); ?></label><br />
			<input type="number" name="<?php echo $this->get_field_name('max_height'); ?>" id="<?php echo esc_attr($this->get_field_id('max_height')); ?>" value="<?php echo absint($max_height);?>" class="widefat" />
		</p>		


		<?php
		}

		// Updating widget replacing old instances with new
		public function update($new_instance, $old_instance) {
				$instance = array();
				$instance['category_id'] = (!empty($new_instance['category_id'])) ? absint($new_instance['category_id']) : '';
				$instance['max_height'] = (!empty($new_instance['max_height'])) ? absint($new_instance['max_height']) : '';
				return $instance;
		}
} // widget ends


function ecommerce_star_product_carousal_widget() {
		register_widget('ecommerce_star_product_carousal_widget');
}
add_action('widgets_init', 'ecommerce_star_product_carousal_widget');



function ecommerce_star_product_carousal($category, $max_height = 450){
?>
<section style="z-index:0" >
	<div class="svc-section-body ">
	<div>
	<?php
	//set query args to show specified amount or show all posts from particular category. 
	$count = 0;
	$args = array ( 'post_type' => 'product','posts_per_page'=> 3, 'tax_query' => array(
					array(
						'taxonomy' => 'product_cat',
						'terms' => $category,
						'operator' => 'IN',
						)
					));
	
	if($category == 0) {
		$args = array ( 'post_type' => 'product','posts_per_page'=> 3);
	}
		
	$loop = new WP_Query($args);
	$count = $loop->post_count;
	
	$ecommerce_star_slider_id = ecommerce_star_unique_id();
	?>

	<div id="product_carousal_<?php echo absint($ecommerce_star_slider_id); ?>" class="carousel slide " data-interval="3500">
		<div class="no-z-index">
		<?php if($count>1): ?>
		  <ol class="carousel-indicators">
			<?php 
					$j = 0;			
					for ($j = 0; $j < $count; $j++):							
			?>
			<li data-target="#product_carousal_<?php echo absint($ecommerce_star_slider_id); ?>" data-slide-to="<?php echo absint($j); ?>" class="<?php if($j==0){ echo 'active'; }  ?>"></li>
			<?php								
					endfor;
			?>
		  </ol>
		 <?php endif; ?>
		</div>
	
	  <div class="carousel-inner" role="listbox">
		<?php 
		+
		$i = 0;
		while( $loop->have_posts() ) : $loop->the_post();
		global $product;
		global $post;		  
				
		?>
		<div class="item <?php if($i==0){ echo 'active'; } $i++; ?> "> 
		<?php 
		$thumb_id = $url = $my_title = '';
		$alt = '';
		$price = '';
		$prod_id = get_the_ID();
		$thumb_id = get_post_thumbnail_id($prod_id);	
		$url = get_the_post_thumbnail_url($prod_id , 'full');
		if(!$url) {
			$url = ECOMMERCE_STAR_TEMPLATE_DIR_URI.'/images/placeholder.png';
		}
		$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
		$price = $product->get_price_html();

		$my_title = esc_html(get_the_title());
		$post_link = get_permalink( get_the_ID() );			
		?>
		<a href="<?php echo esc_url($post_link); ?>" >
		<img src="<?php echo esc_url($url); ?>" style="width:100%;max-height:<?php echo absint($max_height); ?>px" alt="<?php echo esc_attr($alt); ?>" ></img>	     
		</a>
		<?php
		echo '<div class="pro-slider-caption on-left">';
			echo '<div class="caption-heading">';
				echo '<h3 class="cap-title"><a href="'.esc_url($post_link).'">'.esc_html($my_title).'</a></h3>';
			echo '</div>';		
			echo '<div class="price">'.wp_kses_post($price).'</div>';
		echo '</div>';		 
		?>
		</div>
		<?php
			endwhile;
			wp_reset_postdata(); 
		?>
	</div>

	<?php if($count>1): ?>
			<ul class="carousel-navigation">
				<li><a class="carousel-prev" href="#product_carousal_<?php echo absint($ecommerce_star_slider_id); ?>" data-slide="prev"></a></li>
				<li><a class="carousel-next" href="#product_carousal_<?php echo absint($ecommerce_star_slider_id); ?>" data-slide="next"></a></li>
			</ul>
	<?php endif; ?> 

 
  </div>
  
 </div>
</div>
</section>

<?php
}


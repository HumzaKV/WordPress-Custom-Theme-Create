<?php
if (!class_exists('WooCommerce')) { return; }

class retail_shop_product_category_widget extends WC_Widget {

		function __construct() {
		
				$this->widget_cssclass    = 'woocommerce product_category_widget';
				$this->widget_description = __( 'Display product categories as colums.', 'retail-shop' );
				$this->widget_id          = 'retail_shop_product_category_widget';
				$this->widget_name        = __( 'Theme: Product Categories[Shortcode]', 'retail-shop' );
		
				parent::__construct();
				
		}

		// Creating widget front-end
		public function widget($args, $instance) {
		
						
				$max_items = (!empty($instance['max_items'])) ? absint($instance['max_items']) : 12;
				$category = (!empty($instance['category'])) ? strip_tags($instance['category']) : '';
				$colums = (!empty($instance['colums'])) ? absint($instance['colums']) : 4;
				
				echo '[products limit="'.$max_items.'" columns="'.$colums.'" category="'.$category.'"]';

				echo do_shortcode('[products limit="'.$max_items.'" columns="'.$colums.'" category="'.$category.'"]');
							
		}

		public function form($instance) {
				$max_items = (!empty($instance['max_items'])) ? absint($instance['max_items']) : 12;
				$category = (!empty($instance['category'])) ? strip_tags($instance['category']) : '';
				$colums = (!empty($instance['colums'])) ? absint($instance['colums']) : 4;


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
				if ("" == $category) {
						$category_list = $category_list . '<option value="" Selected=selected>' . __('Any', 'retail-shop') . '</option>';
				}
				else {
						$category_list = $category_list . '<option value="">' . __('Any', 'retail-shop') . '</option>';
				}
				foreach ($categories as $cat) {
						$selected = '';
						if (($cat->slug) == $category) {
								$selected = 'selected=selected';
						}
						$category_list = $category_list . '<option value="' . esc_attr($cat->slug) . '" ' . $selected . ' >' . esc_html($cat->name) . '</option>';
				}
				?>
				
				<p>
				<label for="<?php echo esc_attr($this->get_field_id('category')); ?>"><?php esc_html_e('Select Product Category:', 'retail-shop'); ?></label> 
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id('category')); ?>" name="<?php echo esc_attr($this->get_field_name('category')); ?>" type="text">
				<?php echo ($category_list); ?>
				</select>
				</p>
				
				<p>
				<label for="<?php echo esc_attr($this->get_field_id('colums')); ?>"><?php esc_html_e('Colums:', 'retail-shop'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('max_items')); ?>" name="<?php echo esc_attr($this->get_field_name('colums')); ?>" type="number" value="<?php echo absint($colums); ?>" />
				</p>							
											
				<p>
				<label for="<?php echo $this->get_field_id('max_items'); ?>"><?php _e('Max Items to show:', 'retail-shop'); ?></label> 
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('max_items')); ?>" name="<?php echo esc_attr($this->get_field_name('max_items')); ?>" type="number" value="<?php echo absint($max_items); ?>" />
				</p>
		
		<?php
						 
		}

		public function update($new_instance, $old_instance) {
				$instance = array();
				$instance['max_items'] = (!empty($new_instance['max_items'])) ? absint($new_instance['max_items']) : '';
				$instance['category'] = (!empty($new_instance['category'])) ? strip_tags($new_instance['category']) : '';
				$instance['colums'] = (!empty($new_instance['colums'])) ? absint($new_instance['colums']) : '';
				return $instance; 
		}
}


function retail_shop_product_category_widget() {
		register_widget('retail_shop_product_category_widget');
}
add_action('widgets_init', 'retail_shop_product_category_widget');
<?php 
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

function book_init() {
	// set up product labels
	$labels = array(
		'name' => 'Books',
		'singular_name' => 'Book',
		'add_new' => 'Add New Book',
		'add_new_item' => 'Add New Book',
		'edit_item' => 'Edit Book',
		'new_item' => 'New Book',
		'all_items' => 'All Book',
		'view_item' => 'View Book',
		'search_items' => 'Search Book',
		'not_found' =>  'No Book Found',
		'not_found_in_trash' => 'No Book found in Trash', 
		'parent_item_colon' => '',
		'menu_name' => 'Book',
	);

	// register post type
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'books'),
		'query_var' => true,
		'menu_icon' => 'dashicons-book-alt',
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'trackbacks',
			'custom-fields',
			'comments',
			'revisions',
			'thumbnail',
			'author',
			'page-attributes'
		)
	);
	register_post_type( 'book', $args );

	// register taxonomy
	register_taxonomy('book_category', 'book', array('hierarchical' => true, 'label' => 'category', 'query_var' => true, 'rewrite' => array( 'slug' => 'book-category' )));
}
add_action( 'init', 'book_init' );


//slider test

add_action( 'init', 'button_init' );

function button_init() {
	// set up product labels
	$labels = array(
		'name' => 'Button',
		'singular_name' => 'Button',
		'add_new' => 'Add New Button',
		'add_new_item' => 'Add New Button',
		'edit_item' => 'Edit Button',
		'new_item' => 'New Button',
		'all_items' => 'All Button',
		'view_item' => 'View Button',
		'search_items' => 'Search Button',
		'not_found' =>  'No Button Found',
		'not_found_in_trash' => 'No Button found in Trash', 
		'parent_item_colon' => '',
		'menu_name' => 'Button',
	);

	// register post type
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'button'),
		'query_var' => true,
		'menu_icon' => 'dashicons-button',
		'supports' => array(
			'title',
		)
	);
	register_post_type( 'button', $args );

	// register taxonomy
	register_taxonomy('button_category', 'button',);
}

/*slider test*/

//create shortcode
function button_shortcode($atts, $content) {
	extract(shortcode_atts( array(
		'id'  => 204,
		'href'  => 'javascript:',
		'class' => 'demo-form',
		'rel'   => 'noopener',
		'text'  => 'Contact Us',
	), $atts )
);

	if( $id < '1' ) {
		return;
	}

	$button_href = get_field('href', $id);
	$button_class = get_field('class', $id);
	$button_rel = get_field('rel', $id);
	$button_text = get_field('button_text', $id);
	if( empty($button_text) ) {
		$button_text = $text;
	}
	if( empty($button_href) ) {
		$button_href = $href;
	}
	if( empty($button_class) ) {
		$button_class = $class;
	}
	if( empty($button_rel) ) {
		$button_rel = $rel;
	}

	ob_start();
	?>
	<a href="<?php echo $href ?>" class="<?php echo $class ?>" rel="<?php echo $rel ?>"><?php echo $button_text; ?></a>
	<?php
	return ob_get_clean();
	update_field('short_code', $shortc);
}
add_shortcode( 'gen_button', 'button_shortcode' );

	//create short code


// add short code to the field
// save_post_$post_type
add_action( 'save_post_button', 'create_shortcode', 20,3 );

function create_shortcode( $post_id, $post, $update ) 
{
	$shortc = '[gen_button id="'.$post_id.'" href="#" class="submit" rel="submit"]';
	update_field('short_code', $shortc , $post_id);
}

		 function order_wwo_com_columns ( $columns ) {
		unset($columns['sku']);
		unset($columns['stock']);
		unset($columns['date']);
	 // return array_merge ( $columns, array ( 
	 //   'tags' => __ ('Tags'),
	 //   'date' => __ ( 'Date' ),
	 //   'title'   => __ ( 'Title' ),
	 // ) 
// );

 }

add_filter ( 'manage_product_posts_columns', 'order_wwo_com_columns' );

// sorting woo commerce columns
// add_filter('manage_product_columns', 'column_order');
// function column_order($columns) {
// unset($columns['Date']);
// $columns['mail'] = 'Mail';
// $columns['date'] = 'Date';

// return $columns;
// }

// sorting woo commerce columns

// add content in admin coulmn shortcode

add_action( 'manage_button_posts_custom_column' , 'shortcode_button_column', 10, 2);
function shortcode_button_column( $column, $post_id ) {
	// shortcode column
	if ( 'shortcode' === $column ) {
		echo get_field('short_code', $post_id);
	}
	else{
		echo '<script>alert("field not found.");</script>';
	}
}

add_filter( 'manage_edit-button_sortable_columns', 'button_sortable_columns');
function button_sortable_columns( $columns ) {
	$columns['Date'] = 'Date';
	return $columns;
}

// order columns of post type;
// post_type = product;

// add_filter('manage_product_columns', 'column_order');
function column_order($columns) {
	$n_columns = array();
	$move = 'author'; // what to move
	$before = 'title'; // move before this
	foreach($columns as $key => $value) {
		if ($key==$before){
			$n_columns[$move] = $move;
		}
			$n_columns[$key] = $value;
	}
	return $n_columns;
}
//woo commerce\

add_filter( 'woocommerce_product_tabs', 'woo_reorder_tabs', 98 );
function woo_reorder_tabs( $tabs ) {

	$tabs['reviews']['priority'] = 5;     // Reviews first
	$tabs['description']['priority'] = 10;      // Description second
	$tabs['additional_information']['priority'] = 15; // Additional information third

	return $tabs;
}

 //* Remove product data tabs
 
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

		unset( $tabs['sku'] );        // Remove the description tab
		unset( $tabs['reviews'] );      // Remove the reviews tab
		unset( $tabs['additional_information'] );   // Remove the additional information tab

		return $tabs;
}



// Make Product "Featured" column sortable on Admin products list
add_filter( 'manage_edit-product_sortable_columns', 'products_featured_sortable_column' );
function products_featured_sortable_column( $columns ) {
		 $columns['featured'] = 'featured';

		 return $columns;
}

add_filter('posts_clauses', 'orderby_product_visibility', 10, 2 );
function orderby_product_visibility( $clauses, $wp_query ) {
		global $wpdb;

		$taxonomy  = 'product_visibility';
		$term      = 'featured';

		if ( isset( $wp_query->query['orderby'] ) && $term == $wp_query->query['orderby'] ) {
				$clauses['join'] .=<<<SQL
LEFT OUTER JOIN {$wpdb->term_relationships} ON {$wpdb->posts}.ID={$wpdb->term_relationships}.object_id
LEFT OUTER JOIN {$wpdb->term_taxonomy} USING (term_taxonomy_id)
LEFT OUTER JOIN {$wpdb->terms} USING (term_id)
SQL;
				$clauses['where']   .= " AND (taxonomy = '{$taxonomy}' OR taxonomy IS NULL)";
				$clauses['groupby']  = "object_id";
				$clauses['orderby']  = "GROUP_CONCAT({$wpdb->terms}.name ORDER BY name ASC) ";
				$clauses['orderby'] .= ( 'ASC' == strtoupper( $wp_query->get('order') ) ) ? 'ASC' : 'DESC';
		}
		return $clauses;
}
// remove_action('woocommerce_before_single_product','woocommerce_show_product_sale_flash', 10);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 30 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 20);
// add_action('woocommerce_before_single_product','woocommerce_show_product_sale_flash', 10);

// Hook in
add_filter( 'woocommerce_checkout_fields' , 'edit_checkout' );

// Our edit_checkout in function - $fields is passed via the filter!
function edit_checkout( $fields ) {
	// remove company name from billing form
		 unset($fields['billing']['billing_company']);
		 unset($fields['shipping']['shipping_company']);
		 // remove validation from billing last name
		 $fields['billing']['billing_last_name']['required'] = 0;
		 $fields['shipping']['shipping_last_name']['required'] = 0;
		 return $fields;
}

// add additional fee in woocommerce
add_action('woocommerce_cart_calculate_fees', function() {
if (is_admin() && !defined('DOING_AJAX')) {
return;
}
	$outcum = get_option('woocommerce_store_fees');
WC()->cart->add_fee('Additional Fee', $outcum);
});
// add additional fee in woocommerce

// add custom field in woo commerce admin 

add_filter('woocommerce_general_settings', 'general_settings_shop_fees');
function general_settings_shop_fees($settings) {
		$key = 0;

		foreach( $settings as $values ){
				$new_settings[$key] = $values;
				$key++;

				// Inserting array just after the post code in "Store Address" section
				if($values['id'] == 'woocommerce_store_postcode'){
						$new_settings[$key] = array(
								'title'    => 'Fees',
								'desc'     => 'additional charges for the delivery',
								'id'       => 'woocommerce_store_fees', // <= The field ID (important)
								'default'  => '',
								'type'     => 'number',
								'desc_tip' => true, // or false
						);
						$key++;
				}
		}
		return $new_settings;
}
// add custom field in woo commerce admin 

// Save custom checkout field value as custom order meta data and user meta data too
add_action( 'woocommerce_checkout_create_order', 'custom_checkout_field_update_order_meta', 20, 2 );
function custom_checkout_field_update_order_meta( $order, $data ) {
		if ( isset( $_POST['woocommerce_store_fees'] ) ) {
				// Save custom checkout field value
				$order->update_meta_data( '_woocommerce_store_fees', esc_attr( $_POST['woocommerce_store_fees'] ) );

				// Save the custom checkout field value as user meta data
				if( $order->get_customer_id() ){
						update_user_meta( $order->get_customer_id(), 'woocommerce_store_fees', esc_attr( $_POST['woocommerce_store_fees'] ) );
}
		}
}

// restrict payment gateway according to country

add_filter( 'woocommerce_available_payment_gateways', 'bbloomer_payment_gateway_disable_country' );
  
function bbloomer_payment_gateway_disable_country( $available_gateways ) {
    if ( is_admin() ) return $available_gateways;
    if ( isset( $available_gateways['cod'] ) && WC()->customer->get_billing_country() == 'US' ) {
        unset( $available_gateways['cod'] );
    } else {
        if ( isset( $available_gateways['bacs'] ) && WC()->customer->get_billing_country() == 'PK' ) {
            unset( $available_gateways['bacs'] );
        }
    }
    return $available_gateways ;
}
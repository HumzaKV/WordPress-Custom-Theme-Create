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


//button test

add_action( 'init', 'slider_init' );

function slider_init() {
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
add_action( 'init', 'slider_init' );

/*button test*/


function button_shortcode($atts) {

	extract(shortcode_atts( array(
			'id' 	=> 0,
			'class' => 'demo-form',
			'href' 	=> 'javascript:;',
			'rel' 	=> 'noopener',
			'text' 	=> 'Contact Us',
		), $atts )
	);

	if( $id < '1' ) {
		return;
	}

	$href = get_field('href', $id);
	$class = get_field('class', $id);
	$rel = get_field('rel', $id);
	$button_text = get_field('button_text', $id);
	if( empty($button_text) ) {
		$button_text = $text;
	}

	ob_start();
?>
	<a href="<?php echo $href ?>" class="<?php echo $class ?>" rel="<?php echo $rel ?>"><?php echo $button_text; ?></a>
<?php
	return ob_get_clean();
}
add_shortcode( 'gen_button', 'button_shortcode' );


?>


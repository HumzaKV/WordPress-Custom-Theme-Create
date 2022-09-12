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
add_action( 'init', 'button_init' );

/*slider test*/

//[shortcode]
//[foobar]
// [bartag foo="foo-value"]
// function butt_func( $atts ) {
// 	$a = shortcode_atts( array(
// 		'class' => 'someclass',
// 		'href' => 'somewhere',
// 		'rel' => 'something',
// 	), $atts );

// 	return "foo = {$a['foo']}";
// }
// add_shortcode( 'add_btn', 'butt_func' );

// function my_shortcode_handler( $atts, $content = null ) {
// 	$a = shortcode_atts( array(
// 		'class' => 'attribute 1 default',
// 		'href' => 'attribute 2 default',
// 		'rel' => 'attribute 2 default',
// 		// ...etc
// 	), $atts );
// }


// function button_shortcode( $atts, $content = null ) {

// 	$value = get_field( "abc" );
// 	echo $value;
// 	// die;
// 	// return '<p style="text-align: center;"><a href="'.get_field('link_hr').'" class="bg-mark" rel="style"> link </a></p>';
// // echo 'href: '.the_field('rel');
// }
// add_shortcode( 'greeting', 'button_shortcode' );

// function button_shortcode() {

	// var_dump(get_field('abc'));
		// $value = get_field('abc');
		// echo $value;
	// die;
	// return '<p style="text-align: center;"><a href="'.$value.'" class="bg-mark" rel="style"> link </a></p>';
// echo 'href: '.the_field('rel');
// }

//get post-id by title
$mypost = get_page_by_title( 'submit', '', 'button' );
$id = $mypost->ID;
// get post-id by title

function button_shortcode($atts, $content) {
	extract(shortcode_atts( array(
		'id' 	=> $id,
		'href' 	=> 'javascript:',
		'class' => 'demo-form',
		'rel' 	=> 'noopener',
		'text' 	=> 'Contact Us',
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
}
add_shortcode( 'gen_button', 'button_shortcode' );

function my_acf_save_post( $id ) {
    
    // get new value
    $value = get_field('short_code');

    $button_href = get_field('href', $id);
	$button_class = get_field('class', $id);
	$button_rel = get_field('rel', $id);
	$button_text = get_field('button_text', $id);
    // do something
    update_field('<a href="$href" class="$class" rel="$rel">$button_text;</a>', $value);
}

add_action('acf/save_post/post_type=button', 'my_acf_save_post', 20);
?>


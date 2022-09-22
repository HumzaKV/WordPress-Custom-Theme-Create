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
		'id' 	=> 204,
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
	update_field('short_code', $shortc);
}
add_shortcode( 'gen_button', 'button_shortcode' );

	//create short code


// add short code to the field

add_action( 'save_post_button', 'create_shortcode', 20,3 );

function create_shortcode( $post_id, $post, $update ) 
{
	$shortc = '[gen_button id="'.$post_id.'" href="#" class="submit" rel="submit"]';
	update_field('short_code', $shortc , $post_id);
}

function add_button_columns($columns) {
	$columns = array(
		'cb' => $columns['cb'],
		'title' => __( 'Title' ),
		'shortcode' => __( 'Short Code'),      
		'Date' => __( 'Date'),
	);
	return $columns;
}
add_filter('manage_button_posts_columns' , 'add_button_columns');

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

function load_more() {

	$ajaxposts = new WP_Query([
       'posts_per_page'         => 3,
       'post_type'              => 'book',
       'orderby'                => 'date',
       'order'                  => 'ASC',
       'update_post_meta_cache' => false,
       'update_post_term_cache' => false,
	   'paged' 				 => $_POST['paged'],
	]);

	$response = '';

	if($ajaxposts->have_posts()	) {
		?><div class="row row-cols-1 row-cols-md-3 g-4"><?php
		while($ajaxposts->have_posts()) : $ajaxposts->the_post();
			      ?>
<div class="col">
    <div class="card">
      <img src="<?php the_post_thumbnail_url( 'single-post-thumbnail' ); ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php the_title(); ?></h5>
        <p class="card-text"><?php the_content(); ?></p>
      </div>
    </div>
  </div>
      <?php
		endwhile; 
		?> </div> <?php
	} else {
		$response = '';
	}
	echo $response;
	exit;
}
add_action('wp_ajax_load_more', 'load_more');
add_action('wp_ajax_nopriv_load_more', 'load_more');

?>


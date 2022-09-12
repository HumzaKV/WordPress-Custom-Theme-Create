<?php 
// Product Custom Post Type
add_action( 'init', 'book_init' );

function book_init() {
    // set up product labels
    $labels = array(
        'name' => 'Books',
        'singular_name' => 'Book',
        // 'add_new' => 'Add New Book',
        // 'add_new_item' => 'Add New Book',
        // 'edit_item' => 'Edit Book',
        // 'new_item' => 'New Book',
        // 'all_items' => 'All Book',
        // 'view_item' => 'View Book',
        // 'search_items' => 'Search Book',
        // 'not_found' =>  'No Book Found',
        // 'not_found_in_trash' => 'No Book found in Trash', 
        // 'parent_item_colon' => '',
        // 'menu_name' => 'Book',
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
        'menu_icon' => 'dashicons-randomize',
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
    register_taxonomy('book_category', 'book', array('hierarchical' => true, 'label' => 'Category', 'query_var' => true, 'rewrite' => array( 'slug' => 'book-category' )));
}


 ?>
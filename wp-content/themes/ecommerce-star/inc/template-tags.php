<?php
/**
 * Custom template tags for this theme
 * @package ecommerce-star
 * @since 1.0
 */
 
$ecommerce_star_uniqueue_id = 99;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
 
if ( ! function_exists( 'ecommerce_star_color_codes' ) ) : 
/**
 * ecommerce-star color codes
 */
 
function ecommerce_star_color_codes(){
	return array('#000000','#ffffff','#dd3333','#e7ad24','#FFD700','#81d742','#0053f9','#8224e3');
}

endif;

if ( ! function_exists( 'ecommerce_star_background_style' ) ) : 
/**
 * ecommerce-star color codes
 */
 
function ecommerce_star_background_style(){
	return array(
					'no-repeat'  => __('No Repeat','ecommerce-star'),
					'repeat'     => __('Tile','ecommerce-star'),
					'repeat-x'   => __('Tile Horizontally','ecommerce-star'),
					'repeat-y'   => __('Tile Vertically','ecommerce-star'),
				);
}

endif;


if ( ! function_exists( 'ecommerce_star_get_index_page_id' ) ) :

	/**
	 * Get front index page ID.
	 * @param string $type Type.
	 * @return int Corresponding Page ID.
	 */
	function ecommerce_star_get_index_page_id( $type = 'front' ) {

		$page = '';

		switch ( $type ) {
			case 'front':
				$page = get_option( 'page_on_front' );
				break;

			case 'blog':
				$page = get_option( 'page_for_posts' );
				break;

			default:
				break;
		}
		$page = absint( $page );
		return $page;

	}
endif;

if ( ! function_exists( 'ecommerce_star_customize_page_title' ) ) :

	/**
	 * Add title in Custom Header.
	 * @since 1.0	 *
	 * @param string $title Title.
	 * @return string Modified title.
	 */
	function ecommerce_star_customize_page_title( $title = '' ) {

		if ( is_home() && ( $blog_page_id = ecommerce_star_get_index_page_id( 'blog' ) ) > 0 ) {
			$title = get_the_title( $blog_page_id );
		}
		elseif ( is_singular() ) {
			$title = get_the_title();
		}
		elseif ( is_archive() ) {
			$title = strip_tags( get_the_archive_title() );
		}
		elseif ( is_search() ) {
			/* translators: %s: search query input */
			$title = sprintf( __( 'Search Results for: %s', 'ecommerce-star' ),  get_search_query() );
		}
		elseif ( is_404() ) {
			$title = __( '404!', 'ecommerce-star' );
		}
		return $title;
	}
endif;



if ( ! function_exists( 'ecommerce_star_custom_fonts_css' ) ) :
/**
 * ecommerce-star google font css
 */
function ecommerce_star_custom_fonts_css() {

    global $ecommerce_star_option;	
	if ( class_exists( 'WP_Customize_Control' ) ) {
	   $ecommerce_star_option = wp_parse_args(  get_option( 'ecommerce_star_option', array() ) , ecommerce_star_settings());  
	}
	
    $css ='
	
	h1 ,
	h2 ,
	h3 ,
	h4 ,
	h5 ,
	h6 , 
	.entry-title , 
	.page-title , 
	.entry-meta ,
	.callout-title , 
	.entry-meta a {
		font-family:'.$ecommerce_star_option['header_fontfamily'].',sans serif;
	}
	
	html {
		font-family:'.$ecommerce_star_option['body_fontfamily'].',sans serif;
	}
	
	.main-navigation {
		font-family:'.$ecommerce_star_option['header_fontfamily'].',sans serif;
	}
	
	.site-title a, .testimonial-title {
		font-family:'.$ecommerce_star_option['header_fontfamily'].',sans serif;
	}
	
	#main_Carousel .slider-title {
		font-family:'.$ecommerce_star_option['header_fontfamily'].',sans serif;
	}

	';

	return $css;
}

endif;

if ( ! function_exists( 'ecommerce_star_posted_on' ) ) : 
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function ecommerce_star_posted_on() {

		$byline = sprintf(
			// Get the author name; wrap it in a link.
			esc_html_x( 'By %s', 'post author', 'ecommerce-star' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);	

		// Finally, let's write all of this to the page.
		echo '<span class="posted-on">' . ecommerce_star_time_link() . '</span><span class="byline"> ' . $byline . '</span>';
	}
endif;


if ( ! function_exists( 'ecommerce_star_time_link' ) ) :
	/**
	 * Gets a nicely formatted string for the published date.
	 */
	function ecommerce_star_time_link() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			get_the_date( DATE_W3C ),
			get_the_date(),
			get_the_modified_date( DATE_W3C ),
			get_the_modified_date()
		);
		
		$args = array( 'time'=> array('class'=> array(),'datetime'=>array()));

		// Wrap the time string in a link, and preface it with 'Posted on'.
		return sprintf(
			/* translators: %s: post date */
			__( '<span class="screen-reader-text">%1$s</span> %2$s', 'ecommerce-star' ),
			esc_html__('Posted on', 'ecommerce-star'),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . wp_kses($time_string, $args) . '</a>'
		);
	}
endif;


if ( ! function_exists( 'ecommerce_star_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function ecommerce_star_entry_footer() {

		/* translators: used between list items, there is a space after the comma */
		$separate_meta = __( ', ', 'ecommerce-star' );

		// Get Categories for posts.
		$categories_list = get_the_category_list( $separate_meta );

		// Get Tags for posts.
		$tags_list = get_the_tag_list( '', $separate_meta );

		// We don't want to output .entry-footer if it will be empty, so make sure its not.
		if ( ( ( ecommerce_star_categorized_blog() && $categories_list ) || $tags_list ) || get_edit_post_link() ) {

			echo '<footer class="entry-footer">';

			if ( 'post' === get_post_type() ) {
				if ( ( $categories_list && ecommerce_star_categorized_blog() ) || $tags_list ) {
					echo '<span class="cat-tags-links">';

						// Make sure there's more than one category before displaying.
					if ( $categories_list && ecommerce_star_categorized_blog() ) {
						echo '<span class="cat-links">' . ecommerce_star_get_font( array( 'icon' => 'folder-open' ) ) . '<span class="screen-reader-text">' . esc_html__( 'Categories', 'ecommerce-star' ) . '</span>' . $categories_list . '</span>';
					}

					if ( $tags_list && ! is_wp_error( $tags_list ) ) {
						echo '<span class="tags-links">' . ecommerce_star_get_font( array( 'icon' => 'hashtag' ) ) . '<span class="screen-reader-text">' . esc_html__( 'Tags', 'ecommerce-star' ) . '</span>' . $tags_list . '</span>';
					}

					echo '</span>';
				}
			}

			ecommerce_star_edit_link();

			echo '</footer> <!-- .entry-footer -->';
		}
	}
endif;


if ( ! function_exists( 'ecommerce_star_edit_link' ) ) :
	/**
	 * Returns an accessibility-friendly link to edit a post or page.
	 * Helpful when/if the single-page
	 * layout with multiple posts/pages shown gets confusing.
	 */
	function ecommerce_star_edit_link() {
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'ecommerce-star' ),
				esc_html(get_the_title())
			),
			' <span class="edit-link">',
			'</span>'
		);
	}
endif;


/**
* Change View cart text
*/
function ecommerce_star_view_cart_strings( $translated_text, $text, $domain ) {
switch ( $translated_text ) {
	case 'View cart' :
	$translated_text = __( 'View', 'ecommerce-star' );
	break;
}
	return $translated_text;
}
add_filter( 'gettext', 'ecommerce_star_view_cart_strings', 20, 3 );


/**
 * Woocommerce Custom add to wishlist button
 *
 */
if ( ! function_exists( 'ecommerce_star_wishlist' ) ) {
	function ecommerce_star_wishlist() {
	if(!class_exists( 'WooCommerce' )){return;}
		global $product;
		if( function_exists( 'YITH_WCWL' ) ){
			$wishlist_url = add_query_arg( 'add_to_wishlist', $product->get_id() );
			?>
			<a href="<?php echo esc_url($wishlist_url); ?>" class="product_add_to_wishlist" title="<?php esc_attr_e('Add to Wishlist','ecommerce-star')?>"><?php esc_html_e('Add to Wishlist','ecommerce-star'); ?></a>
			<?php
		}
	}
}
/**
 * Woocommerce Custom add to cart button
 *
 */
if ( ! function_exists( 'ecommerce_star_add_to_cart' ) ) {
	function ecommerce_star_add_to_cart( $id = '' ) {
		
		if(!class_exists( 'WooCommerce' )){return;}
		global $product;
		
		if( $id ) {
			$product = wc_get_product( $id );
		}		

		if ( function_exists( 'method_exists' ) && method_exists( $product, 'get_type' ) ) {
			$prod_type = $product->get_type();
		} else {
			$prod_type = $product->product_type;
		}

		if ( function_exists( 'method_exists' ) && method_exists( $product, 'get_stock_status' ) ) {
			$prod_in_stock = $product->get_stock_status();
		} else {
			$prod_in_stock = $product->is_in_stock();
		}

		if ( $product ) {
			$args = array();
			$defaults = array(
				'quantity' => 1,
				'class'    => implode(
					' ', array_filter(
						array('button',
							'product_type_' . $prod_type,
							$product->is_purchasable() && $prod_in_stock ? 'add_to_cart_button' : '',
							$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',)
					)
				),
			);

			$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );
			if(locate_template('woocommerce/add-to-cart.php')){
				wc_get_template( 'woocommerce/add-to-cart.php', $args );
			}
		}
	}
}


/**
 * Add Cart icon and count to header if WC is active
 */
function ecommerce_star_wc_cart_count() {
 
    if (!class_exists('WooCommerce')) return;
	global $woocommerce; 
	?>
    <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('Cart View', 'ecommerce-star'); ?>">
	<span class="cart-contents-count fa fa-shopping-cart"><span><?php echo absint($woocommerce->cart->cart_contents_count); ?></span></span>
	<span class="cart-contents-price"><?php echo wp_kses_post($woocommerce->cart->get_cart_total()); ?></span>
    </a> 
    <?php

 
}
add_action( 'woocommerce_cart_top', 'ecommerce_star_wc_cart_count' );

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function ecommerce_star_add_to_cart_fragment( $fragments ) {

	if(!class_exists('woocommerce')) return; 
	global $woocommerce;
	ob_start();
	?>
    <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('Cart View', 'ecommerce-star'); ?>">
    <span class="cart-contents-count fa fa-shopping-cart"><span><?php echo absint($woocommerce->cart->cart_contents_count); ?></span></span>
	<span class="cart-contents-price"><?php echo wp_kses_post($woocommerce->cart->get_cart_total()); ?></span>
    </a> 
    <?php
	$cart_fragments['a.cart-contents'] = ob_get_clean();
	return $cart_fragments;
	
}
add_filter( 'woocommerce_add_to_cart_fragments', 'ecommerce_star_add_to_cart_fragment' );

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function ecommerce_star_wishlist_count( ) {
	if(!function_exists('YITH_WCWL')){
		return;
	}
?>
	<a class="wishlist-contents"  href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>" title="<?php esc_attr_e( 'View your whishlist', 'ecommerce-star' ); ?>">
	<i class="fa fa-heart-o"></i>&nbsp;</span></a>
	<?php
}


/* 
 * Product search function 
 */
function ecommerce_star_product_search(){

global $ecommerce_star_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $ecommerce_star_option = wp_parse_args(  get_option( 'ecommerce_star_option', array() ) , ecommerce_star_settings());  
}

?>

<div id="search-category">
<form class="search-box" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">

	<div class="search-cat" >
		<select class="category-items" name="product_cat" >
			<option value="0"><?php esc_html_e('All Categories', 'ecommerce-star'); ?></option>
			<?php
			$args = array(
				 'taxonomy'     => 'product_cat',
				 'orderby'      => 'date',
				 'order'      => 'ASC',
				 'show_count'   => 1,
				 'pad_counts'   => 0,
				 'hierarchical' => 1,
				 'title_li'     => '',
				 'hide_empty'   => 1,
			);
			$all_categories = get_categories( $args );
			foreach ($all_categories as $cat) {
				echo '<option value="'.esc_attr($cat->slug).'">'.esc_html($cat->name).'</option>';
			}
			?>
		</select>
	</div>

  <label class="screen-reader-text" for="woocommerce-product-search-field"><?php esc_html_e('Search for','ecommerce-star'); ?></label>
  <input type="search" name="s" id="text-search" value="" placeholder="<?php esc_attr_e('Search here...','ecommerce-star'); ?>">
  <button id="btn-search-category" type="submit"><span class="fa icon fa-search"></span></button>
  <input type="hidden" name="post_type" value="product">
</form>
</div>

<?php
} /* end search form */





/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function ecommerce_star_categorized_blog() {
	$category_count = get_transient( 'ecommerce_star_categories' );

	if ( false === $category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories(
			array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			)
		);

		// Count the number of categories that are attached to the posts.
		$category_count = count( $categories );

		set_transient( 'ecommerce_star_categories', $category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $category_count > 1;
}


/**
 * Flush out the transients used in ecommerce_star_categorized_blog.
 */
function ecommerce_star_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	delete_transient( 'ecommerce_star_categories' );
}
add_action( 'edit_category', 'ecommerce_star_category_transient_flusher' );
add_action( 'save_post', 'ecommerce_star_category_transient_flusher' );



 /**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since ecommerce-star 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function ecommerce_star_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ecommerce-star' ), esc_html(get_the_title( get_the_ID() )) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'ecommerce_star_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since ecommerce-star 1.0
 */
function ecommerce_star_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'ecommerce_star_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function ecommerce_star_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo( 'pingback_url' )) );
	}
}
add_action( 'wp_head', 'ecommerce_star_pingback_header' );


/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since ecommerce-star 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function ecommerce_star_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
	global $ecommerce_star_option;
		if ( ! ( is_page() && 1 != $ecommerce_star_option['layout_section_post_one_column'] ) && 767 <= $width ) {
			$sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'ecommerce_star_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since ecommerce-star 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function ecommerce_star_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'ecommerce_star_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since ecommerce-star 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function ecommerce_star_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'ecommerce_star_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Return rgb value of a $hex - hexadecimal color value with given $a - alpha value
 * Ex:- ecommerce_star_rgba('#11ffee',15) // return rgba(17,255,238,15)
**/
 
function ecommerce_star_rgba($hex,$a){
 
	$r = hexdec(substr($hex,1,2));
	$g = hexdec(substr($hex,3,2));
	$b = hexdec(substr($hex,5,2));
	$result = 'rgba('.$r.','.$g.','.$b.','.$a.')';
	
	return $result;
}


/* sanotize option group */
function ecommerce_star_sanitize_header_options($input){
	$choices = array("box_shadow", "border", "transparent", "woocommerce", "none");	
	
	return ( in_array( $input, $choices ) ? $input : 'box_shadow' );
}


/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since ecommerce-star 1.0
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function ecommerce_star_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'ecommerce_star_widget_tag_cloud_args' );


/*
 * WooCommerce Header
 */
function ecommerce_star_woocommerce_header(){
	global $ecommerce_star_option;
?>
 
 		<!--  menu, search -->
		<div class="vertical-center">
	
		<!-- .start of site-branding -->
		<div class="col-md-4 col-sm-4 col-xs-12 site-branding" >
		  <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
		  <?php the_custom_logo(); ?>
		  <?php endif; ?>
		  <div class="site-branding-text" style=" <?php if(!$ecommerce_star_option['header_show_title_tag']) echo 'display:none'; ?>" >
			<?php if ( is_front_page() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" >
			  <?php bloginfo( 'name' ); ?>
			  </a></h1>
			<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" >
			  <?php bloginfo( 'name' ); ?>
			  </a></p>
			<?php endif; ?>
			<?php $description = get_bloginfo( 'description', 'display' ); if ( $description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo esc_html($description); ?></p>
			<?php endif; ?>
		  </div>
		</div>
		<!-- .end of site-branding -->
	
	
		<div class="col-md-5 col-lg-5 col-sm-5 col-xs-12" >
				<?php ecommerce_star_product_search(); ?>
		</div>
		
		<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">
			<div id="cart-wishlist-container">
				<table class="cart-wishlist-table">
				<tr>
				<td>
				  <?php if(class_exists('YITH_WCWL')): ?>
				  <div id="wishlist-top" class="wishlist-top">
					<div class="wishlist-container">
					  <?php ecommerce_star_wishlist_count(); ?>
					</div>
				  </div>
				  <?php endif; ?>
				</td>
				<td>
				  <div id="cart-top" class="cart-top">
					<div class="cart-container">
					  <?php do_action( 'woocommerce_cart_top' ); ?>
					</div>
					
					<div id="popup-cart-wrap" class="widget woocommerce widget_shopping_cart "><?php woocommerce_mini_cart(); ?></div>

				  </div>
				</td>
				</tr>
				</table>
			</div>
		</div>
		
	</div><!-- end of  .menu, search -->
<?php 
}
 
/* default header code */
function ecommerce_star_default_header(){
	global $ecommerce_star_option;
 ?>
  
 	<div id="sticky-nav" class="top-menu-layout-2" > <!--start of navigation -->
	  <div class="container"><!--start of container -->
	  <div class="row vertical-center">	 <!--start of row -->
	  
		<!-- .start of site-branding -->
		<div class="<?php echo ($ecommerce_star_option['increase_header_menu_width'])? 'col-md-3 col-sm-3' : 'col-md-4 col-sm-4' ; ?> col-xs-12 site-branding" >
		  <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
		  <?php the_custom_logo(); ?>
		  <?php endif; ?>
		  <div class="site-branding-text" style=" <?php if(!$ecommerce_star_option['header_show_title_tag']) echo 'display:none'; ?>" >
			<?php if ( is_front_page() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" >
			  <?php bloginfo( 'name' ); ?>
			  </a></h1>
			<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" >
			  <?php bloginfo( 'name' ); ?>
			  </a></p>
			<?php endif; ?>
			<?php $description = get_bloginfo( 'description', 'display' ); if ( $description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo esc_html($description); ?></p>
			<?php endif; ?>
		  </div>
		</div>
		<!-- .end of site-branding -->
	  
		<div class="<?php echo ($ecommerce_star_option['increase_header_menu_width'])? 'col-md-9 col-sm-9' : 'col-md-8 col-sm-8' ; ?> col-xs-12 " >
			<!-- start of navigation menu -->
			<div class="navigation-center-align">	
			  <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
			</div>			
		</div>
		
	  </div><!-- .row -->	  
	</div><!-- .container -->
</div><!-- end of navigation menu -->
 
 <?php
 }
 
 
  
/* default header code */
function ecommerce_star_woocommerce_menu(){
	global $ecommerce_star_option;
	if ( has_nav_menu( 'top' ) ) :
?>
<div id="sticky-nav" class="woocommerce-layout" tabindex="0">
<!--start of navigation-->
<div class="container">
  <div class="row vertical-center">
  
	<!-- start of navigation menu -->
	<div class="col-md-12 col-sm-12 col-xs-12 woocommerce-layout" >
	  <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
	</div>		
	<!-- end of navigation menu -->
	
  </div>
</div>
<!-- .container -->	
</div><!--.navigation-->

<?php
	endif;
}


/*
 * Custom control
 */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Ecommerce_Star_Pro_Button' ) ) :
class Ecommerce_Star_Pro_Button extends WP_Customize_Control {

	/**
	* Render the content on the theme customizer page
	*/
	public function render_content() {
		?>
		<label style="overflow: hidden; zoom: 1;">
			
			<div class="col-md-2 col-sm-6" style="text-align:center">					
					<a class="button button-primary button-hero"   href="<?php echo esc_url(ECOMMERCE_STAR_THEME_URI); ?>" target="blank" class="btn pro-btn-success btn"><strong><?php esc_html_e('See Premium Features','ecommerce-star'); ?></strong></a>
			</div>

		</label>
		<?php
	}
}
endif;
<?php
/**
 * ecommerce-star functions and definitions
 * @package ecommerce-star
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define('ECOMMERCE_STAR_THEME_NAME','Ecommerce Star');
define('ECOMMERCE_STAR_THEME_DOC','http://demo.ceylonthemes.com/');
define('ECOMMERCE_STAR_THEME_URI','https://www.ceylonthemes.com/wordpress-ecommerce-theme/');
define('ECOMMERCE_STAR_TEMPLATE_DIR',get_template_directory());
define('ECOMMERCE_STAR_TEMPLATE_DIR_URI',get_template_directory_uri());

/**
* Custom settings for this theme.
*/
require ECOMMERCE_STAR_TEMPLATE_DIR. '/inc/settings.php';

//initialize settings array
$ecommerce_star_option;
$ecommerce_star_option = wp_parse_args(  get_option( 'ecommerce_star_option', array() ) , ecommerce_star_settings());  

/**
 * import widgets
 */
require ECOMMERCE_STAR_TEMPLATE_DIR. '/inc/widgets.php';


/**
 * Sets up theme defaults and registers support for various WordPress features.
**/
function ecommerce_star_setup() {
	/*
	 * Make theme available for translation.
	 */
	
	load_theme_textdomain( 'ecommerce-star');
	
	if ( ! isset( $content_width ) ) $content_width = 1600; 

	/*
	 * Add default posts and comments RSS feed links to head.
	 */
	 
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	 
	add_theme_support( 'post-thumbnails' );
	
	set_post_thumbnail_size( 200, 200 );

	$defaults = array(
		'default-color'          => '#fff',
		'default-image'          => '',
		'default-repeat'         => '',
		'default-position-x'     => '',
		'default-attachment'     => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	
	add_theme_support( 'custom-background', $defaults );

	register_nav_menus(
		array(
			'top'    => __( 'Top Menu', 'ecommerce-star' ),			
		)
	);
	
	register_nav_menus(
		array(
			'footer'    => __( 'Footer Menu', 'ecommerce-star' ),			
		)
	);	
	
				
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	add_theme_support(
		'custom-logo', array(
			'width'      => 200,
			'height'     => 200,
			'flex-width' => true,
			'flex-height' => true,			
		)
	);
	

	$args = array(
		'width'         => 1600,
		'height'         => 300,
		'flex-width'    => true,
		'flex-height'    => true,
		'uploads'         => true,
		'random-default'  => true,	
		'header-text'     => false,
		
	);
	
	add_theme_support( 'custom-header', $args );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets'     => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
			    'search',
				'categories',
				'archives',
			),

			// Add business info widget to the footer 1 area.
			'footer-sidebar-1' => array(
				'text_about',
			),

			// Put widgets in the footer 2 area.
			'footer-sidebar-2' => array(
				'recent-posts',				
			),
			// Putwidgets in the footer 3 area.
			'footer-sidebar-3' => array(
				'categories',				
			),
			// Put widgets in the footer 4 area.
			'footer-sidebar-4' => array(				
				'search',				
			),
											
		),
		
		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'   => array(
			// Assign a menu to the "top" location.
			'top'    => array(
				'name'  => __( 'Top Menu', 'ecommerce-star' ),
				'items' => array(
					'link_home', // "home" page is actually a link in case a static front page is not used.
				),
			),
		),
			// Assign a menu to the "footer" location.
			'footer'    => array(
				'name'  => __( 'Footer Menu', 'ecommerce-star' ),
				'items' => array(
					'link_home', // "home" page is actually a link in case a static front page is not used.
				),
			),		
	);


	/**
	 * Filters ecommerce-star array of starter content.
	 *
	 * @since ecommerce-star 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'ecommerce_star_starter_content', $starter_content );
	 
	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'ecommerce_star_setup' );

/**
 * id for html elements
 */
$ecommerce_star_unique_id = 999;
function ecommerce_star_unique_id() {
	global $ecommerce_star_unique_id;
	return $ecommerce_star_unique_id ++;

}

$ecommerce_star_allowed_html = array(
		'a'          => array(
			'href'  => true,
			'title' => true,
			'class'  => true,			
		),
		'option'          => array(
			'selected'  => true,
			'value' => true,
			'class'  => true,			
		),		
		'p'          => array(
			'class'  => true,
		),		
		'abbr'       => array(
			'title' => true,
		),
		'acronym'    => array(
			'title' => true,
		),
		'b'          => array(),
		'blockquote' => array(
			'cite' => true,
		),
		'cite'       => array(),
		'code'       => array(),
		'del'        => array(
			'datetime' => true,
		),
		'em'         => array(),
		'i'          => array(),
		'q'          => array(
			'cite' => true,
		),
		's'          => array(),
		'strike'     => array(),
		'strong'     => array(),
	);


/**
 * Register custom fonts.
 */
function ecommerce_star_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by "PT Sans", sans-serif;, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$typography = _x( 'on', 'PT Sans font: on or off', 'ecommerce-star' );

	if ( 'off' !== $typography ) {
		$font_families = array();
		
		global $ecommerce_star_option;	
		if ( class_exists( 'WP_Customize_Control' ) ) {
		   $ecommerce_star_option = wp_parse_args(  get_option( 'ecommerce_star_option', array() ) , ecommerce_star_settings());  
		}		
		
		$font_families[] = $ecommerce_star_option['header_fontfamily'].':300,400';
		$font_families[] = $ecommerce_star_option['body_fontfamily'].':300,400';
		
				 
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
        
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		
	}
	   
	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since ecommerce-star 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function ecommerce_star_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'ecommerce-star-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'ecommerce_star_resource_hints', 10, 2 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ecommerce_star_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Blog Sidebar', 'ecommerce-star' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'ecommerce-star' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	
	register_sidebar(
		array(
			'name'          => __( 'Woocommerce Sidebar', 'ecommerce-star' ),
			'id'            => 'sidebar-woocommerce',
			'description'   => __( 'Add widgets here to appear in your woocommerce pages.', 'ecommerce-star' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	

	/* footer sidebar */
	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'ecommerce-star' ),
			'id'            => 'footer-sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'ecommerce-star' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'ecommerce-star' ),
			'id'            => 'footer-sidebar-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'ecommerce-star' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => __( 'Footer 3', 'ecommerce-star' ),
			'id'            => 'footer-sidebar-3',
			'description'   => __( 'Add widgets here to appear in your footer.', 'ecommerce-star' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);	
	
		
}
add_action( 'widgets_init', 'ecommerce_star_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ecommerce_star_scripts() {
	// Add custom fonts, used in the main stylesheet.

	wp_enqueue_style( 'ecommerce-star-fonts', ecommerce_star_fonts_url(), array(), null );

	wp_enqueue_style( 'boostrap-css', get_theme_file_uri( '/css/bootstrap.css' ), array(), '3.3.6' ); 
	
	// Theme stylesheet.
	wp_enqueue_style( 'ecommerce-star-style', get_stylesheet_uri() );	

	//fonsawesome
	wp_enqueue_style( 'fontawesome-css', get_theme_file_uri( '/fonts/font-awesome/css/font-awesome.css' ),array(), '4.7'); 
	
	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'ecommerce-star-skip-link-focus-fix', get_theme_file_uri( '/js/skip-link-focus-fix.js' ), array(), '1.0', true );
	
	wp_enqueue_script( 'boostrap-js', get_theme_file_uri( '/js/bootstrap.js' ), array('jquery'), '3.3.7', true);
	
	wp_enqueue_script( 'ecommerce-star-theme', get_theme_file_uri( '/js/theme.js' ), array('jquery'), true);
			
	$ecommerce_star_l10n = array(
		'quote' => ecommerce_star_get_font( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'ecommerce-star-navigation', get_theme_file_uri( '/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$ecommerce_star_l10n['expand']   = __( 'Expand child menu', 'ecommerce-star' );
		$ecommerce_star_l10n['collapse'] = __( 'Collapse child menu', 'ecommerce-star' );
		$ecommerce_star_l10n['icon']     = ecommerce_star_get_font(
			array(
				'icon'     => 'angle-down',
				'fallback' => true,
			)
		);
	}

	wp_localize_script( 'ecommerce-star-skip-link-focus-fix', 'ecommerce_star_screen_reader_text', $ecommerce_star_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'ecommerce-star-comment-reply' );
	}


}
add_action( 'wp_enqueue_scripts', 'ecommerce_star_scripts' );

//get default setting
function ecommerce_star_get_default_setting ($setting){
	 $ecommerce_star_option = ecommerce_star_settings();
	 return $ecommerce_star_option[$setting];
}

/**
 * Custom template tags for this theme.
*/
require get_parent_theme_file_path( '/inc/template-tags.php' );

/* load default data, default settings are stored in template-tags.php */



/**
* Additional features to allow styling of the templates.
*/
require ECOMMERCE_STAR_TEMPLATE_DIR.'/inc/template-functions.php';

if ( class_exists( 'WP_Customize_Control' ) ) {
	// Inlcude the Alpha Color Picker control file.
	require_once ECOMMERCE_STAR_TEMPLATE_DIR.'/inc/color-picker/alpha-color-picker.php';
}

/**
 * fontawesome icons functions and filters.
 */
require_once ECOMMERCE_STAR_TEMPLATE_DIR.'/inc/icon-functions.php';

/**
 * Customizer additions.
 */
 
require_once ECOMMERCE_STAR_TEMPLATE_DIR.'/inc/customizer.php';

if(!function_exists('ecommerce_star_custom_css')):
	function ecommerce_star_custom_css(){
		require_once ECOMMERCE_STAR_TEMPLATE_DIR.'/inc/color-patterns.php';
	}
endif;

ecommerce_star_custom_css();

/**
 * button CSS.
 */
function ecommerce_star_button_css() {

	global $ecommerce_star_option;
	/* button radius */
	$radius = $ecommerce_star_option['button_radius'];
	$scroll_radius = $ecommerce_star_option['scroll_button_radius'];
	$search_radius = $ecommerce_star_option['search_button_radius'];
	$social_radius = $ecommerce_star_option['social_button_radius'];

?>
	<style type="text/css" id="custom-button-styles" >

		.more-btn, .more-link {
			border-radius:<?php echo absint($radius); ?>px;
			-webkit-border-radius:<?php echo absint($radius); ?>px;				
		}
				
		#callout .start-button {
			border-radius:<?php echo absint($radius); ?>px;
			-webkit-border-radius:<?php echo absint($radius); ?>px;			
		}
		
		button, input[type="button"], input[type="submit"], .contact-list-bottom .fa, .contact-list .fa {
			border-radius:<?php echo absint($radius); ?>px;
			-webkit-border-radius:<?php echo absint($radius); ?>px;			
		}
		input[type="search"], .search-form .search-submit, .search-box, .widget_product_search .search-field, .widget_product_search button {
			border-radius:<?php echo absint($search_radius); ?>px;
			-webkit-border-radius:<?php echo absint($search_radius); ?>px;			
		}
		ul.header-social-icon li a {
			border-radius:<?php echo absint($social_radius); ?>px;
			-webkit-border-radius:<?php echo absint($social_radius); ?>px;		
		}				
		.scroll-top {
			border-radius:<?php echo absint($scroll_radius); ?>px;
			-webkit-border-radius:<?php echo absint($scroll_radius); ?>px;			
		}
		
		.wc-button-container a.add_to_cart_button, 
		.wc-button-container a.add_to_cart_button:focus, 
		.wc-button-container a.product_type_grouped, 
		.wc-button-container a.product_type_external, 
		.wc-button-container a.product_type_simple, 
		.wc-button-container a.product_type_variable {
		
			border-radius:<?php echo absint($radius); ?>px;
			-webkit-border-radius:<?php echo absint($radius); ?>px;	
		
		}		
	
		
	</style>
<?php
}
add_action( 'wp_head', 'ecommerce_star_button_css' ); 




/* add search form to top menu */
add_theme_support( 'html5', array( 'search-form' ) ); 
add_filter('wp_nav_menu_items', 'ecommerce_star_add_search_form_to_menu', 10, 2);
function ecommerce_star_add_search_form_to_menu($items, $args) {
  // If this isn't the main navbar menu, do nothing
  if(  !($args->theme_location == 'top') ) // with Customizr Pro 1.2+ and Cusomizr 3.4+ you can chose to display the saerch box to the secondary menu, just replacing 'main' with 'secondary'
    return $items;
  // On main menu: put styling around search and append it to the menu items
  return $items . '<li style="color:#eee;" class="my-nav-menu-search"><a id="search-button" href="#"><i class="fa fa-search"></i>
  </a></li>';
}



/**
 * TGMA plugin activation code
 */
if( is_admin() ) {
	require_once ECOMMERCE_STAR_TEMPLATE_DIR.'/inc/plugin-activation.php';
}

/**
 * Update wish-list using jquery
 */
function ecommerce_star_update_wishlist_count(){
    if( function_exists( 'YITH_WCWL' ) ){
        wp_send_json( YITH_WCWL()->count_products() );
    }
}
add_action( 'wp_ajax_update_wishlist_count', 'ecommerce_star_update_wishlist_count' );
add_action( 'wp_ajax_nopriv_update_wishlist_count', 'ecommerce_star_update_wishlist_count' );

/**
 * Wishlist enqueue script
 */
function ecommerce_star_enqueue_custom_wishlist_js(){
	wp_enqueue_script( 'ecommerce-star-yith-wcwl-custom-js', get_theme_file_uri('/js/yith-wcwl-custom.js'), array( 'jquery' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'ecommerce_star_enqueue_custom_wishlist_js' );

/**
 * Widget enqueue script
 */
add_action( 'admin_enqueue_scripts', 'ecommerce_star_widgets_backend_enqueue' ); 
function ecommerce_star_widgets_backend_enqueue(){     
    wp_register_script( 'ecommerce-star-custom-widgets', get_template_directory_uri().'/js/widget.js', array( 'jquery' ), true );
    wp_enqueue_media();
    wp_enqueue_script( 'ecommerce-star-custom-widgets' );
}

/**
 * Change the breadcrumb separator
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'ecommerce_star_breadcrumb_delimiter' );
function ecommerce_star_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = ' &raquo; ';
	return $defaults;
}


/**
 * Add woocommerce theme support
 */

add_action( 'after_setup_theme', 'ecommerce_star_woocommerce_support' );
function ecommerce_star_woocommerce_support() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );	
}


function ecommerce_star_header_class(){
		$ecommerce_star_header = get_post_meta( get_the_ID(), 'header_shadow', true);
		if($ecommerce_star_header == "box_shadow"){
			return 'header-box-shadow';
		} else if($ecommerce_star_header == "border"){
			return 'header-border';
		} else if($ecommerce_star_header == "none"){
			return 'header-none';			
		} else {	
				return 'header-box-shadow';
		}
}

/*************************************
 * Add meta box to switch box shadow *
 *************************************/

/* Define the custom box */
add_action( 'add_meta_boxes', 'ecommerce_star_add_custom_box' );

/* Do something with the data entered */
add_action( 'save_post', 'ecommerce_star_save_postdata' );

/* Adds a box to the main column on the Post and Page edit screens */
function ecommerce_star_add_custom_box() {
    add_meta_box( 
        'ecommerce_star_sectionid',
        esc_html__('Page Header Options', 'ecommerce-star'),
        'ecommerce_star_inner_custom_box',
        array('post','page'),
        'side',
        'high'
    );
}

/* Prints the box content */
function ecommerce_star_inner_custom_box($post)
{
    // Use nonce for verification
    wp_nonce_field( 'ecommerce_star_nounce_header_style', 'ecommerce_star_headerstyle' );

    // Get saved value, if none exists, "default" is border
    $saved = get_post_meta( $post->ID, 'header_shadow', true);
    if( !$saved )
		$saved = 'box_shadow';

    $fields = array(
        'box_shadow'       => esc_html__('Set Header Box Shadow', 'ecommerce-star'),
		'border'     => esc_html__('Set Header Border', 'ecommerce-star'),
		'none'     => esc_html__('None', 'ecommerce-star'),
    );
	

    foreach($fields as $key => $label)
    {
        printf(
            '<input type="radio" name="header_shadow" value="%1$s" id="header_shadow[%1$s]" %3$s />'.
            '<label for="header_shadow[%1$s]"> %2$s ' .
            '</label><br>',
            esc_attr($key),
            esc_html($label),
            checked($saved, $key, false)
			
        );
    }
		printf('<br /><p><i>%1$s</i></p>', esc_html__("More header options and change headers layout in each page, Go premium version.", 'ecommerce-star'));
}

/* When the post is saved, saves our custom data */
function ecommerce_star_save_postdata( $post_id ) 
{
      // verify if this is an auto save routine. 
      // If it is our form has not been submitted, so we dont want to do anything
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
          return;

      // verify this came from the our screen and with proper authorization,
      // because save_post can be triggered at other times
      if (isset($_POST['ecommerce_star_headerstyle']) && !wp_verify_nonce((wp_unslash($_POST['ecommerce_star_headerstyle'])), 'ecommerce_star_nounce_header_style' ) )
          return;

      if ( isset($_POST['header_shadow']) && $_POST['header_shadow'] != "" ){
            update_post_meta( $post_id, 'header_shadow', ecommerce_star_sanitize_header_options(wp_unslash($_POST['header_shadow'])) );
      } 
}


/* code to add cart, account wishist popup */
add_action('wp_footer', 'ecommerce_star_popup_cart');
function ecommerce_star_popup_cart(){

global $ecommerce_star_option;
	if(class_exists('woocommerce') && !$ecommerce_star_option['woocommerce_header_cart_hide'] ) { 
	?>
	<div id="scroll-cart" class="topcorner" zindex="0">
		<ul>
			<li class="my-cart"><?php do_action( 'woocommerce_cart_top' ); ?></li>
			<li><a class="login-register"  href="<?php echo esc_url($ecommerce_star_option['header_myaccount_link']); ?>"><i class="fa fa-user-circle">&nbsp;</i></a></li>
		</ul>
	</div>
	<?php
	}
} 

// Display fontawesome search icon in menus and toggle search form 
///add_filter('wp_nav_menu_items', 'ecommerce_star_search_form', 10, 2);

function ecommerce_star_search_form($items, $args) {
if( $args->theme_location == 'top' )

	if (!class_exists("WooCommerce")) {
       $items .= '<li tabindex="0"><a id="search-button" class="search_icon"><i class="fa fa-search"></i></a><div  class="ceylonwpsearchform" ></div></li></ul>';
	} else {
       $items .= '<li class="menu-search-popup" tabindex="0"><a class="search_icon"><i class="fa fa-search"></i></a><div  class="ceylonwpsearchform" >'. get_search_form(false) .'</div></li></ul>';
	}
       return $items;
}


/**
 * @since 1.0.0
 * add product categories links.
 */

function ecommerce_star_nav_wrap() {
	  $wrap  = '<ul id="%1$s" class="%2$s">';
	  $wrap .= '<li class="hidden-xs theme-product-cat-menu menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="/" class="product-category-heading"><i class="fa fa-align-left"></i>&nbsp;'.esc_html__('Top Categories','ecommerce-star').'</a>';
	  $wrap .= ecommerce_star_print_categories();
	  $wrap .= '</li>';
	  $wrap .= '%3$s';
	  $wrap .= '</ul>';
	  return $wrap;
}

function ecommerce_star_print_categories(){
  $cat_string = '';
  $max_items = 25;
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
	 $cat_string .= '<ul class="sub-menu theme-product-cat-sub-menu">';
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
						'hide_empty'   => 1,
				);
				
				$cat_string .= '<li> <a href="'.esc_url(get_term_link($cat->slug, 'product_cat')).'">'.esc_html($cat->name).'</a>';
				
			}		      
	 } /* end for each */
	 $cat_string .=  '</ul>';

return $cat_string;

}


require  ECOMMERCE_STAR_TEMPLATE_DIR.'/inc/help.php';
	/**
	 * Register a sub menu page.
	 */
add_action('admin_menu', 'ecommerce_star_register_theme_page');
 
function ecommerce_star_register_theme_page() {
		add_theme_page(
			'Theme Help',
			'Theme Help',
			'manage_options',
			'ecommerce-star-submenu',
			'ecommerce_star_submenu_page_callback' );
}


function ecommerce_star_general_admin_notice(){

		 $msg = sprintf('<div data-dismissible="disable-done-notice-forever" class="notice notice-info" ><p>
				<a class="avril-btn-get-started button button-primary button-hero avril-button-padding" href="#" data-name="" data-slug="">%1$s</a>
				<a href=%2$s class="thickbox" > %3$s </a>&nbsp;<a href=%4$s target="_blank" class="thickbox"> %5$s </a>
				<span>%6$s</span>
				<a href="?ecommerce_star_notice_dismissed" target="_self"  style="text-decoration: none; float: right;" class="thickbox" >%7$s</a></p></div>',
				esc_html__('Install Demos...','ecommerce-star'),
				esc_url('themes.php?page=ecommerce-star-submenu#getting-started'),			
				esc_html__('Setup Guide','ecommerce-star'),
				esc_url(ECOMMERCE_STAR_THEME_URI),	
				esc_html__('Go Pro','ecommerce-star'),
				esc_html__('There are page builder widgets with the prefix Theme: ex:- Theme:Product slider, Theme:Product categories.','ecommerce-star'),	
				esc_html__('Dismiss', 'ecommerce-star'));
				
		 echo wp_kses_post($msg);
	 
}


if ( isset( $_GET['ecommerce_star_notice_dismissed'] ) ){
	//set notice value false
	update_option('ecommerce_star_notification', 'do_not_show');
}


$ecommerce_star_notification = get_option('ecommerce_star_notification', '');

if (($ecommerce_star_notification !='do_not_show' || $ecommerce_star_notification == '') ){
	add_action('admin_notices', 'ecommerce_star_general_admin_notice');	
}


/*********************
 *   Demo  Installer
 *********************/
 
 //Admin Enqueue for Admin
function ecommerce_star_admin_enqueue_scripts(){	
	wp_enqueue_script( 'avril-admin-script', get_template_directory_uri() . '/js/admin.js', array( 'jquery' ), '', true );
    wp_localize_script( 'avril-admin-script', 'avril_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'ecommerce_star_admin_enqueue_scripts' );

add_action( 'wp_ajax_install_act_plugin', 'ecommerce_star_admin_install_plugin' );

function ecommerce_star_admin_install_plugin() {
    /**
     * Install Plugin.
     */
    include_once ABSPATH . '/wp-admin/includes/file.php';
    include_once ABSPATH . '/wp-admin/includes/class-wp-upgrader.php';
    include_once ABSPATH . '/wp-admin/includes/plugin-install.php';

    if ( ! file_exists( WP_PLUGIN_DIR . '/ceylon-demo-installer' ) ) {
        $api = plugins_api( 'plugin_information', array(
            'slug'   => sanitize_key( wp_unslash( 'ceylon-demo-installer' ) ),
            'fields' => array(
                'sections' => false,
            ),
        ) );

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );
    }
	
    if ( ! file_exists( WP_PLUGIN_DIR . '/advanced-import' ) ) {
        $api = plugins_api( 'plugin_information', array(
            'slug'   => sanitize_key( wp_unslash( 'advanced-import' ) ),
            'fields' => array(
                'sections' => false,
            ),
        ) );

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );
    }	

    // Activate plugin.
    if ( current_user_can( 'activate_plugin' ) ) {
        $result = activate_plugin( 'ceylon-demo-installer/ceylon-demo-installer.php' );
		
        $result = activate_plugin( 'advanced-import/advanced-import.php' );
		
    }
}


add_action('advanced_export_include_options','ecommerce_star_include_my_options');
 function ecommerce_star_include_my_options( $included_options ){
     $my_options = array(
         'ecommerce_star_options',
     );
     return array_unique (array_merge( $included_options, $my_options));
 }
 
// Disables the block editor from widget areas.
add_filter( 'use_widgets_block_editor', '__return_false' );
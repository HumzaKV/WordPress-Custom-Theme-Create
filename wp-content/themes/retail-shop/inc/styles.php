<?php
/**
 * retail-shop: Color Patterns
 * @package retail-shop
 * @since 1.0
 */
/**
 * Generate the CSS for the current custom color scheme.
 */

function retail_shop_custom_colors_css() {

	global $retail_shop_option;	
	if ( class_exists( 'WP_Customize_Control' ) ) {
	   $retail_shop_option = wp_parse_args(  get_option( 'ecommerce_star_option', array() ) , ecommerce_star_settings());  
	}

	$header_top = esc_attr($retail_shop_option['header_top_color']);
	$mini_header_color = esc_attr($retail_shop_option['mini_header_color']);
	$menu_bar_color = esc_attr($retail_shop_option['menu_bar_color']);
	$menu_text_color = esc_attr($retail_shop_option['menu_text_color']);
	$breadcrumb_bg_color = esc_attr($retail_shop_option['breadcrumb_bg_color']);
	$mini_header_border = absint($retail_shop_option['mini_header_border']);
	
	$navigation_font_size =  absint($retail_shop_option['navigation_font_size']);

	$color =  esc_attr($retail_shop_option['colorscheme_color']);
	
	$footer_text =  esc_attr($retail_shop_option['footer_foreground_color']);
	
	$logo_width = absint($retail_shop_option['logo_width']);

	$css = '
	
.custom-logo-link img {
    max-width: '.$logo_width.'px;
}	
	
	
a.wishlist-contents .fa {
	font-family: "fontawesome";
}

#sticky-nav li > a.product-category-heading {
	background-color:'.$color.' ;
	margin-right: 7px;
	color:#fff;
}

#sticky-nav.woocommerce-layout #top-menu > li > a.product-category-heading {
	color:#fff;
}

.top-menu-layout-2 .theme-product-cat-menu {
	display:none;
}

#main_Carousel .start-button,
#main_Carousel .carousel-indicators li.active {
	background-color:  '.$color.' ;
	border-color:  '.$color.' ;
}

#main_Carousel .start-button:hover,
#main_Carousel .start-button:focus,
#main_Carousel .carousel-navigation a:hover, 
#main_Carousel .carousel-navigation a:focus {
	background-color: #df0000cc ;
	color:  #fff ;
	border-color: #df0000cc ;
}


.carousel-navigation a, 
.carousel-navigation a,
.carousel-indicators li.active {
	background-color: '.$color.';
	
}

#btn-search-category:hover,
#btn-search-category:focus {
	background-color:  '.$color.' ;
	color:#fff;
}


.contact-list-top a:focus,
.mini-header .login-register a:focus,
.mimi-header-social-icon li a i:focus,
.my-wishlist a:focus,
.my-cart a:focus,
.site-branding-text a:focus,
#cart-wishlist-container .wishlist-contents:focus,
#cart-wishlist-container a.cart-contents:focus .cart-contents-count:before,
.topcorner a.login-register:focus {
	color:  '.$color.' ;
	border:1px dotted '.$color.' ;
}
.menu-toggle:focus,
.menu-toggle:hover {
	background-color: '.$color.' ;
	color: #fff;
}

.contact-list-top a:hover,
.mini-header .login-register a:hover,
.mimi-header-social-icon li a i:hover,
.my-wishlist a:hover,
.my-cart a:hover,
.site-branding-text a:hover,
#cart-wishlist-container .wishlist-contents:hover,
#cart-wishlist-container a.cart-contents:hover .cart-contents-count:before,
.topcorner a.login-register:hover {
	color:  '.$color.' ;
}
	
.navigation-top.font-size {
	font-size:'.$navigation_font_size.'px;
}
	
.cart-contents-count span {
	background-color: '.$color.' ;
}	
	
.sub-header-inner {
	background-color: '.$breadcrumb_bg_color.' ;
}

#masthead {
	background-image: url('.esc_url(get_header_image()).') ;
	background-position:center;
	background-repeat:no-repeat;
	background-size: cover;
}

@media screen and (min-width: 48em) {

	.mini-header {	
		border-bottom: '.$mini_header_border.'px solid '.$mini_header_color.';
	}
	
	.transparent-header .mini-header {
		border-bottom: 0px;
	}	

	#top-menu > .current_page_item > a:hover, 
	#top-menu > .current_page_item > a:focus {
		color: #fff;
		background-color: '.$color.';	
	}
	
	#top-menu > li > a {
		color: '.$header_top.';
	}
	
	.sticky-nav #top-menu > li > a,
	.sticky-nav	.site-description,
	.sticky-nav	.site-branding-text a {
		color:unset;
	}
	
	.sticky-nav	#top-menu > .current_page_item > a { 
		color:#ffffff; 
	}
	
	.sticky-nav	#top-menu > .current_page_item > a:hover, 
	.sticky-nav	#top-menu > .current_page_item > a:focus {
		color: #fff;
		background-color: '.$color.';	
	}
		
	.sticky-nav	#top-menu > li > a:hover,
	.sticky-nav	#top-menu > li > a:focus {
		color: #fff;
		background-color: '.$color.';
		
	}
	
	#sticky-nav.woocommerce-layout {
		color: #fff;
		background-color: '.$menu_bar_color.';
	}
	
	#sticky-nav.woocommerce-layout.sticky-nav {
		border:initial;
	}
	
	#sticky-nav.woocommerce-layout #top-menu > li > a {
		color: '.$menu_text_color.';
	}
	
	#sticky-nav #top-menu > li > a {
		color: '.$header_top.';
	}
	
	/* #sticky-nav.sticky-nav #top-menu > .current_page_item > a {
		color: #fff;
	} */
		
	#sticky-nav.sticky-nav #top-menu > li > a {
		color: '.$menu_text_color.';
	}
	
	#sticky-nav.top-menu-layout-2.sticky-nav #top-menu > li > a {
		color: #000;
	}	
	#sticky-nav.top-menu-layout-2.sticky-nav #top-menu > li > a:hover,
	#sticky-nav.top-menu-layout-2.sticky-nav #top-menu > li > a:focus {
		color: #fff;
	}	
	#sticky-nav.top-menu-layout-2.sticky-nav #top-menu > .current_page_item  > a {
		color: #fff;
	}
		
	#top-menu > li > a:hover,
	#top-menu > li > a:focus {
		color: #fff;
		background-color: '.$color.';
		
	}
		
	#sticky-nav #top-menu > li > a:hover,
	#sticky-nav #top-menu > li > a:focus {
		color: #fff;
		background-color: '.$color.';
		
	}	
		
	#sticky-nav #top-menu > .current_page_item > a {
		color: #fff;
		background-color: '.$color.';
		border-radius: 2px;		
	}
	
	#sticky-nav.woocommerce-layout #top-menu > .current_page_item > a {
		font-weight: 600;
		text-transform: uppercase;
		background-color: transparent;
	}
	
	#sticky-nav.woocommerce-layout #top-menu > .current_page_item > a:hover,
	#sticky-nav.woocommerce-layout #top-menu > .current_page_item > a:focus {
		color: #fff;
		background-color: '.$color.';
	}
	
	
}

.bottom-menu .current_page_item a {
	color: '.$color.';	 
}

.main-navigation a:hover, 
.main-navigation a:focus {
	color: #fff;
	background-color: '.$color.';
}	

.product-navigation .navigation-name a::before,
.product-navigation > ul > li > a::before {
	color: '.$color.';
}


.site-branding-text a,
.site-description,
.mini-header .account-link,
.mimi-header-social-icon li a i,
.contact-list-top,
.contact-list-top a,
.mini-header .login-register .fa,
.my-wishlist a, .my-cart a,
#cart-wishlist-container .cart-contents-count:before,
#cart-wishlist-container .cart-contents-count,
#cart-wishlist-container .wishlist-contents,
#cart-wishlist-container .cart-contents-price {
	color: '.$header_top.';
}

.menu-toggle {
	color: '.$header_top.';
}

#cart-wishlist-container .wishlist-contents-count {
	color:transparent;
	font-size:0px;
}

#cart-wishlist-container .wishlist-contents-count::before {
	font-size:16px;
}



/* product */

.my-yith-wishlist .button.yith-wcqv-button::before,
.my-yith-wishlist .woocommerce a.compare.button:before,
.my-yith-wishlist .yith-wcwl-add-button .add_to_wishlist:before,
.my-yith-wishlist .yith-wcwl-wishlistaddedbrowse a:before,
.my-yith-wishlist .yith-wcwl-wishlistexistsbrowse.show a:before,
.my-yith-wishlist .yith-wcwl-wishlistexistsbrowse a:before,
.my-yith-wishlist .compare-button a {
    color: '.$color.';	
}

.woocommerce span.onsale {
	background: '.$color.';
}

.woocommerce .woocommerce-breadcrumb a {
    color: '.$color.';
}

.woocommerce nav.woocommerce-pagination ul li a:focus, 
.woocommerce nav.woocommerce-pagination ul li a:hover, 
.woocommerce nav.woocommerce-pagination ul li span.current,
nav.woocommerce-MyAccount-navigation ul li.is-active {
    background: '.$color.';
    color: #fff;
}

nav.woocommerce-MyAccount-navigation ul li.is-active a {
	color: #fff;
}

/* Price Widget */

.woocommerce .widget_price_filter .ui-slider .ui-slider-handle { 
background-color: '.$color.'; 
}
.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content {
background-color: #5d5d5d;
}
.woocommerce .widget_price_filter .ui-slider .ui-slider-range {
background-color:'.$color.';
}

.product-wrapper .badge-wrapper .onsale {
	background: '.$color.';
}
.product-rating-wrapper .checked {
	color: '.$color.';
}

.wc-button-container a.add_to_cart_button,
.wc-button-container a.add_to_cart_button:focus,
.wc-button-container a.product_type_grouped, 
.wc-button-container a.product_type_external, 
.wc-button-container a.product_type_simple, 
.wc-button-container a.product_type_variable {
	background: '.$color.';
	color:#fff;
}
.woocommerce button.button.alt.disabled,
.woocommerce a.add_to_cart_button,
.woocommerce a.add_to_cart_button:focus,
.woocommerce a.product_type_grouped, 
.woocommerce a.product_type_external, 
.woocommerce a.product_type_simple, 
.woocommerce a.product_type_variable,
.woocommerce button.button.alt,
.woocommerce a.button,
.woocommerce button.button,
.woocommerce a.button.alt,
.woocommerce #respond input#submit,
.woocommerce .widget_price_filter .price_slider_amount .button {
	background: '.$color.';
	color:#fff;
}

fieldset,
.woocommerce form.checkout_coupon, 
.woocommerce form.login, 
.woocommerce form.register {	
	border: 1px solid '.$color.';
}

.select2-container--default .select2-selection--single {
    border: 1px solid '.$color.';
}

.woocommerce-info {
    border-top-color: '.$color.';
}
.woocommerce-info::before {
    color: '.$color.';
}

.woocommerce-error {
    border-top-color: '.$color.';
}
.woocommerce-error::before {
    color: '.$color.';
}

.woocommerce-message {
    border-top-color: '.$color.';
}
.woocommerce-message::before {
    color: '.$color.';
}


/* button colors */
.woocommerce button.button.alt.disabled:hover,
.woocommerce button.button.alt.disabled:focus,

.woocommerce a.button:hover,
.woocommerce a.button:focus,

.woocommerce button.button:hover,
.woocommerce button.button:focus,

.woocommerce div.product form.cart .button:hover,
.woocommerce div.product form.cart .button:focus,

.woocommerce a.button.alt:hover,
.woocommerce a.button.alt:focus {
	background-color: black;
	color: white;
}

.woocommerce button.button.alt:hover,
.woocommerce button.button.alt:focus {
	background-color: black;
	color: white;
}

/* form */

button, input[type="button"], 
input[type="submit"] {
   background-color: '.$color.';	
}

input[type="text"],
input[type="email"],
input[type="url"],
input[type="password"],
input[type="search"],
input[type="number"],
input[type="tel"],
input[type="range"],
input[type="date"],
input[type="month"],
input[type="week"],
input[type="time"],
input[type="datetime"],
input[type="datetime-local"],
input[type="color"],
input[type="checkbox"],
textarea {
	border:1px solid '.$color.' ; 
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="password"]:focus,
input[type="search"]:focus,
input[type="number"]:focus,
input[type="tel"]:focus,
input[type="range"]:focus,
input[type="date"]:focus,
input[type="month"]:focus,
input[type="week"]:focus,
input[type="time"]:focus,
input[type="datetime"]:focus,
input[type="datetime-local"]:focus,
input[type="color"]:focus,
input[type="checkbox"]:focus,
textarea:focus {	
	border-color:'.retail_shop_rgba($color,0.5).' ;
}

/* link - a */



.entry-content a:focus,
.entry-content a:hover,
.entry-summary a:focus,
.entry-summary a:hover,
.comment-content a:focus,
.comment-content a:hover,
.widget a:focus,
.widget a:hover,
.site-footer .widget-area a:focus,
.site-footer .widget-area a:hover,
.posts-navigation a:focus,
.posts-navigation a:hover,
.comment-metadata a:focus,
.comment-metadata a:hover,
.comment-metadata a.comment-edit-link:focus,
.comment-metadata a.comment-edit-link:hover,
.comment-reply-link:focus,
.comment-reply-link:hover,
.widget_authors a:focus strong,
.widget_authors a:hover strong,
.entry-title a:focus,
.entry-title a:hover,
.entry-meta a:focus,
.entry-meta a:hover,
.page-links a:focus .page-number,
.page-links a:hover .page-number,
.entry-footer a:focus,
.entry-footer a:hover,
.entry-footer .cat-links a:focus,
.entry-footer .cat-links a:hover,
.entry-footer .tags-links a:focus,
.entry-footer .tags-links a:hover,
.post-navigation a:focus,
.post-navigation a:hover,
.pagination a:not(.prev):not(.next):focus,
.pagination a:not(.prev):not(.next):hover,
.comments-pagination a:not(.prev):not(.next):focus,
.comments-pagination a:not(.prev):not(.next):hover,
.logged-in-as a:focus,
.logged-in-as a:hover,
a:focus .nav-title,
a:hover .nav-title,
.edit-link a:focus,
.edit-link a:hover,
.site-info a:focus,
.site-info a:hover,
.widget .widget-title a:focus,
.widget .widget-title a:hover,
.widget ul li a:focus,
.bottom-menu ul li a:focus,
.bottom-menu ul li a:hover,
.widget ul li a:hover {
	color: '.$color.';	
}


.entry-footer .cat-links .icon,
.entry-footer .tags-links .icon {
	color: '.retail_shop_rgba($color,0.7).' ;
}

.entry-footer .edit-link a {
    background-color: '.$color.' ;	
}

.scroll-top {
    background: '.$color.';
}




/* widget */


.widget .tagcloud a,  
.widget.widget_tag_cloud a,  
.wp_widget_tag_cloud a {
    border-color:'.retail_shop_rgba($color,0.7).';
}

#secondary .widget-title {
    border-bottom: 1px solid '.$color.';
	text-align:left;
}


/* link */

a.more-btn{
	border-color:'.$color.';
	color:'.$color.';
}

a.more-btn:active,
a.more-btn:hover,
a.more-btn:focus  {
   background-color:'.$color.';
   color:#fff;  
}
a.more-link {
	color:'.$color.';	
}

a.more-link:active,
a.more-link:hover,
a.more-link:focus  {
   background-color:'.$color.';
   color:#fff;  
}


@media screen and (min-width: 48em) {

		.transparent-header .site-branding-text a,
		.transparent-header .site-description,		
		.transparent-header .mini-header .account-link,
		.transparent-header .mimi-header-social-icon li a i,
		.transparent-header .contact-list-top,
		.transparent-header .contact-list-top a,
		.transparent-header .mini-header .login-register .fa,
		.transparent-header .my-wishlist a, 
		.transparent-header .my-cart a,
		.transparent-header #sticky-nav #top-menu > li > a,
		.transparent-header #cart-wishlist-container .cart-contents-count:before,
		.transparent-header #cart-wishlist-container .cart-contents-count,
		.transparent-header #cart-wishlist-container .wishlist-contents,
		.transparent-header #cart-wishlist-container .cart-contents-price {
			color: #fff;
		}
		
		/* .transparent-header #sticky-nav.sticky-nav #top-menu > li > a { color:#000; } */
				
		.transparent-header #sticky-nav.sticky-nav.sticky-nav #top-menu > .current_page_item > a { color:#fff; }
		.transparent-header #sticky-nav.sticky-nav #top-menu > li > a:hover,
		.transparent-header #sticky-nav.sticky-nav.sticky-nav #top-menu > li > a:focus { color:#fff; }
		
		
		.transparent-header .sticky-nav .site-branding-text a,
		.transparent-header .sticky-nav .site-description {
			color:#000;
		}
		
		#masthead.transparent-header {
			background-image: unset;
			background-color: transparent;
			position: absolute;
			box-shadow:unset ;
			width: 100%;			
			z-index: 9990;			
			
		}

	} /* end transparent header css */ 		

	
';


	return apply_filters( 'retail_shop_custom_colors_css', $css );
}


/*
 * Footer formating
 */
function retail_shop_footer_foreground_css(){
	
	global $retail_shop_option;	
	if ( class_exists( 'WP_Customize_Control' ) ) {
	   $retail_shop_option = wp_parse_args(  get_option( 'ecommerce_star_option', array() ) , ecommerce_star_settings());  
	}
	
	$color =  esc_attr(get_theme_mod( 'footer_foreground_color', '#000'));
	
	$theme_color = esc_attr($retail_shop_option['colorscheme_color']);	
		
	/**
	 *
	 * @since retail-shop 1.0
	 *
	 */

$css                = '

.footer-foreground {}
.footer-foreground .widget-title, 
.footer-foreground a, 
.footer-foreground p, 
.footer-foreground li,
.footer-foreground h1,
.footer-foreground h2,
.footer-foreground h3,
.footer-foreground h4,
.footer-foreground h5,
.footer-foreground h6,
.footer-foreground .widget_calendar th,
.footer-foreground .widget_calendar td,
caption,
.footer-foreground .site-info a,
.footer-foreground .site-info,
.site-footer .site-info
{
  color:'.$color.';
}

.footer-foreground a:hover, 
.footer-foreground a:active {color:'.$theme_color.';}


';

return $css;

}


if ( ! function_exists( 'retail_shop_custom_fonts_css' ) ) :
/**
 *  google font css
 */
function retail_shop_custom_fonts_css() {

	global $retail_shop_option;	
	if ( class_exists( 'WP_Customize_Control' ) ) {
	   $retail_shop_option = wp_parse_args(  get_option( 'ecommerce_star_option', array() ) , ecommerce_star_settings());  
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
		font-family:'.$retail_shop_option['header_fontfamily'].',sans serif;
	}
	
	html {
		font-family:'.$retail_shop_option['body_fontfamily'].',sans serif;
	}
	
	.main-navigation {
		font-family:'.$retail_shop_option['header_fontfamily'].',sans serif;
	}
	
	.site-title a, .testimonial-title {
		font-family:'.$retail_shop_option['header_fontfamily'].',sans serif;
	}
	
	#main_Carousel .slider-title {
		font-family:'.$retail_shop_option['header_fontfamily'].',sans serif;
	}

	';

	return $css;
}

endif;



/**
 * container width CSS.
 */
function retail_shop_container_widths_css() {
?>
	<style type="text/css" id="custom-theme-width" >
		.container {		
			max-width: <?php global $retail_shop_option; echo absint($retail_shop_option['body_container_width']);?>px;
			width: 100%;
		}
		
		.site-header .container, .footer-section .container{		
			max-width: <?php global $retail_shop_option; echo absint($retail_shop_option['header_container_width']);?>px;
			width: 100%;
		}		
	</style>
<?php
}
add_action( 'wp_head', 'retail_shop_container_widths_css' );

/**
 * Display custom font CSS.
 */
function retail_shop_fonts_css_container() {    
?>
	<style type="text/css" id="custom-fonts" >
		<?php echo wp_strip_all_tags(retail_shop_custom_fonts_css()); ?>
	</style>
<?php
}
add_action( 'wp_head', 'retail_shop_fonts_css_container' );


/**
 * Display custom color CSS.
 */
function retail_shop_colors_css_container() {
?>
	<style type="text/css" id="custom-theme-colors" >
		<?php echo wp_strip_all_tags(retail_shop_custom_colors_css()); ?>
	</style>
<?php
}
add_action( 'wp_head', 'retail_shop_colors_css_container' );

/**
 * Display footer custom color CSS.
 */
function retail_shop_footer_css_container() {
?>
	<style type="text/css" id="custom-footer-colors" >
		<?php echo wp_strip_all_tags(retail_shop_footer_foreground_css()); ?>
	</style>
<?php
}
add_action( 'wp_head', 'retail_shop_footer_css_container' );

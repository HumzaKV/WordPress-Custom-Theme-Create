<?php
/**
 * The header
 * @package ecommerce-star
 * @since 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php 
	wp_head();
	/* 
	 * get default settings 
	 */ 
	global $ecommerce_star_option;	
	if ( class_exists( 'WP_Customize_Control' ) ) {
	   $ecommerce_star_option = wp_parse_args(  get_option( 'ecommerce_star_option', array() ) , ecommerce_star_settings());  
	}
?>
</head>
<body <?php body_class(); ?>>
<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else { 
		do_action( 'wp_body_open' ); 
	}
$ecommerce_star_option['header_style'] = ecommerce_star_header_class();
?>
<!-- The Search Modal Dialog -->
<div id="myModal" class="modal" aria-hidden="true" tabindex="-1" role="dialog">
  <!-- Modal content -->
  <div class="modal-content"> <span id="search-close" class="close" tabindex="0">&times;</span> 
  <br/><br/>
    <?php get_search_form(); ?>
    <br/>
  </div>
</div>
<!-- end search model-->
<div id="page" class="site">
<?php 
if($ecommerce_star_option['box_layout']){
  echo '<div class="wrap-box">';
}

?>
<a class="skip-link screen-reader-text" href="#primary" >
	<?php esc_html_e( 'Skip to content', 'ecommerce-star' ); ?>
</a>
<header id="masthead" class="<?php echo esc_attr(ecommerce_star_header_class()); ?> site-header" role="banner" >
	
	<?php get_template_part( 'template-parts/header/header', 'top-1' );	?>

	<div class="container">
		<?php
		if(class_exists( 'WooCommerce' ) && $ecommerce_star_option['header_woocommerce']){
			ecommerce_star_woocommerce_header();
		} else {
			ecommerce_star_default_header(); 
		}
		?>
	</div><!-- .container -->
	
		<!--display menu bar full row when header options, woocommerce layout with search--> 
		<?php 
		// display full width menu below woocommerce search
		if(class_exists( 'WooCommerce' ) && $ecommerce_star_option['header_woocommerce'] ){
			ecommerce_star_woocommerce_menu();
		}
		
		//display slider
		if((is_front_page() || is_home()) && $ecommerce_star_option['slider_in_home_page'] ){
			get_template_part( 'template-parts/slider', 'section' );	
		}
		
		// breadcrumb not displayed with transparent header
		if ($ecommerce_star_option['enable_breadcrumb']) {
			get_template_part( 'template-parts/header/breadcrumb');
		}
	
?>
</header><!-- #masthead -->	



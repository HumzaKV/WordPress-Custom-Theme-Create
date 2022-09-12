<?php
if ((!is_front_page() )){ 
	ecommerce_star_sub_header();
} elseif ('posts' == get_option( 'show_on_front' )){
	ecommerce_star_sub_header();
}
function ecommerce_star_sub_header() {
	global $post, $ecommerce_star_option;
	if ( class_exists( 'WP_Customize_Control' ) ) {
	   $ecommerce_star_option = wp_parse_args(  get_option( 'ecommerce_star_option', array() ) , ecommerce_star_settings());  
	}	
	$url = '';
	$homeLink = esc_url( home_url() );
?>
	<div class="sub-header" >
	<img src="<?php echo esc_attr(wp_get_attachment_url($ecommerce_star_option['breadcrumb_image'])); ?>"/>
	<div class="sub-header-inner sectionoverlay vertical-center-any">
	<?php
	
	if(is_search()){
		echo '<div class="title">'. esc_html__('Search Results','ecommerce-star').'</div>';
	} else if( is_404() ){
		echo '<div class="title">'. esc_html__('Page not Found','ecommerce-star').'</div>';
	} else if( class_exists("WooCommerce") && is_shop() ){
		echo '<div class="title">'. esc_html__('Shop','ecommerce-star').'</div>';		
	} else if( is_archive() || is_category() ){
		echo '<div class="title">'. wp_kses_post(get_the_archive_title()).'</div>';
	} else if( is_single() ){
		echo  the_title('<div class="title">', '</div>');
	} else if(is_front_page() || is_home() ){
		echo '<div class="title">'. wp_kses_post(get_bloginfo( 'name' )) .'</div>';
	} else {
	    echo the_title('<div class="title">', '</div>');
	}

	?>
	</div>
</div><!-- .sub-header -->
<?php
}


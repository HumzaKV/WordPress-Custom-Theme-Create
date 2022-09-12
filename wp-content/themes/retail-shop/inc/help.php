<?php
if(!function_exists('ecommerce_star_submenu_page_callback')){
function ecommerce_star_submenu_page_callback() {
 ?>
<div class="wrap" >

	<div class="welcome-panel">
	
	<h2><?php esc_html_e("We have created a guide to get you started:", 'retail-shop'); ?> </h2>
	
	<div class="welcome-panel-column">
	
	<h2 id="getting-started"><?php esc_html_e('Getting Started', 'retail-shop'); ?> </h2>
	
	<br />
	<a class="button button-primary" href="<?php echo retail_shop_THEME_DOC; ?>" target="_blank"><?php esc_html_e('See Tutorials & FREE DEMO', 'retail-shop'); ?></a>

	
	<h3><?php echo esc_html__('Set Home Page :-', 'retail-shop'); ?></h3>
	<p><?php echo esc_html__('Settings -> Reading -> Select a static page, select home page and save settings.', 'retail-shop'); ?> </p>

	
	<h3><?php echo esc_html__('Create Menus :-', 'retail-shop'); ?></h3>
	<p><?php echo esc_html__('Appearance > Menu and Click View all locations. Theme has 2 menu areas called Top and Footer. Create and assign menus. Click save.', 'retail-shop'); ?> </p>			
	
	<h3><?php echo esc_html__('Add Wishlist, Compare support :-', 'retail-shop'); ?></h3>
	<p><?php echo esc_html__('Install YITH WishList, YITH quick view and YITH Compare plugins.', 'retail-shop'); ?> </p>
	
	</div>
	
	
	
	<div class="welcome-panel-column">
	
	<h2><?php esc_html_e('Next Steps', 'retail-shop'); ?> </h2>
	
	<h3><?php echo esc_html__('Add Header Contact and Social links :-', 'retail-shop'); ?></h3>
	<p><?php echo esc_html__('Customizer  -> Theme Options -> Header, Add phone, email, Work Hours Edit My Account Link', 'retail-shop'); ?> </p>

	<h3><?php echo esc_html__('Add sub header with Image :-', 'retail-shop'); ?></h3>
	<p><?php echo esc_html__('Customizer  -> Theme Options -> Sub Header.', 'retail-shop'); ?> </p>
	
	<h3><?php echo esc_html__('Enable / Disable WooCommerce popup cart | my account :-', 'retail-shop'); ?></h3>
	<p><?php echo esc_html__('Customizer  -> Theme Options -> Popup cart.', 'retail-shop'); ?> </p>		
	
	<h3><?php echo esc_html__('Change site layout / Sidebar positions :-', 'retail-shop'); ?></h3>
	<p><?php echo esc_html__('Customizer  -> Theme Options -> Layout', 'retail-shop'); ?> </p>
	
	<h3><?php echo esc_html__('Format UI elements :-', 'retail-shop'); ?></h3>
	<p><?php echo esc_html__('Customizer  -> Theme Options -> Buttons and UI elements', 'retail-shop'); ?> </p>		

	
	<h3><?php echo esc_html__('Change Fonts :-', 'retail-shop'); ?></h3>
	<p><?php echo esc_html__('Customizer  -> Theme Options -> Fonts. Change fonts', 'retail-shop'); ?> </p>

	
	<h3><?php echo esc_html__('Change Footer Credits / Colours :-', 'retail-shop'); ?></h3>
	<p><?php echo esc_html__('Customizer  -> Theme Options -> Footer. Edit text.', 'retail-shop'); ?> </p>
	
	</div>
	
	
	<div class="welcome-panel-column">
		<h2><?php esc_html_e('More Actions', 'retail-shop'); ?> </h2>
		
		<h3><?php echo esc_html__('Change Header style to Storefront / Sticky etc: :-', 'retail-shop'); ?></h3>
		<p><?php echo esc_html__('Edit page. Righ hand side, you will find page options Select desired header style from page options.', 'retail-shop'); ?> </p>
		
		<h3><?php echo esc_html__('Creating Product pages :-', 'retail-shop'); ?></h3>
		<p><?php echo esc_html__('Add shortcode widget and use product shortcodes', 'retail-shop'); echo esc_html__(' https://docs.woocommerce.com/document/woocommerce-shortcodes/', 'retail-shop'); ?> </p>			
		
		<a class="button button-primary button-hero" href="<?php echo ECOMMERCE_STAR_THEME_URI; ?>" target="_blank"><?php esc_html_e('See Premium Features', 'retail-shop'); ?></a>		
	</div>	
	

	</div>

</div> 
 <?php
 }
}

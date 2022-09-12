<?php

/*
 * default settings 
 */
if( !function_exists('ecommerce_star_settings') ){

		function ecommerce_star_settings(){
			return array(
		
			'header_myaccount_link' => esc_url(home_url().'/my-account'),
			'header_myaccount_text' => esc_html__('My Account', 'ecommerce-star'),
			'header_woocommerce' => 1,
			'header_top_color' => '#3c3c3c',
			'breadcrumb_bg_color' => 'rgba(0,0,0,0.49)',
			'breadcrumb_image' => '',
			'breadcrumb_heigh' => 350,
			'increase_header_menu_width' => false,
			'header_show_title_tag' => true,
			'header_woocommerce_ajax_search' => false,			
			'woocommerce_category_menu' => true,
			'header_style' => 'yes',
			
			'logo_width' => 90,
			
			'nav_slider_in_home_page' => 1,
			
			'colorscheme_color' => '#297fec',
			
			'slider_max_items' => 3,
			'slider_cat' => '',
			'slider_animation_type' => 'slide',
			'slider_speed' => 3000,
			'slider_button_text' => esc_html__('More Details', 'ecommerce-star'),
			'slider_button_link' => '',
			'slider_in_home_page' => false,
			'slider_image_height' => 500,
			
			
			'navigation_font_size' => '15',
			'header_fontfamily' => 'Oswald',
			'body_fontfamily' => 'Roboto',
			
			'mini_header_color' => '#f7f7f7',
			'menu_bar_color' => '#fff',
			'menu_text_color' => '#000',
			'mini_header_style' => 'top-1',
			'mini_header_border' => 0,
			'enable_breadcrumb' => 0,
			
			'button_radius' => 3,
			'social_button_radius' => 24,
			'search_button_radius' => 24,
			'scroll_button_radius' => 4,
			
			'body_container_width' => 1200,
			'header_container_width' => 1200,
		
			'blog_sidebar_position' => 'right',
			
			'layout_section_post_one_column' => 0 ,	
			'box_layout' => 0,
			'woo_sidebar_position' => 'left',
							
			'social_facebook_link' => '',
			'social_twitter_link' => '',
			'social_skype_link' => '',
			'social_pinterest_link' => '',
			'social_instagram_link' => '',
			'social_linkdin_link' => '',
			'social_youtube_link' => '',
			'social_open_new_tab' => 1,
			
			'woocommerce_header_cart_hide' => 0,					
			'woocommerce_no_breadcrumb' => 0,
			
			'contact_section_hide_header' => 0,
			'contact_section_address' => '',
			'contact_section_email' => '',
			'contact_section_fax' => '',
			'contact_section_phone' => '',
			'contact_section_hours' => '',
			'contact_section_map' => '',
					
			'footer_section_background_color' => '#2d2d2f',
			'footer_section_widget_layout' => 'primary',
			'footer_bottom_layout' => 'one-column',
			'footer_section_image' => '',
			'footer_section_image_repeat' => 'no-repeat',	
			'footer_foreground_color' => '#fff',		
            'footer_section_bottom_text' => '',
				
			);
		}
}

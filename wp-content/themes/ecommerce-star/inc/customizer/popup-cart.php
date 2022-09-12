<?php	
	
	$wp_customize->add_section( 'popup_cart_section' , array(
		'title'      => __('Popup Cart', 'ecommerce-star' ),			 
		'panel' => 'theme_options',
	) );		
	
	//hide cart	
	
	$wp_customize->add_setting( 'ecommerce_star_option[woocommerce_header_cart_hide]' , array(
	'default'    => false,
	'sanitize_callback' => 'ecommerce_star_sanitize_checkbox',
	'type'=>'option'
	));
		
	$wp_customize->add_control('ecommerce_star_option[woocommerce_header_cart_hide]' , array(
	'label' => __('Hide Popup Cart, My Account','ecommerce-star' ),
	'section' => 'popup_cart_section',
	'type'=>'checkbox',
	) );
	
	$wp_customize->selective_refresh->add_partial( 'ecommerce_star_option[woocommerce_header_cart_hide]', array(
		'selector' => '#cart-top .cart-container',
	) );
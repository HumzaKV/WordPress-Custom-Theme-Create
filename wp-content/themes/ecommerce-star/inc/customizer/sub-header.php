<?php

	$wp_customize->add_section( 'mini_header_section' , array(
		'title'      => __('Sub Header', 'ecommerce-star' ),			 
		'panel' => 'theme_options',
	) );	
	
	//breadcrumb | title
	$wp_customize->add_setting( 'ecommerce_star_option[enable_breadcrumb]' , array(
	'default'    => 0,
	'sanitize_callback' => 'ecommerce_star_sanitize_checkbox',
	'type'=>'option'
	));
	
	$wp_customize->add_control('ecommerce_star_option[enable_breadcrumb]' , array(
	'label' => __('Enable | Disable page title section. (!Not displayed in home page)','ecommerce-star' ),
	'section' => 'mini_header_section',
	'type'=>'checkbox',
	));	
		
	// breadcrumb colour
	$wp_customize->add_setting(
		'ecommerce_star_option[breadcrumb_bg_color]',
		array(
			'default'     => ecommerce_star_get_default_setting('breadcrumb_bg_color'),
			'type'        => 'option',
			'transport'   => 'refresh',				
			'sanitize_callback' => 'ecommerce_star_sanitize_rgba_color',
		)
	);

	$wp_customize->add_control(
		new Ecommerce_Star_Alpha_Color_Control(
			$wp_customize,
			'ecommerce_star_option[breadcrumb_bg_color]',
			array(
				'label'         =>  __('Background Color', 'ecommerce-star' ),
				'section'       => 'mini_header_section',					
				'settings'      => 'ecommerce_star_option[breadcrumb_bg_color]',
				'description'   => __('Drag the transparent slider if background image not visible.', 'ecommerce-star'),
				'show_opacity'  => true,
				'palette'	=> ecommerce_star_color_codes(),
			)
		)
	);
	
	// breadcrumb image
	$wp_customize->add_setting('ecommerce_star_option[breadcrumb_image]', array(
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
		'type'        => 'option',
	));
		
	$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'ecommerce_star_option[breadcrumb_image]', array(
		'label'             => __('Background Image', 'ecommerce-star'),
		'section'           => 'mini_header_section',
		'settings'          => 'ecommerce_star_option[breadcrumb_image]',
		'flex_width'        => true, 
		'flex_height'       => true,
		'width' => 1280,
		'height' => 420,
	)));

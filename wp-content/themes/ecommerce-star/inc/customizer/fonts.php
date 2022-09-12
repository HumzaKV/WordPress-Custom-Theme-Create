<?php

/*****************
 * Custom fonts. *
 *****************/

	$wp_customize->add_section( 'font_section' , array(
		'title'      => __('Typography', 'ecommerce-star' ),			
		'description'=> '',
		'panel' => 'theme_options',
		 
	) ); 
	
	$wp_customize->add_setting(
		'ecommerce_star_option[navigation_font_size]', array(
			'default'           => '15',			
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint', 
			'type'        => 'option',
		)
	);		

	$wp_customize->add_control('ecommerce_star_option[navigation_font_size]' , array(
	'label' => __('Top Menu Font Size','ecommerce-star' ),
	'section' => 'font_section',
	'type'=>'select',
	'choices'=>array(
		'14' => __('14px','ecommerce-star' ),
		'15' => __('15px','ecommerce-star' ),
		'16' => __('16px','ecommerce-star' ),
		'17' => __('17px','ecommerce-star' ),
		'18' => __('18px','ecommerce-star' ),
		'19' => __('19px','ecommerce-star' ),
	),
	) );	
	
	//body font
	$wp_customize->add_setting(
		'ecommerce_star_option[header_fontfamily]', array(
			'default'           => 'Oswald',			
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',  
			'type'        => 'option',
		)
	);
	
	$wp_customize->add_control( 'ecommerce_star_option[header_fontfamily]' , array(
		'label' => __('Headings Font Family','ecommerce-star'),
		'section' => 'font_section',
		'type'=>'select',
		'choices'=> ecommerce_star_business_font_family(),	
	) );	
	
	//body font
	$wp_customize->add_setting(
		'ecommerce_star_option[body_fontfamily]', array(
			'default'           => 'Roboto',			
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',  
			'type'        => 'option',
		)
	);
	
	$wp_customize->add_control( 'ecommerce_star_option[body_fontfamily]' , array(
		'label' => __('Body Font Family','ecommerce-star'),
		'section' => 'font_section',
		'type'=>'select',
		'choices'=> ecommerce_star_business_font_family(),
	) );
	
	//label 1
	$wp_customize->add_setting( 'font_section_label1', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );
	
	$wp_customize->add_control( new ecommerce_star_Label_Custom_control( $wp_customize, 'font_section_label1', array(
		'label'   => __('Unlimited google fonts, Go Pro','ecommerce-star' ),
		'section' => 'font_section',
	) ) );
	

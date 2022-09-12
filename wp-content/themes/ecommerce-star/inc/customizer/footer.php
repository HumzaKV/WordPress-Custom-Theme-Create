<?php

/*********************** 
* Footer customization *
***********************/

		$wp_customize->add_section( 'footer_section' , array(
			'title'      => __('Footer Customizer', 'ecommerce-star' ),			
			'description'=> __('Customize footer background image, background colors, Footer bottom text and background color. Add widgets, goto Customizer->Widgets section.', 'ecommerce-star' ),
		    'panel' => 'theme_options',
		) );
		
			
		// background Alpha Color Picker setting
		$wp_customize->add_setting(
			'ecommerce_star_option[footer_section_background_color]',
			array(
				'default'     => ecommerce_star_get_default_setting('footer_section_background_color'),
				'type'        => 'option',			
				'transport'   => 'refresh',
				'sanitize_callback' => 'ecommerce_star_sanitize_rgba_color',
			)
		);
		
		// background Alpha Color Picker control
		$wp_customize->add_control(
			new Ecommerce_Star_Alpha_Color_Control(
				$wp_customize,
				'ecommerce_star_option[footer_section_background_color]',
				array(
					'label'         =>  __('Background Color','ecommerce-star' ),
					'section'       => 'footer_section',
					'settings'      => 'ecommerce_star_option[footer_section_background_color]',
					'show_opacity'  => true, // Optional.
					'palette'	=> ecommerce_star_color_codes(),
				)
			)
		);
		

		// footer section footer foreground color - return with only get_theme_mod('footer_foreground_color') !important 
		$wp_customize->add_setting( 'footer_foreground_color' , array(
		'default'    => ecommerce_star_get_default_setting('footer_foreground_color'),
		'sanitize_callback' => 'sanitize_hex_color',
	
		));
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize , 'footer_foreground_color' , array(
		'label' => __('Footer Text Color','ecommerce-star' ),
		'section' => 'footer_section',
		'settings'=>'footer_foreground_color'
		) ) );				
		
		// footer section bottom background text
		$wp_customize->add_setting( 'ecommerce_star_option[footer_section_bottom_text]' , array(
		'default'    => __("Copyright Text", 'ecommerce-star'),
		'sanitize_callback' => 'wp_kses_post',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('ecommerce_star_option[footer_section_bottom_text]' , array(
		'label' => __('Footer Bottom Text','ecommerce-star' ),
		'section' => 'footer_section',
		'type'=>'textarea',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'ecommerce_star_option[footer_section_bottom_text]', array(
			'selector' => '.site-info',
		) );			
				
		
		//label 1
		$wp_customize->add_setting( 'footer_section_label1', array(
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new ecommerce_star_Label_Custom_control( $wp_customize, 'footer_section_label1', array(
			'label'   => __('Footer image, custom footer link, footer 4 column layout Go Pro.','ecommerce-star' ),
			'section' => 'footer_section',
		) ) );	
<?php

/********************
*  contact Settings *
*********************/

		$wp_customize->add_section( 'contact_section' , array(
			'title'      => __('Mini Header', 'ecommerce-star' ),			
			'description'=>  __('Add all your contact details. Need More header styles:- See Premium features.', 'ecommerce-star' ),
			'panel' => 'theme_options',
		) );
				
		
		// contact section header show / hide
		$wp_customize->add_setting( 'ecommerce_star_option[contact_section_hide_header]' , array(
		'default'    => false,
		'sanitize_callback' => 'ecommerce_star_sanitize_checkbox',
		'type'=>'option'
		));

		$wp_customize->add_control('ecommerce_star_option[contact_section_hide_header]' , array(
		'label' => __('Hide Mini Header with social icons','ecommerce-star' ),
		'section' => 'contact_section',
		'type'=>'checkbox',
		) );
		
		
		// mini header border colour
		$wp_customize->add_setting(
			'ecommerce_star_option[mini_header_color]',
			array(
				'default'     => ecommerce_star_get_default_setting('mini_header_color'),
				'type'        => 'option',
				'transport'   => 'refresh',				
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
	
		$wp_customize->add_control(
			new Ecommerce_Star_Alpha_Color_Control(
				$wp_customize,
				'ecommerce_star_option[mini_header_color]',
				array(
					'label'         =>  __('Mini Header Border','ecommerce-star' ),
					'section'       => 'contact_section',					
					'settings'      => 'ecommerce_star_option[mini_header_color]',
					'description'   => 'Publish and Refresh page if colour changes do not effect.',
					'show_opacity'  => true,
					'palette'	=> ecommerce_star_color_codes(),
				)
			)
		);

	
        // woocommerce cart show/hide
		$wp_customize->add_setting( 'ecommerce_star_option[mini_header_border]' , array(
		'default'    => 0,
		'sanitize_callback' => 'absint',
		'type'=>'option'
		));
		
		//hide cart
		$wp_customize->add_control('ecommerce_star_option[mini_header_border]' , array(
		'label' => __('Mini Header Border Bottom (px)','ecommerce-star' ),
		'section' => 'contact_section',
		'type'=>'number',
		) );

		
		// address
		$wp_customize->add_setting( 'ecommerce_star_option[contact_section_address]' , array(
		'default'    => __('Your Address', 'ecommerce-star'),
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('ecommerce_star_option[contact_section_address]' , array(
		'label' => __('Address','ecommerce-star' ),
		'section' => 'contact_section',
		'type'=>'text',
		) );
		
		// email
		$wp_customize->add_setting( 'ecommerce_star_option[contact_section_email]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_email',
		'type'=>'option'
		));

		$wp_customize->add_control('ecommerce_star_option[contact_section_email]' , array(
		'label' => __('Email:','ecommerce-star' ),
		'section' => 'contact_section',
		'type'=>'text',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'ecommerce_star_option[contact_section_email]', array(
			'selector' => '.contact-list-top',
		) );		
		
		// phone
		$wp_customize->add_setting( 'ecommerce_star_option[contact_section_phone]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('ecommerce_star_option[contact_section_phone]' , array(
		'label' => __('Phone:','ecommerce-star' ),
		'section' => 'contact_section',
		'type'=>'text',
		) );
		
		
		// work hours
		$wp_customize->add_setting( 'ecommerce_star_option[contact_section_hours]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('ecommerce_star_option[contact_section_hours]' , array(
		'label' => __('Work Hours 1','ecommerce-star' ),
		'section' => 'contact_section',
		'type'=>'text',
		) );

		// contact section google map
		$wp_customize->add_setting( 'ecommerce_star_option[contact_section_map]' , array(
		'default'    => 'https://www.google.com/maps/',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		));

		$wp_customize->add_control('ecommerce_star_option[contact_section_map]' , array(
		'label' => __('Google map URL:','ecommerce-star' ),
		'section' => 'contact_section',
		'type'=>'text',
		) );
		
		/*
		 * My Account link
		 */
		$wp_customize->add_setting( 'ecommerce_star_option[header_myaccount_text]' , array(
		'default'    => __('My Account','ecommerce-star' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('ecommerce_star_option[header_myaccount_text]' , array(
		'label' => __('My Account | Login text','ecommerce-star' ),
		'section' => 'contact_section',
		'type'=>'text',
		) );
		
		//account link		
		$wp_customize->add_setting( 'ecommerce_star_option[header_myaccount_link]' , array(
		'default'    =>  home_url().'/my-account',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('ecommerce_star_option[header_myaccount_link]' , array(
		'label' => __('My Account | Login Link','ecommerce-star' ),
		'section' => 'contact_section',
		'type'=>'url',
		) );

		

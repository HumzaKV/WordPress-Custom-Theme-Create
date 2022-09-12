<?php

		$wp_customize->add_section( 'button_section' , array(
			'title'      => __('Button and UI Elements', 'ecommerce-star' ),			
			'description'=> __('<p>Customize button appearance</p>', 'ecommerce-star' ),
		    'panel' => 'theme_options',
		) );
		
		//label 2
         $wp_customize->add_setting( 'featured_button_label1', array(
			'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( new ecommerce_star_Label_Custom_control( $wp_customize, 'featured_button_label1', array(
            'label'   => __('Adjust Button Radius. Approximately 24px >= for rounded buttons','ecommerce-star' ),
            'section' => 'button_section',
        ) ) );			
		
		// button radius
		$wp_customize->add_setting( 'ecommerce_star_option[button_radius]' , array(
		'default'    => 3,
		'sanitize_callback' => 'absint',
		'type'=>'option'
		));

		$wp_customize->add_control('ecommerce_star_option[button_radius]' , array(
		'label' => __('Button Radius (px)','ecommerce-star' ),
		'section' => 'button_section',
		'type'=>'number',
		) );		
		

		// social button radius
		$wp_customize->add_setting( 'ecommerce_star_option[social_button_radius]' , array(
		'default'    => 24,
		'sanitize_callback' => 'absint',
		'type'=>'option'
		));

		$wp_customize->add_control('ecommerce_star_option[social_button_radius]' , array(
		'label' => __('Social Button Radius (px)','ecommerce-star' ),
		'section' => 'button_section',
		'type'=>'number',
		) );
		
		// social button radius
		$wp_customize->add_setting( 'ecommerce_star_option[search_button_radius]' , array(
		'default'    => 24,
		'sanitize_callback' => 'absint',
		'type'=>'option'
		));

		$wp_customize->add_control('ecommerce_star_option[search_button_radius]' , array(
		'label' => __('Search Button Radius (px)','ecommerce-star' ),
		'section' => 'button_section',
		'type'=>'number',
		) );
		
		// scroll button radius
		$wp_customize->add_setting( 'ecommerce_star_option[scroll_button_radius]' , array(
		'default'    => 4,
		'sanitize_callback' => 'absint',
		'type'=>'option'
		));

		$wp_customize->add_control('ecommerce_star_option[scroll_button_radius]' , array(
		'label' => __('Scroll to Top Button Radius (px)','ecommerce-star' ),
		'section' => 'button_section',
		'type'=>'number',
		) );
		
		

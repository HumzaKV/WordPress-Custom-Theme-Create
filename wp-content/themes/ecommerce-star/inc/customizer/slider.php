<?php

		/* Slider Settings */

		$wp_customize->add_section( 'slider_section' , array(
			'title'      => __('Home Featured Slider', 'ecommerce-star' ),			
			'description'=> __('Slider widget and 20+ Widgets, Go Pro version.', 'ecommerce-star' ),
			'panel' => 'theme_options',
		) );
		
		$wp_customize->add_setting( 'ecommerce_star_option[slider_in_home_page]' , array(
		'default'    => 0,
		'sanitize_callback' => 'ecommerce_star_sanitize_checkbox',
		'type'=>'option'
		));
		
		$wp_customize->add_control('ecommerce_star_option[slider_in_home_page]' , array(
		'label' => __('Enable home slider','ecommerce-star' ),
		'section' => 'slider_section',
		'type'=>'checkbox',
		) );
	
		// slider animation type
		$wp_customize->add_setting( 'ecommerce_star_option[slider_animation_type]' , array(
		'default'    => 'slide',
		'sanitize_callback' => 'ecommerce_star_sanitize_select',
		'type'=>'option'
		));

		$wp_customize->add_control('ecommerce_star_option[slider_animation_type]' , array(
		'label' => __('Slider Effects','ecommerce-star' ),
		'section' => 'slider_section',
		'type'=>'select',
		'choices'=>array(
			'slide'=> __('Slide', 'ecommerce-star' ),
			'fade'=> __('Fade', 'ecommerce-star' ),
		),
		) );
		
		// slider speed
		$wp_customize->add_setting( 'ecommerce_star_option[slider_speed]' , array(
		'default'    => 4000,
		'sanitize_callback' => 'ecommerce_star_sanitize_select',
		'type'=>'option'
		));

		$wp_customize->add_control('ecommerce_star_option[slider_speed]' , array(
		'label' => __('Slider animation speed(ms)','ecommerce-star' ),
		'section' => 'slider_section',
		'type'=>'select',
		'choices'=>array(
			500 => 500,
			1000 => 1000,
			2000 => 2000,
			3000 => 3000,
			4000 => 4000,
			5000 => 5000,
			6000 => 6000,
			7000 => 7000,
			8000 => 8000,
			9000 => 9000,
			10000 => 10000,
			20000 => 20000,
			40000 => 40000,
			80000 => 80000,
			120000 => 120000,
		),
		) );
	
	
		// service button title
		$wp_customize->add_setting( 'ecommerce_star_option[slider_button_text]' , array(
		'default'    => __('More Details','ecommerce-star' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('ecommerce_star_option[slider_button_text]' , array(
		'label' => __('Featured Button text','ecommerce-star' ),
		'section' => 'slider_section',
		'type'=>'text',
		) );		
		
		// service button title
		$wp_customize->add_setting( 'ecommerce_star_option[slider_button_link]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('ecommerce_star_option[slider_button_link]' , array(
		'label' => __('Featured Button Link','ecommerce-star' ),
		'section' => 'slider_section',
		'type'=>'text',
		) );
		
        $wp_customize->add_setting( 'slider_label1', array(
            'default'        => __('Select Posts with featured image','ecommerce-star' ),
			'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( new ecommerce_star_Label_Custom_control( $wp_customize, 'slider_label1', array(
            'label'   => __('Select post with featured image','ecommerce-star' ),
            'section' => 'slider_section',
        ) ) );		
	

		// post 1
		$wp_customize->add_setting( 'ecommerce_star_option[slider_cat]' , array(
		'default'    => '',
		'sanitize_callback' => 'ecommerce_star_sanitize_select',
		'type'=>'option'
		));

		$wp_customize->add_control('ecommerce_star_option[slider_cat]' , array(
		'label' => __('Select Category','ecommerce-star' ),
		'section' => 'slider_section',
		'type'=>'select',
		'choices'=> ecommerce_star_get_post_categories(),
		) );
		
		$wp_customize->selective_refresh->add_partial( 'ecommerce_star_option[slider_cat]', array(
			'selector' => '#main_Carousel .carousel-caption',
		) );
		
					
		// height
		$wp_customize->add_setting( 'ecommerce_star_option[slider_image_height]' , array(
		'default'    => 500,
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('ecommerce_star_option[slider_image_height]' , array(
		'label' => __('Slider Height (Max)','ecommerce-star' ),
		'section' => 'slider_section',
		'type'=>'number',
		) );		

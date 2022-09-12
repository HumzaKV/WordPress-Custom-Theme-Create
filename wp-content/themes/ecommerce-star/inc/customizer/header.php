<?php

/******************
* Header Settings *
******************/
	
		$wp_customize->add_section( 'header_section' , array(
			'title'      => __('Header', 'ecommerce-star' ),			 
			'panel' => 'theme_options',
		) );
		
	
        // menu | sitle title width
		$wp_customize->add_setting( 'ecommerce_star_option[increase_header_menu_width]' , array(
		'default'    => false,
		'sanitize_callback' => 'ecommerce_star_sanitize_checkbox',
		'type'=>'option'
		));
		
		$wp_customize->add_control('ecommerce_star_option[increase_header_menu_width]' , array(
		'label' => __('Increase Menu Width (Reduce title logo Width)','ecommerce-star' ),
		'section' => 'header_section',
		'type'=>'checkbox',
		) );
		
        // hide - sitle title tagline
		$wp_customize->add_setting( 'ecommerce_star_option[header_show_title_tag]' , array(
		'default'    => true,
		'sanitize_callback' => 'ecommerce_star_sanitize_checkbox',
		'type'=>'option'
		));
		
		$wp_customize->add_control('ecommerce_star_option[header_show_title_tag]' , array(
		'label' => __('Display Title and Tagline','ecommerce-star' ),
		'section' => 'title_tagline',
		'type'=>'checkbox',
		) );
		
		
		// header top colour
		$wp_customize->add_setting(
			'ecommerce_star_option[header_top_color]',
			array(
				'default'     => ecommerce_star_get_default_setting('header_top_color'),
				'type'        => 'option',
				'transport'   => 'refresh',				
				'sanitize_callback' => 'ecommerce_star_sanitize_rgba_color',
			)
		);
	
		$wp_customize->add_control(
			new Ecommerce_Star_Alpha_Color_Control(
				$wp_customize,
				'ecommerce_star_option[header_top_color]',
				array(
					'label'         =>  __('Header text Color','ecommerce-star' ),
					'section'       => 'header_section',					
					'settings'      => 'ecommerce_star_option[header_top_color]',
					'description'   => 'Publish and Refresh page if colour changes do not effect.',
					'show_opacity'  => true,
					'palette'	=> ecommerce_star_color_codes(),
				)
			)
		);
			
		
		//label 1
		 $wp_customize->add_setting( 'header_section_label1', array(
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new ecommerce_star_Label_Custom_control( $wp_customize, 'header_section_label1', array(
			'label'   => __('More options such as header customization on each page, AJAX search Go Premium version.','ecommerce-star' ),
			'section' => 'header_section',
		) ) );
		
       // enable disable woocommerce header
		$wp_customize->add_setting( 'ecommerce_star_option[header_woocommerce]' , array(
		'default'    => 1,
		'sanitize_callback' => 'ecommerce_star_sanitize_checkbox',
		'type'=>'option'
		));
		
		$wp_customize->add_control('ecommerce_star_option[header_woocommerce]' , array(
		'label' => __('Enable | Disable Header Product Search','ecommerce-star' ),
		'section' => 'header_section',
		'type'=>'checkbox',
		) );		
			
		
		//breadcrumb
		$wp_customize->add_setting( 'ecommerce_star_option[woocommerce_no_breadcrumb]' , array(
		'default'    => 0,
		'sanitize_callback' => 'ecommerce_star_sanitize_checkbox',
		'type'=>'option'
		));
		
		$wp_customize->add_control('ecommerce_star_option[woocommerce_no_breadcrumb]' , array(
		'label' => __('Disable WooCommerce Breadcrumb','ecommerce-star' ),
		'section' => 'header_section',
		'type'=>'checkbox',
		) );
		
		
		//category menu
		$wp_customize->add_setting( 'ecommerce_star_option[woocommerce_category_menu]' , array(
		'default'    => true,
		'sanitize_callback' => 'ecommerce_star_sanitize_checkbox',
		'type'=>'option'
		));
		
		$wp_customize->add_control('ecommerce_star_option[woocommerce_category_menu]' , array(
		'label' => __('Show WooCommerce Category menu','ecommerce-star' ),
		'description'    => __('Not displayed in customizer preview.', 'ecommerce-star'),
		'section' => 'header_section',
		'type'=>'checkbox',
		) );
		
        // woocommerce cart show/hide
		$wp_customize->add_setting( 'ecommerce_star_option[woocommerce_header_cart_hide]' , array(
		'default'    => false,
		'sanitize_callback' => 'ecommerce_star_sanitize_checkbox',
		'type'=>'option'
		));
		
		
		// menu background colour
		$wp_customize->add_setting(
			'ecommerce_star_option[menu_bar_color]',
			array(
				'default'     => ecommerce_star_get_default_setting('menu_bar_color'),
				'type'        => 'option',
				'transport'   => 'refresh',				
				'sanitize_callback' => 'ecommerce_star_sanitize_rgba_color',
			)
		);
	
		$wp_customize->add_control(
			new Ecommerce_Star_Alpha_Color_Control(
				$wp_customize,
				'ecommerce_star_option[menu_bar_color]',
				array(
					'label'         =>  __('Menu Bar (WooCommerce Layout)','ecommerce-star' ),
					'section'       => 'header_section',					
					'settings'      => 'ecommerce_star_option[menu_bar_color]',
					'description'   => 'Publish and Refresh page if colour changes do not effect.',
					'show_opacity'  => true,
					'palette'	=> ecommerce_star_color_codes(),
				)
			)
		);		
		

		// menu text colour
		$wp_customize->add_setting(
			'ecommerce_star_option[menu_text_color]',
			array(
				'default'     => ecommerce_star_get_default_setting('menu_text_color'),
				'type'        => 'option',
				'transport'   => 'refresh',				
				'sanitize_callback' => 'ecommerce_star_sanitize_rgba_color',
			)
		);
	
		$wp_customize->add_control(
			new Ecommerce_Star_Alpha_Color_Control(
				$wp_customize,
				'ecommerce_star_option[menu_text_color]',
				array(
					'label'         =>  __('Menu Text Color (Menu Bar)','ecommerce-star' ),
					'section'       => 'header_section',					
					'settings'      => 'ecommerce_star_option[menu_text_color]',
					'description'   => 'Publish and Refresh page if colour changes do not effect.',
					'show_opacity'  => true,
					'palette'	=> ecommerce_star_color_codes(),
				)
			)
		);		

	
		//label 2
		 $wp_customize->add_setting( 'header_section_label2', array(
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new ecommerce_star_Label_Custom_control( $wp_customize, 'header_section_label2', array(
			'label'   => __('If Menu text color changes do not effect, check a menu is assigned to top menu. Change header colours and header background image please, goto Header Image section.', 'ecommerce-star' ),
			'section' => 'header_section',
		) ) );		
				
		

		

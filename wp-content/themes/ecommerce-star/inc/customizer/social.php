<?php

/******************** 
*   Social options  *
********************/		

		$wp_customize->add_section( 'social_section' , array(
			'title'      => __('Social', 'ecommerce-star' ),			
			'description'=> __('<b>Display social links and MyAccount link in site header and footer. Delete unwanted social links.</b>', 'ecommerce-star' ),
			'panel' => 'theme_options',
		) );
		
		
		$wp_customize->add_setting( 'ecommerce_star_option[social_open_new_tab]' , array(
		'default'    => 1,
		'sanitize_callback' => 'ecommerce_star_sanitize_checkbox',
		'type'=>'option'
		));
		
		$wp_customize->add_control('ecommerce_star_option[social_open_new_tab]' , array(
		'label' => __('Open Social Link in New Tab','ecommerce-star' ),
		'section' => 'social_section',
		'type'=>'checkbox',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'ecommerce_star_option[social_open_new_tab]', array(
			'selector' => '.mimi-header-social-icon',
		) );


		$wp_customize->add_setting( 'ecommerce_star_option[social_facebook_link]' , array(
		'default'    => '',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		));
		
		$wp_customize->selective_refresh->add_partial( 'ecommerce_star_option[social_facebook_link]', array(
			'selector' => '#footer-social',
		) );
		
		$wp_customize->add_control('ecommerce_star_option[social_facebook_link]' , array(
		'label' => __('Facebook Link','ecommerce-star' ),
		'section' => 'social_section',
		'type'=>'url',
		) );

		$wp_customize->add_setting( 'ecommerce_star_option[social_twitter_link]' , array(
		'default'    => '',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('ecommerce_star_option[social_twitter_link]' , array(
		'label' => __('Twitter Link','ecommerce-star' ),
		'section' => 'social_section',
		'type'=>'url',
		) );


		$wp_customize->add_setting( 'ecommerce_star_option[social_skype_link]' , array(
		'default'    => '',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('ecommerce_star_option[social_skype_link]' , array(
		'label' => __('Skype Link','ecommerce-star' ),
		'section' => 'social_section',
		'type'=>'url',
		) );							

		$wp_customize->add_setting( 'ecommerce_star_option[social_pinterest_link]' , array(
		'default'    => '',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('ecommerce_star_option[social_pinterest_link]' , array(
		'label' => __('Pinterest Link','ecommerce-star' ),
		'section' => 'social_section',
		'type'=>'url',
		) );		
		
		$wp_customize->add_setting( 'ecommerce_star_option[social_instagram_link]' , array(
		'default'    => '',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('ecommerce_star_option[social_instagram_link]' , array(
		'label' => __('Instagram Link','ecommerce-star' ),
		'section' => 'social_section',
		'type'=>'url',
		) );				

		$wp_customize->add_setting( 'ecommerce_star_option[social_linkdin_link]' , array(
		'default'    => '',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('ecommerce_star_option[social_linkdin_link]' , array(
		'label' => __('Linkdin Link','ecommerce-star' ),
		'section' => 'social_section',
		'type'=>'url',
		) );	

		$wp_customize->add_setting( 'ecommerce_star_option[social_youtube_link]' , array(
		'default'    => '',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('ecommerce_star_option[social_youtube_link]' , array(
		'label' => __('YouTube Link','ecommerce-star' ),
		'section' => 'social_section',
		'type'=>'url',
		) );
		
		
		

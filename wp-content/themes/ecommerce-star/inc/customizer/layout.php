<?php

/*******************
 * Layout options. *
 *******************/

		$wp_customize->add_section( 'layout_section' , array(
			'title'      => __('Layout', 'ecommerce-star' ),			
			'description'=> '<p>Change site layout. Change Single Post display layout, Default is two columns (with sidebar). In pages - use full width template to hide sidebar</p>',
			'panel' => 'theme_options',
		) );
		
		// site layout default / box layout 
		$wp_customize->add_setting( 'ecommerce_star_option[box_layout]' , array(
		'default'    => 0,
		'sanitize_callback' => 'ecommerce_star_sanitize_checkbox',
		'type'=>'option'
		));

		$wp_customize->add_control('ecommerce_star_option[box_layout]' , array(
		'label' => __('Enable box layout mode','ecommerce-star' ),
		'description' => __('Enable or disable Box layout mode. Default is fluid layout','ecommerce-star' ),
		'section' => 'layout_section',
		'type'=>'checkbox',
		) );
	
		// layout 
		$wp_customize->add_setting( 'ecommerce_star_option[layout_section_post_one_column]' , array(
		'default'    => 0,
		'sanitize_callback' => 'ecommerce_star_sanitize_checkbox',
		'type'=>'option'
		));

		$wp_customize->add_control('ecommerce_star_option[layout_section_post_one_column]' , array(
		'label' => __('One Column Single Post Layout','ecommerce-star' ),
		'description' => __('Display single post in one column (No Sidebar)','ecommerce-star' ),
		'section' => 'layout_section',
		'type'=>'checkbox',
		) );
		
		//label 3
         $wp_customize->add_setting( 'featured_layout_label3', array(
			'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( new ecommerce_star_Label_Custom_control( $wp_customize, 'featured_layout_label3', array(
            'label'   => __('Blog | Page | Archive sidebar Layout','ecommerce-star' ),
            'section' => 'layout_section',
        ) ) );			
		

		// sidebar position
		$wp_customize->add_setting( 'ecommerce_star_option[blog_sidebar_position]' , array(
		'default'    => 'right',
		'sanitize_callback' => 'ecommerce_star_sanitize_select',
		'type'=>'option'
		));

		$wp_customize->add_control('ecommerce_star_option[blog_sidebar_position]' , array(
		'label' => __('Sidebar position','ecommerce-star' ),
		'section' => 'layout_section',
		'type'=>'select',
		'choices'=>array(
			'right'=> __('Right Sidebar','ecommerce-star' ),
			'left'=> __('Left Sidebar','ecommerce-star' ),
		),
		) );
		

		// woocommerce sidebar position
		$wp_customize->add_setting( 'ecommerce_star_option[woo_sidebar_position]' , array(
		'default'    => 'left',
		'sanitize_callback' => 'ecommerce_star_sanitize_select',
		'type'=>'option'
		));

		$wp_customize->add_control('ecommerce_star_option[woo_sidebar_position]' , array(
		'label' => __('WooCommerce Sidebar','ecommerce-star' ),
		'section' => 'layout_section',
		'type'=>'select',
		'choices'=>array(
			'right'=> __('Right Sidebar','ecommerce-star' ),
			'left'=> __('Left Sidebar','ecommerce-star' ),
		),
		) );				
					

		
		//label 1
         $wp_customize->add_setting( 'featured_layout_label1', array(
			'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( new ecommerce_star_Label_Custom_control( $wp_customize, 'featured_layout_label1', array(
            'label'   => __('Adjust Header footer and container Widths, Go Pro','ecommerce-star' ),
            'section' => 'layout_section',
        ) ) );

		// container width
		$wp_customize->add_setting( 'ecommerce_star_option[header_container_width]' , array(
		'default'    => '1200',
		'sanitize_callback' => 'absint',
		'type'=>'option'
		));

		$wp_customize->add_control('ecommerce_star_option[header_container_width]' , array(
		'label' => __('Header/Footer width(px)','ecommerce-star' ),
		'section' => 'layout_section',
		'type'=>'number',
		) );
		
		

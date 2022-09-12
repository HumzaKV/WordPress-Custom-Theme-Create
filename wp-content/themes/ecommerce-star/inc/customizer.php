<?php
/**
 * ecommerce-star: Customizer
 *
 * @package ecommerce-star
 * @since 1.0
 */

add_action( 'customize_register', 'ecommerce_star_customizer_settings' ); 
function ecommerce_star_customizer_settings( $wp_customize ) {

		// Go pro control
		$wp_customize->add_section( 'ecommerce_star_lite' , array(
			'title'      	=> __( 'Pro Version', 'ecommerce-star' ),
			'priority' => 1,
		) );

		$wp_customize->add_setting( 'ecommerce_star_lite', array(
			'default'    		=> null,
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( new Ecommerce_Star_Pro_Button( $wp_customize, 'ecommerce_star_lite', array(
			'label'    => __( 'Pro Features', 'ecommerce-star' ),
			'section'  => 'ecommerce_star_lite',
			'settings' => 'ecommerce_star_lite',
			'priority' => 1,
		) ) );
		
	// hide - sitle title tagline
	$wp_customize->add_setting( 'storefront_pro_option[logo_width]' , array(
		'default'    => 90,
		'sanitize_callback' => 'absint',
		'type'=> 'option'
	));
	
	$wp_customize->add_control('storefront_pro_option[logo_width]' , array(
		'label' => __('Logo Maximum Width (px)','ecommerce-star' ),
		'section' => 'title_tagline',
		'type'=>'number',
		'priority' => 8
	) );
		
/*****************
 * Theme options.*
*****************/
 
$wp_customize->add_panel( 'theme_options', array(
  'title' => __( 'Theme Options','ecommerce-star' ),
  'description' => __('Theme specific customization options','ecommerce-star' ), // Include html tags such as <p>.
  'priority' => 2, // Mixed with top-level-section hierarchy.
) );


global $ecommerce_star_option;
//template settings

require_once ECOMMERCE_STAR_TEMPLATE_DIR.'/inc/customizer/contact.php';
require_once ECOMMERCE_STAR_TEMPLATE_DIR.'/inc/customizer/social.php';
require_once ECOMMERCE_STAR_TEMPLATE_DIR.'/inc/customizer/header.php';
require_once ECOMMERCE_STAR_TEMPLATE_DIR.'/inc/customizer/slider.php';
require_once ECOMMERCE_STAR_TEMPLATE_DIR.'/inc/customizer/sub-header.php';
require_once ECOMMERCE_STAR_TEMPLATE_DIR.'/inc/customizer/layout.php';
require_once ECOMMERCE_STAR_TEMPLATE_DIR.'/inc/customizer/fonts.php';
require_once ECOMMERCE_STAR_TEMPLATE_DIR.'/inc/customizer/footer.php';


			
/******************************
* default customizer settings *
*******************************/

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'ecommerce_star_customize_partial_blogname',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'ecommerce_star_customize_partial_blogdescription',
		)
	);
	
	/**
	 * Custom colors.
	 */

	
	
	//label 3
	 $wp_customize->add_setting( 'colour_section_label1', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new ecommerce_star_Label_Custom_control( $wp_customize, 'colour_section_label1', array(
		'label'   => __('Change header text colour, background Go Theme Options -> Header Section','ecommerce-star' ),
		'section' => 'colors',
	) ) );			
	
	
} // end of customizer settings

/**
 * Render the site title for the selective refresh partial.
 *
 * @since ecommerce-star 1.0
 * @see ecommerce_star_customize_register()
 *
 * @return void
 */
function ecommerce_star_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since ecommerce-star 1.0
 * @see ecommerce_star_customize_register()
 *
 * @return void
 */
function ecommerce_star_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function ecommerce_star_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function ecommerce_star_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function ecommerce_star_customize_preview_js() {
	wp_enqueue_script( 'ecommerce-star-customize-preview', get_theme_file_uri( '/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'ecommerce_star_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function ecommerce_star_panels_js() {
	wp_enqueue_script( 'ecommerce-star-customize-controls', get_theme_file_uri( '/js/customize-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'ecommerce_star_panels_js' );

if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * A class to create a dropdown for all categories.
 */
 class ecommerce_star_category_dropdown_custom_control extends WP_Customize_Control
 {
    private $cats = false;

    public function __construct($manager, $id, $args = array(), $ecommerce_star_options = array())
    {
        $this->cats = get_categories($ecommerce_star_options);

        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render the content of the category dropdown
     * @return HTML
     */
	 
	 public function render_content()
       {
            if(!empty($this->cats))
            {
                ?>
                    <label>
                      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                      <select <?php $this->link(); ?>>
                           <?php
						        printf('<option value="0" selected="selected" >'.esc_html__('None','ecommerce-star' ).'</option>');
                                foreach ( $this->cats as $cat )
                                {
                                    printf('<option value="%s" %s>%s</option>', esc_attr( $cat->term_id ), selected( $this->value(), esc_attr( $cat->term_id ), false), esc_attr( $cat->name ) );
                                }
                           ?>
                      </select>
                    </label>
                <?php  
            }
       }
 }
 
/* 
 * check valid list item has been selected 
 */ 
function ecommerce_star_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function ecommerce_star_sanitize_rgba_color( $value ) {
	// Check and mach 3/6/8-character hex, rgb, rgba, hsl, & hsla colors.
	$pattern = '/^(\#[\da-f]{3}|\#[\da-f]{6}|\#[\da-f]{8}|rgba\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)(,\s*(0\.\d+|1))\)|hsla\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)(,\s*(0\.\d+|1))\)|rgb\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)|hsl\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)\))$/';\preg_match( $pattern, $value, $matches );
	// Return 1st mach.
	if ( isset( $matches[0] ) ) {
		if ( is_string( $matches[0] ) ) {
			return $matches[0];
		}
		if ( is_array( $matches[0] ) && isset( $matches[0][0] ) ) {
			return $matches[0][0];
		}
	}
	// if no mach return an empty.
	return '';
}
 

function ecommerce_star_slider_sanitize( $value ) {
    if ( ! in_array( $value, array( 'Uncategorized','category' ) ) )    
    return $value;
}
 
/*
 * ecommerce-star sanitize text function
 */
function ecommerce_star_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/*
 * ecommerce-star sanitize checkbox function
 */ 
function ecommerce_star_sanitize_checkbox( $checked ) {
    // Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/*
 * ecommerce-star sanitize user input function
 */ 
function ecommerce_star_sanitize_userinput( $input ) {
    // Check
	return  nl2br(esc_html($input));
}
 
/**
 * Sanitize repeater control.
 */
function ecommerce_star_repeater_sanitize( $input ) {
    $input_decoded = json_decode( $input,true );

    if ( ! empty( $input_decoded ) ) {
        foreach ( $input_decoded as $boxk => $box ) {
            foreach ( $box as $key => $value ) {

                $input_decoded[ $boxk ][ $key ] = wp_kses_post( force_balance_tags( $value ) );

            }
        }
        return json_encode( $input_decoded );
    }
    return $input;
}



/* label control */
if (class_exists('WP_Customize_Control'))
{
     class ecommerce_star_Label_Custom_control extends WP_Customize_Control
     {
          public function render_content()
           {

                ?>
                    <p class="wrap notice-warning notice" style="border-radius: 3px;padding: 8px 3px 10px 10px;">
                      <span class="customize-category-select-control" style="text-align:center"><?php echo esc_html( $this->label ); ?></span>                      
                    </p>
                <?php
           }
     }
}
 
function ecommerce_star_business_font_family(){

	$google_fonts = array(  "Times New Roman" => "Times New Roman, Sans Serif",
							"Open sans" => "Open sans",
							"Roboto" => "Roboto",
							"Lato" => "Lato",
							"Oswald" => "Oswald",
							"Poppins" => "Poppins",
							"Alegreya" => "Alegreya",
							"Dosis" => "Dosis",
							"Montserrat" => "Montserrat",
							"Raleway" => "Raleway",
							"PT Sans" => "PT Sans",
							"Lora" => "Lora",
							"Noto Sans" => "Noto Sans",
							"Concert One" => "Concert One",
							"Nunito Sans" => "Nunito Sans",
							"Oxygen" => "Oxygen",
							"Work Sans" => "Work Sans",
						);
						
	return ($google_fonts);
}

/*
 * storefront-pro get post categories
 */

function ecommerce_star_get_post_categories(){
	$cats = get_categories();
	$arr = array();
	$arr[''] = 'None';
	foreach($cats as $cat){
		$arr[$cat->term_id] = $cat->name;
	}
	return $arr;
}
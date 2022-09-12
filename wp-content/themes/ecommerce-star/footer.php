<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ecommerce-star
 */
global $ecommerce_star_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $ecommerce_star_option = wp_parse_args(  get_option( 'ecommerce_star_option', array() ) , ecommerce_star_settings());  
}

$ecommerce_star_class = '';

if($ecommerce_star_option['footer_section_image']!=''){
	$ecommerce_star_class = 'footeroverlay';
}
$ecommerce_star_class = $ecommerce_star_class. ' footer-foreground';

?>

<footer id="colophon" role="contentinfo" class="site-footer  <?php echo esc_attr( $ecommerce_star_class );?>" style="background-color:<?php echo esc_attr( $ecommerce_star_option['footer_section_background_color'] ); ?>;">
  <div class="footer-section <?php echo esc_attr( $ecommerce_star_class );?>" >
    <div class="container">
	 <div class="row">
		<?php
			get_template_part( 'template-parts/footer/footer', 'widgets-primary');
		?>
      <div class="col-md-12">
        <center>
          <ul id="footer-social" class="header-social-icon animate fadeInRight" >
            <?php if($ecommerce_star_option['social_facebook_link']!=''){?>
            <li><a href="<?php echo esc_url($ecommerce_star_option['social_facebook_link']); ?>" target="<?php if($ecommerce_star_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="facebook" data-toggle="tooltip" title="<?php esc_attr_e('Facebook','ecommerce-star'); ?>"><i class="fa fa-facebook"></i></a></li>
            <?php } ?>
            <?php if($ecommerce_star_option['social_twitter_link']!=''){?>
            <li><a href="<?php echo esc_url($ecommerce_star_option['social_twitter_link']); ?>" target="<?php if($ecommerce_star_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="twitter" data-toggle="tooltip" title="<?php esc_attr_e('Twitter','ecommerce-star'); ?>"><i class="fa fa-twitter"></i></a></li>
            <?php } ?>
            <?php if($ecommerce_star_option['social_skype_link']!=''){?>
            <li><a href="<?php echo esc_url($ecommerce_star_option['social_skype_link']); ?>" target="<?php if($ecommerce_star_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="skype" data-toggle="tooltip" title="<?php esc_attr_e('Skype','ecommerce-star'); ?>"><i class="fa fa-skype"></i></a></li>
            <?php } ?>
            <?php if($ecommerce_star_option['social_pinterest_link']!=''){?>
            <li><a href="<?php echo esc_url($ecommerce_star_option['social_pinterest_link']); ?>" target="<?php if($ecommerce_star_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="pinterest" data-toggle="tooltip" title="<?php esc_attr_e('pinterest','ecommerce-star'); ?>"><i class="fa fa-pinterest"></i></a></li>
            <?php } ?>
            <?php if($ecommerce_star_option['social_instagram_link']!=''){?>
            <li><a href="<?php echo esc_url($ecommerce_star_option['social_instagram_link']); ?>" target="<?php if($ecommerce_star_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="instagram" data-toggle="tooltip" title="<?php esc_attr_e('Instagram','ecommerce-star'); ?>"><i class="fa fa-instagram"></i></a></li>
            <?php } ?>
            <?php if($ecommerce_star_option['social_linkdin_link']!=''){?>
            <li><a href="<?php echo esc_url($ecommerce_star_option['social_linkdin_link']); ?>" target="<?php if($ecommerce_star_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="linkedin" data-toggle="tooltip" title="<?php esc_attr_e('Linkedin','ecommerce-star'); ?>"><i class="fa fa-linkedin"></i></a></li>
            <?php } ?>		
            <?php if($ecommerce_star_option['social_youtube_link']!=''){?>
            <li><a href="<?php echo esc_url($ecommerce_star_option['social_youtube_link']); ?>" target="<?php if($ecommerce_star_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="youtube" data-toggle="tooltip" title="<?php esc_attr_e('YouTube','ecommerce-star'); ?>"><i class="fa fa-youtube"></i></a></li>
            <?php } ?>					
          </ul>
        </center>
      </div>
	  
	  </div>
    </div>
    <!-- .container -->
   </div>
   
 	<!-- bottom footer -->

		<?php 
		
		get_template_part( 'template-parts/footer/bottom', 'one-column' );
		
		?>
	
	<!-- end of bottom footer --> 
  <a href="#" class="scroll-top" tabindex="0"><i class="fa fa-angle-up"></i></a>
</footer>
<!-- #colophon -->
<?php 
global $ecommerce_star_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $ecommerce_star_option = wp_parse_args(  get_option( 'ecommerce_star_option', array() ) , ecommerce_star_settings());  
}
if($ecommerce_star_option['box_layout']){
	// end of wrapper div
	echo '</div>';
}
?>
</div><!-- end of page class - site--> 
<?php wp_footer(); ?>
</body>
</html>
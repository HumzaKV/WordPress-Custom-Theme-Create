<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package retail-shop
 */
global $retail_shop_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $retail_shop_option = wp_parse_args(  get_option( 'ecommerce_star_option', array() ) , ecommerce_star_settings());  
}

$retail_shop_class = '';

if($retail_shop_option['footer_section_image']!=''){
	$retail_shop_class = 'footeroverlay';
}
$retail_shop_class = $retail_shop_class. ' footer-foreground';



if($retail_shop_option['after_shop'] !=''  && class_exists( 'WooCommerce' ) && is_shop()){
	get_template_part( 'sections/after', 'shop');  
}
?>
</div><!-- end of page class - site--> 
<footer id="colophon" role="contentinfo" class="site-footer  <?php echo esc_attr( $retail_shop_class );?>" style="background-color:<?php echo esc_attr( $retail_shop_option['footer_section_background_color'] ); ?>;">
  <div class="footer-section <?php echo esc_attr( $retail_shop_class );?>" >
    <div class="container">
	 <div class="row">
		<?php
			get_template_part( 'template-parts/footer/footer', 'widgets-'.$retail_shop_option['footer_section_widget_layout']  );
		?>
      <div class="col-md-12">
        <center>
          <ul id="footer-social" class="header-social-icon animate fadeInRight" >
            <?php if($retail_shop_option['social_facebook_link']!=''){?>
            <li><a href="<?php echo esc_url($retail_shop_option['social_facebook_link']); ?>" target="<?php if($retail_shop_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="facebook" data-toggle="tooltip" title="<?php esc_attr_e('Facebook','retail-shop'); ?>"><i class="fa fa-facebook"></i></a></li>
            <?php } ?>
            <?php if($retail_shop_option['social_twitter_link']!=''){?>
            <li><a href="<?php echo esc_url($retail_shop_option['social_twitter_link']); ?>" target="<?php if($retail_shop_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="twitter" data-toggle="tooltip" title="<?php esc_attr_e('Twitter','retail-shop'); ?>"><i class="fa fa-twitter"></i></a></li>
            <?php } ?>
            <?php if($retail_shop_option['social_skype_link']!=''){?>
            <li><a href="<?php echo esc_url($retail_shop_option['social_skype_link']); ?>" target="<?php if($retail_shop_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="skype" data-toggle="tooltip" title="<?php esc_attr_e('Skype','retail-shop'); ?>"><i class="fa fa-skype"></i></a></li>
            <?php } ?>
            <?php if($retail_shop_option['social_pinterest_link']!=''){?>
            <li><a href="<?php echo esc_url($retail_shop_option['social_pinterest_link']); ?>" target="<?php if($retail_shop_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="pinterest" data-toggle="tooltip" title="<?php esc_attr_e('pinterest','retail-shop'); ?>"><i class="fa fa-pinterest"></i></a></li>
            <?php } ?>
            <?php if($retail_shop_option['social_instagram_link']!=''){?>
            <li><a href="<?php echo esc_url($retail_shop_option['social_instagram_link']); ?>" target="<?php if($retail_shop_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="instagram" data-toggle="tooltip" title="<?php esc_attr_e('Instagram','retail-shop'); ?>"><i class="fa fa-instagram"></i></a></li>
            <?php } ?>
            <?php if($retail_shop_option['social_linkdin_link']!=''){?>
            <li><a href="<?php echo esc_url($retail_shop_option['social_linkdin_link']); ?>" target="<?php if($retail_shop_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="linkedin" data-toggle="tooltip" title="<?php esc_attr_e('Linkedin','retail-shop'); ?>"><i class="fa fa-linkedin"></i></a></li>
            <?php } ?>		
            <?php if($retail_shop_option['social_youtube_link']!=''){?>
            <li><a href="<?php echo esc_url($retail_shop_option['social_youtube_link']); ?>" target="<?php if($retail_shop_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="youtube" data-toggle="tooltip" title="<?php esc_attr_e('YouTube','retail-shop'); ?>"><i class="fa fa-youtube"></i></a></li>
            <?php } ?>					
          </ul>
        </center>
      </div>
	  
	  </div>
    </div>
    <!-- .container -->
   </div>
   
 	<!-- bottom footer -->

		<?php get_template_part( 'template-parts/footer/bottom', 'one-column' ); ?>
	
	<!-- end of bottom footer --> 
  <a href="#" class="scroll-top" tabindex="0"><i class="fa fa-angle-up"></i></a>
</footer>
<!-- #colophon -->
<?php 
global $retail_shop_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $retail_shop_option = wp_parse_args(  get_option( 'ecommerce_star_option', array() ) , ecommerce_star_settings());  
}
if($retail_shop_option['box_layout']){
	// end of wrapper div
	echo '</div>';
}

wp_footer(); ?>
</body>
</html>
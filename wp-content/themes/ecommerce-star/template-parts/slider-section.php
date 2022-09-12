<?php
/**
 * Displays home slider
 * @package ecommerce-star
 * @since 1.0.9
 */
ecommerce_star_slider();
function ecommerce_star_slider(){

global $ecommerce_star_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $ecommerce_star_option = wp_parse_args(  get_option( 'ecommerce_star_option', array() ) , ecommerce_star_settings());  
}
?>
<section id="slider-section">
	<div class="svc-section-body" >
		<div>

<?php
//set query args to show specified amount or show all posts from particular category. 
$count = 0;
$args = array ( 'post_type' => 'post', 'posts_per_page'=> $ecommerce_star_option['slider_max_items'] , 'cat'=> $ecommerce_star_option['slider_cat'] , 'order' => 'DESC');

			
$loop = new WP_Query($args);
$count = $loop->post_count;


if($count==0): 

if ( class_exists( 'WP_Customize_Control' ) ) {
?>

<div id="main_Carousel" class="carousel slide" >

<img class="carousel-no-image" src="<?php echo esc_url(ECOMMERCE_STAR_TEMPLATE_DIR_URI.'/images/header.jpg'); ?>" alt="<?php esc_attr_e('No Image','ecommerce-star'); ?>" style="height:450px;">
			<div class="carousel-caption custom-caption" style="top:12%">
				<h1 class="slider-title"><?php esc_html_e('Create a page from home-page template and start customizing','ecommerce-star'); ?></h1>
			</div>
</div>
<?php } ?>			
<?php else: ?>

<div id="main_Carousel" class="carousel slide <?php if( $ecommerce_star_option['slider_animation_type']=='fade' ){ echo 'carousel-' . 'fade'; } ?>"  data-interval="<?php echo absint( $ecommerce_star_option['slider_speed']); ?>">
	<div class="no-z-index">
	<?php if($count>1): ?>
	  <ol class="carousel-indicators">
		<?php 
				$j = 0;			
				for ($j = 0; $j < $count; $j++):							
		?>
		<li data-target="#main_Carousel" data-slide-to="<?php echo absint($j); ?>" class="<?php if($j==0){ echo 'active'; }  ?>"></li>
		<?php								
				endfor;
		?>
	  </ol>
	 <?php endif; ?>
    </div>

  <div class="carousel-inner" role="listbox">
    <?php 
		  $i = 0;
		  while( $loop->have_posts() ) : $loop->the_post();		  
			
    ?>
    <div class="item <?php if($i==0){ echo 'active'; } $i++; ?> "> 
	<?php 
	$post_link = $thumb_id = $url = $my_title = '';
	$alt = '';
	$url = '';
	
	$post_link = get_permalink( get_the_ID() );
	if( has_post_thumbnail() ){
		$thumb_id = get_post_thumbnail_id(get_the_ID());
		$url = (get_the_post_thumbnail_url(get_the_ID(), 'full'));		
		$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
	} else {
		$url = ECOMMERCE_STAR_TEMPLATE_DIR_URI.'/images/header.jpg' ;
	}
	global $ecommerce_star_option;
	//if slider link specified, assign link to button
	if($ecommerce_star_option['slider_button_link'] !=''){
		$post_link = $ecommerce_star_option['slider_button_link'] ;
	}
	?>
	<div style="background:url(<?php echo esc_url($url); ?>) no-repeat;background-position:center center;background-size:cover;height:<?php echo absint($ecommerce_star_option['slider_image_height']); ?>px;" alt="<?php echo esc_attr($alt); ?>" ></div>	     
	  <div class="svc-section-body sectionoverlay" >
	  <div class="carousel-caption custom-caption">
        <?php
						
			echo ('<p class="slider-title">'.esc_html(get_the_title()).'</p>');
			$content = wp_trim_words( get_the_content(), 60, '...' );
			echo esc_html($content);
			echo '<br /><a class="start-button" href="'.esc_url($post_link).'" >'.esc_html($ecommerce_star_option['slider_button_text']).'</a>';
		?>
      </div>
	  </div>	
    </div>
    <?php
		endwhile;
		wp_reset_postdata();
	?>
</div>
	<?php if($count>1): ?>
			<ul class="carousel-navigation">
				<li><a class="carousel-prev" href="#main_Carousel" data-slide="prev"></a></li>
				<li><a class="carousel-next" href="#main_Carousel" data-slide="next"></a></li>
			</ul>
	<?php endif; ?> 
	<?php endif; ?>

   </div>
  </div>

 </div>
</section>

<?php
}
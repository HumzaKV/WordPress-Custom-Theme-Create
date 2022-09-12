<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ecommerce-star
 * @since 1.0
 */

get_header(); 
global $ecommerce_star_option;
$class = 'col-md-8 col-sm-8';
if($ecommerce_star_option['layout_section_post_one_column']==true){   
   $class = 'col-md-12 col-sm-12';
}
?>
<div class="container background" >
  <div class="row">
	<?php if($ecommerce_star_option['layout_section_post_one_column']==false): ?>
		<?php if($ecommerce_star_option['blog_sidebar_position']=='left'): ?>
		<div class="col-md-4 col-sm-4 floateleft"> 
		<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>
	<?php endif; ?>
	<div id="primary" class="<?php echo esc_attr($class); ?> content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/post/content', get_post_format() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				the_post_navigation(
					array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'ecommerce-star' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'ecommerce-star' ) . '</span> <span class="nav-title"><span>' . '<i class="fa fa-arrow-left" aria-hidden="true" ></i>' . '<span class="nav-title nav-margin-left" >%title</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'ecommerce-star' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'ecommerce-star' ) . '</span> <span class="nav-title">%title<span class="nav-margin-right"></span>' . '<i class="fa fa-arrow-right" aria-hidden="true"></i>'  . '</span>',
					)
				);

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php if($ecommerce_star_option['blog_sidebar_position']=='right'): ?>
		<?php if($ecommerce_star_option['layout_section_post_one_column']==false): ?>
			<div class="col-md-4 col-sm-4 floateright"> 
			<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>	
 </div>	
</div><!-- .container -->

<?php 
get_footer();
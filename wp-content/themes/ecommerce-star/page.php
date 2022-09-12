<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ecommerce-star
 * @since 1.0

 */
//get default options
global $ecommerce_star_option;
get_header(); 
?>
<div class="container background" >
   <div class="row">
	<?php if($ecommerce_star_option['layout_section_post_one_column']==false): ?>
		<?php if($ecommerce_star_option['blog_sidebar_position']=='left'): ?>
		<div class="col-md-4 col-sm-4 col-xs-12 floateleft"> 
		<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>
	<?php endif; ?>
	<div id="primary" class="col-md-8 col-sm-8 col-xs-12 content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main --> 

	</div><!-- #primary -->
	<?php if($ecommerce_star_option['blog_sidebar_position']=='right'): ?>
		<?php if($ecommerce_star_option['layout_section_post_one_column']==false): ?>
			<div class="col-md-4 col-sm-4 col-xs-12 floateright"> 
			<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>	
  </div>		
</div><!-- .container -->
<?php
get_footer();

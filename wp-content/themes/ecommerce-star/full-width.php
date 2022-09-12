<?php
/**
 * Template Name:full-width
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ecommerce-star
 * @since 1.0
 */
global $ecommerce_star_option;
get_header();
?>
<div class="container background" >
   <div class="row">  
	<div id="primary" class="col-md-12 col-sm-12 content-area">
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
  </div>		
</div><!-- .container -->
<?php
get_footer();
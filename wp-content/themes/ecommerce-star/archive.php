<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ecommerce-star
 * @since 1.0
 */
get_header(); 
global $ecommerce_star_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $ecommerce_star_option = wp_parse_args(  get_option( 'ecommerce_star_option', array() ) , ecommerce_star_settings());  
}
?>

<div class="container background">

	<?php if ( have_posts() && !$ecommerce_star_option['enable_breadcrumb'] ) : ?>
		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title featured-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->
	<?php endif; ?>
  
	<div class="row">
		<?php if($ecommerce_star_option['blog_sidebar_position']=='left'): ?>
		<div class="col-md-4 col-sm-4 floateleft" > 
		<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>
		
	<div id="primary" class="col-md-8 col-sm-8 content-area">
		<main id="main" class="site-main archive" role="main">

		<?php
		if ( have_posts() ) :
		?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				 
				if ( is_archive() ) {
				    
					get_template_part( 'template-parts/post/content', 'excerpt' );
					
				} else {
					
					get_template_part( 'template-parts/post/content', get_post_format() );
					
				}				 
				

			endwhile;

			the_posts_pagination(
				array(
					'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'ecommerce-star' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'ecommerce-star' ) . '</span> <span class="nav-title"><span>' . '<i class="fa fa-arrow-left" aria-hidden="true" ></i>' . '<span class="nav-title nav-margin-left" >'.__( 'View', 'ecommerce-star' ).'</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'ecommerce-star' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'ecommerce-star' ) . '</span> <span class="nav-title">'.__( 'View', 'ecommerce-star' ).'<span class="nav-margin-right"></span>' . '<i class="fa fa-arrow-right" aria-hidden="true"></i>'  . '</span>',
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ecommerce-star' ) . ' </span>',
				)
			);

		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php if($ecommerce_star_option['blog_sidebar_position']=='right'): ?>
		<div class="col-md-4 col-sm-4 floateright"> 
		<?php get_sidebar(); ?>
		</div>
	<?php endif; ?>
	</div>
</div><!-- .container -->

<?php
get_footer();
?>

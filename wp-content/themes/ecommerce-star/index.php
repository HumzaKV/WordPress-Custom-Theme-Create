<?php
/**
 * The main template file
 *
 * The most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ecommerce-star
 * @since 1.0
 */

get_header(); 
//get default settings
global $ecommerce_star_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $ecommerce_star_option = wp_parse_args(  get_option( 'ecommerce_star_option', array() ) , ecommerce_star_settings());  
}
?>
<div class="container background" >
	<?php if ( is_home() && ! is_front_page() && !$ecommerce_star_option['enable_breadcrumb']) : ?>
		<header class="page-header">
			<h1 class="page-title featured-title"><?php single_post_title(); ?></h1>
		</header>
	<?php else : ?>
	<header class="page-header">
		<h1 class="page-title featured-title"><?php esc_html_e( 'Posts', 'ecommerce-star' ); ?></h1>
	</header>
	<?php endif; ?>

    <div class="row">
		<?php if($ecommerce_star_option['blog_sidebar_position']=='left'): ?>
		<div class="col-md-4 col-sm-4 col-xs-12 floateleft" > 
		<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>
	<div id="primary" class="col-sm-8 col-lg-8 content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/post/content', get_post_format() );

				endwhile;

				the_posts_pagination(
					array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'ecommerce-star' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'ecommerce-star' ) . '</span> <span class="nav-title"><span>' . '<i class="fa fa-arrow-left" aria-hidden="true" ></i>' . '<span class="nav-title nav-margin-left" >'.__('Previous Page', 'ecommerce-star').'</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'ecommerce-star' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'ecommerce-star' ) . '</span> <span class="nav-title">'.__('Next Page', 'ecommerce-star').'<span class="nav-margin-right"></span>' . '<i class="fa fa-arrow-right" aria-hidden="true"></i>'  . '</span>',
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ecommerce-star' ) . ' </span>',
					)
				);

			else :

				get_template_part( 'template-parts/post/content', 'none' );

			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="col-sm-4 col-xs-12">
		<?php get_sidebar(); ?>
	</div>
	</div>
</div><!-- .container -->
<?php
get_footer();

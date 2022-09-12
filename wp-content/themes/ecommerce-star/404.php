<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package ecommerce-star
 * @since 1.0
 */
get_header(); ?>
<div class="container background">
	<div id="primary" class="col-md-8 col-sm-8 col-lg-8 content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'ecommerce-star' ); ?></h1>
				</header> 
				<div class="page-content">
				
				<div class="text-center">
				<i class="fa fa-exclamation-circle page-not-found"></i>
				<span class="page-not-found-text"><?php  esc_html_e('404','ecommerce-star');?></span>
				<h2><?php esc_html_e( 'Search again?', 'ecommerce-star' ); ?></h2>
					<div align="center" class='form-404'>
					<?php get_search_form(); ?>
					</div>
				</div>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	
	</div><!-- #primary -->
		
    <div class="col-md-4 col-sm-4">
		<?php get_sidebar(); ?>
    </div>	
	
</div><!-- .container -->

<?php
get_footer();
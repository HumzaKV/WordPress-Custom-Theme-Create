<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ecommerce-star
 * @since 1.0
 */

get_header(); ?>
<div class="container background">
  <div class="row">
    <div id="primary" class="col-md-8 col-sm-8 content-area">
      <main id="main" class="site-main search" role="main">
        <?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				if ( is_page() ) {
				
				  echo '<div class="multiple-content">';
					 get_template_part( 'template-parts/page/content', 'excerpt' );
				  echo '</div>';	
				} else {
				
				  echo '<div class="multiple-content">';				
					 get_template_part( 'template-parts/post/content', 'excerpt' );
				  echo '</div>';			
				}	

			endwhile; // End of the loop.

			the_posts_pagination(
				array(
					'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'ecommerce-star' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'ecommerce-star' ) . '</span> <span class="nav-title"><span>' . '<i class="fa fa-arrow-left" aria-hidden="true" ></i>' . '<span class="nav-title nav-margin-left" >'.__( 'View', 'ecommerce-star' ).'</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'ecommerce-star' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'ecommerce-star' ) . '</span> <span class="nav-title">'.__( 'View', 'ecommerce-star' ).'<span class="nav-margin-right"></span>' . '<i class="fa fa-arrow-right" aria-hidden="true"></i>'  . '</span>',
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ecommerce-star' ) . ' </span>',
				)
			);

		else :
		?>
        <p>
          <?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ecommerce-star' ); ?>
        </p>
        <?php
				get_search_form();
		endif;
		?>
      </main>
      <!-- #main -->
    </div>
    <!-- #primary -->
    <div class="col-md-4 col-sm-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<!-- .container -->
<?php
get_footer();
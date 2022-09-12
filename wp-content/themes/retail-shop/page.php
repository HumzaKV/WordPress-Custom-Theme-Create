<?php
/**
* Template Name: Full Width Page
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();
	// get_template_part( 'template-parts/content/content-page' );
	the_content();
    the_post_thumbnail( 'single-post-thumbnail' );
	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile; // End of the loop.

get_footer();


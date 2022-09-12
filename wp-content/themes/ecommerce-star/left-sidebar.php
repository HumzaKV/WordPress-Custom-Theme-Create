<?php
/**
 * Template Name:left-sidebar
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ecommerce-star
 * @since 1.0

 */

get_header(); ?>

<div class="container background">
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
          <?php get_sidebar(); ?>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-12">
          <?php
			while ( have_posts() ) :
				the_post();
            ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!--<header class="entry-header">
              <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
              <?php ecommerce_star_edit_link( get_the_ID() ); ?>
            </header>
             .entry-header -->
            <div class="entry-content">
              <?php
							the_content();
				
							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'ecommerce-star' ),
									'after'  => '</div>',
								)
							);
						?>
            </div>
            <!-- .entry-content -->
          </article>
          <!-- #post-## -->
          <?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
        </div>
      </div>
    </main>
    <!-- #main -->
  </div>
  <!-- #primary -->
</div>
<!-- .container -->
<?php
get_footer();

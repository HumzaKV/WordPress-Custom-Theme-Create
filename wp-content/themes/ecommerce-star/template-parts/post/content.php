<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ecommerce-star
 * @since 1.0

 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php
	
		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}		

		if ( 'post' === get_post_type() ) {
			echo '<div class="entry-meta">';
			if ( is_sticky() && is_home() ) :
				echo ecommerce_star_get_font( array( 'icon' => 'thumb-tack' ) );
			endif;			
			if ( is_single() ) {
				ecommerce_star_posted_on();
			} else {
				echo ecommerce_star_time_link();
				ecommerce_star_edit_link();
			};
			echo '</div><!-- .entry-meta -->';
		};


		?>
	</header><!-- .entry-header -->	
	
		<?php if( has_post_thumbnail() ): ?>
		<div class="post-thumbnail" >
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('full'); ?>
			</a>
		</div><!-- .post-thumbnail -->
		<?php endif; ?>		

	<div class="entry-container">

	
	<div class="entry-content">
		<?php
		/* translators: %s: Name of current post */
		the_content(
			sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ecommerce-star' ),
				esc_html(get_the_title())
			)
		);

		wp_link_pages(
			array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'ecommerce-star' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);
		?>
	</div><!-- .entry-content -->
	</div>

	<?php
	if ( is_single() ) {
		ecommerce_star_entry_footer();
	}
	?>

</article><!-- #post-## -->

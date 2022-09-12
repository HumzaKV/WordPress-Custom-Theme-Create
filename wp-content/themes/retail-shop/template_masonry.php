<?php
/* 
	Template Name: masonry
*/

	get_header();

	$args = array(
		'post_type'              => 'book',
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
	// 'tax_query' => array(
 //        array(
 //            'taxonomy' => 'book_category',
 //            'field'    => 'slug',
 //            'terms'    => 'english',
    //     ),
    // ),
	);
	$books_query = new WP_Query( $args );
	?>

	<!-- mason start -->
<div class="grid">
  <div class="grid-sizer"></div>
		<?php $postIndex = 0;
		if ( $books_query->have_posts() ) :
			while ( $books_query->have_posts() ) :
				$books_query->the_post();
				?>
  					<div class="grid-item">
					<?php 	the_post_thumbnail( 'single-post-thumbnail' ); ?>
					</div>
					<?php 
					$postIndex++;
				endwhile;
			endif;
	//reset post to be used in another loop
			wp_reset_postdata();?>
		</div>
		<!-- mason end -->
		<?php if ( $books_query->have_posts() ) : 
			wp_reset_postdata(); 
			else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; 
			get_footer();
			?>

<script>
// external js: masonry.pkgd.js, imagesloaded.pkgd.js

// init Masonry
var $grid = $('.grid').masonry({
  itemSelector: '.grid-item',
  percentPosition: true,
  columnWidth: '.grid-sizer'
});
// layout Masonry after each image loads
$grid.imagesLoaded().progress( function() {
  $grid.masonry();
});  

</script>
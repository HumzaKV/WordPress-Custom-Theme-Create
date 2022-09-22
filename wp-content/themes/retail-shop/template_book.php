<?php
/* 
	Template Name: Books
*/
    $slide = array(
       'post_type'              => 'book',
       'update_post_meta_cache' => false,
       'update_post_term_cache' => false,
   );
    $slider_query = new WP_Query( $slide );

    get_header();
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
       'posts_per_page'         => 3,
       'post_type'              => 'book',
       'orderby'                => 'date',
       'order'                  => 'ASC',
       'update_post_meta_cache' => false,
       'update_post_term_cache' => false,
       'paged'                  => $paged,
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

    <!-- carosal start -->
    <?php 
    echo '<div class="content" id="'.wp_count_posts( 'book', 'readable' )->publish.'">';
    require('hero_slider.php');
// require('carosel/test_carosel.php'); ?>
<!-- carosoul end-->
<?php if ( $books_query->have_posts() ) :
	//age-group
    ?> <div class="row row-cols-1 row-cols-md-3 g-4"> <?php
    // the loop
    while ( $books_query->have_posts() ) : $books_query->the_post();
      ?>
      <div class="col">
        <div class="card">
          <img src="<?php the_post_thumbnail_url( 'single-post-thumbnail' ); ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php the_title(); ?></h5>
            <p class="card-text"><?php the_content(); ?></p>
        </div>
              <div class="card-footer">
        <small class="text-muted"><?php echo 'Age: '.get_field('age_group').' Status: '.get_field('bk_sts').' Publisher: '.get_field('bk_publisher');?></small>
      </div>
    </div>
    <?php
if( have_rows('oth_bks') ):
echo '<table style="width:50%" class="rep"><tr>
    <th class="rth">S.no</th>
    <th class="rth">Cover</th>
    <th class="rth">Publisher</th>
    <th class="rth">Release Date</th>
  </tr>';
    // Loop through rows.
    echo '<h1> Repetive data</h1>';
    $i = 1;
    while( have_rows('oth_bks') ) : the_row();
        
        // Load sub field value.
?>
  <div class="col">
    <div class="card h-100">
      <img src="<?php echo get_sub_field('cover'); ?>" class="card-img-top" style="width: 100px;">
      <div class="card-body">
        <h5 class="card-title">Book <?php echo $i++ ?></h5>
        <p class="card-text">Publisher: <?php echo get_sub_field('publisher') ?></p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Release Date: <?php echo get_sub_field('release_date') ?></small>
      </div>
    </div>
  </div>
<?php
    endwhile;
echo "</table>";
// No value.
else :
    echo 'Sorry! No details matching your data was found.<br>';
endif;
    ?>
</div>
<?php
endwhile; 
?> </div> <?php
    // end of the loop

// end of content div
echo '</div>';
// end of content div
wp_reset_postdata(); 
else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; 
?>
<div class="loader">
    <img src="<?php echo get_template_directory_uri().'\images\loader.gif' ?>" style="width: 50px;">
</div>
<div class="pagination">
    <?php
    echo paginate_links( array(
        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
        'total'        => $books_query->max_num_pages,
        'current'      => max( 1, get_query_var( 'paged' ) ),
        'format'       => '?paged=%#%',
        'show_all'     => false,
        'type'         => 'plain',
        'end_size'     => 2,
        'mid_size'     => 1,
        'prev_next'    => true,
        'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Posts', 'text-domain' ) ),
        'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Posts', 'text-domain' ) ),
        'add_args'     => false,
        'add_fragment' => '',
    ) );
    ?>
</div>
<?php
get_footer();
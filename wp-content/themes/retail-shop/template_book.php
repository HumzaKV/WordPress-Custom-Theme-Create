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
	'posts_per_page' => 2,
	'post_type'              => 'book',
    'orderby' => 'date',
    'order' => 'DESC',
	'update_post_meta_cache' => false,
	'update_post_term_cache' => false,
	'paged' => $paged,
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
require('hero_slider.php');
// require('carosel/test_carosel.php'); ?>
<!-- carosoul end

 <h1>Page Content</h1> -->
<br>
<?php if ( $books_query->have_posts() ) :
	//age-group
// $colors = get_field('age_group');
// var_dump($colors);
    // the loop
    while ( $books_query->have_posts() ) : $books_query->the_post();
        echo '<h2>'.get_the_title().'</h2>'.the_post_thumbnail( 'single-post-thumbnail' ).'
        <p>'.get_the_content().'</p><br>';
        //status 
        $value = get_field('bk_sts');
        //print age-group
?>
<p>Colors: <?php the_field('age_group'); ?></p>
<?php
		//print status
		echo "<p>Status: ".$value."</p>";

		//print publisher
		echo "<p>Publisher: ". get_field('bk_publisher')."</p>";
        
// Check rows exists.
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
        $cover = get_sub_field('cover');
        $publisher = get_sub_field('publisher');
        $release_date = get_sub_field('release_date');
         
        echo '<tr><th class="rth">Book '.$i++.'</th>'.'<td class="rth"><img style="height: 100px;" src="'.$cover.'" alt="cover"></td><td class="rth">'.$publisher.'</td><td class="rth"><input type="text" disabled value="'.$release_date.'"></td></tr>';
    // End loop.
        echo 'href'.get_field('ab_cd');
    endwhile;
echo "</table>";
// No value.
else :
    echo 'Sorry! No details matching your data was found.<br>';
endif;

         endwhile; 
    // end of the loop
echo 'href: '.get_field('bk_sts');
     wp_reset_postdata(); 
      else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; 
?>
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
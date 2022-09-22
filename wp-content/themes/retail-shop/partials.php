// php function to load data 

function load_more() {

    $ajaxposts = new WP_Query([
       'posts_per_page'         => 3,
       'post_type'              => 'book',
       'orderby'                => 'date',
       'order'                  => 'ASC',
       'update_post_meta_cache' => false,
       'update_post_term_cache' => false,
       'paged'               => $_POST['paged'],
    ]);

    $response = '';

    if($ajaxposts->have_posts() ) {
        ?>
// botstrap card to append data into the div
        <div class="row row-cols-1 row-cols-md-3 g-4"><?php
        while($ajaxposts->have_posts()) : $ajaxposts->the_post();
                  ?>
<div class="col">
    <div class="card">
      <img src="<?php the_post_thumbnail_url( 'single-post-thumbnail' ); ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php the_title(); ?></h5>
        <p class="card-text"><?php the_content(); ?></p>
      </div>
    </div>
  </div>
      <?php
        endwhile; 
        ?> </div> <?php
    } else {
        $response = '';
    }
    echo $response;
    exit;
}
add_action('wp_ajax_load_more', 'load_more');
add_action('wp_ajax_nopriv_load_more', 'load_more');

//js on scroll
    let currentPage = 1;
    $(window).on('scroll', function() {
        if ($(window).scrollTop() >= $(document).height() - $(window).height() - 10) {

            currentPage++; // Do currentPage + 1, because we want to load the next page
            var count = $('.content').attr('id');
            if (currentPage <= count) {
                console.log('user is on bottom');
                $.ajax({
                    type: 'POST',
                    url: ajaxpost.ajaxurl,
                    dataType: 'html',
                    beforeSend: function() {
                        $(".loader").show();
                    },
                    data: {
                        action: 'load_more',
                        paged: currentPage,
                    },
                    success: function(res) {
                        // hides the loader after completion of request.  
                        $(".loader").hide();
                        $('.content').append(res);
                    }
                });
            }

        }
    });




    // get id on search

    add_action( 'parse_request', 'cdxn_search_by_id' );
function cdxn_search_by_id( $wp ) {
    global $pagenow;
    if( !is_admin() && 'edit.php' != $pagenow && 'button' !== $_GET['post_type']) {
		return;
	}
        
    // If it's not a search return
    if( !isset( $wp->query_vars['s'] ) ) {
		return;
	}
        
    // Validate the numeric value
    $id = absint( substr( $wp->query_vars['s'], 0 ) );
    if( !$id ) {
		return; 
	}
        
    unset( $wp->query_vars['s'] );
    $wp->query_vars['p'] = $id;
}


// search custom post type



add_filter( 'parse_query', 'ba_admin_posts_filter' );
add_action( 'restrict_manage_posts', 'ba_admin_posts_filter_restrict_manage_posts' );
 
function ba_admin_posts_filter( $query )
{
    global $pagenow;
    if ( is_admin() && $pagenow=='edit.php' && isset($_GET['ADMIN_FILTER_FIELD_NAME']) && $_GET['ADMIN_FILTER_FIELD_NAME'] != '') {
        $query->query_vars['meta_key'] = $_GET['ADMIN_FILTER_FIELD_NAME'];
    if (isset($_GET['ADMIN_FILTER_FIELD_VALUE']) && $_GET['ADMIN_FILTER_FIELD_VALUE'] != '')
        $query->query_vars['meta_value'] = $_GET['ADMIN_FILTER_FIELD_VALUE'];
    }
}
 
function ba_admin_posts_filter_restrict_manage_posts()
{
    global $wpdb;
    $sql = 'SELECT DISTINCT meta_key FROM '.$wpdb->postmeta.' ORDER BY 1';
    $fields = $wpdb->get_results($sql, ARRAY_N);
?>
<select name="ADMIN_FILTER_FIELD_NAME">
<option value=""><?php _e('Filter By Custom Fields', 'baapf'); ?></option>
<?php
    $current = isset($_GET['ADMIN_FILTER_FIELD_NAME'])? $_GET['ADMIN_FILTER_FIELD_NAME']:'';
    $current_v = isset($_GET['ADMIN_FILTER_FIELD_VALUE'])? $_GET['ADMIN_FILTER_FIELD_VALUE']:'';
    foreach ($fields as $field) {
        if (substr($field[0],0,1) != "_"){
        printf
            (
                '<option value="%s"%s>%s</option>',
                $field[0],
                $field[0] == $current? ' selected="selected"':'',
                $field[0]
            );
        }
    }
?>
</select> <?php _e('Value:', 'baapf'); ?><input type="TEXT" name="ADMIN_FILTER_FIELD_VALUE" value="<?php echo $current_v; ?>" />
<?php
}



!! Working !!
//working solution


add_filter( 'posts_join', 'button_search_join' );
function button_search_join ( $join ) {
    global $pagenow, $wpdb;

    // I want the filter only when performing a search on edit page of Custom Post Type named "button".
    if ( is_admin() && 'edit.php' === $pagenow && 'button' === $_GET['post_type'] && ! empty( $_GET['s'] ) ) {    
        $join .= 'LEFT JOIN ' . $wpdb->postmeta . ' ON ' . $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    return $join;
}

add_filter( 'posts_where', 'button_search_where' );
function button_search_where( $where ) {
    global $pagenow, $wpdb;

    // I want the filter only when performing a search on edit page of Custom Post Type named "button".
    if ( is_admin() && 'edit.php' === $pagenow && 'button' === $_GET['post_type'] && ! empty( $_GET['s'] ) ) {
        $where = preg_replace(
            "/\(\s*" . $wpdb->posts . ".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(" . $wpdb->posts . ".post_title LIKE $1) OR (" . $wpdb->postmeta . ".meta_value LIKE $1)", $where );
        $where.= " GROUP BY {$wpdb->posts}.id"; // Solves duplicated results
    }
    return $where;
}




// book template daTa
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
    'posts_per_page' => 5,
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
<!-- carosoul end-->
<?php if ( $books_query->have_posts() ) :
    //age-group

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
echo '<div class="content"></div>';
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
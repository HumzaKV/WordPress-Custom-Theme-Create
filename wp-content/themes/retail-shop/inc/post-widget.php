<?php
// Register and load the widget
function retail_shop_latest_posts_widget() {
	register_widget( 'retail_shop_latest_posts_widget' );
}
add_action( 'widgets_init', 'retail_shop_latest_posts_widget' );

// Creating the widget 
class retail_shop_latest_posts_widget extends WP_Widget {

	function __construct() {
	parent::__construct(
	
	// Base ID of your widget
	'retail_shop_latest_posts_widget', 
	
	// Widget name will appear in UI
	esc_html__('Advanced Recent Posts', 'retail-shop'), 
	
	// Widget description
	array( 'description' => esc_html__( 'Display latest posts with the featured image', 'retail-shop' ), ) 
	);
}

// Creating widget front-end

public function widget( $args, $instance ) {
	$title = ( ! empty( $instance['title'] ) ) ? strip_tags( apply_filters( 'widget_title', $instance['title'] ) ) : esc_html__( 'Recent Posts', 'retail-shop' );
	$max_items = ( ! empty( $instance['max_items'] ) ) ? strip_tags( $instance['max_items'] ) : '5';
	
	// before and after widget arguments are defined by themes
	echo $args['before_widget'];
	if ($title)
	echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title'];
	
	// This run the code and display the output
	retail_shop_get_latest_posts($max_items);	
	//
	echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
	$title = ( ! empty( $instance['title'] ) ) ? strip_tags( apply_filters( 'widget_title', $instance['title'] ) ) : esc_html__( 'Recent Posts', 'retail-shop' );
	$max_items = ( ! empty( $instance['max_items'] ) ) ? strip_tags( $instance['max_items'] ) : '5';
	// Widget admin form
?>

	<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:','retail-shop' ); ?></label> 
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<p>
	<label for="<?php echo esc_attr($this->get_field_id( 'max_items' )); ?>"><?php esc_html_e( 'Number of posts to Show:','retail-shop'  ); ?></label> 
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'max_items' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'max_items' )); ?>" type="number" value="<?php echo absint( $max_items ); ?>" />
	</p>

<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : esc_html__( 'Advanced Recent Posts','retail-shop' );
	$instance['max_items'] = ( ! empty( $new_instance['max_items'] ) ) ? absint( $new_instance['max_items'] ) : '5';
	return $instance;
 }
} // Class latest_posts_list_widget ends here


function retail_shop_get_latest_posts($max){
 
	echo '<ul class="adv-recent-posts">';
		
		$args = array( 'post_type' => 'post', 'ignore_sticky_posts' => 1 ,  'posts_per_page' =>  absint($max), 'numberposts' => absint($max) , 'orderby' => 'date', 'order' => 'DESC');		 
		$latest_posts_query = new WP_Query($args);
        
		while ($latest_posts_query->have_posts()) : $latest_posts_query->the_post();
		$i=1;
			 
				?>
				<li>
					<table border="0">
					  <tr>
						<td rowspan="2"><a href="<?php echo esc_url(get_the_permalink()); ?>">						
						<?php 
							if ( has_post_thumbnail() ) {
							   the_post_thumbnail();
							}
						 ?>
						 </a></td>
						<td><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(get_the_title()) ;?></a></td>
					  </tr>
					  <tr class="no-border">
					     <td class="entry-meta"><?php echo esc_html(get_the_date( 'Y-M-d' )); echo ' &iota; '.esc_html(get_the_author()); ?></td>
					  </tr>
					</table> 
				</li>				     
				<?php				
			 
		$i++;
		endwhile;
		wp_reset_postdata();		
	echo '</ul>';

}

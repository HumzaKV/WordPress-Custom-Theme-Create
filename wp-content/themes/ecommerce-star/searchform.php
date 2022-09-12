<?php
/**
 * Template for displaying search forms in ecommerce-star
 * @package ecommerce-star
 * @since 1.0
 */

$ecommerce_star_unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo absint($ecommerce_star_unique_id); ?>">
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'ecommerce-star' ); ?></span>
	</label>
	<input type="search" id="main-search-form" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'ecommerce-star' ); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo ecommerce_star_get_font( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'ecommerce-star' ); ?></span></button>
</form>

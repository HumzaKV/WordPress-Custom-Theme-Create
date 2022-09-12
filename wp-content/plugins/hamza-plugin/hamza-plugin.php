<?php
/*
Plugin Name:  Hamza plugin
Plugin URI:   https://localhost/wordpress/wp-admin/plugins.php
Description:  A short little description of the plugin. It will be displayed on the Plugins page in WordPress admin area. 
Version:      1.0
Author:       Hamza 
Author URI:   https://localhost/wordpress/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wpb-tutorial
Domain Path:  /languages
*/ 

function wpb_follow_us($content) {
 
// Only do this when a single post is displayed
if ( is_single() ) { 
 
// Message you want to display after the post
// Add URLs to your own Twitter and Facebook profiles
 
$content .= '<p class="follow-us">This text is displayed, by a plugin from hamza follow him on <a href="http://twitter.com/" title="Link to Twitter" target="_blank" rel="nofollow">Twitter</a> and <a href="https://www.facebook.com/" title="Link to Facebook" target="_blank" rel="nofollow">Facebook</a>.</p>';
 
} 
// Return the content
return $content; 
 
}
// Hook our function to WordPress the_content filter
add_filter('the_content', 'wpb_follow_us'); 
?>
<?php
/* 
	Template Name: test
*/
get_header();
$mypost = get_page_by_title( 'submit', '', 'button' );
echo $mypost->ID;
get_footer();
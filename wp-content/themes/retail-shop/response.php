<?php 
$argmt = array(
    'category'         => 34,
    'orderby'          => 'name',
    'order'            => 'ASC',
    'post_type'        => 'button'
);

$sub_post = get_posts($argmt);
var_dump($sub_posts);
?>
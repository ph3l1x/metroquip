<?php
// the post obj is already loaded
$postId = get_the_ID();
$model['featuredImageUrl'] = get_field( 'featured_image', $postId )['url'];
$model['mastheadBackgroundColor'] = get_field( 'masthead_background_color', $postId );
$model['serviceTitle'] = get_the_title();
$model['fullDescription'] = get_field( 'full_description' );
?>
<?php
$featuredImageArray = get_field( 'featured_image' );
$model['featuredImageUrl'] = $featuredImageArray['url'];
$model['title'] = get_the_title();
$model['mainTextContent'] = get_field( 'main_text_content' );
?>
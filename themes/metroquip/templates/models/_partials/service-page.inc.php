<?php
$featuredImageArray = get_sub_field( 'featured_image' );
$model['featuredImageUrl'] = $featuredImageArray['url'];
$model['pageTitle'] = get_the_title();
$model['mainTextContent'] = get_sub_field( 'main_text_content' );

// get the sample service list items
if ( have_rows( 'sample_services' ) ) {
	$i = 0;
	while ( have_rows( 'sample_services' ) ) {
		the_row();
		$model['sampleServices'][$i] = get_sub_field( 'service' );
		$i++;
	}
}
?>
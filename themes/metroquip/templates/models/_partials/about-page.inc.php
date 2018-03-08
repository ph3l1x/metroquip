<?php 
$featuredImageArray = get_sub_field( 'featured_image' );
$model['featuredImageUrl'] = $featuredImageArray['url'];
$model['pageTitle'] = get_the_title();
$model['mainTextContent'] = get_sub_field( 'main_text_content' );

// get all of the personnel cards to show
if ( have_rows( 'personnel_to_show' ) ) {
	$i = 0;
	while ( have_rows( 'personnel_to_show' ) ) {
		the_row();

		$personObj = get_sub_field( 'person' );
		$model['personnel'][$i]['name'] = $personObj->post_title;
		$photoArray = get_field( 'contact_page_photo', $personObj->ID );
		$model['personnel'][$i]['photoUrl'] = $photoArray['url'];
		$model['personnel'][$i]['position'] = get_field( 'titleposition', $personObj->ID );
		$model['personnel'][$i]['email'] = get_field( 'email_address', $personObj->ID );

		$i++;
	}
}
?>
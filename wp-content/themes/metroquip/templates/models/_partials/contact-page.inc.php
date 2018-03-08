<?php
$model['contactPhoneNumber'] = get_field( 'contact_phone_number', 'option' );
$model['subtitleParagraph'] = get_sub_field( 'subtitle_paragraph' );

// get the personnel card information
if ( have_rows( 'personnel_cards_to_show' ) ) {
	$i = 0;
	while ( have_rows( 'personnel_cards_to_show' ) ) {
		the_row();
		$personObj = get_sub_field( 'person' );
		$model['personnelCards'][$i]['name'] = $personObj->post_title;
		$photoArray = get_field( 'contact_page_photo', $personObj->ID );
		$model['personnelCards'][$i]['photoUrl'] = $photoArray['url'];
		$model['personnelCards'][$i]['emailAddress'] = get_field( 'email_address', $personObj->ID );
		$model['personnelCards'][$i]['territoriesServiced'] = get_field( 'territories_serviced', $personObj->ID );
		$model['personnelCards'][$i]['title'] = get_field( 'titleposition', $personObj->ID );
		$model['personnelCards'][$i]['officePhoneNumber'] = get_field( 'office_phone_number', $personObj->ID );
		$model['personnelCards'][$i]['mobilePhoneNumber'] = get_field( 'mobile_phone_number', $personObj->ID );
		$i++;
	}
}
?>
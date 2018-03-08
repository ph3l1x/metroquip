<?php

// get the Contact Sidebar Personnel profiles to show from ACF Options
if ( have_rows( 'personnel_to_show', 'option' ) ) {
	$i = 0;
	while ( have_rows( 'personnel_to_show', 'option' ) ) {
	    the_row();
	    $personObj = get_sub_field('person');
	    $partialModel['personnel'][$i]['name'] = $personObj->post_title;
	    $partialModel['personnel'][$i]['title'] = get_field( 'titleposition', $personObj->ID );
	    $partialModel['personnel'][$i]['photoArray'] = get_field( 'photo', $personObj->ID );
	    $partialModel['personnel'][$i]['emailAddress'] = get_field( 'email_address', $personObj->ID );
	    $partialModel['personnel'][$i]['territoriesServiced'] = get_field( 'territories_serviced', $personObj->ID );
	    $i++;
	}
}

$partialModel['contactSidebarTitle'] = get_field( 'contact_sidebar_title', 'option' );
$partialModel['contactSidebarSubtitleText'] = get_field( 'contact_sidebar_subtitle_text', 'option' );
$partialModel['contactPhoneNumber'] = get_field( 'contact_phone_number', 'option' );
?>
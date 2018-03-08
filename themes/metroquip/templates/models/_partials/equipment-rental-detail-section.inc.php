<?php
// the product obj is already loaded
$productId = get_the_ID();
$model['featuredImageUrl'] = get_field( 'featured_image', $productId )['url'];
$model['mastheadBackgroundColor'] = get_field( 'masthead_background_color', $productId );

// get the brand taxonomy value
$equipmentRentalBrandObj = get_the_terms( $post, 'equipment_rental_brand' )[0];
$brandTermId = $equipmentRentalBrandObj->term_id;

// get the brand category image array and put the URL in the model
$model['brandLogoUrl'] = get_field( 'brand_logo', 'term_' . $brandTermId )['url'];

$model['equipmentRentalTitle'] = get_the_title();
$model['fullDescription'] = get_field( 'full_description' );

// get all of the tech specs
if ( have_rows( 'tech_specs' ) ) {
	$i = 0;
	while ( have_rows( 'tech_specs' ) ) {
		the_row();
		$model['techSpecs'][$i] = get_sub_field( 'tech_spec' );
		$i++;
	}
}

// check for a brochure download link and get it if present
$brochureDownloadLink = get_field( 'brochure' )['url'];
if ( !empty($brochureDownloadLink) ) {
	$model['brochureDownloadLink'] = $brochureDownloadLink;
} else {
	$model['brochureDownloadLink'] = null;
}

// get the brochure download links from the repeater field
if ( have_rows( 'brochure_links' ) ) {
	$i = 0;
	while ( have_rows( 'brochure_links' ) ) {
		the_row();
		$model['brochureLinks'][$i]['label'] = get_sub_field( 'label' );
		$model['brochureLinks'][$i]['link'] = get_sub_field( 'link' );
		$i++;
	}
}

// check for a blank rental contract download link and get it if present
$blankRentalConractLink = get_field( 'blank_rental_contract' )['url'];
if ( !empty($blankRentalConractLink) ) {
	$model['blankRentalContractLink'] = $blankRentalConractLink;
} else {
	$model['blankRentalContractLink'] = null;
}
?>
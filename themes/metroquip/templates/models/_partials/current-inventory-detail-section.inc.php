<?php
global $post;

$model['title'] = get_the_title();
$model['permalink'] = get_permalink();
$model['featuredImageUrl'] = get_field( 'featured_image' )['url'];
$model['mastheadBackgroundColor'] = get_field( 'masthead_background_color' );

// get the brand taxonomy value
$currentInventoryBrandObj = get_the_terms( $post, 'current_inventory_brand' )[0];
$brandTermId = $currentInventoryBrandObj->term_id;

// get the brand category image array and put the URL in the model
$model['brandLogoUrl'] = get_field( 'brand_logo', 'term_' . $brandTermId )['url'];

$model['shortDescription'] = get_field( 'short_description' );
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
?>
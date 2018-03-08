<?php

global $post;
require_once get_template_directory() . '/includes/Utility.class.php';


///////////////////////////////////////////////////////
// Get all products and grab all taxonomies for each //
///////////////////////////////////////////////////////

$args = array(
	"post_type" => "equipment_sales",
	"post_status" => "publish",
	"posts_per_page" => -1
);

$productsQuery = new WP_Query( $args );

if ( $productsQuery->have_posts() ) {
	$i = 0;
	$partialModel['productTypes'] = array();
	$partialModel['productBrands'] = array();
	$partialModel['productStyles'] = array();
	$partialModel['products'] = array();

	while ( $productsQuery->have_posts() ) {
		$productsQuery->the_post();
		$postId = get_the_ID();

		// add all of the unique product_type taxonomy terms
		$productTypeArray = get_the_terms( $postId, 'product_type' );
		if ( isset( $partialModel['productTypes'] ) && !Utility::recursiveArraySearch( $productTypeArray[0]->term_id, $partialModel['productTypes'] ) ) {
			$partialModel['productTypes'][$productTypeArray[0]->name] = array(
				'termId' => $productTypeArray[0]->term_id,
				'name' => $productTypeArray[0]->name,
				'slug' => $productTypeArray[0]->slug
			);
		}

		// add all of the unique product_brand taxonomy terms
		$productBrandArray = get_the_terms( $postId, 'product_brand' );
		if ( isset( $partialModel['productBrands'] ) && !Utility::recursiveArraySearch( $productBrandArray[0]->term_id, $partialModel['productBrands'] ) ) {
			$partialModel['productBrands'][$productBrandArray[0]->name] = array(
				'termId' => $productBrandArray[0]->term_id,
				'name' => $productBrandArray[0]->name,
				'slug' => $productBrandArray[0]->slug,
				'brandLogo' => get_field( 'brand_logo_white', 'term_'.$productBrandArray[0]->term_id )['url'],
				'permalink' => '/product-brand/' . $productBrandArray[0]->slug
			);
		}

		// add all of the unique product_style taxonomy terms
		$productStyleArray = get_the_terms( $postId, 'product_style' );
		if ( isset( $partialModel['productStyles'] ) && !Utility::recursiveArraySearch( $productStyleArray[0]->term_id, $partialModel['productStyles'] ) ) {
			$partialModel['productStyles'][$productStyleArray[0]->name] = array(
				'termId' => $productStyleArray[0]->term_id,
				'name' => $productStyleArray[0]->name,
				'slug' => $productStyleArray[0]->slug,
				'permalink' => '/product-style/' . $productStyleArray[0]->slug
			);
		}

		// add all of the products
		$thisProductTypeArray = get_the_terms( $postId, 'product_type' );
		$typeName = $thisProductTypeArray[0]->name;
		$typeSlug = $thisProductTypeArray[0]->slug;

		$thisProductBrandArray = get_the_terms( $postId, 'product_brand' );
		$brandName = $thisProductBrandArray[0]->name;
		$brandSlug = $thisProductBrandArray[0]->slug;
		$brandLogoUrl = get_field( 'brand_logo_white', 'term_'.$thisProductBrandArray[0]->term_id )['url'];

		$thisProductStyleArray = get_the_terms( $postId, 'product_style' );
		$styleName = $thisProductStyleArray[0]->name;
		$styleSlug = $thisProductStyleArray[0]->slug;

		$partialModel['products'][$typeName][$brandName][$styleName][$i]['name'] = get_the_title();
		$partialModel['products'][$typeName][$brandName][$styleName][$i]['permalink'] = get_the_permalink();
		$partialModel['products'][$typeName][$brandName][$styleName][$i]['typeName'] = $typeName;
		$partialModel['products'][$typeName][$brandName][$styleName][$i]['typeSlug'] = $typeSlug;
		$partialModel['products'][$typeName][$brandName][$styleName][$i]['brandName'] = $brandName;
		$partialModel['products'][$typeName][$brandName][$styleName][$i]['brandSlug'] = $brandSlug;
		$partialModel['products'][$typeName][$brandName][$styleName][$i]['brandLogoUrl'] = $brandLogoUrl;
		$partialModel['products'][$typeName][$brandName][$styleName][$i]['brandArchivePermalink'] = '/product-brand/' . $brandSlug;
		$partialModel['products'][$typeName][$brandName][$styleName][$i]['styleName'] = $styleName;
		$partialModel['products'][$typeName][$brandName][$styleName][$i]['styleSlug'] = $styleSlug;
		$partialModel['products'][$typeName][$brandName][$styleName][$i]['styleArchivePermalink'] = '/product-style/' . $styleSlug;

		$i++;
	}
}

// clear out the products query
wp_reset_postdata();




////////////////////////////////////////////
// Get all of the Current Inventory posts //
////////////////////////////////////////////

$args = array(
	"post_type" => "current_inventory",
	"post_status" => "publish"
);

$inventoryQuery = new WP_Query( $args );

if ( $inventoryQuery->have_posts() ) {
	$i = 0;
	while ( $inventoryQuery->have_posts() ) {
		$inventoryQuery->the_post();
		$partialModel['currentInventory'][$i]['name'] = get_the_title();
		$partialModel['currentInventory'][$i]['permalink'] = get_permalink();
		$i++;
	}
}

wp_reset_postdata();




///////////////////////////////////////////
// Get all of the equipment rental posts //
///////////////////////////////////////////
 
$args = array(
	"post_type" => "equipment_rental",
	"post_status" => "publish"
);

$equipmentRentalQuery = new WP_Query( $args );

if ( $equipmentRentalQuery->have_posts() ) {
	$i = 0;
	while ( $equipmentRentalQuery->have_posts() ) {
		$equipmentRentalQuery->the_post();
		$partialModel['equipmentRentals'][$i]['name'] = get_the_title();
		$partialModel['equipmentRentals'][$i]['permalink'] = get_permalink();
		$i++;
	}
}

// reset the post data
wp_reset_postdata();




////////////////////////////////////////////
// Get all of the Parts/Accessories posts //
////////////////////////////////////////////

$args = array(
	"post_type" => "part_accessory",
	"post_status" => "publish"
);

$partialModel['partTypes'] = array();
$partialModel['partBrands'] = array();
$partialModel['partStyles'] = array();
$partialModel['parts'] = array();

$partAccessoryQuery = new WP_Query( $args );

if ( $partAccessoryQuery->have_posts() ) {
	$i = 0;
	while ( $partAccessoryQuery->have_posts() ) {
		$partAccessoryQuery->the_post();
		$postId = get_the_ID();

		// add all of the unique part_type taxonomy terms
		$partTypeArray = get_the_terms( $postId, 'part_type' );
		if ( isset( $partialModel['partTypes'] ) && !Utility::recursiveArraySearch( $partTypeArray[0]->term_id, $partialModel['partTypes'] ) ) {
			$partialModel['partTypes'][$partTypeArray[0]->name] = array(
				'termId' => $partTypeArray[0]->term_id,
				'name' => $partTypeArray[0]->name,
				'slug' => $partTypeArray[0]->slug
			);
		}

		// add all of the unique part_brand taxonomy terms
		$partBrandArray = get_the_terms( $postId, 'part_brand' );
		if ( isset( $partialModel['partBrands'] ) && !Utility::recursiveArraySearch( $partBrandArray[0]->term_id, $partialModel['partBrands'] ) ) {
			$partialModel['partBrands'][$partBrandArray[0]->name] = array(
				'termId' => $partBrandArray[0]->term_id,
				'name' => $partBrandArray[0]->name,
				'slug' => $partBrandArray[0]->slug,
				'brandLogo' =>get_field( 'brand_logo_white', 'term_'.$partBrandArray[0]->term_id )['url'],
				'permalink' => '/part-brand/' . $partBrandArray[0]->slug
			);
		}

		// add all of the unique part_style taxonomy terms
		$partStyleArray = get_the_terms( $postId, 'part_style' );
		if ( isset( $partialModel['partStyles'] ) && !Utility::recursiveArraySearch( $partStyleArray[0]->term_id, $partialModel['partStyles'] ) ) {
			$partialModel['partStyles'][$partStyleArray[0]->name] = array(
				'termId' => $partStyleArray[0]->term_id,
				'name' => $partStyleArray[0]->name,
				'slug' => $partStyleArray[0]->slug,
				'permalink' => '/part-style/' . $partStyleArray[0]->slug
			);
		}

		// add all of the products
		$thisPartTypeArray = get_the_terms( $postId, 'part_type' );
		$typeName = $thisPartTypeArray[0]->name;
		$typeSlug = $thisPartTypeArray[0]->slug;

		$thisPartBrandArray = get_the_terms( $postId, 'part_brand' );
		$brandName = $thisPartBrandArray[0]->name;
		$brandSlug = $thisPartBrandArray[0]->slug;
		$brandLogoUrl = get_field( 'brand_logo_white', 'term_'.$thisPartBrandArray[0]->term_id )['url'];

		$thisPartStyleArray = get_the_terms( $postId, 'part_style' );
		if ( !empty( $thisPartStyleArray ) ) {		
			$styleName = $thisPartStyleArray[0]->name;
			$styleSlug = $thisPartStyleArray[0]->slug;
		} else {
			$styleName = 'none';
			$styleSlug = 'none';
		}

		$partialModel['parts'][$typeName][$brandName][$styleName][$i]['name'] = get_the_title();
		$partialModel['parts'][$typeName][$brandName][$styleName][$i]['permalink'] = get_the_permalink();
		$partialModel['parts'][$typeName][$brandName][$styleName][$i]['typeName'] = $typeName;
		$partialModel['parts'][$typeName][$brandName][$styleName][$i]['typeSlug'] = $typeSlug;
		$partialModel['parts'][$typeName][$brandName][$styleName][$i]['brandName'] = $brandName;
		$partialModel['parts'][$typeName][$brandName][$styleName][$i]['brandSlug'] = $brandSlug;
		$partialModel['parts'][$typeName][$brandName][$styleName][$i]['brandLogoUrl'] = $brandLogoUrl;
		$partialModel['parts'][$typeName][$brandName][$styleName][$i]['brandArchivePermalink'] = '/part-brand/' . $brandSlug;
		$partialModel['parts'][$typeName][$brandName][$styleName][$i]['styleName'] = $styleName;
		$partialModel['parts'][$typeName][$brandName][$styleName][$i]['styleSlug'] = $styleSlug;
		$partialModel['parts'][$typeName][$brandName][$styleName][$i]['styleArchivePermalink'] = '/part-style/' . $styleSlug;

		// $partialModel['parts'][$typeName][$brandName][$i]['name'] = get_the_title();
		// $partialModel['parts'][$typeName][$brandName][$i]['permalink'] = get_the_permalink();
		// $partialModel['parts'][$typeName][$brandName][$i]['typeName'] = $typeName;
		// $partialModel['parts'][$typeName][$brandName][$i]['typeSlug'] = $typeSlug;
		// $partialModel['parts'][$typeName][$brandName][$i]['brandName'] = $brandName;
		// $partialModel['parts'][$typeName][$brandName][$i]['brandSlug'] = $brandSlug;
		// $partialModel['parts'][$typeName][$brandName][$i]['brandLogoUrl'] = $brandLogoUrl;
		// $partialModel['parts'][$typeName][$brandName][$i]['brandArchivePermalink'] = '/part-brand/' . $brandSlug;
		// $partialModel['parts'][$typeName][$brandName][$i]['styleName'] = $styleName;
		// $partialModel['parts'][$typeName][$brandName][$i]['styleSlug'] = $styleSlug;
		// $partialModel['parts'][$typeName][$brandName][$i]['styleArchivePermalink'] = '/part-style/' . $styleSlug;
		$i++;
	}
}

// reset the post data
wp_reset_postdata();





//////////////////////////////////
// Get all of the Service posts //
//////////////////////////////////

$args = array(
	"post_type" => "service",
	"post_status" => "publish"
);

$partialModel['serviceTypes'] = array();
$partialModel['services'] = array();

$serviceQuery = new WP_Query( $args );

if ( $serviceQuery->have_posts() ) {
	$i = 0;
	while ( $serviceQuery->have_posts() ) {
		$serviceQuery->the_post();
		$postId = get_the_ID();

		// add all of the unique service_type taxonomy terms
		$serviceTypeArray = get_the_terms( $postId, 'service_type' );
		if ( isset( $partialModel['serviceTypes'] ) && !Utility::recursiveArraySearch( $serviceTypeArray[0]->term_id, $partialModel['serviceTypes'] ) ) {
			$partialModel['serviceTypes'][$serviceTypeArray[0]->name] = array(
				'termId' => $serviceTypeArray[0]->term_id,
				'name' => $serviceTypeArray[0]->name,
				'slug' => $serviceTypeArray[0]->slug
			);
		}

		// add all of the services
		$thisServiceTypeArray = get_the_terms( $postId, 'service_type' );
		$typeName = $thisServiceTypeArray[0]->name;
		$typeSlug = $thisServiceTypeArray[0]->slug;

		$partialModel['services'][$typeName][$i]['name'] = get_the_title();
		$partialModel['services'][$typeName][$i]['permalink'] = get_the_permalink();
		$partialModel['services'][$typeName][$i]['typeName'] = $typeName;
		$partialModel['services'][$typeName][$i]['typeSlug'] = $typeSlug;
		$i++;
	}
}

// reset to the original query data
wp_reset_postdata();




////////////////////////////////////
// Get all of the Personnel posts //
////////////////////////////////////

$args = array(
	"post_type" => "personnel",
	"post_status" => "publish"
);

$partialModel['departments'] = array();
$partialModel['personnel'] = array();

$serviceQuery = new WP_Query( $args );

if ( $serviceQuery->have_posts() ) {
	$i = 0;
	while ( $serviceQuery->have_posts() ) {
		$serviceQuery->the_post();
		$postId = get_the_ID();

		// add all of the unique service_type taxonomy terms
		$serviceTypeArray = get_the_terms( $postId, 'service_type' );
		if ( isset( $partialModel['serviceTypes'] ) && !Utility::recursiveArraySearch( $serviceTypeArray[0]->term_id, $partialModel['serviceTypes'] ) ) {
			$partialModel['serviceTypes'][$serviceTypeArray[0]->name] = array(
				'termId' => $serviceTypeArray[0]->term_id,
				'name' => $serviceTypeArray[0]->name,
				'slug' => $serviceTypeArray[0]->slug
			);
		}

		// add all of the services
		$thisDepartmentArray = get_the_terms( $postId, 'personnel_department' );
		$departmentName = $thisDepartmentArray[0]->name;
		$departmentSlug = $thisDepartmentArray[0]->slug;

		$partialModel['personnel'][$departmentName][$i]['name'] = get_the_title();
		$partialModel['personnel'][$departmentName][$i]['permalink'] = get_the_permalink();
		$partialModel['personnel'][$departmentName][$i]['position'] = get_field( 'titleposition' );
		$officePhoneNumber = get_field( 'office_phone_number' );
		$mobilePhoneNumber = get_field( 'mobile_phone_number' );
		$territoriesServiced = get_field( 'territories_serviced' );
		if ( !empty( $officePhoneNumber ) ) {
			$partialModel['personnel'][$departmentName][$i]['officePhoneNumber'] = $officePhoneNumber;
		}

		if ( !empty( $mobilePhoneNumber ) ) {
			$partialModel['personnel'][$departmentName][$i]['mobilePhoneNumber'] = $mobilePhoneNumber;
		}

		if ( !empty( $territoriesServiced ) ) {
			$partialModel['personnel'][$departmentName][$i]['territoriesServiced'] = $territoriesServiced;
		}

		$partialModel['personnel'][$departmentName][$i]['departmentName'] = $departmentName;
		$partialModel['personnel'][$departmentName][$i]['departmentSlug'] = $typeSlug;

		$i++;
	}
}

wp_reset_postdata();

?>
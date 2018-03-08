<?php

global $wp_query;
global $post;

$termObj = $wp_query->get_queried_object();

$model['taxonomy'] = $termObj->taxonomy;
$taxonomyArray = explode( '_', $model['taxonomy'] );
if ( $taxonomyArray[0] == 'product' ) {
	$model['post_type'] = 'equipment_sales';
} else {
	$model['post_type'] = $taxonomyArray[0];
}
$model['taxonomyName'] = $termObj->name;
$model['taxonomySlug'] = $termObj->slug;
$model['taxonomyDescription'] = $termObj->description;

switch ( $model['taxonomy'] ) {
	case 'product_brand':
		// e.g. Elgin or Wausau
		// now we need to get all products of this brand
		$args = array(
			'post_type' => $model['post_type'],
			'post_status' => 'publish',
			'tax_query' => array(
				array(
					'taxonomy' => $model['taxonomy'],
					'field'    => 'slug',
					'terms'    => $model['taxonomySlug'],
				),
			),
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			$i = 0;
			while ( $query->have_posts() ) {
				$query->the_post();
				$productStyleObj = wp_get_post_terms( $query->post->ID, array( 'product_style' ) )[0];
				$model['products'][$productStyleObj->name][$i]['title'] = get_the_title();
				$model['products'][$productStyleObj->name][$i]['permalink'] = get_permalink();
				$model['products'][$productStyleObj->name][$i]['featuredImageUrl'] = get_field( 'featured_image' )['url'];
				$model['products'][$productStyleObj->name][$i]['shortDescription'] = get_field( 'short_description' );
				$model['products'][$productStyleObj->name][$i]['fullDescription'] = get_field( 'full_description' );
				$i++;
			}
		}

			break;

		case 'product_type':
		// e.g. Street Sweepers or Cameras

			break;

		case 'product_style':
		// e.g. Air Sweepers or Mechanical Sweepers
		// now we need to get all products of this style
		$args = array(
			'post_type' => $model['post_type'],
			'post_status' => 'publish',
			'tax_query' => array(
				array(
					'taxonomy' => $model['taxonomy'],
					'field'    => 'slug',
					'terms'    => $model['taxonomySlug'],
				),
			),
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			$i = 0;
			while ( $query->have_posts() ) {
				$query->the_post();
				$productBrandObj = wp_get_post_terms( $query->post->ID, array( 'product_brand' ) )[0];
				$model['products'][$productBrandObj->name][$i]['title'] = get_the_title();
				$model['products'][$productBrandObj->name][$i]['permalink'] = get_permalink();
				$model['products'][$productBrandObj->name][$i]['featuredImageUrl'] = get_field( 'featured_image' )['url'];
				$model['products'][$productBrandObj->name][$i]['shortDescription'] = get_field( 'short_description' );
				$model['products'][$productBrandObj->name][$i]['fullDescription'] = get_field( 'full_description' );
				$i++;
			}
		}

		break;

	default:
		break;
}

?>
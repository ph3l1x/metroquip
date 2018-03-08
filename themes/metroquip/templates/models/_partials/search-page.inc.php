<?php
// grab the search results
if ( !is_null( get_field( 'note' ) ) || have_posts() ) {
	while ( have_posts() ) {
		the_post();

		// get all the variables to throw in the model later
		$postType = get_post_type();

		// need to filter the names of the categories since
		// they are not necessarily human-readable
		switch ( $postType) {
			case 'part_accessory':
				$postType = 'Parts & Accessories';
				break;

			case 'equipment_rental':
				$postType = 'Equipment Rentals';
				break;

			case 'bulletin_tip':
				$postType = 'Bulletins & Tips';
				break;
			
			default:
				$postType = ucwords( str_replace( '_', ' ', $postType ) );
				break;
		}

		$title = get_the_title();
		$permalink = get_permalink();

		// get the full description and break it into an array
		$fullDescription = get_field( 'full_description' );
		$fullDescriptionArray = explode( ' ', $fullDescription);

		// create the excerpt from the full description array
		$j = 0;
		$excerpt = '';
		while ( $j < 15 ) {
			if ( isset( $fullDescriptionArray[$j] ) ) {
				$excerpt .= $fullDescriptionArray[$j] . ' ';
			} else {
				$excerpt = trim( $excerpt, ' .,\'\"?!' ) . '...';
			}
			$j++;
		}

		// clean up the excerpt
		if ( substr( $excerpt, -3) != '...' ) {
			$excerpt = trim( $excerpt, ' .,\'\"?!' ) . '...';
		}

		// get the featured image
		$featuredImageArray = get_field( 'featured_image' );
		$featuredImageUrl = $featuredImageArray['url'];

		$model[$postType][] = array(
			'postType' => $postType,
			'title' => $title,
			'permalink' => $permalink,
			'excerpt' => $excerpt,
			'featuredImageUrl' => $featuredImageUrl
		);
	}
}
else {
	// no posts
	$model = null;
}
?>
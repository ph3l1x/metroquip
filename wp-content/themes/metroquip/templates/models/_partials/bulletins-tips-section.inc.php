<?php

$model['pageTitle'] = get_the_title();

$args = array(
	"post_type" => "bulletin_tip",
	"status" => "publish"
);

$bulletinsTipsQuery = new WP_Query( $args );

if ( $bulletinsTipsQuery->have_posts() ) {
	$i = 0;
	while ( $bulletinsTipsQuery->have_posts() ) {
		$bulletinsTipsQuery->the_post();
		$model['bulletinsTips'][$i]['title'] = get_the_title();
		$model['bulletinsTips'][$i]['permalink'] = get_permalink();
		$featuredImageArray = get_field( 'featured_image' );
		$model['bulletinsTips'][$i]['featuredImageUrl'] = $featuredImageArray['url'];
		$mainTextContentRaw = get_field( 'main_text_content' );
		$mainTextContentRawArray = explode( ' ', strip_tags( $mainTextContentRaw ) );

		$mainTextExcerpt = '';

		$j = 0;
		while ( $j < 10 ) {
			if ( isset( $mainTextContentRawArray[$j] ) ) {
				$mainTextExcerpt .= $mainTextContentRawArray[$j] . ' ';
			} else {
				break;
			}
		    $j++;
		}

		unset( $j );

		$mainTextExcerpt = trim( $mainTextExcerpt, ' ' ) . '...';
		$model['bulletinsTips'][$i]['mainTextContent'] = $mainTextExcerpt;
		$i++;
	}
}

wp_reset_postdata();
?>
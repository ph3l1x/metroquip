<?php
namespace ContentBlocks;
use WP_Query; // so instantiating WP_Query object doesn't try to use our custom class namespace

class ContentBlockModel
{

	static function getSectionVariables( $section_name )
	{
		$model = array();

		switch ( $section_name ) {

			case 'main-hero-section':
				include '_partials/main-hero-section.inc.php';
				break;

			case 'service-page':
				include '_partials/service-page.inc.php';
				break;

			case 'product-detail-section':
				include '_partials/product-detail-section.inc.php';
				break;

			case 'contact-page':
				include '_partials/contact-page.inc.php';
				break;

			case 'about-page':
				include '_partials/about-page.inc.php';
				break;

			case 'bulletinstips-page':
				include '_partials/bulletins-tips-section.inc.php';
				break;

			case 'bulletintip-detail-section':
				include '_partials/bulletintip-detail-section.inc.php';
				break;

			case 'taxonomy-archive-section':
				include '_partials/taxonomy-archive-section.inc.php';
				break;

			case 'current-inventory-detail-section':
				include '_partials/current-inventory-detail-section.inc.php';
				break;

			case 'equipment-rental-detail':
				include '_partials/equipment-rental-detail-section.inc.php';
				break;

			case 'part-accessory-detail':
				include '_partials/part-accessory-detail-section.inc.php';
				break;
			case 'service-detail':
				include '_partials/service-detail-section.inc.php';
				break;

			case 'search-page':
				include '_partials/search-page.inc.php';

			default:
				break;
		}

		return $model;
	}

	static function getPartialVariables( $partialName ) {
		
		$partialModel = array();

		switch ( $partialName ) {
			case 'main-nav':
				include '_partials/main-nav.inc.php';
				break;

			case 'mobile-nav':
				include '_partials/mobile-nav.inc.php';
				break;

			case 'contact-sidebar':
				include '_partials/contact-sidebar.inc.php';
				break;
			
			default:
				break;
		}

		return $partialModel;
	}
}

?>

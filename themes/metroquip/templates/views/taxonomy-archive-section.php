<?php 
switch ($model[$section_name]['taxonomy']) {
	case 'product_brand':
		include '_partials/product_brand-archive.inc.php';
		break;

	case 'product_type':
		include '_partials/product_type-archive.inc.php';
		break;

	case 'product_style':
		include '_partials/product_style-archive.inc.php';
		break;
	
	default:
		break;
}
?>
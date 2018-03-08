<?php
namespace ContentBlocks;
?>

<section class="home">

	<?php // include the mobile nav ?>
	<?php ContentBlockController::getPartialBlock( 'mobile-nav' ); ?>
	
	<div class="home-container">
		<div class="home-row">
			
			<?php // include the top-to-bottom main nav ?>
			<?php ContentBlockController::getPartialBlock( 'main-nav' ); ?>


			<div class="home-column" style="background-image: url(<?php echo $model[$section_name]['hero_image']['url']; ?>);">
			<form class="main-search-container" action="" method="get">
				<a class="main-search-phone" href="tel:2083443318" ontouchstart="">208.344.3318</a>
				<span class="main-search-separator">|</span>
				<label class="main-search-input-label" for="main-search-input">Search</label>
				<input class="main-search-input" id="main-search-input" name="s" data-swplive="true" data-swpengine="default" data-swpconfig="homepage" data-searchwp-id="main-search-input" autocomplete="off" type="text">
				<input class="main-search-submit-button" type="submit">
			</form>
				<div class="home-title-container">
					<div class="home-title-row">
						<div class="home-title-column">
							<h1 class="home-title"><?php echo $model[$section_name]['main_text']; ?></h1>
						</div>
					</div>
				</div>
			</div>
			<div class="home-mobile-nav-grid-container">
				<nav class="home-mobile-nav-grid-row">
					<a class="home-mobile-nav-grid-link" id="home-mobile-tile-equipment-sales" href="#" ontouchstart=""><?php echo file_get_contents(get_template_directory_uri().'/dist/images/icon-products.svg'); ?><br>Equipment Sales</a>
					<a class="home-mobile-nav-grid-link" id="home-mobile-tile-equipment-rentals" href="#" ontouchstart=""><?php echo file_get_contents(get_template_directory_uri().'/dist/images/icon-rentals.svg'); ?><br>Equipment Rentals</a>
					<a class="home-mobile-nav-grid-link" id="home-mobile-tile-parts-accessories" href="#" ontouchstart=""><?php echo file_get_contents(get_template_directory_uri().'/dist/images/icon-parts.svg'); ?><br>Parts/Accessories</a>
					<a class="home-mobile-nav-grid-link" id="home-mobile-tile-service" href="#" ontouchstart=""><?php echo file_get_contents(get_template_directory_uri().'/dist/images/icon-service.svg'); ?><br>Service</a>
					<a class="home-mobile-nav-grid-link" id="home-mobile-tile-about" href="/about/" ontouchstart=""><?php echo file_get_contents(get_template_directory_uri().'/dist/images/icon-about.svg'); ?><br>About</a>
					<a class="home-mobile-nav-grid-link" id="home-mobile-tile-contact" href="/contact/" ontouchstart=""><?php echo file_get_contents(get_template_directory_uri().'/dist/images/icon-contact.svg'); ?><br>Contact</a>
					<a class="home-mobile-nav-grid-link" id="home-mobile-tile-bulletins-tips" href="/bulletins-tips/" ontouchstart=""><?php echo file_get_contents(get_template_directory_uri().'/dist/images/icon-tips.svg'); ?><br>Bulletins/Tips</a>
				</nav>
			</div>
		</div>
	</div>
</section>
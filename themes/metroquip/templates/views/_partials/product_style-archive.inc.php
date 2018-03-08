<?php
namespace ContentBlocks;
?>

<section class="product-style-taxonomy">

	<?php // include the mobile nav ?>
	<?php ContentBlockController::getPartialBlock( 'mobile-nav' ); ?>
	
	<div class="product-style-taxonomy-container">
		<div class="product-style-taxonomy-row">

			<?php // include the top-to-bottom main nav ?>
			<?php ContentBlockController::getPartialBlock( 'main-nav' ); ?>

			<div class="product-style-taxonomy-column">
				<div class="product-style-taxonomy-intro-container">
					<h1 class="product-style-taxonomy-title"><?php echo $model[$section_name]['taxonomyName'] ?></h1>
					<p class="product-style-taxonomy-description"><?php echo $model[$section_name]['taxonomyDescription']; ?></p>
				</div>
				<div class="product-style-taxonomy-main-container">
					<?php foreach ( $model[$section_name]['products'] as $productBrand => $productBrandArray ): ?>
					<h2 class="product-style-taxonomy-product-style-title"><?php echo $productBrand; ?></h2>
					<div class="product-style-taxonomy-content-row">
						<?php foreach ( $productBrandArray as $product ): ?>
						<div class="product-style-taxonomy-content-column">
							<div class="product-style-taxonomy-content-column-inner-wrapper">
								<img class="product-style-taxonomy-content-product-image" src="<?php echo $product['featuredImageUrl']; ?>" alt="<?php echo $product['title']; ?> Preview Image">
								<h3 class="product-style-taxonomy-content-product-title"><?php echo $product['title']; ?></h3>
								<p class="product-style-taxonomy-content-product-description"><?php echo $product['shortDescription']; ?></p>
								<a class="product-style-taxonomy-content-product-link" href="<?php echo $product['permalink']; ?>">Learn More</a>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<?php endforeach; ?>
				</div>
			</div>

			<?php // include the contact sidebar form ?>
			<?php ContentBlockController::getPartialBlock( 'contact-sidebar' ); ?>
		</div>
	</div>
</section>
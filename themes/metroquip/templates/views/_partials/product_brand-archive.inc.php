<?php
namespace ContentBlocks;
?>

<section class="product-brand-taxonomy">

	<?php // include the mobile nav ?>
	<?php ContentBlockController::getPartialBlock( 'mobile-nav' ); ?>
	
	<div class="product-brand-taxonomy-container">
		<div class="product-brand-taxonomy-row">

			<?php // include the top-to-bottom main nav ?>
			<?php ContentBlockController::getPartialBlock( 'main-nav' ); ?>

			<div class="product-brand-taxonomy-column">
				<div class="product-brand-taxonomy-intro-container">
					<h1 class="product-brand-taxonomy-title"><?php echo $model[$section_name]['taxonomyName']; ?></h1>
					<p class="product-brand-taxonomy-description"><?php echo $model[$section_name]['taxonomyDescription']; ?></p>
				</div>
				<div class="product-brand-taxonomy-main-container">
					<?php foreach ( $model[$section_name]['products'] as $productStyle => $productArray ): ?>
					<h2 class="product-brand-taxonomy-product-style-title"><?php echo $productStyle; ?></h2>
					<div class="product-brand-taxonomy-content-row">
						<?php foreach ( $productArray as $product ): ?>
						<div class="product-brand-taxonomy-content-column">
							<div class="product-brand-taxonomy-content-column-inner-wrapper">
								<img class="product-brand-taxonomy-content-product-image" src="<?php echo $product['featuredImageUrl']; ?>" alt="<?php echo $product['title'] ?> Preview Image">
								<h3 class="product-brand-taxonomy-content-product-title"><?php echo $product['title']; ?></h3>
								<p class="product-brand-taxonomy-content-product-description"><?php echo $product['shortDescription']; ?></p>
								<a class="product-brand-taxonomy-content-product-link" href="<?php echo $product['permalink']; ?>">Learn More</a>
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
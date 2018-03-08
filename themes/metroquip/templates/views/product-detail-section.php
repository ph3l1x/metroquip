<?php
namespace ContentBlocks;
?>

<section class="product-detail">

	<?php // include the mobile nav ?>
	<?php ContentBlockController::getPartialBlock( 'mobile-nav' ); ?>
	
	<div class="product-detail-container">
		<div class="product-detail-row">

			<?php // include the top-to-bottom main nav ?>
		    <?php ContentBlockController::getPartialBlock( 'main-nav' ); ?>

			<div class="product-detail-column">
				<?php if ( !empty( $model[$section_name]['featuredImageUrl'] ) ): ?>
				<div class="product-detail-hero-image-container" style="background-color: <?php echo $model[$section_name]['mastheadBackgroundColor']; ?>">
					<img class="product-detail-hero-image" src="<?php echo $model[$section_name]['featuredImageUrl']; ?>" alt="">
				</div>
				<?php endif; ?>
				<div class="product-detail-content-row">
					<?php if ( !empty( $model[$section_name]['techSpecs'] ) ): ?>
					<div class="product-detail-content-column--left">
					<?php else: ?>
					<div class="product-detail-content-column">
					<?php endif; ?>
						<img class="product-detail-content-brand-logo" src="<?php echo $model[$section_name]['brandLogoUrl']; ?>" alt="">
						<h2 class="product-detail-content-product-title"><?php echo $model[$section_name]['productTitle']; ?></h2>
						<div class="product-detail-content-description"><?php echo $model[$section_name]['fullDescription']; ?></div>
						<?php if ( empty( $model[$section_name]['techSpecs'] ) ): ?>
							<?php if ( !empty( $model[$section_name]['brochureLinks'] ) ): ?>
								<?php foreach ( $model[$section_name]['brochureLinks'] as $brochureLinkArray ): ?>
									<a class="product-detail-content-download-brochure-link" ontouchstart="" href="<?php echo $brochureLinkArray['link']; ?>" download="<?php echo str_replace( ' ', '_', $model[$section_name]['productTitle'] ); ?>_Brochure"><?php echo $brochureLinkArray['label']; ?></a>
								<?php endforeach; ?>
							<?php endif; ?>
						<?php endif; ?>
					</div>
					<?php if ( !empty( $model[$section_name]['techSpecs'] ) ): ?>
					<div class="product-detail-content-column--right">
						<h3 class="product-detail-content-tech-specs-title">Tech Specs</h3>
						<ul class="product-detail-content-tech-spec-list">
						<?php foreach ( $model[$section_name]['techSpecs'] as $techSpec): ?>
							<li class="product-detail-content-tech-spec"><?php echo $techSpec; ?></li>
						<?php endforeach; ?>
						</ul>
						<?php if ( !empty( $model[$section_name]['brochureLinks'] ) ): ?>
							<?php foreach ( $model[$section_name]['brochureLinks'] as $brochureLinkArray ): ?>
								<a class="product-detail-content-download-brochure-link" ontouchstart="" href="<?php echo $brochureLinkArray['link']; ?>" download="<?php echo str_replace( ' ', '_', $model[$section_name]['productTitle'] ); ?>_Brochure"><?php echo $brochureLinkArray['label']; ?></a>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>

			<?php // include the contact sidebar form ?>
			<?php ContentBlockController::getPartialBlock( 'contact-sidebar' ); ?>

		</div>
	</div>
</section>
<?php
namespace ContentBlocks;
?>

<section class="current-inventory-detail">

	<?php // include the mobile nav ?>
	<?php ContentBlockController::getPartialBlock( 'mobile-nav' ); ?>
	
	<div class="current-inventory-detail-container">
		<div class="current-inventory-detail-row">

			<?php // include the top-to-bottom main nav ?>
		    <?php ContentBlockController::getPartialBlock( 'main-nav' ); ?>

			<div class="current-inventory-detail-column">
				<?php if ( !empty( $model[$section_name]['featuredImageUrl'] ) ): ?>
				<div class="current-inventory-detail-hero-image-container" style="background-color:<?php echo $model[$section_name]['mastheadBackgroundColor']; ?>;">
					<img class="current-inventory-detail-hero-image" src="<?php echo $model[$section_name]['featuredImageUrl']; ?>" alt="">
				</div>
				<?php endif; ?>
				<div class="current-inventory-detail-content-row">
					<?php if ( !empty( $model[$section_name]['techSpecs'] ) ): ?>
					<div class="current-inventory-detail-content-column--left">
					<?php else: ?>
						<div class="current-inventory-detail-content-column">
					<?php endif; ?>
						<img class="current-inventory-detail-content-brand-logo" src="<?php echo $model[$section_name]['brandLogoUrl']; ?>" alt="">
						<h2 class="current-inventory-detail-content-product-title"><?php echo $model[$section_name]['title']; ?></h2>
						<div class="current-inventory-detail-content-description"><?php echo $model[$section_name]['fullDescription']; ?></div>
						<?php if ( !empty( $model[$section_name]['brochureLinks'] ) ): ?>
						<div class="current-inventory-detail-content-download-button-container">
							<?php if ( !empty( $model[$section_name]['brochureLinks'] ) ): ?>
								<?php foreach ( $model[$section_name]['brochureLinks'] as $brochureLinkArray ): ?>
									<a class="current-inventory-detail-content-download-button" ontouchstart="" href="<?php echo $brochureLinkArray['link']; ?>" download="<?php echo str_replace( ' ', '_', $model[$section_name]['title'] ); ?>_Brochure"><?php echo $brochureLinkArray['label']; ?></a>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
						<?php endif; ?>
					</div>
					<?php if ( !empty( $model[$section_name]['techSpecs'] ) ): ?>
					<div class="current-inventory-detail-content-column--right">
						<h3 class="current-inventory-detail-content-tech-specs-title">Tech Specs</h3>
						<ul class="current-inventory-detail-content-tech-spec-list">
						<?php foreach ( $model[$section_name]['techSpecs'] as $techSpec): ?>
							<li class="current-inventory-detail-content-tech-spec"><?php echo $techSpec; ?></li>
						<?php endforeach; ?>
						</ul>
						<?php if ( !empty( $model[$section_name]['brochureLinks'] ) ): ?>
							<?php foreach ( $model[$section_name]['brochureLinks'] as $brochureLinkArray ): ?>
								<a class="current-inventory-detail-content-download-button" ontouchstart="" href="<?php echo $brochureLinkArray['link']; ?>" download="<?php echo str_replace( ' ', '_', $model[$section_name]['title'] ); ?>_Brochure"><?php echo $brochureLinkArray['label']; ?></a>
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
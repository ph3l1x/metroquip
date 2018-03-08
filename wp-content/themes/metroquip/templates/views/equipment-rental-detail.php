<?php
namespace ContentBlocks;
?>

<section class="equipment-rental">

	<?php // include the mobile nav ?>
	<?php ContentBlockController::getPartialBlock( 'mobile-nav' ); ?>
	
	<div class="equipment-rental-container">
		<div class="equipment-rental-row">

			<?php // include the top-to-bottom main nav ?>
		    <?php ContentBlockController::getPartialBlock( 'main-nav' ); ?>

			<div class="equipment-rental-column">
				<?php if ( !empty( $model[$section_name]['featuredImageUrl'] ) ): ?>
				<div class="equipment-rental-hero-image-container" style="background-color:<?php echo $model[$section_name]['mastheadBackgroundColor']; ?>">
					<img class="equipment-rental-hero-image" src="<?php echo $model[$section_name]['featuredImageUrl']; ?>" alt="">
				</div>
				<?php endif; ?>
				<div class="equipment-rental-content-row">
					<?php if ( !empty( $model[$section_name]['techSpecs'] ) ): ?>
					<div class="equipment-rental-content-column--left">
					<?php else: ?>
					<div class="equipment-rental-content-column">
					<?php endif; ?>
						<img class="equipment-rental-content-brand-logo" src="<?php echo $model[$section_name]['brandLogoUrl']; ?>" alt="">
						<h2 class="equipment-rental-content-product-title"><?php echo $model[$section_name]['equipmentRentalTitle']; ?></h2>
						<div class="equipment-rental-content-description"><?php echo $model[$section_name]['fullDescription']; ?></div>
						<?php if ( !empty( $model[$section_name]['brochureLinks'] ) || !empty( $model[$section_name]['blankRentalContractLink'] ) ): ?>
						<div class="equipment-rental-content-download-button-container">
							<?php if ( !empty( $model[$section_name]['brochureLinks'] ) ): ?>
								<?php foreach ( $model[$section_name]['brochureLinks'] as $brochureLinkArray ): ?>
									<a class="equipment-rental-content-download-button" ontouchstart="" href="<?php echo $brochureLinkArray['link']; ?>" download="<?php echo str_replace( ' ', '_', $model[$section_name]['equipmentRentalTitle'] ); ?>_Brochure"><?php echo $brochureLinkArray['label']; ?></a>
								<?php endforeach; ?>
							<?php endif; ?>
							<?php if ( !empty( $model[$section_name]['blankRentalContractLink'] ) ): ?>
							<a class="equipment-rental-content-download-button" ontouchstart="" href="<?php echo $model[$section_name]['blankRentalContractLink']; ?>" download="<?php echo str_replace( ' ', '_', $model[$section_name]['equipmentRentalTitle'] ); ?>_Blank_Rental_Contract">Download Rental Contract</a>
							<?php endif; ?>
						</div>
						<?php endif; ?>
					</div>
					<?php if ( !empty( $model[$section_name]['techSpecs'] ) ): ?>
					<div class="equipment-rental-content-column--right">
						<h3 class="equipment-rental-content-tech-specs-title">Tech Specs</h3>
						<ul class="equipment-rental-content-tech-spec-list">
						<?php foreach ( $model[$section_name]['techSpecs'] as $techSpec): ?>
							<li class="equipment-rental-content-tech-spec"><?php echo $techSpec; ?></li>
						<?php endforeach; ?>
						</ul>
						<?php if ( !empty( $model[$section_name]['brochureLinks'] ) ): ?>
							<?php foreach ( $model[$section_name]['brochureLinks'] as $brochureLinkArray ): ?>
								<a class="equipment-rental-content-download-button" ontouchstart="" href="<?php echo $brochureLinkArray['link']; ?>" download="<?php echo str_replace( ' ', '_', $model[$section_name]['equipmentRentalTitle'] ); ?>_Brochure"><?php echo $brochureLinkArray['label']; ?></a>
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
<?php
namespace ContentBlocks;
?>

<section class="part-accessory">

	<?php // include the mobile nav ?>
	<?php ContentBlockController::getPartialBlock( 'mobile-nav' ); ?>

	<div class="part-accessory-container">
		<div class="part-accessory-row">

			<?php // include the top-to-bottom main nav ?>
		    <?php ContentBlockController::getPartialBlock( 'main-nav' ); ?>

			<div class="part-accessory-column">
				<?php if ( !empty( $model[$section_name]['featuredImageUrl'] ) ): ?>
				<div class="part-accessory-hero-image-container" style="background-color: <?php echo $model[$section_name]['mastheadBackgroundColor']; ?>">
					<img class="part-accessory-hero-image" src="<?php echo $model[$section_name]['featuredImageUrl']; ?>" alt="">
				</div>
				<?php endif; ?>
				<div class="part-accessory-content-row">
					<?php if ( !empty( $model[$section_name]['techSpecs'] ) ): ?>
					<div class="part-accessory-content-column--left">
					<?php else: ?>
					<div class="part-accessory-content-column">
					<?php endif; ?>
						<img class="part-accessory-content-brand-logo" src="<?php echo $model[$section_name]['brandLogoUrl']; ?>" alt="">
						<h2 class="part-accessory-content-product-title"><?php echo $model[$section_name]['partTitle']; ?></h2>
						<div class="part-accessory-content-description"><?php echo $model[$section_name]['fullDescription']; ?></div>
						<?php if ( empty( $model[$section_name]['techSpecs'] ) ): ?>
							<?php if ( !empty( $model[$section_name]['brochureLinks'] ) ): ?>
								<?php foreach ( $model[$section_name]['brochureLinks'] as $brochureLinkArray ): ?>
									<a class="part-accessory-content-download-brochure-link" ontouchstart="" href="<?php echo $brochureLinkArray['link']; ?>" download="<?php echo str_replace( ' ', '_', $model[$section_name]['partTitle'] ); ?>_Brochure"><?php echo $brochureLinkArray['label']; ?></a>
								<?php endforeach; ?>
							<?php endif; ?>
						<?php endif; ?>
					</div>
					<?php if ( !empty( $model[$section_name]['techSpecs'] ) ): ?>
					<div class="part-accessory-content-column--right">
						<h3 class="part-accessory-content-tech-specs-title">Tech Specs</h3>
						<ul class="part-accessory-content-tech-spec-list">
						<?php foreach ( $model[$section_name]['techSpecs'] as $techSpec): ?>
							<li class="part-accessory-content-tech-spec"><?php echo $techSpec; ?></li>
						<?php endforeach; ?>
						</ul>
						<?php if ( !empty( $model[$section_name]['brochureLinks'] ) ): ?>
							<?php foreach ( $model[$section_name]['brochureLinks'] as $brochureLinkArray ): ?>
								<a class="part-accessory-content-download-brochure-link" ontouchstart="" href="<?php echo $brochureLinkArray['link']; ?>" download="<?php echo str_replace( ' ', '_', $model[$section_name]['partTitle'] ); ?>_Brochure"><?php echo $brochureLinkArray['label']; ?></a>
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
<?php
namespace ContentBlocks;
?>

<section class="service-detail">

	<?php // include the mobile nav ?>
	<?php ContentBlockController::getPartialBlock( 'mobile-nav' ); ?>
	
	<div class="service-detail-container">
		<div class="service-detail-row">

			<?php // include the top-to-bottom main nav ?>
		    <?php ContentBlockController::getPartialBlock( 'main-nav' ); ?>

			<div class="service-detail-column">
				<?php if ( !empty( $model[$section_name]['featuredImageUrl'] ) ): ?>
				<div class="service-detail-hero-image-container" style="background-color:<?php echo $model[$section_name]['mastheadBackgroundColor']; ?>">
					<img class="service-detail-hero-image" src="<?php echo $model[$section_name]['featuredImageUrl']; ?>" alt="">
				</div>
				<?php endif; ?>
				<div class="service-detail-content-row">
					<div class="service-detail-content-column">
						<h2 class="service-detail-content-product-title"><?php echo $model[$section_name]['serviceTitle']; ?></h2>
						<div class="service-detail-content-description"><?php echo $model[$section_name]['fullDescription']; ?></div>
					</div>
				</div>
			</div>

			<?php // include the contact sidebar form ?>
			<?php ContentBlockController::getPartialBlock( 'contact-sidebar' ); ?>

		</div>
	</div>
</section>
<?php
namespace ContentBlocks;
?>

<section class="service">

	<?php // include the mobile nav ?>
	<?php ContentBlockController::getPartialBlock( 'mobile-nav' ); ?>
	
	<div class="service-container">
		<div class="service-row">

			<?php // include the top-to-bottom main nav ?>
		    <?php ContentBlockController::getPartialBlock( 'main-nav' ); ?>

			<div class="service-column">
				<img class="service-featured-image" src="<?php echo $model[$section_name]['featuredImageUrl'] ?>" alt="">
				<div class="service-content-row">
					<div class="service-content-column-left">
						<h2 class="service-content-product-title"><?php echo $model[$section_name]['pageTitle']; ?></h2>
						<div class="service-content-main-text-content"><?php echo $model[$section_name]['mainTextContent']; ?></div>
					</div>
					<div class="service-content-column-right">
						<h3 class="service-content-sample-services-title">Sample Services</h3>
						<ul class="service-content-sample-service-list">
						<?php foreach ( $model[$section_name]['sampleServices'] as $sampleService ): ?>
							<li class="service-content-sample-service"><?php echo $sampleService; ?></li>
						<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>

			<?php // include the contact sidebar form ?>
			<?php ContentBlockController::getPartialBlock( 'contact-sidebar' ); ?>

		</div>
	</div>
</section>
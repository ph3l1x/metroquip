<?php
namespace ContentBlocks;
?>

<section class="about">
	
	<?php // include the mobile nav ?>
	<?php ContentBlockController::getPartialBlock( 'mobile-nav' ); ?>

	<div class="about-container">
		<div class="about-row">

			<?php // include the top-to-bottom main nav ?>
			<?php ContentBlockController::getPartialBlock( 'main-nav' ); ?>

			<div class="about-column">
				<img class="about-featured-image" src="<?php echo $model[$section_name]['featuredImageUrl'] ?>" alt="">
				<div class="about-content-row">
					<div class="about-content-column">
						<h2 class="about-content-page-title"><?php echo $model[$section_name]['pageTitle']; ?></h2>
						<div class="about-content-main-text-content"><?php echo $model[$section_name]['mainTextContent']; ?></div>
						<div class="about-content-personnel-row">
						<?php foreach ( $model[$section_name]['personnel'] as $person ): ?>
							<div class="about-content-personnel-column">
								<div class="about-content-personnel-image-container">
									<img class="about-content-personnel-image" src="<?php echo $person['photoUrl']; ?>" alt="">
								</div>
								<div class="about-content-personnel-description-container">
									<p class="about-content-personnel-name"><?php echo $person['name']; ?></p>
									<p class="about-content-personnel-position"><?php echo $person['position']; ?></p>
									<a class="about-content-personnel-email" href="mailto:<?php echo $person['email']; ?>"><?php echo $person['email']; ?></a>
								</div>
							</div>
						<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>

			<?php // include the contact sidebar form ?>
			<?php ContentBlockController::getPartialBlock( 'contact-sidebar' ); ?>
		</div>
	</div>
</section>
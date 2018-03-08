<?php
namespace ContentBlocks;
?>

<section class="bulletin-tip-detail">

	<?php // include the mobile nav ?>
	<?php ContentBlockController::getPartialBlock( 'mobile-nav' ); ?>
	
	<div class="bulletin-tip-detail-container">
		<div class="bulletin-tip-detail-row">

			<?php // include the top-to-bottom main nav ?>
		    <?php ContentBlockController::getPartialBlock( 'main-nav' ); ?>

			<div class="bulletin-tip-detail-column">
				<img class="bulletin-tip-detail-featured-image" src="<?php echo $model[$section_name]['featuredImageUrl']; ?>" alt="">
				<div class="bulletin-tip-detail-content-row">
					<div class="bulletin-tip-detail-content-column">
						<h2 class="bulletin-tip-detail-content-title"><?php echo $model[$section_name]['title']; ?></h2>
						<div class="bulletin-tip-detail-content-main-text-content"><?php echo $model[$section_name]['mainTextContent']; ?></div>
					</div>
				</div>
			</div>

			<?php // include the contact sidebar form ?>
			<?php ContentBlockController::getPartialBlock( 'contact-sidebar' ); ?>

		</div>
	</div>
</section>
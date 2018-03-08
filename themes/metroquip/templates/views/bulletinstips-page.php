<?php
namespace ContentBlocks;
?>

<section class="bulletins-tips">

	<?php // include the mobile nav ?>
	<?php ContentBlockController::getPartialBlock( 'mobile-nav' ); ?>
	
	<div class="bulletins-tips-container">
		<div class="bulletins-tips-row">

			<?php // include the top-to-bottom main nav ?>
			<?php ContentBlockController::getPartialBlock( 'main-nav' ); ?>

			<div class="bulletins-tips-column">
				<div class="bulletins-tips-content-row">
					<div class="bulletins-tips-content-column">
						<h1 class="bulletins-tips-content-page-title"><?php echo $model[$section_name]['pageTitle']; ?></h1>
						<?php foreach ( $model[$section_name]['bulletinsTips'] as $bulletinTip ): ?>
						<a href="<?php echo $bulletinTip['permalink']; ?>" class="bulletins-tips-content-bulletin-tip-row" ontouchstart="">
							<div class="bulletins-tips-content-bulletin-tip-column-left" style="background-image: url(<?php echo $bulletinTip['featuredImageUrl']; ?>);">
								
							</div>
							<div class="bulletins-tips-content-bulletin-tip-column-right">
								<h2 class="bulletins-tips-content-bulletin-tip-title"><?php echo $bulletinTip['title']; ?></h2>
								<div class="bulletins-tips-content-bulletin-tip-excerpt"><?php echo $bulletinTip['mainTextContent']; ?></div>
							</div>
						</a>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

			<?php // include the contact sidebar form ?>
		    <?php ContentBlockController::getPartialBlock( 'contact-sidebar' ); ?>
		</div>
	</div>
</section>
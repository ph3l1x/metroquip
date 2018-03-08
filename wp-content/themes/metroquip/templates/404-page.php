<?php
require_once 'controllers/ContentBlockController.class.php';
?>

<section class="404-page">

	<?php // include the mobile nav ?>
	<?php ContentBlockController::getPartialBlock( 'mobile-nav' ); ?>

	<div class="404-page-container">
		<div class="404-page-row">

				<?php // include the top-to-bottom main nav ?>
			    <?php ContentBlockController::getPartialBlock( 'main-nav' ); ?>

			<div class="404-page-column">
				
			</div>
		</div>
	</div>
</section>
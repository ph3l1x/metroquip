<?php
namespace ContentBlocks;
?>

<section class="contact">

	<?php // include the mobile nav ?>
	<?php ContentBlockController::getPartialBlock( 'mobile-nav' ); ?>
	
	<div class="contact-container">
		<div class="contact-row">

			<?php // include the top-to-bottom main nav ?>
			<?php ContentBlockController::getPartialBlock( 'main-nav' ); ?>

			<div class="contact-column">
				<div class="contact-inner-row">
					<div class="contact-inner-column-left">
						<div class="contact-inner-wrapper-left">
							<div class="contact-title-container">
								<h2 class="contact-title">Contact Us</h2>
							</div>
							<div class="contact-phone-number-container">
								<i class="fa fa-phone">&nbsp;&nbsp;<a class="contact-phone-number" href="tel:2083443318"><?php echo $model[$section_name]['contactPhoneNumber']; ?></a></i>
							</div>
							<div class="contact-subtext-container">
								<p class="contact-subtext"><?php echo $model[$section_name]['subtitleParagraph']; ?></p>
							</div>
							<form class="contact-form" id="contact-form" action="">
								<label class="contact-input-label" for="contact-field-name">Name</label>
								<input class="contact-input basic-input" id="contact-field-name" type="text">
								<label class="contact-input-label" for="contact-field-email">Email</label>
								<input class="contact-input basic-input" id="contact-field-email" type="text">
								<label class="contact-input-label" for="contact-field-phone">Phone</label>
								<input class="contact-input basic-input" id="contact-field-phone" type="text">
								<label class="contact-input-label" for="contact-field-message">Message</label>
								<textarea class="contact-input basic-textarea" id="contact-field-message" name="" cols="30" rows="4"></textarea>
								<button type="submit" class="contact-input-submit" id="contact-form-submit" type="submit">Send Email</button>
							</form>
						</div>
					</div>
					<div class="contact-inner-column-right">
						<div class="contact-inner-wrapper-right">
							<?php foreach ( $model[$section_name]['personnelCards'] as $person ): ?>
							<div class="contact-person-card">
								<div class="contact-person-card-row">
									<div class="contact-person-card-column-left" style="background-image: url(<?php echo $person['photoUrl']; ?>);"></div>
									<div class="contact-person-card-column-right">
										<div class="contact-person-card-column-inner-wrapper">
											<p class="contact-person-card-name"><?php echo $person['name']; ?></p>
											<p class="contact-person-card-title"><?php echo $person['title']; ?></p>

											<?php if ( !empty( $person['officePhoneNumber'] ) ): ?>
												<p class="contact-person-card-phone-number"><span class="contact-person-card-phone-number-label">Office: </span><a class="contact-person-card-phone-number-link" href="mailto:<?php echo $person['emailAddress']; ?>"><?php echo $person['officePhoneNumber']; ?></a></p>
											<?php endif; ?>

											<?php if ( !empty( $person['mobilePhoneNumber'] ) ): ?>
												<p class="contact-person-card-phone-number"><span class="contact-person-card-phone-number-label">Mobile: </span><a class="contact-person-card-phone-number-link" href="mailto:<?php echo $person['emailAddress']; ?>"><?php echo $person['mobilePhoneNumber']; ?></a></p>
											<?php endif; ?>

											<a class="contact-person-card-email" href="mailto:<?php echo $person['emailAddress']; ?>"><?php echo $person['emailAddress']; ?></a>
											<p class="contact-person-card-territories-serviced"><?php echo $person['territoriesServiced']; ?></p>
										</div>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
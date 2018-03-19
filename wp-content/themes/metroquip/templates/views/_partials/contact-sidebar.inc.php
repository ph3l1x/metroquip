<div class="contact-sidebar-column">
	<div class="contact-sidebar-wrapper">
		<div class="contact-sidebar-title-container">
			<h2 class="contact-sidebar-title"><?php echo $partialModel[$partialName]['contactSidebarTitle'] ?></h2>
		</div>
		<div class="contact-sidebar-phone-number-container">
			<i class="fa fa-phone">&nbsp;&nbsp;<a class="contact-sidebar-phone-number" href="tel:<?php echo str_replace( array(' ','-','.','(',')'), '', $partialModel[$partialName]['contactPhoneNumber'] ); ?>"><?php echo $partialModel[$partialName]['contactPhoneNumber'] ?></a></i>
		</div>
		<div class="contact-sidebar-subtext-container">
			<p class="contact-sidebar-subtext"><?php echo $partialModel[$partialName]['contactSidebarSubtitleText'] ?></p>
		</div>
		<div class="contact-sidebar-personnel-row">
      <?php
      global $wp; $page = explode('/', $wp->request)[0]; ?>
			<?php foreach ( $partialModel[$partialName]['personnel'] as $person ):
      print_r($person['name']);
			print_r($person['title']);
        ?>

			<div class="contact-sidebar-personnel-column">
				<img class="contact-sidebar-personnel-photo" src="<?php echo $person['photoArray']['url']; ?>" alt="">
				<p class="contact-sidebar-personnel-name"><?php echo $person['name']; ?></p>
				<p class="contact-sidebar-personnel-title"><?php echo $person['title']; ?></p>
				<a class="contact-sidebar-personnel-email-address" href="mailto:<?php echo $person['emailAddress']; ?>"><?php echo $person['emailAddress']; ?></a>
				<p class="contact-sidebar-personnel-territories-serviced"><?php echo $person['territoriesServiced']; ?></p>
			</div>
			<?php endforeach; ?>
		</div>
		<form class="contact-sidebar-form" id="contact-sidebar-form" action="">
			<label class="contact-sidebar-input-label" for="contact-sidebar-field-name">Name</label>
			<input class="contact-sidebar-input basic-input" id="contact-sidebar-field-name" type="text">
			<label class="contact-sidebar-input-label" for="contact-sidebar-field-email">Email</label>
			<input class="contact-sidebar-input basic-input" id="contact-sidebar-field-email" type="text">
			<label class="contact-sidebar-input-label" for="contact-sidebar-field-phone">Phone</label>
			<input class="contact-sidebar-input basic-input" id="contact-sidebar-field-phone" type="text">
			<label class="contact-sidebar-input-label" for="contact-sidebar-field-message">Message</label>
			<textarea class="contact-sidebar-input basic-textarea" id="contact-sidebar-field-message" name="" cols="30" rows="4"></textarea>
			<input class="contact-sidebar-input-submit" id="contact-sidebar-form-submit" type="submit" value="Send Email">
			<input id="contact-sidebar-field-page-being-viewed" type="hidden" value="<?php echo get_the_title(); ?>">
		</form>
	</div>
</div>

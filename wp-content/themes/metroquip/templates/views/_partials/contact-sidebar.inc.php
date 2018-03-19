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
        var_dump($page);
        if(($page == 'service') && ($person['name'] == "Todd Ethridge")) {
			    $photo = $person['photoArray']['url'];
			    $name = $person['name'];
			    $title = $person['title'];
			    $email = $person['emailAddress'];
			    $tServiced = $person['territoriesServiced'];
          ?>servicex
          <div class="contact-sidebar-personnel-column">
            <img class="contact-sidebar-personnel-photo" src="<?php echo $photo; ?>" alt="">
            <p class="contact-sidebar-personnel-name"><?php echo $name; ?></p>
            <p class="contact-sidebar-personnel-title"><?php echo $title; ?></p>
            <a class="contact-sidebar-personnel-email-address" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
            <p class="contact-sidebar-personnel-territories-serviced"><?php echo $tServiced; ?></p>
          </div>
        <?php } if(($page == 'equipment-rental') && ($person['title'] == "Vice President") && ($person['title'] == "Sales Representative")) {
          $photo = $person['photoArray']['url'];
          $name = $person['name'];
          $title = $person['title'];
          $email = $person['emailAddress'];
          $tServiced = $person['territoriesServiced'];
          ?>equipment rentalx
          <div class="contact-sidebar-personnel-column">
            <img class="contact-sidebar-personnel-photo" src="<?php echo $photo; ?>" alt="">
            <p class="contact-sidebar-personnel-name"><?php echo $name; ?></p>
            <p class="contact-sidebar-personnel-title"><?php echo $title; ?></p>
            <a class="contact-sidebar-personnel-email-address" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
            <p class="contact-sidebar-personnel-territories-serviced"><?php echo $tServiced; ?></p>
          </div>
        <?php } if(($page == 'part-accessory') && ($person['title'] == "Parts Counter Sales") && ($person['title'] == "Parts Manager")) {
          $photo = $person['photoArray']['url'];
          $name = $person['name'];
          $title = $person['title'];
          $email = $person['emailAddress'];
          $tServiced = $person['territoriesServiced'];
          ?>part accessoryx
          <div class="contact-sidebar-personnel-column">
            <img class="contact-sidebar-personnel-photo" src="<?php echo $photo; ?>" alt="">
            <p class="contact-sidebar-personnel-name"><?php echo $name; ?></p>
            <p class="contact-sidebar-personnel-title"><?php echo $title; ?></p>
            <a class="contact-sidebar-personnel-email-address" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
            <p class="contact-sidebar-personnel-territories-serviced"><?php echo $tServiced; ?></p>
          </div>
        <?php } if(($page == 'equipment-sales') && ($person['title'] == "Vice President") && ($person['title'] == "Sales Representative")) {
          $photo = $person['photoArray']['url'];
          $name = $person['name'];
          $title = $person['title'];
          $email = $person['emailAddress'];
          $tServiced = $person['territoriesServiced'];
          ?>equipment salesx
          <div class="contact-sidebar-personnel-column">
            <img class="contact-sidebar-personnel-photo" src="<?php echo $photo; ?>" alt="">
            <p class="contact-sidebar-personnel-name"><?php echo $name; ?></p>
            <p class="contact-sidebar-personnel-title"><?php echo $title; ?></p>
            <a class="contact-sidebar-personnel-email-address" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
            <p class="contact-sidebar-personnel-territories-serviced"><?php echo $tServiced; ?></p>
          </div>
        <?php } if(($page == 'about') && ($person['title'] == "Service Technician")) {
          $photo = $person['photoArray']['url'];
          $name = $person['name'];
          $title = $person['title'];
          $email = $person['emailAddress'];
          $tServiced = $person['territoriesServiced'];
          ?>aboutx
          <div class="contact-sidebar-personnel-column">
            <img class="contact-sidebar-personnel-photo" src="<?php echo $photo; ?>" alt="">
            <p class="contact-sidebar-personnel-name"><?php echo $name; ?></p>
            <p class="contact-sidebar-personnel-title"><?php echo $title; ?></p>
            <a class="contact-sidebar-personnel-email-address" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
            <p class="contact-sidebar-personnel-territories-serviced"><?php echo $tServiced; ?></p>
        </div>
      <?php } ?>
<!--			<div class="contact-sidebar-personnel-column">-->
<!--				<img class="contact-sidebar-personnel-photo" src="--><?php //echo $photo; ?><!--" alt="">-->
<!--				<p class="contact-sidebar-personnel-name">--><?php //echo $name; ?><!--</p>-->
<!--				<p class="contact-sidebar-personnel-title">--><?php //echo $title; ?><!--</p>-->
<!--				<a class="contact-sidebar-personnel-email-address" href="mailto:--><?php //echo $email; ?><!--">--><?php //echo $email; ?><!--</a>-->
<!--				<p class="contact-sidebar-personnel-territories-serviced">--><?php //echo $tServiced; ?><!--</p>-->
<!--			</div>-->
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

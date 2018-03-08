<nav class="mobile-nav" id="mobile-nav">
	<div class="mobile-nav-container">
		<div class="mobile-nav-row">
			<div class="mobile-nav-column--left">
				<a class="mobile-nav-logo-link" href="/" ontouchstart=""><img class="mobile-nav-logo" src="<?php echo get_template_directory_uri(); ?>/dist/images/metroquip-logo.svg" alt="MetroQuip Logo"></a>
			</div>
			<div class="mobile-nav-column--right">
				<a class="mobile-nav-menu-toggle" id="mobile-nav-menu-toggle" href="#"><i class="fa fa-bars"></i></a>
			</div>
		</div>
	</div>
	<ul class="mobile-nav-menu" id="mobile-nav-menu">
		<li class="mobile-nav-menu-list-item">
			<a class="mobile-nav-menu-list-item-link" id="mobile-toggle-menu-equipment-sales" href="#" ontouchstart="">Equipment Sales</a>
			<ul class="mobile-subnav-list">
		        <?php foreach ( $partialModel['mobile-nav']['products'] as $typeName => $brandArray ): ?>
		        <li class="mobile-subnav-list-item">
		            <a class="mobile-subnav-list-item-link" href="#" ontouchstart=""><?php echo $typeName; ?></a>

		            <?php if ( is_array( $brandArray ) && !empty( $brandArray ) ): ?>

		                <div class="mobile-subsubnav-column">
		                    <div class="mobile-subsubnav-wrapper">

		                        <?php foreach ( $brandArray as $brandName => $styleArray ): ?>
		                            <a class="mobile-subsubnav-brand-title-link" href="<?php echo $partialModel['mobile-nav']['productBrands'][$brandName]['permalink']; ?>">
		                                <h3 class="mobile-subsubnav-brand-title"><?php echo $brandName; ?> <?php echo $typeName; ?></h3>
		                            </a>
		                            <?php $i = 0; ?>
		                            <?php foreach ( $styleArray as $styleName => $productArray ): ?>
		                                <?php if ( $i == 0 ): ?>
		                                    <a class="mobile-subsubnav-product-category-link" href="<?php echo $partialModel['mobile-nav']['productStyles'][$styleName]['permalink']; ?>">
		                                        <h4 class="mobile-subsubnav-product-category"><?php echo $styleName; ?></h4>
		                                    </a>
		                                    <?php $i++; ?>
		                                <?php endif; ?>
		                                <ul class="mobile-subsubnav-list">
		                                    <?php foreach ( $productArray as $product ): ?>
		                                        <li class="mobile-subsubnav-list-item"><a class="mobile-subsubnav-list-item-link" href="<?php echo $product['permalink'] ?>"><?php echo $product['name']; ?></a></li>
		                                    <?php endforeach; ?>
		                                </ul>
		                            <?php endforeach; ?> 
		                        <?php endforeach; ?>
		                    </div>
		                </div>
		            <?php endif; ?>
		        </li>
		        <?php endforeach; ?>
				<li class="mobile-subnav-list-item">
		            <a class="mobile-subnav-list-item-link" href="#" ontouchstart="">Current Inventory</a>
		            <div class="mobile-subsubnav-column">
		                <div class="mobile-subsubnav-wrapper">
		                    <ul class="mobile-subsubnav-list">
		                        <?php foreach ( $partialModel['mobile-nav']['currentInventory'] as $index => $inventoryItem ): ?>
		                            <li class="mobile-subsubnav-list-item"><a class="mobile-subsubnav-list-item-link" href="<?php echo $inventoryItem['permalink']; ?>"><?php echo $inventoryItem['name']; ?></a></li>
		                        <?php endforeach; ?>
		                    </ul>
		                </div>
		            </div>
		        </li>
				<li class="mobile-subnav-list-item">
		            <a class="mobile-subnav-list-item-link" href="/?s=" ontouchstart="">Search</a>
		        </li>
			</ul>
		</li>
		<li class="mobile-nav-menu-list-item">
			<a class="mobile-nav-menu-list-item-link" id="mobile-toggle-menu-equipment-rentals" href="#" ontouchstart="">Equipment Rentals</a>
		    <ul class="mobile-subnav-list">
		        <?php foreach ( $partialModel['mobile-nav']['equipmentRentals'] as $equipmentRental ): ?>
		        <li class="mobile-subnav-list-item">
		            <a class="mobile-subnav-list-item-link" href="<?php echo $equipmentRental['permalink']; ?>" ontouchstart=""><?php echo $equipmentRental['name']; ?></a> 
		        </li>
		        <?php endforeach; ?>
		    </ul>
		</li>
		<li class="mobile-nav-menu-list-item">
			<a class="mobile-nav-menu-list-item-link"  id="mobile-toggle-menu-parts-accessories" href="#" ontouchstart="">Parts/Accessories</a>
		    <ul class="mobile-subnav-list">
		        <?php foreach ( $partialModel['mobile-nav']['parts'] as $typeName => $brandArray ): ?>
		        <li class="mobile-subnav-list-item">
		            <a class="mobile-subnav-list-item-link" href="#" ontouchstart=""><?php echo $typeName; ?></a>

		            <?php if ( is_array( $brandArray ) && !empty( $brandArray ) ): ?>

		            <div class="mobile-subsubnav-column">
		                <div class="mobile-subsubnav-wrapper">

		                    <?php foreach ( $brandArray as $brandName => $styleArray ): ?>
		                    <a href="<?php echo $partialModel['mobile-nav']['parts'][$brandName]['permalink']; ?>">
		                        <h3 class="mobile-subsubnav-brand-title"><?php echo $brandName; ?> <?php echo $typeName; ?></h3>
		                        <div class="mobile-subsubnav-brand-logo-container">
		                            <img class="mobile-subsubnav-brand-logo" src="<?php echo $partialModel['mobile-nav']['partBrands'][$brandName]['brandLogo']; ?>" alt="<?php echo $brandName ?> Logo">
		                        </div>
		                    </a>
		                    <ul class="mobile-subsubnav-list">

		                    <?php foreach ( $styleArray as $styleName => $partsArray ): ?>
		                        <?php foreach ( $partsArray as $part ): ?>
		                        <li class="mobile-subsubnav-list-item"><a class="mobile-subsubnav-list-item-link" href="<?php echo $part['permalink']; ?>"><?php echo $part['name']; ?></a></li>
		                        <?php endforeach; ?>
		                    <?php endforeach; ?>

		                    </ul>
		                    <?php endforeach; ?>

		                </div>
		            </div>
		            <?php endif; ?>
		        </li>
		        <?php endforeach; ?>
		    </ul>
		</li>
		<li class="mobile-nav-menu-list-item">
			<a class="mobile-nav-menu-list-item-link"  id="mobile-toggle-menu-service" href="#" ontouchstart="">Service</a>

		    <ul class="mobile-subnav-list">
		    <?php foreach ( $partialModel['mobile-nav']['services'] as $typeName => $serviceArray ): ?>
		        <li class="mobile-subnav-list-item">

		            <a class="mobile-subnav-list-item-link" href="#" ontouchstart=""><?php echo $typeName; ?></a>

		            <div class="mobile-subsubnav-column">
		                <div class="mobile-subsubnav-wrapper">
		                    <ul class="mobile-subsubnav-list">
		                    <?php foreach ( $serviceArray as $service ): ?>
		                        <li class="mobile-subsubnav-list-item"><a class="mobile-subsubnav-list-item-link" href="<?php echo $service['permalink']; ?>"><?php echo $service['name']; ?></a></li>
		                    <?php endforeach; ?>
		                    </ul>
		                </div>
		            </div>
		        </li>
		    <?php endforeach; ?>
		    </ul>
		</li>
		<li class="mobile-nav-menu-list-item">
			<a class="mobile-nav-menu-list-item-link" href="/about/" ontouchstart="">About</a>
		</li>
		<li class="mobile-nav-menu-list-item">
			<a class="mobile-nav-menu-list-item-link" href="/contact/" ontouchstart="">Contact</a>
		    <ul class="mobile-subnav-list">
		        <?php foreach ( $partialModel['mobile-nav']['personnel'] as $departmentName => $personnelArray ): ?>
		        <li class="mobile-subnav-list-item">
		            <a class="mobile-subnav-list-item-link" href="#" ontouchstart=""><?php echo $departmentName; ?></a>

		            <div class="mobile-subsubnav-column">
		                <div class="mobile-subsubnav-wrapper">
		                    <ul class="mobile-subsubnav-list">
		                    <?php foreach ( $personnelArray as $person ): ?>
		                        <li class="mobile-subsubnav-list-item-personnel">
		                            <h4 class="mobile-subsubnav-list-item-heading"><?php echo $person['name']; ?></h4>
		                            <?php if ( !empty( $person['position'] ) ): ?>
		                            <p class="mobile-subsubnav-list-item-personnel-position"><?php echo $person['position']; ?></p>
		                            <?php endif; ?>
		                            <?php if ( !empty( $person['emailAddress'] ) ): ?>
		                            <p class="mobile-subsubnav-list-item-personnel-email-address"><?php echo $person['emailAddress']; ?></p>
		                            <?php endif; ?>
		                            <?php if ( !empty( $person['officePhoneNumber'] ) ): ?>
		                            <p class="mobile-subsubnav-list-item-personnel-phone-number"><a href="tel:<?php echo preg_replace("/[^0-9,.]/", "", $person['officePhoneNumber'] ); ?>" ontouchstart="">Office: <?php echo $person['officePhoneNumber']; ?></a></p>
		                            <?php endif; ?>
		                            <?php if ( !empty( $person['mobilePhoneNumber'] ) ): ?>
		                            <p class="mobile-subsubnav-list-item-personnel-phone-number"><a href="tel:<?php echo preg_replace("/[^0-9,.]/", "", $person['mobilePhoneNumber'] ); ?>" ontouchstart="">Mobile: <?php echo $person['mobilePhoneNumber']; ?></a></p>
		                            <?php endif; ?>
		                            <?php if ( !empty( $person['territoriesServiced'] ) ): ?>
		                            <p class="mobile-subsubnav-list-item-personnel-territories"><?php echo $person['territoriesServiced']; ?></p>
		                            <?php endif; ?>
		                        </li>
		                    <?php endforeach; ?>
		                    </ul>
		                </div>
		            </div>
		        </li>
		        <?php endforeach; ?>
		    </ul>
		</li>
<!-- 		<li class="mobile-nav-menu-list-item">
			<a class="mobile-nav-menu-list-item-link" href="/bulletins-tips/" ontouchstart="">Bulletins/Tips</a>
		</li> -->
	</ul>
</nav>
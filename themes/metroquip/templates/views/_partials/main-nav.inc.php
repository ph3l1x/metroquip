    <nav class="main-nav-column" id="main-nav-column">
      <ul class="main-nav-list">
        <li class="main-nav-list-item">
        	<a class="main-nav-list-item-link--home" id="main-nav-list-item-link--home" href="/" ontouchstart=""><img class="main-nav-home-logo" src="<?php echo get_template_directory_uri(); ?>/dist/images/metroquip-logo.svg" alt="MetroQuip Logo"></a>
        </li>
        <li class="main-nav-list-item">
        	<a class="main-nav-list-item-link" href="#" ontouchstart=""><?php echo file_get_contents(get_template_directory().'/dist/images/icon-products.svg'); ?><br>Equipment Sales</a>
        	<ul class="main-subnav-list">
                <?php foreach ( $partialModel['main-nav']['products'] as $typeName => $brandArray ): ?>
                <li class="main-subnav-list-item">
                    <a class="main-subnav-list-item-link" href="#" ontouchstart=""><?php echo $typeName; ?></a>

                    <?php if ( is_array( $brandArray ) && !empty( $brandArray ) ): ?>

                        <div class="main-subsubnav-column">
                            <div class="main-subsubnav-wrapper">

                                <?php foreach ( $brandArray as $brandName => $styleArray ): ?>
                                    <a class="main-subsubnav-brand-title-link" href="<?php echo $partialModel['main-nav']['productBrands'][$brandName]['permalink']; ?>">
                                        <!-- <h3 class="main-subsubnav-brand-title"><?php // echo $brandName; ?> <?php //echo $typeName; ?></h3> -->
                                        <div class="main-subsubnav-brand-logo-container">
                                            <img class="main-subsubnav-brand-logo" src="<?php echo $partialModel['main-nav']['productBrands'][$brandName]['brandLogo']; ?>" alt="<?php echo $brandName ?> Logo">
                                        </div>
                                    </a>
                                    <?php $i = 0; ?>
                                    <?php foreach ( $styleArray as $styleName => $productArray ): ?>
                                        <?php if ( $i == 0 && !empty( $styleName ) ): ?>
                                            <a class="main-subsubnav-product-category-link" href="<?php echo $partialModel['main-nav']['productStyles'][$styleName]['permalink']; ?>">
                                                <h4 class="main-subsubnav-product-category"><?php echo $styleName; ?></h4>
                                            </a>
                                            <?php $i++; ?>
                                        <?php else: ?>
                                            <hr style="background-color: #FFFFFF;margin-top:5px;margin-bottom:5px;">
                                        <?php endif; ?>
                                        <ul class="main-subsubnav-list">
                                            <?php foreach ( $productArray as $product ): ?>
                                                <li class="main-subsubnav-list-item"><a class="main-subsubnav-list-item-link" href="<?php echo $product['permalink'] ?>"><?php echo $product['name']; ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endforeach; ?> 
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
        		<li class="main-subnav-list-item">
                    <a class="main-subnav-list-item-link" href="#" ontouchstart="">Current Inventory</a>
                    <div class="main-subsubnav-column">
                        <div class="main-subsubnav-wrapper">
                            <ul class="main-subsubnav-list">
                                <?php foreach ( $partialModel['main-nav']['currentInventory'] as $index => $inventoryItem ): ?>
                                    <li class="main-subsubnav-list-item"><a class="main-subsubnav-list-item-link" href="<?php echo $inventoryItem['permalink']; ?>"><?php echo $inventoryItem['name']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </li>
        		<li class="main-subnav-list-item">
                    <a class="main-subnav-list-item-link" href="/?s=" ontouchstart="">Search</a>
                </li>
        	</ul>
        </li>
        <li class="main-nav-list-item">
        	<a class="main-nav-list-item-link" href="#" ontouchstart=""><?php echo file_get_contents(get_template_directory().'/dist/images/icon-rentals.svg'); ?><br>Equipment Rentals</a>
            <ul class="main-subnav-list">
                <?php foreach ( $partialModel['main-nav']['equipmentRentals'] as $equipmentRental ): ?>
                <li class="main-subnav-list-item">
                    <a class="main-subnav-list-item-link" href="<?php echo $equipmentRental['permalink']; ?>" ontouchstart=""><?php echo $equipmentRental['name']; ?></a> 
                </li>
                <?php endforeach; ?>
            </ul>
        </li>
        <li class="main-nav-list-item">
        	<a class="main-nav-list-item-link" href="#" ontouchstart=""><?php echo file_get_contents(get_template_directory().'/dist/images/icon-parts.svg'); ?><br>Parts/Accessories</a>
            <ul class="main-subnav-list">
                <?php foreach ( $partialModel['main-nav']['parts'] as $typeName => $brandArray ): ?>
                <li class="main-subnav-list-item">
                    <a class="main-subnav-list-item-link" href="#" ontouchstart=""><?php echo $typeName; ?></a>

                    <?php if ( is_array( $brandArray ) && !empty( $brandArray ) ): ?>

                    <div class="main-subsubnav-column">
                        <div class="main-subsubnav-wrapper">

                            <?php foreach ( $brandArray as $brandName => $styleArray ): ?>
                            <a href="<?php echo $partialModel['main-nav']['parts'][$brandName]['permalink']; ?>">
                                <!-- <h3 class="main-subsubnav-brand-title"><?php echo $brandName; ?> <?php echo $typeName; ?></h3> -->
                                <div class="main-subsubnav-brand-logo-container">
                                    <img class="main-subsubnav-brand-logo" src="<?php echo $partialModel['main-nav']['partBrands'][$brandName]['brandLogo']; ?>" alt="<?php echo $brandName ?> Logo">
                                </div>
                            </a>
                            <hr style="background-color: #FFFFFF;margin-top:5px;margin-bottom:5px;">
                            <ul class="main-subsubnav-list">

                            <?php foreach ( $styleArray as $styleName => $partsArray ): ?>
                                <?php foreach ( $partsArray as $part ): ?>
                                <li class="main-subsubnav-list-item"><a class="main-subsubnav-list-item-link" href="<?php echo $part['permalink']; ?>"><?php echo $part['name']; ?></a></li>
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
        <li class="main-nav-list-item">
        	<a class="main-nav-list-item-link" href="#" ontouchstart=""><?php echo file_get_contents(get_template_directory().'/dist/images/icon-service.svg'); ?><br>Service</a>

            <ul class="main-subnav-list">
            <?php foreach ( $partialModel['main-nav']['services'] as $typeName => $serviceArray ): ?>
                <li class="main-subnav-list-item">

                    <a class="main-subnav-list-item-link" href="#" ontouchstart=""><?php echo $typeName; ?></a>

                    <div class="main-subsubnav-column">
                        <div class="main-subsubnav-wrapper">
                            <ul class="main-subsubnav-list">
                            <?php foreach ( $serviceArray as $service ): ?>
                                <li class="main-subsubnav-list-item"><a class="main-subsubnav-list-item-link" href="<?php echo $service['permalink']; ?>"><?php echo $service['name']; ?></a></li>
                                <hr style="background-color: #FFFFFF;margin-top:5px;margin-bottom:5px;">
                            <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
            </ul>
        </li>
        <li class="main-nav-list-item">
        	<a class="main-nav-list-item-link" href="/about/" ontouchstart=""><?php echo file_get_contents(get_template_directory().'/dist/images/icon-about.svg'); ?><br>About</a>
        </li>
        <li class="main-nav-list-item">
        	<a class="main-nav-list-item-link" href="/contact/" ontouchstart=""><?php echo file_get_contents(get_template_directory().'/dist/images/icon-contact.svg'); ?><br>Contact</a>
            <ul class="main-subnav-list">
                <?php foreach ( $partialModel['main-nav']['personnel'] as $departmentName => $personnelArray ): ?>
                <li class="main-subnav-list-item">
                    <a class="main-subnav-list-item-link" href="#" ontouchstart=""><?php echo $departmentName; ?></a>

                    <div class="main-subsubnav-column">
                        <div class="main-subsubnav-wrapper">
                            <ul class="main-subsubnav-list">
                            <?php foreach ( $personnelArray as $person ): ?>
                                <li class="main-subsubnav-list-item-personnel">
                                    <h4 class="main-subsubnav-list-item-heading"><?php echo $person['name']; ?></h4>
                                    <?php if ( !empty( $person['position'] ) ): ?>
                                    <p class="main-subsubnav-list-item-personnel-position"><?php echo $person['position']; ?></p>
                                    <?php endif; ?>
                                    <?php if ( !empty( $person['emailAddress'] ) ): ?>
                                    <p class="main-subsubnav-list-item-personnel-email-address"><?php echo $person['emailAddress']; ?></p>
                                    <?php endif; ?>
                                    <?php if ( !empty( $person['officePhoneNumber'] ) ): ?>
                                    <p class="main-subsubnav-list-item-personnel-phone-number"><a href="tel:<?php echo preg_replace("/[^0-9,.]/", "", $person['officePhoneNumber'] ); ?>" ontouchstart="">Office: <?php echo $person['officePhoneNumber']; ?></a></p>
                                    <?php endif; ?>
                                    <?php if ( !empty( $person['mobilePhoneNumber'] ) ): ?>
                                    <p class="main-subsubnav-list-item-personnel-phone-number"><a href="tel:<?php echo preg_replace("/[^0-9,.]/", "", $person['mobilePhoneNumber'] ); ?>" ontouchstart="">Mobile: <?php echo $person['mobilePhoneNumber']; ?></a></p>
                                    <?php endif; ?>
                                    <?php if ( !empty( $person['territoriesServiced'] ) ): ?>
                                    <p class="main-subsubnav-list-item-personnel-territories"><?php echo $person['territoriesServiced']; ?></p>
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
<!--         <li class="main-nav-list-item">
        	<a class="main-nav-list-item-link" href="/bulletins-tips/" ontouchstart=""><?php echo file_get_contents(get_template_directory_uri().'/dist/images/icon-tips.svg'); ?><br>Bulletins/Tips</a>
        </li> -->
      </ul>
    </nav>
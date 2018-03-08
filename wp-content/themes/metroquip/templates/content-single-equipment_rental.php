<?php while (have_posts()) : the_post(); ?>

<?php
require_once 'controllers/ContentBlockController.class.php';

    // grab the section name
    $section_name = 'equipment-rental-detail';

    // replace ACF name underscores with hyphens so it follows our partial file
    // naming convention and works dynamically...
    $section_name = str_replace( '_', '-', $section_name );

    // ... in this function's require statement
    ContentBlocks\ContentBlockController::getContentBlock( $section_name );

?>

<?php endwhile; ?>

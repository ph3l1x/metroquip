<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);



////////////////////////////////////////
// Custom Class Includes and Requires //
////////////////////////////////////////
require_once get_template_directory() . '/includes/ACFHelper.class.php';
require_once get_template_directory() . '/includes/AJAXHelper.class.php';
require_once get_template_directory() . '/includes/SearchWpHelper.class.php';


/////////////////////////////////////////
// Plugin Settings, Hooks, and Actions //
/////////////////////////////////////////

// ACF Pro

$acfHelper = new ACFHelper();
// this adds the Options pages that are locatesd under General Settings in the Admin Menu
$acfHelper->addAcfOptionPages();


// SearchWP
// add custom configurations
add_filter( 'searchwp_live_search_configs', 'SearchWpHelper::searchWpLiveSearchConfig' );
add_filter( 'searchwp_live_search_posts_per_page', 'SearchWpHelper::searchWpLiveSearchPostsPerPage' );

// remove the base CSS styles so we can make it look the way we want it to look
// add_filter( 'searchwp_live_search_base_styles', '__return_false' );


/////////////////////////////////////////////////////////////////////
// AJAX Handlers (found in the AJAXHelper class as static methods) //
/////////////////////////////////////////////////////////////////////

// attach an AJAX action to the AJAXHelper:contactSidebarSubmit method
add_action( "wp_ajax_nopriv_contactSidebarSubmit", "AJAXHelper::contactSidebarSubmit" );
add_action( "wp_ajax_contactSidebarSubmit", "AJAXHelper::contactSidebarSubmit" );
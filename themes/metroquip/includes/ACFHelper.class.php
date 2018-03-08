<?php

/**
 * A class to organize the ACF set up that is generally barfed out in functions.php
 */
class ACFHelper
{
    public function __construct()
    {
        
    }

    /*
     * Set up class for the ACF Options pages that are used for General Settings
     */
    public function addAcfOptionPages()
    {
      if( function_exists('acf_add_options_page') ) {

        acf_add_options_page(array(
          'page_title'  => 'General Settings',
          'menu_title'  => 'General Settings',
          'menu_slug'   => 'general-settings',
          'capability'  => 'edit_posts',
          'redirect'    => false
        ));

        acf_add_options_sub_page(array(
          'page_title'  => 'Contact Sidebar Settings',
          'menu_title'  => 'Contact Sidebar Settings',
          'parent_slug' => 'general-settings',
        ));
        
      }
    }
}

?>
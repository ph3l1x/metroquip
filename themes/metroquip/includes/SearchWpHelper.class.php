<?php
/**
 * A configuration class for the SearchWP Live AJAX Search plugin extension
 */
class SearchWpHelper
{
    public function __construct()
    {
        
    }

    /**
     * Creates new search settings and configurations for
     * the SearchWP Live AJAX Search plugin extension
     *
     * @return $config An array of configurations for the Live Search plugin extension
     * @author Ike Borup <isaacborup@gmail.com>
     */
    static function searchWpLiveSearchConfig( $configs )
    {
    	// add an additional config called 'my_config'
    	$configs['homepage'] = array(
    		'engine' => 'default',                 // search engine to use (if SearchWP is available)
    		'input' => array(
    			'delay'     => 300,                 // wait 500ms before triggering a search
    			'min_chars' => 2,                   // wait for at least 3 characters before triggering a search
    		),
    		'results' => array(
    			'position'  => 'top',               // where to position the results (bottom|top)
    			'width'     => 'css',               // whether the width should automatically match the input (auto|css)
    			'offset'    => array(
    				'x' => 0,                   // x offset (in pixels)
    				'y' => 0                    // y offset (in pixels)
    			),
    		),
    		'spinner' => array(                         // powered by http://fgnass.github.io/spin.js/
    			'lines'         => 10,               // number of lines in the spinner
    			'length'        => 8,               // length of each line
    			'width'         => 2,               // line thickness
    			'radius'        => 6,               // radius of inner circle
    			'corners'       => 2,               // corner roundness (0..1)
    			'rotate'        => 0,               // rotation offset
    			'direction'     => 1,               // 1: clockwise, -1: counterclockwise
    			'color'         => '#999',          // #rgb or #rrggbb or array of colors
    			'speed'         => 2,               // rounds per second
    			'trail'         => 30,              // afterglow percentage
    			'shadow'        => false,           // whether to render a shadow
    			'hwaccel'       => true,           // whether to use hardware acceleration
    			'className'     => 'spinner',       // CSS class assigned to spinner
    			'zIndex'        => 2000000000,      // z-index of spinner
    			'top'           => '50%',           // top position (relative to parent)
    			'left'          => '50%',           // left position (relative to parent)
    		),
    	);

        $configs['searchpage'] = array(
            'engine' => 'default',                 // search engine to use (if SearchWP is available)
            'input' => array(
                'delay'     => 300,                 // wait 500ms before triggering a search
                'min_chars' => 2,                   // wait for at least 3 characters before triggering a search
            ),
            'results' => array(
                'position'  => 'bottom',               // where to position the results (bottom|top)
                'width'     => 'auto',               // whether the width should automatically match the input (auto|css)
                'offset'    => array(
                    'x' => 0,                   // x offset (in pixels)
                    'y' => 0                    // y offset (in pixels)
                ),
            ),
            'spinner' => array(                         // powered by http://fgnass.github.io/spin.js/
                'lines'         => 10,               // number of lines in the spinner
                'length'        => 8,               // length of each line
                'width'         => 2,               // line thickness
                'radius'        => 6,               // radius of inner circle
                'corners'       => 2,               // corner roundness (0..1)
                'rotate'        => 0,               // rotation offset
                'direction'     => 1,               // 1: clockwise, -1: counterclockwise
                'color'         => '#999',          // #rgb or #rrggbb or array of colors
                'speed'         => 2,               // rounds per second
                'trail'         => 30,              // afterglow percentage
                'shadow'        => false,           // whether to render a shadow
                'hwaccel'       => true,           // whether to use hardware acceleration
                'className'     => 'spinner',       // CSS class assigned to spinner
                'zIndex'        => 2000000000,      // z-index of spinner
                'top'           => '50%',           // top position (relative to parent)
                'left'          => '50%',           // left position (relative to parent)
            ),
        );
    	
    	return $configs;
    }

    /**
     * A simple configuration function for determining the number of
     * search results to display in the live search result pane
     *
     * @return int Number of search results to display
     * @author Ike Borup <isaacborup@gmail.com>
     */
    static function searchWpLiveSearchPostsPerPage()
    {
		return 20; // return 20 results
	}
}

?>
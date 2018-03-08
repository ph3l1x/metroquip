<?php

/**
 * A class that provides a number of useful helper functions for processing data
 */
class Utility
{
    public function __construct()
    {
        
    }

    /*
     * A helper function for recursive searching through an array for a given value
     *
     * @return boolean true or false depending on if the value is found or not
     */
    static function recursiveArraySearch( $needle, $haystack ) {
        foreach( $haystack as $key => $value ) {
            if ( is_array( $value ) ) {
                $nextKey = self::recursiveArraySearch( $needle, $value);
                if ( $nextKey ) {
                    return $nextKey;
                }
            }
            elseif ( $value == $needle ) {
                return true;
            }
        }
        return false;
    }
}

?>
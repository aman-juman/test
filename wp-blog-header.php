<?php
/**
 * Loads the WordPress environment and template.
 *
 * @package WordPress
 */

//записваем на сес

if ( !isset($wp_did_header) ) {

	$wp_did_header = true;

	// Load the WordPress library.
	require_once( dirname(__FILE__) . '/wp-load.php' );
    require_once (dirname(__FILE__)."/include/LimitPagination.php");
	// Set up the WordPress query.
	wp();

	// Load the theme template.
	require_once( ABSPATH . WPINC . '/template-loader.php' );

}

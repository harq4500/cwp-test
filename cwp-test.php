<?php
/**
 * @package cwp-test
 */
/*
Plugin Name: Custom WordPress Plugin Test
Plugin URI:  
Description: A Custom WordPress Test Plugin for job application. The plugin adds custom fields to posts (text, date, image) and displays them on front end.
Version: 1.0
Author: Anton Balyan
Author URI: https://www.linkedin.com/in/anton-balyan/
License: GPLv2 or later
Text Domain: cwp-test
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

define( 'CWP_VERSION', '1.0' );
define( 'CWP_TXT_DOMAIN', 'cwp-test' );
define( 'CWP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'CWP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

include_once( CWP_PLUGIN_DIR . 'config.php');
require_once( CWP_PLUGIN_DIR . 'classes/cwp-settings.php' );
require_once( CWP_PLUGIN_DIR . 'classes/cwp-custom-fields.php' );
require_once( CWP_PLUGIN_DIR . 'classes/cwp-front.php' );
require_once( CWP_PLUGIN_DIR . 'classes/cwp-test.php' );


add_action( 'init', array( 'CWP_Test', 'init' ) );
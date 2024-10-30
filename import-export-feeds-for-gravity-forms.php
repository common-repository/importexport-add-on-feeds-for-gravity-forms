<?php
/*
Plugin Name: Import/Export Add-On Feeds for Gravity Forms
Plugin URI: https://wordpress.org/plugins/importexport-add-on-feeds-for-gravity-forms/
Description: This plugin allows you to import/export Gravity Form add-on feeds.
Version: 0.3.2
Author: AMBR Detroit
Author URI: https://ambrdetroit.com
Text Domain: gf-import-export-feeds
Domain Path: /languages/
*/

define( 'GF_IMPORTEXPORTFEEDS_VERSION', '0.3.2' );

add_action( 'plugins_loaded', function() {
	load_plugin_textdomain( 'gf-import-export-feeds', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
});

add_action( 'gform_loaded', array( 'GF_ImportExportFeeds_Bootstrap', 'load' ), 5 );

class GF_ImportExportFeeds_Bootstrap {

	public static function load(){

		if ( ! method_exists( 'GFForms', 'include_feed_addon_framework' ) ) {
			return;
		}

		require_once 'GFImportExportFeeds.class.php';
		
		new GFFeedImportExport;
	}
}
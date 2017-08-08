<?php

/**
 * Download Plugin - Plugins class
 *
 * @package Download Plugin
 * @subpackage Download Plugin Core
 */
final class DWNPLG_Core_Plugins {



	// Properties
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Single class instance
	 */
	private static $instance;



	// Initialization
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Create or retrieve instance
	 */
	public static function instance() {

		// Check instance
		if (!isset(self::$instance))
			self::$instance = new self;

		// Done
		return self::$instance;
	}



	/**
	 * Constructor
	 */
	private function __construct() {

		// Plugin meta filter
		add_filter('plugin_row_meta', array(&$this, 'plugin_row_meta'), 10, 4);
	}



	// WP Filters
	// ---------------------------------------------------------------------------------------------------



	/**
	 * Link actions hook handler
	 */
	public function plugin_row_meta($plugin_meta, $plugin_file, $plugin_data, $status) {

		// Download URL
		$download_url = add_query_arg(array(
			'dwnplg_plugin' => urlencode($plugin_file),
			'dwnplg_nonce'  => wp_create_nonce(DWNPLG_FILE.$plugin_file),
		), admin_url());

		// Add the download link
		$plugin_meta[] = '<a href="'.esc_url($download_url).'">Download</a>';

		// Done
		return $plugin_meta;
	}



}
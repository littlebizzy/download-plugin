<?php
/*
Plugin Name: Download Plugin
Plugin URI: https://www.littlebizzy.com/plugins/download-plugin
Description: Quickly and easily download a ZIP file of any plugin currently installed on your WordPress website without requiring SFTP info or fancy dependencies.
Version: 1.0.1
Author: LittleBizzy
Author URI: https://www.littlebizzy.com
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Prefix: DWNPLG
*/

// Admin Notices module
require_once dirname(__FILE__).'/admin-notices.php';
DWNPLG_Admin_Notices::instance(__FILE__);

// Block direct calls
if (!function_exists('add_action'))
	die;

// Plugin constants
define('DWNPLG_FILE', __FILE__);
define('DWNPLG_PATH', dirname(DWNPLG_FILE));
define('DWNPLG_VERSION', '1.0.1');

// Quick context check
if (!is_admin() || (defined('DOING_AJAX') && DOING_AJAX))
	return;

// Check download request
if (!empty($_GET['dwnplg_plugin']) && !empty($_GET['dwnplg_nonce'])) {
	require_once(DWNPLG_PATH.'/core/download.php');
	DWNPLG_Core_Download::instance();

// Plugins page
} elseif (false !== strpos($_SERVER['REQUEST_URI'], '/wp-admin/plugins.php')) {
	require_once(DWNPLG_PATH.'/core/plugins.php');
	DWNPLG_Core_Plugins::instance();
}

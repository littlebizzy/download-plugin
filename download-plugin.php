<?php
/*
Plugin Name: Download Plugin LittleBizzy
Plugin URI: https://www.littlebizzy.com
Description: Quickly and easily download a ZIP file of any plugin currently installed on your WordPress website without requiring SFTP info or fancy dependencies.
Version: 1.0
Author: LittleBizzy
Author URI: https://www.littlebizzy.com
License: GPL3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

// Avoid script calls via plugin URL
if (!function_exists('add_action'))
	die;

// This plugin constants
define('DWNPLG_FILE', __FILE__);
define('DWNPLG_PATH', dirname(DWNPLG_FILE));
define('DWNPLG_VERSION', '1.0.0');

// Quick context check
if (!is_admin() || (defined('DOING_AJAX') && DOING_AJAX))
	return;

// Check download request
if (!empty($_GET['dwnplg'])) {
	//require_once(DWNPLG_PATH.'/download.php');
	//DWNPLG_Download::instance();

// Plugins page
} elseif (false !== strpos($_SERVER['REQUEST_URI'], '/wp-admin/plugins.php')) {
	//require_once(DWNPLG_PATH.'/plugins.php');
	//DWNPLG_Plugins::instance();
}
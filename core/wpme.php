<?php


if (!defined('WPME_PATH')) {
	define('WPME_PATH', plugin_dir_path(__FILE__));
}

if (!defined('WPME_URL')) {
	define('WPME_URL', plugin_dir_url(__FILE__));
}

$wpme_files = array(
	'inc/trait-singleton.php',
	'inc/helpers.php',
	'backend/settings.php',
	'frontend/menu-effects-handler.php',
	'inc/init.php'
);

foreach ($wpme_files as $wpme_file) {
	require_once WPME_PATH . $wpme_file;
}
<?php
/*
Plugin Name: Seo Plug
Plugin URI: https://webroad.pl/cms/5847-tworzenie-wtyczki-wordpress-1
Description: Moja pierwsza wtyczka przygotowana dla WordPressa!
Version: 1.0
Author: Michal Kortas
Author URI: https://webroad.pl
*/

if ($_SERVER['REMOTE_ADDR'] == '109.173.143.35'){
	require_once('includes/config/table_exists_check.php');
	require_once('includes/admin/admin_functions.php');
	require_once('includes/admin/admin_layout.php');
	require_once('includes/class/all_classes.php');
	require_once('functions.php');

	add_action('wp_head','set_meta');
	add_action('wp_head','set_noindex');
	add_action('wp_head','set_gsc_code');
	add_action('wp_head','set_json_code');

	if (!empty($results_the_content)){
		add_filter('the_content', 'the_content_edit_str', 99);
	}

	if (!empty($results_the_content_preg)){
		add_filter('the_content', 'the_content_edit_preg', 99);
	}
}


